
<div class="ui header"><i class="settings icon"></i>
  <h2 class="content">网站内容管理</h2>
</div>
<div class="row manage-panel">
  <label class="operation-message"></label>
  <div class="col-md-3 col-sm-3 col-xs-3">
    <div class="ui vertical menu"><a data-tab='1' data-content='#input-body' class="item active"><i class="fa fa-plus-square"></i><span> 添加新闻</span></a><a data-tab='2' class="item"><i class="fa fa-list-alt"></i><span> 管理新闻</span></a>
      <div class="item"><i class="fa fa-list"></i><span> 管理页面</span>
        <div class="menu"><a data-tab='3' class="item edit-page"><i class="fa fa-pencil-square-o"></i><span>关于信豚</span></a><a data-tab='4' class="item edit-page"><i class="fa fa-building-o"></i><span>商业合作</span></a><a data-tab='5' class="item edit-page"><i class="fa fa-user-plus"></i><span>招贤纳士</span></a><a data-tab='6' class="item edit-page"><i class="fa fa-tty"></i><span>联系我们</span></a></div>
      </div><a data-tab='7' class="item"><i class="fa fa-key"></i><span>修改密码</span></a>
    </div>
  </div>
  <div class="tabs-co col-md-9 col-sm-9 col-xs-9">
    <div data-tab='1' class="ui tab news active">
      <div class="ui header">
        <h3 class="content">添加新闻</h3>
      </div>
      <form id="frm" method="post" action="/upload">{{ csrf_field() }}
        <h2 id="ul_title">
          <div class="title ui input transparent">
            <input id="input-title" name="title" rows="1" autofocus="autofocus" required="required" placeholder="标题" class="title"/>
          </div>
        </h2>
        <div id="ul_author">
          <div class="title ui input transparent">
            <input id="input-author" name="author" rows="1" placeholder="作者" class="author"/>
          </div>
        </div>
        <div class="frm-body">
          <div class="input-body" id="mce-input1"><br/></div>
        </div>
        <div class="hidden">
          <input name="content" type="text" class="content"/>
        </div>
      </form>
      <div id="ops">
        <div id="btn-upload" onclick="uploadPost('#frm')" class="ui labeled icon button basic teal small">发布<i class="icon send outline"></i></div>
        <div class="ui labeled icon button basic orange small  btn-img" onclick="uploadImg('mce-input1')">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='2' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">管理新闻</h3>

        <div class="ui divided list">
          @if(isset($articles))
            @foreach($articles as $index => $article)
              <div class="item" id="{{'it'.$article->id}}">
                <div class='edit-news-btns'>
                  <a onclick="deleteNews({{$article->id}})" href="#" class="button ui basic red small"><i class="fa fa-trash"></i>删除</a>
                </div><a href="{{'/news/'.$article->id}}" target="__blank">{{$article->title}}<span class="date">{{substr($article->updated_at,0,10)}}</span></a>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
    <div data-tab='3' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">关于信豚</h3>
      </div>
      <form method="post" action="/pages" id="page3" class="page">{{ csrf_field() }}
        <div class="frm-body">
          <div id="mce-input3" class="input-body">{!!$about!!}<br/></div>
        </div>
        <div class="hidden">
          <input type="text" name="content" value=""/>
          <input type="text" name="type" value="about"/>
          <input type="text" name="lang" value="zh"/>
        </div>
      </form>
      <div id="ops">
        <div onclick="updatePage('#page3')" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
        <div class="ui labeled icon button basic orange small btn-img" onclick="uploadImg('mce-input3')">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='4' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">商业合作</h3>
      </div>
      <form method="post" action="/pages" id="page4" class="page">{{ csrf_field() }}
        <div class="frm-body">
          <div id="mce-input4" class="input-body">{!!$collaboration!!}<br/></div>
        </div>
        <div class="hidden">
          <input type="text" name="content" value=""/>
          <input type="text" name="type" value="collaboration"/>
          <input type="text" name="lang" value="zh"/>
        </div>
      </form>
      <div id="ops">
        <div onclick="updatePage('#page4')" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
        <div class="ui labeled icon button basic orange small btn-img" onclick="uploadImg('mce-input4')">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='5' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">招贤纳士</h3>
      </div>
      <form method="post" action="/pages" id="page5" class="page">{{ csrf_field() }}
        <div class="frm-body">
          <div id="mce-input5" class="input-body">{!!$career!!}<br/></div>
        </div>
        <div class="hidden">
          <input type="text" name="content" value=""/>
          <input type="text" name="type" value="career"/>
          <input type="text" name="lang" value="zh"/>
        </div>
      </form>
      <div id="ops">
        <div onclick="updatePage('#page5')" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
        <div class="ui labeled icon button basic orange small btn-img" onclick="uploadImg('mce-input5')">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='6' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">联系我们</h3>
      </div>
      <form method="post" action="/pages" id="page6" class="page">{{ csrf_field() }}
        <div class="frm-body">
          <div id="mce-input6" class="input-body">{!!$contact!!}<br/></div>
        </div>
        <div class="hidden">
          <input type="text" name="content" value=""/>
          <input type="text" name="type" value="contact"/>
          <input type="text" name="lang" value="zh"/>
        </div>
      </form>
      <div id="ops">
        <div onclick="updatePage('#page6')" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
        <div class="ui labeled icon button basic orange small btn-img" onclick="uploadImg('mce-input6')">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='7' class="ui tab secu">
      <div class="ui header">
        <h3 class="content">修改密码</h3>
      </div>
      <form id="frm-secu" method="post" action="/update_pass">{{ csrf_field() }}
        <p class="tip-message"></p>
        <div class="title ui input">
          <label class="meta">旧密码:</label>
          <input id="input-author" type="password" name="oldpassword" rows="1" placeholder="旧密码" class="author"/>
        </div>
        <div class="title ui input">
          <label class="meta">新密码:</label>
          <input id="input-author" type="password" name="newpassword" rows="1" placeholder="新密码" class="author"/>
        </div>
        <div class="hidden">
          <input type="text" name="name" value="{{$req->name}}"/>
          <input type="text" name="password" value="{{$req->password}}"/>
        </div>
      </form>
      <div id="ops">
        <div id="btn-upload" onclick="updatePass()" class="ui labeled icon button basic teal small">提交<i class="icon send outline"></i></div>
      </div>
    </div>
  </div>
</div>