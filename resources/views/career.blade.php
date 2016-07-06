
@extends('layouts.app')

@section('page-title')
<title>{{$req->lang=="en" ? "Join SINTUN" : "加入我们——上海信豚实业有限公司"}}</title>@endsection


@section('crum')<a href="{{$req->lang=="en" ? '/en' : '/'}}">{{$req->lang=="en" ? 'Home' : '首页'}}</a><i class="icon angle double right"></i><a href="#">{{$req->lang=="en" ? 'Career' : '加入我们'}}</a>@endsection

@section('main')
@parent

<div class="article">
	{!!$content!!}
</div>
@endsection