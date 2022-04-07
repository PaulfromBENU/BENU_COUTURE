<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

use App\Models\Address;

class PaymentTunnel extends Component
{
    public $cart_id;
    public $step;
    public $fill_info;
    public $info_valid;
    public $fill_address;
    public $address_valid;

    // Info data
    public $order_gender;
    public $order_first_name;
    public $order_last_name;
    public $order_email;
    public $order_phone;

    // Address data
    public $order_address_id;
    public $address_chosen;
    // public $delivery_address;
    // public $delivery_address_name;
    // public $delivery_address_first_name;
    // public $delivery_address_last_name;
    // public $delivery_address_street;
    // public $delivery_address_street_number;
    // public $delivery_address_floor;
    // public $delivery_address_zip_code;
    // public $delivery_address_city;
    // public $delivery_address_phone;

    protected $listeners = ['infoValidated' => 'validateInfoStep', 'addressValidated' => 'validateDeliveryStep'];

    public function mount()
    {
        $this->info_valid = 0;
        $this->address_valid = 0;
        $this->address_chosen = 0;

        if (auth()->check()) {
            $this->step = 2;
            $this->info_valid = 1;
            if (auth()->user()->addresses()->count() == 1) {
                $this->order_address_id = auth()->user()->addresses()->first()->id;
            }
        } else {
            $this->step = 1;
        }

        $this->fill_info = 0;
        $this->fill_address = 0;
    }

    public function changeStep(int $step)
    {
        if ($step == 1 & $this->step !== 1) {
            if (!auth()->check()) {
                $this->step = $step;
                $this->info_valid = 0;
                // $this->resetOptions();
            }
        }

        if ($step == 2) {
            if ($this->info_valid == 1) {
                $this->step = $step;
                // $this->resetOptions();
            }
        }

        if ($step == 3) {
            if ($this->info_valid == 1 && $this->address_valid == 1) {
                $this->step = $step;
            }
        }
    }

    public function addInfo()
    {
        $this->fill_info = 1;
    }

    public function validateInfoStep($info)
    {
        $this->order_gender = $info['gender'];
        $this->order_first_name = $info['first_name'];
        $this->order_last_name = $info['last_name'];
        $this->order_email = $info['email'];
        $this->order_phone = $info['phone'];

        $this->info_valid = 1;
        $this->step = 2;
    }

    public function addAddress()
    {
        $this->fill_address = 1;
    }

    public function changeAddress()
    {
        $this->address_chosen = 0;
    }

    public function validateDeliveryStep($address_id)
    {
        $this->order_address_id = $address_id;

        $this->address_valid = 1;
        $this->step = 3;
    }

    public function resetOptions()
    {
        // $this->fill_info = 0;
    }

    public function render()
    {
        if (Address::find($this->order_address_id)) {
            return view('livewire.cart.payment-tunnel', [
                'delivery_address' => Address::find($this->order_address_id),
            ]);
        }
        return view('livewire.cart.payment-tunnel', [
            'delivery_address' => collect([]),
        ]);
    }
}
