@extends('layouts.admin')
@section('content')
@include('admin.includes.alerts.success')
@include('admin.includes.alerts.errors')
<div class="container mt-0 ">
  
  <div class="table-responsive">
    <table class="table table-hover table-striped">

      <thead>
        <tr>
          <th scope="col">{{ __('messages.Name') }}</th>
          <th scope="col">{{ __('messages.website') }}</th>
          <th scope="col">{{ __('messages.Location') }}</th>
          <th scope="col">{{ __('messages.Status') }}</th>
          <th scope="col">{{__('messages.created_at') }}</th>
          <th scope="col">{{ __('messages.updated_at') }}</th>
          <th scope="col" style="text-align: center">{{ __('messages.Action') }}</th>
        </tr>
      </thead>
      <tbody>
        @isset($companies)
          @foreach ($companies as $company)
          <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->website }}</td>
            <td>{{ $company->location }}</td>
            <td>{{ $company->getActive() }}</td>
            <td>{{ $company->created_at }}</td>
            <td>{{ $company->updated_at }}</td>
            
            <td class="col d-flex justify-content-center ">
            <form>
              <a class="btn btn-success ml-1 myButton" href="{{ route('company.edit',$company->id) }}">تعديل</a>  
            </form>
            
              <form action="{{ route('company.destroy',$company->id) }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger ml-1 myButton">حذف</button>
                </form>
                <form>
                  <button class="btn btn-info ml-1 myButton">
                  <a  class="ml-1 p-2" style="color: white" href="{{ route('company.status',$company->id) }}">@if($company->active==0)تفعيل@else الغاء @endif</a>
                </button>
                </form>
                <form>
                  <button class="btn btn-secondary ml-1 myButton">
                    <a  class="ml-1 p-2" style="color: white" href="{{ route('company.employee',$company->id) }}">الموظفين</a>
                  </button>
                </form>
                
            </td>
          </tr>
          @endforeach    
        @endisset  
      </tbody>
      {{ $companies->links() }}
    </table>
  </div> 
</div>
@endsection