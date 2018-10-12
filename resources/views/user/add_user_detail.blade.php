@extends('t1_layout')
@section('content')
    <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
                        <h3 class="m-portlet__head-text">
                            Add User Detail
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right">
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group">
                                <label for="address1">Address 1</label>
                                <input class="form-control m-input m-input--solid" id="address1" placeholder="Enter Address 1" type="text">
                                <span class="m-form__help">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="address2">Address 2</label>
                                <input class="form-control m-input m-input--solid" id="address2" placeholder="Enter Address 2" type="text">
                                <span class="m-form__help">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="township">Township</label>
                                <input class="form-control m-input m-input--solid" id="township" placeholder="Enter Township" type="text">
                                <span class="m-form__help">We'll never share your email with anyone else.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group">
                                <label for="address1">Address 1</label>
                                <input class="form-control m-input m-input--solid" id="address1" placeholder="Enter Address 1" type="text">
                                <span class="m-form__help">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="address2">Address 2</label>
                                <input class="form-control m-input m-input--solid" id="address2" placeholder="Enter Address 2" type="text">
                                <span class="m-form__help">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="township">Township</label>
                                <input class="form-control m-input m-input--solid" id="township" placeholder="Enter Township" type="text">
                                <span class="m-form__help">We'll never share your email with anyone else.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="reset" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
@endsection