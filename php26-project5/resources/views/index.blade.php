<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{asset('public/css/app.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/css.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/animation.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-codes.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-embedded.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-ie7-codes.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/fontello-ie7.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="{{asset('public/js/app.js')}}"></script>
    <script src="{{asset('public/js/js.js')}}"></script>
    <link href="{{asset('public/rateit/src/rateit.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('public/rateit/src/jquery.rateit.js')}}" type="text/javascript"></script>
	<script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>  	   
	<script lang="javascript">var _vc_data = {id : 4925991, secret : '2baabe1d9b43e20f4e7e249484ed3d3a'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//live.vnpgroup.net/client/tracking.js?id=4925991';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>         	     	
</head>
<body>
		@include('layout/header')
		@yield('content')
		@include('layout/footer')
</body>
</html>