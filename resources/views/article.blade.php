
@extends('layouts.app')

@section('page-title')
<title>{{$req->lang=="en" ? $post->title."--SINTUN" : $post->title."——上海信豚实业有限公司"}}</title>@endsection
@section('crum')<a href="{{$req->lang=="en" ? '/en' : '/'}}">{{$req->lang=="en" ? 'Home' : '首页'}}</a><i class="icon angle double right"></i><a href="{{$req->lang=="en" ? '/en/news' : '/news'}}">{{$req->lang=="en" ? 'News' : '信豚动态'}}</a><i class="icon angle double right"></i><a href="#">{{substr($post->title,0,24).'...'}}</a>@endsection
@section('main')
@parent
<div class="article">
  <h2 class="title">{{$post->title}}</h2>
  <div class="meta">
    <label class="date">{{substr($post->updated_at,0,10)}}</label>
    <label class="author">{{$post->author}}</label>
  </div>
  <div class="content">{!!$post->content!!}</div>
</div>@endsection