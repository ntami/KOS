@extends('index')
@section('title','Account')
@section('content')
<section class="content container-fluid row" style="padding:20px 100px 50px 100px">
	@foreach($members as $member)
	<section class="col-md-6" style="border-right: #D3D3D3 thin solid">
		<section class="head">
			<div class="col-md-2" style="margin: 20px 0px 20px 20px">
				<img src="{{asset('public/images/'.$member->avatar)}}" style="width: 100px;border-radius: 50%;" alt="">
			</div>
			<div class="col-md-6" style="margin: 50px 10px 40px 30px;color: green"><h4>{{$member->fullName}}</h4></div>
		</section>
		<section class="form-group" style="margin: 30px 10px 10px 60px">
			<form method="post" action="{{url('account')}}">
				@csrf
			<table style="width: 500px;height: 400px">
				<tr>
					<th>Username: </th>
					<td>&nbsp;{{$member->username}}</td>
				</tr>
				<tr>
					<th>Password:</th>
					<td>&nbsp;<a href="{{url('change')}}">Change</a></td>
				</tr>
				<tr>
					<th>Avatar:</th>
					<td>
						<input type="file" name="avatar">
					</td>
				</tr>
				<tr>
					<th>Fullname: </th>
					<td><input class="form-control" type="text" value="{{$member->fullName}}" name="fullName"></td>
				</tr>
				<tr>
					<th>Mobile: </th>
					<td><input class="form-control" type="text" value="{{$member->mobile}}" name="mobile"></td>
				</tr>
				<tr>
					<th>Email: </th>
					<td><input class="form-control" type="text" value="{{$member->email}}" name="email"></td>
				</tr>
				<tr>
					<th>Address:</th>
					<td><textarea name="address" cols="51" rows="2">{{$member->address}}</textarea></td>
				</tr>
			</table>
			<div style="text-align: center"><input type="submit" class="btn cart-btn" value="Update"></div>
			</form>
		</section>
	</section>
	@endforeach
	<section class="col-md-6">
		<h4 style="text-align: center;">My orders</h4>
		<br>
		<table class="table-bordered" style="width: 100%;text-align: center;margin-left: 20px;">
			<tr>
				<td class="col-md-2"><b>Order code</b></td>
				<td class="col-md-2"><b>Product</b></td>
				<td class="col-md-2"><b>Quantity</b></td>
				<td class="col-md-2"><b>Price</b></td>
				<td class="col-md-2"><b>Status</b></td>
			</tr>
			@foreach($orders as $order)
				<tr>
					<td>{{$order->orderId}}</td>
					<td class="col-md-2"><a href="{{url('detail/productId/'.$order->productId)}}"><img src="{{asset('public/images/'.$order->productImage)}}" width="70%" alt=""></a></td>
					<td class="col-md-2">{{$order->quantity}}</td>
					<td class="col-md-2">{{number_format($order->price,0,',','.')}}</td>
					<td class="col-md-2">
						@if($order->status==3) Processed
						@elseif($order->status==2) Processing
						@else No process
						@endif
					</td>
				</tr>	
			@endforeach
		</table>
	</section>
</section>	
@endsection
