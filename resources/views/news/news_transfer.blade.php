@include('partials.header')
@stack('style')
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
					<a href="{{route('news')}}">
						<div class="sub-news">
							Hottest
						</div>
					</a>
				</div>
				<div class="col-xs-4 pd-0">
					<a href="{{route('news_latest')}}">
						<div class="sub-news">
							Latest
						</div>
					</a>
				</div>
				<div class="col-xs-4 pd-0">
					<a href="{{route('news_transfer')}}">
						<div class="sub-news active">
							Transfer
						</div>
					</a>
				</div>
		  	</div>
			<!-- News -->
			<div class="col-xs-12 ct">
				<div class="mb-10 mt-12">
		   			<div class="swiper-container">
						<div class="swiper-wrapper">
						  <div class="swiper-slide">
							  <a href="{{route('news_detail')}}">
								<div class="title-img">
									<img src="{{('assets/img/ltn3.jpg')}}" alt=""/>
								</div>
								<p class="title-cat">Serie A</p>
								<h2 class="title-main">
									Cristiano Ronaldo's miraculous show more dramatic
								</h2>
								<div class="hr"></div>
								<p class="title-desc">
									Cristiano Ronaldo's latest Champions League cabaret show was a heavenly...
								</p>
							  </a>
						  </div>
						  <div class="swiper-slide">
							<a href="{{route('news_detail')}}">
								<div class="title-img">
									<img src="{{('assets/img/ltn1.jpg')}}" alt=""/>
								</div>
								<p class="title-cat">UEFA Champions League</p>
								<h2 class="title-main">
									Reds complete English quartet in last eight
								</h2>
								<div class="hr"></div>
								<p class="title-desc">
									Liverpool claim famous 3-1 win at Bayern Munich to join Man City...
								</p>
							</a>
						  </div>
						  <div class="swiper-slide">
							  <a href="{{route('news_detail')}}">
								<div class="title-img">
									<img src="{{('assets/img/ltn2.jpg')}}" alt=""/>
								</div>
								<p class="title-cat">Bundesliga</p>
								<h2 class="title-main">
									The Warm-Up: Bayern Who-nich? Check Out
								</h2>
								<div class="hr"></div>
								<p class="title-desc">
									Jack Lang digs through the wreckage of another Champions League car crash...
								</p>
							  </a>
						  </div>
						</div>
						<!-- Add Pagination -->
   				 		<div class="swiper-pagination pos-inherit mt-20"></div>
					</div>

				</div>

		  	</div>

		    <div class="team col-xs-12 ct">
				<div class="mt-15">
					<div class="post post-widget">
						<a class="post-img" href=""><img src="{{('assets/img/lt2.jpg')}}" alt=""></a>
						<div class="post-body">
							<p class="title-cat">Serie A</p>
							<h3 class="post-title">
								<a href="">
									Tell-A-Tool: Guide To Web Design And Development Tools
								</a>
							</h3>
						</div>
					</div>
					<div class="post post-widget">
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
					</div>
					<div class="clearfix"></div>
					<div class="text-center"> <p> --- loading more contents --- </p></div>
				</div>

			</div>
		    <div class="clearfix"></div>


	  </div>
	</div>
	@include('partials.footer')
    @stack('swiper')
</body>
</html>
