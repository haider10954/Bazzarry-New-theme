@extends('seller.layout.layout')
@section('title','Seller-Dashboard | Orders')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Orders</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="orderList">
                        <div class="card-header  border-0">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">Order History</h5>
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-3">
                            <div class="table-responsive table-card mb-1">
                                <table class="table table-nowrap table-bordered align-middle" id="orderTable">
                                    <thead class="text-muted table-light">
                                    <tr class="text-uppercase">
                                        <th scope="col" style="width: 25px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th class="sort" data-sort="id">Order ID</th>
                                        <th class="sort" data-sort="customer_name">Customer</th>
                                        <th class="sort" data-sort="product_name">Product</th>
                                        <th class="sort" data-sort="date">Order Date</th>
                                        <th class="sort" data-sort="amount">Amount</th>
                                        <th class="sort" data-sort="payment">Payment Method</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                    @if(!empty($sellerOrders))
                                        @foreach($sellerOrders as $item)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                                    </div>
                                                </th>
                                                <td class="id">{{$loop->index+1}}</td>
                                                <td class="customer_name">{{$item->getUser->name}}</td>
                                                <td class="product_name">
                                                    <ul class="list-group list-group-flush">
                                                        @if(!empty($item->order_items))
                                                            @foreach($item->order_items as $key=>$value)
                                                                <li class="list-group-item">
                                                                    {{$value['product_name'] }}
                                                                </li>
                                                            @endforeach
                                                        @endif

                                                    </ul>

                                                </td>
                                                <td class="date">{{\Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</td>
                                                <td class="amount">Rs. {{$item->total}}</td>
                                                <td class="payment">{{$item->payment_method}}</td>

                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6">No Record Found...</td>
                                        </tr>
                                    @endif

                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
@endsection

