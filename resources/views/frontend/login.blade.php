@extends('frontend.layout.app')

@section('main-content')
<div class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-8 offset-md-2"><br>
                
                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                       
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Login <span style="color:aqua;">One</span><span>-Health</span></h3>
                            </div>
                            @include('validate.validate')
                            
                            <form action="{{route('user.login')}}" method="POST">
                                @csrf
                                <div class="form-group form-focus">
                                    <label class="focus-label">Email</label>
                                    <input name="email" type="email" value="{{old('email')}}" class="form-control floating">
                                </div>
                                <div class="form-group form-focus">
                                    <label class="focus-label">Password</label>
                                    <input name="password" type="password" class="form-control floating">
                                </div>
                                <div class="text-right">
                                    <a class="forgot-link" href="">Forgot Password ?</a>
                                </div>
                                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>
                                <div class="row form-row social-login">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                                    </div>
                                </div>
                                <div class="text-center dont-have">Don’t have an account? <a href="{{route('patient.reg')}}">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Login Tab Content -->
                    
            </div>
        </div>

    </div>

</div>	
<br>
@endsection