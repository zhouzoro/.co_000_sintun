<div class="ui header">
  <h3 class="content">产品图集:{{$p->name}}</h3>
</div>

<div class="row rearange ps">
  @foreach ($pimgs as $i => $pi)
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 img-container">
      <div class="img">
        <img src="{{'/images/products/'.$pi->pid.'/'.$pi->url}}" alt="">
        <div class="ops">
          <a class="red" href="#" title="" onclick="deleteImg(this)" data-name="{{$pi->url}}" data-id="{{$pi->id}}" data-url="{{'/delete_imgs/'.$pi->id}}">删除</a>
          <a href="#" title="" onclick="replaceImg(this)" data-name="{{$pi->url}}" data-url="{{'/upload/images/products/'.$pi->pid}}">替换</a>
          <a href="{{'/images/products/'.$pi->pid.'/'.$pi->url}}" title="" download="{{$pi->url}}">下载</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div class="ops">
  <a href="{{'/products#'.$pId}}" target="__blank" class="ui labeled icon button basic green small  btn-img" onclick="$('product-manager-tab').click()" data-pid="{{$pId}}">完成<i class="icon file image outline"></i></a>
  <div class="ui labeled icon button basic orange small  btn-img" onclick="uploadPi(this)" data-pid="{{$pId}}">添加图片<i class="icon file image outline"></i></div>
</div>