<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{asset('public/css/app.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/css.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-645e4c87/css/animation.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-645e4c87/css/fontello.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-645e4c87/css/fontello-codes.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-645e4c87/css/fontello-embedded.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-645e4c87/css/fontello-ie7-codes.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-645e4c87/css/fontello-ie7.css')}}">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background-color:#F2F2F2;">
	<section class="row header">
		@include('layout/header')
	</section>
	@include('layout/menutop')
	<section class="container-fluid row" style="margin: 0;padding: 0;">
			@yield('content')
		</section>
	</section>
</body>
</html>