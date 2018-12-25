<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    @include('theme_2.head')
    @yield('style')
    <script>
        var j_base_url="{!! URL::to('') !!}";
        var j_public_url="{!! public_path() !!}";
        var j_storage_url="{!! storage_path() !!}";
        var j_token="{{csrf_token()}}";

    </script>
</head>
<!-- end::Head -->
<!-- end::Body -->
<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- BEGIN: Header -->
@include('theme_2.header')
<!-- END: Header -->
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- BEGIN: Left Aside -->
    @include('theme_2.nav')
    <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
            @if($sub_head ?? true)
                <div class="m-subheader ">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="m-subheader__title ">
                                Dashboard
                            </h3>
                        </div>
                        <div>
                        <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                            <span class="m-subheader__daterange-label">
                                <span class="m-subheader__daterange-title"></span>
                                <span class="m-subheader__daterange-date m--font-brand"></span>
                            </span>
                            <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--square">
                                <i class="la la-angle-down"></i>
                            </a>
                        </span>
                        </div>
                    </div>
                </div>
        @endif

        <!-- END: Subheader -->
            <div class="m-content">
                @section('content')
                    @show
            </div>
        </div>
    </div>
    <!-- end:: Body -->
    <!-- begin::Footer -->
@include('theme_2.footer')
<!-- end::Footer -->
</div>
<!-- end:: Page -->
<!-- begin::Quick Sidebar -->
@include('theme_2.quick_sidebar')
<!-- end::Quick Sidebar -->
<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<!-- begin::Quick Nav -->
{{--<ul class="m-nav-sticky" style="margin-top: 30px;">--}}
{{--<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Showcase" data-placement="left">--}}
{{--<a href=""><i class="la la-eye"></i></a>--}}
{{--</li>--}}
{{--<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Pre-sale Chat" data-placement="left">--}}
{{--<a href="" ><i class="la la-comments-o"></i></a>--}}
{{--</li>--}}
{{----}}
{{--<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">--}}
{{--<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank">--}}
{{--<i class="la la-cart-arrow-down"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">--}}
{{--<a href="https://keenthemes.com/metronic/documentation.html" target="_blank">--}}
{{--<i class="la la-code-fork"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">--}}
{{--<a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank">--}}
{{--<i class="la la-life-ring"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
@include('theme_2.foot')
@yield('script')
</body>
<!-- end::Body -->
</html>
