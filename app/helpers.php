<?php

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade;

function is_product_is_active($product_id){
    $product =  Product::find($product_id);
    if($product->qty == 0){
        CartFacade::update($product_id,[
            'quantity' => [
                    'relative' => false,
                    'value' =>  0,
                ],
        ]);
        return false;
    }
    return true;
}

function sub_total_price($qty,$price){
    return number_format($qty * $price,2);
}
