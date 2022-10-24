@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
</head>
<body>
<!-- <form method="POST" action="{{ route('login') }}"> -->
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/Register.png" alt="IMG" >
				</div>

				<form class="login100-form validate-form" form method="POST" action="{{ route('register') }} ">
                    @csrf
					<span class="login100-form-title">
                        <strong> Register Account </strong>
					</span>

                    <div class="wrap-input100 validate-input" data-validate = 
                                        "User name is required: ex@abc.xyz">
						<input class="input100 @error('email') is-invalid @enderror"  type="User name" name="User name" 
                                        placeholder="User name" value="{{ old('User name') }}"  required autocomplete="name" autofocus>
						<span class="focus-input100"></span>
						@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<!-- <input class="input100" type="email" name="email" 
                                        placeholder="Email" value="{{ old('email') }}"> -->
						<input class="input100 @error('email') is-invalid @enderror" id="email" type="email" 
								 name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
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
						<input class="input100" type="password" name="password" 
										placeholder="Password" value="{{ old('password') }}">
						@error('password')
                            <span class="invalid-feedback" role="alert">
                        	    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<!-- <span class="focus-input100"></span> -->
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Comfirm Password is required">
						<input class="input100" type="password" name="comfirm password" 
                                        placeholder="Comfirm Password" value="{{ old('comfirm password') }}" name="password_confirmation" required autocomplete="new-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-check" aria-hidden="true"></i>
						</span>
                    </div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
						{{ __('Register') }}
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

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- </form> -->
</body>
</html>
@endsection