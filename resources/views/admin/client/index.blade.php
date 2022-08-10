@extends('layouts.admin')

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

<div class="container mt-0 " >
  
  <div class="table-responsive">
    <table class="table table-hover table-striped">

      <thead>
        <tr>
          <th scope="col">{{ __('messages.Shipment Number') }}</th>
          <th scope="col">{{ __('messages.Name') }}</th>
          <th scope="col">{{ __('messages.email') }}</th>
          <th scope="col">{{ __('messages.phone') }}</th>
          <th scope="col">{{ __('messages.age') }}</th>
          <th scope="col">{{ __('messages.Location') }}</th>
          <th scope="col" style="text-align: center">Action</th>
        </tr>
      </thead>
      <tbody>
        @isset($clients)
          @foreach ($clients as $client)
          <tr>
            <td>{{ $client->shipment_id }}</td>
            <td>{{ $client->name}}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->age }}</td>
            <td>{{ $client->address }}</td>
              
              
            <td class="col d-flex justify-content-center ">
            <form>
              <a class="btn btn-success ml-1 myButton" href="{{ route('clients.edit',$client->id) }}">تعديل</a>  
            </form>
            
              <form action="{{ route('clients.destroy',$client->id) }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger ml-1 myButton">حذف</button>
                </form>
            </td>
          </tr>
          @endforeach    
        @endisset  
      </tbody>
      {{ $clients->links() }}
    </table>
  </div> 
</div>
@endsection