
@include('partials.header')
@stack('style')
<style>
#load_more{
  color:green;
  background-color:white;
  cursor:pointer;
  margin-top:20px;
  margin-bottom:20px;
}
#load_more:hover{
  color:red;
}
</style>
</head>

<body>
	<div class="">
        @include('partials.topmenubar')
		<div class="clearfix"></div>
		@include('partials.sidebar')
	  <div class="page-content">
			<!-- Menu Cat -->
			<div class="col-xs-12 nnav">
				<ul class="nav nav-tabs">
					<li>
						<a href="{{route('home')}}" class="ingrid">
							<i class="far fa-futbol text-center"></i>
							<span class="text-small">Home</span>
						</a>
					</li>
					<li>
						<a href="{{route('contest')}}" class="ingrid">
							<i class="fas fa-history text-center"></i>
							<span class="text-small">Contest</span>
						</a>
					</li>
					<li>
						<a href="{{route('matches')}}" class="ingrid">
							<i class="far fa-clock text-center"></i>
							<span class="text-small">Live</span>
						</a>
					</li>
					<li class="active">
						<a href="{{route('news')}}" class="ingrid">
							<i class="far fa-newspaper text-center"></i>
							<span class="text-small">News</span>
						</a>
					</li>
				</ul>
			</div>
		  	<div class="clearfix"></div>
		  	<div class="col-xs-12 mb-10 mt-5">
				<div class="col-xs-4 pd-0">
                    <a class="nav-link" id="hottest-tab" onclick="myFunction(1)" data-toggle="tab" href="#hottest" role="tab" aria-controls="" aria-selected="false">
                        <div class="sub-news" id="hottestDiv">
							Hottest
						</div>
                    </a>
				</div>
				<div class="col-xs-4 pd-0">
                    <a class="nav-link" id="latest-tab" onclick="myFunction(2)" data-toggle="tab" href="#latest" role="tab" aria-controls="" aria-selected="true">
                        <div class="sub-news active" id="latestDiv">
							Latest
						</div>
                    </a>
				</div>
				<div class="col-xs-4 pd-0">
                    <a class="nav-link" id="transfer-tab" onclick="myFunction(3)" data-toggle="tab" href="#transfer" role="tab" aria-controls="" aria-selected="false">
                        <div class="sub-news" id="transferDiv">
							Transfer
						</div>
                    </a>
				</div>
		  	</div>
			<!-- News -->

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade p-3 active in" id="latest" aria-labelledby="latest-tab">
                    <div class="col-xs-12 ct">
                        <div class="mb-10 mt-12">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($latestnews as $key=>$news)
                                    @if($key<=2)
                                    <div class="swiper-slide">
                                        <a href="{{$news['url']}}">
                                            <div class="title-img">
                                                <img src="{{$news['urlToImage']}}" alt=""/>
                                            </div>
                                            <p class="title-cat">{{$news['name']}}</p>
                                            <h2 class="title-main">
                                                {{$news['title']}}
                                            </h2>
                                            <div class="hr"></div>
                                            <p class="title-desc">
                                            {{$news['content']}}
                                            </p>
                                        </a>
                                    </div>
                                    @else
                                    @break
                                    @endif
                                    @endforeach

                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination pos-inherit mt-20"></div>
                            </div>

                        </div>

                    </div>

                    <div class="team col-xs-12 ct">
                        <div class="mt-15">
                            @foreach ($latestnews as $key=>$news)
                            @if($key<=30)
                            <div class="post post-widget listing">
                                <a class="post-img" href="{{$news['url']}}"><img src="{{$news['urlToImage']}}" alt=""></a>
                                <div class="post-body">
                                    <p class="title-cat">{{$news['title']}}</p>
                                    <h3 class="post-title">
                                        <a href="">
                                        {{$news['title']}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @else
                            @break
                            @endif
                            @endforeach
                            <!-- <div class="post post-widget">
                                <a class="post-img" href=""><img src="{{('assets/img/lt3.jpg')}}" alt=""></a>
                                <div class="post-body">
                                    <p class="title-cat">UEFA Champions League</p>
                                    <h3 class="post-title">
                                        <a href="">
                                            Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="post post-widget">
                                <a class="post-img" href=""><img src="{{('assets/img/lt4.jpg')}}" alt=""></a>
                                <div class="post-body">
                                    <p class="title-cat">Premier League</p>
                                    <h3 class="post-title">
                                        <a href="">
                                            Why Node.js Is The Coolest Kid On The Backend Development Block!
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="post post-widget">
                                <a class="post-img" href=""><img src="{{('assets/img/lt1.jpg')}}" alt=""></a>
                                <div class="post-body">
                                    <p class="title-cat">Ligue 1</p>
                                    <h3 class="post-title">
                                        <a href="">
                                            Tell-A-Tool: Guide To Web Design And Development Tools
                                        </a>
                                    </h3>
                                </div>
                            </div> -->
                            <div class="clearfix"></div>
                            <div class="text-center" > <p id="load_more"> --- loading more contents --- </p></div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="tab-pane fade p-3 dactive in" id="hottest" aria-labelledby="hottest-tab">
                    <div class="col-xs-12 ct">
                        <div class="mb-10 mt-12">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($hottestnews as $key=>$news)
                                    @if($key<=2)
                                    <div class="swiper-slide">
                                        <a href="{{$news['url']}}">
                                            <div class="title-img">
                                                <img src="{{$news['urlToImage']}}" alt=""/>
                                            </div>
                                            <p class="title-cat">{{$news['name']}}</p>
                                            <h2 class="title-main">
                                                {{$news['title']}}
                                            </h2>
                                            <div class="hr"></div>
                                            <p class="title-desc">
                                            {{$news['content']}}
                                            </p>
                                        </a>
                                    </div>
                                    @else
                                    @break
                                    @endif
                                    @endforeach

                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination pos-inherit mt-20"></div>
                            </div>
                        </div>
                    </div>

                    <div class="team col-xs-12 ct">
                        <div class="mt-15">
                            @foreach ($hottestnews as $key=>$news)
                            @if($key<=30)
                            <div class="post post-widget hottest_listing">
                                <a class="post-img" href="{{$news['url']}}"><img src="{{$news['urlToImage']}}" alt=""></a>
                                <div class="post-body">
                                    <p class="title-cat">{{$news['title']}}</p>
                                    <h3 class="post-title">
                                        <a href="">
                                        {{$news['title']}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @else
                            @break
                            @endif
                            @endforeach

                            <div class="clearfix"></div>
                            <div class="text-center" > <p id="hottest_load_more"> --- loading more contents --- </p></div>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                </div>
                <div class="tab-pane fade p-3 in" id="transfer" aria-labelledby="transfer-tab">
                    <div class="col-xs-12 ct">
                        <div class="mb-10 mt-12">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($transfernews as $key=>$news)
                                    @if($key<=2)
                                    <div class="swiper-slide">
                                        <a href="{{$news['url']}}">
                                            <div class="title-img">
                                                <img src="{{$news['urlToImage']}}" alt=""/>
                                            </div>
                                            <p class="title-cat">{{$news['name']}}</p>
                                            <h2 class="title-main">
                                                {{$news['title']}}
                                            </h2>
                                            <div class="hr"></div>
                                            <p class="title-desc">
                                            {{$news['content']}}
                                            </p>
                                        </a>
                                    </div>
                                    @else
                                    @break
                                    @endif
                                    @endforeach

                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination pos-inherit mt-20"></div>
                            </div>
                        </div>
                    </div>

                    <div class="team col-xs-12 ct">
                        <div class="mt-15">
                            @foreach ($transfernews as $key=>$news)
                            @if($key<=30)
                            <div class="post post-widget transfer_listing">
                                <a class="post-img" href="{{$news['url']}}"><img src="{{$news['urlToImage']}}" alt=""></a>
                                <div class="post-body">
                                    <p class="title-cat">{{$news['title']}}</p>
                                    <h3 class="post-title">
                                        <a href="">
                                        {{$news['title']}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @else
                            @break
                            @endif
                            @endforeach

                            <div class="clearfix"></div>
                            <div class="text-center" > <p id="transfer_load_more"> --- loading more contents --- </p></div>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>


	  </div>
	</div>
	@include('partials.footer')
    @stack('swiper')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
  //show more option
    var size_item = $('.listing').length;
    var v=5;
    $('.listing').hide(); // hide all divs with class `listing`
    $('.listing:lt('+v+')').show();
    $('#load_more').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".listing:visible").length >= size_item ){ $("#load_more").hide(); }
    });
});
$(document).ready(function(){
  //show more option
    var size_item = $('.hottest_listing').length;
    var v=5;
    $('.hottest_listing').hide(); // hide all divs with class `listing`
    $('.hottest_listing:lt('+v+')').show();
    $('#hottest_load_more').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.hottest_listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".hottest_listing:visible").length >= size_item ){ $("#hottest_load_more").hide(); }
    });
});
$(document).ready(function(){
  //show more option
    var size_item = $('.transfer_listing').length;
    var v=5;
    $('.transfer_listing').hide(); // hide all divs with class `listing`
    $('.transfer_listing:lt('+v+')').show();
    $('#transfer_load_more').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.transfer_listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".transfer_listing:visible").length >= size_item ){ $("#transfer_load_more").hide(); }
    });
});
function myFunction(id) {
                //  document.getElementById("demo1").innerHTML = id;
                //alert(id,day);
                if(id==1){
                var element = document.getElementById("hottestDiv");
                element.classList.add("active");
                var elementToday = document.getElementById("latestDiv");
                elementToday.classList.remove("active");
                var elementNext = document.getElementById("transferDiv");
                elementNext.classList.remove("active");

                }
                if(id==2){
                var element = document.getElementById("hottestDiv");
                element.classList.remove("active");
                var elementToday = document.getElementById("latestDiv");
                elementToday.classList.add("active");
                var elementNext = document.getElementById("transferDiv");
                elementNext.classList.remove("active");
                }
                if(id==3){
                var element = document.getElementById("hottestDiv");
                element.classList.remove("active");
                var elementToday = document.getElementById("latestDiv");
                elementToday.classList.remove("active");
                var elementNext = document.getElementById("transferDiv");
                elementNext.classList.add("active");
                }
}
</script>

</body>
</html>

