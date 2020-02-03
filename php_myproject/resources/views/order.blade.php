@extends('index')
@section('title','Cart')
@section('content')
<form method="post">
	@csrf
<section class="order" style="padding: 0px 50px;background-color: white;margin: 40px 150px;width: 1200px;height: 520px;">
	<section class="logo" style="text-align: center;">
		<h3>Logo</h3>
		<section>
			<a style="text-decoration: none" href="{{url('cart')}}">Order</a> > Infomation > Shipment
		</section>
	</section>
	<br>
	@if(session('alert'))
		<script>alert('Order Successfully!');location='/'</script>
	@endif
	<section class="row order" style="margin: 0px 30px;">
		<table style="width: 100%;">
			<tr style="background:#ffda47;top: 20px;height: 40px">
				<th style="text-align: center;">Infomation</th>
				<th style="text-align: center;">Shipment</th>
			</tr>
			<tr>
				<td><br></td>
				<td><br></td>
			</tr>
			<tr>
				<td>
					<section class="container-fluid" style="padding-left: 50px;padding-right: 50px;">
						<table style="width: 100%;height: 280px;">
							<tr>
								<th>Fullname:</th>
								<td><input type="text" name="fullName" class="form-control" value="<?=isset($fullName)?$fullName:''?>"></td>
							</tr>
							<tr>
								<th>Mobile:</th>
								<td><input type="tel" name="mobile" class="form-control" pattern="\d{10,13}" title="Số điện thoại không đúng" value="<?=isset($mobile)?$mobile:''?>"></td>
							</tr>
							<tr>
								<th>Email:</th>
								<td><input type="email" name="email" class="form-control" pattern=".+@.+(\.[a-z]{2,3}){1,2}" value="<?=isset($email)?$email:''?>"></td>
							</tr>
							<tr>
								<th>Address:</th>
								<td><textarea name="address" class="form-control"></textarea></td>
							</tr>
						</table>
					</section>
				</td>
				<td>
					<section style="margin-left: 15px;">
						@foreach($shipment as $shipment)
						<input type="radio" name="shipmentId" checked value="{{$shipment->shipmentId}}">&emsp;{{$shipment->shipMethod}} <br>
						@endforeach
					</section>
				</td>
			</tr>
		</table>
	<br>
</section>
<br>
<section class="order-btn" style="text-align: center;">
	<input type="submit" value="Order" class="btn">
</section>
</form>
@endsection