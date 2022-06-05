<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between flex-wrap align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
            <input type="text" id="date_search" class="float-right" placeholder="YYYY-MM-DD"  wire:ignore/>
            <input type="search" wire:model="search" placeholder="Search..." />

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>SubTotal</th>
                            <th>Total</th>
                            <th>Payemt</th>
                            <th>Order At</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @if($orders->count() > 0)
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$order->order_id}}</td>
                            <td>${{number_format($order->sub_total,2)}}</td>
                            <td>${{number_format($order->total,2)}}</td>
                            <td><span class="badge badge-success">Success</span></td>
                            <td>{{$order->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('admin.order.show',[$order->id])}}"
                                    class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td align="center" colspan="7" class="text-danger">Data Not found Yet.</td></tr>
                        @endif
                    </tbody>

                </table>

            </div>
            <div class="float-right">
                {{ $orders->links() }}
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
    flatpickr("#date_search", {
        dateFormat: "m-d-Y",
        altInput: false,
        mode:'range',
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr, instance) {
            var date = dateStr.split('to');
            @this.start_date = date[0];
            @this.end_date = date[1];
        }
    });
})

</script>
@endpush
