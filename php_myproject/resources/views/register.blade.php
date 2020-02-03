
<section class="login">
	<h3>REGISTER</h3>
	<form method="post" autocomplete="off">
			<input type="text" name="username" class="form-control" required autocomplete="off" placeholder="Username..."><br>
			<input type="password" name="password" class="form-control" required pattern=".{6,}" title="Mật khẩu phải từ 6 kí tự" autocomplete="off" placeholder="Password..."><br>
			<input placeholder="Re-enter Password..." type="password" name="repassword" class="form-control" oninput="if(value!=password.value){document.getElementById('checkPass').innerHTML='Re-enter password wrong!'}else{document.getElementById('checkPass').innerHTML=''}" autocomplete="off"> <span id="checkPass" style="color: red"></span><br>
			<input type="text" placeholder="Full Name..." name="fullName" class="form-control"><br>
			<input type="tel" placeholder="Mobile..." name="mobile" class="form-control"><br>
			<input type="email" placeholder="Email..." name="email" class="form-control"><br>
			<textarea placeholder="Address..." name="address" class="form-control" rows="3"></textarea><br>
			<input type="submit" value="Register" class="login-btn"><br><br>
			By continuing, you agree to our Conditions of Use and Privacy Notice.
	</form>
</section>