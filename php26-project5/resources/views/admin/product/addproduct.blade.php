@extends('admin/admincontrolpanel')
@section('content')
<h3 style="text-align: center;">ADD PRODUCT</h3>
	@if(session('alert'))
		<script>alert('A new product was be added!');location='.'</script>
	@endif
<section>
	<?php $artists=DB::table('artists')->where('status',1)->get();
		$types=DB::table('types')->where('status',1)->get(); ?>
	<form method="post">
		@csrf
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Artist:</th>
					<td>
						<select name="artistId" class="form-control">
							@foreach($artists as $artist)
							<option value="{{$artist->artistId}}">{{$artist->name}}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<th>Product Type:</th>
					<td>
						<select name="typeId" class="form-control">
							@foreach($types as $type)
							<option value="{{$type->typeId}}">{{$type->typeName}}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<th>Product Name: </th>
					<td><input type="text" name="productName" style="width: 400px"></td>
				</tr>
				<tr>
					<th>Product Image:</th>
					<td><input type="file" name="productImage" style="width: 400px;"></td>
				</tr>
				<tr>
					<th>Release Date:</th>
					<td><input type="datetime" name="productDate" value="2019-08-10"></td>
				</tr>
				<tr>
					<th>Product Price: </th>
					<td><input type="text" name="productPrice"></td>
				</tr>
				<tr>
					<th>Sale Off:</th>
					<td><input type="number" name="productSaleOff" value="0"></td>
				</tr>
				<tr>
					<th>Product Description: </th>
					<td><textarea name="productDescription" cols="100" rows="3"></textarea><script>CKEDITOR.replace('productDescription')</script></td>
				</tr>
				<tr>
					<th>Status: </th>
					<td><input type="number" min="0" max="1" name="status" value="1"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
					<input type="submit" value="Update" class="btn btn-success">&nbsp;<input onclick="history.back();" type="botton" value="<<Back" class="btn btn-secondary"></td>
				</tr>
			</thead>
		</table>
	</form>
</section>
@endsection