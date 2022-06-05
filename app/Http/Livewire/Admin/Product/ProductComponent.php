<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['productDelete' => 'productDelete'];

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

    public function productDelete($product_id)
    {
        Product::where('id',$product_id)->delete();
    }


    public function render()
    {
        return view('livewire.admin.product.product',[
            'products' => Product::where('name','like','%'.$this->search . '%')
            ->orWhere('batch_id','like', '%'.$this->search . '%')
             ->orWhere('price','like', '%'.$this->search . '%')
            ->orderByDesc('created_at')->paginate(8),
        ])
         ->layout('layouts.admin-app');
    }
}
