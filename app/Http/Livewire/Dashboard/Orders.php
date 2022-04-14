<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use App\Models\Order;

class Orders extends Component
{
    public $show_details;
    public $detailed_order_id;

    public function mount()
    {
        $this->show_details = 0;
        $this->detailed_order_id = 0;
    }

    public function showDetails($order_id)
    {
        $this->show_details = 1;
        if (auth()->user()->orders()->find($order_id)) {
            $this->detailed_order_id = $order_id;
        }
    }

    public function hideDetails()
    {
        $this->detailed_order_id = 0;
        $this->show_details = 0;
    }

    public function render()
    {
        if ($this->detailed_order_id == 0) {
            return view('livewire.dashboard.orders', ['orders' => auth()->user()->orders()->where('status', '>', '0')->orderBy('created_at', 'desc')->get()]);
        } else {
            return view('livewire.dashboard.orders', ['order' => auth()->user()->orders()->find($this->detailed_order_id)]);
        }
    }
}
