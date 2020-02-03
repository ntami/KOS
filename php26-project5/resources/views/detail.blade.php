@extends('index')
@section('title','Product')
@section('content')
@foreach($product as $product)
<section class="content product-detail row" style="padding:0px 100px 50px 100px">
	<section class="col-md-6">
		<img style="margin-bottom: 60px" src="{{asset('public/images/'.$product->productImage)}}" width="100%">
	</section>
	<section class="col-md-6" style="padding: 60px 60px 20px 60px">
		<h2>{{$product->productName}}</h2><br>
		<table style="width: 100%;margin-left:15px;">
			<tr>
					<th>Price:</th>
				@if($product->productSaleOff==0)
					<td><h4 style="color:#A52A2A;font-weight: bold;">{{number_format($product->productPrice,0,',','.')}} VND &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></td>
				@else
					<td><b class="icon-down-thin" style="font-weight: bold;color: red;font-size: 20px">{{$product->productSaleOff}} %</b>&nbsp;&nbsp;<strike>{{number_format($product->productPrice,0,',','.')}} VND</strike>
						<br><h4 style="color:#A52A2A;font-weight: bold;">{{number_format(($product->productPrice)*(100-($product->productSaleOff))/100,0,',','.')}} VND</h4></td>
				@endif
				<td>
					@if($product->status==0)
					<h4 style="font-weight: bold;">Out of stock</h4>
					@else
					<h4 style="font-weight: bold;">Now on stock</h4>
					@endif
				</td>
			</tr>
		</table>
		<hr>
		<section class="container-fluid" style="padding: 0px;">
			<article class="col-md-5">
			<table style="height: 150px;width: 100%">
			<tr>
				<th>Code:</th>
				<td>{{$product->productId}}</td>
			</tr>
			<tr>
				<th>Release:</th>
				<td>{{$product->productDate}}</td>
			</tr>
			
			@foreach($artist as $artist)
			<tr>
				<th>Artist:</th>
				<td><a href="{{url('search/artist/'.$artist->artistId)}}">{{$artist->name}}</a></td>
			</tr>
			@endforeach
			<tr>
				@foreach($type as $type)
				<th>Type:</th>
				<td>{{$type->typeName}}</td>
				@endforeach
			</tr>
			<tr>
				<th>Sales:</th>
				<td>{{$sales}}</td>
			</tr>
			
		</table>
		</article>
		<article class="col-md-7">
			<div style="font-weight: bold;">Description:</div>
			<div><?=htmlspecialchars_decode($product->productDescription)?></div>
		</article>
		</section>
		<hr>
		<section class="container-fluil">
		<form method="post" action="{{url('cart/change/'.$product->productId)}}">
			@csrf
			<article class="col-md-8 detail-btn">
			@if($product->status==1)
				<b>Quantity:</b>&emsp;&emsp;&emsp;<input style="width: 80px;" type="number" min="1" max="100" name="number_order" value="1">&emsp;&emsp;&emsp;
			<input type="submit" class="btn" value="Add to cart">
			@else <div style="margin: 10px;color:#191970;"><b>Unavailable</b></div>
			@endif
			</article>
			<article class="col-md-2"><a href="#cmt" class="icon-comment"></a><b>{{$cmts}}</b></article>
			<article class="col-md-2"><a href="{{url('like/productId/'.$product->productId)}}" class="glyphicon glyphicon-heart"></a>&emsp;<b>{{$product->productLike}}</b></article>
		</form>
	</section><br><br><hr>
		<section class="container-fluid" style="padding: 15px;">
			<b>Share this product to SNS</b>&emsp;&emsp;
			<a href=""><img src="{{asset('public/images/ic-sns-facebook.png')}}" width="30px" alt=""></a>&emsp;
			<a href=""><img src="{{asset('public/images/ic-sns-twitter.png')}}" width="30px" alt=""></a>&emsp;
			<a href=""><img src="{{asset('public/images/instagram.png')}}" width="30px" alt=""></a>
		</section>
	</section>
	<br><br>
	<form id="cmt" method="post" action="{{url('comment/productId/'.$product->productId)}}" style="width: 100%">
	@csrf
	<section class="container-fluid cmt row">
		<section style="border-right:#D3D3D3 thin solid" class="col-md-6 detail-btn">
			@if(session('user'))
				<section class="row" style="height: 60px;">
					<article class="col-md-2"><img src="{{asset('public/images/'.$members->avatar)}}" width="80%" style="border-radius: 50%" alt=""></article>
					<article class="col-md-4" style="padding: 20px 0;"><b>{{$members->username}}</b></article>
					<article class="col-md-6" style="padding: 20px 0;">
						<div class="bigstars">
							<div class="rateit" data-rateit-value="5" data-rateit-starwidth="16" data-rateit-starheight="16" data-rateit-min="0" data-rateit-max="5">
							</div>
						</div>
					</article>
				</section><br>
				<textarea name="textarea" cols="300" rows="5"></textarea>
				<script>CKEDITOR.replace('textarea')</script><br>
				<input type="submit" class="btn" name="cmt" value="Post" style="margin-left: 500px;width: 100px;">
				<br><br><br>
			@else
				&nbsp;&nbsp;<i style="font-size: 20px" class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;<b>Write comment - You need to <a href="{{url('login')}}">login</a>!</b><br><br>
			@endif
		</section>
		</form>
		<section class="col-md-6">
				@foreach($comments as $comment)
				<table>
					<tr>
						<td class="col-md-2"><img src="{{asset('public/images/'.$comment->avatar)}}" width="80%" style="border-radius: 50%" alt=""></td>
						<td class="col-md-6"><b>{{$comment->username}}</b></td>
						<td class="col-md-3" colspan="2">{{$comment->commentTime}}</td>
					</tr>
					<tr>
						<td class="col-md-2"></td>
						<td class="col-md-6" colspan="2"><?=htmlspecialchars_decode($comment->comment)?></td>
						<td class="col-md-3"><a href="{{url('likedislike/like/'.$comment->commentId)}}" class="icon-thumbs-up"></a>{{$comment->commentLike}}&nbsp;<a href="{{url('likedislike/dislike/'.$comment->commentId)}}" class="icon-thumbs-down"></a>{{$comment->commentDislike}}</td>
					</tr>
				</table>
				<hr>
				@endforeach
		</section>
		<hr>
	</section>
</section>
@endforeach
@endsection
