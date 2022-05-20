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
            $pdf = PDF::loadView('pdfs.invoice', compact('order', 'countries', 'delivery_cost'));
            return $pdf;
        }
    }

    public function generateVoucherPdf($voucher_code)
    {
        if (strlen($voucher_code) == 12 && Voucher::where('unique_code', $voucher_code)->count() > 0) {
            $voucher = Voucher::where('unique_code', $voucher_code)->first();
            $pdf = PDF::loadView('pdfs.voucher', compact('voucher'));

            return $pdf;
        }
    }

    public function generateReturnPdf($order_code)
    {
        if (strlen($order_code) == 6 && Order::where('unique_id', $order_code)->count() > 0) {
            $order = Order::where('unique_id', $order_code)->first();

            $pdf = PDF::loadView('pdfs.return', compact('order'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf;
        } elseif ($order_code == '0') {
            $order = null;
            $pdf = PDF::loadView('pdfs.return', compact('order'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf;
        }
    }
}