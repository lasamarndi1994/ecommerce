<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
        <a href="{{route('admin.products')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-alt-circle-right"></i> All Products</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">Account Details</div>
        <div class="card-body">
            <form wire:submit.prevent="update({{$product->id}})">
                <!-- Form Group (username)-->
                <div class="mb-3">
                    <label class="small mb-1" for="batchId">Batch ID (Unique batch number)</label>
                    <input class="form-control" id="batchId" type="text" placeholder="Enter your Batch ID"
                        wire:model="batch_id">
                    @error('batch_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                    <!-- Form Group (first name)-->
                    <div class="col-md-12">
                        <label class="small mb-1" for="name">Product Name</label>
                        <input class="form-control" id="name" type="text" wire:model.lazy="name"
                            placeholder="Enter your product name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <!-- Form Row        -->
                <div class="row gx-3 mb-3">
                    <!-- Form Group (organization name)-->
                    <div class="col-md-6">
                        <label class="small mb-1" for="price">Price</label>
                        <input class="form-control" id="price" min="1" type="number" wire:model.lazy="price"
                            placeholder="Enter your product amount">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <!-- Form Group (location)-->
                    <div class="col-md-6">
                        <label class="small mb-1" for="qty">Qty</label>
                        <input class="form-control" id="qty" min="0" type="number" wire:model.lazy="qty"
                            placeholder="Enter product qty">
                        @error('qty')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- Save changes button-->
                <button type="submit" class="btn btn-primary" type="button">Save changes</button>
            </form>
        </div>
    </div>
</div>
