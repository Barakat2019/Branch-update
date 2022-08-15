
 @extends('layouts.admin')
 @section('content')
 @include('includes.alerts.success')
 
 <form action="{{ route('process.store') }}" method="POST">
    @csrf

    <input type="hidden" name="shipment_id" value="{{ $id }}">
    <input type="hidden" name="shipment_type_id" value="{{ $shipment_type }}">
    @foreach ($process as $process1)
        <label for="process" name="process_name-{{ $process1->id }}">{{ $process1->name}}</label>
        <select name="process[]" id="process" class="form-control" selected>
            @foreach ($employee as $key=>$value)
            <option name="employee{{ $key }}" value="process[{{ $process1->id }}][{{ $value->id }}]">{{ $value->name }}</option>
            @endforeach
        </select>
        <br>
    @endforeach
<button type="submit" class="btn btn-success">assign</button>
 </form>
@endsection
 