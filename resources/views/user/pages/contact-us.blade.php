@extends('user.layout.layout',['useAssets'=>['vendor_swiper','magnific','styles']])
@section('title','Contact Us')
@section('custom-class','')
@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Contact Us</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content contact-us">
            <div class="container">
                <section class="content-title-section mb-10">
                    <h3 class="title title-center mb-3">Contact
                        Information
                    </h3>
                    <p class="text-center">We understand the importance of staying connected with our valued customers.</p>
                </section>
                <!-- End of Contact Title Section -->

                <section class="contact-information-section mb-10">
                    <div class=" swiper-container swiper-theme " data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1,
                            'breakpoints': {
                                '480': {
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
                        <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-email">
                                        <i class="w-icon-envelop-closed"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">E-mail Address</h4>
                                    <p><a href="https://portotheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f598949c99b5908d9498859990db969a98">haseebraza293@gmail.com</a></p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-headphone">
                                        <i class="w-icon-headphone"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Phone Number</h4>
                                    <p>+92-303-7123272</p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Address</h4>
                                    <p>Faisalabad, 38000, Pakistan</p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                    <span class="icon-box-icon icon-fax">
                                        <i class="w-icon-fax"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Fax</h4>
                                    <p>1-800-570-7777</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Information section -->

                <hr class="divider mb-10 pb-1">

                <section class="contact-section">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">People usually ask these</h4>
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse1" class="collapse">How can I cancel my order?</a>
                                    </div>
                                    <div id="collapse1" class="card-body expanded">
                                        <p class="mb-0">
                                            To initiate the cancellation process, we recommend reaching out to our customer support team as soon as possible. You can call our dedicated helpline or send us an email with your order details and the reason for cancellation.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse2" class="expand">Why is my registration delayed?</a>
                                    </div>
                                    <div id="collapse2" class="card-body collapsed">
                                        <p class="mb-0">
                                            It is essential to provide accurate and complete information during the registration process. If there are any missing or incorrect details in your registration, it could result in a delay as we may need to reach out to you for clarification or additional information. Double-check the information you provided during registration to ensure its accuracy.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3" class="expand">What do I need to buy products?</a>
                                    </div>
                                    <div id="collapse3" class="card-body collapsed">
                                        <p class="mb-0">
                                            Browse through the available products on the website or use the search function to find specific items. You can explore different categories, apply filters, and read product descriptions, reviews, and specifications to make informed purchasing decisions.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse4" class="expand">How can I track an order?</a>
                                    </div>
                                    <div id="collapse4" class="card-body collapsed">
                                        <p class="mb-0">
                                            After placing your order, you should receive an order confirmation email or a confirmation page on the website. This confirmation typically includes an order number or reference code. Keep this information handy as you'll need it for tracking.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse5" class="expand">How can I get money back?</a>
                                    </div>
                                    <div id="collapse5" class="card-body collapsed">
                                        <p class="mb-0">
                                            Start by reviewing the refund policy of Bazaarry. This policy outlines the conditions and guidelines for requesting a refund, including eligible products, timeframes, and any specific requirements.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Send Us a Message</h4>
                            <form class="form contact-us-form" action="#" method="post">
                                <div class="form-group">
                                    <label for="username">Your Name</label>
                                    <input type="text" id="username" name="username"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email_1">Your Email</label>
                                    <input type="email" id="email_1" name="email_1"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea id="message" name="message" cols="30" rows="5"
                                              class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Section -->
            </div>

            <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
            <div class="google-map contact-google-map" id="googlemaps"></div>
            <!-- End Map Section -->
        </div>
        <!-- End of PageContent -->
    </main>
@endsection
