<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!--Swiper slider css-->
@if(in_array('swiper',$useAssets))
    <link href="{{asset('admin_assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css"/>
@endif
@if(in_array('sweetAlert',$useAssets))
    <link href="{{asset('admin_assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
@endif

@if(in_array('layoutJS',$useAssets))
    <script src="{{asset('admin_assets/js/layout.js')}}"></script>
@endif

@if(in_array('datatable',$useAssets))
    <script src="{{asset('admin_assets/css/datatables.min.css')}}"></script>
@endif

@if(in_array('jsvectormap',$useAssets))
    <!-- jsvectormap css -->
    <link href="{{asset('admin_assets/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css"/>
@endif
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<!-- Bootstrap Css -->
<link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- Icons Css -->
<link href="{{asset('admin_assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- App Css-->
<link href="{{asset('admin_assets/css/app.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- custom Css-->
<link href="{{asset('admin_assets/css/custom.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('admin_assets/css/styles.css')}}" rel="stylesheet" type="text/css"/>
<!-- Plugins css -->

