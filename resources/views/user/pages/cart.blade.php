@extends('user.layout.layout',['useAssets'=>['vendor_swiper','magnific','styles']])
@section('title','Shopping Cart')
@section('custom-class','')
@section('content')
<main class="main cart">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="{{route('cart')}}">Shopping Cart</a></li>
                <li><a href="{{route('checkout')}}">Checkout</a></li>
                <li><a href="javascript:void(0)">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg mb-10">
                <div class="col-lg-8 pr-lg-4 mb-6">
                    <table class="shop-table cart-table">
                        <thead>
                            <tr>
                                <th class="product-name"><span>Product</span></th>
                                <th></th>
                                <th class="product-price"><span>Price</span></th>
                                <th class="product-quantity"><span>Quantity</span></th>
                                <th class="product-subtotal"><span>Total</span></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session()->get('cart'))
                            @foreach (session('cart') as $v=>$detail)
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="{{ route('product_details',$detail['product_slug'] ) }}">
                                            <figure>
                                                <img src="{{asset($detail['photo'])}}" alt="product" width="300" height="338">
                                            </figure>
                                        </a>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="{{ route('product_details',$detail['product_slug'] ) }}">
                                        {{ $detail['product_name'] }} * {{ $detail['quantity'] }}
                                    </a>
                                </td>
                                <td class="product-price text-center"><span class="amount">$ {{ $detail['price'] }}</span></td>
                                <td class="product-quantity text-center">
                                    <div class="input-group">
                                        <input class="form-control" name="updateCart" type="number" min="1" max="100000" value="{{ $detail['quantity'] }}">
                                        <button class="quantity-plus w-icon-plus" data-id="{{ $v  }}"></button>
                                        <button class="quantity-minus w-icon-minus" data-id="{{ $v }}"></button>
                                    </div>
                                </td>
                                <td class="product-subtotal text-center">
                                    <span class="amount">${{ $detail['price'] * $detail['quantity'] }}</span>
                                </td>
                                <td>
                                <td class="text-center">
                                    <button class="btn btn-link deleteCart" data-id="{{ $v }}"><i class="fa fa-trash"></i></button>
                                </td>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center mt-3 mb-3">No record Found</td>
                            </tr>
                            @endif

                        </tbody>
                    </table>

                    <div class="cart-action mb-6">
                        <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                        <button type="button" class="btn btn-rounded btn-default btn-clear" onclick="clearCart()" name="clear_cart" value="Clear Cart">Clear Cart</button>
                    </div>

                    <form class="coupon">
                        <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                        <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..." required />
                        <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                    </form>
                </div>
                <div class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar">
                        <div class="cart-summary mb-4">
                            <h3 class="cart-title text-uppercase">Cart Totals</h3>
                            <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                <label class="ls-25">Subtotal</label>
                                @php $total = 0 @endphp
                                @if (!empty(session()->get('cart')))
                                @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                @endif
                                <span>${{ !empty($total) ? $total : 0 }}</span>
                            </div>
                            <hr class="divider mb-6">
                            <div class="order-total d-flex justify-content-between align-items-center">
                                <label>Total</label>
                                <span class="ls-50">${{ !empty($total) ? $total : 0 }}</span>
                            </div>
                            <a href="{{ route('checkout') }}" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                        </div>
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
    function clearCart()
    {
        $.ajax({
            type: "POST",
            url: "{{route('clear_cart')}}",
            dataType: 'json',
            data: {
                _token: '{{csrf_token()}}'
            },
            beforeSend: function() {},
            success: function(res) {
                if (res.success === true) {
                    notyf.success({
                        message: res.message,
                        duration: 2000
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000);
                } else {}
            },
            error: function(e) {}
        });
    }
    $('.w-icon-plus').on('click', function(e) {
        var id = $(this).attr('data-id');
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{route('updateCartItems')}}",
            dataType: 'json',
            data: {
                type: "Plus",
                id: id,
                _token: '{{csrf_token()}}'
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
                    }, 4000);
                } else {}
            },
            error: function(e) {}
        });
    })

    $('.w-icon-minus').on('click', function(e) {
        var id = $(this).attr('data-id');
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{route('updateCartItems')}}",
            dataType: 'json',
            data: {
                type: "Minus",
                id: id,
                _token: '{{csrf_token()}}'
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
                    }, 4000);
                } else {}
            },
            error: function(e) {}
        });
    })
</script>
@endsection
