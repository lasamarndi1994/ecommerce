<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class CreateProductComponent extends Component
{
    public $batch_id;
    public $name;
    public $qty;
    public $price;

    /**
     * product Create
     *
     * @return void
     */
    public function productCreate(){
        $product = $this->validate([
            'batch_id' => 'required|unique:products',
            'name' => 'required|string',
            'qty' => 'required|numeric',
            'price'=>'required'
        ]);
        Product::create($product);
        $this->reset();
        return redirect()->route('admin.products')->with('success','Product has been updated.');
    }

    public function render()
    {
        return view('livewire.admin.product.create-product')
        ->layout('layouts.admin-app');
    }
}
