
<p>id={{ $id }}</p>
 
<br>

 
 <form action="{{ route('process.store') }}" method="POST">
    @csrf


    <input type="hidden" name="shipment_type_id" value="{{ $shipment_type }}">
    @foreach ($process as $process1)
    <label for="process" name="process_name-{{ $process1->id }}">{{ $process1->name}}</label>
    <select name="process[]" id="process" selected>
        @foreach ($employee as $key=>$value)
        <option name="employee{{ $key }}" value="process[{{ $process1->id }}][{{ $value->id }}]">{{ $value->name }}</option>
        @endforeach
    </select>
    <br>

   
@endforeach
<button>assign</button>
 </form>

 