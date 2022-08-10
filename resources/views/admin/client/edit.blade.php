
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
 
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

    <title>{{ __('messages.Edit Client') }}</title>
</head>
@include('includes.alerts.success')
@include('includes.alerts.errors')
<body class="img js-fullheight" style="background-image:url({{ asset('assets/img/pexels-tom-fisk-3057960.jpg') }})">
    <form action="{{ route('clients.update',$clients->id) }}" method="post">
        @csrf
        @method('put')

        <input type="hidden" name="id" value="{{$clients->id}}">
        <div class="container col-md-5">
            <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style="margin-top: 14px;
                    ">{{ __('messages.Edit Client') }}</h2>
				</div>
			</div>
            <div class="row">
                <div class="mb-3">
                    <label for="number" class="form-label">{{ __('messages.shipment number') }}</label>
                     <input type="text"  value="{{ $clients->shipment_id }}" class="form-control" id="name" name="shipment_id" placeholder="Enter shipment Number">
                </div>
                @error('shipment_id')
                    <span class="alert alert-danger">{{$message }}</span>
                @enderror
            </div>
               
         
            <div class="row">
                <div class="mb-3">
                    <label for="name" class="form-label"> {{ __('messages.Name') }}</label>
                    <input type="text" value="{{ $clients->name }}" class="form-control" name="name" id="name" placeholder="enter the name">
                  </div>
                 @error('name')
                  <span class="alert alert-danger">{{ $message }}</span>
                 @enderror
            </div>
           
            <div class="row">
                <div class="mb-3">
                    <label for="email" class="form-label"> {{ __('messages.email') }}</label>
                    <input type="text" value="{{ $clients->email }}" class="form-control" id="email" name="email" placeholder="Like test@test.com">
                </div>
                @error('email')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row">
                <div class="mb-3">
                    <label for="phone" class="form-label"> {{ __('messages.phone') }}</label>
                    <input type="text" value="{{ $clients->phone }}" class="form-control" id="phone" name="phone" placeholder="Like 0795">
                </div>
                @error('phone')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="mb-3">
                    <label for="age" class="form-label"> {{ __('messages.age') }}</label>
                    <input type="text" value="{{ $clients->age }}" class="form-control" id="age" name="age" placeholder="Like 25">
                </div>
                @error('age')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="mb-3">
                    <label for="address" class="form-label"> {{ __('messages.Location') }}</label>
                    <input type="text" value="{{ $clients->address }}" class="form-control" id="address" name="address" placeholder="Like amman">
                </div>
                @error('address')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="row">
                <button class="form-control btn btn-primary submit px-3" type="submit">{{ __('messages.update') }}</button>
            </div>
        </div>
        </div>
    </form>     
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
	</body>
</html>

