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
     <link rel="stylesheet" href="{{ asset('assets/css/shipment/style1.css') }}">

    <title>Educational Bootstrap 5 Login Page Website Tampalte</title>
  </head>
  <body>
    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
            
                <div class="form-group">
                  <input type="text" name="number" class="form-control _ge_de_ol"  placeholder="Enter Number" aria-required="true">
                </div>
 
                        <div class="upload__box">
                            <div class="upload__btn-box">
                              <label class="upload__btn">
                                <p>Upload images</p>
                                <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
                              </label>
                            </div>
                            <div class="upload__img-wrap"></div>
                          </div>
                    
                
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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