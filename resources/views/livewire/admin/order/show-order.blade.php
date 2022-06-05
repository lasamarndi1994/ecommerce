@push('css')
<style>
    .user-activity-card .u-img
    .cover-img{width: 60px;height: 60px}
    .user-activity-card .u-img
    .profile-img{width: 20px;height:
    20px;position: absolute;bottom: -5px;right: -5px}
    .img-radius{border-radius: 5px}
    .user-activity-card .u-img{position:
    relative}
    </style>
@endpush

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-12 col-md-12">
                <div class="card user-activity-card">
                    <div class="card-header">
                        <h5> <b>{{$order->user->name}}</b> Made Order </h5>
                    </div>
                    <div class="card-block ml-3 mt-3">
                        @foreach ($order->products as $product)
                        <div class="row ">
                            <div class="col-auto">
                                <div class="u-img">
                                    <img src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="{{$product->name}}"
                                        class="img-radius cover-img">
                            </div>
                            </div>
                            <div class="col">
                                <h6 class=""><b>{{$product->batch_id}}</b></h6>
                                <h5 class="fw-bold text-dark">{{$product->name}}</h5>
                                <p class=""><b>
                                   Qty: {{$product->pivot->qty}} :#Price: ${{number_format($product->pivot->price,2)}}</b>
                                </p>
                            </div>
                        </div>
                        @endforeach

                        <div class="text-center">
                            <a href="#!" class="b-b-primary text-primary" data-abc="true">
                                <h5>Total Qty {{$total_qty}}</h5>
                                <h4>Total Price : ${{number_format($order->sub_total,2)}}</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
