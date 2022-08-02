@if (Session::has('error'))
<div class="alert alert-danger" style="position: relative;top: 0px;width: 381px;left:4px;right: 700px;margin:12px auto;text-align: center"> {{Session::get('error')}}</div>
@endif
