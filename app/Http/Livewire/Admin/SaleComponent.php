<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class SaleComponent extends Component
{
    protected function getListeners(){
      return  [
          'removeQuantityChange' => 'removeQuantityChange',
          'addQuantityChange' => 'addQuantityChange'
        ];
    }
    public $quantity;

    public function removeQuantityChange($value,$key,$id){
        $this->quantity[$key] = $value;
    }

    public function addQuantityChange($value,$key,$id){
        $product = Product::find($id);
        if($product->qty >= $value){
            $this->quantity[$key] = $value;
        }
    }

    public function changeQuantity($value,$key,$id){
        $product = Product::find($id);
        if($product->qty >= $value){
            $this->quantity[$key] = $value;
        }
    }
    public function order(){

    }

    public function render()
    {
        return view('livewire.admin.sale-component',[
            'products' => Product::orderByDesc('created_at')->paginate(15),
        ])
        ->layout('layouts.admin-app');
    }
}
