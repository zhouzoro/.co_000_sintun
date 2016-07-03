
@extends('layouts.app')

@section('page-title')
<title>{{$req->lang=="en" ? "About SINTUN" : "关于信豚——上海信豚实业有限公司"}}</title>@endsection
@section('main')
@parent
<div class="article row">
  <h2>上海信豚实业有限公司</h2>
  <p>成立于上海自贸区，由<a href='http://www.sintun.com' target='__blank'>广州信豚水产科技</a>、佛山信豚生物科技、上海道通机电三家公司股东于2016年年初联合创办，信豚团队自2010年始，就开始从事和越南多家公司合作的巴沙鱼进口业务，对越南原料鱼的生长环境、加工工艺、质量控制、行情变化等全产业链流程非常熟悉。</p>
  <p>上海信豚致力于水产食品的工艺与质量控制的研究，旨在通过努力，打造“信豚”品牌的行业专业性，用公司“信及豚鱼”的发展理念，引领中国消费者品牌饮食、安全饮食、健康饮食的水产消费理念。</p>
</div>@endsection