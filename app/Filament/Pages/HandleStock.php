<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Models\Article;
use App\Models\Creation;
use App\Models\Shop;

use App\Traits\ArticleAnalyzer;

class HandleStock extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static string $view = 'filament.pages.handle-stock';

    protected static ?string $title = 'Handle variations stock';
 
    protected static ?string $navigationLabel = 'Stock handling';
     
    protected static ?string $slug = 'stock-handling';

    protected static ?string $navigationGroup = 'Seller & Sales';

    protected static ?int $navigationSort = 5;

    public $all_creations;
    public $all_shops;
    public $computed_variations;
    public $stock_by_shop;
    public $creation_name;
    public $variation_name;
    public $max_items;

    public function mount()
    {
        $this->loadStaticData();
        $this->computed_variations = collect([]);
        $this->stock_by_shop = [];
        $this->creation_name = 'none-0';
        $this->variation_name = 'none-0';
        $this->max_items = 1;
    }

    public function loadStaticData()
    {
        $this->all_creations = Creation::all()->sortBy('name');
        $this->all_shops = Shop::all();
    }

    public function adaptVariations($creation_id)
    {
        $this->clearItem();
        $this->loadStaticData();
        if ($creation_id == '0') {
            $this->computed_variations = collect([]);
        } elseif (Creation::find($creation_id)) {
            $this->computed_variations = Creation::find($creation_id)->articles;
        }
    }

    public function adaptStock()
    {
        foreach ($this->all_shops as $shop) {
            $this->stock_by_shop[$shop->filter_key] = 0;
            if ($shop->articles()->where('name', $this->variation_name)->count() > 0) {
                $this->stock_by_shop[$shop->filter_key] = $shop->articles()->where('name', $this->variation_name)->first()->pivot->stock;
            }
        }
    }

    public function clearItem()
    {
        $this->variation_name = 'none-0';
        $this->computed_variations = collect([]);
        $this->stock_by_shop = [];
        $this->loadStaticData();
    }

    public function saveStock()
    {
        if (Creation::where('name', $this->creation_name)->count() > 0
            && Article::where('name', $this->variation_name)->count() > 0) {

            foreach ($this->stock_by_shop as $shop => $stock) {
                if (Article::where('name', $this->variation_name)->first()->shops()->where('shops.filter_key', $shop)->count() > 0) {
                    $pivot = Article::where('name', $this->variation_name)->first()->shops()->where('shops.filter_key', $shop)->first()->pivot;
                    $pivot->stock = $stock;
                    $pivot->save();
                } else {
                    $shop_id = Shop::where('filter_key', $shop)->first()->id;
                    $updated_article = Article::where('name', $this->variation_name)->first();
                    $updated_article->shops()->attach($shop_id, ['stock' => $stock]);
                }
            }
            
            $this->notify('success', 'The stock for variation '.$this->variation_name.' was correctly updated in the database :)');
            // Reset data
            $this->creation_name = 'none-0';
            $this->clearItem();
        } else {
            $this->notify('danger', 'An error occured, please check the content or contact the administrator.');
        }
    }
}
