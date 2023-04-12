@extends('layout.page-app')
@section('content')

<div class="h-100">
    <div class="h-100 no-gutters row">
        <div class="d-none d-lg-block h-100 col-lg-5 col-xl-4">
            <div class="left-caption">
                <img src="assets/imgs/login.jpg" class="bg-img" />
                <div class="caption">
                    <div>
                        <!-- <h3>Login</h3> -->
                        <!-- logo -->
                        <a href="#">
                            <img src="assets/imgs/logo-white.png" alt="" class="img-fluid" />
                        </a>
                        <p class="text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto quaerat fuga optio voluptatibus ullam
                            aliquam consectetur, quam, veritatis facilis dolor id perspiciatis distinctio ratione! Reprehenderit
                            rerum
                            provident vero praesentium molestiae?
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-100 d-flex login-bg justify-content-center align-items-lg-center col-md-12 col-lg-7 col-xl-8">
            <div class="mx-auto app-login-box col-sm-12 col-md-10 col-xl-8">
                <div class="py-5 p-3">

                    <!-- logo -->
                    <div class="app-logo mb-4">
                        <a href="#" class="mb-4 d-block d-lg-none">
                            <img src="assets/imgs/logo.png" alt="" class="img-fluid" />
                        </a>
                        <h3 class="primary-color mb-0 font-weight-bold">Login</h3>
                    </div>
                    <!-- end logo -->

                    <h4 class="mb-0 font-weight-bold">
                        <span class="d-block mb-2">Welcome back,</span>
                        <span>Please sign in to your account.</span>
                    </h4>
                    <!-- <h6 class="mt-3 border-bottom pb-3">No account? <a href="javascript:void(0);" class="text-primary">Sign up
                        now</a></h6>
                    <div> -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-row mt-4">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Email</label>
                                    <input name="email" id="email" placeholder="Email here..." type="email" class="form-control @error('email') is-invalid @enderror" value="admin@admin.com" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="examplePassword" class="">Password</label>
                                    <input name="password" id="password" placeholder="Password here..." type="password" class="form-control @error('password') is-invalid @enderror" value="admin" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customControlAutosizing">Keep me logged in</label>
                        </div>

                        <div class="form-row mt-4">
                            <div class="col-sm-6 text-center text-sm-left">
                                <button class="btn btn-default my-3 mw-120" type="submit">Login</button>
                            </div>
                            <!--                            <div class="col-sm-6 d-flex align-items-center justify-content-center justify-content-sm-end">
                                                            <a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                                                        </div>-->
                        </div>

                        <!--                        <div class="row mb-0">
                                                    <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Login') }}
                                                        </button>
                        
                                                        @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection