{{--<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
<script src="{{asset('user_assets/vendor/jquery/jquery.min.js')}}"></script>
@if(in_array('sticky',$useAssets))
<script src="{{asset('user_assets/vendor/sticky/sticky.js')}}"></script>
@endif
@if(in_array('plugin',$useAssets))
<script src="{{asset('user_assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
@endif
@if(in_array('imagesloaded',$useAssets))
<script src="{{asset('user_assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
@endif
@if(in_array('magnific',$useAssets))
<script src="{{asset('user_assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
@endif
@if(in_array('vendor_swiper',$useAssets))
<script src="{{asset('user_assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
@endif
@if(in_array('zoom',$useAssets))
<script src="{{asset('user_assets/vendor/zoom/jquery.zoom.js')}}"></script>
@endif
@if(in_array('photoswipe',$useAssets))
<script src="{{asset('user_assets/vendor/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('user_assets/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
@endif
@if(in_array('countdown',$useAssets))
<script src="{{asset('user_assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
@endif

@if(in_array('parallax',$useAssets))
<script src="{{asset('user_assets/vendor/floating-parallax/parallax.min.js')}}"></script>
@endif

@if(in_array('noUiSlider',$useAssets))
<script src="{{asset('user_assets/vendor/nouislider/nouislider.min.js')}}"></script>
@endif

@if(in_array('countdown',$useAssets))
<script src="{{asset('user_assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
@endif


<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
    var notyf = new Notyf({
        duration: 3000,
        position: {
            x: 'right',
            y: 'top',
        },
    });
</script>

<script src="{{asset('user_assets/js/main.min.js')}}"></script>
<script src="{{asset('user_assets/js/custom.js')}}"></script>

<!-- Main Js -->
<script>
    (function() {
        let js = "window['__CF$cv$params']={r:'7b0789ad8eaade47',m:'EaP4EAEixWx5UNKcmR0xfcJ6diyaDlXM9z0f4GJ0hRo-1680254651-0-AXQB7r01HyzrYKIKpOoR/rh4ZPMPA4gT4ukA0/DeYOycmvuLwoIqvBaU/LGZHbLn9Ua5tRSQDw5ZTBoyLhhfJdOxfJAOi6KVXFfO+esAU0VPU46rOjJuKxDFbL9eWk0lrE7q3aAo/uu+z7dk16zkSsk=',s:[0x41d70808ce,0xc48f6228d7],u:'/cdn-cgi/challenge-platform/h/b'};let now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/b/scripts/alpha/invisible5615.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";
        let _0xh = document.createElement('iframe');
        _0xh.height = 1;
        _0xh.width = 1;
        _0xh.style.position = 'absolute';
        _0xh.style.top = 0;
        _0xh.style.left = 0;
        _0xh.style.border = 'none';
        _0xh.style.visibility = 'hidden';
        document.body.appendChild(_0xh);

        function handler() {
            let _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
            if (_0xi) {
                let _0xj = _0xi.createElement('script');
                _0xj.nonce = '';
                _0xj.innerHTML = js;
                _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
            }
        }
        if (document.readyState !== 'loading') {
            handler();
        } else if (window.addEventListener) {
            document.addEventListener('DOMContentLoaded', handler);
        } else {
            let prev = document.onreadystatechange || function() {};
            document.onreadystatechange = function(e) {
                prev(e);
                if (document.readyState !== 'loading') {
                    document.onreadystatechange = prev;
                    handler();
                }
            };
        }
    })();
</script>