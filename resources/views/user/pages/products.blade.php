@extends('user.layout.layout',['useAssets'=>['noUiSlider','home_plugin','styles','vendor_swiper','sticky','imagesloaded','countdown','zoom','magnific','plugin']])
@section('title','Products')
@section('custom-class','')
@section('content')
    <main class="main">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('products')}}">Shop</a></li>
                    <li>Boxed</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb-nav -->

        <div class="page-content mb-10">
            <div class="container">
                <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <!-- Start of Sticky Sidebar -->
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label>Filter :</label>
                                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                                </div>
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Category</span></h3>
                                    <ul class="cate_filter widget-body filter-items item-check mt-1">
                                        @foreach(getCategories() as $cate)
                                        <li data-category="{{ $cate->name }}" onclick="setVariant({{ $cate->id }})"><a href="#">{{ $cate->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Start of Collapsible Widget -->
                                <div class="price_filter widget widget-collapsible">
                                    <h3 class="widget-title"><span>Price</span></h3>
                                    <div class="widget-body">
                                        <form class="price-range">
                                            <input type="number" name="min_price" class="min_price text-center"
                                                   placeholder="Rs.min"><span class="delimiter">-</span><input
                                                type="number" name="max_price" class="max_price text-center"
                                                placeholder="Rs.max">
                                        </form>
                                    </div>
                                </div>
                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->

                                <!-- End of Collapsible Widget -->

                                <!-- Start of Collapsible Widget -->

                                <a href="javascript:void(0)" onclick="applyFilter();" class="btn btn-primary btn-rounded">Apply Filter</a>
                                <!-- End of Collapsible Widget -->
                            </div>
                            <!-- End of Sidebar Content -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->

                    <!-- Start of Main Content -->
                    <div class="main-content">
                        <!-- Start of Shop Banner -->
                        <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 br-xs"
                             style="background-image: url({{asset('user_assets/images/shop/banner1.jpg')}}); background-color: #FFC74E;">
                            <div class="banner-content">
                                <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                                <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">Smart
                                    Watches</h3>
                                {{--                                <a href="shop-banner-sidebar.html"--}}
                                {{--                                   class="btn btn-dark btn-rounded btn-icon-right">Discover Now<i--}}
                                {{--                                        class="w-icon-long-arrow-right"></i></a>--}}
                            </div>
                        </div>
                        <!-- End of Shop Banner -->

                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i
                                        class="w-icon-category"></i><span>Filters</span></a>
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>Sort By :</label>
                                    <select name="orderby" class="form-control">
                                        <option value="default" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by latest</option>
                                        <option value="price-low">Sort by pric: low to high</option>
                                        <option value="price-high">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show select-box">
                                    <select name="count" class="form-control">
                                        <option value="9">Show 9</option>
                                        <option value="12" selected="selected">Show 12</option>
                                        <option value="24">Show 24</option>
                                        <option value="36">Show 36</option>
                                    </select>
                                </div>
                                <div class="toolbox-item toolbox-layout">
                                    <a href="shop-boxed-banner.html" class="icon-mode-grid btn-layout active">
                                        <i class="w-icon-grid"></i>
                                    </a>
                                    <a href="shop-list.html" class="icon-mode-list btn-layout">
                                        <i class="w-icon-list"></i>
                                    </a>
                                </div>
                            </div>
                        </nav>
                        <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                            @if($products->count()>0)
                                @foreach($products as $item)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{asset($item->thumbnail)}}" alt="Product"
                                                         width="300"
                                                         height="338"/>
                                                </a>
                                                <div class="product-action-horizontal">
                                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" data-id="{{ $item->id }}" title="Add to cart"></a>
                                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quickview"></a>
                                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Add to Compare"></a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a href="#">{{ $item->getCategory->name }}</a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="#">{{$item->title}}</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="https://www.portotheme.com/html/wolmart/product.html"
                                                       class="rating-reviews">(3 reviews)</a>
                                                </div>
                                                <div class="product-pa-wrapper">
                                                    @php
                                                    if(!empty($item->discount))
                                                        {
                                                         $discount = $item->price - ($item->discount /100 * $item->price);
                                                        }
                                                    else
                                                        {
                                                            $discount = $item->price;
                                                        }
                                                    @endphp
                                                    <div class="product-price">
                                                        Rs. {{$discount}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @else
                                <div>No Record found..</div>
                            @endif


                        </div>

                        <div class="toolbox toolbox-pagination justify-content-between">
                            <p class="showing-info mb-2 mb-sm-0">
                                Showing<span>1-12 of 60</span>Products
                            </p>
                            <ul class="pagination">
                                <li class="prev disabled">
                                    <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <i class="w-icon-long-arrow-left"></i>Prev
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="next">
                                    <a href="#" aria-label="Next">
                                        Next<i class="w-icon-long-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End of Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
    </main>
@endsection

@section('script')
<script>
    let variants = @json(getVariants());
    $(".cate_filter li").click(function(){
        $(".cate_filter li").removeClass("active");
    });

    @if(request('category'))
    $("li[data-category={{ request('category') }}]").click();
    $("li[data-category={{ request('category') }}]").addClass("active");
        @if(request('variant'))
            @foreach(request('variant') as $key => $value)
                @foreach ($value as $val)
                $("li[data-value={{ $val }}]").addClass("active");
                @endforeach
            @endforeach
        @endif
    @endif
    function setVariant(id)
    {
        $(".other_filter").remove();
        $.each(variants,function(index,item){
            if(item.category_id == id)
            {
                let child = ``;
                $.each(item.values,function(ind,val){
                    child += `<li data-value="${val.value}"><a href="#">${val.value}</a></li>`
                });
                if(child !== "")
                {
                    $(".price_filter").after(`<div class="other_filter widget widget-collapsible">
                                    <h3 data-variant="${item.name}" class="widget-title"><span>${item.name}</span></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        ${child}
                                    </ul>
                                </div>`);
                }
            }
        });
    }
    function applyFilter()
    {
        let form = `<form class="filter_form">`;
        form += `<input type="hidden" name="category" value="${$("li[data-category].active").attr("data-category")}">`;
        $("h3[data-variant]").each(function(){
            let v = $(this).attr("data-variant");
            $(this).siblings("ul").children("li").each(function(){
                if($(this).hasClass("active"))
                {
                    form += `<input type="hidden" name="variant[${v}][]" value="${$(this).attr("data-value")}">`;
                }
            });
        });
        form += `</form>`;
        $("body").append(form);
        $(document).find(".filter_form").submit();
    }
</script>
@endsection
