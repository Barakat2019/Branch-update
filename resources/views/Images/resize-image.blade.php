<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resize Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Resize Image
                        </div>
                        <div class="card-body">
                            <form action="{{route('image.resize')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="from-group">
                                    <label for="file">Choose Image</label>
                                     <input type="file" name="file" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                input
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


</body>
</html>