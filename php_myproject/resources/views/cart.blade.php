@extends('index')
@section('title','Cart')
@section('content')
<section class="cart" style="padding: 0px 50px;
    background-color: white;
    margin: 40px 150px;
    width: 1200px;
">
@if(session('cart'))
<?php $products=DB::table('products')->whereIn('productId',array_keys(session('cart')))->get();
	//select*from products where id in (array_keys(session('cart')))
 ?>
 <br>
 <h3 style="text-align: center;font-weight: bold;">My Cart</h3>
 <form method="post" action="{{url('cart/update')}}" id="formCart">
 	@csrf
<section class="container-fluid" style="border: #C0C0C0 thin solid;">
	<section style="text-align: center;font-weight: bold;background:#ffda47;top: 20px;" class="cart cart-title row">
	<hr>
	<section class="col-md-2">Image</section>
	<section class="col-md-2">Name</section>
	<section class="col-md-2">Price</section>
	<section class="col-md-2">Quantity</section>
	<section class="col-md-2">Subtotal</section>
	<section class="col-md-2">Delete</section>
	<hr>
</section>
<br>
@foreach($products as $product)
	<section style="text-align: center;" class="cart item row">
		<section class="col-md-2"><a href="{{url('detail/'.$product->productId)}}"><img src="{{asset('public/images/'.$product->productImage)}}" width="80%" alt=""></a></section>
		<section class="col-md-2"><br><a href="{{url('detail/'.$product->productId)}}" class="img-name">{{$product->productName}}</a></section>
		<section class="col-md-2"><br>{{number_format(($product->productPrice)*(100-$product->productSaleOff)/100,0,',','.')}}</section>
		<section class="col-md-2"><br><input class="form-control form-control-sm" min="1"max="20" type="number" name="{{$product->productId}}" value='{{session("cart.$product->productId")}}'></section>
		<section class="col-md-2"><br>{{number_format(($product->productPrice)*(100-$product->productSaleOff)/100*session("cart.$product->productId"),0,',','.')}}</section>
		<section class="col-md-2"><br><a style="color:black;font-size: 20px;text-decoration:none!important;" class="glyphicon glyphicon-trash" href="{{url('cart/delete/'.$product->productId)}}"></a></section>
	</section>
	<hr>
@endforeach
	<section>
		Total:
	</section>
</section><br>

<section style="text-align: center;"><input class="btn cart-btn" type="submit" form="formCart" value="Update">&nbsp;|&nbsp;<a class="btn cart-btn" href="{{url('cart/order')}}">Order</a></section>
<br>
@else
	 <section style="text-align: center;" class="alert alert-danger">Your cart is empty</section>
</form>
@endif
</section>
@endsection