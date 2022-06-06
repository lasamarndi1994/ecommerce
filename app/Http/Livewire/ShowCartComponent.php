<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade;
use Exception;
use Illuminate\Support\Facades\DB;

class ShowCartComponent extends Component
{
    public function mount(){

    }
    public function addQuantity($id,$qty){
        $qty = $qty+1;
        $product =  Product::find($id);
        $cart = CartFacade::get($id);
        if(!empty($cart)){
            if($product->qty == $cart['quantity']){
                return true;
            }
        }
        CartFacade::update($id,[
            'quantity' => [
                    'relative' => false,
                    'value' =>  $qty,
                ],
        ]);
    }
    public function removeQuantity($id,$qty){
        $qty = $qty-1;
        if($qty >= 1){
        CartFacade::update($id,[
            'quantity' => [
                    'relative' => false,
                    'value' =>  $qty,
                ],
        ]);
    }
    }

    public function changeQuantity($id,$qty)
    {
        $product = Product::find($id);
        if($product->qty >= $qty){
            $data =  CartFacade::update($id,[
                    'quantity' => [
                            'relative' => false,
                            'value' => $qty
                        ],
                ]);
            $this->emit('refreshCart');
        }
    }
    /**
     * Remove product from cart
     *
     */
    public function removeProductFromCart($product_id)
    {
        CartFacade::remove($product_id);
        $this->emit('refreshCart');
    }

    public function order(){
        $items = CartFacade::getContent();
         try{
            DB::beginTransaction();
                $order = Order::create([
                    'order_id' => 'ORD'.rand(100000,90000),
                    'user_id' => auth()->id(),
                    'sub_total' =>CartFacade::getSubTotal(),
                    'total'  =>CartFacade::getTotal(),
                ]);
                foreach($items as $item){
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id'=> $item->id,
                        'qty' => $item->quantity,
                        'price' => $item->price,
                    ]);

                    $product = Product::find($item->id);
                    $product->update([
                        'qty' =>  (int)$product->qty - (int)$item->quantity,
                    ]);
                }
            CartFacade::clear();
            DB::commit();
            return redirect()->back()->with('success','Order Is successfully orders');
        }catch(Exception $e){
            DB::rollBack();
        }

    }

    public function render()
    {
        return view('livewire.show-cart-component', [
            'items' => CartFacade::getContent()->sort(),
            'sub_total' => CartFacade::getSubTotal(),
            'total' => CartFacade::getTotal(),
        ]);
    }
}
