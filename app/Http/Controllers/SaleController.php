<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Voucher;

use Illuminate\Support\Str;

use Stripe;

class SaleController extends Controller
{
    public function showCart()
    {
        if (session('cart_id') !== null && Cart::where('cart_id', session('cart_id'))->count() > 0) {
            $cart = Cart::where('cart_id', session('cart_id'))->first();
            $cart_id = $cart->cart_id;
            $cart_count = $cart->couture_variations()->count();
        } else {
            $cart_id = 0;
            $cart_count = 0;
        }

        return view('cart', ['cart_id' => $cart_id, 'cart_count' => $cart_count]);
    }

    public function showPayment()
    {
        if (session('cart_id') !== null 
            && Cart::where('cart_id', session('cart_id'))->count() > 0 
            && Cart::where('cart_id', session('cart_id'))->first()->couture_variations()->count() > 0) {
            $cart_id = session('cart_id');
            $cart = Cart::where('cart_id', $cart_id)->first();
            session(['payment-ongoing' => 'active']);
            return view('payment', ['cart_id' => $cart_id, 'cart' => $cart]);
        } else {
            return redirect()->route('cart-'.app()->getLocale());
        }
    }

    public function cardPayment(Request $request)
    {
        if (session('cart_id') == null) {
            return redirect()->route('home', ['locale' => app()->getLocale()]);
        }
        if (is_string($request->order) && Order::where('unique_id', substr($request->order, 0, 6))->count() > 0) {
            $order = Order::where('unique_id', substr($request->order, 0, 6))->first();
            if ($order->status == 2) {
                return redirect()->route('payment-processed-'.session('locale'), ['order' => $request->order]);
            }
            $order->status = 1;
            $order->save();

            // This is your test secret API key.
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => intval($order->total_price * 100),
                'currency' => 'eur',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            return view('process-payment', ['order' => $order, 'order_id' => $request->order, 'client_secret' => json_encode($output)]);
        }
    }

    public function validatePayByCard($order, Request $request)
    {
        if (is_string($order) && Order::where('unique_id', substr($order, 0, 6))->count() > 0) {
            $current_order = Order::where('unique_id', substr($order, 0, 6))->first();

            if ($current_order->status == 2) {
                return redirect()->route('payment-processed-'.session('locale'), ['order' => $order]);
            } else {
                $request->session()->forget('cart_id');

                // Include here logic to update all stocks
                foreach ($current_order->cart->couture_variations as $variation) {
                    if ($variation->name !== 'voucher') {
                        // What if variation is available in several shops??
                        $pivot = $variation->available_shops()->first()->pivot;
                        $pivot->decrement('stock', $variation->pivot->articles_number);
                    } else {
                        for ($i=1; $i <= $variation->pivot->articles_number; $i++) { 
                            $increment = rand(0, 9).rand(0, 9);
                            $value_code = str_pad(intval($variation->pivot->value) / 10, 2, '0', STR_PAD_LEFT);
                            $unique_code = "BC".date('mY').$increment.$value_code.Str::random(2).rand(10, 99);
                            while (Voucher::where('unique_code', $unique_code)->count() > 0) {
                                $increment = rand(0, 9).rand(0, 9);
                                $value_code = str_pad(intval($variation->pivot->value) / 10, 2, '0', STR_PAD_LEFT);
                                $unique_code = "BC".date('now')->format('mmYY').$increment.$value_code.Str::random(2).rand(10, 99);
                            }
                            $new_voucher = new Voucher();
                            $new_voucher->unique_code = $unique_code;
                            $new_voucher->user_id = $current_order->user->id;
                            $new_voucher->initial_value = $variation->pivot->value;
                            $new_voucher->remaining_value = $variation->pivot->value;
                            $new_voucher->save();
                        }
                    }
                }

                // Send e-mail with purchase confirmation

                // Send e-mails with vouchers (1 e-mail/voucher)
                $current_order->status = '2';
                if($current_order->save()) {
                    return redirect()->route('payment-processed-'.session('locale'), ['order' => $order]);
                }
            }
        }
    }

    // public function payByCard(Request $request) 
    // {
    //     if (is_string($request->order_id) && Order::where('unique_id', substr($request->order_id, 0, 6))->count() > 0) {
    //         $order = Order::where('unique_id', substr($request->order_id, 0, 6))->first();
    //         $amount = intval($order->total_price * 100);

    //         try {
    //             $order->user->charge(
    //                 $amount, $request->payment_method
    //             );
    //         } catch (\Exception $e) {//\Stripe\Exception\CardException
    //             return redirect()->route('payment-request-'.session('locale'), ['order' => $request->order_id])->with('error', $e->getMessage());
    //         }

    //         $order->status = 2;
    //         if($order->save()) {
    //             return redirect()->route('payment-processed-'.session('locale'), ['order' => $request->order_id]);
    //         }
    //     }
    // }

    public function showValidPayment($order)
    {
        return view('payment-complete', ['order' => Order::where('unique_id', substr($order, 0, 6))->first()]);
    }
}
