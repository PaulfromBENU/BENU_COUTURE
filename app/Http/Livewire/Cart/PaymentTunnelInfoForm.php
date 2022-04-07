<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class PaymentTunnelInfoForm extends Component
{
    // Info data
    public $gender;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;

    public $rules = [
        'gender' => 'nullable|string',
        'first_name' => 'required|string|min:2|max:255',
        'last_name' => 'required|string|min:2|max:255',
        'email' => 'email|required',
        'phone' => 'required|string|min:4|max:20',
    ];

    public function validateInfo()
    {
        $this->validate();
        
        $info = [];
        if ($this->gender == null) {
            $this->gender = "";
        }
        $info['gender'] = $this->gender;
        $info['first_name'] = $this->first_name;
        $info['last_name'] = $this->last_name;
        $info['email'] = $this->email;
        $info['phone'] = $this->phone;

        $this->emit('infoValidated', $info);
    }

    public function render()
    {
        return view('livewire.cart.payment-tunnel-info-form');
    }
}
