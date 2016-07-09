
@extends('layouts.app')
@section('page-title')
<title>{{$req->lang=="en" ? "Products--SINTUN" : "产品展示——上海信豚实业有限公司"}}</title>@endsection
@section('crum')<a href="{{$req->lang=="en" ? '/en' : '/'}}">{{$req->lang=="en" ? 'Home' : '首页'}}</a><i class="icon angle double right"></i><a href="#">{{$req->lang=="en" ? 'Products' : '产品展示'}}</a>@endsection
@section('main')
<div class="products">
  @foreach($products as $i => $p)
    <div class="product-frame row">
      @if($i % 2 == 0)
        @if($p->img)
          <div class="col-md-6 col-sm-6 col-xs-6 product-container">
            <div class="product" id="{{$p->id}}">
              <a class="exit-full-screen control" onclick="exitPimgs({{$p->id}})"><i class="remove icon"></i></a>
              <div class="p-img" style="background: url({{$url = '/images/products/'.$p->id.'/'.$p->img->url}}); background-size: cover">
                <div class="ops">
                  <a class="pimg-toggle" onclick="showPimgs({{$p->id}})" data-pid="{{$p->id}}">查看图集</a>
                </div>
              </div>
            </div>
          </div>
        @endif
        <div class="col-md-6 col-sm-6 col-xs-6 p-intro">
          <h2 class="title">{{$p->name}}</h2>
          <p class="intro">{!!$p->description!!}</p>
        </div>
      @else
        <div class="col-md-6 col-sm-6 col-xs-6 p-intro">
          <h2 class="title">{{$p->name}}</h2>
          <p class="intro">{!!$p->description!!}</p>
        </div>
        @if($p->img)
          <div class="col-md-6 col-sm-6 col-xs-6 product-container">
            <div class="product" id="{{$p->id}}">
              <a class="exit-full-screen control" onclick="exitPimgs({{$p->id}})"><i class="remove icon"></i></a>
              <div class="p-img" style="background: url({{$url = '/images/products/'.$p->id.'/'.$p->img->url}}); background-size: cover">
                <div class="ops">
                  <a class="pimg-toggle" onclick="showPimgs({{$p->id}})" data-pid="{{$p->id}}">查看图集</a>
                </div>
              </div>
            </div>
          </div>
        @endif
      @endif
    </div>
  @endforeach
</div>@endsection