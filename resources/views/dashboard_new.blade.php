@extends('t2_layout')
@section('style')
    <link href="{{asset('t1/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        @foreach($sells as $sell)
            <div class="col-sm-6">
                <div class="m-portlet m--bg-dafault m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height " style="border-radius: 10px;">
                    <div class="m-portlet__body">
                        <!--begin::Widget 7-->
                        <div class="m-widget7 m-widget7--skin-dark">
                            <h5>{{$sell->title}}</h5>
                            <p>{{$sell->description}}</p>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Weight</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sell->detail as $detail)
                                            <tr>
                                                <td>{{$detail->product->productname}}</td>
                                                <td>{{$detail->product->weight}}</td>
                                                <td>{{$detail->price}}</td>
                                                <td>{{$detail->qty}}</td>
                                            </tr>

                                        @endforeach

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
                                {{$sells[0]->user->name}}
                            </span>
                                        <br>
                                        <span class="m-widget7__time" style="margin-left: .71rem;margin-top: .71rem;font-size: .85rem;">
                                {{$sells[0]->created_at->diffForHumans()}}
                            </span>
                                    </div>
                                </div>
                                <div class="d-flex" style="align-items: end;">
                                    <span style="font-size: .85rem;"><i class="flaticon-visible m--font-light"></i> 0-views</span>
                                    <span style="font-size: .85rem;padding-left: 5px;"><i class="la la-bullhorn m--font-light"></i> 0-responses</span>
                                </div>
                            </div>


                        </div>
                        <!--end::Widget 7-->
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection

@section('script')
    {{--<script src="{{asset('t1/assets/app/js/dashboard.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('t1/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>--}}
    <script>
        $('.table').DataTable({
            responsive:true,
            dom:"<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        });
    </script>
@endsection