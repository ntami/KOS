@extends('index')
@section('title','Password')
@section('content')
<section class="content" style="background-color: #FBEFF2">
	<div style="padding: 200px 455px;">
		<form method="post" style="background: whitesmoke;border: black thin solid;width: 550px;height: 160px;padding: 25px 70px;">
			@csrf
			<table style="width: 400px;">
				<tr>
					<td width="40%">Password:</td>
					<td width="50%"><input type="password" name="password"></td>
					<td></td>
				</tr>
				<tr>
					<td>New password:</td>
					<td><input type="password" placeholder="6-8 characters..."  name="newPassword"></td>
					<td>&nbsp;<input type="submit" class="btn" value=">" style="border-radius: 50%"></td>
				</tr>
				<tr>
					<td>Re-enter password:</td>
					<td><input type="password" name="rePassword" oninput="if(value!=newPassword.value){document.getElementById('checkPass').innerHTML='Re-enter password wrong!'}else{document.getElementById('checkPass').innerHTML=''}" autocomplete="off"></td>
					<td></td>
				</tr>
			</table>
			<section style=" text-align: center;">
				@if(session('alert'))
					<span style="color: red;">{{session('alert')}}</span>
				@endif
				<span id="checkPass" style="color: red"></span>
			</section>

		</form>
	</div>
</section>
@endsection