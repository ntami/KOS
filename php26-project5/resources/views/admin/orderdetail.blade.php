@extends('admin/admincontrolpanel')
@section('content')
<form method="post">
@csrf
	@foreach($order as $order)
	<section style="text-align: center;">
		Status: <input type="number" name="orderStatus" min="1" max="3" value="{{$order->status}}">&nbsp;<input type="submit" name="submit" value="Update" class="btn btn-info">
		<br>(1 : No Process; 2 : Processing; 3 : Processed)
	</section><hr>
	@endforeach
</form>
<table>
	@foreach($product as $product)
	<thead>
		<tr>
			<tr>
			<th width="20%">Images</th>
			<th width="20%">Name</th>
			<th width="20%">Quantity</th>
			<th width="20%">Price</th>
		</tr>
	</thead>
	<tbody>
			<tr>
				<td><img width="50%" src="{{asset('public/images/'.$product->productImage)}}"></td>
				<td>{{$product->productName}}</td>
				<td>{{$product->quantity}}</td>
				<td>{{number_format($product->productPrice,0,',','.')}} vnd</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection