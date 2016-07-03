
@extends('layouts.app')
@section('main')
@parent
@include('contents.carousel')
<div class="home-below row">
  <div class="col-md-3 col-sm-3 col-xs-3"><a href="/products" class="poster"><img src="images/p1.jpg"/></a></div>
  <div class="col-md-3 col-sm-3 col-xs-3"><a href="/products" class="poster"><img src="images/p2.jpg"/></a></div>
  <div class="col-md-3 col-sm-3 col-xs-3"><a href="/products" class="poster"><img src="images/p3.jpg"/></a></div>
  <div class="col-md-3 col-sm-3 col-xs-3"><a href="/products" class="poster"><img src="images/p4.jpg"/></a></div>
</div>
<div class="home-below row">
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="news-list fix-size">
      <h3>信豚动态</h3>
      <div class="ui divided list">
        <div class="item"><a>新闻动态新闻动态新闻动态新闻动态<span class="date">2016-06-06</span></a></div>
        <div class="item"><a>新闻动态新闻动态新闻动态新闻动态<span class="date">2016-06-06</span></a></div>
        <div class="item"><a>新闻动态新闻动态新闻动态新闻动态<span class="date">2016-06-06</span></a></div>
        <div class="item"><a>新闻动态新闻动态新闻动态新闻动态<span class="date">2016-06-06</span></a></div>
        <div class="item"><a>新闻动态新闻动态新闻动态新闻动态<span class="date">2016-06-06</span></a></div>
        <div class="item"><a>新闻动态新闻动态新闻动态新闻动态<span class="date">2016-06-06</span></a></div>
        <div class="item"><a>新闻动态新闻动态新闻动态新闻动态<span class="date">2016-06-06</span></a></div>
        <div class="item"><a>新闻动态新闻动态新闻动态新闻动态<span class="date">2016-06-06</span></a></div>
        <div class="item"><a>更多</a></div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
    <div class="product-feature fix-size">
      <h3>特色产品</h3>
      <div class="ui devided list"></div>
    </div>
  </div>
</div>@endsection