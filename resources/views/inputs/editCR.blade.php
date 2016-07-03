
<form id="update-form" method="post" data-type="evt" action="{{'/cruiser_reports/'.$post->id.'/update'}}" enctype="multipart/form-data">{{ csrf_field() }}
  <div id="ul_title">
    <div class="title ui input">
      <input id="input-title" name="title" rows="1" autofocus="autofocus" required="required" placeholder="标题" value="{{$post->title}}" class="title"/>
    </div>
  </div>
  <div class="mce-top-indicator"></div>
  <div id="frm-body">
    <div class="mymce-container">
      <div id="input-body"><br/></div>
    </div>
  </div>
  <div class="hidden">
    <input type="text" name="content" value="{{$post->content}}" class="input-content"/>
    <input type="text" name="quote" class="input-quote"/>
    <input type="text" name="cover" value="{{$post->cover}}" class="input-hero-img"/>
  </div>
</form>
<div id="ops">
  <div id="btn-upload" onclick="updatePost(&quot;#update-form&quot;)" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
  <div id="btn-img" class="ui labeled icon button basic orange small">图片<i class="icon file image outline"></i></div>
  <div id="btn-cancel" class="ui labeled icon button basic teal small">预览<i class="icon eye"></i></div>
</div>