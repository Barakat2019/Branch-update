@if (Session::has('error'))
<div class="alert alert-danger" style="position: relative;left: 0px;right: 700px;top:78px;width: 25%;margin: 0 auto;border-radius: 20px;"> {{Session::get('error')}}</div>
@endif
