<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SoldArticleOverview extends Component
{
    public $article;
    public $localized_creation_category;
    public $pictures;
    public $current_picture_index;

    public function mount()
    {
        $localized_query = 'name_'.app()->getLocale();
        $this->localized_creation_category = $this->article->creation->creation_category->$localized_query;

        if ($this->article->photos->count() == 0) {
            $this->pictures = collect(['modele_caretta_1.png']);// Change to default picture
        } else {
            $this->pictures = collect([]);
            foreach ($this->article->photos as $photo) {
                $this->pictures = $this->pictures->push($photo->file_name);
            }
        }
        $this->current_picture_index = 0;
    }

    public function changePicture(string $side)
    {
        $pictures_number = $this->pictures->count();
        if ($side == 'left') {
            if ($this->current_picture_index == 0) {
                $this->current_picture_index = $pictures_number - 1;
            } else {
                $this->current_picture_index --;
            }
        } else {
            if ($this->current_picture_index == $pictures_number - 1) {
                $this->current_picture_index = 0;
            } else {
                $this->current_picture_index ++;
            }
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
