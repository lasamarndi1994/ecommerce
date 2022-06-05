<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    @foreach ($products as $key => $product)
        <div class="col mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">
                            <a href="{{ route('product.show', [$product->id]) }}">
                                {{ $product->name }}
                            </a>
                        </h5>
                        <!-- Product price-->
                        ${{ number_format($product->price,2) }}
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center">
                        <button type="button" wire:click="addCart({{ $product->id }})"
                            class="btn btn-outline-dark mt-auto" {{$product->qty == 0 ? 'disabled' : ''}}>
                            {{$product->qty == 0 ? 'Out of Stock ' : 'Add Cart'}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{ $products->links() }}

</div>
