<div><!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
        <a href="{{route('admin.product.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-alt-circle-right"></i> Create a product</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between flex-wrap align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            <input type="search" wire:model="search" placeholder="Search..."/>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Batch ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            {{-- <th>Created At</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$product->batch_id}}</td>
                            <td>{{$product->name}}</td>
                            <td>${{number_format($product->price,2)}}</td>
                            <td class="{{$product->qty == 0 ? 'text-danger':
                            ''}}">{{$product->qty == 0 ? 'Out of Stock' : $product->qty}}</td>
                            {{-- <td>{{$product->created_at->diffForHumans()}}</td> --}}
                            <td>
                                <a href="{{route('admin.product.edit',[$product->id])}}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button type="button" class="btn btn-danger btn-circle btn-sm" wire:click="$emit('deleteProduct',{{$product->id}})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            <div class="float-right">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
document.addEventListener('livewire:load', function () {
    let text = 'Are sure want to delete it.';
    Livewire.on('deleteProduct', (productId) => {
        if (confirm(text) == true) {
            Livewire.emit('productDelete',productId)
        } else {
        }

    })
})

</script>
@endpush
