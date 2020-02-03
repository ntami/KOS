@extends('index')
@section('title','Login')
@section('content')
<section class="login">
	<h3>LOGIN</h3><br>
	@if(session('alert'))
		<section class="alert alert-danger">{{session('alert')}}</section>
	@endif
	<form method="post">
		@csrf
			<input type="text" name="username" class="form-control" style="width: 100%;height: 40px;" placeholder="Username..."><br>
			<input type="password" name="password" class="form-control" style="width: 100%;height: 40px;" placeholder="Password..."><br>
			<input type="submit" value="Login" class="login-btn"><br><br>
			By continuing, you agree to our Conditions of Use and Privacy Notice.
	</form>
	<section>
		<br>
		Login by SNS account &emsp;
		<a href=""><img src="{{asset('public/images/ic-sns-facebook.png')}}" alt=""></a>&emsp;
		<a href=""><img src="{{asset('public/images/ic-sns-twitter.png')}}" alt=""></a>&emsp;
		<a href=""><img src="{{asset('public/images/ic-sns-google.png')}}" alt=""></a>
	</section>
	<hr>
	New to KpopOS?
	<a href="{{url('register')}}" class="btn" style="background: #D3D3D3;border:none;width: 100%;height: 40px;font-size: 16px;text-decoration: none!important;color:grey;">Create your new account</a>
</section>
@endsection