<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', App\Http\Livewire\HomeComponent::class)->name('home');

Route::get('/product/{id}/show', App\Http\Livewire\ShowProductComponent::class)->name('product.show');
Route::get('/carts', App\Http\Livewire\ShowCartComponent::class)->name('cart')->middleware('auth');

Route::group(['middleware' => 'guest'],function(){
    Route::get('/login', App\Http\Livewire\Auth\LoginComponent::class)->name('login');
});

Route::group(['prefix' => 'admin','as'=> 'admin.','middleware' => ['auth','user:admin']],function(){
    Route::get('/dashboard', App\Http\Livewire\Admin\DashboardComponent::class)->name('home');
    Route::get('/empolyee/dashboard', App\Http\Livewire\Employee\DashBoardComponent::class)->name('empolyee.home');
    Route::get('/products', App\Http\Livewire\Admin\Product\ProductComponent::class)->name('products');
    Route::get('/product/create', App\Http\Livewire\Admin\Product\CreateProductComponent::class)->name('product.create');
    Route::get('/product/{id}/edit', App\Http\Livewire\Admin\Product\EditProductComponent::class)->name('product.edit');
    Route::get('/orders', App\Http\Livewire\Admin\Order\OrderComponent::class)->name('orders');
    Route::get('/order/{id}/show', App\Http\Livewire\Admin\Order\ShowOrderComponent::class)->name('order.show');

    Route::get('/sale', App\Http\Livewire\Admin\SaleComponent::class)->name('sale');
});
