<div id="control-panel">
  
  <div class="ui header"><i class="settings icon"></i>
    <h2 class="content">{{$req->lang == 'en' ? '英文部分内容管理' :'网站内容管理'}}</h2>
  </div>
  <div class="row manage-panel">
    <div class="col-md-3 col-sm-3 col-xs-3">
      <div class="ui vertical menu">
        <div class="item"><i class="fa fa-picture-o"></i><span> 更改图片</span>
          <div class="menu">
            <a data-tab='p1' class="item"><i class="fa fa-picture-o"></i><span> 首页滚动图片</span></a>
            <a data-tab='p2' class="item"><i class="fa fa-picture-o"></i><span> 首页小图</span></a>
            <a data-tab='p0' class="item"><i class="fa fa-picture-o"></i><span> 标题背景</span></a>
          </div>
        </div>
        <div class="item"><i class="fa fa-newspaper-o"></i><span> 信豚动态</span>
          <div class="menu">
            <a data-tab='1' class="item active"><i class="fa fa-plus-square"></i> <span> 添加新闻</span></a>
            <a data-tab='2' class="item"><i class="fa fa-list-alt"></i><span> 管理新闻</span></a>
          </div>
        </div>
        <div class="item"><i class="fa fa-archive"></i><span> 产品信息</span>
          <div class="menu">
            <a data-tab='9' class="item"><i class="fa fa-plus-square"></i> <span> 添加产品信息</span></a>
            <a data-tab='8' class="item product-manager-tab"><i class="fa fa-key"></i><span>管理产品信息</span></a>
            <a data-tab='10' class="item hidden pimg-tab"></a>
          </div>
        </div>
        <div class="item"><i class="fa fa-list"></i><span> 页面内容</span>
          <div class="menu">
          <a data-tab='3' class="item edit-page"><i class="fa fa-pencil-square-o"></i><span>关于信豚</span></a>
          <a data-tab='4' class="item edit-page"><i class="fa fa-building-o"></i><span>商业合作</span></a>
          <a data-tab='5' class="item edit-page"><i class="fa fa-user-plus"></i><span>招贤纳士</span></a>
          <a data-tab='6' class="item edit-page"><i class="fa fa-tty"></i><span>联系我们</span></a></div>
        </div>
        <a data-tab='7' class="item"><i class="fa fa-key"></i><span>修改密码</span></a>
      </div>
    </div>
    <div class="tabs-co col-md-9 col-sm-9 col-xs-9">
      <div data-tab='1' class="ui tab news active">
        <div class="ui header">
          <h3 class="content">添加新闻</h3>
        </div>
        <form id="frm" method="post" action="/news">{{ csrf_field() }}
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
            <div class="input-body" id="mce-input1" data-imgurl="{{'/upload/images/news/'.$newId}}"><br/></div>
          </div>
          <div class="hidden">
            <input name="content" type="text" class="content"/>
            <input name="id" type="text" value={{$newId}}></input>
          </div>
        </form>
        <div class="ops">
          <div id="btn-upload" onclick="uploadPost('#frm')" class="ui labeled icon button basic teal small">发布<i class="icon send outline"></i></div>
          <div class="ui labeled icon button basic orange small  btn-img" onclick="uploadImg('mce-input1')">添加图片<i class="icon file image outline"></i></div>
        </div>
        <div class="bottom-indicator">
          
        </div>
      </div>
      <div data-tab='2' class="ui tab">
        <div class="ui header">
          <h3 class="content">管理新闻</h3>
        </div>
        <div class="ui divided list edit-news">
          @if(isset($articles))
            @foreach($articles as $index => $article)
              <div class="item" id="{{'it'.$article->id}}">
                <div class='edit-news-btns'>
                  <a onclick="deleteNews({{$article->id}})" href="#" class="delete-btn"><i class="fa fa-trash"></i>删除</a>
                  <a onclick={{"loadToT('/edit_news/".$article->id."')"}} href="#" class="delete-btn green"><i class="fa fa-edit"></i>编辑</a>
                </div><a href="{{'/news/'.$article->id}}" target="__blank">{{$article->title}}<span class="date">{{substr($article->updated_at,0,10)}}</span></a>
              </div>
            @endforeach
          @endif
        </div>
      </div>


      <div data-tab='p0' class="ui tab">
        <div class="ui header">
          <h3 class="content">标题背景</h3>
        </div>
        <div class="row rearange p1">
            <div class="img header-bg">
              <img src="{{'/images/hb.jpg'}}" alt="">
              <div class="ops">
                <a href="#" title="" onclick="replaceImg(this)" data-name="hb.jpg" data-url="/upload/images/header">替换</a>
                <a href="{{'/images/hb.jpg'}}" title="" download="sintun-header-bg.jpg">下载</a>
              </div>
            </div>
        </div>
      </div>
      <div data-tab='p1' class="ui tab">
        <div class="ui header">
          <h3 class="content">更改首页图片</h3>
        </div>
        <div class="row rearange p1">
          @for ($i = 1; $i < 7; $i++)
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="img">
              <img src="{{'/images/carousel/'.strval($i).'.jpg'}}" alt="">
              <div class="ops">
                <label>{{$i}}</label>
                <a href="#" title="" onclick="replaceImg(this)" data-name="{{strval($i).'.jpg'}}" data-url="/upload/images/carousel">替换</a>
                <a href="{{'/images/carousel/'.strval($i).'.jpg'}}" title="" download="{{strval($i).'.jpg'}}">下载</a>
              </div>
            </div>
            </div>
          @endfor
          
        </div>
      </div>

      <div data-tab='p2' class="ui tab">
        <div class="ui header">
          <h3 class="content">更改首页小图</h3>
        </div>
        <div class="row rearange p1">
          @for ($i = 1; $i < 5; $i++)
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="img">
              <img src="{{'/images/poster/p'.strval($i).'.jpg'}}" alt="">
              <div class="ops">
                <label>{{$i}}</label>
                <a href="#" title="" onclick="replaceImg(this)" data-name="{{'p'.strval($i).'.jpg'}}" data-url="/upload/images/poster">替换</a>
                <a href="{{'/images/poster/p'.strval($i).'.jpg'}}" title="" download="{{'p'.strval($i).'.jpg'}}">下载</a>
              </div>
            </div>
            </div>
          @endfor
          
        </div>
      </div>
      <div data-tab='9' class="ui tab">
        <div class="ui header">
          <h3 class="content">添加产品</h3>
        </div>
        <form id="frm-product" method="post" action="/products">
          {{ csrf_field() }}
          <h3 id="ul_title">
            <div class="title ui input transparent">
              <input id="input-title" name="name" rows="1" autofocus="autofocus" required="required" placeholder="产品名" class="title"/>
            </div>
          </h3>
          <div class="frm-body">
            <div class="input-body" id="mce-product" data-imgurl="{{'/upload/images/products/'.$pId}}"><br/></div>
          </div>
          <div class="hidden">
            <input name="content" type="text" class="content"/>
            <input name="id" type="text" value={{$pId}}></input>
          </div>
        </form>
        <div class="ops">
          <div id="btn-upload" onclick="uploadPost('#frm-product')" class="ui labeled icon button basic teal small">发布<i class="icon send outline"></i></div>
          <div class="ui labeled icon button basic orange small  btn-img" onclick="uploadImg('mce-product')">添加图片<i class="icon file image outline"></i></div>
        </div>
      </div>
      <div data-tab='10' class="ui tab pimg-tab">
        <div class="ui header">
          <h3 class="content">产品图集</h3>
        </div>
        
        <div class="row rearange ps">

        </div>
        <div class="ops">
          <a href="{{'/products#'.$pId}}" class="ui labeled icon button basic green small  btn-img" data-pid="{{$pId}}">完成<i class="icon file image outline"></i></a>
          <div class="ui labeled icon button basic orange small  btn-img" onclick="uploadPi(this)" data-pid="{{$pId}}">添加图片<i class="icon file image outline"></i></div>
        </div>
      </div>
      <div data-tab='8' class="ui tab">
        <div class="ui header">
          <h3 class="content">产品列表</h3>
        </div>
        <div class="ui divided list edit-news">
          @if(isset($ps))
            @foreach($ps as $index => $p)
              <div class="item" id="{{'pit'.$p->id}}">
                <a href="{{'/products/#'.$p->id}}" target="__blank">{{$p->name}}</a>
                <div class='edit-news-btns product'>
                  <a onclick={{"loadToT('/edit_pinfo/".$p->id."')"}} href="#" class="delete-btn green"><i class="fa fa-edit"></i>编辑信息</a>
                  <a onclick={{"loadToT('/edit_pimgs/".$p->id."')"}} href="#" class="delete-btn green"><i class="fa fa-picture-o"></i>整理图集</a>
                  <a onclick="deleteProducts({{$p->id}})" href="#" class="delete-btn"><i class="fa fa-trash"></i>删除</a>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
      <div data-tab='3' class="ui tab">
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
            <input type="text" name="lang" value="{{$req->lang}}"/>
          </div>
        </form>
        <div class="ops">
          <div onclick="updatePage('#page3')" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
          <div class="ui labeled icon button basic orange small btn-img" onclick="uploadImg('mce-input3')">添加图片<i class="icon file image outline"></i></div>
        </div>
        <div class="bottom-indicator">
          
        </div>
      </div>
      <div data-tab='4' class="ui tab">
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
            <input type="text" name="lang" value="{{$req->lang}}"/>
          </div>
        </form>
        <div class="ops">
          <div onclick="updatePage('#page4')" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
          <div class="ui labeled icon button basic orange small btn-img" onclick="uploadImg('mce-input4')">添加图片<i class="icon file image outline"></i></div>
        </div>
        <div class="bottom-indicator">
          
        </div>
      </div>
      <div data-tab='5' class="ui tab">
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
            <input type="text" name="lang" value="{{$req->lang}}"/>
          </div>
        </form>
        <div class="ops">
          <div onclick="updatePage('#page5')" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
          <div class="ui labeled icon button basic orange small btn-img" onclick="uploadImg('mce-input5')">添加图片<i class="icon file image outline"></i></div>
        </div>
        <div class="bottom-indicator">
          
        </div>
      </div>
      <div data-tab='6' class="ui tab">
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
            <input type="text" name="lang" value="{{$req->lang}}"/>
          </div>
        </form>
        <div class="ops">
          <div onclick="updatePage('#page6')" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
          <div class="ui labeled icon button basic orange small btn-img" onclick="uploadImg('mce-input6')">添加图片<i class="icon file image outline"></i></div>
        </div>
        <div class="bottom-indicator">
          
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
        <div class="ops">
          <div id="btn-upload" onclick="updatePass()" class="ui labeled icon button basic teal small">提交<i class="icon send outline"></i></div>
        </div>
      </div>
      <div data-tab='t1' class="ui tab temp">

      </div>
    </div>
  </div>
</div>