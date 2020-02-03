@extends('index')
@section('title','Order')
@section('content')
<section class="content container-fluid" style="padding:0px 100px 50px 100px">
	<section class="logo">
		<div>Kpop Order Shop</div>
		<section>
			<a style="text-decoration: none" href="{{url('cart')}}">Order</a> > Infomation > Shipment > Payment
		</section>
	</section>
	<br>
	@if(session('alert'))
		<script>alert('Order Successfully!');location='home'</script>
	@endif

	<section class="container-fluid row">
		<aside class="col-md-6" id="info">
			<br>
			<div>Infomation</div>
			<section class="container-fluid" style="padding-left: 50px;padding-right: 50px;">
				<form method="post" action="{{url('updateinfo')}}">
					@csrf
					<table style="width: 100%;height: 300px;">
						<tr>
							<th>Fullname:</th>
							<td><input type="text" name="fullName" class="form-control" value="{{$member->fullName}}"></td>
						</tr>
						<tr>
							<th>Mobile:</th>
							<td><input type="tel" name="mobile" class="form-control" value="{{$member->mobile}}"></td>
						</tr>
						<tr>
							<th>Email:</th>
							<td><input type="email" name="email" class="form-control" value="{{$member->email}}"></td>
						</tr>
						<tr>
							<th>Address:</th>
							<td><textarea name="address" class="form-control">{{$member->address}}</textarea></td>
						</tr>
					</table>
					<section class="order-btn" style="text-align: center;">
						<input type="submit" class="btn" value="Update Info">
					</section>
				</form>
				
			</section>
		</aside>
			
			<aside class="col-md-3" id="shipping"><br>
				<form method="post">
				@csrf
				<div style="text-align: center;font-size: 18px">Shipment</div><br>
				<section style="margin-left: 15px;">
					@foreach($shipment as $shipment)
					<input type="radio" name="shipmentId" checked value="{{$shipment->shipmentId}}">&emsp;{{$shipment->shipMethod}} <br>
					@endforeach
				</section>
			</aside>
			<aside class="col-md-3" id="payment"><br>
				<div>Payment</div><br>
				<section style="margin-left: 15px;">
					@foreach($payment as $payment)
					<input type="radio" name="paymentId" checked value="{{$payment->paymentId}}">&emsp;{{$payment->payMethod}} <br>
					@endforeach
				</section>
				
			</aside>
	</section>
	<br>
	<section class="order-btn" style="text-align: center;">
		<input type="submit" value="Order" class="btn">
	</section>
	</form>
</section>
@endsection