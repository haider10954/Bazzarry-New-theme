@extends('user.layout.layout',['useAssets'=>['plugin','home_plugin','photoswipe','styles','sticky','imagesloaded','magnific','vendor_swiper','zoom']])
@section('title','Product Details')
@section('custom-class','')
@section('content')
<main class="main mb-10 pb-1">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('products')}}">Products</a></li>
            <li>Vertical Thumbs</li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="product product-single row">
                <div class="col-md-6 mb-6">
                    <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                        <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    }
                                }">
                            <div class="swiper-wrapper row cols-1 gutter-no">
                                @foreach ($product->images as $file)

                                <div class="swiper-slide">
                                    <figure class="product-image">
                                        <img src="{{asset($file)}}" data-zoom-image="{{asset($file)}}" alt="{{$product->title}}" width="800" height="900">
                                    </figure>
                                </div>

                                @endforeach
                            </div>
                            <button class="swiper-button-next"></button>
                            <button class="swiper-button-prev"></button>
                            <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                        </div>
                        <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                    'navigation': {
                                        'nextEl': '.swiper-button-next',
                                        'prevEl': '.swiper-button-prev'
                                    },
                                    'breakpoints': {
                                        '992': {
                                            'direction': 'vertical',
                                            'slidesPerView': 'auto'
                                        }
                                    }
                                }">
                            <div class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">

                                @foreach ($product->images as $file)
                                <div class="product-thumb swiper-slide">
                                    <img src="{{asset($file)}}" alt="Product Thumb" width="800" height="900">
                                </div>
                                @endforeach

                            </div>
                            <button class="swiper-button-prev"></button>
                            <button class="swiper-button-next"></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 mb-md-6">
                    <div class="product-details">
                        <h1 class="product-title">{{ $product->title }}</h1>
                        <div class="product-bm-wrapper">
                            <figure class="brand">
                                <img src="{{asset($product->thumbnail)}}" alt="Brand" width="105" height="48" />
                            </figure>
                            <div class="product-meta">
                                <div class="product-categories">
                                    Category:
                                    <span class="product-category"><a href="#">{{ $product->getCategory->name }}</a></span>
                                </div>
                                <div class="product-sku">
                                    SKU: <span>{{ $product->sku }}</span>
                                </div>
                            </div>
                        </div>

                        <hr class="product-divider">
                        @php
                        $DiscountedPrice = $product->discount;
                        @endphp

                        @if (!empty($DiscountedPrice))
                        @php
                        $DiscountedPrice = $product->price - ($product->discount /100 * $product->price)
                        @endphp
                        @endif
                        <div class="product-price">
                            <div class="d-flex justifiy-content-between align-items-center">
                                @if (!empty($DiscountedPrice))
                                <del>${{ $product->price  }}</del>
                                @else
                                <div class="new-price">${{ $product->price  }}</div>
                                @endif
                                <div class="new-price {{ empty($DiscountedPrice) ? 'd-none' : 'd-block' }} me-2">${{ $DiscountedPrice }}</div>
                            </div>
                        </div>

                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 80%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="#" class="rating-reviews">({{ $Product_review->count() }} Reviews)</a>
                        </div>

                        <div class="product-short-desc lh-2">
                            <ul class="list-type-check list-style-none">
                                <p class="mb-0">{!! $product->description !!}</p>
                            </ul>
                        </div>

                        <hr class="product-divider">

                        <div class="fix-bottom product-sticky-content sticky-content">
                            <div class="product-form container">
                                <div class="product-qty-form with-label">
                                    <label>Quantity:</label>
                                    <div class="input-group">
                                        <input class="quantity form-control" type="number" min="1" max="10000000">
                                        <button class="quantity-plus w-icon-plus"></button>
                                        <button class="quantity-minus w-icon-minus"></button>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-cart">
                                    <i class="w-icon-cart"></i>
                                    <span>Add to Cart</span>
                                </button>
                            </div>
                        </div>

                        <div class="social-links-wrapper">
                            <div class="social-links">
                                <div class="social-icons social-no-color border-thin">
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                    <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                    <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                    <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                                </div>
                            </div>
                            <span class="divider d-xs-show"></span>
                            <div class="product-link-wrapper d-flex">
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                <a href="#" class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab tab-nav-boxed tab-nav-underline product-tabs mt-3">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#product-tab-description" class="nav-link active">Description</a>
                    </li>
                    <li class="nav-item">

                        <a href="#product-tab-reviews" class="nav-link">Customer Reviews ({{ $Product_review->count() }})</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="product-tab-description">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-5">
                                <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                <p class="mb-4">{!! $product->description !!}</p>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="banner banner-video product-video br-xs">
                                    <figure class="banner-media">
                                        <a href="#">
                                            <img src="{{asset($product->thumbnail)}}" alt="banner" width="610" height="300" style="background-color: #bebebe;">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="row cols-md-3">
                            <div class="mb-3">
                                <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free Shipping
                                    &amp; Return</h5>
                                <p class="detail pl-5">We offer free shipping for products on orders above 50$
                                    and offer free delivery for all orders in US.</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy Returns</h5>
                                <p class="detail pl-5">We guarantee our products and you could get back all of
                                    your money anytime you want in 30 days.</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing</h5>
                                <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or over 250$
                                    for a year with our special credit card.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="product-tab-reviews">
                        <div class="row mb-4">
                            <div class="col-xl-4 col-lg-5 mb-4">
                                <div class="ratings-wrapper">
                                    <div class="avg-rating-container">
                                        <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                        <div class="avg-rating">
                                            <p class="text-dark mb-1">Average Rating</p>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 60%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="#" class="rating-reviews">({{ $Product_review->count() }} Reviews)</a>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                    $totalReviews = Illuminate\Support\Facades\DB::table('reviews')->get();
                                    @endphp
                                    <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                        <span class="text-dark font-weight-bold">66.7%</span>Recommended<span class="count">({{ $Product_review->count() }} of {{ $totalReviews->count() }})</span>
                                    </div>
                                    <div class="ratings-list">
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <div class="progress-bar progress-bar-sm ">
                                                <span></span>
                                            </div>
                                            <div class="progress-value">
                                                <mark>70%</mark>
                                            </div>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <div class="progress-bar progress-bar-sm ">
                                                <span></span>
                                            </div>
                                            <div class="progress-value">
                                                <mark>30%</mark>
                                            </div>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <div class="progress-bar progress-bar-sm ">
                                                <span></span>
                                            </div>
                                            <div class="progress-value">
                                                <mark>40%</mark>
                                            </div>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 40%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <div class="progress-bar progress-bar-sm ">
                                                <span></span>
                                            </div>
                                            <div class="progress-value">
                                                <mark>0%</mark>
                                            </div>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 20%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <div class="progress-bar progress-bar-sm ">
                                                <span></span>
                                            </div>
                                            <div class="progress-value">
                                                <mark>0%</mark>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7 mb-4">
                                <div class="review-form-wrapper">
                                    <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your Review
                                    </h3>
                                    <p class="mb-3">Your email address will not be published. Required fields
                                        are marked *</p>
                                    <form id="reviewForm" class="review-form">
                                        @csrf
                                        <input type="hidden" value="{{$product->id}}" name="product_id">
                                        <div class="rating-form">
                                            <label for="rating">Your Rating Of This Product :</label>
                                            <span class="rating-stars">
                                                <a class="star-1" href="#">1</a>
                                                <a class="star-2" href="#">2</a>
                                                <a class="star-3" href="#">3</a>
                                                <a class="star-4" href="#">4</a>
                                                <a class="star-5" href="#">5</a>
                                            </span>
                                            <select name="rating" id="rating" required="" style="display: none;">
                                                <option value="">Rate…</option>
                                                <option value="5">Perfect</option>
                                                <option value="4">Good</option>
                                                <option value="3">Average</option>
                                                <option value="2">Not that bad</option>
                                                <option value="1">Very poor</option>
                                            </select>
                                        </div>
                                        <textarea cols="30" rows="6" name="message" placeholder="Write Your Review Here..." class="form-control" id="review"></textarea>
                                        <div class="row gutter-md">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Your Name" id="author">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Your Email" id="email_1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" class="custom-checkbox" id="save-checkbox">
                                            <label for="save-checkbox">Save my name, email, and website in this
                                                browser for the next time I comment.</label>
                                        </div>
                                        @if(auth()->check())
                                            <button type="submit" id="submitForm" class="btn btn-dark">Submit Review</button>
                                        @endif

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#show-all" class="nav-link active">Show All</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#helpful-positive" class="nav-link">Most Helpful Positive</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#helpful-negative" class="nav-link">Most Helpful Negative</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#highest-rating" class="nav-link">Highest Rating</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="show-all">
                                    <ul class="comments list-style-none">
                                        <li class="comment">
                                            <div class="comment-body">
                                                <figure class="comment-avatar">
                                                    <img src="{{asset('user_assets/images/agents/1-100x100.png')}}" alt="Commenter Avatar" width="90" height="90">
                                                </figure>
                                                <div class="comment-content">
                                                    <h4 class="comment-author">
                                                        <a href="#">John Doe</a>
                                                        <span class="comment-date">March 22, 2021 at 1:54
                                                            pm</span>
                                                    </h4>
                                                    <div class="ratings-container comment-rating">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <p>pellentesque habitant morbi tristique senectus et. In
                                                        dictum non consectetur a erat.
                                                        Nunc ultrices eros in cursus turpis massa tincidunt ante
                                                        in nibh mauris cursus mattis.
                                                        Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                        tristique.</p>
                                                    <div class="comment-action">
                                                        <a href="#" class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                        </a>
                                                        <a href="#" class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                        </a>
                                                        <div class="review-image">
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{asset('user_assets/images/products/default/review-img-1.jpg')}}" width="60" height="60" alt="Attachment image of John Doe's review on Electronics Black Wrist Watch" data-zoom-image="{{asset('user_assets/images/products/default/review-img-1-800x900.jpg')}}" />
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment">
                                            <div class="comment-body">
                                                <figure class="comment-avatar">
                                                    <img src="{{asset('user_assets/images/agents/2-100x100.png')}}" alt="Commenter Avatar" width="90" height="90">
                                                </figure>
                                                <div class="comment-content">
                                                    <h4 class="comment-author">
                                                        <a href="#">John Doe</a>
                                                        <span class="comment-date">March 22, 2021 at 1:52
                                                            pm</span>
                                                    </h4>
                                                    <div class="ratings-container comment-rating">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <p>Nullam a magna porttitor, dictum risus nec, faucibus
                                                        sapien.
                                                        Ultrices eros in cursus turpis massa tincidunt ante in
                                                        nibh mauris cursus mattis.
                                                        Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                        tristique.</p>
                                                    <div class="comment-action">
                                                        <a href="#" class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                        </a>
                                                        <a href="#" class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                        </a>
                                                        <div class="review-image">
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{asset('user_assets/images/products/default/review-img-2.jpg')}}" width="60" height="60" alt="Attachment image of John Doe's review on Electronics Black Wrist Watch" data-zoom-image="{{asset('user_assets/images/products/default/review-img-2.jpg')}}" />
                                                                </figure>
                                                            </a>
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{asset('user_assets/images/products/default/review-img-3.jpg')}}" width="60" height="60" alt="Attachment image of John Doe's review on Electronics Black Wrist Watch" data-zoom-image="{{asset('user_assets/images/products/default/review-img-3.jpg')}}" />
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment">
                                            <div class="comment-body">
                                                <figure class="comment-avatar">
                                                    <img src="{{asset('user_assets/images/agents/3-100x100.png')}}" alt="Commenter Avatar" width="90" height="90">
                                                </figure>
                                                <div class="comment-content">
                                                    <h4 class="comment-author">
                                                        <a href="#">John Doe</a>
                                                        <span class="comment-date">March 22, 2021 at 1:21
                                                            pm</span>
                                                    </h4>
                                                    <div class="ratings-container comment-rating">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <p>In fermentum et sollicitudin ac orci phasellus. A
                                                        condimentum vitae
                                                        sapien pellentesque habitant morbi tristique senectus
                                                        et. In dictum
                                                        non consectetur a erat. Nunc scelerisque viverra mauris
                                                        in aliquam sem fringilla.</p>
                                                    <div class="comment-action">
                                                        <a href="#" class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-up"></i>Helpful (0)
                                                        </a>
                                                        <a href="#" class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-down"></i>Unhelpful (1)
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="helpful-positive">
                                    <ul class="comments list-style-none">
                                        <li class="comment">
                                            <div class="comment-body">
                                                <figure class="comment-avatar">
                                                    <img src="{{asset('user_assets/images/agents/1-100x100.png')}}" alt="Commenter Avatar" width="90" height="90">
                                                </figure>
                                                <div class="comment-content">
                                                    <h4 class="comment-author">
                                                        <a href="#">John Doe</a>
                                                        <span class="comment-date">March 22, 2021 at 1:54
                                                            pm</span>
                                                    </h4>
                                                    <div class="ratings-container comment-rating">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <p>pellentesque habitant morbi tristique senectus et. In
                                                        dictum non consectetur a erat.
                                                        Nunc ultrices eros in cursus turpis massa tincidunt ante
                                                        in nibh mauris cursus mattis.
                                                        Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                        tristique.</p>
                                                    <div class="comment-action">
                                                        <a href="#" class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                        </a>
                                                        <a href="#" class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                        </a>
                                                        <div class="review-image">
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{asset('user_assets/images/products/default/review-img-1.jpg')}}" width="60" height="60" alt="Attachment image of John Doe's review on Electronics Black Wrist Watch" data-zoom-image="{{asset('user_assets/images/products/default/review-img-1.jpg')}}" />
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment">
                                            <div class="comment-body">
                                                <figure class="comment-avatar">
                                                    <img src="{{asset('user_assets/images/agents/2-100x100.png')}}" alt="Commenter Avatar" width="90" height="90">
                                                </figure>
                                                <div class="comment-content">
                                                    <h4 class="comment-author">
                                                        <a href="#">John Doe</a>
                                                        <span class="comment-date">March 22, 2021 at 1:52
                                                            pm</span>
                                                    </h4>
                                                    <div class="ratings-container comment-rating">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <p>Nullam a magna porttitor, dictum risus nec, faucibus
                                                        sapien.
                                                        Ultrices eros in cursus turpis massa tincidunt ante in
                                                        nibh mauris cursus mattis.
                                                        Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                        tristique.</p>
                                                    <div class="comment-action">
                                                        <a href="#" class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                        </a>
                                                        <a href="#" class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                        </a>
                                                        <div class="review-image">
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{asset('user_assets/images/products/default/review-img-2.jpg')}}" width="60" height="60" alt="Attachment image of John Doe's review on Electronics Black Wrist Watch" data-zoom-image="{{asset('user_assets/images/products/default/review-img-2-800x900.jpg')}}" />
                                                                </figure>
                                                            </a>
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{asset('user_assets/images/products/default/review-img-3.jpg')}}" width="60" height="60" alt="Attachment image of John Doe's review on Electronics Black Wrist Watch" data-zoom-image="{{asset('user_assets/images/products/default/review-img-3-800x900.jpg')}}" />
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="helpful-negative">
                                    <ul class="comments list-style-none">
                                        <li class="comment">
                                            <div class="comment-body">
                                                <figure class="comment-avatar">
                                                    <img src="{{asset('user_assets/images/agents/3-100x100.png')}}" alt="Commenter Avatar" width="90" height="90">
                                                </figure>
                                                <div class="comment-content">
                                                    <h4 class="comment-author">
                                                        <a href="#">John Doe</a>
                                                        <span class="comment-date">March 22, 2021 at 1:21
                                                            pm</span>
                                                    </h4>
                                                    <div class="ratings-container comment-rating">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <p>In fermentum et sollicitudin ac orci phasellus. A
                                                        condimentum vitae
                                                        sapien pellentesque habitant morbi tristique senectus
                                                        et. In dictum
                                                        non consectetur a erat. Nunc scelerisque viverra mauris
                                                        in aliquam sem fringilla.</p>
                                                    <div class="comment-action">
                                                        <a href="#" class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-up"></i>Helpful (0)
                                                        </a>
                                                        <a href="#" class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-down"></i>Unhelpful (1)
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="highest-rating">
                                    <ul class="comments list-style-none">
                                        <li class="comment">
                                            <div class="comment-body">
                                                <figure class="comment-avatar">
                                                    <img src="{{asset('user_assets/images/agents/2-100x100.png')}}" alt="Commenter Avatar" width="90" height="90">
                                                </figure>
                                                <div class="comment-content">
                                                    <h4 class="comment-author">
                                                        <a href="#">John Doe</a>
                                                        <span class="comment-date">March 22, 2021 at 1:52
                                                            pm</span>
                                                    </h4>
                                                    <div class="ratings-container comment-rating">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <p>Nullam a magna porttitor, dictum risus nec, faucibus
                                                        sapien.
                                                        Ultrices eros in cursus turpis massa tincidunt ante in
                                                        nibh mauris cursus mattis.
                                                        Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                        tristique.</p>
                                                    <div class="comment-action">
                                                        <a href="#" class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                        </a>
                                                        <a href="#" class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                        </a>
                                                        <div class="review-image">
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{asset('user_assets/images/products/default/review-img-2.jpg')}}" width="60" height="60" alt="Attachment image of John Doe's review on Electronics Black Wrist Watch" data-zoom-image="{{asset('user_assets/images/products/default/review-img-2-800x900.jpg')}}" />
                                                                </figure>
                                                            </a>
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{asset('user_assets/images/products/default/review-img-3.jpg')}}" width="60" height="60" alt="Attachment image of John Doe's review on Electronics Black Wrist Watch" data-zoom-image="{{asset('user_assets/images/products/default/review-img-3-800x900.jpg')}}" />
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="lowest-rating">
                                    <ul class="comments list-style-none">
                                        <li class="comment">
                                            <div class="comment-body">
                                                <figure class="comment-avatar">
                                                    <img src="{{asset('user_assets/images/agents/1-100x100.png')}}" alt="Commenter Avatar" width="90" height="90">
                                                </figure>
                                                <div class="comment-content">
                                                    <h4 class="comment-author">
                                                        <a href="#">John Doe</a>
                                                        <span class="comment-date">March 22, 2021 at 1:54
                                                            pm</span>
                                                    </h4>
                                                    <div class="ratings-container comment-rating">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <p>pellentesque habitant morbi tristique senectus et. In
                                                        dictum non consectetur a erat.
                                                        Nunc ultrices eros in cursus turpis massa tincidunt ante
                                                        in nibh mauris cursus mattis.
                                                        Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                        tristique.</p>
                                                    <div class="comment-action">
                                                        <a href="#" class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                        </a>
                                                        <a href="#" class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                            <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                        </a>
                                                        <div class="review-image">
                                                            <a href="#">
                                                                <figure>
                                                                    <img src="{{asset('user_assets/images/products/default/review-img-3.jpg')}}" width="60" height="60" alt="Attachment image of John Doe's review on Electronics Black Wrist Watch" data-zoom-image="{{asset('user_assets/images/products/default/review-img-3-800x900.jpg')}}" />
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Related Products -->
            <section class="vendor-product-section">
                <div class="title-link-wrapper mb-4">
                    <h4 class="title text-left">Related Products</h4>
                    <a href="{{ route('products') }}" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                        Products<i class="w-icon-long-arrow-right"></i></a>
                </div>
                <div class="swiper-container swiper-theme" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 4
                                },
                                '992': {
                                    'slidesPerView': 4
                                }
                            }
                        }">
                    <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                        @if ($related_products->count() > 0)
                        @foreach ($related_products as $item)
                        <div class="swiper-slide product">
                            <figure class="product-media">
                                <a href="{{ route('product_details',$item->slug) }}">
                                    <img src="{{asset($item->thumbnail)}}" alt="Product" width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Add to Compare"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat"><a href="javascript:void(0)">{{ $item->getCategory->name }}</a>
                                </div>
                                <h4 class="product-name"><a href="javascript:void(0)">{{ $item->title }}</a>
                                </h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">({{ $Product_review->count() }} reviews)</a>
                                </div>
                                <div class="product-pa-wrapper">
                                    @php
                                    $discount = $item->price - ($item->discount /100 * $item->price)
                                    @endphp
                                    <div class="product-price">${{ $discount }}</div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        @else
                        <div class="swiper-slide product">
                            <figure class="product-media">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('user_assets/images/products/default/1-1.jpg')}}" alt="Product" width="300" height="338" />
                                    <img src="{{asset('user_assets/images/products/default/1-2.jpg')}}" alt="Product" width="300" height="338" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Add to Compare"></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat"><a href="javascript:void(0)">Accessories</a>
                                </div>
                                <h4 class="product-name"><a href="javascript:void(0)">Sticky Pencil</a>
                                </h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                </div>
                                <div class="product-pa-wrapper">
                                    <div class="product-price">$20.00</div>
                                </div>
                            </div>
                        </div>

                        @endif

                    </div>
                </div>
            </section>
            <!-- End Related Products -->
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection
@section('custom-script')
    <script>
        $("#reviewForm").on('submit', function(e) {
            e.preventDefault();
            var form = $('#reviewForm')[0];
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: "{{route('add_Review')}}",
                dataType: 'json',
                data: formData,
                beforeSend: function() {
                    $("#submitForm").prop('disabled', true);
                    $("#submitForm").html('Processing');
                    $('.error-message').hide();
                },
                success: function(res) {
                    $("#submitForm").attr('class', 'btn btn-success');
                    $("#submitForm").html('Banner Added</>');
                    if (res.success === true) {
                        notyf.success({
                            message: res.message,
                            duration: 3000
                        });
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

                    if (e.responseJSON.errors['title']) {
                        $('.error-title').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['title'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['description']) {
                        $('.error-description').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['description'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['status'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['image']) {
                        $('.error-image').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['image'][0] + '</small>');
                    }

                }
            });
        });
    </script>
@endsection
