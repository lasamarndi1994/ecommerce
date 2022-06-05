<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $order ;

    public function mount(){


    }
    public function render()
    {

        return view('livewire.admin.dashboard',[
            'product_count' => Product::where('qty','!=',0)->count(),
            //'data' => Order::whereMonth('created_at')->get(),

        ])
        ->layout('layouts.admin-app');
    }
}
