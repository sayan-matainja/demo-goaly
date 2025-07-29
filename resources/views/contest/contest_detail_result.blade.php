@include('partials.header')

  </head>

<body>
	<!--<div id="loader"><div id="spin"></div></div>-->

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
					<li class="active">
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
					<li>
						<a href="{{route('news')}}" class="ingrid">
							<i class="far fa-newspaper text-center"></i>
							<span class="text-small">News</span>
						</a>
					</li>
				</ul>
			</div>
		  	<div class="clearfix"></div>
			<!-- Contest Detail -->
			<div class="col-xs-12 lm ct">
				<div class="col-xs-12 pd-0">
					<h2>Answer Review</h2>
				</div>
				<div class="hr"></div>
				<div class="col-xs-12 bg-grey mb-10">
					<h1 class="text-center m-0"><strong>Thank You</strong></h1>
					<p>
						<strong>Your Answer</strong>
					</p>
					<p>
						1. Can you predict the score between Juventus vs Ac Milan at Allianz Stadium 10/14/2018? <br>
						<h4><em><strong>2-1</strong></em></h4>
					</p>
					<p>
						2. Which one has higher ball possession between Juventus vs Ac Milan? <br>
						<h4><em><strong>55%-45%</strong></em></h4>
					</p>
		  			<p>
						3. Which one that scores goals first between Juventus vs Ac Milan? <br>
						<h4><em><strong>AC Milan</strong></em></h4>
					</p>
				</div>
			  	<div class="clearfix"></div>
				<div class="col-xs-4 pd-0">
					<a href="{{route('home')}}" class="btn btn-primary btn-ct black">Back Home</a>
				</div>
				<div class="col-xs-4 pd-0">
					<a href="{{route('contest')}}" class="btn btn-primary btn-ct cyan">Start Another</a>
				</div>
				<div class="col-xs-4 pd-0">
					<a href="{{route('reward')}}" class="btn btn-primary btn-ct bg-orange">Next Question</a>
				</div>
		  	</div>
		    <div class="clearfix"></div>


	  </div>
	</div>
	@include('partials.footer')


</body>
</html>
