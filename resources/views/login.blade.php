@include('theme_1.head')
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-1" id="m_login"
         style="background-image: url('{{asset('t1/assets/app/media/img//bg/bg-7.jpg')}}');">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="{{asset('t1/assets/demo/demo8/media/img/logo/logo.png')}}" class="img-fluid" style="width: 150px;">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h2 class="j-text-1 text-center">
                            Yangon Steel Family
                        </h2>
                        <h3 class="j-text-1 text-center mt-3">
                            Please Sign in
                        </h3>
                    </div>
                    <form class="m-login__form m-form"  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group m-form__group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <input class="form-control m-input" value="{{ old('email') }}"  type="text" placeholder="Email" name="email" autocomplete="off">
                            @if ($errors->has('email'))
                                <div class="form-control-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-form__group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <input class="form-control m-input m-login__form-input--last" value="{{ old('email') }}" type="password" placeholder="Password" name="password">
                            @if ($errors->has('password'))
                                <div class="form-control-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--light">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember me
                                    <span></span>
                                </label>
                            </div>
                            <div class="col m--align-right m-login__form-right">
                                <a href="{{ route('password.request') }}" id="m_login_forget_password" class="m-link">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" class="btn m-btn--pill m-btn--air btn-outline-info btn-lg m-login__btn">
                                Sign In
                            </button>
                        </div>

                        <hr style="border-top: 1px solid gray;">
                        <div class="m-login__form-action">
                            <a href="#" class="btn btn-primary btn-lg m-btn  m-btn m-btn--icon d-block mb-4">
                                <span class="d-flex justify-content-center">
                                    <i class="fa socicon-facebook"></i>
                                    <span>Facebook</span>
                                </span>
                            </a>
                            <a href="#" class="btn btn-primary btn-lg m-btn  m-btn m-btn--icon d-block mb-4" style="background-color: rgb(29,160,240)">
                                <span class="d-flex justify-content-center">
                                    <i class="fa socicon-twitter text-light"></i>
                                    <span class="text-light">Twitter</span>
                                </span>
                            </a>
                            <a href="#" class="btn btn-lg m-btn  m-btn m-btn--icon d-block mb-4" style="background-color: rgb(215,70,59)">
                                <span class="d-flex justify-content-center">
                                    <i class="fa socicon-googleplus text-light"></i>
                                    <span class="text-light">Google Plus</span>
                                </span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--begin::Base Scripts -->
<script src="{{asset('t1/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('t1/assets/demo/demo8/base/scripts.bundle.js')}}" type="text/javascript"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('script')
<!--end::Base Scripts -->
<!--begin::Page Snippets -->

<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
