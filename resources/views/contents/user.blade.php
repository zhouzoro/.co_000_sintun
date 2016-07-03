
<div class="container-fluid no-boundry">
  <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <div id="user">
      <div id="user-profile"><div class="user-pic"><img src="{{'/images/user/'.$user->id.'.jpg'}}"/>
          <div class="change-pic">
            <label>替换</label>
          </div>
          </div>
          <div class="username">{{$user->username}}</div></div>
      <div id="user-portfolio">
	      <h3>相关文章</h3>
	      @foreach($posts as $index => $post)
		        <div class="post-prev">
				  <div class="title"><a href="{{'/cruiser_reports/'.$post->id}}">{{$post->title}}</a></div>
				  <div class="prev">{{$post->quote}}</div>
				</div>
	            <div class="edit-btns hidden">
	                <a class="ui icon labeled edit button basic blue small" href="{{'/cruiser_reports/'.$post->id.'/edit'}}">
	                    <i class="icon edit"></i>
	                编辑</a>
	                <a class="ui icon labeled delete button basic red small" onclick="deletePost('{{'delete-frm'.$post->id}}')">
	                    <i class="icon delete"></i>
	                删除</a>
	                <form id="{{'delete-frm'.$post->id}}" class="delete-token" action="{{'/cruiser_reports/'.$post->id.'/delete'}}" method="post">
	                    {{ csrf_field() }}
	                </form>
	            </div>
	        @endforeach
        </div>
    </div>
  </div>
</div>