<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade;

class ShowProductComponent extends Component
{

    public $product;


    public function mount($id)
    {
        $this->product =  Product::findOrFail($id);
    }


    public function render()
    {
        return view('livewire.show-product-component');
    }
}
