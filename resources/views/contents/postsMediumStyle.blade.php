<div class="article-preview style1">
    @if(isset($previewItem))
        <h2 class="article-title">
            <a href="{{'/cruiser_reports/'.$previewItem->id}}">{{$previewItem->title}}</a>
        </h2>

        <div class="article-author">
            <a class='user-link'>
                <img src="{{ '/images/user/'.$previewItem->author.'.jpg' }}" class="user-pic small circle">
                <span class='username' href="{{'/user/'.$previewItem->author}}">{{$previewItem->author_name}}</a>
            </a>
        </div>

        @if(isset($previewItem->tags))
            <div class="article-tags">
                
            </div>
        @endif

        <div class="article-cover">
            <img src={{$previewItem->cover}} href="{{'/cruiser_reports/'.$previewItem->id}}">
        </div>
        <div class="article-description">
            <p>{{$previewItem->quote}}</p>
        </div>
        
        @if(isset($previewItem->likes))
            <!--some info like view count, comments, likes, etc -->
            <div class="article-meta">
                <div class="article-status">
                    <a class="read">
                        <i class="fa fa-eye"></i>
                        <span class="count">146</span>
                    </a>
                    <a class="like">
                        <i class="fa fa-heart-o"></i>
                        <span class="count">171</span>
                    </a>
                    <a class="comment">
                        <i class="fa fa-comment-o"></i>
                        <span class="count">212</span>
                    </a>
                </div>
            </div>
        @endif
    @else
        <div class="article-title">
            <h2>Nothing like this</h2></div>
        <div class="article-author">
            <a class='user-link'>
                <img src="/images/user/007.jpg" class="user-pic small circle"></img><span>user 001</span>
            </a>
            <label> from: </label><a class="article-cruiser">ship 001</a></div>
        <div class="article-tags"><a class="tag">tag1</a><a class="tag">tag2</a><a class="tag">tag3</a></div>
        <div class="article-cover"><img src="https://placem.at/places?w=900&amp;random=0.7891012062318623"></div>
        <div class="article-description">
            <p>.article-description.article-description.article-description.article-description.article-description.article-description.article-description.article-description.article-description</p>
        </div>
        <div class="article-meta">
            <div class="article-status"><a class="read"><i class="fa fa-eye"></i><span class="count">146</span></a><a class="like"><i class="fa fa-heart-o"></i><span class="count">171</span></a><a class="comment"><i class="fa fa-comment-o"></i><span class="count">212</span></a></div>
        </div>
    @endif
</div>