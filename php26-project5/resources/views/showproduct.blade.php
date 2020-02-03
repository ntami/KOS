@extends('index')
@section('title','Home')
@section('content')
	<section class="content container-fluid showproduct" style="padding:40px 100px 50px 100px;">
	@if(count($product)==0)
		<section class="alert alert-info">No product!</section>
	@else
		@foreach($product as $rs)
			<section class="product col-md-3" style="text-align: center;margin-top: 10px;">
				<br>
				<section>
					<a class="img" id="img" href="{{url('detail/productId/'.$rs->productId)}}"><img src="{{asset('public/images/'.$rs->productImage)}}" width="70%"></a>
				</section>
				<section class="productName">
					<a class="img-name" href="{{url('detail/productId/'.$rs->productId)}}"><h5 class="img-name">{{$rs->productName}}</h5></a>
				</section>
				@if($rs->productSaleOff==0)
					<section class="price" style="font-weight: bold;">
						{{number_format($rs->productPrice,0,',','.')}} vnd
					</section>
				@else
					<section class="price" >
						<i class="icon-down-thin" style="font-weight: bold;color: red">{{$rs->productSaleOff}}%</i>&nbsp;<strike>{{number_format($rs->productPrice,0,',','.')}}<br></strike>&nbsp;<a style="font-weight: bold;">{{number_format(($rs->productPrice)*(100-($rs->productSaleOff))/100,0,',','.')}} vnd</a>&nbsp;
					</section>
				@endif
				@if($rs->status==1)
							<a id="icon" class="icon-cart-plus" href="{{url('cart/add/'.$rs->productId)}}"></a>
						@else <br>
						@endif
			</section>
		@endforeach
	@endif
	<br><br><br><br>
</section>
@endsection
