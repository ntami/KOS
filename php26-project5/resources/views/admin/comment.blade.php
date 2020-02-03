@extends('admin/admincontrolpanel')
@section('content')
<table class="table-bordered" style="text-align: center;">
	<thead>
		<tr>
			<tr>
			<th width="20%">Images</th>
			<th width="30%">Name</th>
			<th width="30%">Comment</th>
			<th width="20%">Status/Edit</th>
		</tr>
	</thead>
	<tbody>
		@foreach($product as $product)
			<tr>
				<td><img width="50%" src="{{asset('public/images/'.$product->productImage)}}"></td>
				<td>{{$product->productName}}</td>
				<td>{{$product->comment}}</td>
				<td>{{$product->status}}&nbsp;/&nbsp;<a href="{{url('admin/onoff/'.$product->commentId)}}">Change</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection