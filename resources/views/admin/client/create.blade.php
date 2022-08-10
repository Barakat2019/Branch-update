<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Add Client</title>

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
							<h1>{{ __('messages.Added Client') }}</h1>
						</div>
						<form action="{{ route('clients.store') }}" method="post">
                            @csrf
							 
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">{{ __('messages.Name') }}</span>
											<input class="form-control" id="name" name="name" type="text" placeholder="Enter company name">
										</div>
										@error('name')
										<span class="alert alert-danger">{{$message }}</span>
										@enderror
									</div>
									
									<div class="col-sm-6">
									<span class="form-label">{{ __('messages.Location') }}</span>
									<input class="form-control" name="address" id="address" placeholder="enter the address">
									@error('address')
										<span class="alert alert-danger">{{ $message }}</span>
									@enderror
									</div>
								</div>
								 
								<div class="row">
									
											<div class="col-sm-6">
												<div class="form-group">
													<span class="form-label">{{ __('messages.phone') }}</span>
													<input class="form-control" type="text" name="phone" placeholder="Like 654654649"  onkeypress="return onlyNumberKey(event)">
												</div>
												@error('phone')
													<span class="alert alert-danger">{{ $message }}</span>
											@enderror
											</div>	
										 
											<div class="col-sm-6">
												<div class="form-group">
													<span class="form-label">{{ __('messages.email') }}</span>
													<input class="form-control" type="text" name="email" placeholder="test@gmail.com">
												</div>
												@error('email')
													<span class="alert alert-danger">{{ $message }}</span>
											@enderror
											</div>
											
										 
								</div>

								<div class="row">
									
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">{{ __('messages.password') }}</span>
											<input class="form-control" type="password" name="password" placeholder="Enter Password">
										</div>
										@error('password')
											<span class="alert alert-danger">{{ $message }}</span>
								     	@enderror
									</div>	
								 
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">{{ __('messages.password_confirmation') }}</span>
											<input class="form-control" type="password" name="password_confirmation" placeholder="Enter Password">
										</div>
										@error('password_confirmation')
											<span class="alert alert-danger">{{ $message }}</span>
								     	@enderror
									</div>
									
									
								 
						</div>
                               

								<div class="row">

                                
                                 
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <span class="form-label">{{ __('messages.age') }}</span>
                                                <input class="form-control" type="text" name="age" onkeypress="return onlyNumberKey(event)" placeholder="Like 29 just number">
                                            </div>
                                            @error('age')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                        </div>	
										<div class="col-sm-6">
											<div class="form-group">
												<span class="form-label">{{ __('messages.shipment') }}</span>
												<select class="form-control" name="shipment_id" id="shipment_id">
													@foreach ($shipment_number as $number)
													<option value="{{ $number }}">{{ $number }}</option>
													@endforeach
													
												</select>
											</div>
											@error('shipment')
												<span class="alert alert-danger">{{ $message }}</span>
											@enderror
										</div>
                                  
                                     
                                         
                                    

                                </div>
                                    <div class="form-btn">
                                        <button class="submit-btn">{{ __('messages.submit') }}</button>
                                    </div>
                               
                                
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		 function onlyNumberKey(evt) {
          
		  // Only ASCII character in that range allowed
		  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
		  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
			  return false;
		  return true;
	  }
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html> 