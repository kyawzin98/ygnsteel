@extends('t1_layout')
@section('content')
    <div class="col-xl-8">
        <div class="m-portlet m-portlet--full-height  m-portlet--rounded">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Product Sales
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="m_widget11_tab1_content">
                        <!--begin::Widget 11-->
                        <div class="m-widget11">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table">
                                    <!--begin::Thead-->
                                    <thead>
                                    <tr>
                                        <td class="m-widget11__label">
                                            #
                                        </td>
                                        <td class="m-widget11__app">
                                            Product Name
                                        </td>
                                        <td class="m-widget11__sales">
                                            Weight/Kg
                                        </td>
                                        <td class="m-widget11__total">
                                            Price
                                        </td>
                                        <td class="m-widget11__sales">

                                        </td>
                                        <td class="m-widget11__sales">

                                        </td>
                                    </tr>
                                    </thead>
                                    <!--end::Thead-->
                                    <!--begin::Tbody-->
                                    <tbody>
                                    {{$a=1}}
                                    @foreach($products as $product)

                                    <tr>
                                        <td class="m--font-brand">
                                           {{$a++}}
                                        </td>
                                        <td>
                                            <span class="m-widget11__title">{{$product->productname}}</span>
                                        </td>
                                        <td>
                                            {{$product->weight}}
                                        </td>

                                        <td class="m--font-brand">
                                            $14,740
                                        </td>
                                        <td>
                                            <a href="{{route('Product.edit',$product->id)}}"><button class="btn btn-success">Edit</button></a>
                                        </td>
                                        <td>
                                            <a href="javascript:" class="btn btn-danger"
                                               onclick="event.preventDefault();document.getElementById('delete_task_{{$product->id}}').submit();">
                                                Delete
                                            </a>
                                            <form id="delete_task_{{$product->id}}" action="{{ route('Product.destroy',$product->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Tbody-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <div class="m-widget11__action m--align-right">
                                <a href="{{route('Product.create')}}">
                                    <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">
                                        Add New Product
                                    </button>
                                </a>
                            </div>
                        </div>
                        <!--end::Widget 11-->
                    </div>
                    <div class="tab-pane" id="m_widget11_tab2_content">
                        <!--begin::Widget 11-->
                        <div class="m-widget11">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table">
                                    <!--begin::Thead-->
                                    <thead>
                                    <tr>
                                        <td class="m-widget11__label">
                                            #
                                        </td>
                                        <td class="m-widget11__app">
                                            Application
                                        </td>
                                        <td class="m-widget11__sales">
                                            Sales
                                        </td>
                                        <td class="m-widget11__change">
                                            Change
                                        </td>
                                        <td class="m-widget11__price">
                                            Avg Price
                                        </td>
                                        <td class="m-widget11__total m--align-right">
                                            Total
                                        </td>
                                    </tr>
                                    </thead>
                                    <!--end::Thead-->
                                    <!--begin::Tbody-->
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
																		<span class="m-widget11__title">
																			Loop
																		</span>
                                            <span class="m-widget11__sub">
																			CRM System
																		</span>
                                        </td>
                                        <td>
                                            19,200
                                        </td>
                                        <td>
                                            <div class="m-widget11__chart" style="height:50px; width: 100px">
                                                <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" __idm_frm__="55"></iframe>
                                                <canvas id="m_chart_sales_by_apps_2_1" style="display: block; width: 0px; height: 0px;" height="0" width="0" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </td>
                                        <td>
                                            $63
                                        </td>
                                        <td class="m--align-right m--font-brand">
                                            $34,740
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
																		<span class="m-widget11__title">
																			Selto
																		</span>
                                            <span class="m-widget11__sub">
																			Powerful Website Builder
																		</span>
                                        </td>
                                        <td>
                                            24,310
                                        </td>
                                        <td>
                                            <div class="m-widget11__chart" style="height:50px; width: 100px">
                                                <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" __idm_frm__="56"></iframe>
                                                <canvas id="m_chart_sales_by_apps_2_2" style="display: block; width: 0px; height: 0px;" height="0" width="0" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </td>
                                        <td>
                                            $39
                                        </td>
                                        <td class="m--align-right m--font-brand">
                                            $46,010
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
																		<span class="m-widget11__title">
																			Jippo
																		</span>
                                            <span class="m-widget11__sub">
																			The Best Selling App
																		</span>
                                        </td>
                                        <td>
                                            9,076
                                        </td>
                                        <td>
                                            <div class="m-widget11__chart" style="height:50px; width: 100px">
                                                <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" __idm_frm__="57"></iframe>
                                                <canvas id="m_chart_sales_by_apps_2_3" style="display: block; width: 0px; height: 0px;" height="0" width="0" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </td>
                                        <td>
                                            $105
                                        </td>
                                        <td class="m--align-right m--font-brand">
                                            $67,800
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
																		<span class="m-widget11__title">
																			Verto
																		</span>
                                            <span class="m-widget11__sub">
																			Web Development Tool
																		</span>
                                        </td>
                                        <td>
                                            11,094
                                        </td>
                                        <td>
                                            <div class="m-widget11__chart" style="height:50px; width: 100px">
                                                <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" __idm_frm__="58"></iframe>
                                                <canvas id="m_chart_sales_by_apps_2_4" style="display: block; width: 0px; height: 0px;" height="0" width="0" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </td>
                                        <td>
                                            $16
                                        </td>
                                        <td class="m--align-right m--font-brand">
                                            $18,520
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--end::Tbody-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <div class="m-widget11__action m--align-right">
                                <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">
                                    <a href="">Add New Product</a>
                                </button>
                            </div>
                        </div>
                        <!--end::Widget 11-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection