@extends('seller.layout.layout',['useAssets'=>['sweetAlert']])
@section('title','Products')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Products</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h5 class="fs-16">Filters</h5>
                            </div>
                        </div>
                    </div>

                    <div class="accordion accordion-flush filter-accordion">

                        <div class="card-body border-bottom">
                            <div>
                                <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Products</p>
                                <ul class="list-unstyled mb-0 filter-list">
                                    <li>
                                        <a href="#" class="d-flex py-1 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0 listname">Grocery</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex py-1 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0 listname">Fashion</h5>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <span class="badge bg-light text-muted">5</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex py-1 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0 listname">Watches</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex py-1 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0 listname">Electronics</h5>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <span class="badge bg-light text-muted">5</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex py-1 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0 listname">Furniture</h5>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <span class="badge bg-light text-muted">6</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex py-1 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0 listname">Automotive Accessories</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex py-1 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0 listname">Appliances</h5>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <span class="badge bg-light text-muted">7</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex py-1 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0 listname">Kids</h5>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="wrapper">
                                <p class="text-muted text-uppercase fs-12 fw-medium mb-4">Price</p>
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="10000" value="0" step="100">
                                    <input type="range" class="range-max" min="0" max="10000" value="10000" step="100">
                                </div>
                                <div class="price-input">
                                    <div class="field">
                                        <input type="number" class="input-min" value="0">
                                    </div>
                                    <div class="separator">to</div>
                                    <div class="field">
                                        <input type="number" class="input-max" value="10000">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingBrands">
                                <button class="accordion-button bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseBrands" aria-expanded="true" aria-controls="flush-collapseBrands">
                                    <span class="text-muted text-uppercase fs-12 fw-medium">Brands</span> <span class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                </button>
                            </h2>

                            <div id="flush-collapseBrands" class="accordion-collapse collapse show" aria-labelledby="flush-headingBrands">
                                <div class="accordion-body text-body pt-0">
                                    <div class="search-box search-box-sm">
                                        <input type="text" class="form-control bg-light border-0" id="searchBrandsList" placeholder="Search Brands...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <div class="d-flex flex-column gap-2 mt-3 filter-check">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Boat" id="productBrandRadio5" checked>
                                            <label class="form-check-label" for="productBrandRadio5">Boat</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="OnePlus" id="productBrandRadio4">
                                            <label class="form-check-label" for="productBrandRadio4">OnePlus</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Realme" id="productBrandRadio3">
                                            <label class="form-check-label" for="productBrandRadio3">Realme</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Sony" id="productBrandRadio2">
                                            <label class="form-check-label" for="productBrandRadio2">Sony</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="JBL" id="productBrandRadio1" checked>
                                            <label class="form-check-label" for="productBrandRadio1">JBL</label>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-link text-decoration-none text-uppercase fw-medium p-0">1,235
                                                More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion-item -->

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingDiscount">
                                <button class="accordion-button bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount" aria-expanded="true" aria-controls="flush-collapseDiscount">
                                    <span class="text-muted text-uppercase fs-12 fw-medium">Discount</span> <span class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                </button>
                            </h2>
                            <div id="flush-collapseDiscount" class="accordion-collapse collapse" aria-labelledby="flush-headingDiscount">
                                <div class="accordion-body text-body pt-1">
                                    <div class="d-flex flex-column gap-2 filter-check">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="50% or more" id="productdiscountRadio6">
                                            <label class="form-check-label" for="productdiscountRadio6">50% or more</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="40% or more" id="productdiscountRadio5">
                                            <label class="form-check-label" for="productdiscountRadio5">40% or more</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="30% or more" id="productdiscountRadio4">
                                            <label class="form-check-label" for="productdiscountRadio4">
                                                30% or more
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="20% or more" id="productdiscountRadio3" checked>
                                            <label class="form-check-label" for="productdiscountRadio3">
                                                20% or more
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="10% or more" id="productdiscountRadio2">
                                            <label class="form-check-label" for="productdiscountRadio2">
                                                10% or more
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Less than 10%" id="productdiscountRadio1">
                                            <label class="form-check-label" for="productdiscountRadio1">
                                                Less than 10%
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion-item -->

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingRating">
                                <button class="accordion-button bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseRating" aria-expanded="false" aria-controls="flush-collapseRating">
                                    <span class="text-muted text-uppercase fs-12 fw-medium">Rating</span> <span class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                </button>
                            </h2>

                            <div id="flush-collapseRating" class="accordion-collapse collapse" aria-labelledby="flush-headingRating">
                                <div class="accordion-body text-body">
                                    <div class="d-flex flex-column gap-2 filter-check">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="4 & Above Star" id="productratingRadio4" checked>
                                            <label class="form-check-label" for="productratingRadio4">
                                                <span class="text-muted">
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </span> 4 & Above
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="3 & Above Star" id="productratingRadio3">
                                            <label class="form-check-label" for="productratingRadio3">
                                                <span class="text-muted">
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </span> 3 & Above
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="2 & Above Star" id="productratingRadio2">
                                            <label class="form-check-label" for="productratingRadio2">
                                                <span class="text-muted">
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </span> 2 & Above
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1 Star" id="productratingRadio1">
                                            <label class="form-check-label" for="productratingRadio1">
                                                <span class="text-muted">
                                                    <i class="mdi mdi-star text-warning"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </span> 1
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion-item -->
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-xl-9 col-lg-8">
                <div>
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{route('add-product')}}" class="btn btn-success" id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Add Product</a>
                                    </div>
                                </div>
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
                                                Pending <span class="badge badge-soft-danger align-middle rounded-pill ms-1">{{$pending_products->count()}}</span>
                                            </a>
                                        </li>
                                    </ul>
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
                                                    <th scope="col">Action</th>
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
                                                        <span class="badge badge-soft-warning">Pending</span>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <span class="badge badge-soft-success">Active</span>
                                                    </td>
                                                    @endif
                                                    <td>
                                                        <span>
                                                            <div class="dropdown">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0)"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                                    <li><a class="dropdown-item edit-list" href="{{ route('edit-product',$product->slug) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item deleteRecord" href="#" data-id="{{ $product->id }}"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </span>
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
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
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
                                                        <span class="badge badge-soft-success">Published</span>
                                                    </td>
                                                    <td><span>
                                                            <div class="dropdown"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0)"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                                    <li><a class="dropdown-item edit-list" href="{{ route('edit-product',$product->slug) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item deleteRecord" href="#" data-id="{{ $product->id }}"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </span></td>
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
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
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
                                                        <span class="badge badge-soft-warning">Pending</span>
                                                    </td>
                                                    <td><span>
                                                            <div class="dropdown"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0)"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                                    <li><a class="dropdown-item edit-list" href="{{ route('edit-product',$product->slug) }}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item deleteRecord" href="#" data-id="{{ $product->id }}"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </span></td>
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
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
@endsection
@section('custom-script')
<script>
    //Delete
    $(document).on('click', '.deleteRecord', function() {
        var id = $(this).attr('data-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('delete_product') }}",
                    dataType: 'json',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}',
                    },

                    beforeSend: function() {},
                    success: function(res) {
                        if (res.success === true) {
                            setTimeout(function() {
                                Swal.fire('Success!', res.Message, 'success');
                            }, 1500);
                            setTimeout(function() {
                                window.location.reload();
                            }, 3000);
                        } else {}
                    },
                    error: function(e) {}
                });
            }
        })
    });
</script>
@endsection