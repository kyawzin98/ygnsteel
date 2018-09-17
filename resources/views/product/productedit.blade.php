@extends('t1_layout')
@section('content')
    <div class="m-portlet__body">
        <form action="{{route('Product.update',$product->id)}}" method="POST">
            @csrf
            @method('PATCH')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" value="{{auth()->id()}}" name="user_by">
            <div class="form-group m-form__group">
                <label for="productname">Product Name</label>
                <input type="text" class="form-control m-input" value="{{$product->productname}}" required name="productname" id="productname"  placeholder="Enter product name">
            </div>
            <div class="form-group m-form__group">
                <label for="weight">Weight</label>
                <input type="text" class="form-control m-input" value="{{$product->weight}}" id="weight" name="weight" placeholder="Optional">
            </div>
            <div class="m-form__actions">
                <input type="submit" value="Edit" class="btn btn-primary">
                <a href="{{route('Product.index')}} " class="btn btn-secondary">Cancel</a>
            </div>
        </form>

    </div>
    @endsection