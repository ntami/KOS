<header class="container-fluid row " class="header" id="header" style="margin: auto;">
	<section class="col-md-2" style=" left: 30px;margin: 7px;">
		<a style="color: white;text-decoration: none!important ;font-size: 40px;font-family:Courier New, Courier, monospace;" href="{{url('home')}}">KpopOS</a>
	</section>
	<nav class="col-md-7" style="padding: 15px;">
		<?php $artist=DB::table('artists')->where('status',1)->get();?>
		@foreach($artist as $artist)
			<div class="father">
				<a href="{{url('search/artist/'.$artist->artistId)}}">{{$artist->name}}&nbsp;</a>
				<div class="son">
					<?php $type=DB::table('types')->where('status',1)->get();?>
					@foreach($type as $type)
					<a href="{{url('search/artist/'.$artist->artistId.'/type/'.$type->typeId)}}">{{$type->typeName}}</a>
					@endforeach
				</div>
			</div>
		@endforeach
	</nav>
	<form class="icon row" action="{{url('search/keyword')}}" method="post" style="margin-left:-125px;">
		@csrf
		<input type="text" name="keyword" placeholder="Type to search" ">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		<a href="{{url('cart')}}" class="icon-cart"></a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		@if(session('user'))
			<a href="{{url('account/'.session('user'))}}" style="color: green" class="glyphicon glyphicon-user"></a>&emsp;
			<section style="color: white">[<a href="{{url('logout')}}">Logout</a>]</section>
		@else
			<a href="{{url('login')}}" class="glyphicon glyphicon-user"></a>
		@endif
	</form>
</header>