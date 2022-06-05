<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade;
use Livewire\Component;
use Livewire\WithPagination;


class HomeComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $is_product_active = [] ;


    public function addCart($id)
    {
        $this->emit('addProductToCart', $id);
    }


    public function render()
    {
        return view('livewire.home-component', [
            'products' => Product::paginate(8),
        ]);
    }
}
