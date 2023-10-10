@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="modal-login row align-items-center">
            <div class="wrap-login100 align-items-center">
                <div class="pb-5" data-tilt>
                    <img src="images/img-02.png" alt="IMG" style="height: 316px;">
                </div>
    
                <form class="login100-form validate-form"  action="{{ route('login') }}">
                    <span class="login100-form-title">
                        Register Account
                    </span>
    
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username" placeholder="{{ __('Username') }}"
                         required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="{{ __('Email') }}"
                            value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
    
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="{{ __('Password') }}"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="confirmPass" placeholder="{{ __('Confirm Password') }}"  class="form-control" name="confirmPassword" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            REGISTER
                        </button>
                    </div>
    
                    <div class="text-center p-t-50">
                        <a class="txt2" href="{{ route('login') }}">
                            Back to Login <-
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection