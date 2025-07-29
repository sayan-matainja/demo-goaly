@include('partials.header_portal')
</head>
<body>
	<div class="">
	@include('partials.topmenubar_portal')
		<div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
	  <div class="page-content mt-10">
			<!-- News -->
			<div class="col-xs-12 ct">
				<div class="mb-10">
					<div class="part ml15">
						<div class="pt-title">Leaderboard</div>
						<img class="unite" src="{{('assets/img/slash.png')}}" alt="">
					</div>
                    @foreach ($general as $key=> $data )
                    <!--  -->
					<div class="">
                        @if ($key == 0)
					<div class="pb-0">
						<div class="lead-info mb-0">
							<h5>
								Contest: {{isset($data['history']['homeTeamName'])?$data['history']['homeTeamName']:''}} Vs {{isset($data['history']['awayTeamName'])?$data['history']['awayTeamName']:''}}
								<span class="seemore"><a href="{{route('leaderboard_detail')}}">View</a></span>
							</h5>
						</div>
					</div>
                    @endif
					<div class="leaderboard">
						<div class="table-responsive">
							<table class="table v2">
								<tbody>
								  <tr>
									<td width="10%">
										<div class="set-img">
											<img src="{{isset($data['image'])?$data['image']:''}}" class="img-circle" alt="">
										</div>

									</td>
									<td width="80%">
										<div class="top">
											<span class="text-orange">{{$key+1}}.</span> {{isset($data['name'])?$data['name']:''}}
										</div>
										<div class="mid">
											<hr width="90%">
										</div>
										<div class="botm">
											<p class="badge text-small clr-orange">Score</p>
											<p class="mt-3"> {{isset($data['wins'])?$data['wins']:''}} </p>
											<p class="badge text-small clr-orange">Time</p>
											<p class="mt-3">01:57:72</p>
											<!--<p class="badge text-small clr-orange">Attempt</p>
											<p class="mt-3">17 / 20</p>-->
										</div>
									</td>

									<td class="text-coin"> {{isset($data['coins'])?$data['coins']:''}} Coin</td>
								  </tr>



								</tbody>
							</table>
						</div>


					</div>
                    @endforeach
                    @foreach ($weekly as $key=> $data )
					<div class="pb-0">

						<div class="lead-info mb-0">
                        <h5>
								Contest: {{isset($data['history']['homeTeamName'])?$data['history']['homeTeamName']:''}} Vs {{isset($data['history']['awayTeamName'])?$data['history']['awayTeamName']:''}}
								<span class="seemore"><a href="{{route('leaderboard_detail')}}">View</a></span>
							</h5>
						</div>
					</div>
					<div class="leaderboard">
						<div class="table-responsive">
							<table class="table v2">
                            <tbody>
								  <tr>
									<td width="10%">
										<div class="set-img">
											<img src="{{isset($data['image'])?$data['image']:''}}" class="img-circle" alt="">
										</div>

									</td>
									<td width="80%">
										<div class="top">
											<span class="text-orange">{{$key+1}}.</span> {{isset($data['name'])?$data['name']:''}}
										</div>
										<div class="mid">
											<hr width="90%">
										</div>
										<div class="botm">
											<p class="badge text-small clr-orange">Score</p>
											<p class="mt-3"> {{isset($data['wins'])?$data['wins']:''}} </p>
											<p class="badge text-small clr-orange">Time</p>
											<p class="mt-3">01:57:72</p>
											<!--<p class="badge text-small clr-orange">Attempt</p>
											<p class="mt-3">17 / 20</p>-->
										</div>
									</td>

									<td class="text-coin"> {{isset($data['coins'])?$data['coins']:''}} Coin</td>
								  </tr>



								</tbody>
							</table>
						</div>


					</div>
                    @endforeach
                    @foreach ($monthly as $key=> $data )
					<div class="pb-0">

						<div class="lead-info mb-0">
                        <h5>
								Contest: {{isset($data['history']['homeTeamName'])?$data['history']['homeTeamName']:''}} Vs {{isset($data['history']['awayTeamName'])?$data['history']['awayTeamName']:''}}
								<span class="seemore"><a href="{{route('leaderboard_detail')}}">View</a></span>
							</h5>
						</div>
					</div>
					<div class="leaderboard">
						<div class="table-responsive">
							<table class="table v2">
                            <tbody>
								  <tr>
									<td width="10%">
										<div class="set-img">
											<img src="{{isset($data['image'])?$data['image']:''}}" class="img-circle" alt="">
										</div>

									</td>
									<td width="80%">
										<div class="top">
											<span class="text-orange">{{$key+1}}.</span> {{isset($data['name'])?$data['name']:''}}
										</div>
										<div class="mid">
											<hr width="90%">
										</div>
										<div class="botm">
											<p class="badge text-small clr-orange">Score</p>
											<p class="mt-3"> {{isset($data['wins'])?$data['wins']:''}} </p>
											<p class="badge text-small clr-orange">Time</p>
											<p class="mt-3">01:57:72</p>
											<!--<p class="badge text-small clr-orange">Attempt</p>
											<p class="mt-3">17 / 20</p>-->
										</div>
									</td>

									<td class="text-coin"> {{isset($data['coins'])?$data['coins']:''}} Coin</td>
								  </tr>



								</tbody>
							</table>
						</div>


					</div>
                    @endforeach
					<div class="clearfix"></div>
				</div>
				</div>

		  	</div>
	  </div>
	</div>
	<script >
	var translations ={
            'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',
        };
	</script>
	@include('partials.footernew')
    @stack('toggleIcon')
</body>
</html>
