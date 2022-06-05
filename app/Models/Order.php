<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Associative with product
     *
     * @return void
     */
    public function products(){
        return $this->belongsToMany('App\Models\Product', 'order_products')
        ->withPivot('price', 'qty','created_at');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
