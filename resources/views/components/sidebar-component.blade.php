<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin-cards.css') }}">

<nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image:  url({{ asset('assets/admin/images/Takhlees-Logo-06.png') }});     display: block;
          width: 316px;
          height: 69px;
          margin: 0 auto;
          /* margin: 0 auto; */
          margin-left: -44px; "></a>
    <ul class="list-unstyled components mb-5">
      <li>
        
        <a href="{{ route('home.index') }}"><i class="fa fa-home"></i>&nbsp;{{ __('messages.Main Page') }}</a>
        
      </li>
      <li>
        
        <a href="#shipments" data-toggle="collapse" aria-expanded="false" data-target="#shipments" class="dropdown-toggle"><i class="fa fa-truck"></i>&nbsp;{{ __('messages.Shipments') }}</a>
        <ul class="collapse list-unstyled sub-menu" id="shipments">
        <li>
            <a href="{{ route('shipments.index') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
              {{ __('messages.Shipments') }}</a>
            <a href="{{ route('shipments.create') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
              {{ __('messages.Add Shipment') }}</a>
        </li>
        </ul>
      </li>
      <li>
        <a href="#process" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;{{ __('messages.process') }}</a>
        <ul class="collapse list-unstyled" id="process">
        <li>
            <a href=""><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
              {{ __('messages.process') }}</a>
            
        </li>
        </ul>
      </li>
    
      <li>
        <a href="#vendors" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-building" aria-hidden="true"></i>
          &nbsp;{{ __('messages.Vendor') }}</a>
        <ul class="collapse list-unstyled sub-menu" id="vendors">
        <li>
            <a href="{{ route('company.index') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
              {{ __('messages.Vendor') }}</a>
            <a href="{{ route('company.create') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
              {{ __('messages.Add Vendor') }}</a>
        </li>
        </ul>
      </li>
      
      <li>
        <a href="#Employee" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;
          {{ __('messages.Employee') }}</a>
        <ul class="collapse list-unstyled" id="Employee">
          <li>
              <a class="d-none" href="{{ route('employee.index') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                {{ __('messages.Employee') }}</a>
              <a href="{{ route('employee.create') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                {{ __('messages.Add Employee') }}</a>
          </li>
        </ul>
      </li>


      <li>
        <a href="#client" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;{{ __('messages.Clients') }}</a>
        <ul class="collapse list-unstyled" id="client">
        <li>
            <a href="{{ route('clients.index') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
              {{ __('messages.Clients') }}</a>
            <a href="{{ route('clients.create') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
              {{ __('messages.Add Client') }}</a>
        </li>
        </ul>
      </li>
 
      <li>
        <a  href="{{ route('user.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>{{ __('messages.Logout') }} </a>
      </li>
    </ul>

    <div class="footer">
      
    </div>

    </div>
</nav>
@section('content')
  <x-home-cards/>
@endsection
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>

