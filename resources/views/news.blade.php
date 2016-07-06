
@extends('layouts.app')

@section('page-title')
<title>{{$req->lang=="en" ? 'News at SINTUN' : '信豚动态——上海信豚实业有限公司'}}</title>
@endsection

@section('crum')<a href="{{$req->lang=="en" ? '/en' : '/'}}">{{$req->lang=="en" ? 'Home' : '首页'}}</a><i class="icon angle double right"></i><a href="#">{{$req->lang=="en" ? 'News' : '信豚动态'}}</a>@endsection

@section('main')
@parent
	<div class="sintun-news">
		<div class="ui divided list">
			@if(isset($articles))
			  @foreach($articles as $index => $article)
			    <div class="item"><a href="{{'/news/'.$article->id}}">{{$article->title}}<span class="date">{{substr($article->updated_at,0,10)}}</span></a></div>
			  @endforeach
			@endif
		</div>
	</div>
@endsection