<!--begin::Base Scripts -->
<script src="{{asset('t1/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('t1/assets/demo/demo8/base/scripts.bundle.js')}}" type="text/javascript"></script>


<!-- begin::Page Loader -->
<script>
    $(window).on('load', function() {
        $('body').removeClass('m-page--loading');
    });
</script>
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
@yield('script')
<!-- end::Page Loader -->