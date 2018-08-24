<!-- 导航栏有较多代码，为了方便维护，应该单独拿出 -->
<!-- 导航栏，bootstrap预设有各种不同的class（如container、navbar等）样式-->
	<header class="navbar navbar-fixed-top navbar-inverse">
		<div class='container'>
			<div class="col-md-offset-1 col-md-10">
				<a href="/" id='logo'>Sample App</a>
				<nav>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="{{route('help')}}">帮助</a></li>
						<li><a href="#"></a>登陆</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>	
<!-- header/nav都是HTML5提供的语义标签，作用与div一样，只是方便区分和SEO -->