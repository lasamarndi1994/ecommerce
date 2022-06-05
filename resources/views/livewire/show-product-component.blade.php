<div class="row gx-4 gx-lg-5 align-items-center">
    <div class="col-md-6">
        <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="...">
    </div>
    <div class="col-md-6">
        <div class="small mb-1">SKU:{{ $product->batch_id }}</div>
        <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
        <div class="fs-5 mb-5">
            <span class="text-decoration-line-through">${{ $product->price + 10 }}</span>
            <span>${{ $product->price }}</span>
        </div>
        <p class="lead">{{ $product->description }}</p>
        <div class="d-flex">
            <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" min="1"
                style="max-width: 3rem">
            <button class="btn btn-outline-dark flex-shrink-0" type="button"
                wire:click="$emitUp('addCart',{{ $product->id }})">
                <i class="bi-cart-fill me-1"></i>
                Add to cart
            </button>
        </div>
    </div>
</div>
