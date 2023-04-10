@extends('user.layout.layout',['useAssets'=>['vendor_swiper','magnific','styles']])
@section('title','Order Complete')
@section('custom-class','')
@section('content')
<main class="main order">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="{{route('cart')}}">Shopping Cart</a></li>
                <li class="passed"><a href="{{route('checkout')}}">Checkout</a></li>
                <li class="active"><a href="javascrpt:void(0)">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="order-success text-center font-weight-bolder text-dark">
                <i class="fas fa-check"></i>
                Thank you. Your order has been received.
            </div>
            <!-- End of Order Success -->

            <ul class="order-view list-style-none">
                <li>
                    <label>Order number</label>
                    <strong>{{ $order->order_id }}</strong>
                </li>
                <li>
                    <label>Status</label>
                    @if ($order->status == 0)

                    <strong>On hold</strong>
                    @else

                    <strong>Accepted</strong>
                    @endif
                </li>
                <li>
                    <label>Date</label>
                    <strong>{{\Carbon\Carbon::parse($order->created_at)->format('M d,Y')}}</strong>
                </li>
                <li>
                    <label>Total</label>
                    <strong>${{ $order->total }}</strong>
                </li>
                <li>
                    <label>Payment method</label>
                    <strong>{{ $order->payment_method }}</strong>
                </li>
            </ul>
            <!-- End of Order View -->

            <div class="order-details-wrapper mb-5">
                <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th class="text-dark">Product</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (unserialize($order->cart_items) as $key => $value)
                        <tr>
                            <td>
                                <a href="#">{{ $value['product_name'] }}</a>&nbsp;<strong>x {{ $value['quantity'] }}</strong><br>
                            </td>
                            <td>${{ $value['price'] }}</td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Subtotal:</th>
                            <td>${{ $order->total }}</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td>{{ $order->shipping_method }}</td>
                        </tr>
                        <tr>
                            <th>Payment method:</th>
                            <td>{{ $order->payment_method }}</td>
                        </tr>
                        <tr class="total">
                            <th class="border-no">Total:</th>
                            <td class="border-no">${{ $order->total }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- End of Order Details -->

            <div id="account-addresses">
                <div class="row">
                    <div class="col-sm-6 mb-8">
                        <div class="ecommerce-address billing-address">
                            <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                            <address class="mb-4">
                                <table class="address-table">
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->getBillingAddress->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $order->getBillingAddress->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $order->getBillingAddress->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $order->getBillingAddress->getUser->getCountry->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $order->getBillingAddress->getUser->get_State->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $order->getBillingAddress->getUser->getCity->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $order->getBillingAddress->phone }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </address>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-8">
                        <div class="ecommerce-address shipping-address">
                            <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                            <address class="mb-4">
                                <table class="address-table">
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->getShippingAddress->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $order->getShippingAddress->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $order->getShippingAddress->address }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Account Address -->

            <a href="{{ route('index') }}" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Back To List</a>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection