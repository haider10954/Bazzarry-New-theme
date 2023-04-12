<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('admin-dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('admin_assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('admin_assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('admin-dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('admin_assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('admin_assets/images/logo-light.png')}}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a href="{{route('admin-dashboard')}}" class="nav-link" data-key="t-ecommerce">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sellers') }}" class="nav-link" data-key="t-ecommerce">
                        <i class="las la-user-check"></i> <span data-key="t-dashboards">Sellers</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-customers')}}" class="nav-link" data-key="t-ecommerce">
                        <i class="las la-user-friends"></i> <span data-key="t-dashboards">Customers</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-products')}}" class="nav-link" data-key="t-ecommerce">
                        <i class="las la-box"></i> <span data-key="t-dashboards">Products</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product-variants')}}" class="nav-link" data-key="t-ecommerce">
                        <i class="las la-box"></i> <span data-key="t-dashboards">Products Variants</span> </a>
                </li>
                <li>
                    <a href="{{route('product-category')}}" class="nav-link" data-key="t-ecommerce">
                        <i class="las la-box"></i> <span data-key="t-dashboards">Category</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user-orders')}}" class="nav-link" data-key="t-ecommerce">
                        <i class="las la-box"></i> <span data-key="t-apps">Orders</span> </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-key="t-ecommerce">
                        <i class="ri-file-list-2-line"></i> <span data-key="t-dashboards">Invoices</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-advertisement')}}" class="nav-link" data-key="t-ecommerce">
                        <i class="las la-box"></i> <span data-key="t-apps">Advertisement</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#product" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarApps">
                        <i class="bx bxs-shopping-bags"></i> <span data-key="t-apps">Customization</span>
                    </a>
                    <div class="collapse menu-dropdown" id="product">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin-banners')}}" class="nav-link" data-key="t-ecommerce">
                                    <span data-key="t-dashboards">Banners</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_offers') }}" class="nav-link" data-key="t-ecommerce">
                                    <span data-key="t-dashboards">Offers</span> </a>
                            </li>
                        </ul>
                    </div>

                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
