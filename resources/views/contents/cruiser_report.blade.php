<div class='container-fluid no-boundry'>
    <div class='post-hero' style='{{'background-image: url("'.$post->cover.'")'}}'>
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 no-boundry">
            <div class="edit-btns hidden">
                <a class="ui icon labeled edit button basic blue small" href="{{'/cruiser_reports/'.$post->id.'/edit'}}">
                    <i class="icon edit"></i>
                编辑</a>
                <a class="ui icon labeled delete button basic red small" onclick="deletePost('{{'/cruiser_reports/'.$post->id.'/delete'}}')">
                    <i class="icon delete"></i>
                删除</a>
                <form class="delete-token" action="{{'/cruiser_reports/'.$post->id.'/delete'}}" method="post">
                    {{ csrf_field() }}
                </form>
            </div>
            <h1 id="post-title"><span>{{$post->title}}</span></h1>
            <a class='user-link' data-id='{{ $post->author }}' href="{{'/user/'.$post->author}}">
                <img src={{ '/images/user/'.$post->author.'.jpg' }} class="user-pic small circle">
                <span class='username'>{{$post->author_name}}</span>
            </a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1 no-boundry">
        <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 no-boundry">
            <div class="table-of-content">
                <div class="label">
                    <i class='icon list'></i>
                    内容目录
                </div>
                <ul class="content"></ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-boundry">
            <div id="post-body">
	            <div id="content">{!!$post->content!!}</div>
            </div>
        </div>
    </div>
</div>