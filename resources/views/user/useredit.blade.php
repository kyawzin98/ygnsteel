@extends('t2_layout')
@section('content')
    <div class="row">
        <div class="col-12">
            @component('component.portlet.creative',['title'=>'User Edit'])
                <form action="{{route('User.update',$user->id)}}" method="POST">
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
                    <div class="form-group m-form__group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control m-input" required name="name" value="{{$user->name}}" id="name"  placeholder="Enter user name">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control m-input" name="email" value="{{$user->email}}" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <span class="m-form__help">We'll never share your email with anyone else.</span>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control m-input" name="password" id="Password" placeholder="Password">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="ConfirmPassword">Password</label>
                        <input type="password" class="form-control m-input" name="password_confirmation" id="Password" placeholder="Conform Password">
                    </div>
                    <div class="m-form__actions">
                        <input type="submit" value="Edit" class="btn btn-primary">
                        <a href="{{route('User.index')}} " class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            @endcomponent
        </div>
    </div>
@endsection