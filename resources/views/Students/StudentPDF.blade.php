<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>student</title>
</head>
<body>
    <table class="table table-primary">
        <thead>
          <tr>
            <th class="table-info" scope="col">#</th>
            <th class="table-info" scope="col">Name</th>
            <th class="table-info" scope="col">Email</th>
            <th class="table-info" scope="col">Phone</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td class="table-warning">{{$item->email}}</td>
                <td class="table-primary">{{$item->phone}}</td>
              </tr>
            @endforeach
          
           
        </tbody>
      </table>
     
    
</body>
</html>