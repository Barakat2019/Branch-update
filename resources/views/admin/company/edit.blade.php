
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

    <title>Edit Company</title>
</head>
<body class="img js-fullheight" style="background-image:url({{ asset('assets/img/pexels-tom-fisk-3057960.jpg') }})">
    <form action="{{ route('company.update',$company->id) }}" method="post">
        @csrf
        @method('put')
        <div class="container col-md-5">
            <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style="    margin-top: 100px;
                    ">Edit Company</h2>
				</div>
			</div>
            <div class="row">
                <div class="mb-3">
                     <input type="text"  value="{{ $company->name }}" class="form-control" id="name" name="name" placeholder="Enter company name">
                </div>
                @error('name')
                    <span class="alert alert-danger">{{$message }}</span>
                @enderror
            </div>
           
            <div class="row">
                <div class="mb-3">
                    <label for="website" class="form-label">website</label>
                    <input type="text" value="{{ $company->website }}" class="form-control" id="website" name="website" placeholder="Like name.com or net">
                </div>
                @error('website')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="row">
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" value="{{ $company->location }}" class="form-control" name="location" id="location" placeholder="enter the address" rows="3">
                  </div>
                 @error('location')
                  <span class="alert alert-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="row">
                <button class="form-control btn btn-primary submit px-3" type="submit">update</button>
    
            </div>
        </div>
    </form>

	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
	</body>
</html>

