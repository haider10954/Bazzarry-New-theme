@extends('user.layout.layout',['useAssets'=>['vendor_swiper','magnific','styles']])
@section('title','About Us')
@section('custom-class','about-us')
@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">About Us</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-8">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <section class="introduce mb-10 pb-10">
                    <h2 class="title title-center">
                        We’re Devoted Marketing<br>Consultants Helping Your Business Grow
                    </h2>
                    <p class=" mx-auto text-center">Whether you're searching for the latest fashion trends, tech gadgets, home essentials, or unique gifts, we've got you covered.</p>
                    <figure class="br-lg">
                        <img src="{{asset('user_assets/images/pages/about_us/1.jpg')}}" alt="Banner"
                             width="1240" height="540" style="background-color: #D0C1AE;" />
                    </figure>
                </section>

                <section class="customer-service mb-7">
                    <div class="row align-items-center">
                        <div class="col-md-6 pr-lg-8 mb-8">
                            <h2 class="title text-left">We Provide Continuous &amp; Kind Service for Customers</h2>
                            <div class="accordion accordion-simple accordion-plus">
                                <div class="card border-no">
                                    <div class="card-header">
                                        <a href="#collapse3-1" class="collapse">Customer Service</a>
                                    </div>
                                    <div class="card-body expanded" id="collapse3-1">
                                        <p class="mb-0">
                                            At Bazaarry, we take pride in our exceptional customer service. Our dedicated and friendly customer support team is here to assist you every step of the way, ensuring that your shopping experience is smooth and satisfying.
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3-2" class="expand">Online Consultation</a>
                                    </div>
                                    <div class="card-body collapsed" id="collapse3-2">
                                        <p class="mb-0">
                                            Our online consultation platform allows you to connect with qualified experts through secure and confidential channels. You can schedule virtual appointments, have real-time video or audio consultations, or exchange messages with professionals in your desired field.
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3-3" class="expand">Sales Management</a>
                                    </div>
                                    <div class="card-body collapsed" id="collapse3-3">
                                        <p class="mb-0">
                                            At Bazaarry, we believe in continuous improvement and ongoing training for our sales team. Our sales managers provide coaching, mentorship, and support to enhance skills, boost motivation, and foster a high-performance sales culture.
                                            us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-8">
                            <figure class="br-lg">
                                <img src="{{asset('user_assets/images/pages/about_us/2.jpg')}}" alt="Banner"
                                     width="610" height="500" style="background-color: #CECECC;" />
                            </figure>
                        </div>
                    </div>
                </section>

                <section class="count-section mb-10 pb-5">
                    <div class="swiper-container swiper-theme" data-swiper-options="{
                            'slidesPerView': 1,
                            'breakpoints': {
                                '768': {
                                    'slidesPerView': 2
                                },
                                '992': {
                                    'slidesPerView': 3
                                }
                            }
                        }">
                        <div class="swiper-wrapper row cols-lg-3 cols-md-2 cols-1">
                            <div class="swiper-slide counter-wrap">
                                <div class="counter text-center">
                                    <span class="count-to" data-to="15">0</span>
                                    <span>M+</span>
                                    <h4 class="title title-center">Products For Sale</h4>
                                    <p>Find everything you need to create a cozy<br> and functional home.
                                        </p>
                                </div>
                            </div>
                            <div class="swiper-slide counter-wrap">
                                <div class="counter text-center">
                                    <span>$</span>
                                    <span class="count-to" data-to="25">0</span>
                                    <span>B+</span>
                                    <h4 class="title title-center">Community Earnings</h4>
                                    <p>Experience the power of effective<br> sales management with Bazaarry.
                                        </p>
                                </div>
                            </div>
                            <div class="swiper-slide counter-wrap">
                                <div class="counter text-center">
                                    <span class="count-to" data-to="100">0</span>
                                    <span>M+</span>
                                    <h4 class="title title-center">Growing Buyers</h4>
                                    <p>Customer satisfaction is at the core<br> of our sales management philosophy.
                                        </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </section>
            </div>

            <section class="member-section mt-10 pt-9 mb-10 pb-4">
                <div class="container">
                    <h4 class="title title-center mb-3">Meet Our Leaders</h4>
                    <p class="text-center mb-8">Our leaders are passionate, experienced professionals who bring a wealth<br> of expertise to their respective roles.
                        </p>
                    <div class="swiper-container swiper-theme" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 4
                                }
                            }
                        }">
                        <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-sm-2 cols-1">
                            <div class="swiper-slide member-wrap">
                                <figure class="br-lg">
                                    <img src="{{asset('user_assets/images/pages/about_us/4.jpg')}}" alt="Member" width="295" height="332" />
                                    <div class="overlay">
                                        <div class="social-icons">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                        </div>
                                    </div>
                                </figure>
                                <div class="member-info text-center">
                                    <h4 class="member-name">John Doe</h4>
                                    <p class="text-uppercase">Founder &amp; CEO</p>
                                </div>
                            </div>
                            <div class="swiper-slide member-wrap">
                                <figure class="br-lg">
                                    <img src="{{asset('user_assets/images/pages/about_us/5.jpg')}}" alt="Member" width="295" height="332" />
                                    <div class="overlay">
                                        <div class="social-icons">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                        </div>
                                    </div>
                                </figure>
                                <div class="member-info text-center">
                                    <h4 class="member-name">Jessica Doe</h4>
                                    <p class="text-uppercase">Marketing</p>
                                </div>
                            </div>
                            <div class="swiper-slide member-wrap">
                                <figure class="br-lg">
                                    <img src="{{asset('user_assets/images/pages/about_us/6.jpg')}}" alt="Member" width="295" height="332" />
                                    <div class="overlay">
                                        <div class="social-icons">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                        </div>
                                    </div>
                                </figure>
                                <div class="member-info text-center">
                                    <h4 class="member-name">Rick Edward Doe</h4>
                                    <p class="text-uppercase">Developer</p>
                                </div>
                            </div>
                            <div class="swiper-slide member-wrap">
                                <figure class="br-lg">
                                    <img src="{{asset('user_assets/images/pages/about_us/7.jpg')}}" alt="Member" width="295" height="332" />
                                    <div class="overlay">
                                        <div class="social-icons">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                        </div>
                                    </div>
                                </figure>
                                <div class="member-info text-center">
                                    <h4 class="member-name">Melinda Wolosky</h4>
                                    <p class="text-uppercase">Design</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
