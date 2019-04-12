<meta charset="utf-8" />
<title>
    {{$title ?? "Yangon Steel Family"}}
</title>
<meta name="description" content="Latest updates and statistic charts">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
@if($token ?? true)
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endif
<!--begin::Web font -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>
<!--end::Web font -->
<!--begin::Base Styles -->
<!--begin::Page Vendors -->

<!--end::Page Vendors -->
<link href="{{asset('t1/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('t1/assets/demo/demo12/assets/demo/demo12/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
<!--end::Base Styles -->
<link rel="shortcut icon" href="{{asset('t1/assets/demo/demo12/assets/demo/demo12/media/img/logo/favicon.ico')}}" />