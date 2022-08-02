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
<div class="container mt-0 " style="padding: 7rem!important; ">
  
  <div class="table-responsive">
    <table class="table table-hover table-striped">

      <thead>
        <tr>
          <th scope="col">Number</th>
          <th scope="col">user</th>
          <th scope="col">company</th>
          <th scope="col">shipment type</th>
          <th scope="col">note</th>
          <th scope="col" style="text-align: center">Action</th>
        </tr>
      </thead>
      <tbody>
       
          <tr>
            <td>65465465</td>
            <td>user1</td>
            <td>company1</td>
            <td>shipment one</td>
            <td>Note </td>
            <td class="col d-flex justify-content-center ">
            <form>
              <a class="btn btn-success ml-1 myButton" href="">تعديل</a>  
            </form>
            
              <form action="" method="post">
                  <button class="btn btn-danger ml-1 myButton">حذف</button>
                </form>
                  
                 
                
            </td>
          </tr>
          
      </tbody>
    </table>
  </div> 
</div>
@endsection