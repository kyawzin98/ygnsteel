@extends('t2_layout')
@section('style')
    <link href="{{asset('t1/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="m-portlet m--bg-dafault m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height " style="border-radius: 10px;">
                {{--<div class="m-portlet__head">--}}
                    {{--<div class="m-portlet__head-caption">--}}
                        {{--<div class="m-portlet__head-title">--}}
                            {{--<h3 class="m-portlet__head-text">--}}
                                {{--Announcements--}}
                            {{--</h3>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="m-portlet__head-tools">--}}
                        {{--<ul class="m-portlet__nav">--}}
                            {{--<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">--}}
                                {{--<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">--}}
                                    {{--<i class="la la-ellipsis-h m--font-light"></i>--}}
                                {{--</a>--}}
                                {{--<div class="m-dropdown__wrapper">--}}
                                    {{--<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>--}}
                                    {{--<div class="m-dropdown__inner">--}}
                                        {{--<div class="m-dropdown__body">--}}
                                            {{--<div class="m-dropdown__content">--}}
                                                {{--<ul class="m-nav">--}}
                                                    {{--<li class="m-nav__section m-nav__section--first">--}}
                                                        {{--<span class="m-nav__section-text">Quick Actions</span>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="m-nav__item">--}}
                                                        {{--<a href="" class="m-nav__link">--}}
                                                            {{--<i class="m-nav__link-icon flaticon-share"></i>--}}
                                                            {{--<span class="m-nav__link-text">Activity</span>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="m-nav__item">--}}
                                                        {{--<a href="" class="m-nav__link">--}}
                                                            {{--<i class="m-nav__link-icon flaticon-chat-1"></i>--}}
                                                            {{--<span class="m-nav__link-text">Messages</span>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="m-nav__item">--}}
                                                        {{--<a href="" class="m-nav__link">--}}
                                                            {{--<i class="m-nav__link-icon flaticon-info"></i>--}}
                                                            {{--<span class="m-nav__link-text">FAQ</span>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="m-nav__item">--}}
                                                        {{--<a href="" class="m-nav__link">--}}
                                                            {{--<i class="m-nav__link-icon flaticon-lifebuoy"></i>--}}
                                                            {{--<span class="m-nav__link-text">Support</span>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="m-nav__separator m-nav__separator--fit">--}}
                                                    {{--</li>--}}
                                                    {{--<li class="m-nav__item">--}}
                                                        {{--<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="m-portlet__body">
                    <!--begin::Widget 7-->
                    <div class="m-widget7 m-widget7--skin-dark">
                        <h5>10 Tips for Greater Ass. 10 Tips for Greater Ass.
                            10 Tips for Greater Ass.</h5>
                        <p>What does this design whole the terms.</p>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td scope="row"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       <div class="row justify-content-between">
                           <div class="d-flex">
                               <div class="m-widget7__user-img">
                                   <img class="m-widget7__img" src="{{asset('t1/assets/app/media/img//users/100_3.jpg')}}" alt="" style="width: 2.6rem;border-radius: 50%;">
                               </div>
                               <div class="m-widget7__info">
                             <span class="m-widget7__username" style="margin-top: .71rem;margin-left: .71rem;font-size: 1rem;font-weight: 500;">
                                Dan Bold
                            </span>
                                   <br>
                                   <span class="m-widget7__time" style="margin-left: .71rem;margin-top: .71rem;font-size: .85rem;">
                                3 days ago
                            </span>
                               </div>
                           </div>
                           <div class="d-flex" style="align-items: end;">
                               <span style="font-size: .85rem;"><i class="flaticon-visible m--font-light"></i> 121-views</span>
                               <span style="font-size: .85rem;padding-left: 5px;"><i class="la la-bullhorn m--font-light"></i> 121-responses</span>
                           </div>
                       </div>
                        

                    </div>
                    <!--end::Widget 7-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('t1/assets/app/js/dashboard.js')}}" type="text/javascript"></script>
    <script src="{{asset('t1/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
@endsection