@extends('admin/admincontrolpanel')
@section('content')
<section class="container-fluid">
	<?php $type=DB::table('types')->get();?>
		<form method="post" style="width: 100%;">
		@csrf
		<section style="padding-left: 137px">
			<input type="text" name="type">&nbsp;<input type="submit" value="Add type" class="btn btn-info">
		</section>
		</form>
		<br>	
		<section>
			<table class="table-bordered" style="text-align: center;width: 50%;">
				<tr style="height: 40px">
					<th>Type code</th>
					<th>Type Name</th>
					<th>Status</th>
					<th>Edit</th>
				</tr>
				@foreach($type as $type)
				<tr style="height: 40px">
					<td>{{$type->typeId}}</td>
					<td>{{$type->typeName}}</td>
					<td>{{$type->status}}</td>
					<td><a href="{{url('admin/typeedit/'.$type->typeId)}}">Edit</a></td>
				</tr>
				@endforeach
			</table><br>
		</section>
</section>
@endsection
