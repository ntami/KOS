@extends('admin/admincontrolpanel')
@section('content')
<table style="text-align: center;width: 100%" class="table-bordered">
	<thead>
		<tr>
			<tr>
			<th width="30%">Images</th>
			<th width="30%">Name</th>
			<th width="20%">Price</th>
			<th width="20%">Edit</th>
		</tr>
	</thead>
	<tbody>
		@foreach($product as $product)
			<tr>
				<td><img width="50%" src="{{asset('public/images/'.$product->productImage)}}"></td>
				<td>{{$product->productName}}</td>
				<td>{{number_format($product->productPrice,0,',','.')}} vnd</td>
				<td><a class="btn btn-outline-info btn-sm" href="{{url('admin/productedit/'.$product->productId)}}">Edit</a>&nbsp;
			</tr>
		@endforeach
	</tbody>
</table>
@endsection