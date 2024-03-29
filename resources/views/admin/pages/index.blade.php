@extends('admin.layout.layout',['useAssets'=>['dashboard','jsvectormap','apexcharts']])
@section('title','Admin-Dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
{{--                                    <h4 class="fs-16 mb-1">Good Morning, Anna!</h4>--}}
                                    <p class="text-muted mb-0">Here's what's happening with your site today.</p>
                                </div>
{{--                                <div class="mt-3 mt-lg-0">--}}
{{--                                    <form action="javascript:void(0);">--}}
{{--                                        <div class="row g-3 mb-0 align-items-center">--}}
{{--                                            <div class="col-sm-auto">--}}
{{--                                                <div class="input-group">--}}
{{--                                                    <input type="text" class="form-control border-0 dash-filter-picker shadow flatpickr-input" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" readonly="readonly">--}}
{{--                                                    <div class="input-group-text bg-primary border-primary text-white">--}}
{{--                                                        <i class="ri-calendar-2-line"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--end col-->--}}
{{--                                        </div>--}}
{{--                                        <!--end row-->--}}
{{--                                    </form>--}}
{{--                                </div>--}}
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Sellers</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$seller}}">0</span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-success rounded fs-3">
                                                <i class="bx bx-dollar-circle text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Orders</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $all_orders }}">0</span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded fs-3">
                                                <i class="bx bx-shopping-bag text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Customers</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $all_customers }}">0</span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning rounded fs-3">
                                                <i class="bx bx-user-circle text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Products</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $all_products }}">0</span> </h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-primary rounded fs-3">
                                                <i class="bx bx-wallet text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header border-0 align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
                                </div><!-- end card header -->

                                <div class="card-header p-0 border-0 bg-soft-light">
                                    <div class="row g-0 text-center">
                                        <div class="col-6 col-sm-4">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1"><span class="counter-value" data-target="{{ $all_sellers }}">0</span></h5>
                                                <p class="text-muted mb-0">Sellers</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-sm-4">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1"><span class="counter-value" data-target="{{$all_customers}}">0</span></h5>
                                                <p class="text-muted mb-0">Customers</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-sm-4">
                                            <div class="p-3 border border-dashed border-start-0">
                                                <h5 class="mb-1"><span class="counter-value" data-target="{{$all_orders}}">0</span></h5>
                                                <p class="text-muted mb-0">Orders</p>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body p-0 pb-2">
                                    <div class="w-100">
                                        <div id="customer_impression_charts" data-colors='["--vz-primary", "--vz-success", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-4">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Store Products</h4>
                                </div>

                                <div class="card-body">
                                    <div id="store-visits-source" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]' class="apex-charts" dir="ltr"></div>
                                </div>
                            </div> <!-- .card-->
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Best Selling Products</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                            <tbody>
                                                @if ($best_product->count() > 0)
                                                @foreach ($best_product as $item)

                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                <img src="{{asset($item->images[0])}}" alt="" class="img-fluid d-block" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1"><a href="" class="text-reset">{{ $item->title }}</a></h5>
                                                                <span class="text-muted">{{\Carbon\Carbon::parse($item->created_at)->format('d M, Y')}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal">Rs. {{ number_format($item->price) }}</h5>
                                                        <span class="text-muted">Price</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal">{{ $item->sale_count }}</h5>
                                                        <span class="text-muted">Orders</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal">{{ $item->quantity == 0 ? 0 : $item->quantity }}</h5>
                                                        <span class="text-muted">Stock</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal">{{ $item->sku }}</h5>
                                                        <span class="text-muted">SKU</span>
                                                    </td>
                                                </tr>

                                                @endforeach
                                                @else
                                                <tr colspan="9">
                                                    <td>
                                                        <div class="text-center mt-3 mb-3">No record Found</div>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                            <thead class="text-muted table-light">
                                                <tr>
                                                    <th scope="col">Order ID</th>
                                                    <th scope="col">Customer</th>
                                                    <th scope="col">Payment Method</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Vendor</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($recent_orders->count()>0)
                                                @foreach($recent_orders as $item)

                                                <tr>
                                                    <td>
                                                        <span class="fw-medium link-primary">{{$loop->index+1}}</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <img src="{{asset($item->getUser->avatar)}}" alt="" class="avatar-xs rounded-circle" />
                                                            </div>
                                                            <div class="flex-grow-1">{{ $item->getUser->name  }}</div>
                                                        </div>
                                                    </td>
                                                    <td>{{$item->payment_method}}</td>
                                                    <td>
                                                        <span class="text-success">Rs. {{$item->total}}</span>
                                                    </td>
                                                    <td>Rs. {{$item->total}}</td>
                                                    <td>
                                                        @if($item->status == 0)
                                                        <span class="badge badge-soft-warning">Pending</span>
                                                        @else
                                                        <span class="badge badge-soft-success">Paid</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 fw-medium mb-0">5.0</h5>
                                                    </td>
                                                </tr><!-- end tr -->
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="7">No Record Found..</td>
                                                </tr>
                                                @endif
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div>
                                </div>
                            </div> <!-- .card-->
                        </div>
                    </div> <!-- end row-->

                    <div class="row">
                        <!-- .col-->
                        <!-- .col-->
                    </div> <!-- end row-->

                </div> <!-- end .h-100-->

            </div> <!-- end col -->

            <div class="col-auto layout-rightside-col">
                <div class="overlay"></div>
                <div class="layout-rightside">
                    <div class="card h-100 rounded-0">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <h6 class="text-muted mb-0 text-uppercase fw-semibold">Recent Activity</h6>
                            </div>
                            <div data-simplebar style="max-height: 410px;" class="p-3 pt-0">
                                <div class="acitivity-timeline acitivity-main">
                                    <div class="acitivity-item d-flex">
                                        <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                            <div class="avatar-title bg-soft-success text-success rounded-circle">
                                                <i class="ri-shopping-cart-2-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1 lh-base">Purchase by James Price</h6>
                                            <p class="text-muted mb-1">Product noise evolve smartwatch </p>
                                            <small class="mb-0 text-muted">02:14 PM Today</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                            <div class="avatar-title bg-soft-danger text-danger rounded-circle">
                                                <i class="ri-stack-fill"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1 lh-base">Added new <span class="fw-semibold">style collection</span>
                                            </h6>
                                            <p class="text-muted mb-1">By Nesta Technologies</p>
                                            <div class="d-inline-flex gap-2 border border-dashed p-2 mb-2">
                                                <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                    <img src="{{asset('admin_assets/images/products/img-8.png')}}" alt="" class="img-fluid d-block" />
                                                </a>
                                                <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                    <img src="{{asset('admin_assets/images/products/img-2.png')}}" alt="" class="img-fluid d-block" />
                                                </a>
                                                <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                    <img src="{{asset('admin_assets/images/products/img-10.png')}}" alt="" class="img-fluid d-block" />
                                                </a>
                                            </div>
                                            <p class="mb-0 text-muted"><small>9:47 PM Yesterday</small></p>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('admin_assets/images/users/avatar-2.jpg')}}" alt="" class="avatar-xs rounded-circle acitivity-avatar">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1 lh-base">Natasha Carey have liked the products</h6>
                                            <p class="text-muted mb-1">Allow users to like products in your
                                                WooCommerce store.</p>
                                            <small class="mb-0 text-muted">25 Dec, 2021</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs acitivity-avatar">
                                                <div class="avatar-title rounded-circle bg-secondary">
                                                    <i class="mdi mdi-sale fs-14"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1 lh-base">Today offers by <a href="apps-ecommerce-seller-details.html" class="link-secondary">Digitech Galaxy</a></h6>
                                            <p class="text-muted mb-2">Offer is valid on orders of Rs.500 Or above
                                                for selected products only.</p>
                                            <small class="mb-0 text-muted">12 Dec, 2021</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs acitivity-avatar">
                                                <div class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                    <i class="ri-bookmark-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1 lh-base">Favoried Product</h6>
                                            <p class="text-muted mb-2">Esther James have favorited product.</p>
                                            <small class="mb-0 text-muted">25 Nov, 2021</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs acitivity-avatar">
                                                <div class="avatar-title rounded-circle bg-secondary">
                                                    <i class="mdi mdi-sale fs-14"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1 lh-base">Flash sale starting <span class="text-primary">Tomorrow.</span>
                                            </h6>
                                            <p class="text-muted mb-0">Flash sale by <a href="javascript:void(0);" class="link-secondary fw-medium">Zoetic
                                                    Fashion</a></p>
                                            <small class="mb-0 text-muted">22 Oct, 2021</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item py-3 d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-xs acitivity-avatar">
                                                <div class="avatar-title rounded-circle bg-soft-info text-info">
                                                    <i class="ri-line-chart-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1 lh-base">Monthly sales report</h6>
                                            <p class="text-muted mb-2"><span class="text-danger">2 days left</span>
                                                notification to submit the monthly sales report. <a href="javascript:void(0);" class="link-warning text-decoration-underline">Reports
                                                    Builder</a></p>
                                            <small class="mb-0 text-muted">15 Oct</small>
                                        </div>
                                    </div>
                                    <div class="acitivity-item d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('admin_assets/images/users/avatar-3.jpg')}}" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1 lh-base">Frank Hook Commented</h6>
                                            <p class="text-muted mb-2 fst-italic">" A product that has reviews is
                                                more likable to be sold than a product. "</p>
                                            <small class="mb-0 text-muted">26 Aug, 2021</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 mt-2">
                                <h6 class="text-muted mb-3 text-uppercase fw-semibold">Top 10 Categories
                                </h6>

                                <ol class="ps-3 text-muted">
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Mobile & Accessories <span class="float-end">(10,294)</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Desktop <span class="float-end">(6,256)</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Electronics <span class="float-end">(3,479)</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Home & Furniture <span class="float-end">(2,275)</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Grocery <span class="float-end">(1,950)</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Fashion <span class="float-end">(1,582)</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Appliances <span class="float-end">(1,037)</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Beauty, Toys & More <span class="float-end">(924)</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Food & Drinks <span class="float-end">(701)</span></a>
                                    </li>
                                    <li class="py-1">
                                        <a href="#" class="text-muted">Toys & Games <span class="float-end">(239)</span></a>
                                    </li>
                                </ol>
                                <div class="mt-3 text-center">
                                    <a href="javascript:void(0);" class="text-muted text-decoration-underline">View
                                        all Categories</a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h6 class="text-muted mb-3 text-uppercase fw-semibold">Products Reviews</h6>
                                <!-- Swiper -->
                                <div class="swiper vertical-swiper" style="height: 250px;">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="card border border-dashed shadow-none">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 avatar-sm">
                                                            <div class="avatar-title bg-light rounded">
                                                                <img src="{{asset('admin_assets/images/companies/img-1.png')}}" alt="" height="30">
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <div>
                                                                <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                    " Great product and looks great, lots of
                                                                    features. "</p>
                                                                <div class="fs-11 align-middle text-warning">
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="text-end mb-0 text-muted">
                                                                - by <cite title="Source Title">Force
                                                                    Medicines</cite>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card border border-dashed shadow-none">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{asset('admin_assets/images/users/avatar-3.jpg')}}" alt="" class="avatar-sm rounded">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <div>
                                                                <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                    " Amazing template, very easy to understand and
                                                                    manipulate. "</p>
                                                                <div class="fs-11 align-middle text-warning">
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-half-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="text-end mb-0 text-muted">
                                                                - by <cite title="Source Title">Henry Baird</cite>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card border border-dashed shadow-none">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 avatar-sm">
                                                            <div class="avatar-title bg-light rounded">
                                                                <img src="{{asset('admin_assets/images/companies/img-8.png')}}" alt="" height="30">
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <div>
                                                                <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                    "Very beautiful product and Very helpful
                                                                    customer service."</p>
                                                                <div class="fs-11 align-middle text-warning">
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-line"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </div>
                                                            </div>
                                                            <div class="text-end mb-0 text-muted">
                                                                - by <cite title="Source Title">Zoetic
                                                                    Fashion</cite>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card border border-dashed shadow-none">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{asset('admin_assets/images/users/avatar-2.jpg')}}" alt="" class="avatar-sm rounded">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <div>
                                                                <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                    " The product is very beautiful. I like it.
                                                                    "</p>
                                                                <div class="fs-11 align-middle text-warning">
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-half-fill"></i>
                                                                    <i class="ri-star-line"></i>
                                                                </div>
                                                            </div>
                                                            <div class="text-end mb-0 text-muted">
                                                                - by <cite title="Source Title">Nancy Martino</cite>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3">
                                <h6 class="text-muted mb-3 text-uppercase fw-semibold">Customer Reviews</h6>
                                <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="fs-16 align-middle text-warning">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-half-fill"></i>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h6 class="mb-0">4.5 out of 5</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="text-muted">Total <span class="fw-medium">5.50k</span> reviews</div>
                                </div>

                                <div class="mt-3">
                                    <div class="row align-items-center g-2">
                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0">5 star</h6>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-1">
                                                <div class="progress animated-progress progress-sm">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0 text-muted">2758</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row align-items-center g-2">
                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0">4 star</h6>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-1">
                                                <div class="progress animated-progress progress-sm">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0 text-muted">1063</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row align-items-center g-2">
                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0">3 star</h6>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-1">
                                                <div class="progress animated-progress progress-sm">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0 text-muted">997</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row align-items-center g-2">
                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0">2 star</h6>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-1">
                                                <div class="progress animated-progress progress-sm">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0 text-muted">227</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row align-items-center g-2">
                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0">1 star</h6>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-1">
                                                <div class="progress animated-progress progress-sm">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="p-1">
                                                <h6 class="mb-0 text-muted">408</h6>
                                            </div>
                                        </div>
                                    </div><!-- end row -->
                                </div>
                            </div>

                            <div class="card sidebar-alert bg-light border-0 text-center mx-4 mb-0 mt-3">
                                <div class="card-body">
                                    <img src="{{asset('admin_assets/images/giftbox.png')}}" alt="">
                                    <div class="mt-4">
                                        <h5>Invite New Seller</h5>
                                        <p class="text-muted lh-base">Refer a new seller to us and earn $100 per
                                            refer.</p>
                                        <button type="button" class="btn btn-primary btn-label rounded-pill"><i class="ri-mail-fill label-icon align-middle rounded-pill fs-16 me-2"></i>
                                            Invite Now
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end card-->
                </div> <!-- end .rightbar-->

            </div> <!-- end col -->
        </div>

    </div>
    <!-- container-fluid -->
</div>
@endsection
@section('custom-script')
<script>
    function getChartColorsArray(e) {
        if (null !== document.getElementById(e)) {
            var r = document.getElementById(e).getAttribute("data-colors");
            if (r) return (r = JSON.parse(r)).map(function(e) {
                var r = e.replace(" ", "");
                if (-1 === r.indexOf(",")) {
                    var t = getComputedStyle(document.documentElement).getPropertyValue(r);
                    return t || r
                }
                e = e.split(",");
                return 2 != e.length ? r : "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(e[0]) + "," + e[1] + ")"
            });
            console.warn("data-colors atributes not found on", e)
        }
    }

    // Bar Chart

    var linechartcustomerColors = getChartColorsArray("customer_impression_charts");
    linechartcustomerColors && (options = {
        series: [{
            name: "Orders",
            type: "area",
            data: @json($list -> pluck('ordersCount'))
        }, {
            name: "Earnings",
            type: "bar",
            data: @json($list -> pluck('totalAmount'))
        }],
        chart: {
            height: 370,
            type: "line",
            toolbar: {
                show: !1
            }
        },
        stroke: {
            curve: "straight",
            dashArray: [0, 0, 8],
            width: [2, 0, 2.2]
        },
        fill: {
            opacity: [.1, .9, 1]
        },
        markers: {
            size: [0, 0, 0],
            strokeWidth: 2,
            hover: {
                size: 4
            }
        },
        xaxis: {
            categories: @json($list -> pluck('month')),
            axisTicks: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
        grid: {
            show: !0,
            xaxis: {
                lines: {
                    show: !0
                }
            },
            yaxis: {
                lines: {
                    show: !1
                }
            },
            padding: {
                top: 0,
                right: -2,
                bottom: 15,
                left: 10
            }
        },
        legend: {
            show: !0,
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: -5,
            markers: {
                width: 9,
                height: 9,
                radius: 6
            },
            itemMargin: {
                horizontal: 10,
                vertical: 0
            }
        },
        plotOptions: {
            bar: {
                columnWidth: "30%",
                barHeight: "70%"
            }
        },
        colors: linechartcustomerColors,
        tooltip: {
            shared: !0,
            y: [{
                formatter: function(e) {
                    return void 0 !== e ? e.toFixed(0) : e
                }
            }, {
                formatter: function(e) {
                    return void 0 !== e ? "$" + e.toFixed(2) + "k" : e
                }
            }, {
                formatter: function(e) {
                    return void 0 !== e ? e.toFixed(0) + " Sales" : e
                }
            }]
        }
    }, (chart = new ApexCharts(document.querySelector("#customer_impression_charts"), options)).render());

    // Donut chart
    $(document).ready(function() {
        var options, chart, chartDonutBasicColors = getChartColorsArray("store-visits-source");
        chartDonutBasicColors && (options = {
            series: [{{$all_products}}, {{$published_product}}, {{$unpublished_product}}],
            labels: ["All Products", "Published Products", "Unpublished Products"],
            chart: {
                height: 333,
                type: "donut"
            },
            legend: {
                position: "bottom"
            },
            stroke: {
                show: !1
            },
            dataLabels: {
                dropShadow: {
                    enabled: !1
                }
            },
            colors: chartDonutBasicColors
        }, (chart = new ApexCharts(document.querySelector("#store-visits-source"), options)).render());
    });
</script>

@endsection
