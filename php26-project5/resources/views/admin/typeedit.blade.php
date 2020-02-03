@extends('admin/admincontrolpanel')
@section('content')


<section class="container-fluid" style="border: black thin solid;height: 150px; width: 340px;margin: 50px 220px;">
	<form method="post" style="width: 100%">
		@csrf
	<table style="height: 100px;width: 400px">
		@foreach($type as $type)
		<tr>
			<th>Type Name:</th>
			<td><input type="text" name="typeName" value="{{$type->typeName}}"></td>
		</tr>
		<tr>
			<th>Status:</th>
			<td><input type="number" name="status" value="{{$type->status}}" max="1" min="0"></td>
		</tr>
		@endforeach
	</table>
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-info" value="Update">&nbsp;&nbsp;&nbsp;<input onclick="history.back();" type="button" value="<<Back" class="btn btn-secondary">
	</form>
</section>
@endsection
