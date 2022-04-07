<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class PaymentTunnelAddressForm extends Component
{
    public $address_id;

    protected $rules = [
        
    ];

    public function createNewAddress()
    {
        $this->validate();

        $this->emit('validateDeliveryStep', $this->address_id);
    }

    public function render()
    {
        return view('livewire.cart.payment-tunnel-address-form');
    }
}
