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
                    <div class="dropdown">
                        <a href="#currency">USD</a>
                        <div class="dropdown-box">
                            <a href="#USD">USD</a>
                            <a href="#EUR">EUR</a>
                        </div>
                    </div>
                    <!-- End of DropDown Menu -->

                    <div class="dropdown">
                        <a href="#language"><img src="{{asset('user_assets/images/flags/eng.png')}}" alt="ENG Flag" width="14" height="8" class="dropdown-image" /> ENG</a>
                        <div class="dropdown-box">
                            <a href="#ENG">
                                <img src="{{asset('user_assets/images/flags/eng.png')}}" alt="ENG Flag" width="14" height="8" class="dropdown-image" />
                                ENG
                            </a>
                            <a href="#FRA">
                                <img src="{{asset('user_assets/images/flags/fra.png')}}" alt="FRA Flag" width="14" height="8" class="dropdown-image" />
                                FRA
                            </a>
                        </div>
                    </div>
                    <!-- End of Dropdown Menu -->
                    <span class="divider d-lg-show"></span>
                    <a href="blog.html" class="d-lg-show">Blog</a>
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
                    <form method="get" action="#" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper mr-4 ml-4">
                        <div class="select-box">
                            <select id="category" name="category">
                                <option value="">All Categories</option>
                                <option value="4">Fashion</option>
                                <option value="5">Furniture</option>
                                <option value="6">Shoes</option>
                                <option value="7">Sports</option>
                                <option value="8">Games</option>
                                <option value="9">Computers</option>
                                <option value="10">Electronics</option>
                                <option value="11">Kitchen</option>
                                <option value="12">Clothing</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="search" id="search" placeholder="Search in..." required />
                        <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                        </button>
                    </form>
                </div>
                <div class="header-right ml-4">
                    <div class="header-call d-xs-show d-lg-flex align-items-center">
                        <a href="tel:#" class="w-icon-call"></a>
                        <div class="call-info d-xl-show">
                            <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                <a href="https://portotheme.com/cdn-cgi/l/email-protection#381b" class="text-capitalize">Live Chat</a> or :
                            </h4>
                            <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                        </div>
                    </div>
                    <a class="wishlist label-down link d-xs-show" href="{{route('wishlist')}}">
                        <i class="w-icon-heart"></i>
                        <span class="wishlist-label d-lg-show">Wishlist</span>
                    </a>
                    <a class="compare label-down link d-xs-show" href="compare.html">
                        <i class="w-icon-compare"></i>
                        <span class="compare-label d-lg-show">Compare</span>
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
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="{{route('index')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('products')}}">Shop</a>
                                </li>
                                <li>
                                    <a href="vendor-dokan-store.html">Vendor</a>
                                    <ul>
                                        <li>
                                            <a href="vendor-dokan-store-list.html">Store Listing</a>
                                            <ul>
                                                <li><a href="vendor-dokan-store-list.html">Store listing 1</a></li>
                                                <li><a href="vendor-wcfm-store-list.html">Store listing 2</a></li>
                                                <li><a href="vendor-wcmp-store-list.html">Store listing 3</a></li>
                                                <li><a href="vendor-wc-store-list.html">Store listing 4</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="vendor-dokan-store.html">Vendor Store</a>
                                            <ul>
                                                <li><a href="vendor-dokan-store.html">Vendor Store 1</a></li>
                                                <li><a href="vendor-wcfm-store-product-grid.html">Vendor Store 2</a>
                                                </li>
                                                <li><a href="vendor-wcmp-store-product-grid.html">Vendor Store 3</a>
                                                </li>
                                                <li><a href="vendor-wc-store-product-grid.html">Vendor Store 4</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.html">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">Classic</a></li>
                                        <li><a href="blog-listing.html">Listing</a></li>
                                        <li>
                                            <a href="blog-grid-3cols.html">Grid</a>
                                            <ul>
                                                <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                                <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                                <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                                <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="blog-masonry-3cols.html">Masonry</a>
                                            <ul>
                                                <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                                <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                                <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                                <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="blog-mask-grid.html">Mask</a>
                                            <ul>
                                                <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                                <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="post-single.html">Single Post</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about-us.html">Pages</a>
                                    <ul>

                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="become-a-vendor.html">Become A Vendor</a></li>
                                        <li><a href="contact-us.html">Contact Us</a></li>
                                        <li><a href="faq.html">FAQs</a></li>
                                        <li><a href="error-404.html">Error 404</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="elements.html">Elements</a>
                                    <ul>
                                        <li><a href="element-accordions.html">Accordions</a></li>
                                        <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                                        <li><a href="element-blog-posts.html">Blog Posts</a></li>
                                        <li><a href="element-buttons.html">Buttons</a></li>
                                        <li><a href="element-cta.html">Call to Action</a></li>
                                        <li><a href="element-icons.html">Icons</a></li>
                                        <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                                        <li><a href="element-instagrams.html">Instagrams</a></li>
                                        <li><a href="element-categories.html">Product Category</a></li>
                                        <li><a href="element-products.html">Products</a></li>
                                        <li><a href="element-tabs.html">Tabs</a></li>
                                        <li><a href="element-testimonials.html">Testimonials</a></li>
                                        <li><a href="element-titles.html">Titles</a></li>
                                        <li><a href="element-typography.html">Typography</a></li>

                                        <li><a href="element-vendors.html">Vendors</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right pr-0 ml-4">
                        <a href="#" class="d-xl-show mr-6"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                        <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
                    </div>
                </div>
            </div>
        </div>
    </header>