    @include('partials.header')
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
					<li class="active">
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
			<div class="col-xs-12">
		  		<div class="row">
			<div class="col-6">
			  <div class="mt-10 plr15">
				<div class="card-header tab-card-header">
				  <ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item active">
						<a href="{{route('matches')}}"  class="nav-link">
							<div class="btn-back"> Back </div>
						</a>
					</li>
				  </ul>
				</div>

				  <div class="tab-pane fade active p-3 in" id="one" aria-labelledby="one-tab">
						<div class="part">
						<div class="pt-title">Serie A</div>
						<img class="unite" src="{{('assets/img/slash.png')}}" alt="">

						<div class="col-xs-12 lm mt-10">
							<h5 class="text-center">24/11/2018 - 18:00 </h5>
							<h5 class="text-center text-grey">
								Stadium: ALLIANZ STADIUM - TORINO <br>
								Referee: FEDERICO LA PENNA
							</h5>
							<h5 class="text-center text-blue">FT</h5>
							<div class="col-xs-6 scrL">
								<img src="{{('assets/img/juventus_black.png')}}" alt="">
								<span>2</span>
								<br>
								<h4 class="tl">Juventus</h4>
								<p class="text-right text-small text-grey mr-10">
									Cristiano Ronaldo (29)<br>
									Mario Mandzukic (65)
								</p>
							</div>
							<div class="col-xs-6 scrR">
								<span>1</span>
								<img src="{{('assets/img/milan.png')}}" alt="">
								<br>
								<h4 class="tl">Milan</h4>
								<p class="text-small text-grey ml-10">
									Piatek (45)
								</p>
							</div>
							<div class="row">
								<div class="hr"></div>
							</div>
							<div class="row cm">
								<div class="col-xs-3 text-center">
									<a href="" class="">
										Timeline
									</a>
								</div>
								<div class="col-xs-3 text-center">
									<a href="" class="">
										Line-ups
									</a>
								</div>
								<div class="col-xs-3 text-center">
									<a href="" class="">
										<strong>Stats</strong>
									</a>
								</div>
								<div class="col-xs-3 text-center">
									<a href="" class="">
										Comments
									</a>
								</div>
							</div>
							<div class="row mt-10">
								<div class="hr"></div>
							</div>
							<div class="timeline">
								<div class="stat">
									<div data-type="title">Shots On Target</div>
									<div class="clearfix">
										<div class="col-xs-1 text-right pd-5 lh24">8</div>
										<div class="col-xs-5 pd-5">
											<div class="md-progress md-progress-container">
												<div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: 80%;"></div>
											</div>
										</div>
										<div class="col-xs-5 pd-5">
											<div class="md-progress md-progress-container">
												<div class="md-progress md-progress-bar" data-type="away-progress" style="width: 50%;"></div>
											</div>
										</div>
										<div class="col-xs-1 text-left pd-5 lh24">5</div>
									</div>
								</div>
								<div class="stat">
									<div data-type="title">Shots Off Target</div>
									<div class="clearfix">
										<div class="col-xs-1 text-right pd-5 lh24">12</div>
										<div class="col-xs-5 pd-5">
											<div class="md-progress md-progress-container">
												<div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: 65%;"></div>
											</div>
										</div>
										<div class="col-xs-5 pd-5">
											<div class="md-progress md-progress-container">
												<div class="md-progress md-progress-bar" data-type="away-progress" style="width: 75%;"></div>
											</div>
										</div>
										<div class="col-xs-1 text-left pd-5 lh24">18</div>
									</div>
								</div>
								<div class="stat">
									<div data-type="title">Ball Possesion (%)</div>
									<div class="clearfix">
										<div class="col-xs-1 text-right pd-5 lh24">58</div>
										<div class="col-xs-5 pd-5">
											<div class="md-progress md-progress-container">
												<div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: 58%;"></div>
											</div>
										</div>
										<div class="col-xs-5 pd-5">
											<div class="md-progress md-progress-container">
												<div class="md-progress md-progress-bar" data-type="away-progress" style="width: 42%;"></div>
											</div>
										</div>
										<div class="col-xs-1 text-left pd-5 lh24">42</div>
									</div>
								</div>
								<div class="stat">
									<div data-type="title">Corners</div>
									<div class="clearfix">
										<div class="col-xs-1 text-right pd-5 lh24">7</div>
										<div class="col-xs-5 pd-5">
											<div class="md-progress md-progress-container">
												<div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: 70%;"></div>
											</div>
										</div>
										<div class="col-xs-5 pd-5">
											<div class="md-progress md-progress-container">
												<div class="md-progress md-progress-bar" data-type="away-progress" style="width: 30%;"></div>
											</div>
										</div>
										<div class="col-xs-1 text-left pd-5 lh24">3</div>
									</div>
								</div>
							</div>
						</div>



						<div class="clearfix"></div>
					</div>
				  </div>

			  </div>
			</div>
  </div>
		  	</div>
		    <div class="clearfix"></div>


	  </div>
	</div>
    @include('partials.footer')
    @stack('click')
</body>
</html>
