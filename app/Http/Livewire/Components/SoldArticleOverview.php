<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SoldArticleOverview extends Component
{
    public $article;
    public $localized_creation_category;
    public $pictures;

    public function mount()
    {
        $localized_query = 'name_'.app()->getLocale();
        $this->localized_creation_category = $this->article->creation->creation_category->$localized_query;

        if ($this->article->photos->count() == 0) {
            $this->pictures = collect(['modele_caretta_1.png']);// Change to default picture
        } else {
            $this->pictures = $this->article->photos;
        }
    }

    public function toggleWishlist()
    {
        
    }
    
    public function render()
    {
        return view('livewire.components.sold-article-overview');
    }
}
