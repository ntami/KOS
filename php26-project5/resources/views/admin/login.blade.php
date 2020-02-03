<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet"  href="{{asset('public/css/app.css')}}">
</head>
<body>
	<section class="container col-md-8" style="background-color:#FBEFF2;height: 100%" >
		<h1 style="text-align: center;">ADMIN</h1>
		<h6 style="text-align: center;"><i>KpopOS shop</i></h6>
		<br>
		@if(session('alert'))
		<section class="alert alert-danger">{{session('alert')}}</section>
		@endif
		<form method="post">
			@csrf
			<section class="form-group">
				<label>Username:</label>
				<input type="text" name="username" class="form-control">
			</section>
			<section class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control" required="">
			</section>
			<section class="form-group">
				<input type="submit" value="Login Admin" class="btn btn-primary">
			</section>
		</form>
	</section>
</body>
</html>