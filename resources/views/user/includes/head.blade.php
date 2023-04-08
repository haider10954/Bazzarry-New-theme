<link rel="icon" type="image/png" href="{{asset('user_assets/images/icons/favicon.png')}}">

<!-- WebFont.js -->
<script>
    WebFontConfig = {
        google: { families: ['Poppins:400,500,600,700'] }
    };
    (function (d) {
        let wf = d.createElement('script'), s = d.scripts[0];
        wf.src = 'user_assets/js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>
<link rel="preload" href="{{asset('user_assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
      crossorigin="anonymous">
<link rel="preload" href="{{asset('user_assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
      crossorigin="anonymous">
<link rel="preload" href="{{asset('user_assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
      crossorigin="anonymous">
<link rel="preload" href="{{asset('user_assets/fonts/wolmart87d5.woff')}}?png09e" as="font" type="font/woff" crossorigin="anonymous">

<!-- Vendor CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('user_assets/vendor/fontawesome-free/css/all.min.css')}}">

@if(in_array('vendor_swiper',$useAssets))
    <link rel="stylesheet" href="{{asset('user_assets/vendor/swiper/swiper-bundle.min.css')}}">
@endif

<!-- Plugins CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('user_assets/vendor/magnific-popup/magnific-popup.min.css')}}">

@if(in_array('home_plugin',$useAssets))
    <link rel="stylesheet" type="text/css" href="{{asset('user_assets/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/vendor/swiper/swiper-bundle.min.css')}}">
@endif

@if(in_array('styles',$useAssets))
    <link rel="stylesheet" type="text/css" href="{{asset('user_assets/css/style.min.css')}}">
@endif

@if(in_array('noUiSlider',$useAssets))
    <link rel="stylesheet" type="text/css" href="{{asset('user_assets/vendor/nouislider/nouislider.min.css')}}">
@endif

@if(in_array('photoswipe',$useAssets))
    <link rel="stylesheet" type="text/css" href="{{asset('user_assets/vendor/photoswipe/photoswipe.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user_assets/vendor/photoswipe/default-skin/default-skin.min.css')}}">
@endif

<!-- Default CSS -->
@if(in_array('demo2',$useAssets))
    <link rel="stylesheet" type="text/css" href="{{asset('user_assets/css/demo2.min.css')}}">
@endif
<link rel="stylesheet" type="text/css" href="{{asset('user_assets/css/custom.css')}}">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">