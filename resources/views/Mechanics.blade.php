<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>

</head>
<body>
      <h1 class="text-3xl font-bold underline">Hello world</h1>
      @foreach ($mechanics as $mech)
      <div class="border-b py-4">
        <p class="text-xl">{{$mech->name}}</p>
        <p class="text-lime-400">Car Owner:{{$mech->owner->name}}</p>
        <p class="text-red-500">Owner Phone:{{$mech->owner->phone??'n/a'}}</p>
      </div>


        @endforeach
</body>
</html>
