<div>
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between flex-wrap align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Sale</h6>
            <input type="search" wire:model="search" placeholder="Search..." />
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
                            <th>Sub Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $key => $product)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$product->batch_id}}</td>
                            <td>{{$product->name}}</td>
                            <td>${{number_format($product->price,2)}}</td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-success btn-circle btn-sm" wire:click="$emit('addQuantity',{{$product->qty}},{{$key}},{{$product->id}})">
                               <i class="fas fa-plus"></i>
                            </button>
                                <input type="text" id="quantity" min="1"  value="{{$product->qty}}" style="width: 30px;">
                                <button type="button" wire:click="$emit('removeQuantity',{{$product->qty}},{{$key}},{{$product->id}})" class="btn btn-danger btn-circle btn-sm">
                                   <i class="fas fa-minus"></i>
                                </button>
                            </td>
                            <td>${{sub_total_price($quantity[$key] ?? $product->qty,$product->price)}}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-circle btn-sm"
                                    wire:click="$emit('deleteProduct',{{$product->id}})">
                                    <i class="fas fa-trash"></i> Sale
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
    Livewire.on('addQuantity', (val,key,id) => {
       let value = document.getElementById("quantity").value++;
        if(val >= value+1){
            Livewire.emit('addQuantityChange',value+1,key,id)
        }
        else{
            let value = document.getElementById("quantity").value = val;
        }
    })
    Livewire.on('removeQuantity', (val,key,id) => {
        let value = document.getElementById('quantity').value--;

        if(value-1 >= 1){
            Livewire.emit('removeQuantityChange',value-1,key,id)
        }else{
            let value = document.getElementById("quantity").value = 1;
        }
    })
})

</script>
@endpush
