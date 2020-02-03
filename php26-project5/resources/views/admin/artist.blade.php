@extends('admin/admincontrolpanel')
@section('content')
<section class="container-fluid">
	<?php $artist=DB::table('artists')->get();?>
		<form method="post" style="width: 100%;">
		@csrf
		<section style="padding-left: 137px">
			<input type="text" name="artist">&nbsp;<input type="submit" value="Add artist" class="btn btn-info">
		</section>
		</form>
		<br>	
		<section>
			<table class="table-bordered" style="width: 50%;text-align: center;">
				<tr style="height: 40px">
					<th>Artist code</th>
					<th>Artist Name</th>
					<th>Status</th>
					<th>Edit</th>
				</tr>
				@foreach($artist as $artist)
				<tr style="height: 40px">
					<td>{{$artist->artistId}}</td>
					<td>{{$artist->name}}</td>
					<td>{{$artist->status}}</td>
					<td><a href="{{url('admin/artistedit/'.$artist->artistId)}}">Edit</a></td>
				</tr>
				@endforeach
			</table><br>
		</section>
</section>
@endsection
