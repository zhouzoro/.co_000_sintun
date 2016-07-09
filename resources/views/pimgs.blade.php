<div id="pimg-slide" data-ride="carousel" data-pause="false" class="carousel slide">
	<ol class="carousel-indicators" id="carousel-thumb">
		@foreach($pimgs as $index=>$item)
		    <li data-target="#pimg-slide" data-slide-to="{{$index}}" class="active thumb">
		    </li>
        @endforeach
	</ol>
    <div role="listbox" class="carousel-inner">
    	@foreach($pimgs as $i => $p)
	        <div class='{{$i == 0?"item active":"item"}}'>
	        <div class="img" style="background: url({{$url = '/images/products/'.$p->pid.'/'.$p->url}}); background-size: contain; background-repeat: no-repeat; background-position: center">
	        	
	        </div>
	        </div>
        @endforeach
    </div>
    <a class="left slid-control" href="#pimg-slide" role="button" data-slide="prev">
	    <i class="icon chevron circle left"></i>
	  </a>
	  <a class="right slid-control" href="#pimg-slide" role="button" data-slide="next">
	    <i class="icon chevron circle right"></i>
	  </a>
</div>