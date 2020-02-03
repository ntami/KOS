@extends('index')
@section('title','Home')
@section('content')
	<section class="left col-md-2">
			<section class="left-content table table-hover">
				<h3>BRANDS</h3>
				@foreach($brands as $brand)
					<a href="">{{$brand->brandName}}</a>
				@endforeach
			</section>
	</section>
	<section class="content col-md-8">
		<section class="showproduct row">
			@if(count($product)==0)
				<section class="col-md-12 alert alert-info" style="height: 50px">No product!</section>
			@else
				@foreach($product as $rs)
					<section class="product col-md-3" style="text-align: center;">
						<section style="height: 180px">
							<a class="img-detail" id="img" href="{{url('detail/'.$rs->productId)}}"><img src="{{asset('public/images/'.$rs->productImage)}}" width="100%"></a>
						</section>
						<br>
						<section class="productName" style="height: 60px">
							<a class="img-name" href="{{url('detail/'.$rs->productId)}}">{{$rs->productName}}</a>
						</section>
						@if($rs->productSaleOff==0)
							<section class="price" style="font-weight: bold;height: 35px">
								{{number_format($rs->productPrice,0,',','.')}} vnd
							</section>
						@else
							<section class="price" style="font-weight: bold;height: 35px">
								<i class="icon-down-thin" style="font-weight: bold;color: red">{{$rs->productSaleOff}}%</i>&nbsp;<strike>{{number_format($rs->productPrice,0,',','.')}}<br></strike>&nbsp;<a style="font-weight: bold;">{{number_format(($rs->productPrice)*(100-($rs->productSaleOff))/100,0,',','.')}} vnd</a>&nbsp;
							</section>
						@endif
						@if($rs->status==1)
							<a class="btn btn-add" href="{{url('cart/add/'.$rs->productId)}}">Mua ngay</a>
						@else
						@endif
					</section>
				@endforeach
			@endif
		</section>
	</section>
@endsection