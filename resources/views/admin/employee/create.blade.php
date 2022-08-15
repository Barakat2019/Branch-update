<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap337.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/employee.css') }}" />



</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1> Added Employee</h1>
						</div>
						<form method="POST" action="{{ route('employee.store') }}">
							@csrf
							@if (get_languages()->count()>0)
								@foreach (get_languages() as $index=>$lang)
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<span class="form-label">Name-{{ $lang->abbr }}</span>
												<input class="form-control" type="text" name="employee[{{ $index }}][name]" placeholder="Enter your name">
											
											</div>
										</div>
										<div class="col-md-6 hidden">
											<label>اختصار اللغة-{{__('messages.'.$lang->abbr)}}</label>
											<input type="text" id="translation_lang"   name="employee[{{$index}}][translation_lang]" class="form-control" value="{{$lang->abbr}}">
			
										
										</div>
										
									</div>
								@endforeach
							@endif
							<div class="row">
								
							
							<div class="col-sm-6">
								<div class="form-group">
									<span class="form-label">Email</span>
									<input class="form-control" type="email" name="email" placeholder="Enter your email">
									@error('email')
										<span>{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<span class="form-label">Phone</span>
									<input class="form-control" type="tel" name="phone" placeholder="00962xxxxxxxxxx">
											@error('phone')
												<span>{{ $message }}</span>
											@enderror
								</div>
							</div>
							 
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Company</span>
										<select name="company_id" class="form-control">
											@foreach($companies as $comp=>$index)
											<option value="{{ $index }}">{{ $comp }}</option>
											@endforeach			
										</select>
									</div>
									<input type="hidden" name="password">
								</div>
							<div class="form-btn">
								<button class="submit-btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>