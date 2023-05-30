    @php
    $category = Illuminate\Support\Facades\DB::table('categories')->where('status', 'published')->get();
    @endphp

    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <p class="welcome-msg">Become a Seller ? <a href="{{route('seller_login')}}">LOGIN</a></p>
                </div>
                <div class="header-right pr-0">
                    <span class="divider d-lg-show"></span>
                    <a href="contact-us.html" class="d-lg-show">Contact Us</a>
                    @if (auth()->check())

                    <a href="{{route('user-profile')}}" class="d-lg-show">My Account</a>
                    @endif
                    @if (!auth()->check())
                    <a href="#" class="d-lg-show trigger"><i class="w-icon-account"></i>Sign In
                        <span class="delimiter d-lg-show">/</span>
                        <span class="d-lg-show login sign-in">Register</span>
                    </a>
                    @else
                    <a href="{{ route('user_logout') }}" class="d-lg-show"><i class="w-icon-account"></i>Logout</a>
                    @endif

                </div>
            </div>
        </div>
        <!-- End of Header Top -->

        <div class="header-middle">
            <div class="container">
                <div class="header-left mr-md-4">
                    <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                    </a>
                    <a href="{{route('index')}}" class="logo ml-lg-0">
                        <img src="{{asset('user_assets/images/demos/demo2/logo.png')}}" alt="logo" width="144" height="45" />
                    </a>
                    <form method="get" action="{{ url('products') }}" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper mr-4 ml-4">
                        <div class="select-box">
                            <select id="category" name="category">
                                <option value="">All Categories</option>
                                @foreach ($category as $cate)
                                <option {{ request('category') == $cate->name ? 'selected' : '' }} value="{{ $cate->name }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" class="form-control" name="search" id="search" value="{{ request('search') }}" placeholder="Search in..." />
                        <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                        </button>
                    </form>
                </div>
                <div class="header-right ml-4">
                    <div class="header-call d-xs-show d-lg-flex align-items-center">
                        <a href="tel:#" class="w-icon-call"></a>
                        <div class="call-info d-xl-show">
                            <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                <a href="javascript:void(0)" class="text-capitalize">Live Chat</a> or :
                            </h4>
                            <a href="tel:#" class="phone-number font-weight-bolder ls-50">+923037123272</a>
                        </div>
                    </div>
                    <a class="wishlist label-down link d-xs-show" href="{{route('wishlist')}}">
                        <i class="w-icon-heart"></i>
                        <span class="wishlist-label d-lg-show">Wishlist</span>
                    </a>
                    <div class="dropdown cart-dropdown mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="#" class="cart-toggle label-down link">
                            <i class="w-icon-cart">
                                @if (!empty(session()->get('cart')))
                                <span class="cart-count">{{ count(session('cart')) }}</span>
                                @else
                                <span class="cart-count">0</span>
                                @endif

                            </i>
                            <span class="cart-label">Cart</span>
                        </a>
                        <div class="dropdown-box">
                            <div class="products">
                                @if (session()->get('cart'))
                                @foreach (session('cart') as $v=>$detail)
                                <div class="product product-cart">
                                    <div class="product-detail">
                                        <a href="{{ route('product_details',$detail['product_slug'] ) }}" class="product-name">{{ $detail['product_name'] }}</a>
                                        <div class="price-box">
                                            <span class="product-quantity">{{ $detail['quantity'] }}</span>
                                            <span class="product-price">${{ $detail['price'] }}</span>
                                        </div>
                                    </div>
                                    <figure class="product-media">
                                        <a href="{{ route('product_details',$detail['product_slug'] ) }}">
                                            <img src="{{asset($detail['photo'])}}" alt="product" height="84" width="94" />
                                        </a>
                                    </figure>
                                    <button class="btn btn-link btn-close deleteCart" aria-label="button" data-id="{{ $v }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>

                                @endforeach
                                @else
                                <div class="product product-cart">
                                    <div class="product-detail">
                                        <div>No record Found</div>
                                    </div>
                                </div>

                                @endif


                            </div>

                            <div class="cart-total">
                                <label>Subtotal:</label>
                                @php $total = 0 @endphp
                                @if (!empty(session()->get('cart')))
                                @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                @endif
                                <span class="price">${{ !empty($total) ? $total : 0 }}</span>
                            </div>

                            <div class="cart-action">
                                <a href="{{route('cart')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                <a href="{{route('checkout')}}" class="btn btn-primary  btn-rounded">Checkout</a>
                            </div>
                        </div>
                        <!-- End of Dropdown Box -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Header Middle -->

        <div class="header-bottom sticky-content fix-top sticky-header">
            <div class="container">
                <div class="inner-wrap">
                    <div class="header-left flex-1">
                        <div class="dropdown category-dropdown has-border" data-visible="true">
                            <a href="#" class="category-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                                <i class="w-icon-category"></i>
                                <span>Browse Categories</span>
                            </a>

                            <div class="dropdown-box">
                                <ul class="menu vertical-menu category-menu">
                                    @if ($category->count() > 0)
                                    @foreach ($category as $item )
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="w-icon-tshirt2"></i>{{ $item->name }}
                                        </a>
                                        <ul class="megamenu">
                                            <li>
                                                <h4 class="menu-title">Women</h4>
                                                <hr class="divider">
                                                <ul>
                                                    <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                            Watches</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h4 class="menu-title">Men</h4>
                                                <hr class="divider">
                                                <ul>
                                                    <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                            Watches</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="banner-fixed menu-banner menu-banner2">
                                                    <figure>
                                                        <img src="{{asset('user_assets/images/menu/banner-2.jpg')}}" alt="Menu Banner" width="235" height="347" />
                                                    </figure>
                                                    <div class="banner-content">
                                                        <div class="banner-price-info mb-1 ls-normal">Get up to
                                                            <strong class="text-primary text-uppercase">20%Off</strong>
                                                        </div>
                                                        <h3 class="banner-title ls-normal">Hot Sales</h3>
                                                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-sm btn-link btn-slide-right btn-icon-right">
                                                            Shop Now<i class="w-icon-long-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach
                                    @else
                                    <li>
                                        <a>
                                            <i class="w-icon-tshirt2"></i>No Record Found
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <nav class="main-nav mx-auto">
                            <ul class="menu">
                                <li class="active">
                                    <a href="{{route('index')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('products')}}">Shop</a>
                                </li>
                                <li>
                                    <a href="{{route('about-us')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{route('contact-us')}}">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
