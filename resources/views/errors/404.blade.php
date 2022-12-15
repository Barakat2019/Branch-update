@extends('errors::minimal')

@section('title', __('Page Not Found'))
@section('code', '404')

 <!-- CSS only -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
<link rel="stylesheet" href="{{asset('css/error.css')}}">
<section class="page_404">
	<div class="container">
		<div class="row">
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			<h1 class="text-center ">404</h1>


		</div>

		<div class="contant_box_404">
		<h3 class="h2">
		Look like you're lost
		</h3>

		<p>the page you are looking for not avaible!</p>

		<a href="" class="link_404">Go to Home</a>
	</div>
		</div>
		</div>
		</div>
	</div>
</section>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
