<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Illuminate\Support\Str;

use App\Models\Creation;

use Illuminate\Support\Facades\Auth;

use App\Traits\ArticleAnalyzer;

class MaskSidebar extends Component
{
    use ArticleAnalyzer;

    //protected $listeners = ['ArticleModalReady' => "loadArticleDetails"];

    public $age;
    public $creation_id;
    public $pictures;
    public $creation_name;
    public $creation_price;
    public $masks_number;

    public function mount()
    {
        $this->masks_number = 1;
        $this->getCreationData();
    }

    public function getCreationData()
    {
        $creation = Creation::find($this->creation_id);
        $this->creation_name = $creation->name;
        $this->creation_price = $creation->price;
    }

    public function updateMasksNumber($direction = "up")
    {
        if ($direction == "up") {
            $this->masks_number ++;
        } else {
            if ($this->masks_number > 1) {
                $this->masks_number --;
            }
        }
    }

    public function closeMaskSideBar()
    {
        $this->emit('closeMaskSideBar');
    }

    public function render()
    {
        return view('livewire.modals.mask-sidebar');
    }
}
