<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax Crud</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Students <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#StudentModal">Add New Student</a>
                        </div>
                        <div class="card-body">
                            <table id="studentTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>created</th>
                                        <th>update</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td>{{$student->created_at}}</td>
                                        <td>{{$student->updated_at}}</td>
                                       
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="StudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="studentForm">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name"/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="email"/>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" id="phone"/>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script>
    $("#studentForm").submit(function(e){
        e.preventDefault();
        let name=$("#name").val();
        let email=$("#email").val();
        let phone=$("#phone").val();
        let _token=$("input[name=_token]").val();


        $.ajax({
          // "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            url:"{{route('student.add')}}",
            type:"POST",
            data:{
                name:name,
                email:email,
                phone:phone,
                _token:_token
            },
            success:function(response)
            {
                    $("#studentTable tbody").prepend('<tr><td>'+
                        response.name+'</td><td>'+
                            response.email+'</td><td>'+
                                response.phone+'</td></tr>');

                    $("#studentForm")[0].reset();
                    $("#StudentModal").modal('hide');
              
            },
            error:function(error){
              alert("error"+error)
           }
        });


    });

   </script>
 
</body>
</html>
