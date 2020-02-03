@extends('admin/admincontrolpanel')
@section('content')
<table style="width: 100%;text-align: center;" class="table-bordered">
	<thead>
		<tr>
			<th width="10%">Code</th>
			<th width="20%">Fullname</th>
			<th width="20%">Mobile</th>
			<th width="20%">Address</th>
			<th width="20%">Status</th>
			<th width="10%">Edit</th>
		</tr>
	</thead>
	<tbody>
		@foreach($order as $order )
		<tr>
			<td>{{$order->orderId}}</td>
			<td>{{$order->fullName}}</td>
			<td>{{$order->mobile}}</td>
			<td>{{$order->address}}</td>
			<td>
				@if($order->status==1) No process
				@elseif($order->status==2) Processing
				@else Processed
				@endif
			</td>
			<td><a href="{{url('admin/orderdetail/'.$order->orderId)}}" class="btn">Edit</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection