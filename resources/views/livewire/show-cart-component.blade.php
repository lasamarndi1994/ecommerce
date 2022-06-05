 <div class="row">
     <div class="col-sm-12 col-md-10 col-md-offset-1">
         @if(count($items) > 0)
         <table class="table table-hover">
             <thead>
                 <tr>
                     <th>Product</th>
                     <th>Quantity</th>
                     <th class="text-center">Price</th>
                     <th class="text-center">Total</th>
                     <th> </th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($items as $item)
                     <tr>
                         <td class="col-sm-8 col-md-6">
                             <div class="media">
                                 <div class="d-flex ml-2 ">
                                    <a class="thumbnail pull-left ml-2" href="{{ route('product.show', [$item->id]) }}">
                                        <img class="media-object"
                                            src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                            style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body mr-5">
                                        <h6 class="media-heading ml-5">
                                            <a
                                                href="{{ route('product.show', [$item->id]) }}">{{ $item->name }}</a>
                                        </h6>

                                    </div>
                                 </div>
                                 <span>Status: </span>
                                 <span class="{{is_product_is_active($item->id) ? 'text-success' : 'text-danger'}}">
                                     <strong>{{ is_product_is_active($item->id) ? 'in Stock':'Out of Stock' }}</strong>
                                    </span>
                             </div>
                         </td>
                         <td class="col-sm-1 col-md-1 d-flex"  style="text-align: center">
                            <button type="button" wire:click="addQuantity({{$item->id}},{{$item->quantity}})"
                                class="btn btn-success btn-circle btn-sm">
                                <i class="bi bi-file-plus"></i>
                            </button>
                            <input type="text" class="form-control" style="width: 60px;" wire:change="changeQuantity({{$item->id}},$event.target.value)"
                                 value="{{ $item->quantity }}" min="1" >
                                 <button type="button" class="btn btn-danger btn-circle btn-sm" wire:click="removeQuantity({{$item->id}},{{$item->quantity}})">
                                   <i class="bi bi-dash-lg"></i>
                            </button>
                         </td>
                         <td class="col-sm-1 col-md-1 text-center"><strong>${{ number_format($item->price,2) }}</strong></td>
                         <td class="col-sm-1 col-md-1 text-center">
                             @php
                                $sum_total_price = (float) $item->price * (int) $item->quantity;
                             @endphp
                             <strong>${{ number_format($sum_total_price, 2) }}</strong>
                         </td>
                         <td class="col-sm-1 col-md-1">
                             <button type="button" class="btn btn-sm btn-danger"
                                 wire:click.prevent="removeProductFromCart({{ $item->id }})">
                                 <i class="bi bi-trash"></i>
                             </button>
                         </td>
                     </tr>
                 @endforeach

                 <tr>
                     <td colspan="3">   </td>
                     <td>
                         <h5>Subtotal</h5>
                     </td>
                     <td class="text-right">
                         <h5><strong>${{ number_format($sub_total, 2) }}</strong></h5>
                     </td>
                 </tr>

                 <tr>
                     <td colspan="3">   </td>

                     <td>
                         <h3>Total</h3>
                     </td>
                     <td class="text-right">
                         <h3><strong>${{ number_format($total, 2) }}</strong></h3>
                     </td>
                 </tr>
                 <tr class="float-right">
                     <td></td>
                     <td colspan="2">
                         <a href="{{route('home')}}">
                             <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                         </a>
                     </td>
                     <td colspan="3">
                         <button type="button" wire:click.prevent="order()" class="btn btn-success">
                             Order Now <span class="glyphicon glyphicon-play"></span>
                         </button>
                     </td>
                 </tr>
             </tbody>
         </table>
         @else
         <h2><span class="text-center text-danger"> Your Cart is empty </span>
            <a href="{{route('home')}}">Continue Shopping</a></h2>
         @endif
     </div>
 </div>
