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
			<!-- News -->
			<div class="col-xs-12 ct">
				<div class="mb-10 mt-12">
		   			<div class="swiper-container">
						<div class="swiper-wrapper">
						  <div class="swiper-slide news-desc">
								<p class="title-cat">UEFA Champions League</p>
								<h2 class="title-main">
									Reds complete English quartet in last eight
								</h2>
								<div class="title-img">
									<img src="{{('assets/img/ltn1.jpg')}}" alt=""/>
								</div>
								<div class="hr"></div>
								<p>	Liverpool's 3-1 victory at Bayern Munich means that there will be four 		Premier League teams in the quarter-finals of the UEFA Champions 		League.
								</p>
								<p>
									Sadio Mane scored a brace and Virgil van Dijk got the other goal for a 3-1 aggregate win that sends Liverpool into the last eight along with Manchester City, Manchester United and Tottenham Hotspur.
								</p>
								<p>
									City beat Schalke 10-2 on aggregate on Tuesday, while United claimed a dramatic 3-1 win at Paris Saint-Germain last week to go through on away goals.
								</p>
								<p>
									Spurs also triumphed against German opposition, easing past Borussia Dortmund 4-0 on aggregate last week.
								</p>
							  	<p>
							  		The four will find out their last-eight opponents on Friday, when the semi-final draw will also be made.
							    </p>
							  	<p>
							  		The other four teams in the quarter-finals are: Ajax, Barcelona, Juventus and Porto.
							    </p>
							  	<p>
							  		This is the first time in 10 years that there have been as many English teams at this stage of the competition.
							    </p>
							    <p>
							    	In 2009, Arsenal, Chelsea, Liverpool and Man Utd got through to the last eight.
							    </p>
							  	<br>
						  </div>
						</div>
					</div>

				</div>

		  	</div>

		    <div class="team col-xs-12 ct">
				<div class="part ml15">
					<div class="pt-title">Related Articles</div>
					<img class="unite" src="{{('assets/img/slash.png')}}" alt="">
				</div>
				<div class="mt-15">
					<!--<div class="title3">Related Articles</div>-->

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
					<div class="mt-10 mb-15">
						<a href="{{route('news')}}">
							<button type="button" class="btn-reg">&nbsp; More News</button>
						</a>
					</div>

				</div>

			</div>


	  </div>
	</div>
	@include('partials.footer')
    @stack('swiper')
</body>
</html>
