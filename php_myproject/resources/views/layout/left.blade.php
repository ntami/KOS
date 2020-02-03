<section class="left-content table table-hover">
	<?php $brands=DB::table('brands')->where('status',1)->get();?>
	<h3>BRANDS</h3>
	@foreach($brands as $brand)
		<a href="{{route('search',['$brandId'=>$brand->brandId])}}">{{$brand->brandName}}</a>
	@endforeach
</section>