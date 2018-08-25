@extends('layouts.default')
@section('title',$user->name)
@section('content')
<div class="row">
	<div class="col-md-offset-2 col-md-8">
		<div class="col-md-12">
			<div class="col-md-offset-2 col-md-8">
				<section class="user_info">
					<!-- 通过这种方式，将$user变量传递给_user_info视图 -->
					@include('shared._user_info',['user'=>$user])
				</section>
			</div>
		</div>
	</div>
</div>
@stop