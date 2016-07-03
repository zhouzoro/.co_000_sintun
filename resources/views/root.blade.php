
@extends('layouts.app')
@section('page-title')
<title>内容管理——上海信豚实业有限公司</title>@endsection
@section('additional-styles')
@parent
<link rel="stylesheet" href="/stylesheets/dist/font-awesome.min.css"/>
<link rel="stylesheet" href="/stylesheets/dist/root.min.css"/>@endsection
@section('main')
<div class="ui header"><i class="settings icon"></i>
  <h2 class="content">网站内容管理</h2>
</div>
<div class="row manage-panel">
  <div class="col-md-3 col-sm-3 col-xs-3">
    <div class="ui vertical menu"><a data-tab='1' class="item active"><i class="fa fa-plus-square"></i><span> 添加新闻</span></a><a data-tab='2' class="item"><i class="fa fa-list-alt"></i><span> 管理新闻</span></a>
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
        <div id="frm-body">
          <div id="input-body"><br/></div>
        </div>
      </form>
      <div id="ops">
        <div id="btn-upload" onclick="uploadPost()" class="ui labeled icon button basic teal small">发布<i class="icon send outline"></i></div>
        <div id="btn-img" class="ui labeled icon button basic orange small">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='2' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">管理新闻</h3>
      </div>
    </div>
    <div data-tab='3' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">关于信豚</h3>
      </div>
      <form method="post" action="/update_page" id="page3" class="page">{{ csrf_field() }}
        <div id="frm-body">
          <div id="mce-input3" class="input-body"><br/></div>
        </div>
        <div class="hidden">
          <input type="text" name="type" value="about"/>
        </div>
      </form>
      <div id="ops">
        <div id="btn-upload" data-form="#page3" onclick="updatePage(this)" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
        <div id="btn-img" class="ui labeled icon button basic orange small">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='4' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">商业合作</h3>
      </div>
      <form method="post" action="/update_page" id="page4" class="page">{{ csrf_field() }}
        <div id="frm-body">
          <div id="mce-input4" class="input-body"><br/></div>
        </div>
        <div class="hidden">
          <input type="text" name="type" value="cooperation"/>
        </div>
      </form>
      <div id="ops">
        <div id="btn-upload" data-form="#page4" onclick="updatePage(this)" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
        <div id="btn-img" class="ui labeled icon button basic orange small">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='5' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">招贤纳士</h3>
      </div>
      <form method="post" action="/update_page" id="page5" class="page">{{ csrf_field() }}
        <div id="frm-body">
          <div id="mce-input5" class="input-body"><br/></div>
        </div>
        <div class="hidden">
          <input type="text" name="type" value="career"/>
        </div>
      </form>
      <div id="ops">
        <div id="btn-upload" data-form="#page5" onclick="updatePage(this)" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
        <div id="btn-img" class="ui labeled icon button basic orange small">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='6' class="ui tab edit-news">
      <div class="ui header">
        <h3 class="content">联系我们</h3>
      </div>
      <form method="post" action="/update_page" id="page6" class="page">{{ csrf_field() }}
        <div id="frm-body">
          <div id="mce-input6" class="input-body"><br/></div>
        </div>
        <div class="hidden">
          <input type="text" name="type" value="contact"/>
        </div>
      </form>
      <div id="ops">
        <div id="btn-upload" data-form="#page6" onclick="updatePage(this)" class="ui labeled icon button basic teal small">更新<i class="icon send outline"></i></div>
        <div id="btn-img" class="ui labeled icon button basic orange small">添加图片<i class="icon file image outline"></i></div>
      </div>
    </div>
    <div data-tab='7' class="ui tab secu">
      <div class="ui header">
        <h3 class="content">修改密码</h3>
      </div>
      <form id="frm-secu" method="post" action="/upload">{{ csrf_field() }}
        <p class="tip-message"></p>
        <div class="title ui input">
          <label class="meta">旧密码:</label>
          <input id="input-author" type="password" name="oldpassword" rows="1" placeholder="旧密码" class="author"/>
        </div>
        <div class="title ui input">
          <label class="meta">新密码:</label>
          <input id="input-author" type="password" name="password" rows="1" placeholder="新密码" class="author"/>
        </div>
        <div class="hidden">
          <input type="text" name="name" value="secu"/>
        </div>
      </form>
      <div id="ops">
        <div id="btn-upload" onclick="updatePass()" class="ui labeled icon button basic teal small">提交<i class="icon send outline"></i></div>
      </div>
    </div>
  </div>
</div>@endsection
@section('additional-scripts')
<script src="/tinymce/tinymce.min.js"></script>
<script src="/javascripts/dist/root.babeled.min.js"></script>@endsection