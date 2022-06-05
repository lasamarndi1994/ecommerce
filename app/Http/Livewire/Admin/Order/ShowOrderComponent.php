<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\OrderProduct;
use Livewire\Component;

class ShowOrderComponent extends Component
{
    public $order;

    public function mount($id){
        $this->order =  Order::with('products','user')->findOrFail($id);
    }
    public function render()
    {
        return view('livewire.admin.order.show-order',[
            'total_qty' => OrderProduct::where('order_id',$this->order->id)->sum('qty'),
        ])
        ->layout('layouts.admin-app');
    }
}
