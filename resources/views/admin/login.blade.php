@extends('admin.layout.app')
@section('main-content')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <a class="navbar-brand" href=""><span class="text-light">One</span>-Health</a>
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to admin dashboard</p>
                        @include('validate.validate')
                        
                        <!-- Form -->
                        <form action="{{route('admin.logedin')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="email" class="form-control" value="{{old('email')}}" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->
                        
                        <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                          
                        {{-- <!-- Social Login -->
                        <div class="social-login">
                            <span>Login with</span>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
                        </div>
                        <!-- /Social Login --> --}}
                        
                        <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection