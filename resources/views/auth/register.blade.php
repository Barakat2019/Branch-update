<!doctype html>
<html lang="en">
  <head>
  	<title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

	</head>
	<body class="img js-fullheight" style="background-image:url({{ asset('assets/img/pexels-tom-fisk-3057960.jpg') }});">
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Register User</h2>
				</div>
			</div>
			<div class="row justify-content-center col-md-12">
				<div class="col-md-6 d-flex  justify-content-around">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form method="POST"  action="{{ route('register') }}" class="signin-form">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" :value="old('name')">
                              @error('name')
                                  <span  class="alert alert-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="email" placeholder="Enter Email" :value="old('email')">
                            @error('email')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Enter phone" :value="old('phone')">
                              @error('phone')
                                  <span class="alert alert-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="age" placeholder="Enter age" :value="old('age')">
                              @error('age')
                                  <span class="alert alert-danger">{{ $message }}</span>
                              @enderror
                            </div>
                        </div>

                    </div>

		      		
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Password_Confirmation">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                    </div>                    
                    
                    
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
                    </div>
                    <div class="form-group">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                            </label>
                        </div>
					
                               
	               </div>
	           </form>
              <div class="w-100 text-md-right forget">
                <a href="#" style="color: #fff;">Forgot Password</a><br>
                <a href="{{ route('login') }}" style="color: #fff">Already registered?</a>
                            
             </div>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                <div class="social d-flex text-center d-flex justify-content-start">
                    <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                    <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('assets/js/jquery.min.js')}}js/jquery.min.js"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
	</body>
</html>

