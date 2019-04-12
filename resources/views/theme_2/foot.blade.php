<script src="{{asset('t1/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('t1/assets/demo/demo12/assets/demo/demo12/base/scripts.bundle.js')}}" type="text/javascript"></script>
<script>
    $(window).on('load', function() {
        $('body').removeClass('m-page--loading');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var success_song = new Audio(j_base_url+'/sounds/sound1.ogg');
    var error_song = new Audio(j_base_url+'/sounds/sound5.ogg');
</script>
<script src="{{asset('js/custom_plugin.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jfunc.js')}}" type="text/javascript"></script>
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
<!--end::Base Scripts -->