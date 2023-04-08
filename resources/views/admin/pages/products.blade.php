@extends('admin.layout.layout',['useAssets'=>['choices']])
@section('title','Admin-Products')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="col-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList" placeholder="Search Products...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                            All <span class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$products->count()}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published" role="tab">
                                            Published <span class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$published_products->count()}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft" role="tab">
                                            Draft <span class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$pending_products->count()}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">

                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">


                                <div>
                                    <table class="table align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">SKU</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Orders</th>
                                                <th scope="col">Rating</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($products->count()>0)
                                            @foreach($products as $product)
                                            <tr>
                                                <td><a href="{{route('seller-product-details')}}" class="fw-semibold">{{$loop->index+1}}</a></td>
                                                <td>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{asset($product->thumbnail)}}" alt="" class="avatar-xs rounded-circle" />
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            {{$product->title}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$product->sku}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>Rs. {{$product->price}}</td>
                                                <td>0</td>
                                                <td><span><span class="badge bg-light text-body fs-12 fw-medium"><i class="mdi mdi-star text-warning me-1"></i>0</span></span></td>
                                                @if($product->status==0)
                                                <td>
                                                    <span class="badge badge-soft-secondary">Draft</span>
                                                </td>
                                                @else
                                                <td>
                                                    <span class="badge badge-soft-success">Active</span>
                                                </td>
                                                @endif
                                                <td>
                                                    {{\Carbon\Carbon::parse($product->created_at)->format('d M, Y')}}
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between align-items-center pt-3">
                                        <div>Showing <b>1</b> to <b>10</b> of <b>12</b> results</div>
                                        <div>
                                            <div class="">
                                                <button tabindex="0" role="button" disabled="" title="Previous" aria-label="Previous" class="btn btn-sm ">Previous</button>
                                                <button tabindex="0" role="button" class="btn btn-sm btn-primary" title="Page 1" aria-label="Page 1">1</button>
                                                <button tabindex="0" role="button" class="btn btn-sm" title="Page 2" aria-label="Page 2">2</button>
                                                <button tabindex="0" role="button" title="Next" aria-label="Next" class="btn btn-sm">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end table -->
                                </div>
                                <!-- end table responsive -->


                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-published" role="tabpanel">
                                <div>
                                    <table class="table align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">SKU</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Orders</th>
                                                <th scope="col">Rating</th>
                                                <th scope="col">Action</th>
                                                <th scope="col">Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($published_products->count()>0)
                                            @foreach($published_products as $product)
                                            <tr>
                                                <td><a href="{{route('seller-product-details')}}" class="fw-semibold">{{$loop->index+1}}</a></td>
                                                <td>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{asset($product->thumbnail)}}" alt="" class="avatar-xs rounded-circle" />
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            {{$product->title}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$product->sku}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>Rs. {{$product->price}}</td>
                                                <td>0</td>
                                                <td><span><span class="badge bg-light text-body fs-12 fw-medium"><i class="mdi mdi-star text-warning me-1"></i>0</span></span></td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Switch to Publish" {{ $product->status == '1' ? '' : 'checked' }} switch="none" onchange="toogle_status_inactive({{ $product->id }})" role="switch" id="flexSwitchCheckDefault1">

                                                    </div>
                                                </td>
                                                <td>
                                                    {{\Carbon\Carbon::parse($product->created_at)->format('d M, Y')}}
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else

                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between align-items-center pt-3">
                                        <div>Showing <b>1</b> to <b>10</b> of <b>12</b> results</div>
                                        <div>
                                            <div class="">
                                                <button tabindex="0" role="button" disabled="" title="Previous" aria-label="Previous" class="btn btn-sm ">Previous</button>
                                                <button tabindex="0" role="button" class="btn btn-sm btn-primary" title="Page 1" aria-label="Page 1">1</button>
                                                <button tabindex="0" role="button" class="btn btn-sm" title="Page 2" aria-label="Page 2">2</button>
                                                <button tabindex="0" role="button" title="Next" aria-label="Next" class="btn btn-sm">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end table -->
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                <div>
                                    <table class="table align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">SKU</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Orders</th>
                                                <th scope="col">Rating</th>
                                                <th scope="col">Action</th>
                                                <th scope="col">Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($pending_products->count()>0)
                                            @foreach($pending_products as $product)
                                            <tr>
                                                <td><a href="{{route('seller-product-details')}}" class="fw-semibold">{{$loop->index+1}}</a></td>
                                                <td>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{asset($product->thumbnail)}}" alt="" class="avatar-xs rounded-circle" />
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            {{$product->title}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$product->sku}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>Rs. {{$product->price}}</td>
                                                <td>0</td>
                                                <td><span><span class="badge bg-light text-body fs-12 fw-medium"><i class="mdi mdi-star text-warning me-1"></i>0</span></span></td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Switch to Active" {{ $product->status == '0' ? '' : 'checked' }} switch="none" onchange="toogle_status({{ $product->id }})" role="switch" id="flexSwitchCheckDefault1">

                                                    </div>
                                                </td>
                                                <td>
                                                    {{\Carbon\Carbon::parse($product->created_at)->format('d M, Y')}}
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between align-items-center pt-3">
                                        <div>Showing <b>1</b> to <b>10</b> of <b>12</b> results</div>
                                        <div>
                                            <div class="">
                                                <button tabindex="0" role="button" disabled="" title="Previous" aria-label="Previous" class="btn btn-sm ">Previous</button>
                                                <button tabindex="0" role="button" class="btn btn-sm btn-primary" title="Page 1" aria-label="Page 1">1</button>
                                                <button tabindex="0" role="button" class="btn btn-sm" title="Page 2" aria-label="Page 2">2</button>
                                                <button tabindex="0" role="button" title="Next" aria-label="Next" class="btn btn-sm">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end table -->
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
@endsection

@section('custom-script')
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
    var notyf = new Notyf({
        duration: 3000,
        position: {
            x: 'right',
            y: 'top',
        },
    });

    function toogle_status(id) {
        $.ajax({
            type: "POST",
            url: "{{route('change_status_active')}}",
            dataType: 'json',
            data: {
                'id': id,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {},
            success: function(res) {
                if (res.success === true) {
                    notyf.success({
                        message: res.message,
                        duration: 3000
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 3200);
                } else {
                    notyf.error({
                        message: res.message,
                        duration: 3000
                    })
                }

            },
            error: function(e) {}
        });
    }

    function toogle_status_inactive(id) {
        $.ajax({
            type: "POST",
            url: "{{route('change_status_Inactive')}}",
            dataType: 'json',
            data: {
                'id': id,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {},
            success: function(res) {
                if (res.success === true) {
                    notyf.success({
                        message: res.message,
                        duration: 3000
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 3200);
                } else {
                    notyf.error({
                        message: res.message,
                        duration: 3000
                    })
                }

            },
            error: function(e) {}
        });
    }
</script>

@endsection