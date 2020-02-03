@extends('index')
@section('title','Login')
@section('content')
<section style="padding: 0px 130px">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="{{asset('public/images/banner-trang-chu-2.jpg')}}" class="d-block w-100" alt="Second slide">
	    </div>
	    <div class="carousel-item">
	      <img src="{{asset('public/images/banner-trang-chu-3.jpg')}}" class="d-block w-100" alt="Third slide">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<br>
	<div class="container-fluid" style="height: 450px;background-color: white;padding: 1px">
		<div style="width: 1200px;height: 35px; background-color:#FFD700;margin: 30px 30px 0px;">
			<a href=""><i style="font-size: 20px;color: black">SẢN PHẨM MỚI ></i></a>
		</div>
		<div style="margin: 0;">
			<section class="showproduct row" style="padding: 0px 45px;">
				@foreach($newproduct as $rs)
					<section class="product col-md-2" style="text-align: center;">
						<section style="height: 180px">
							<a class="img-detail" id="img" href="{{url('detail/'.$rs->productId)}}"><img src="{{asset('public/images/'.$rs->productImage)}}" width="100%"></a>
						</section>
						<section class="productName" style="height: 80px">
							<a class="img-name" href="{{url('detail/'.$rs->productId)}}">{{$rs->productName}}</a>
						</section>
						@if($rs->productSaleOff==0)
							<section class="price" style="font-weight: bold;height: 35px">
								{{number_format($rs->productPrice,0,',','.')}} vnd
							</section>
						@else
							<section class="price" >
								<i class="icon-down-thin" style="font-weight: bold;color: red">{{$rs->productSaleOff}}%</i>&nbsp;<strike>{{number_format($rs->productPrice,0,',','.')}}<br></strike>&nbsp;<a style="font-weight: bold;">{{number_format(($rs->productPrice)*(100-($rs->productSaleOff))/100,0,',','.')}} vnd</a>&nbsp;
							</section>
						@endif
						@if($rs->status==1)
							<a class="btn btn-add" href="{{url('cart/add/'.$rs->productId)}}">Mua ngay</a>
						@else
						@endif
					</section>
				@endforeach
			</section>
		</div>
	</div>
	<br>
	<div class="container-fluid" style="height: 450px;background-color: white;padding: 1px">
		<div style="width: 1200px;height: 35px; background-color:#FFD700;margin: 30px 30px 0px;">
			<a href=""><i style="font-size: 20px;color: black">SẢN PHẨM KHUYỄN MÃI ></i></a>
		</div>
		<div style="margin: 0;">
			<section class="showproduct row" style="padding: 0px 45px;">
				@foreach($saleOff as $rs)
					<section class="product col-md-2" style="text-align: center;">
						<section style="height: 180px">
							<a class="img-detail" id="img" href="{{url('detail/'.$rs->productId)}}"><img src="{{asset('public/images/'.$rs->productImage)}}" width="100%"></a>
						</section>
						<section class="productName" style="height: 80px">
							<a class="img-name" href="{{url('detail/'.$rs->productId)}}">{{$rs->productName}}</a>
						</section>
						@if($rs->productSaleOff==0)
							<section class="price" style="font-weight: bold;height: 35px">
								{{number_format($rs->productPrice,0,',','.')}} vnd
							</section>
						@else
							<section class="price" >
								<i class="icon-down-thin" style="font-weight: bold;color: red">{{$rs->productSaleOff}}%</i>&nbsp;<strike>{{number_format($rs->productPrice,0,',','.')}}<br></strike>&nbsp;<a style="font-weight: bold;">{{number_format(($rs->productPrice)*(100-($rs->productSaleOff))/100,0,',','.')}} vnd</a>&nbsp;
							</section>
						@endif
						@if($rs->status==1)
							<a class="btn btn-add" href="{{url('cart/add/'.$rs->productId)}}">Mua ngay</a>
						@else
						@endif
					</section>
				@endforeach
			</section>
		</div>
	</div>
</section>
@endsection