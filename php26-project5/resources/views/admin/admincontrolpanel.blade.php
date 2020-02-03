<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{asset('public/css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/admin.css')}}">
	<meta charset="utf-8">
	<script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
</head>
<body>
	<section class="container-fluid row" style="background-color:black;color: white;">
		<article class="col-md-4">
			<b>Hello:{{session('userAdmin')}}</b>
			[<a href="{{url('admin/logout')}}">Logout</a>]
		</article>
		<article class="col-md-4" style="text-align: center;">
			<a style="color: white;text-decoration: none!important ;font-size: 40px;font-family:Courier New, Courier, monospace;">KpopOS</a>
			<br><b>ADMIN ACCOUNT</b>
		</article>
		
	</section>
		<section class="row" style="margin: 20px 20px;margin: auto;">
			<aside class="col-md-2" style="border-right:black thin solid;font-size: 16px;padding-left: 20px">
				<b>1. Products</b>
				<br>&nbsp;<a href="">>>Edit product</a>
				<?php $type=DB::table('types')->where('status',1)->get();?>	
					@foreach($type as $type)
						<div class="father">
							<a href="{{url('admin/search/type/'.$type->typeId)}}">{{$type->typeName}}&nbsp;</a>
							<div class="son">
								<?php $artist=DB::table('artists')->where('status',1)->get();?>
								@foreach($artist as $artist)
									<a href="{{url('admin/search/type/'.$type->typeId.'/artist/'.$artist->artistId)}}">{{$artist->name}}</a>
								@endforeach
							</div>
						</div>
					@endforeach
				&nbsp;<a href="{{url('admin/addProduct')}}">>>Add product</a><br>
				<a href="{{url('admin/type')}}"><b>2. Types</b></a><br>
				<a href="{{url('admin/artist')}}"><b>3. Artists</b></a><br>
				<a href="{{url('admin/comment')}}"><b>4. Comments</b></a><br>
				<a href="{{url('admin/order')}}"><b>5. Order</b></a><br>
				<a href="https://vchat.vn/home/support_v2.php"><b>6. Messeges</b></a><br>
				<a href="{{url('admin/password/')}}"><b>7. Change password</b></a>
				<br>
				<h5>Source</h5>
				<a href="https://www.ktown4u.com/"><img src="{{asset('public/images/ktown4u_logo.jpg')}}" alt="" width="50%"></a>
				<a href="https://kpopmart.com/"><img src="{{asset('public/images/logo_kpopmart.jpg')}}" alt="" width="50%"></a>
				
			</aside>
			<aside style="min-height: 600px!important;padding:20px 100px" class="col-md-10">
				<br>
				@yield('content')
			</aside>
		</section>
	</section>
</body>
</html>