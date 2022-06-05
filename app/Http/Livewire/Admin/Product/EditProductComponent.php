<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class EditProductComponent extends Component
{
    public $batch_id;
    public $name;
    public $qty;
    public $price;
    public $product;

    /**
     * mount
     *
     * @return void
     */
    public function mount($id){
        $this->product = Product::findOrFail($id);
        $this->batch_id = $this->product->batch_id;
        $this->name = $this->product->name;
        $this->qty = $this->product->qty;
        $this->price = $this->product->price;
    }

    public function update($id){
        $product = $this->validate([
            'batch_id' => 'required|unique:products,batch_id,'.$id.',id',
            'name' => 'required|string',
            'qty' => 'required|numeric',
            'price'=>'required'
        ]);
        Product::where('id',$id)->update($product);
        $this->reset();
        return redirect()->route('admin.products')->with('success','Product has been updated.');
    }

    public function render()
    {
        return view('livewire.admin.product.edit-product')
         ->layout('layouts.admin-app');
    }
}
