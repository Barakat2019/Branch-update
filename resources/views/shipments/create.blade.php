@extends('layouts.admin')
@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<link rel="stylesheet" href="{{ asset('assets/css/shipment/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/shipment/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/shipment/style.css') }}">

    <title>shipments
    </title>
  </head>
  <style>
    
html * {
  box-sizing: border-box;
}

p {
  margin: 0;
}

.upload__box {
   padding: 40px; 
}
.upload__inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.upload__btn {
  display: inline-block;
  font-weight: 600;
  color: #fff;
  text-align: center;
  min-width: 116px;
  padding: 5px;
  transition: all 0.3s ease;
  cursor: pointer;
  border: 2px solid;
  background-color: #00b3db  ;
  border-color: #00b3db;
  border-radius: 10px;
  line-height: 26px;
  font-size: 14px;
  width: 200px;
  margin: 16px auto;
   
}
.upload__btn:hover {
  background-color: unset;
  color: #00b3db;
  transition: all 0.3s ease;
}
.upload__btn-box {
  margin-bottom: 10px;
  text-align: center;
}
.upload__img-wrap {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -10px;
}
.upload__img-box {
  width: 200px;
  padding: 0 10px;
  margin-bottom: 12px;
}
.upload__img-close {
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.5);
  position: absolute;
  top: 10px;
  right: 10px;
  text-align: center;
  line-height: 24px;
  z-index: 1;
  cursor: pointer;
}
.upload__img-close:after {
  content: "✖";
  font-size: 14px;
  color: white;
}

.img-bg {
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  position: relative;
  padding-bottom: 100%;
}
label{
  display: flex !important;
    justify-content: center !important;
}

  </style>
  <body>
	
	
		<section class="form-02-main">
		<div class="container">
			<div class="row">
			<div class="col-md-12">
				<div style=" margin-top: -64px;" class="_lk_de">
          <form action="{{ route('shipments.store') }}" method="post" enctype="multipart/form-data">
            @csrf
				  <div class="form-03-main">
				  	<div class="logo">
				  	<img src="{{ asset('assets/img/x-07-2-512.png') }}">
					</div>
          <div class="form-group" style="cursor: pointer;">
            <label for="">{{ __('messages.shipment number') }}</label>
            <input type="text" class="form-control" name="shipment_number" id="shipment_number">
            @error('shipment_number')
             <span class="alert alert-danger">{{ $message }}</span> 
            @enderror
          </div>
          <div class="form-group" style="cursor: pointer;">
            <label>{{ __('messages.user') }}</label>
            <select class="form-select" name="user" id="user">
              <option selected>{{ __('messages.Select user') }}</option>
              @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
             

            </select>
          </div>
          <div class="form-group" style="cursor: pointer;">
            <label>{{ __('messages.company') }}</label>
            <select class="form-select" name="company" id="">
              <option selected>{{ __('messages.Select company') }}</option>
              @foreach ($companies as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
              @endforeach
               

            </select>
          </div>
          <div class="form-group" style="cursor: pointer;">
            <label>{{ __('messages.Shipment Type') }}</label>
            <select class="form-select" name="shipment_type" id="">
              <option selected>{{ __('messages.Select shipment type') }}</option>
              @foreach ($shipment_type as $type)
              <option value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
            

            </select>
          </div>
					<div class="form-group" >
						<textarea style="height:76px !important;" name="note" id="" placeholder="Note
						" required="" aria-required="true" class="form-control _ge_de_ol" cols="30" rows="10"></textarea>
					</div>
         
          
					<div class="upload__box">
					 
						<label class="upload__btn">
						<p>Upload images</p>
						<input type="file" name="images[]" multiple="" data-max_length="20" class="upload__inputfile">
						</label>
					 
					<div class="upload__img-wrap"></div>
					</div>
					
					<div class="form-group" style="cursor: pointer;">
            <div class="_btn_04">
              <button class="btn-hover" type="submit" style= "all: unset;width:100%; background-color:#00b3db !important;">submit</button>
            </div>
          </div>

        </form>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
		</section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
    </script>
  </body>
</html>
@endsection

