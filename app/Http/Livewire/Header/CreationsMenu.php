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

        //each table as 'type in correct language' => link ?
        foreach ($this->getAvailableCreations() as $creation) {
            // Fill Unisex arrays
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'unisex')->first()->id) && !($creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id))) {
                $this->unisex_clothes[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'unisex')->first()->id) && $creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id)) {
                $this->unisex_accessories[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }

            // Fill Ladies arrays
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'ladies')->first()->id) && !($creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id))) {
                $this->ladies_clothes[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'ladies')->first()->id) && $creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id)) {
                $this->ladies_accessories[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }

            // Fill Gentlemen arrays
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'gentlemen')->first()->id) && !($creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id))) {
                $this->gentlemen_clothes[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'gentlemen')->first()->id) && $creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id)) {
                $this->gentlemen_accessories[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }

            // Fill Adults arrays
            if (($creation->creation_groups->contains(CreationGroup::where('filter_key', 'unisex')->first()->id) || $creation->creation_groups->contains(CreationGroup::where('filter_key', 'gentlemen')->first()->id) || $creation->creation_groups->contains(CreationGroup::where('filter_key', 'ladies')->first()->id)) && !($creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id))) {
                $this->adults_clothes[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }
            if (($creation->creation_groups->contains(CreationGroup::where('filter_key', 'unisex')->first()->id) || $creation->creation_groups->contains(CreationGroup::where('filter_key', 'gentlemen')->first()->id) || $creation->creation_groups->contains(CreationGroup::where('filter_key', 'ladies')->first()->id)) && $creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id)) {
                $this->adults_accessories[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }

            // Fill Kids arrays
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'kids')->first()->id) && !($creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id))) {
                $this->kids_clothes[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'kids')->first()->id) && $creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id)) {
                $this->kids_accessories[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }

            // Fill Accessories arrays
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id)) {
                $this->accessories[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }

            // Fill Home creations arrays
            if ($creation->creation_groups->contains(CreationGroup::where('filter_key', 'home')->first()->id)) {
                $this->home_creations[$creation->creation_category->$category_query] = $creation->creation_category->filter_key;
            }
        }
    }

    public function render()
    {
        return view('livewire.header.creations-menu');
    }
}
