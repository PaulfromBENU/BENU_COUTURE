<?php

namespace App\Http\Livewire\Header;

use Livewire\Component;

use App\Models\CreationGroup;
use App\Models\Creation;
use App\Traits\ArticleAnalyzer;

class CreationsMenu extends Component
{
    use ArticleAnalyzer;

    public $unisex_clothes;
    public $unisex_accessories;
    public $adults_clothes;
    public $adults_accessories;
    public $new_adults_clothes;
    public $new_adults_accessories;
    public $ladies_clothes;
    public $ladies_accessories;
    public $gentlemen_clothes;
    public $gentlemen_accessories;
    public $kids_clothes;
    public $kids_accessories;
    public $accessories;
    public $home_creations;

    public function mount()
    {
        $this->unisex_clothes = [];
        $this->unisex_accessories = [];
        $this->adults_clothes = [];
        $this->adults_accessories = [];
        $this->new_adults_clothes = [];
        $this->new_adults_accessories = [];
        $this->ladies_clothes = [];
        $this->ladies_accessories = [];
        $this->gentlemen_clothes = [];
        $this->gentlemen_accessories = [];
        $this->kids_clothes = [];
        $this->kids_accessories = [];
        $this->accessories = [];
        $this->home_creations = [];

        $this->computeHeaderContent();
    }

    public function computeHeaderContent()
    {
        $category_query = "name_".app()->getLocale();
        $unisex_id = CreationGroup::where('filter_key', 'unisex')->first()->id;
        $ladies_id = CreationGroup::where('filter_key', 'ladies')->first()->id;
        $gentlemen_id = CreationGroup::where('filter_key', 'gentlemen')->first()->id;
        $kids_id = CreationGroup::where('filter_key', 'kids')->first()->id;
        $home_id = CreationGroup::where('filter_key', 'home')->first()->id;
        $accessories_id = CreationGroup::where('filter_key', 'accessories')->first()->id;

        foreach ($this->getAvailableCreations() as $creation) {
            $filter_key = $creation->creation_category->filter_key;
            $query = $creation->creation_category->$category_query;
            
            // Fill Unisex arrays
            if ($creation->creation_groups->contains($unisex_id) && !($creation->creation_groups->contains($accessories_id))) {
                $this->unisex_clothes[$query] = $filter_key;
            }
            if ($creation->creation_groups->contains($unisex_id) && $creation->creation_groups->contains($accessories_id)) {
                $this->unisex_accessories[$query] = $filter_key;
            }

            // Fill Ladies arrays
            if ($creation->creation_groups->contains($ladies_id) && !($creation->creation_groups->contains($accessories_id))) {
                $this->ladies_clothes[$query] = $filter_key;
            }
            if ($creation->creation_groups->contains($ladies_id) && $creation->creation_groups->contains($accessories_id)) {
                $this->ladies_accessories[$query] = $filter_key;
            }

            // Fill Gentlemen arrays
            if ($creation->creation_groups->contains($gentlemen_id) && !($creation->creation_groups->contains($accessories_id))) {
                $this->gentlemen_clothes[$query] = $filter_key;
            }
            if ($creation->creation_groups->contains($gentlemen_id) && $creation->creation_groups->contains($accessories_id)) {
                $this->gentlemen_accessories[$query] = $filter_key;
            }

            // Fill Adults arrays
            // if (($creation->creation_groups->contains($unisex_id) || $creation->creation_groups->contains($gentlemen_id) || $creation->creation_groups->contains($ladies_id)) && !($creation->creation_groups->contains($accessories_id))) {
            //     $this->adults_clothes[$query] = $filter_key;
            // }
            // if (($creation->creation_groups->contains($unisex_id) || $creation->creation_groups->contains($gentlemen_id) || $creation->creation_groups->contains($ladies_id)) && $creation->creation_groups->contains($accessories_id)) {
            //     $this->adults_accessories[$query] = $filter_key;
            // }

            // Fill Kids arrays
            if ($creation->creation_groups->contains($kids_id) && !($creation->creation_groups->contains($accessories_id))) {
                $this->kids_clothes[$query] = $filter_key;
            }
            if ($creation->creation_groups->contains($kids_id) && $creation->creation_groups->contains($accessories_id)) {
                $this->kids_accessories[$query] = $filter_key;
            }

            // Fill Accessories arrays
            if ($creation->creation_groups->contains($accessories_id)) {
                $this->accessories[$query] = $filter_key;
            }

            // Fill Home creations arrays
            if ($creation->creation_groups->contains($home_id)) {
                $this->home_creations[$query] = $filter_key;
            }
        }

        $this->adults_clothes = array_merge($this->unisex_clothes, $this->ladies_clothes, $this->gentlemen_clothes);
        $this->adults_accessories = array_merge($this->unisex_accessories, $this->ladies_accessories, $this->gentlemen_accessories);
    }

    public function render()
    {
        return view('livewire.header.creations-menu');
    }
}
