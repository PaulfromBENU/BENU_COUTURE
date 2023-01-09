<?php

namespace App\Traits;

use App\Models\DeliveryCountry;
use App\Models\Order;
use App\Models\Voucher;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use PDF;

use App\Traits\DeliveryCalculator;

trait PDFGenerator {

    use DeliveryCalculator;

    public $vat_rate_high_2022 = 17;
    public $vat_rate_high = 16;
    public $vat_rate_medium = 8;
    public $vat_rate_low = 3;

	public function generateInvoicePdf($order_code)
    {
        if (strlen($order_code) == 6 && Order::where('unique_id', $order_code)->count() > 0) {
            $order = Order::where('unique_id', $order_code)->first();
            $countries = [];
            $localized_country = "country_".app()->getLocale();
            foreach (DeliveryCountry::all() as $country) {
                $countries[$country->country_code] = $country->$localized_country;
            }
            $countries['Luxembourg'] = 'Luxembourg';
            $countries['France'] = 'France';
            $delivery_cost = $this->calculateDeliveryTotalFromCart($order->cart);

            if (auth()->check()) {
                $current_locale = app()->getLocale();
                app()->setLocale(auth()->user()->favorite_language);
            }

            $vat_rate_high_2022 = $this->vat_rate_high_2022;
            $vat_rate_high = $this->vat_rate_high;
            $vat_rate_medium = $this->vat_rate_medium;
            $vat_rate_low = $this->vat_rate_low;

            $pdf = PDF::loadView('pdfs.invoice', compact('order', 'countries', 'delivery_cost', 'vat_rate_high_2022', 'vat_rate_high', 'vat_rate_medium', 'vat_rate_low'));

            if (auth()->check()) {
                app()->setLocale($current_locale);
            }

            return $pdf;
        }
    }

    public function downloadInvoicePdf($order_code)
    {
        if (strlen($order_code) == 6 && Order::where('unique_id', $order_code)->count() > 0) {
            $order = Order::where('unique_id', $order_code)->first();
            $countries = [];
            $localized_country = "country_".app()->getLocale();
            foreach (DeliveryCountry::all() as $country) {
                $countries[$country->country_code] = $country->$localized_country;
            }
            $countries['Luxembourg'] = 'Luxembourg';
            $countries['France'] = 'France';
            $delivery_cost = $this->calculateDeliveryTotalFromCart($order->cart);

            $vat_rate_high_2022 = $this->vat_rate_high_2022;
            $vat_rate_high = $this->vat_rate_high;
            $vat_rate_medium = $this->vat_rate_medium;
            $vat_rate_low = $this->vat_rate_low;

            $pdf = PDF::loadView('pdfs.invoice', compact('order', 'countries', 'delivery_cost', 'vat_rate_high_2022', 'vat_rate_high', 'vat_rate_medium', 'vat_rate_low'));

            return $pdf;
        }
    }

    public function generateVoucherPdf($voucher_code)
    {
        if (strlen($voucher_code) == 12 && Voucher::where('unique_code', $voucher_code)->count() > 0) {
            $voucher = Voucher::where('unique_code', $voucher_code)->first();

            if (auth()->check()) {
                $current_locale = app()->getLocale();
                app()->setLocale(auth()->user()->favorite_language);
            }

            $pdf = PDF::loadView('pdfs.voucher', compact('voucher'));

            if (auth()->check()) {
                app()->setLocale($current_locale);
            }

            return $pdf;
        }
    }

    public function generateReturnPdf($order_code)
    {
        if (strlen($order_code) == 6 && Order::where('unique_id', $order_code)->count() > 0) {
            $order = Order::where('unique_id', $order_code)->first();

            if (auth()->check()) {
                $current_locale = app()->getLocale();
                app()->setLocale(auth()->user()->favorite_language);
            }

            $pdf = PDF::loadView('pdfs.return', compact('order'));
            $pdf->setPaper('A4', 'landscape');

            if (auth()->check()) {
                app()->setLocale($current_locale);
            }

            return $pdf;
        } elseif ($order_code == '0') {
            $order = null;

            if (auth()->check()) {
                $current_locale = app()->getLocale();
                app()->setLocale(auth()->user()->favorite_language);
            }
            
            $pdf = PDF::loadView('pdfs.return', compact('order'));
            $pdf->setPaper('A4', 'landscape');

            if (auth()->check()) {
                app()->setLocale($current_locale);
            }

            return $pdf;
        }
    }

    public function generateOrderPdf($order_code)
    {
        if (strlen($order_code) == 6 && Order::where('unique_id', $order_code)->count() > 0) {
            $order = Order::where('unique_id', $order_code)->first();
            
            $pdf = PDF::loadView('pdfs.order', compact('order'));
            $pdf->setPaper('A4', 'landscape');

            return $pdf;
        }
    }
}