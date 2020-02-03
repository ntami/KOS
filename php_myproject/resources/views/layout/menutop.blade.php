<div class="menutop">
	<nav>
		<ul>
			<?php $menu=DB::table('menu')->where('status',1)->get();?>
			@foreach($menu as $menu)
			<li>
				<a href="{{url('search/menu/'.$menu->menuId)}}">
					<img src="{{asset('public/images/'.$menu->menuIcon)}}" width="16%"><br>
			{{$menu->menuName}}
				</a>
				<ul>
					<?php $submenu=DB::table('sub-menu')->where('menuId',$menu->menuId)->where('status',1)->get();?>
					@foreach($submenu as $submenu)
						<li>
							<a href="{{url('search/menu/'.$menu->menuId.'/submenu/'.$submenu->submenuId)}}">{{$submenu->submenuName}}</a>
						</li>
					@endforeach
				</ul>
			</li>
			@endforeach
			<li>
				<a href="">
					<img src="{{asset('public/images/news.png')}}" width="16%"><br>Tin công nghệ
				</a>
			</li>
			<li>
				<a href="">
					<img src="{{asset('public/images/contact.png')}}" width="16%"><br>Liên hệ
				</a>
			</li>
		</ul>
	</nav>
</div>