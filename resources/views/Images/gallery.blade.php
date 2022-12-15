<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <title>gallery File Upload</title>

    <style>
        img
        {
            background-color: gray;
            height: 250px;
            width: 100%;
            border: 1px solid gray;
            margin-top: 20px;
            box-shadow: 0 8px 6px -6px black;
        }
    </style>
    
</head>
<body>
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                @for($i=1;$i<=16;$i++)
                    <img src="http://127.0.0.1:8000/image/165495121{{$i}}.jpg"/>
                @endfor
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $('img').lazyload();
        });
    </script>
</body>

</html>