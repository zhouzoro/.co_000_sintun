<div id="new-product-editor" class="modal-content">
  <div class="ops-modal">
    <div class="ui top attached tabular menu tab-product">
      <label class="padding-label">添加产品: </label>
      <a class="active item" data-tab="first">产品描述</a>
      <a class="item" data-tab="second">产品图集</a>
      <div id="btn-upload" onclick="uploadPost('#frm-product')" class="ui labeled icon button basic teal small">发布<i class="icon send outline"></i></div>
    </div>
  </div>
  <div class="ui bottom attached active tab segment" data-tab="first">
    <div class="ops-in-tab">
      <div class="ui labeled icon button basic orange small  btn-img" onclick="uploadImg('mce-input1')">添加图片<i class="icon file image outline"></i></div>
    </div>
    <form id="frm-product" method="post" action="/products">
      {{ csrf_field() }}
      <h3 id="ul_title">
        <div class="title ui input transparent">
          <input id="input-title" name="name" rows="1" autofocus="autofocus" required="required" placeholder="产品名" class="title"/>
        </div>
      </h3>
      <div class="frm-body">
        <div class="input-body" id="mce-product" data-imgurl="{{'/upload/images/products/'.$newId}}"><br/></div>
      </div>
      <div class="hidden">
        <input name="content" type="text" class="content"/>
        <input name="id" type="text" value={{$newId}}></input>
      </div>
    </form>
  </div>
  <div class="ui bottom attached tab segment" data-tab="second">
    <div class="ui header">
          <h3 class="content">产品图集</h3>
        </div>
        
        <div class="row rearange ps">
          @foreach ($pimgs as $index => $pi)
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 img-container">
              <div class="img">
                <img src="{{'/images/products/'.$pi->pid.'/'.$pi->url}}" alt="">
                <div class="ops">
                  <label>{{$i}}</label>
                  <a class="red" href="#" title="" onclick="deleteImg(this)" data-iname="{{$pi->url}}" data-id="{{$pi->id}}" data-url="'/images/products/'.$pi->pid}}">删除</a>
                  <a href="#" title="" onclick="replaceImg(this)" data-name="{{$pi->url}}" data-url="'/images/products/'.$pi->pid}}">替换</a>
                  <a href="{{'/images/products/'.$pi->pid.'/'.$pi->url}}" title="" download="{{$pi->url}}">下载</a>
                </div>
              </div>
            </div>
          @endfor
        </div>
        <div class="ops">
          <div class="ui labeled icon button basic orange small  btn-img" onclick="uploadPic()">添加图片<i class="icon file image outline"></i></div>
        </div>
  </div>
</div>