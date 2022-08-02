<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<x-sidebar-component/>

        <!-- Page Content  -->
      <div style="overflow-x: hidden;" id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        @yield('content')
       {{--  <div class="container">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Shipments</h6>
                            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Number of Shipment<br><span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Companies</h6>
                            <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>{{ App\Models\Company::count() }}</span></h2>
                            <p class="m-b-0">Number of Company<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Employee</h6>
                            <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Number of Employee<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Clients</h6>
                            <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Number of Clients<br><span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
      </div>
		</div>

       
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/popper.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
  
  </body>
  
</html>