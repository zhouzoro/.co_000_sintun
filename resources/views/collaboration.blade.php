
@extends('layouts.app')
@section('page-title')
<title>{{$req->lang=="en" ? "Commercial collaboration -- SINTUN" : "商业合作——上海信豚实业有限公司"}}</title>@endsection

@section('crum')<a href="{{$req->lang=="en" ? '/en' : '/'}}">{{$req->lang=="en" ? 'Home' : '首页'}}</a><i class="icon angle double right"></i><a href="#">{{$req->lang=="en" ? 'Collaboration' : '商业合作'}}</a>@endsection

@section('main')
@parent
<div class="article">
	{!!$content!!}
</div>
@endsection