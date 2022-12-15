@extends('layouts.master')
@section('title','Upload File')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>About Us Page Content</h1>
            </div>
            <div class="row card-header">
                <div class="col-md-6 card-body">
                    <form action="{{route('user.UploadForm')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">{{__('message.Choose File')}}</label>
                            <input type="file" class="form-control" name="file" id="file"/>
                        </div>
                        <br>
                        <div class="row col-2">
                            <button type="submit" class="btn btn-success">{{__('message.upload')}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
