@extends('t2_layout')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
                            <h3 class="m-portlet__head-text">
                                Edit Permission Data
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right" action="{{route('Permission.update',$permission->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="permission_name">Permission Name</label>
                            <input class="form-control m-input m-input--solid {{$errors->any() ? ' border-danger':''}}" value="{{$permission->name}}"
                                   id="permission_name" name="name" placeholder="Enter Permission" type="text">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="form-control-feedback text-danger mt-2">{{$error}}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{route('Permission.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>

        </div>
    </div>
@endsection