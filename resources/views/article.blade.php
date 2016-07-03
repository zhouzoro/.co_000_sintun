
@extends('layouts.app')

@section('page-title')
<title>{{$req->lang=="en" ? $post->title."--SINTUN" : $post->title."——上海信豚实业有限公司"}}</title>@endsection
@section('main')
@parent
<div class="article">
  <h2 class="title">{!!$post->title!!}</h2>
  <div class="meta">
    <label class="date">{!!$post->created_at!!}</label>
    <label class="author">{!!$post->author!!}</label>
  </div>
  <div class="content">{!!$post->content!!}</div>
</div>@endsection