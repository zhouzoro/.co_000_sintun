<div class="ui header">
  <h3 class="content">编辑产品信息:{{$p->name}}</h3>
</div>
<form id="update-product" method="post" action="/products">
  {{ csrf_field() }}
  <h3 id="ul_title">
    <div class="title ui input transparent">
      <input id="input-title" name="name" rows="1" autofocus="autofocus" required="required" placeholder="产品名" class="title" value="{{$p->name}}"/>
    </div>
  </h3>
  <div class="frm-body">
    <div class="input-body" id="mce-product-u" data-imgurl="{{'/upload/images/products/'.$p->id}}">{!!$p->description!!}</div>
  </div>
  <div class="hidden">
    <input name="content" type="text" class="content"/>
    <input name="id" type="text" value={{$p->id}}></input>
  </div>
</form>
<div class="ops">
  <a href="{{'/products#'.$p->id}}" target="__blank" id="btn-upload" onclick="uploadPost('#update-product')" class="ui labeled icon button basic teal small">发布<i class="icon send outline"></i></a>
  <div class="ui labeled icon button basic orange small  btn-img" onclick="uploadImg('mce-product-u')">添加图片<i class="icon file image outline"></i></div>
</div>