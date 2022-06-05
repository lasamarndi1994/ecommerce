<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade;

class CartComponent extends Component
{
    protected function getListeners()
    {
        return [
            'addProductToCart' => 'addCart',
            'refreshCart' => 'refreshCart'
        ];
    }

    public function refreshCart()
    {

    }

    public function addCart($id)
    {
        $product =  Product::find($id);
        $cart = CartFacade::get($id);
        if(!empty($cart)){
            if($product->qty == $cart['quantity']){
               return ;
            }
        }
        CartFacade::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ]);


    }
    public function render()
    {
        return view('livewire.cart-component');
    }
}
