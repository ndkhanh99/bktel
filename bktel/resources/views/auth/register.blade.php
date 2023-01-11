@extends('layouts.app')

@section('content')

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img style="display:block;margin-top:86px;margin-bottom:16px;width:400px" src=".\images\aa.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form"  method="POST" action="{{ route('register') }}" >
                    @csrf
					<span class="login100-form-title">
						Register Account
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="name" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>

					</div>
					@error('name') 
                                    <span class="invalid-feedback" role="alert"> 
                                         <strong>{{ $message }}</strong> 
                                    </span> 
                     	@enderror
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: xyz@hcmut.edu.vn">
	                    <input class="input100" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Email">
	                    <span class="focus-input100"></span>
	                    <span class="symbol-input100">
		                    <i class="fa fa-envelope" aria-hidden="true"></i>

                    </div>
					</span>
						@error('email') 
                                    <span class="invalid-feedback" role="alert"> 
                                         <strong>{{ $message }}</strong> 
                                    </span> 
                     	@enderror
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

					</div>
					@error('password')
                                    <span class="invalid-feedback" role="alert"> 
                                         <strong>{{ $message }}</strong> 
                                  </span> 
                    	@enderror
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
	                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
	                    <span class="focus-input100"></span>
	                    <span class="symbol-input100">
		                    <i class="fa fa-lock" aria-hidden="true"></i>
	                    </span>

                    </div>



					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

				
				</form>
			</div>
		</div>
	</div>
@endsection