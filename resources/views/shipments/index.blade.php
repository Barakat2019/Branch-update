@extends('includes.sidebar')
@include('admin.includes.alerts.success')
@include('admin.includes.alerts.errors')

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
<div class="container mt-0 " style="padding: 7rem!important; ">
  
  <div class="table-responsive">
    <table class="table table-hover table-striped">

      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Website</th>
          <th scope="col">Location</th>
          <th scope="col">Status</th>
          <th scope="col" style="text-align: center">Action</th>
        </tr>
      </thead>
      <tbody>
       
          <tr>
            <td>company1</td>
            <td>www.company.com</td>
            <td>location1</td>
            <td>active</td>
            <td class="col d-flex justify-content-center ">
            <form>
              <a class="btn btn-success ml-1 myButton" href="">تعديل</a>  
            </form>
            
              <form action="" method="post">
                  <button class="btn btn-danger ml-1 myButton">حذف</button>
                </form>
                <form>
                  <button class="btn btn-info ml-1 myButton">
                  <a  class="ml-1 p-2" style="color: white" href="">الغاء تفعيل</a>
                </button>
                </form>
                <form>
                  <button class="btn btn-secondary ml-1 myButton">
                    <a  class="ml-1 p-2" style="color: white" href="">الموظفين</a>
                  </button>
                </form>
                
            </td>
          </tr>
          
      </tbody>
    </table>
  </div> 
</div>
@endsection