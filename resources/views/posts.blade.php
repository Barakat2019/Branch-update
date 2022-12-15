<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @if (Session::has('error'))
      <span>{{Session::get('error')}}</span>
    @endif
    @if (Session::has('post_updated'))
      <span>{{Session::get('post_updated')}}</span>
    @endif
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All Posts <a href="{{route('post.add')}}" class="btn btn-success">Add New Post</a>

                        </div>
                        <div class="card-body">
                            @if(Session::has('posts-deleted'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('posts-deleted')}}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Post Title</th>
                                        <th>Post Body</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->body}}</td>
                                            <td>
                                                <a href="{{route('post.getbyid',$post->id)}}" class="btn btn-success">View</a>
                                                <a href="{{route('post.edit',$post->id)}}" class="btn btn-info">Edit</a>
                                                <a href="{{route('post.delete',$post->id)}}" class="btn btn-danger">Delete</a>
                                            </td>
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
</body>
</html>
