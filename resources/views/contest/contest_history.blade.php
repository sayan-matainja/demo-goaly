
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
							<span class="text-small">{{ trans('lang.Home') }}</span>
						</a>
					</li>
					<li class="active">
						<a href="{{route('contest')}}" class="ingrid">
							<i class="fas fa-history text-center"></i>
							<span class="text-small">{{ trans('lang.Contest') }}</span>
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
			<!-- Contest History -->
		  	<div class="col-xs-12 lm ct">
		  		<h2 class="title2">Score History
					<a href="{{route('contest')}}" class="stand btn btn-default chk2" style="margin: -10px 0;">
						<i class="fas fa-arrow-left"></i>&nbsp; Back
					</a>
				</h2>
				<div class="hr"></div>
				<div class="mb-10">
		   			<div class="lm">
						<div class="col-xs-4 pd-0">
							<div class="thumb">
								<div class="cover-bg"
								   style="background-image: url('assets/img/live2.jpg')">
							  </div>
							</div>
						</div>
						<div class="col-xs-4 scrL">
							<img src="{{('assets/img/juventus_black.png')}}" alt="">
							<span>2</span>
							<h4 class="tl mt-10">Juventus</h4>
						</div>
						<div class="col-xs-4 scrR">
							<span>1</span>
							<img src="{{('assets/img/milan.png')}}" alt="">
							<h4 class="tl mt-10">Milan</h4>
							<span class="wnlist modal-sm" data-toggle="modal" data-target="#myModal">
								Winner List
							</span>
						</div>
					</div>
				</div>
				<div class="hr"></div>
				<div class="mb-10">
		   			<div class="lm">
						<div class="col-xs-4 pd-0">
							<div class="thumb">
								<div class="cover-bg"
								   style="background-image: url('assets/img/gl2.jpg')">
							  </div>
							</div>
						</div>
						<div class="col-xs-4 scrL">
							<img src="{{('assets/img/bayern-munich.png')}}" alt="">
							<span>0</span>
							<h4 class="tl mt-10">Bayern Munich</h4>
						</div>
						<div class="col-xs-4 scrR">
							<span>3</span>
							<img src="{{('assets/img/leverkusen.png')}}" alt="">
							<h4 class="tl mt-10">Leverkusen</h4>
							<span class="wnlist modal-sm" data-toggle="modal" data-target="#myModal">
								Winner List
							</span>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
		  	</div>

	  </div>
	</div>
    @include('partials.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function($) {
			$(".clickable-row").click(function() {
				window.location = $(this).data("href");
			});
		});
	</script>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Juventus Vs Milan </h4>
		  </div>
		  <div class="modal-body">
			 <div class="leaderboard">
				<div class="table-responsive">
					<table class="table v2 no-bdrad">
						<tbody>
						  <tr>
							<td width="10%">
								<div class="set-img">
									<img src="{{('assets/img/acc-default.png')}}" class="img-circle" alt="">
								</div>
							</td>
							<td width="80%" class="vmid">
								<div>
									<span class="text-orange">1.</span> Debasish Midya
								</div>
							</td>
							<td class="text-coin">550 Coin</td>
						  </tr>
						  <tr>
							<td width="10%">
								<div class="set-img">
									<img src="{{('assets/img/acc-default2.png')}}" class="img-circle" alt="">
								</div>
							</td>
							<td width="80%" class="vmid">
								<div>
									<span class="text-orange">2.</span> Aldo
								</div>
							</td>
							<td class="text-coin">540 Coin</td>
						  </tr>
						  <tr>
							<td width="10%">
								<div class="set-img">
									<img src="{{('assets/img/acc-default.png')}}" class="img-circle" alt="">
								</div>
							</td>
							<td width="80%" class="vmid">
								<div>
									<span class="text-orange">3.</span> Fajar
								</div>
							</td>
							<td class="text-coin">280 Coin</td>
						  </tr>
						  <tr>
							<td width="10%">
								<div class="set-img">
									<img src="{{('assets/img/acc-default.png')}}" class="img-circle" alt="">
								</div>
							</td>
							<td width="80%" class="vmid">
								<div>
									<span class="text-orange">4.</span> Gondo
								</div>
							</td>
							<td class="text-coin">250 Coin</td>
						  </tr>
						  <tr>
							<td width="10%">
								<div class="set-img">
									<img src="{{('assets/img/acc-default.png')}}" class="img-circle" alt="">
								</div>
							</td>
							<td width="80%" class="vmid">
								<div>
									<span class="text-orange">5.</span> Revataka
								</div>
							</td>
							<td class="text-coin">240 Coin</td>
						  </tr>
						  <tr>
							<td width="10%">
								<div class="set-img">
									<img src="{{('assets/img/acc-default2.png')}}" class="img-circle" alt="">
								</div>
							</td>
							<td width="80%" class="vmid">
								<div>
									<span class="text-orange">6.</span> String Fellow
								</div>
							</td>
							<td class="text-coin">150 Coin</td>
						  </tr>
						</tbody>
					</table>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>
</body>
</html>
