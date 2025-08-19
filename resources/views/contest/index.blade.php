@include('partials.header_portal')
</head>

<body>
	<!--<div id="loader"><div id="spin"></div></div>-->
	<div class="">
    @include('partials.topmenubar_portal')
		<div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
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
			<!-- Contest List -->
			<div class="col-xs-12 lm ct">
		  		<h2 class="title2 mb-15">Score Prediction
					<a href="{{route('contest_history')}}" class="pull-right text-small">Score History</a>
				</h2>
		  	</div>
		  	<div class="col-xs-12 lm ct mt-10" style="padding: 10px 5px">
		  		<div class="col-xs-4 pl-5 pr-5">
					<a href="" class="btn btn-contest wd100" data-toggle="modal" data-target="#HowToPlay">
						How to Play
					</a>
				</div>
				<div class="col-xs-4 pl-5 pr-5">
					<a href="" class="btn btn-contest wd100" data-toggle="modal" data-target="#HowToPlay">
						Prize List
					</a>
				</div>
				<div class="col-xs-4 pl-5 pr-5">
					<a href="" class="btn btn-contest wd100" data-toggle="modal" data-target="#HowToPlay">
						Tips Prediction
					</a>
				</div>
		  	</div>
		  	<div class="col-xs-12 mt-10">
				<div class="title5">
					Current Prediction
				</div>
		  	</div>
		  	<div class="col-xs-12 lm ct mt-10 pd-0">
		  		<div class="ct-page">
					<a href="">
					<span style="position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%); background: rgba(0, 0, 0, 0.5); color: rgb(255, 255, 255); padding: 10px 20px; font-size: 20px; letter-spacing: 1px; border-radius: 5px;">Let's Play</span>
					</a>
					<div class="head">
						<div class="col-xs-7 pl-10 pr-5">
							<div class="left">
								<img src="{{('assets/img/league/uefa-champions-league.png')}}" height="34" alt="UEFA Champions League logo"/>
								&nbsp; Champions League
							</div>
						</div>
						<div class="col-xs-5 pr-10 pl-10 text-right">
							<div class="right">
								<div class="matchdate">Wednesday, 08/05/2019</div>
								<div class="stadium">
									Anfield Stadium &nbsp;
									<img src="{{('assets/img/thumb/ico-stadium.png')}}" alt="Stadium icon"/>
								</div>
						  </div>
						</div>
					</div>

					<div class="mid">
						<div class="col-xs-3 pd-0">
							<a href="{{route('team_detail')}}">
								<div class="square">
									<img src="{{('assets/img/club-liverpool.png')}}" height="60" alt="Liverpool FC Logo"/>
								</div>
							</a>
						</div>
						<div class="col-xs-6 pd-0">
							<div class="line">
								<div class="left">
									<h3>Liverpool</h3>
								</div>
								<div class="right">
									<h3>Barcelona</h3>
								</div>
							</div>
						</div>
						<div class="col-xs-3 pd-0">
							<a href="{{route('team_detail')}}">
								<div class="square2">
									<img src="{{('assets/img/barcelona.png')}}" height="60" alt="Barcelona FC Logo"/>
								</div>
							</a>
						</div>
					</div>

				</div>
				<div class="bt-page">
					<ul>
						<li>
							<strong>Prediction:</strong>
							<span class="pre-date"><strong>Start:</strong> 02/05/2019 &nbsp;&nbsp;|&nbsp;&nbsp; <strong>End:</strong> 07/05/2019 </span>
						</li>
						<li>
							<strong>User who play:</strong>
							<span class="pre-date">
								1. Mourinho  (4-2) &nbsp;
								2. Guardiola (3-1) &nbsp;
								3. Klop  (4-0) &nbsp;
							</span>
						</li>
						<li class="text-center">
							<a href="" class="btn btn-who" data-toggle="modal" data-target="#UserPlay">
								Show Who Play
							</a>
						</li>
					</ul>
				</div>
		  	</div>
		  	<div class="col-xs-12 mt-10">
				<div class="title5">
					Previous Prediction
				</div>
		  	</div>
		  	<div class="col-xs-12 lm ct mt-10 pd-0">
		  		<div class="ct-page">
					<div class="head finished">
						<div class="col-xs-7 pl-10 pr-5">
							<div class="left">
						    	<img src="{{('assets/img/league/serie-a.png')}}" class="" height="34" alt="Seria A League Logo"/>
								&nbsp; Serie A
							</div>
						</div>
						<div class="col-xs-5 pr-10 pl-10 text-right">
							<div class="right">
								<div class="matchdate">Friday, 12/05/2019</div>
								<div class="stadium">
									Alianz Stadium &nbsp;
									<img src="{{('assets/img/thumb/ico-stadium.png')}}" alt="Stadium icon"/>
								</div>
						  </div>
						</div>
					</div>
					<div class="mid">
						<div class="col-xs-3 pd-0">
							<a href="{{route('team_detail')}}">
								<div class="square">
							    	<img src="{{('assets/img/juventus_black.png')}}" height="60" alt="Juventus FC logo"/>
								</div>
							</a>
						</div>
						<div class="col-xs-6 pd-0">
							<div class="line">
								<div class="left">
									<h3>Juventus</h3>
								</div>
								<div class="right">
									<h3>Ac Milan</h3>
								</div>
							</div>
						</div>
						<div class="col-xs-3 pd-0">
							<a href="{{route('team_detail')}}">
								<div class="square2">
							    	<img src="{{('assets/img/milan.png')}}" height="60" alt="AC Milan logo"/>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="bt-page finished">
					<ul>
						<li>
							<strong>Prediction:</strong>
							<span class="pre-date clr-yellow"><strong>Finished</strong></span>
						</li>
						<li>
							<strong>User who play:</strong>
							<span class="pre-date">
								1. Buffon  (10 pts) &nbsp;
								2. C.Ronaldo (40 pts) &nbsp;
								3. Rajesh  (30 pts) &nbsp;
							</span>
						</li>
						<li class="text-center">
							<a href="" class="btn btn-who" data-toggle="modal" data-target="#UserPlay">
								Show Who Play
							</a>
						</li>
					</ul>
				</div>
		  	</div>
		  	<div class="clearfix"></div>
	  </div>
	</div>
    @include('partials.footernew')
	<!-- Modal in Contest -->
	<div id="HowToPlay" class="modal fade" role="dialog" style="display: none;">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h4 class="modal-title text-center">
				<img src="{{('assets/img/logo-goaly.png')}}" height="60" alt="Goaly logo">
			  </h4>
		  </div>
		  <div class="modal-body">
				<h3 class="mt-0">To enjoy play the game, click yes</h3>
				<p>
					This is subcription service for Goaly users who would like to enjoy our interactive prediction games where you can join and collect points to win our exclusive rewards of football merchendise and a chance to Win grand prize to watch Big match overseas.
				</p>
		  </div>
		  <div class="modal-footer">
			  <div class="col-xs-12 plfix">
				<a href="" class="text-center">
					<button type="button" class="btn-reg" data-dismiss="modal" >
						<strong>Close</strong>
					</button>
				</a>
			  </div>
		  </div>
		</div>

	  </div>
	</div>
	<div id="UserPlay" class="modal fade" role="dialog" style="display: none;">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h4 class="modal-title text-center">
				<img src="{{('assets/img/logo-goaly.png')}}" height="60" alt="Goaly logo">
			  </h4>
		  </div>
		  <div class="modal-body pt-0">
				<div class="standing">
				  <h2>User Play This Contest</h2>
					<table class="table table-striped table-responsive">
					    <tbody id="contestantTableBody">
					        <!-- Contestant rows will be dynamically added here -->
					    </tbody>
					</table>
				</div>
		  </div>
		  <div class="modal-footer">
			  <div class="col-xs-12 plfix">
				<a href="" class="text-center">
					<button type="button" class="btn-reg" data-dismiss="modal" >
						<strong>Close</strong>
					</button>
				</a>
			  </div>
		  </div>
		</div>
	  </div>
	</div>
</body>
</html>
