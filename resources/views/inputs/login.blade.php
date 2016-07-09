<form class='user-access' id="login" action="{{$req->lang == 'en' ? '/en/login' : '/login'}}" method="post">
	{{ csrf_field() }}
    <p class="tip-message"></p>
    <div class="ui input">
        <input type="text" name="name" placeholder="用户名" />
    </div>

    <div class="ui input">
        <input type="password" name="password" placeholder="密码" />
    </div>

    <a class='ui button green login-btn user-access-btn' onclick="login()">管理员登录</a>
</form>
