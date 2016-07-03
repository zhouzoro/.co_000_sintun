
@extends('layouts.app')
@section('page-title')
<title>{{$req->lang=="en" ? "Products--SINTUN" : "产品展示——上海信豚实业有限公司"}}</title>@endsection
@section('crum')<a href="/">首页</a><i class="icon angle double right"></i><a href="#">产品展示</a>@endsection
@section('main')
<div class="products">
  <div id="1" class="product-frame row">
    <div class="col-md-6 col-sm-6 col-xs-6 product-container">
      <div class="product"><a class="exit-full-screen control"><i class="remove icon"></i></a>
        <div class="p-img"><img src="/images/products/1/1.jpg" class="active"/></div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 p-intro">
      <h2 class="title">巴沙鱼柳</h2>
      <p class="intro">为东南亚国家特有淡水鱼类，无骨，无肌间小刺，而且富含鱼类特有的不饱和脂肪酸、蛋白等，适合所有人群食用。信豚公司与多家越南大型工厂合作，产地直采，另外设有海外QC团队，源头控制产品质量。</p>
    </div>
  </div>
  <div id="2" class="product-frame row">
    <div class="col-md-6 col-sm-6 col-xs-6 p-intro">
      <h2 class="title">鸭嘴鱼</h2>
      <p class="intro">学名：美国匙吻鲟（又名鸭嘴鲟），英文名：Polyodonspathala ，原产美国密西西比河流域，3亿年之前就在地球生活，并存留下来。其吻特别长，呈扁平状，烹饪后在餐桌上着实是一道与众不同的靓丽风景。</p>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 product-container">
      <div class="product"><a class="exit-full-screen control"><i class="remove icon"></i></a>
        <div class="p-img"><img src="/images/products/2/1.jpg" class="active"/></div>
      </div>
    </div>
  </div>
  <div id="3" class="product-frame row">
    <div class="col-md-6 col-sm-6 col-xs-6 product-container">
      <div class="product"><a class="exit-full-screen control"><i class="remove icon"></i></a>
        <div class="p-img"><img src="/images/products/3/1.jpg" class="active"/></div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 p-intro">
      <h2 class="title">深海鲈鱼</h2>
      <p class="intro">信豚公司自有工厂，精选活鱼原料，腌制调味，尤为适合烧烤等餐饮及商超渠道。</p>
    </div>
  </div>
  <div id="4" class="product-frame row">
    <div class="col-md-6 col-sm-6 col-xs-6 p-intro">
      <h2 class="title">鱼子酱 SINTUN CAVIAR</h2>
      <p class="intro">晶莹剔透的软黄金，有着与生俱来的高贵优雅的气息，很长时期以来，让世界为之倾倒。鱼子酱（Caviar），又称鱼籽酱，在波斯语中意为鱼卵，严格来说，只有鲟鱼卵才可称为鱼子酱。上佳的鱼子酱颗粒饱满圆滑，色泽透明清亮，越是高级的鱼子酱，颗粒越是圆润饱满，色泽清亮透明，甚至微微泛着金黄的光泽，因此人们也习惯了将鱼子酱比喻作“黑色的黄金”。鱼子酱一直是欧美国家餐桌上最奢侈的享受，过去更只是皇室里的佳肴。伴随人们对高端食材的追求，鱼子酱特有的优雅文化，以及所含脂肪酸能够有效滋润营养皮肤，现在也成为都市时尚人士味蕾的首选。</p>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6 product-container">
      <div class="product"><a class="exit-full-screen control"><i class="remove icon"></i></a>
        <div class="p-img"><img src="/images/products/4/1.jpg" class="active"/></div>
      </div>
    </div>
  </div>
</div>@endsection