<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--script tage for AutoComplete seacher -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</head>
<body>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All Students <a href="{{route('students.create')}}" class="btn btn-success">Add New Student</a>
                            <a href="{{route('excel.export')}}" class="btn btn-warning">Export Excel</a>
                            <a href="{{route('Export.PDF')}}" class="btn btn-warning">Export PDF</a>
                            <a href="{{route('excel.import')}}" class="btn btn-success">Import file</a>
                            <br><br>

                                <input type="text" class="form-control col-3 typeahead" placeholder="Search.." name="search" id="search">

                        </div>
                        @if (Session::has('error'))
                        <span>{{Session::get('error')}}</span>
                      @endif


                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Profile Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->phone}}</td>
                                            <td><img src={{$student->profileimage}} style="max-width: 60px;"/></td>
                                            <td>
                                                <a href="" class="btn btn-success">View</a>
                                                <a href="{{route('students.edit',$student->id)}}" class="btn btn-info">Edit</a>
                                                <form action="{{route('students.destroy',$student->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                   <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>
                            {{$students->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


        @if(Session::has('student_added'))
          <script>
              toastr.success("{!! Session::get('student_added') !!}","std");
          </script>
        @endif

        @if(Session::has('student_added'))
        <script>
            swal("Great Job !","{!! Session::get('student_added') !!}","success",{
                button:"OK",
            });
        </script>
      @endif

      <script>

          var path="{{route('student.autocomplete')}}";

          $('#search').typeahead({
            source:function(terms,process)
            {
                return $.get(path,{terms:terms},function(data){
                    return process(data);
                });
            }
          });
      </script>
 

</html>
