
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
@include('includes.alerts.success')
@include('includes.alerts.errors')
<body class="img js-fullheight" style="background-image:url({{ asset('assets/img/pexels-tom-fisk-3057960.jpg') }})">
    <form action="{{ route('company.update',$company->id) }}" method="post">
        @csrf
        @method('put')

        <input type="hidden" name="id" value="{{$company->id}}">
        <div class="container col-md-5">
            <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style="margin-top: 100px;
                    ">{{ __('messages.Edit Company') }}</h2>
				</div>
			</div>
            <div class="row">
                <div class="mb-3">
                    <label for="website" class="form-label">{{ __('messages.Company Name') }}-{{ __('messages.'.$company->translation_lang) }}</label>
                     <input type="text"  value="{{ $company->name }}" class="form-control" id="name" name="company[0][name]" placeholder="Enter company name">
                </div>
                @error('name')
                    <span class="alert alert-danger">{{$message }}</span>
                @enderror
            </div>
                <div class="col-md-6 hidden" style="display: none !important">
                    <label>اختصار اللغة-{{__('messages.'.$company->translation_lang)}}</label>
                    <input type="text" id="translation_lang"   name="company[0][translation_lang]" class="form-control" value="{{$company->translation_lang}}">

                    @error('company.$index.translation_lang')
                    <span class="text-danger">هذا الحقل مطلوب</span>
                    @enderror
                </div>
         
            <div class="row">
                <div class="mb-3">
                    <label for="location" class="form-label"> {{ __('messages.Location') }}--{{ __('messages.'.$company->translation_lang) }}</label>
                    <input type="text" value="{{ $company->location }}" class="form-control" name="company[0][location]" id="location" placeholder="enter the address" rows="3">
                  </div>
                 @error('location')
                  <span class="alert alert-danger">{{ $message }}</span>
                 @enderror
            </div>
           
            <div class="row">
                <div class="mb-3">
                    <label for="website" class="form-label"> {{ __('messages.website') }}</label>
                    <input type="text" value="{{ $company->website }}" class="form-control" id="website" name="website" placeholder="Like name.com or net">
                </div>
                @error('website')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>
    
           
            <div class="row">
                <button class="form-control btn btn-primary submit px-3" type="submit">{{ __('messages.update') }}</button>

                

            </div>
        </div>
        </div>
    </form>
    
    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
        تحديث الى لغة انجليزي
      </button>

      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 style="margin-left: 150px;" class="modal-title" id="exampleModalLabel">تعديل شركة بالانجليزي</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @isset($company->trans_company)
                @foreach ($company->trans_company as $index=>$translation)
                <form class="form" action="{{route('company.update',$translation->id)}}"
                    enctype="multipart/form-data" method="POST">
                    @method('put')
                    @csrf
                            <!-- This field for return id when update method in validation  required_without:id -->
                            <input type="hidden" name="id" value="{{$translation->id}}"/>
                            <div class="row">
                                <div class="form-group">
                                        <div class="col-md-6">
                                            
                                            <label>اسم الشركة-{{__('messages.'.$translation->translation_lang)}}</label>
                                            <input type="text" id="name" name="company[0][name]" class="form-control input-edit" value="{{$translation->name}}">
                                            @error('company.0.name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6 hidden" style="display: none !important">
                                <label>اختصار اللغة-{{__('messages.'.$translation->translation_lang)}}</label>
                                <input type="text" id="translation_lang"   name="company[0][translation_lang]" class="form-control" value="{{$translation->translation_lang}}">

                                @error('company.0.translation_lang')
                                <span class="text-danger">هذا الحقل مطلوب</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="form-group">
                                        <div class="col-md-6">
                                            
                                            <label>العنوان-{{__('messages.'.$translation->translation_lang)}}</label>
                                            <input type="text" id="name" name="company[0][location]" class="form-control input-edit" value="{{ $translation->location }}">
                                            @error('company.0.location')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                            <div class="row d-none">
                                <div class="mb-3">
                                    <label for="website" class="form-label"> {{ __('messages.website') }}</label>
                                    <input type="text" value="{{ $company->website }}" class="form-control" id="website" name="website" placeholder="Like name.com or net">
                                </div>
                                @error('website')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                             
               
                @endforeach 
            @endisset
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('messages.Close') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
        </div>
    </form>
      </div>
    </div>
</div>
     
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
	</body>
</html>

