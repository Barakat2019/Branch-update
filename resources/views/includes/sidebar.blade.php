<!doctype html>
<html lang="en">

    <head>

		<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Takhles</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/media-queries.css') }}">
		<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
		  
		
		   <script src="{{ asset('assets/js/jquery-migrate-3.0.0.min.js') }}"></script>
		   
		  
		   <script src="{{ asset('assets/js/wow.min.js') }}"></script>
		   
		   
		  
		    <!-- Javascript -->
			
			<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
			<script src="{{ asset('assets/js/jquery.backstretch.min.js') }}"></script>

    </head>
	<style>
		@media only screen and (max-width: 800px) {
			body > div > div.content > div{
				padding: 0rem !important;
			}
}
	</style>

    <body>

		<!-- Wrapper -->
    	<div class="wrapper">

			<!-- Sidebar -->
			<nav class="sidebar">
				
				<!-- close sidebar menu -->
				<div class="dismiss">
					<i class="fas fa-arrow-left"></i>
				</div>
				
				<div class="logo">
					<h3><a href="{{ route('dashboard') }}">Bootstrap 4 Template with Sidebar Menu</a></h3>
				</div>
				
				<ul class="list-unstyled menu-elements">

					<li>
						<a href="{{ route('home.index') }}">
							<i class="fas fa-home"></i>Home
						</a>

					</li>
					
					<li>
						<a href="#otherSections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
							<i class="fas fa-shipping-fast"></i>Shipments
						</a>
						<ul class="collapse list-unstyled" id="otherSections">
							<li>
								<a class="scroll-link" href="{{ route('shipments.index') }}">Shipments</a>
							</li>
							<li>
								<a class="scroll-link" href="{{ route('shipments.create') }}">Add Shipment</a>
							</li>
						</ul>
					</li>	
					 
					<li>
					    <a href="#otherSections1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections1">
								<i class="fas fa-building"></i>companies
						</a>
						<ul class="collapse list-unstyled" id="otherSections1">
							<li>
									<a class="scroll-link" href="{{ route('company.index') }}">Company</a>
								</li>
								<li>
									<a class="scroll-link" href="{{ route('company.create') }}">Add Company</a>
								</li>
						</ul>
					</li>
					<li>
					    <a href="#otherSections2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections2">
								<i class="fas fa-user-tie	"></i>Employee
						</a>
						<ul class="collapse list-unstyled" id="otherSections2">
							<li>
									<a class="scroll-link" href="{{ route('employee.index') }}">Employee</a>
								</li>
								<li>
									<a class="scroll-link" href="{{ route('employee.create') }}">Add Employee</a>
								</li>
						</ul>
					</li>	
					<li>
					    <a href="#otherSections3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections3">
								<i class="fas fa-user"></i>Clients
						</a>
						<ul class="collapse list-unstyled" id="otherSections3">
							<li>
									<a class="scroll-link" href="">Clients</a>
								</li>
								<li>
									<a class="scroll-link" href="">Add Client</a>
								</li>
						</ul>
					</li>		
					<li>
						<a class="scroll-link" href="#section-1"><i class="fas fa-cog"></i> What we do</a>
					</li>
					<li>
						<a class="scroll-link" href="#section-2"><i class="fas fa-paper-plane"></i> About us</a>
					</li>
			         <li>
					 	<a class="scroll-link" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
					 </li>				 
				</ul>
				
				{{-- <div class="to-top">
					<a class="btn btn-primary btn-customized-3" href="#" role="button">
	                    <i class="fas fa-arrow-up"></i> Top
	                </a>
				</div> --}}
			{{-- 	
				<div class="dark-light-buttons">
					<a class="btn btn-primary btn-customized-4 btn-customized-dark" href="#" role="button">Dark</a>
					<a class="btn btn-primary btn-customized-4 btn-customized-light" href="#" role="button">Light</a>
				</div> --}}
			
			</nav>
			<!-- End sidebar -->
			
			<!-- Dark overlay -->
    		<div class="overlay"></div>

			<!-- Content -->
			<div class="content">
			
				<!-- open sidebar menu -->
				<a class="btn btn- btn-customized open-menu" href="#" role="button" style="background: #00b3db; ">
                    <i class="fas fa-align-left"></i> <span>Menu</span>
                </a>
			
		        <!--  content -->
				@yield('content')
				<!-- End Content-->
		        <!-- Footer -->
		        <footer class="footer-container">
		
			        <div class="container">
			        	<div class="row">
		
		                    <div class="col">
		                    	
		                    </div>
		
		                </div>
			        </div>
		
		        </footer>
	        
	        </div>
	        <!-- End content -->
        
        </div>
        <!-- End wrapper -->
		

		<script src="{{ asset('assets/js/scripts.js') }}"></script>
		<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 
    </body>

</html>