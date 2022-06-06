<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $order ;
    public $graph_data;

    public function mount(){
        $order_data = [];
        for($month = 1; $month <= 12; $month++){
            $order_data[] = Order::whereMonth('created_at',$month)->sum('total');
        }
        //dd($order_data);
        $data =[
        'labels'=>["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        'datasets'=> [[
            'label'=> "Earnings",
            'lineTension'=> 0.3,
            'backgroundColor'=> "rgba(78, 115, 223, 0.05)",
            'borderColor'=> "rgba(78, 115, 223, 1)",
            'pointRadius'=> 3,
            'pointBackgroundColor'=> "rgba(78, 115, 223, 1)",
            'pointBorderColor'=> "rgba(78, 115, 223, 1)",
            'pointHoverRadius'=> 3,
            'pointHoverBackgroundColor'=> "rgba(78, 115, 223, 1)",
            'pointHoverBorderColor'=> "rgba(78, 115, 223, 1)",
            'pointHitRadius'=> 10,
            'pointBorderWidth'=> 2,
            'data'=> $order_data,
        ]],
        ];
        $this->graph_data =  $data;

    }
    public function render()
    {

        return view('livewire.admin.dashboard',[
            'product_count' => Product::sum('qty'),
            'total_income' => Order::sum('total'),

        ])
        ->layout('layouts.admin-app');
    }
}
