@extends('index')
@section('title','Cart')
@section('content')
<section class="cart row" style="padding: 0px 50px;background-color: white;margin: 40px 150px;width: 1200px;min-height: 500px">
	@foreach($product as $product)
	<section class="col-md-6">
		<img src="{{asset('public/images/'.$product->productImage)}}" width="90%">
	</section>
	<section class="col-md-6" style="padding-top: 30px">
		<h3>{{$product->productName}}</h3><br>
		<table style="width: 100%;margin-left:15px;">
			<tr>
					<th>Price:</th>
				@if($product->productSaleOff==0)
					<th><h4 style="color:#A52A2A;">{{number_format($product->productPrice,0,',','.')}} VND &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
				@else
					<th><b class="icon-down-thin" style="color: red;font-size: 20px">{{$product->productSaleOff}} %</b>&nbsp;&nbsp;<strike>{{number_format($product->productPrice,0,',','.')}} VND</strike>
						<br><h4 style="color:#A52A2A;">{{number_format(($product->productPrice)*(100-($product->productSaleOff))/100,0,',','.')}} VND</h4></th>
				@endif
				<th>
					@if($product->status==0)
					<h5>Hết hàng</h5>
					@else
					<h5>Còn hàng</h5>
					@endif
				</th>
			</tr>
		</table>
		<hr>
	@endforeach
</section>
@endsection