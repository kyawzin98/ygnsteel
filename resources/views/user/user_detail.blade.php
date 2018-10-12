@extends('t1_layout')
@section('content')
    <div class="m-portlet__body">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="table-responsive">
                    <table class="table border">
                        <tr>
                            <th>User ID</th>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <th>User Name</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Address 1</th>
                            <td>sdfsd@gmail.com</td>
                        </tr>
                        <tr>
                            <th>Address 2</th>
                            <td>sdfsd@gmail.com</td>
                        </tr>
                        <tr>
                            <th>Township</th>
                            <td>sdfsd@gmail.com</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>234234243</td>
                        </tr>
                        <tr>
                            <th>NRC NO</th>
                            <td>234234243</td>
                        </tr>
                        <tr>
                            <th>Business Type</th>
                            <td>234234243</td>
                        </tr>
                        <tr>
                            <th>Working Bank</th>
                            <td>234234243</td>
                        </tr>
                        <tr>
                            <th>Bank Account No</th>
                            <td>234234243</td>
                        </tr>
                    </table>
                </div>

                <div class="row">
                    <div class="col">
                        <a href="" class="btn btn-primary">
                            <i class="la la-edit"></i>Edit User
                        </a>
                        <a href="{{route('UserDetail.create')}}" class="btn btn-success">
                            <i class="la la-plus"></i>Add User Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection