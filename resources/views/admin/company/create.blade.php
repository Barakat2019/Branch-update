@extends('includes.sidebar')
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
							<h1> Added Company</h1>
						</div>
						<form action="{{ route('company.store') }}" method="post">
                            @csrf
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Name</span>
										<input class="form-control" id="name" name="name" type="text" placeholder="Enter company name">
									</div>
                                    @error('name')
                                    <span class="alert alert-danger">{{$message }}</span>
                                      @enderror
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">website</span>
										<input class="form-control" type="text" name="website" placeholder="Like name.com or net">
									</div>
                                    @error('website')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                  @enderror
								</div>
							</div>
							<div class="form-group">
								<span class="location">Location</span>
								<input class="form-control" name="location" id="location" placeholder="enter the address">
                                @error('location')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
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