@extends('index')
@section('title','Home')
@section('content')

<section style="background: #FBEFF2;padding-bottom: 100px;">
	<section style="height: 700px;">
	  <a href="{{url('search/artist/2')}}"><img class="mySlides" src="{{asset('public/images/btsposter.jpg')}}" style="width:100%"></a>
	  <a href="{{url('search/artist/4')}}"><img class="mySlides" src="{{asset('public/images/nct.jpg')}}" style="width:100%;"></a>
	  <a href="{{url('search/artist/5')}}"><img class="mySlides" src="{{asset('public/images/twice.jpg')}}" style="width:100%"></a>
	</section>
		<script>
			var myIndex = 0;
			carousel();

		function carousel() {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  for (i = 0; i < x.length; i++) {
		    x[i].style.display = "none";  
		  }
		  myIndex++;
		  if (myIndex > x.length) {myIndex = 1}    
		  x[myIndex-1].style.display = "block";  
		  setTimeout(carousel, 1500); // Change image every 2 seconds
		}
		</script>
	<section style="padding: 0px 100px;">
		<div style="text-align: center;"><h2><u><b>SALE OFF</b></u></h2></div><br>
		<section class="container-fluid product-home">
			@foreach($saleOff as $product)
				<section class="product col-md-3" style="text-align: center;height: 330px">
					<section>
						<a class="img" href="{{url('detail/productId/'.$product->productId)}}"><img src="{{asset('public/images/'.$product->productImage)}}" width="70%"></a>
					</section>
					<section class="productName">
						<a class="img-name" href="{{url('detail/productId/'.$product->productId)}}"><h5 class="img-name">{{$product->productName}}</h5></a>
					</section>
					<section class="price">
						<b style="color: red;font-size: 20px;"><i class="icon-down-thin"></i>{{$product->productSaleOff}} %</b> <strike>{{number_format($product->productPrice,0,',','.')}} vnd </strike>
					</section>
					{{number_format(($product->productPrice)*(100-($product->productSaleOff))/100,0,',','.')}} vnd &nbsp;&nbsp;<a class="icon-cart-plus" href="{{url('cart/add/'.$product->productId)}}"></a>
				</section>
			@endforeach
		</section>
		<br><br>
		<div style="text-align: center;"><h2><u><b>NEW GOODS</b></u></h2></div><br><br>
		<section class="container-fluid product-home">
			@foreach($newproduct as $product)
				<section class="product col-md-3" style="text-align: center;height: 330px">
					<section>
						<a class="img" href="{{url('detail/productId/'.$product->productId)}}"><img src="{{asset('public/images/'.$product->productImage)}}" width="70%"></a>
					</section>
					<section class="productName">
						<a class="img-name" href="{{url('detail/productId/'.$product->productId)}}"><h5 class="img-name">{{$product->productName}}</h5></a>
					</section>
					<section class="price" style="font-weight: bold;">
						<b>Release: {{$product->productDate}}</b>
					</section>
					{{number_format($product->productPrice,0,',','.')}} vnd &nbsp;&nbsp;<a class="icon-cart-plus" href="{{url('cart/add/'.$product->productId)}}"></a>
				</section>
			@endforeach
		</section>
		<br><br>
	</section>
</section>

@endsection