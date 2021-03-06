<div id="carousel-slide" data-ride="carousel" data-pause="false" class="carousel slide">
	<ol class="carousel-indicators" id="carousel-thumb">
	    <li data-target="#carousel-slide" data-slide-to='0' class="active thumb"></li>
	    <li data-target="#carousel-slide" data-slide-to='1' class="thumb"'></li>
	    <li data-target="#carousel-slide" data-slide-to='2' class="thumb"></li>
	    <li data-target="#carousel-slide" data-slide-to='3' class="thumb"></li>
	    <li data-target="#carousel-slide" data-slide-to='4' class="thumb"></li>
	    <li data-target="#carousel-slide" data-slide-to='5' class="thumb"></li>
	</ol>
    <div role="listbox" class="carousel-inner">
	    @if(isset($carouselItems))
	    	@foreach($carouselItems as $index=>$item)
		    	@if($index < 4)
			        <div class='{{$index == 0?"item active":"item"}}'><img src='{{$item->cover}}' alt="slider image" class="slr-img" href='{{"/cruiser_reports/".$item->id}}'>
			            <div class="carousel-caption">
			                <h2><a href='{{"/cruiser_reports/".$item->id}}'>{{$item->title}}</a></h2>
			                <label class="slabelextra">
			                    <a class="slabelsource" href="{{'/user/'.$item->author}}">{{$item->author_name}}</a>
			                    <label class="slabeldate">{{substr($item->updated_at,0,10)}}</label>
			                </label>
			            </div>
			        </div>
		        @endif
	        @endforeach
	    @else
	        <div class="item active">
		        <img src="/images/carousel/1.jpg" alt="slider image" class="slr-img">
	        </div>
	        <div class="item">
		        <img src="/images/carousel/2.jpg" alt="slider image" class="slr-img">
	        </div>
	        <div class="item">
		        <img src="/images/carousel/3.jpg" alt="slider image" class="slr-img">
	        </div>
	        <div class="item">
		        <img src="/images/carousel/4.jpg" alt="slider image" class="slr-img">
	        </div>
	        <div class="item">
		        <img src="/images/carousel/5.jpg" alt="slider image" class="slr-img">
	        </div>
	        <div class="item">
		        <img src="/images/carousel/6.jpg" alt="slider image" class="slr-img">
	        </div>
	    @endif
    </div>
</div>
