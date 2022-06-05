<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $start_date;
    public $end_date;

    public $search ='';

    /**
     * updating Search
     *
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if($this->start_date && $this->end_date){
        $orders =  Order::where('order_id','like','%'. $this->search . '%')
            ->whereBetween('created_at',[$this->start_date,$this->end_date])
            ->orderByDesc('created_at')->paginate(10);
        }
        else{
            $orders =  Order::where('order_id','like','%'. $this->search . '%')
            ->orderByDesc('created_at')->paginate(10);
        }
        return view('livewire.admin.order.order-component',[
               'orders' => $orders,
        ])
        ->layout('layouts.admin-app');
    }
}
