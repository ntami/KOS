@extends('index')
@section('title','Register')
@section('content')
<section class="content"  style="text-align: center;padding:0px 500px;">
	<br>
	<h3>REGISTER</h3>
	@if(session('alert'))
		<section class="alert alert-danger">{{session('alert')}}</section>
	@endif
	<form method="post" autocomplete="off">
		@csrf
			<input type="text" name="username" class="form-control" required autocomplete="off" placeholder="Username..."><br>
			<input type="password" name="password" class="form-control" required pattern=".{6,}" title="Mật khẩu phải từ 6 kí tự" autocomplete="off" placeholder="Password..."><br>
			<input placeholder="Re-enter Password..." type="password" name="repassword" class="form-control" oninput="if(value!=password.value){document.getElementById('checkPass').innerHTML='Re-enter password wrong!'}else{document.getElementById('checkPass').innerHTML=''}" autocomplete="off"> <span id="checkPass" style="color: red"></span><br>
			<input type="text" placeholder="Full Name..." name="fullName" class="form-control" value="<?=isset($fullName)?$fullName:''?>"><br>
			<input type="tel" placeholder="Mobile..." name="mobile" class="form-control" pattern="\d{10,13}" title="Số điện thoại không đúng" value="<?=isset($mobile)?$mobile:''?>"><br>
			<input type="email" placeholder="Email..." name="email" class="form-control" pattern=".+@.+(\.[a-z]{2,3}){1,2}" value="<?=isset($email)?$email:''?>"><br>
			<textarea placeholder="Address..." name="address" class="form-control" rows="3"></textarea><br>
			<input type="submit" value="Register" style="background: black;color: white;border:none;width: 100%;height: 40px;font-size: 16px;"><br><br>
			By continuing, you agree to KpopOS's Conditions of Use and Privacy Notice.
	</form>
</section>
@endsection