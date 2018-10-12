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
                                <a href="{{route('User.create')}}">
                                    <button type="button"
                                            class="btn m-btn--pill btn-accent m-btn m-btn--custom m-btn--hover-brand">
                                        <i class="la la-plus"></i> Add New User
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
                                            User Name
                                        </th>
                                        <th class="m-widget11__sales">
                                            Email
                                        </th>

                                        <th class="m-widget11__sales">
                                            Detail
                                        </th>
                                        <th class="m-widget11__sales">
                                            Delete
                                        </th>
                                    </tr>
                                    </thead>
                                    <!--end::Thead-->
                                    <!--begin::Tbody-->
                                    <tbody>
                                    @foreach($users as $user)

                                        <tr>
                                            <td class="m--font-brand">
                                                {{$a++}}
                                            </td>
                                            <td>
                                                <span class="m-widget11__title">{{$user->name}}</span>
                                            </td>
                                            <td>

                                                    {{$user->email}}
                                            </td>
                                            <td>
                                                {{--<a href="{{route('User.edit',$user->id)}}">--}}
                                                    {{--<button class="btn btn-success"><i class="la la-pencil-square "></i> </button>--}}
                                                {{--</a>--}}
                                                <a href="{{route('UserDetail.show',$user->id)}}">
                                                    <button class="btn btn-info"><i class="la la-info-circle "></i> </button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:" class="btn btn-danger"
                                                   onclick="event.preventDefault();document.getElementById('delete_task_{{$user->id}}').submit();">
                                                    <i class="la la-close"></i>
                                                </a>
                                                <form id="delete_task_{{$user->id}}"
                                                      action="{{ route('User.destroy',$user->id) }}" method="POST"
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
