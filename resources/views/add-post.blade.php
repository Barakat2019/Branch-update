<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DB CRUD Operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>
   <section>
       <div class="container">
           <div class="row">
               <div class="col-md-6 offset-md-3">
                   <div class="card">
                       <div class="card-header">
                           Add New Post
                       </div>
                       <div class="card-body">
                        @if(Session::has('status'))
                       <div class="text-green-400">{{ Session::get('status') }}</div>
                        @endif
                           @if(Session::has('post_created'))
                           <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                {{Session::get('post_created')}}
                               </div>
                          </div>


                           @endif
                           <form action="{{route('post.submit')}}" method="post">
                               @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Post Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title">

                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Post Description</label>
                                <textarea name="body" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">User Id</label>
                                <input type="text" name="user_id" class="form-control" id=""/>
                            </div>
                            <button type="submit" value="submit" class="btn btn-success">Submit</button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
</body>
</html>
