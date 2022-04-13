<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

use Illuminate\Support\Str;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;

use App\Traits\CartAnalyzer;

class PaymentTunnel extends Component
{
    use CartAnalyzer;

    public $cart_id;
    public $step;
    public $fill_info;
    public $info_valid;
    public $fill_address;
    public $address_valid;
    public $country_code;

    // Info data
    public $order_gender;
    public $order_first_name;
    public $order_last_name;
    public $order_email;
    public $order_phone;

    // Address data
    public $order_address_id;
    public $address_chosen;
    public $address_name;

    protected $listeners = ['infoValidated' => 'validateInfoStep', 'newAddressCreated' => 'selectAddress', 'newAddressCancelled' => 'unselectAddress'];

    public function mount()
    {
        $this->info_valid = 0;
        $this->address_valid = 0;
        $this->address_chosen = 0;
        $this->country_code = "LU";

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

        $this->address_name = "";
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
                $this->address_valid = 0;
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
        $this->fill_address = 0;
    }

    public function selectAddress($address_id)
    {
        if (Address::find($address_id)) {
            $this->order_address_id = $address_id;
            $this->address_chosen = 1;
            $this->fill_address = 0;
        }
    }

    public function unselectAddress()
    {
        $this->address_chosen = 0;
        $this->fill_address = 0;
    }

    public function validateDeliveryStep()
    {
        if (Address::find($this->order_address_id)) {
            $country = Address::find($this->order_address_id)->country;
            if ($country == 'France') {
                $this->country_code = "FR";
            } elseif ($country == "Luxembourg") {
                $this->country_code = "LU";
            } else {
                $this->country_code = $country;
            }
            $this->emit('addressUpdated', $this->country_code);
            $this->address_valid = 1;
            $this->step = 3;
            $this->address_name = Address::find($this->order_address_id)->address_name;
        }
    }

    public function resetOptions()
    {
        // $this->fill_info = 0;
    }

    public function validateOrder($payment_type)
    {
        if (Cart::where('cart_id', $this->cart_id)->count() > 0) {
            // Create new user if not auth
            if (!auth()->check()) {
                if (User::where('email', $this->order_email)->count() > 0) {
                    $user = User::where('email', $this->order_email)->first();
                    $user->first_name = $this->order_first_name;
                    $user->last_name = $this->order_last_name;
                    $user->gender = $this->order_gender;
                    $user->phone = $this->order_phone;

                    $user->save();
                } else {
                    //Client number created randomly  - C#####
                    $client_number = "C".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
                    while (User::where('client_number', $client_number)->count() > 0) {
                        $client_number = "C".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
                    }

                    $user = User::create([
                        'email' => $this->order_email,
                        'role' => 'guest_client',
                        'first_name' => $this->order_first_name,
                        'last_name' => $this->order_last_name,
                        'gender' => $this->order_gender,
                        'phone' => $this->order_phone,
                        'is_over_18' => '1',
                        'legal_ok' => '1',
                        'newsletter' => '0',
                        'origin' => 'couture',
                        'general_comment' => "",
                        'client_number' => $client_number,
                    ]);
                }

                $user_id = $user->id;
            } else {
                $user_id = auth()->user()->id;
            }

            $order_number = "T".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
            while (Order::where('unique_id', $order_number)->count() > 0) {
                $order_number = "T".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
            }

            $new_order = new Order();
            $new_order->unique_id = $order_number;
            $new_order->cart_id = Cart::where('cart_id', $this->cart_id)->first()->id;
            $new_order->user_id = $user_id;
            $new_order->address_id = $this->order_address_id;
            $new_order->total_price = $this->computeTotal($this->cart_id, $this->country_code);
            $new_order->status = '0';

            switch ($payment_type) {
                case 'card':
                    $new_order->payment_type = 0;
                    break;

                case 'paypal':
                    $new_order->payment_type = 1;
                    break;

                case 'payconic':
                    $new_order->payment_type = 2;
                    break;

                case 'transfer':
                    $new_order->payment_type = 3;
                    break;
                
                default:
                    $new_order->payment_type = 3;
                    break;
            }

            if ($new_order->save()) {
                switch ($payment_type) {
                    case 'card':
                        return redirect()->route('payment-request-'.app()->getLocale(), ['order' => strtolower($new_order->unique_id).Str::random(12)]);
                        break;

                    case 'transfer':
                        return redirect()->route('payment-validate-'.app()->getLocale(), ['order' => strtolower($new_order->unique_id).Str::random(12)]);
                        break;
                    
                    default:
                        dd('Logic not developed yet for this payment method.');
                        break;
                }
            }
        }
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
