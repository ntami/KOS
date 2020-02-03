@extends('admin/admincontrolpanel')
@section('content')
<h3 style="text-align: center;">EDIT PRODUCT</h3>
<section>
	@foreach($product as $product)
	<form method="post">
		@csrf
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Artist:</th>
					<td>
						<select name="artistId" class="form-control">
							@foreach($artists as $artist)
							<option value="{{$artist->artistId}}" <?=$product->artistId!=$artist->artistId?:'selected'?>>{{$artist->name}}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<th>Product Type:</th>
					<td>
						<select name="typeId" class="form-control">
							@foreach($types as $type)
							<option value="{{$type->typeId}}" <?=$product->typeId!=$type->typeId?:'selected'?>>{{$type->typeName}}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<th>Product Name: </th>
					<td><input type="text" name="productName" value="{{$product->productName}}" style="width: 400px"></td>
				</tr>
				<tr>
					<th>Release Date:</th>
					<td><input type="datetime" name="productDate" value="{{$product->productDate}}"></td>
				</tr>
				<tr>
					<th>Product Price: </th>
					<td><input type="text" name="productPrice" value="{{$product->productPrice}}"></td>
				</tr>
				<tr>
					<th>Sale Off:</th>
					<td><input type="number" name="productSaleOff" value="{{$product->productSaleOff}}"></td>
				</tr>
				<tr>
					<th>Product Description: </th>
					<td><textarea name="productDescription" cols="100" rows="3">{{$product->productDescription}}</textarea><script>CKEDITOR.replace('productDescription')</script></td>
				</tr>
				<tr>
					<th>Status: </th>
					<td><input type="number" min="0" max="1" name="status" value="{{$product->status}}"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
					<input type="submit" value="Update" class="btn btn-success">&nbsp;<input onclick="history.back();" type="botton" value="<<Back" class="btn btn-secondary"></td>
				</tr>
			</thead>
		</table>
	</form>
	@endforeach
</section>
@endsection