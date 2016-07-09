<div class="ui header">
  <h3 class="content">编辑新闻</h3>
</div>
<form id="frm-1" method="post" action="/news">{{ csrf_field() }}
  <h2 id="ul_title">
    <div class="title ui input transparent">
      <input id="input-title" name="title" rows="1" autofocus="autofocus" required="required" placeholder="标题" class="title" value="{{$n->title}}"/>
    </div>
  </h2>
  <div id="ul_author">
    <div class="title ui input transparent">
      <input id="input-author" name="author" rows="1" placeholder="作者" class="author" value="{{$n->author}}"/>
    </div>
  </div>
  <div class="frm-body">
    <div class="input-body" id="mce-input1-1" data-imgurl="{{'/upload/images/news/'.$n->id}}">{!!$n->content!!}</div>
  </div>
  <div class="hidden">
    <input name="content" type="text" class="content"/>
    <input name="id" type="text" value={{$n->id}}></input>
  </div>
</form>
<div class="ops">
  <div id="btn-upload" onclick="uploadPost('#frm-1')" class="ui labeled icon button basic teal small">发布<i class="icon send outline"></i></div>
  <div class="ui labeled icon button basic orange small  btn-img" onclick="uploadImg('mce-input1-1')">添加图片<i class="icon file image outline"></i></div>
</div>
<div class="bottom-indicator">
  
</div>