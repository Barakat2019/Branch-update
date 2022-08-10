@extends('layouts.admin')
@section('content')


<style>
  .table-bordered td, .table-bordered th
  {
    border: 0px solid #dee2e6 !important;
  }
  *, ::after, ::before {
    box-sizing: unset !important;
}
</style>
@section('content')
@include('admin.includes.alerts.success')
@include('admin.includes.alerts.errors')
<div class="container mt-0">
  
  <div class="table-responsive">
    <table class="table table-hover table-striped">

      <thead>
        <tr>
          <th scope="col">{{ __('messages.Shipment Number') }}</th>
          <th scope="col">{{ __('messages.user') }}</th>
          <th scope="col"> {{ __('messages.company') }}</th>
          <th scope="col">{{ __('messages.Shipment Type') }}</th>
          <th scope="col">{{ __('messages.note') }}</th>
          <th scope="col">المرحلة</th>
          <th scope="col">{{ __('messages.created_at') }}</th>
          <th scope="col">{{ __('messages.updated_at') }}</th>
          <th scope="col" style="text-align: center">{{ __('messages.Action') }}</th>
        </tr>
      </thead>
      <tbody>
       
          
            @foreach ($shipments as $shipment)
            <tr>
              <td> {{ $shipment->number }}</td>
              <td>{{ $shipment->user->name }}</td>
              <td> {{ $shipment->company->name }} </td>
              <td>{{ $shipment->shipment_type->name }}</td>
              <td> {{ $shipment->note }} </td>
              @isset($shipment->shipment_process->process_id)
              <td>{{ $shipment->shipment_process->process_id }}</td>
              @endisset
              
              <td>{{ $shipment->created_at }}</td>
              <td>{{ $shipment->updated_at }}</td>
              <td class="col d-flex justify-content-center ">
                <form>
                  <a class="btn btn-success ml-1 myButton" href="{{ route('process.index',['id'=>$shipment->id,'shipment_type'=>$shipment->shipment_type,'company_id'=>$shipment->company->id]) }}">assign process</a>  
                </form>
                
                    
                </td>
             </tr>
            @endforeach
       
            
         
          
      </tbody>
    </table>
  </div> 
</div>
@endsection