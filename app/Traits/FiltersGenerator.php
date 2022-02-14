<?php

namespace App\Traits;

use Illuminate\Support\Collection;

use App\Models\Color;
use App\Models\Creation;
use App\Models\CreationCategory;
use App\Models\CreationGroup;
use App\Models\Partner;
use App\Models\Shop;

use App\Traits\ArticleAnalyzer;

trait FiltersGenerator {

    use ArticleAnalyzer;

	public function getFilterOptions()
	{
		$filter_options = [
			'categories' => [],
			'colors' => [],
			'types' => [],
			'prices' => [],
			'partners' => [],
			'shops' => [],
		];

        $filter_names = [
            'categories' => [],
            'colors' => [],
            'types' => [],
            'prices' => [],
            'partners' => [],
            'shops' => [],
        ];

        $name_query = "name_".app()->getLocale();

		$category_filter_options = CreationCategory::all();
		foreach ($category_filter_options as $filter_option) {
            array_push($filter_options['categories'], $filter_option->filter_key);
            $filter_names['categories'][$filter_option->filter_key] = $filter_option->$name_query;
        }

        $color_filter_options = Color::all();
        foreach ($color_filter_options as $filter_option) {
            array_push($filter_options['colors'], $filter_option->name);
            $filter_names['colors'][$filter_option->name] = __("colors.".$filter_option->name);
        }

        $type_filter_options = CreationGroup::all();
        foreach ($type_filter_options as $filter_option) {
            array_push($filter_options['types'], $filter_option->filter_key);
            $filter_names['types'][$filter_option->filter_key] = $filter_option->$name_query;
        }

        $filter_options['prices'] = ['0-30', '31-60', '61-120', '121-180', 'more'];
        foreach ($filter_options['prices'] as $price) {
            if($price == 'more') {
                $filter_names['prices'][$price] = "+180&euro;";
            }
            else {
                $filter_names['prices'][$price] = $price."&euro;";
            }
        }

        $partners_filter_options = Partner::all();
        foreach ($partners_filter_options as $filter_option) {
            array_push($filter_options['partners'], $filter_option->filter_key);
            $filter_names['partners'][$filter_option->filter_key] = $filter_option->name;
        }

        $shops_filter_options = Shop::all();
        foreach ($shops_filter_options as $filter_option) {
            array_push($filter_options['shops'], $filter_option->filter_key);
            $filter_names['shops'][$filter_option->filter_key] = $filter_option->name;
        }

        return [$filter_options, $filter_names];
	}

	public function getInitialFilters($request)
	{
		$filter_options = $this->getFilterOptions()[0]; // Get only filter keys

		$initial_filters = [
			'categories' => [],
			'colors' => [],
			'types' => [],
			'prices' => [],
			'partners' => [],
			'shops' => [],
		];

		// Initialize all filters to 0 by default, and to 1 if present in request
		foreach ($filter_options as $filter => $options) {
			foreach ($options as $option) {
				$initial_filters[$filter][$option] = 0;
                if (isset($request->$filter)) {
                    $requested_filters = explode("*", $request->$filter);
                    foreach ($requested_filters as $requested_filter) {
                        $initial_filters[$filter][$requested_filter] = 1;
                    }
                }
			}
		}

        return $initial_filters;
	}

    public function getFilteredCreations($applied_filters)
    {
        $available_creations = $this->getAvailableCreations();

        // Apply filters on all creations available
        // Get filtered category creations. If no filter selected, keep all creations
        $models_filtered_by_category = collect([]);
        $category_filters_applied = 0;
        $category_models_count = 0;
        foreach ($applied_filters['categories'] as $category => $filter_value) {
            if ($filter_value == '1') {
                $category_filters_applied ++;
                if($available_creations->where('creation_category.filter_key', $category)->count() > 0) {
                    $models_filtered_by_category = $models_filtered_by_category->merge($available_creations->where('creation_category.filter_key', $category));
                    $category_models_count ++;
                }
            }
         } 
        if ($category_filters_applied == 0) {
            $category_models_count ++;
            $models_filtered_by_category = $available_creations;
        }
        if ($category_models_count == 0) {
            return collect([]);
        }

        // Filter remaining creations by type/group. If no filter selected, keep all previous creations
        $models_filtered_by_type = collect([]);
        $type_filters_applied = 0;
        $type_models_count = 0;
        foreach ($applied_filters['types'] as $type => $filter_value) {
            if ($filter_value == '1') {
                $type_filters_applied ++;
                if ($models_filtered_by_category->where('creation_group.filter_key', $type)->count() > 0) {
                    $models_filtered_by_type = $models_filtered_by_type->merge($models_filtered_by_category->where('creation_group.filter_key', $type));
                    $type_models_count ++;
                }
            }
         } 
        if ($type_filters_applied == 0) {
            $type_models_count ++;
            $models_filtered_by_type = $models_filtered_by_category;
        }
        if ($type_models_count == 0) {
            return collect([]);
        }

        // Filter remaining creations by color. If no filter selected, keep all previous creations
        $models_filtered_by_color = collect([]);
        $color_filters_applied = 0;
        $color_models_count = 0;
        foreach ($applied_filters['colors'] as $color => $filter_value) {
            if ($filter_value == '1') {
                $color_filters_applied ++;
                // Loop through each article of each filtered model to determine if color is available, and add it to filtered results if yes
                foreach ($models_filtered_by_type as $model_checked_for_color) {
                    $model_ok = 0;
                    // If model has at least one article with the requested color, consider it OK for filtering
                    // Issues on object type. Reset to Creation instance if not set as so.
                    // if (!($model_checked_for_color instanceof Creation)) {
                    //     $model_checked_for_color = $model_checked_for_color->first();
                    // }
                    foreach ($this->getAvailableArticles($model_checked_for_color) as $article) {
                        if ($article->color->name == $color) {
                            $model_ok = 1;
                        }
                    }
                    if ($model_ok == 1) {
                        $color_models_count ++;
                        $models_filtered_by_color->push($model_checked_for_color);
                    }
                }
            }
        }
        if ($color_filters_applied == 0) {
            $color_models_count ++;
            $models_filtered_by_color = $models_filtered_by_type;
        }
        if ($color_models_count == 0) {
            return collect([]);
        }

        // Filter remaining creations by price. If no price filter selected, keep all previous creations
        $models_filtered_by_price = collect([]);
        $price_filters_applied = 0;
        $price_models_count = 0;
        foreach ($applied_filters['prices'] as $price => $filter_value) {
            if ($filter_value == '1') {
                $price_filters_applied ++;
                if ($price == 'more') {
                    if($models_filtered_by_color->where('price', '>', '180')->count() > 0) {
                        $models_filtered_by_price = $models_filtered_by_price->merge($models_filtered_by_color->where('price', '>', '180'));
                        $price_models_count ++;
                    }
                } else {
                    $min_price = intval(explode("-", $price)[0]);
                    $max_price = intval(explode("-", $price)[1]) + 1;
                    if ($models_filtered_by_color->where('price', '>=', $min_price)->where('price', '<', $max_price)->count() > 0) {
                        $models_filtered_by_price = $models_filtered_by_price->merge($models_filtered_by_color->where('price', '>=', $min_price)->where('price', '<', $max_price));
                        $price_models_count ++;
                    }
                }
            }
         } 
        if ($price_filters_applied == 0) {
            $price_models_count ++;
            $models_filtered_by_price = $models_filtered_by_color;
        }
        if ($price_models_count == 0) {
            return collect([]);
        }

        // Filter remaining creations by partner. If no partner selected, keep all previous creations
        $models_filtered_by_partner = collect([]);
        $partner_filters_applied = 0;
        $partner_models_count = 0;
        foreach ($applied_filters['partners'] as $partner => $filter_value) {
            if ($filter_value == '1') {
                $partner_filters_applied ++;
                if ($models_filtered_by_price->where('partner.filter_key', $partner)->count() > 0) {
                    $models_filtered_by_partner = $models_filtered_by_partner->merge($models_filtered_by_price->where('partner.filter_key', $partner));
                    $partner_models_count ++;
                }
            }
         } 
        if ($partner_filters_applied == 0) {
            $partner_models_count ++;
            $models_filtered_by_partner = $models_filtered_by_price;
        }
        if ($partner_models_count == 0) {
            return collect([]);
        }

        // Filter remaining creations by shop. If no shop selected, keep all previous creations
        $models_filtered_by_shop = collect([]);
        $shop_filters_applied = 0;
        $shop_models_count = 0;
        foreach ($applied_filters['shops'] as $shop => $filter_value) {
            if ($filter_value == '1') {
                $shop_filters_applied ++;
                foreach ($models_filtered_by_partner as $model_checked_for_shop) {
                    $model_ok = 0;
                    // If model has at elast one article with the requested color, consider it OK for filtering
                    // if (!($model_checked_for_shop instanceof Creation)) {
                    //     $model_checked_for_shop = $model_checked_for_shop->first();
                    // }
                    foreach ($this->getAvailableArticles($model_checked_for_shop) as $article) {
                        foreach ($article->shops as $article_shop) {
                            if ($article_shop->filter_key == $shop) {
                                $model_ok = 1;
                            }
                        }
                    }
                    if ($model_ok == 1) {
                        $shop_models_count ++;
                        $models_filtered_by_shop->push($model_checked_for_shop);
                    }
                }
            }
         } 
        if ($shop_filters_applied == 0) {
            $shop_models_count ++;
            $models_filtered_by_shop = $models_filtered_by_partner;
        }
        if ($shop_models_count == 0) {
            return collect([]);
        }
        
        $filtered_models = $models_filtered_by_shop;
        
        return $filtered_models;
    }
}