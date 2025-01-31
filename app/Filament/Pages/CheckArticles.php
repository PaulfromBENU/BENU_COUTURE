<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;

use App\Models\Article;
use App\Models\CareRecommendation;
use App\Models\Color;
use App\Models\Composition;
use App\Models\Creation;
use App\Models\Photo;
use App\Models\Shop;
use App\Models\Size;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CheckArticles extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static string $view = 'filament.pages.check-articles';

    protected static ?string $title = 'Add infos to new variations';
 
    protected static ?string $navigationLabel = 'New Variation - Infos';
     
    protected static ?string $slug = 'check-articles';

    protected static ?string $navigationGroup = 'Creations & Variations';

    protected static ?int $navigationSort = 5;

    protected static function shouldRegisterNavigation(): bool
    {
        $authorized_roles = [
            'admin',
            'translator',
            'workshop',
        ];
        return in_array(auth()->user()->role, $authorized_roles);
    }

    public $unchecked_articles;
    public $size_ids = [];
    public $color_ids = [];
    public $delivery_sizes = [];
    public $all_sizes = [];
    public $all_colors = [];
    public $all_shops = [];
    public $all_compos = [];
    public $all_cares = [];
    public $stocks;
    public $compo_ids = [];
    public $care_ids = [];
    public $singularities_fr = [];
    public $singularities_de = [];
    public $singularities_en = [];
    public $singularities_lu = [];
    public $base_variation_compos = [];
    public $base_variation_cares = [];

    protected $rules = [
        'size_ids[*]' => 'required|integer|min:1',
        'color_ids[*]' => 'required|integer|min:1',
        'delivery_sizes[*]' => 'required|integer|max:3'
    ];

    public function mount()
    {
        foreach (Size::select('id', 'value')->get() as $size) {
            $this->all_sizes[$size->id] = $size->value;
        }
        foreach (Color::select('id', 'name')->get() as $color) {
            $this->all_colors[$color->id] = $color->name;
        }
        foreach (Shop::select('id', 'name')->get() as $shop) {
            $this->all_shops[$shop->id] = $shop->name;
        }
        foreach (Composition::select('id', 'fabric_en')->get() as $composition) {
            $this->all_compos[$composition->id] = $composition->fabric_en;
        }
        foreach (CareRecommendation::select('id', 'description_en')->get() as $care) {
            $this->all_cares[$care->id] = $care->description_en;
        }

        $this->updateArticles();
    }

    public function updateArticles()
    {
        $this->unchecked_articles = Article::where('to_be_validated', '0')->orderBy('created_at', 'asc')->get();
        // self::$navigationLabel = "Vérification Articles (".$this->unchecked_articles->count().")";

        if ($this->unchecked_articles->count() > 0) {
            foreach ($this->unchecked_articles as $article) {
                $this->size_ids[$article->id] = $article->size->id;
                $this->color_ids[$article->id] = $article->color->id;
                $this->stocks[$article->id] = [];

                foreach ($this->all_shops as $shop_id => $shop_name) {
                    if ($article->shops->contains($shop_id)) {
                        $this->stocks[$article->id][$shop_id] = $article->shops()->where('shops.id', $shop_id)->first()->pivot->stock;
                    } else {
                        $this->stocks[$article->id][$shop_id] = 0;
                    }
                }

                // Pre-fill of variation packaging option
                // If variation from the same creation is already present, use it as reference for the packaging
                if($article->creation->all_articles()->count() > 0) {
                    $base_article = $article->creation->all_articles()->orderBy('created_at', 'asc')->first();
                    $this->delivery_sizes[$article->id] = $base_article->size_category;
                }

                // Pre-fill of variation composition
                // Check of existing compositions saved
                $has_compo = false;
                foreach ($this->all_compos as $compo_id => $fabric) {
                    if ($article->compositions->contains($compo_id)) {
                        $this->compo_ids[$article->id][$compo_id] = true;
                        $has_compo = true;
                    } else {
                        $this->compo_ids[$article->id][$compo_id] = false;
                    }
                }

                // If no composition has been saved so far, use composition of the first variation created for this creation
                if (!$has_compo) {
                    if($article->creation->all_articles()->count() > 0) {
                        $base_article = $article->creation->all_articles()->orderBy('created_at', 'asc')->first();
                        $this->base_variation_compos[$article->id] = $base_article->name;
                        foreach ($this->all_compos as $compo_id => $fabric) {
                            if ($base_article->compositions->contains($compo_id)) {
                                $this->compo_ids[$article->id][$compo_id] = true;
                            } else {
                                $this->compo_ids[$article->id][$compo_id] = false;
                            }
                        }
                    }
                } else {
                    $this->base_variation_compos[$article->id] = 'none';
                }

                // Pre-fill of variation care recommendations
                // Check of existing recommendations saved
                $has_care = false;
                foreach ($this->all_cares as $care_id => $desc) {
                    if ($article->care_recommendations->contains($care_id)) {
                        $this->care_ids[$article->id][$care_id] = true;
                        $has_care = true;
                    } else {
                        $this->care_ids[$article->id][$care_id] = false;
                    }
                }

                // If no care recommendation has been saved so far, use recommendation of the first variation created for this creation
                if (!$has_care) {
                    if($article->creation->all_articles()->count() > 0) {
                        $base_article = $article->creation->all_articles()->orderBy('created_at', 'asc')->first();
                        $this->base_variation_cares[$article->id] = $base_article->name;
                        foreach ($this->all_cares as $care_id => $desc) {
                            if ($base_article->care_recommendations->contains($care_id)) {
                                $this->care_ids[$article->id][$care_id] = true;
                            } else {
                                $this->care_ids[$article->id][$care_id] = false;
                            }
                        }
                    }
                } else {
                    $this->base_variation_cares[$article->id] = 'none';
                }

                $this->singularities_de[$article->id] = $article->singularity_de;
                $this->singularities_lu[$article->id] = $article->singularity_lu;
                $this->singularities_en[$article->id] = $article->singularity_en;
                $this->singularities_fr[$article->id] = $article->singularity_fr;
            }
        }
    }

    public function deletePhoto($article_id, $photo_id)
    {
        if (Article::find($article_id) && Photo::find($photo_id)) {
            $article = Article::find($article_id);
            $photo = Photo::find($photo_id);
            $article->photos()->detach($photo_id);
            File::delete(public_path('images/pictures/articles/'.$photo->file_name));
            $this->notify('success', 'Photo deleted!');
            $this->updateArticles();
        }
    }

    public function deleteVariation($article_id)
    {
        if (Article::find($article_id)) {
            $article = Article::find($article_id);
            foreach ($article->photos()->get() as $photo) {
                $article->photos()->detach($photo->id);
                File::delete(public_path('images/pictures/articles/'.$photo->file_name));
            }
            $article->shops()->detach();
            $article->delete();
            $this->notify('success', 'Variation deleted!');
            $this->updateArticles();
        }
    }

    public function validateSingularities($article_id)
    {
        if (Article::find($article_id)) {
            $article = Article::find($article_id);

            if ($this->singularities_de[$article_id] !== null) {
                $article->singularity_de = $this->singularities_de[$article_id];
            } else {
                $article->singularity_de = "";
            }
            if ($this->singularities_fr[$article_id] !== null) {
                $article->singularity_fr = $this->singularities_fr[$article_id];
            } else {
                $article->singularity_fr = "";
            }
            if ($this->singularities_lu[$article_id] !== null) {
                $article->singularity_lu = $this->singularities_lu[$article_id];
            } else {
                $article->singularity_lu = "";
            }
            if ($this->singularities_en[$article_id] !== null) {
                $article->singularity_en = $this->singularities_en[$article_id];
            } else {
                $article->singularity_en = "";
            }

            if ($article->save()) {
                $this->notify('success', 'Singularities for article '.$article->name.' have been updated!');
                $this->updateArticles();
                // $this->emit('variationChecked');
            }
        }
    }

    public function validateArticle($article_id)
    {
        if (Article::find($article_id)) {
            $article = Article::find($article_id);
            $article->size_id = $this->size_ids[$article_id];
            $article->color_id = $this->color_ids[$article_id];
            $article->size_category = $this->delivery_sizes[$article_id];

            // Update stocks and shops
            foreach ($this->stocks[$article_id] as $shop_id => $stock) {
                if ($article->shops->contains($shop_id)) {
                    $article->shops()->updateExistingPivot($shop_id, [
                        'stock' => $stock,
                    ]);
                } else {
                    if ($stock > 0) {
                        $article->shops()->attach($shop_id, [
                            'stock' => $stock,
                        ]);
                    }
                }
            }

            // Update composition, after reset
            $article->compositions()->detach();
            foreach ($this->compo_ids[$article_id] as $compo_id => $value) {
                if ($value == true) {
                    $article->compositions()->attach($compo_id);
                }
            }

            // Update care recommendations, after reset
            $article->care_recommendations()->detach();
            foreach ($this->care_ids[$article_id] as $care_id => $value) {
                if ($value == true) {
                    $article->care_recommendations()->attach($care_id);
                }
            }

            if ($this->singularities_de[$article_id] !== null) {
                $article->singularity_de = $this->singularities_de[$article_id];
            } else {
                $article->singularity_de = "";
            }
            if ($this->singularities_fr[$article_id] !== null) {
                $article->singularity_fr = $this->singularities_fr[$article_id];
            } else {
                $article->singularity_fr = "";
            }
            if ($this->singularities_lu[$article_id] !== null) {
                $article->singularity_lu = $this->singularities_lu[$article_id];
            } else {
                $article->singularity_lu = "";
            }
            if ($this->singularities_en[$article_id] !== null) {
                $article->singularity_en = $this->singularities_en[$article_id];
            } else {
                $article->singularity_en = "";
            }
            
            $article->to_be_validated = '1';
            
            if ($article->save()) {
                $this->notify('success', 'Article '.$article->name.' has been updated and is now ready for validation!');
                $this->updateArticles();
                $this->emit('variationChecked');
            }
        }
    }
}
