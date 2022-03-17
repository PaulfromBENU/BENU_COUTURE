<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use App\Models\Article;

use Illuminate\Support\Facades\Auth;

use App\Traits\ArticleAnalyzer;

class VoucherSidebar extends Component
{
    use ArticleAnalyzer;

    public $voucher;
    public $voucher_id;
    public $content;
    public $singularity_query;
    public $is_wishlisted;

    public $voucher_value;
    public $voucher_type;

    protected $listeners = ['VoucherModalReady' => "loadVoucherDetails"];

    protected $rules = [
        'voucher_value' => 'required|integer',
        'voucher_type' => 'required|string',
    ];

    public function mount()
    {
        $this->voucher = collect([]);
        $this->content = 'overview';
        $this->singularity_query = "singularity_".app()->getLocale();
        $this->is_wishlisted = 0;
        $this->voucher_value = 30;
        $this->voucher_type = "pdf";
    }

    public function loadVoucherDetails(int $voucher_id)
    {
        $this->voucher_id = $voucher_id;

        if(Article::where('id', $voucher_id)->count() > 0) {
            $this->voucher = Article::find($voucher_id);

            // Load wishlist status
            if (auth::check()) {
                if (auth::user()->wishlistArticles->contains($this->voucher_id)) {
                    $this->is_wishlisted = 1;
                } else {
                    $this->is_wishlisted = 0;
                }
            }

            //Select voucher type
            if ($this->voucher->voucher_type == '1') {
                $this->voucher_type = "fabric";
            } else {
                $this->voucher_type = "pdf";
            }

            // Send loading confirmation to JS
            $this->emit('voucherLoaded');
        }
    }

    public function updateValue($value)
    {
        $value = (int) $value;
        if (in_array($value, [30, 60, 90, 120, 150, 180])) {
            $this->voucher_value = $value;
        }
    }

    public function switchDisplay($action)
    {
        switch ($action) {
            case 'overview':
                $this->content = 'overview';
                break;

            case 'delivery':
                $this->content = 'delivery';
                break;

            case 'more':
                $this->content = 'more';
                break;
            
            default:
                $this->content = 'overview';
                break;
        }
        $this->emit('sidebarChange');
    }

    public function addToCart()
    {
        $this->validate();
        dd("Voucher with value ".$this->voucher_value."eur and format ".$this->voucher_type." ordered. Cart and order logic to be developped from here.");
    }

    // public function updateMasksNumber($direction = "up")
    // {
    //     if ($direction == "up") {
    //         $this->masks_number ++;
    //     } else {
    //         if ($this->masks_number > 1) {
    //             $this->masks_number --;
    //         }
    //     }
    //     $this->emit('sidebarChange');
    // }

    // public function submitMasksRequest()
    // {
    //     $this->validate();

    //     $new_mask_order = new MaskOrder();
    //     $new_mask_order->creation_id = $this->creation_id;
    //     if ($this->with_filter != null && in_array($this->with_filter, ['0', '1'])) {
    //         $new_mask_order->with_filter = $this->with_filter;
    //     } else {
    //         $new_mask_order->with_filter = '0';
    //     }

    //     if ($this->with_cotton != null && in_array($this->with_cotton, ['0', '1'])) {
    //         $new_mask_order->with_cotton = $this->with_cotton;
    //     } else {
    //         $new_mask_order->with_cotton = '0';
    //     }

    //     if ($this->size != null && in_array($this->size, ['small', 'large'])) {
    //         $new_mask_order->size = $this->size;
    //     } else {
    //         $new_mask_order->size = 'small';
    //     }

    //     if ($this->masks_number >= 1) {
    //         $new_mask_order->requested_number = $this->masks_number;
    //     } else {
    //         $new_mask_order->requested_number = '1';
    //     }

    //     if ($this->text_demand != null) {
    //         $new_mask_order->text_demand = $this->text_demand;
    //     } else {
    //         $new_mask_order->text_demand = "";
    //     }

    //     $new_mask_order->email = $this->email;

    //     if ($this->with_pictures != null) {
    //         $new_mask_order->with_pictures = '1';
    //     } else {
    //         $new_mask_order->with_pictures = '0';
    //     }

    //     if ($new_mask_order->save()) {
    //         $this->status = 'sent';
    //     }
    // }

    public function toggleWishlist()
    {
        if(auth::check()) {
            if ($this->is_wishlisted == 0) {
                auth::user()->wishlistArticles()->attach($this->voucher->id);
                $this->is_wishlisted = 1;
            } else {
                auth::user()->wishlistArticles()->detach($this->voucher->id);
                $this->is_wishlisted = 0;
            }
        }
        $this->emit('wishlistUpdated', $this->voucher->id);
    }

    public function closeVoucherSideBar()
    {
        $this->emit('closeVoucherSideBar');
    }

    public function render()
    {
        return view('livewire.modals.voucher-sidebar');
    }
}
