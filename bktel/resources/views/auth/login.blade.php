@extends('layouts.app')

@section('content')
<div class="limiter">
    


    <div class="container-login100">
        
			<div class="wrap-login100">
                
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
    
                <form class="login100-form validate-form" method="POST"   action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title">
                        Member Login
                    </span>
    
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
                        <input class="input100" type="password" name="password" placeholder="{{ __('Password') }}"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                        {{ __('Login') }}
                        </button>
                    </div>
    
                    <div class="text-center p-t-12">
    
                    <!-- Reset password page when confirm email, need a token that sent to email, example 123 -->
                        <!-- <a class="txt2"  href="{{ route('password.reset', 123) }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div> -->

                        <a class="txt2"  href="{{ route('password.request') }}">
                            {{ __('Forgot Username / Password?') }}
                        </a>
    
                    <div class="text-center p-t-50">
                        <a class="txt2" href="{{ route('register') }}">
                            Create your Account ->
                        </a>
                    </div>
                    @if ($errors->any())
<div class="alert alert-danger">
   <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif
                </form>
            </div>
        </div>
    </div>
</div>
<!--===============================================================================================-->	
<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/popper.js')}}"></script>
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
    <!--===============================================================================================-->

	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!--===============================================================================================-->
	<script src="{{ asset('js/main.js') }}"></script>

@endsection
