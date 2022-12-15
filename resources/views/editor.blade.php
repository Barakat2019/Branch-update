<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML Editor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/8tjc287uqxxaror8to9p8l7ntuua3l4u27gtejruiel1toky/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <h2>Tiny MCE Html Editory</h2>
    <div class="card">
        <div class="card-header">
                Tiny MCE Html Editor
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <textarea name="mytextarea" id="mytextarea"></textarea>
            </form>
        </div>
    </div>
    
    <script>
        tinymce.init({
      selector: '#mytextarea',
      plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
    </script>
</body>
</html>