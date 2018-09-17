@extends('t1_layout')
@section('content')
    <div class="col-xl-12 mx-auto" id="main_product">
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
                            <div class="m-widget11__action m--align-right">
                                <a href="{{route('Product.create')}}">
                                    <button type="button"
                                            class="btn m-btn--pill btn-accent m-btn m-btn--custom m-btn--hover-brand">
                                        <i class="la la-plus"></i> Add New Product
                                    </button>
                                </a>
                            </div>
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table">
                                    <!--begin::Thead-->
                                    <thead>
                                    <tr>
                                        <th class="m-widget11__label">
                                            #
                                        </th>
                                        <th class="m-widget11__app">
                                            Product Name
                                        </th>
                                        <th class="m-widget11__sales">
                                            Weight/Kg
                                        </th>

                                        <th class="m-widget11__sales">
                                            Edit
                                        </th>
                                        <th class="m-widget11__sales">
                                            Delete
                                        </th>
                                    </tr>
                                    </thead>
                                    <!--end::Thead-->
                                    <!--begin::Tbody-->
                                    <tbody>

                                    @foreach($products as $product)

                                        <tr>
                                            <td class="m--font-brand">
                                                {{$a++}}
                                            </td>
                                            <td>
                                                <span class="m-widget11__title">{{$product->productname}}</span>
                                            </td>
                                            <td>
                                                @if($product->weight == null)
                                                    <span class="btn btn-primary">-</span>
                                                    @else
                                                    {{$product->weight}}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('Product.edit',$product->id)}}">
                                                    <button class="btn btn-success"><i class="la la-pencil-square "></i> </button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:" class="btn btn-danger"
                                                   onclick="event.preventDefault();document.getElementById('delete_task_{{$product->id}}').submit();">
                                                    <i class="la la-close"></i>
                                                </a>
                                                <form id="delete_task_{{$product->id}}"
                                                      action="{{ route('Product.destroy',$product->id) }}" method="POST"
                                                      style="display: none;">
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

                        </div>
                        <!--end::Widget 11-->
                    </div>
                    <div class="tab-pane" id="m_widget11_tab2_content">
                        <!--begin::Widget 11-->
                        <div class="m-widget11">
                            <div class="m-widget11__action m--align-right">
                                <button type="button"
                                        class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">
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

@section('script')
    <script src="{{asset('js/app.js')}}" ?></script>
    <script>
        var app = new Vue({
            el: '#main_product',
            data: {
                message: 'Hello Vue!',
                jar: "Good"
            },
            methods: {
                jar: function () {
                    alert(9);
                }
            }
        })
    </script>
@endsection