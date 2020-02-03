<section class="container-fluid row">
	<div class="col-md-2">
		<a href="{{url('/')}}" class="logo"><h2>Logo</h2></a>
	</div>
	<div class="col-md-2 header-item" style="text-align: center">
		<i class="icon-menu"></i><a href="{{url('search')}}">Tất cả phụ kiện</a>
	</div>
	<div class="col-md-5 header-item">
		<form style="width: 100%;height: 100%" method="post" action="{{url('search/keyword')}}">
		@csrf
			<input style="width: 80%;height: 60%;" type="text" name="keyword" width="100px" placeholder="Tìm kiếm thiết bị...">
			<input type="submit" style="width: 100px; height: 60%;background-color: #FFD700;border: #FFD700;" width="50px" height="100%" value="Tìm kiếm">
		</form>
	</div>
	<div class="col-md-3 header-item">
		<a href="{{url('cart')}}" class="icon-header icon-cart"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="{{url('login')}}" class="icon-header icon-user"></a>
		@if(session('user'))
			<span>Hello: <b>{{session('user')}}</b>[<a href="{{url('logout')}}">Logout</a>]</span>
		@endif
	</div>
</section>
