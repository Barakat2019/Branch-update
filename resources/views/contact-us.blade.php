<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    {{$status}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                           Contact US
                        </div>
                        <div class="card-body">
                            @if(Session::has('message_sent'))
                               <div class="alert alert-success" role="alert">{{ Session::get('message_sent') }}</div>
                            @endif
                            <form method="POST" action={{route('contact.send')}} enctype="multipart/form-data">
                                @csrf
                              <div class="mb-3">
                                 <label for="name" class="form-label">Name</label>
                                 <input type="text" name="name" class="form-control" id="name">
                              </div>
                              <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email">
                             </div>
                             <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone">
                             </div>
                             <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="msg" class="form-control" id="" cols="30" rows="10"></textarea>
                             </div>
                             <button type="submit" class="btn btn-success float-right">send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


   </section>

</body>
</html>
