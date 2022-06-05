<div class="d-flex pull-right">
    <a class="btn btn-outline-dark" href="{{ route('cart') }}">
        <i class="bi-cart-fill me-1"></i>
        Cart
        <span class="badge bg-dark text-white ms-1 rounded-pill">{{ Cart::getTotalQuantity() }}</span>
    </a>
</div>
