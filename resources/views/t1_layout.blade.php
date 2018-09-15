<!DOCTYPE html>
<html lang="en" >

<!-- begin::Head -->
@include('theme_1.head')
<!-- end::Head -->

<!-- start::Body -->
<body  style="background-image: url({{asset('t1/assets/app/media/img/bg/bg-7.jpg')}})"  class="m-page--fluid m-page--loading-enabled m-page--loading m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  >

<!-- begin::Page loader -->
@include('theme_1.loader')
<!-- end::Page Loader -->

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- begin::Header -->
@include('theme_1.header')
<!-- end::Header -->


    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
        @include('theme_1.subheader')
        <!-- END: Subheader -->
            <div class="m-content">
                @section('content')
                    @show
            </div>
        </div>
    </div>
    <!-- end::Body -->

    <!-- begin::Footer -->
@include('theme_1.footer')
<!-- end::Footer -->
</div>
<!-- end:: Page -->

<!-- begin::Quick Sidebar -->
@include('theme_1.quick_sidebar')
<!-- end::Quick Sidebar -->

<!-- start::Scroll up -->
@include('theme_1.scollup')
<!-- end::Scroll up -->

@include('theme_1.foot')
</body>
<!-- end::Body -->
</html>
