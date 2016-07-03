
@extends('layouts.app')
@section('main')
@parent
@include('contents.carousel')
<div class="home-below row">
  <div class="col-md-3 col-sm-3 col-xs-3"><a title="深海鲈鱼" href="/products#3" style="background: url('/images/p1.jpg');background-size: cover" class="poster"></a></div>
  <div class="col-md-3 col-sm-3 col-xs-3"><a title="鸭嘴鱼" href="/products#2" style="background: url('/images/p2.jpg');background-size: cover" class="poster"></a></div>
  <div class="col-md-3 col-sm-3 col-xs-3"><a title="巴沙鱼柳" href="/products#1" style="background: url('/images/p3.jpg');background-size: cover" class="poster"></a></div>
  <div class="col-md-3 col-sm-3 col-xs-3"><a title="鱼子酱" href="/products#4" style="background: url('/images/p4.jpg');background-size: cover" class="poster"></a></div>
</div>
<!--div class="home-below row">
    <div class="news-list fix-size">
      <h3>信豚动态</h3>
      <div class="ui divided list">
        @if(isset($articles))
          @foreach($articles as $index => $article)
            <div class="item"><a href="{{'/news/'.$article->id}}">{{$article->title}}<span class="date">{{substr($article->updated_at,0,10)}}</span></a></div>
          @endforeach
        @endif
        <div class="item"><a href="/news">更多</a></div>
      </div>
  </div>
</div-->
@endsection