@extends('user.layout.layout',['useAssets'=>['vendor_swiper','magnific','styles']])
@section('title','User Profile')
@section('custom-class','my-account')
@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        <li class="nav-item">
                            <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-orders" class="nav-link">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-downloads" class="nav-link">Security</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-addresses" class="nav-link">Addresses</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-details" class="nav-link">Account details</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('wishlist')}}">Wishlist</a>
                        </li>
                        <li class="link-item">
                            <a href="{{ route('user_logout') }}">Logout</a>
                        </li>
                    </ul>

                    <div class="tab-content mb-6">
                        <div class="tab-pane active in" id="account-dashboard">
                            <p class="greeting">
                                Hello
                                <span class="text-dark font-weight-bold">{{ auth()->user()->name}}</span>
                                (not
                                <span class="text-dark font-weight-bold">{{ auth()->user()->name}}</span>?
                                <a href="#" class="text-primary">Log out</a>)
                            </p>

                            <p class="mb-4">
                                From your account dashboard you can view your <a href="#account-orders"
                                                                                 class="text-primary link-to-tab">recent orders</a>,
                                manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                    and billing
                                    addresses</a>, and
                                <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                    account details.</a>
                            </p>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-orders" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Orders</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-downloads" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-download">
                                                    <i class="w-icon-download"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Security</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-addresses" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-address">
                                                    <i class="w-icon-map-marker"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Addresses</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-details" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Account Details</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="wishlist.html" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Wishlist</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{ route('user_logout') }}">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i class="w-icon-logout"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Logout</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane mb-4" id="account-orders">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                </div>
                            </div>

                            <table class="shop-table account-orders-table mb-6">
                                <thead>
                                <tr>
                                    <th class="order-id">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="order-status">Status</th>
                                    <th class="order-total">Total</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($order->count()>0)
                                    @foreach($order as $item)
                                <tr>
                                    <td class="order-id">{{$item->order_id}}</td>
                                    <td class="order-date">{{\Carbon\Carbon::parse($item->created_at)->format('M d,Y')}}</td>
                                    @if ($item->status == 0)

                                        <td class="order-status">Processing</td>
                                    @else

                                        <td class="order-status">Complete</td>
                                    @endif
                                    <td class="order-total">
                                        <span class="order-price">Rs. {{$item->total}}</span>
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" align="center"><h4>No Record Found..</h4></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                Shop<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="tab-pane" id="account-downloads">
                            <div class="row">
                                <div class="icon-box-content">
                                    <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="cur-password">Current Password leave blank to leave unchanged</label>
                                    <input type="password" class="form-control form-control-md" id="cur-password" name="cur_password">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                                    <input type="password" class="form-control form-control-md" id="new-password" name="new_password">
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark" for="conf-password">Confirm Password</label>
                                    <input type="password" class="form-control form-control-md" id="conf-password" name="conf_password">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" id="submitBtn" class="btn btn-dark btn-rounded btn-sm mb-4 w-25">Save Changes</button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="account-addresses">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                                </div>
                            </div>
                            <p>The following addresses will be used on the checkout page
                                by default.</p>
                            <div class="row">
                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address billing-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>John Doe</td>
                                                </tr>
                                                <tr>
                                                    <th>Company:</th>
                                                    <td>Conia</td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td>Wall Street</td>
                                                </tr>
                                                <tr>
                                                    <th>City:</th>
                                                    <td>California</td>
                                                </tr>
                                                <tr>
                                                    <th>Country:</th>
                                                    <td>United States (US)</td>
                                                </tr>
                                                <tr>
                                                    <th>Postcode:</th>
                                                    <td>92020</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone:</th>
                                                    <td>1112223334</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                        <a href="#"
                                           class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                            your billing address<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address shipping-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>John Doe</td>
                                                </tr>
                                                <tr>
                                                    <th>Company:</th>
                                                    <td>Conia</td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td>Wall Street</td>
                                                </tr>
                                                <tr>
                                                    <th>City:</th>
                                                    <td>California</td>
                                                </tr>
                                                <tr>
                                                    <th>Country:</th>
                                                    <td>United States (US)</td>
                                                </tr>
                                                <tr>
                                                    <th>Postcode:</th>
                                                    <td>92020</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                        <a href="#"
                                           class="btn btn-link btn-underline btn-icon-right text-primary">Edit your
                                            shipping address<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="account-details">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" id="updateProfile">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First name *</label>
                                            <input type="text" id="firstname" name="name" placeholder="First Name" value="{{ auth()->user()->name }}"
                                                   class="form-control form-control-md">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Last name *</label>
                                            <input type="text" id="lastname" name="last_name" placeholder="Last name" value="{{ auth()->user()->last_name }}"                                                   class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="display-name">Display name *</label>
                                    <input type="text" id="display-name" name="display_name" placeholder="Name" value="{{ auth()->user()->name}}"
                                           class="form-control form-control-md mb-0">
                                    <p>This will be how your name will be displayed in the account section and in reviews</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Country</label>
                                            <select name="country_id" class="form-control form-control-sm" onchange="CheckCountry($(this))">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $key => $value)
                                                    <option value="{{ $value->id }}" data-code="{{ $value->phonecode }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">State</label>
                                            <select class="form-control form-control-sm" name="state_id" id="stateDropdown">
                                                <option value="default" selected="selected">Default</option>
                                                <option value="recent">Most Recent</option>
                                                <option value="popular">Most Popular</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">City</label>
                                            <select id="cityDropdown" name="city_id" class="form-control form-control-sm">
                                                <option value="default" selected="selected">Default</option>
                                                <option value="recent">Most Recent</option>
                                                <option value="popular">Most Popular</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="firstname">Code</label>
                                                <input type="text" id="phone_code" readonly name="number" placeholder=""
                                                       class="form-control form-control-md mb-0">
                                            </div>
                                            <div class="col-9">
                                                <label for="firstname">Number</label>
                                                <input type="number" id="number" name="phone" placeholder="Enter Number"
                                                       class="form-control form-control-md mb-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-6">
                                    <label for="email_1">Email address *</label>
                                    <input type="email" id="email_1" name="email"
                                           class="form-control form-control-md" value="{{ auth()->user()->email}}">
                                </div>

                                <div class="form-group mb-10">
                                    <label class="text-dark" for="conf-password">Address</label>
                                    <textarea class="form-control form-control-md" name="address" rows="3"></textarea>
                                </div>
                                <button type="submit" id="submitBtn" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
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
        // COUNTRY
        function CheckCountry(Country) {
            var CountryID = Country.find(":selected").val();
            var CountryCode = Country.find(":selected").attr('data-code');

            if (!CountryCode) {
                $('#phone_code').val('');
            } else {
                $('#phone_code').val(`+` + CountryCode);
            }
            $.ajax({
                type: "POST",
                url: "{{  route('CheckCountry')  }}",
                dataType: 'json',
                data: {
                    Country_id: CountryID,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function() {},
                success: function(res) {
                    var states = res.States;
                    if (states.length > 0) {
                        $('#stateDropdown').html('');
                        $('#stateDropdown').append(`<option value="">Select State</option>`)
                        for (var i = 0; i < states.length; i++) {
                            $('#stateDropdown').append(`<option value="` + states[i]['id'] + `">` + states[i]['name'] + `</option>`)
                        }
                    } else {
                        $('#stateDropdown').html('');
                        $('#stateDropdown').append(`<option value="">Select State</option>`)
                    }
                },
                error: function(e) {}
            });
        };
        // END COUNTRY

        // States
        $("#stateDropdown").on('change', function() {
            let state = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{  route('CheckState')  }}",
                dataType: 'json',
                data: {
                    State_id: state,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function() {},
                success: function(res) {
                    var City = res.City;
                    if (City.length > 0) {
                        $('#cityDropdown').html('');
                        $('#cityDropdown').append(`<option value="">Select City</option>`)
                        for (var i = 0; i < City.length; i++) {
                            $('#cityDropdown').append(`<option value="` + City[i]['id'] + `">` + City[i]['name'] + `</option>`)
                        }
                    } else {
                        $('#cityDropdown').html('');
                        $('#cityDropdown').append(`<option value="">Select City</option>`)
                    }
                },
                error: function(e) {}
            });
        });
        // END STATE
        //User Sign Up
        $("#updateProfile").on('submit', function(e) {
            e.preventDefault();
            var form = $('#updateProfile')[0];
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: "{{ route('updateUserProfile') }}",
                dataType: 'json',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                mimeType: "multipart/form-data",
                beforeSend: function() {
                    $("#submitBtn").prop('disabled', true);
                    $("#submitBtn").html('Processing');
                    $('.error-message').hide();
                },
                success: function(res) {
                    $("#submitBtn").prop('disabled', false);
                    $("#submitBtn").attr('class', 'btn btn-success');
                    $("#submitBtn").html('Registered');
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

                    if (e.responseJSON.errors['name']) {
                        $('.error-name').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['name'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['last_name']) {
                        $('.error-last-name').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['last_name'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['email']) {
                        $('.error-email').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['email'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['gender']) {
                        $('.error-gender').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['gender'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['password']) {
                        $('.error-password').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['password'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['country_id']) {
                        $('.error-country').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['country_id'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['state_id']) {
                        $('.error-state').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['state_id'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['city_id']) {
                        $('.error-city').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['city_id'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['phonenumber']) {
                        $('.error-number').html('<small class=" error-message text-danger">' + e
                            .responseJSON.errors['phonenumber'][0] + '</small>');
                    }

                }
            });
        });
    </script>
@endsection
