<?php

namespace App\Exports;

use Illuminate\Support\Collection;

use App\Models\Order;
use App\Traits\DeliveryCalculator;

use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    use DeliveryCalculator;

    protected $year;

    public const VAT_RATE_HIGH_2022 = 17;
    public const VAT_RATE_HIGH_2023 = 16;
    public const VAT_RATE_MEDIUM = 8;
    public const VAT_RATE_LOW = 3;

    public function __construct(int $year, int $month)
    {
        $this->year = 2022;
        if ($year > 1900 && $year < 3000) {
            $this->year = $year;
        }

        $this->month = 1;
        if ($month >= 1 && $month <= 12) {
            $this->month = str_pad($month, 2, '0', STR_PAD_LEFT);
        }
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Create collection manually with headers and order content
        $full_summary = new Collection([['Order ID', 'Total order price (with Delivery)', 'Order Delivery Price', 'Transaction Date', 'Transaction timestamp', 'Payment method', 'Creation Name', 'Article Reference', 'Unit Price WoT', 'VAT', 'Unit VAT price', 'Unit Price WT', 'Extra Options', 'Quantity', 'Final Total Price before Kulturpass', 'Has Kulturpass?', 'Final Total Price after Kulturpass', 'Extra Discount', 'Final Total Price after Kulturpass and extra Discount']]);

        // $latest = new Collection(['bar']);

        // $merged = $original->merge($latest); 

        $collection = $full_summary;

        if ($this->month == 12) {
            $orders = Order::where('payment_status', '>=', '2')
                            ->where('transaction_date', '>=', $this->year.'-'.$this->month.'-01')
                            ->where('transaction_date', '<', ($this->year + 1).'-01-01')
                            ->get();
        } else {
            $orders = Order::where('payment_status', '>=', '2')
                            ->where('transaction_date', '>=', $this->year.'-'.$this->month.'-01')
                            ->where('transaction_date', '<', $this->year.'-'.str_pad($this->month + 1, 2, '0', STR_PAD_LEFT).'-01')
                            ->get();
        }

        foreach ($orders as $order) {
            foreach ($order->cart->couture_variations as $article) {
                // Payment method evaluation
                switch ($order->payment_type) {
                    case 0:
                        $payment_method = "Credit/Debit card";
                        break;

                    case 1:
                        $payment_method = "PayPal";
                        break;

                    case 2:
                        $payment_method = "Payconiq/Digicash";
                        break;

                    case 3:
                        $payment_method = "Bank Transfer";
                        break;

                    case 4:
                        $payment_method = "Voucher";
                        break;

                    case 5:
                        $payment_method = "Paid in shop - Card/SumUp";
                        break;

                    case 6:
                        $payment_method = "Paid in shop - Cash";
                        break;

                    case 7:
                        $payment_method = "Paid in shop - Payconiq";
                        break;
                    
                    default:
                        $payment_method = "Credit/Debit card";
                        break;
                }

                // Kulturpass status evaluation
                if ($article->name == 'voucher') {
                    if ($article->voucher_type == 'pdf') {
                        $has_kulturpass = 'Not applicable';
                    } else {
                        if ($order->with_kulturpass) {
                            $has_kulturpass = 'Yes, on voucher fabrication only';
                        } else {
                            $has_kulturpass = 'No';
                        }
                    }
                } else {
                    if ($order->with_kulturpass) {
                        $has_kulturpass = 'Yes';
                    } else {
                        $has_kulturpass = 'No';
                    }
                }

                // Variation name
                if ($article->name == 'voucher') {
                    if ($article->voucher_type == 'pdf') {
                        $name = "PDF voucher";
                        $reference = "";
                    } else {
                        $name = "Fabric voucher";
                        $reference = "";
                    }
                } else {
                    $name = strtoupper($article->creation->name);
                    $reference = "#".explode('-', $article->name)[1];
                }

                // Price without Tax, VAT rate, Tax price, Unit price with Tax (but no kulturpass)
                if ($article->name == 'voucher') {
                    if ($article->voucher_type == 'pdf') {
                        $price_wo_vat = round($article->pivot->value, 2);
                        $vat_rate = round(0, 2);
                        $vat = round(0, 2);
                        $price_w_vat = $price_wo_vat;
                    } else {
                        if(Carbon::parse($order->transaction_date)->format('Y') == '2022') {
                            $price_wo_vat = round($article->pivot->value + 5 * 1 / (1 + self::VAT_RATE_HIGH_2022 / 100), 2);
                            $vat_rate = self::VAT_RATE_HIGH_2022."% on voucher fabrication only";
                            $vat = round(5 * (1 - 1 / (1 + self::VAT_RATE_HIGH_2022 / 100)), 2);
                        } else {
                            $price_wo_vat = round($article->pivot->value + 5 * 1 / (1 + self::VAT_RATE_HIGH_2023 / 100), 2);
                            $vat_rate = self::VAT_RATE_HIGH_2023."% on voucher fabrication only";
                            $vat = round(5 * (1 - 1 / (1 + self::VAT_RATE_HIGH_2023 / 100)), 2);
                        }
                        $price_w_vat = round($article->pivot->value + 5, 2);
                    }
                } else {
                    if($article->creation->tva_value == 16 && Carbon::parse($order->transaction_date)->format('Y') == '2022') {
                        $price_wo_vat = round($article->creation->price / (1 + self::VAT_RATE_HIGH_2022 / 100), 2);
                        $vat_rate = self::VAT_RATE_HIGH_2022.'%';
                        $vat = round($article->creation->price * (1 - 1 / (1 + self::VAT_RATE_HIGH_2022 / 100)), 2);
                    } else {
                        $price_wo_vat = round($article->creation->price / (1 + $article->creation->tva_value / 100), 2);
                        $vat_rate = $article->creation->tva_value.'%';
                        $vat = round($article->creation->price * (1 - 1 / (1 + $article->creation->tva_value / 100)), 2);
                    }
                    $price_w_vat = round($article->creation->price, 2);
                }

                // Options price
                $options_price = 0;
                if ($article->pivot->with_extra_article) {
                    $options_price += $article->pivot->articles_number * 10;
                }

                if ($article->pivot->with_wrapping) {
                    $options_price += $article->pivot->articles_number * 5;
                }

                if ($article->pivot->with_card) {
                    $options_price += $article->pivot->articles_number * 3;
                }

                // Final price including number of items, but no Kulturpass
                if ($article->name == 'voucher') {
                    if($article->voucher_type == 'pdf') {
                        $final_price_before_kulturpass = $article->pivot->articles_number * $article->pivot->value + $options_price;
                    } else {
                        $final_price_before_kulturpass = $article->pivot->articles_number * ($article->pivot->value + 5) + $options_price;
                    }
                } else {
                    $final_price_before_kulturpass = $article->pivot->articles_number * $article->creation->price + $options_price;
                }

                // Final price including number of items and kulturpass
                if ($article->name == 'voucher') {
                    if($article->voucher_type == 'pdf') {
                        $final_price = $article->pivot->articles_number * $article->pivot->value + $options_price * (1 - 0.5 * intval($order->with_kulturpass));
                    } else {
                        $final_price = $article->pivot->articles_number * ($article->pivot->value + 5 * (1 - 0.5 * intval($order->with_kulturpass))) + $options_price * (1 - 0.5 * intval($order->with_kulturpass));
                    }
                    $final_price_with_discount = $final_price;
                } else {
                    $final_price = $article->pivot->articles_number * $article->creation->price * (1 - 0.5 * intval($order->with_kulturpass)) + $options_price * (1 - 0.5 * intval($order->with_kulturpass));
                    $final_price_with_discount = $final_price * (1 - $order->extra_discount / 100);
                }



                $new_line = new Collection([[
                    $order->unique_id,
                    $order->total_price.'€',
                    ($this->calculateDeliveryTotalFromCart($order->cart) * (1 - 0.5 * intval($order->with_kulturpass))).'€',
                    Carbon::parse($order->transaction_date)->format('d\/m\/Y'),
                    Carbon::parse($order->transaction_date)->format('H:i'),
                    $payment_method,
                    $name,
                    $reference,
                    $price_wo_vat.'€',
                    $vat_rate,
                    $vat.'€',
                    $price_w_vat.'€',
                    $options_price.'€',
                    $article->pivot->articles_number,
                    $final_price_before_kulturpass.'€',
                    $has_kulturpass,
                    $final_price.'€',
                    $order->extra_discount.'%',
                    $final_price_with_discount.'€',
                ]]);

                $collection = $collection->merge($new_line);
            }
        }


        return $collection;
    }
}
