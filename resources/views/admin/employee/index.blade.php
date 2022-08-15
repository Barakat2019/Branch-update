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
  
          <th scope="col">{{ __('messages.Name') }}</th>
          <th scope="col">{{ __('messages.phone') }}</th>
          <th scope="col">{{ __('messages.email') }}</th>
          <th scope="col">{{ __('messages.company') }}</th>
          <th scope="col">{{ __('messages.Status') }}</th>
          <th scope="col" style="text-align: center">{{ __('messages.Action') }}</th>
        </tr>
      </thead>
      <tbody>
        @isset($employees)
          @foreach ($employees as $employee)
          <tr>
            <td class="d-none" >{{ $employee->id }}</td>
            <td>{{ $employee->name}}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->email }}</td>
              @if(isset($employee->company->name))
              <td>{{ $employee->company->name }}</td>
              @else
              <td>no company</td>
              
            @endif
             <td>{{ $employee->getActive() }}</td>
            <td class="col d-flex justify-content-center ">
            <form>
              <a class="btn btn-success ml-1 myButton" href="{{ route('employee.edit',$employee->id) }}">تعديل</a>  
            </form>
            
              <form action="{{ route('employee.destroy',$employee->id) }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger ml-1 myButton">حذف</button>
                </form>
                <form>
                  <button class="btn btn-info ml-1 myButton">
                  <a  class="ml-1 p-2" style="color: white" href="{{ route('employee.status',$employee->id) }}">@if($employee->active==0)تفعيل@else الغاء @endif</a>
                </button>
                </form>
               
                
            </td>
          </tr>
     
          @endforeach    
        @endisset 
       
      </tbody>
     
    </table>
  </div> 
</div>
@endsection