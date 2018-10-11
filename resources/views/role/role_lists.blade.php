@extends('t1_layout')
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="m-portlet">

                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                List of Roles
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-caption">
                        <a href="{{route('Role.create')}}" class="btn btn-primary">
                            <span class="fa fa-plus">&ensp;Add New Role</span>
                        </a>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="m-section__content">
                            <table class="table m-table m-table--head-separator-primary text-center">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Role Name</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <th>{{$role->id}}</th>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            <a href="{{route('Role.edit',$role->id)}}" class="btn btn-accent">
                                                <span class="la la-pencil-square"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:" class="btn btn-danger"
                                               onclick="return checkDelete();">
                                                <i class="la la-times"></i>
                                            </a>
                                            <script>
                                                function checkDelete() {
                                                    if (confirm('Sure want to delete this role!')) {
                                                        document.getElementById('delete_role_{{$role->id}}').submit();
                                                    } else {
                                                        event.preventDefault();
                                                    }
                                                }
                                            </script>
                                            <form id="delete_role_{{$role->id}}"
                                                  action="{{ route('Role.destroy',$role->id) }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Form-->
            </div>
        </div>
    </div>
@endsection