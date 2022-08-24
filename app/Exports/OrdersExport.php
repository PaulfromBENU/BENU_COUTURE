<?php

namespace App\Exports;

use Illuminate\Support\Collection;

use App\Models\Order;

use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    protected $year;

    public function __construct(int $year)
    {
        $this->year = 2022;
        if ($year > 1900 && $year < 3000) {
            $this->year = $year;
        }
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Create collection manually with headers and order content

        $full_summary = new Collection([['Order ID', 'Total order price', 'Transaction Date', 'Delivery or Collect Date', 'Has Kulturpass?']]);

        // $latest = new Collection(['bar']);

        // $merged = $original->merge($latest); 

        $collection = Order::where('payment_status', '>=', '2')
                        ->where('transaction_date', '>=', $this->year.'-01-01')
                        ->where('transaction_date', '<', ($this->year + 1).'-01-01')
                        ->select(['unique_id', 'total_price', 'transaction_date', 'delivery_date', 'with_kulturpass'])
                        ->get();

        $collection = $full_summary->merge($collection);

        // dd($full_summary, $collection);

        return $collection;
    }
}
