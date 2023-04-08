@extends('user.layout.layout',['useAssets'=>['vendor_swiper','magnific','styles']])
@section('title','Checkout')
@section('custom-class','')
@section('content')
<main class="main checkout">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="{{route('cart')}}">Shopping Cart</a></li>
                <li class="active"><a href="{{route('checkout')}}">Checkout</a></li>
                <li><a href="javascript:void(0)">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->


    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            @if (auth()->check())
            <div class="login-toggle">
                Welcome Back {{ auth()->user()->name }}
            </div>
            @else
            <div class="login-toggle">
                Returning customer? <a href="#" class="show-login font-weight-bold text-uppercase text-dark">Login</a>
            </div>
            <form class="login-content" id="loginForm">
                <p>If you have shopped with us before, please enter your details below.
                    If you are a new customer, please proceed to the Billing section.</p>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Username or email *</label>
                            <input type="text" class="form-control form-control-md" name="email" id="email">
                            <div class="error-email"></div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" class="form-control form-control-md" name="password" id="password">
                            <div class="error-password"></div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="submitForm" class="btn btn-rounded btn-login">Login</button>
            </form>
            @endif

            <div class="coupon-toggle">
                Have a coupon? <a href="#" class="show-coupon font-weight-bold text-uppercase text-dark">Enter your
                    code</a>
            </div>
            <div class="coupon-content mb-4">
                <p>If you have a coupon code, please apply it below.</p>
                <div class="input-wrapper-inline">
                    <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2" placeholder="Coupon code" id="coupon_code">
                    <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Apply Coupon</button>
                </div>
            </div>
            <div class="row mb-9">
                <div class="col-lg-7 pr-lg-4 mb-4">

                    <form class="form checkout-form" action="{{ route('billing-address') }}" method="POST">
                        @csrf
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>First name *</label>
                                    <input type="text" class="form-control form-control-md" name="firstname" value="{{ !empty(auth()->user()->name) ? auth()->user()->name : '' }}">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Last name *</label>
                                    <input type="text" class="form-control form-control-md" name="lastname" value="{{ !empty(auth()->user()->last_name) ? auth()->user()->last_name : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Country / Region *</label>
                            <div class="select-box">
                                <select name="country" class="form-control form-control-md">
                                    <option value="">Select Country</option>
                                    @if (!empty(auth()->user()->country_id))
                                    @foreach ($country as $item)
                                    <option value="{{ $item->id }}" {{ $item->id==auth()->user()->country_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                    @endif


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Street address *</label>
                            <input type="text" placeholder="House number and street name" class="form-control form-control-md mb-2" name="address" value="{{ !empty(auth()->user()->address) ? auth()->user()->address : '' }}">
                        </div>
                        <div class="row gutter-sm">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Town / City *</label>
                                    <div class="select-box">
                                        <select name="city" class="form-control form-control-md">
                                            <option value="">Select City</option>
                                            @if (!empty(auth()->user()->city_id))
                                            @foreach ($city as $item)
                                            <option value="{{ $item->id }}" {{ $item->id==auth()->user()->city_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Post Code *</label>
                                    <input type="text" class="form-control form-control-md" name="postCode" value="{{ !empty(auth()->user()->postCode) ? auth()->user()->postCode : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State *</label>
                                    <div class="select-box">
                                        <select name="state" class="form-control form-control-md">
                                            <option value="">Select State</option>
                                            @if (!empty(auth()->user()->state_id))
                                            @foreach ($state as $item)
                                            <option value="{{ $item->id }}" {{ $item->id==auth()->user()->state_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="text" class="form-control form-control-md" name="phone" value="{{ !empty(auth()->user()->phone) ? auth()->user()->phone : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-7">
                            <label>Email address *</label>
                            <input type="email" class="form-control form-control-md" name="email" value="{{ !empty(auth()->user()->email) ? auth()->user()->email : '' }}">
                        </div>
                        <div class="form-group mb-7">
                            <div>
                                <button type="submit" id="submitBillingForm" class="btn btn-dark btn-block btn-rounded">Save Address</button>
                            </div>
                        </div>

                    </form>

                    <form class="form checkout-form" action="#" method="post">
                        <div class="form-group pb-2">
                            <input type="checkbox" class="custom-checkbox" id="shipping" name="shipping-toggle">
                            <label for="shipping-toggle">Same as Billing Address?</label>
                        </div>
                        <div class="form-group mt-3">
                            <label for="order-notes">Order notes (optional)</label>
                            <textarea class="form-control mb-0" id="order-notes" name="order-notes" cols="30" rows="4" placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                        </div>
                    </form>
                </div>

                <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                    <div class="order-summary-wrapper sticky-sidebar">

                        <form class="form checkout-form" action="{{ route('place_order') }}" method="post">
                            @csrf
                            <h3 class="title text-uppercase ls-10">Your Order</h3>
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                <b>Product</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (session()->get('cart'))
                                        @foreach (session('cart') as $v=>$detail)
                                        <tr class="bb-no">
                                            <td class="product-name">{{ $detail['product_name'] }}<i class="fas fa-times"></i> <span class="product-quantity">{{$detail['quantity']}}</span></td>
                                            <td class="product-total">${{ $detail['price']  * $detail['quantity']}}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="3" class="text-center mt-3 mb-3">No record Found</td>
                                        </tr>
                                        @endif

                                    </tbody>
                                    <tfoot>
                                        <tr class="shipping-methods">
                                            <td colspan="2" class="text-left">
                                                <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                </h4>
                                                <ul id="shipping-method" class="mb-4">
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="free-shipping" class="custom-control-input" name="shipping_method" value="free">
                                                            <label for="free-shipping" class="custom-control-label color-dark">Free
                                                                Shipping</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="flat-rate" class="custom-control-input" name="shipping_method" value="flat Rate">
                                                            <label for="flat-rate" class="custom-control-label color-dark">Flat
                                                                rate: $5.00</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>
                                                <b>Total</b>
                                            </th>
                                            <td>
                                                @php $total = 0 @endphp
                                                @if (!empty(session()->get('cart')))
                                                @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                                @endforeach
                                                @endif
                                                <b>${{ !empty($total) ? $total : 0 }}</b>
                                                <input type="hidden" name="total" value="{{ $total }}" />
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="payment-methods" id="payment_method">
                                    <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                    <ul id="shipping-method" class="mb-4" style="list-style: none;">
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="Direct-Bank-Transfer" class="custom-control-input" name="payment_method" value="Direct Bank Transfer">
                                                <label for="Direct-Bank-Transfer" class="custom-control-label color-dark">Direct Bank Transfer</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="Cash-On-Dilivery"  class="custom-control-input" name="payment_method" value="Cash On Dilivery">
                                                <label for="Cash-On-Dilivery" class="custom-control-label color-dark">Cash On Delivery</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="Easy-Paisa" class="custom-control-input" name="payment_method" value="Easy Paisa">
                                                <label for="Easy-Paisa" class="custom-control-label color-dark">Easy Paisa</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="form-group place-order pt-6">
                                    @if (auth()->check())
                                    <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                    @else
                                    <button type="button" class="btn btn-dark btn-block btn-rounded">Login to Place Order</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection

@section('custom-scripts')
<script>
    $("#loginForm").on('submit', function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        });
        $.ajax({
            type: "POST",
            url: "{{ route('user_login') }}",
            dataType: 'json',
            data: {
                email: email,
                password: password
            },
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $("#submitForm").prop('disabled', true);
                $("#submitForm").html('Processing');
                $('.error-message').hide();
            },
            success: function(res) {
                $("#submitForm").prop('disabled', false);
                $("#submitForm").html('Log in');
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
            error: function(e) {
                $("#submitForm").prop('disabled', false);
                $("#submitForm").html('Submit');

                if (e.responseJSON.errors['email']) {
                    $('.error-email').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['email'][0] + '</small>');
                }

                if (e.responseJSON.errors['password']) {
                    $('.error-password').html('<small class=" error-message text-danger">' + e
                        .responseJSON.errors['password'][0] + '</small>');
                }
            }
        });
    });

    $('#shipping').on('change', function(e) {
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        });
        $.ajax({
            type: "POST",
            url: "{{ route('shipping-address') }}",
            beforeSend: function() {},
            success: function(res) {
                if (res.success === true) {
                    notyf.success({
                        message: res.message,
                        duration: 3000
                    });
                } else {}
            },
            error: function(e) {}
        });
    });
</script>

@endsection