<header>
    <div class="header-part logo-container no-boundry">
        <a class="logo" href='{{$req->lang=="en" ? "/" : "/en"}}'>
            <img src="/sintun.png">
        </a>
        <a class="switch-lang" href='{{$req->lang=="en" ? "/".$req->path() : "/en/".$req->path()}}'>
            <i class='{{$req->lang=="en" ? "china flag" : "united states flag"}}'></i>
            <span>{{$req->lang=="en" ? "中文" : "English"}}</span>
        </a>
    </div>
    <div class="header-part header-main">
        <h1 class="title">上海信豚实业有限公司</h1>
        @include('components.mainMenu')
    </div>
</header>