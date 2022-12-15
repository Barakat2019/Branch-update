@extends('layouts.master')
@section('title','Contact')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Contact Us Page Content</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                           {{--  <th>Role</th> --}}
                            <th>phone</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                          {{--   @foreach ($user->roles as $role)
                             <td> {{$role->name}}- {{$role->pivot->expires_at}}-{{$role->pivot->created_at}}</td>
                           @endforeach --}}

                        {{-- resolve null property in Model relation using withDefault() --}}
                             <td>{{$user->phone_user->phone}}</td>



                        @endforeach



                        </tr>
                      </tbody>



                </table>

            </div>
        </div>
    </div>


    {{--
    <select name="product">
        @foreach ($product as $prod)
            <option value="{{$prod}}">
                {{$prod}}
            </option>
        @endforeach
    </select>
    <button type="submit" class="text-lime-400 bg-orange-400 btn" @disabled($errors->isNotEmpty())>Submit</button>

    <input type="email" name="email" value="email@laravel.com" readonly>
    <br>
    @includeIf('contact-us',['status'=>'complete']) --}}


    <script>
      var app=<?php echo json_encode($users); ?>;

      console.log(app);
    </script>




@endsection
