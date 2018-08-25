<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','默认标题')</title>
	<!-- 所有前端内容，都会被npm run watch-poll编译到public/css/app.css或者app.js|.scss记录的是css的各种依赖关系 -->
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	@include('layouts._header')
	
	<div class="container">
		@include('shared._messages')
		@yield('content')
		@include('layouts._footer')
	</div>
</body>
</html>