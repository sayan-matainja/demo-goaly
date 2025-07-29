@include('partials.header')

  </head>

<body>
	<!--<div id="loader"><div id="spin"></div></div>-->

	<div class="">
    @include('partials.topmenubar')

		<div class="clearfix"></div>
		{{--<?php include('inc_leftmenu.php'); ?>--}}
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
                        <h5 class="text-center">{{$details['date_time']}}</h5>
							<h5 class="text-center text-grey">
								Stadium: {{$details['venue']['name']}}<br>
								Referee: {{$details['referee']['fullname']}}
							</h5>
							<h5 class="text-center text-blue">{{$details['status']}}</h5>
							<div class="col-xs-6 scrL">
                                <a href="{{route('team_detail')}}">
									<img src="{{$details['homeTeam']['logo_path']}}" alt="">
								</a>
								<span>{{$details['homeTeam']['score']}}</span>
								<br>
								<h4 class="tl">{{$details['homeTeam']['name']}}</h4>
								<p class="text-right text-small text-grey mr-10">
                                @foreach ($details['goals'] as $value )
                                @if($details['homeTeam']['id']==$value['team_id'])
                                {{$value['player_name']}}({{$value['minute']}})<br>
                                @endif
                                @endforeach
								</p>
							</div>
							<div class="col-xs-6 scrR">
                                <span>{{$details['awayTeam']['score']}}</span>
								<img src="{{$details['awayTeam']['logo_path']}}" alt="">
								<br>
								<h4 class="tl">{{$details['awayTeam']['name']}}</h4>
								<p class="text-small text-grey ml-10">
                                @foreach ($details['goals'] as $value )
                                @if($details['awayTeam']['id']==$value['team_id'])
                                {{$value['player_name']}}({{$value['minute']}})<br>
                                @endif
                                @endforeach
								</p>
							</div>
							<div class="row">
								<div class="hr"></div>
							</div>
							<div class="row cm">
								<div class="col-xs-3 text-center">
									<a href="/matches-timeline/{{$details['id']}}" class="">
										Timeline
									</a>
								</div>
								<div class="col-xs-3 text-center">
									<a href="/matches-lineup/{{$details['id']}}" class="">
										Line-ups
									</a>
								</div>
								<div class="col-xs-3 text-center">
									<a href="/matches-stat/{{$details['id']}}" class="">
										Stats
									</a>
								</div>
								<div class="col-xs-3 text-center">
									<a href="/matches-comment/{{$details['id']}}" class="">
										<strong>Comments</strong>
									</a>
								</div>
							</div>
							<div class="row mt-10">
								<div class="hr"></div>
							</div>
							<div class="timeline">
								<div class="overflow">
									<ul class="chat">
                                    @foreach ($comments as $comment )
										<li class="left clearfix"><span class="chat-img pull-left">
											<img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
										</span>
											<div class="chat-body clearfix">
												<div class="header">
													<strong class="primary-font">
                                                        @if(str_contains($comment['comment'],"Foul"))
                                                        FOUL
                                                        @elseif(str_contains($comment['comment'],"foul"))
                                                        FOUL
                                                        @elseif (str_contains($comment['comment'],"free kick"))
                                                        FREE KICK
                                                        @elseif (str_contains($comment['comment'],"Substitution"))
                                                        SUBSTITUTION
                                                        @elseif (str_contains($comment['comment'],"yellow card"))
                                                        YELLOW CARD
                                                        @elseif (str_contains($comment['comment'],"Corner"))
                                                        CORNER
                                                        @elseif (str_contains($comment['comment'],"Goal"))
                                                        GOAL
                                                        @elseif (str_contains($comment['comment'],"finished"))
                                                        FINISHED
                                                        @elseif (str_contains($comment['comment'],"Hand"))
                                                        HAND
                                                        @elseif (str_contains($comment['comment'],"Miss"))
                                                        MISSED CHANCE
                                                        @elseif (str_contains($comment['comment'],"Offside"))
                                                        OFFSIDE
                                                        @else
                                                        {{explode(' ',trim($comment['comment']))[0]}} {{explode(' ',trim($comment['comment']))[1]}}
                                                        @endif
                                                    </strong> <small class="pull-right text-muted">
														<span class="glyphicon glyphicon-time"></span>{{$comment['minute']}} mins ago</small>
												</div>
												<p>
													{{$comment['comment']}}
												</p>
											</div>
										</li>
                                    @endforeach
										<!--<li class="right clearfix"><span class="chat-img pull-right">
											<img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="img-circle">
										</span>
											<div class="chat-body clearfix">
												<div class="header">
													<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
													<strong class="pull-right primary-font">Bhaumik Patel</strong>
												</div>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
													dolor, quis ullamcorper ligula sodales.
												</p>
											</div>
										</li>-->
										<li class="left clearfix"><span class="chat-img pull-left">
											<img src="{{('/assets/img/acc-default.png')}}" alt="User Avatar" class="img-circle" height="50">
										</span>
											<div class="chat-body clearfix">
												<div class="header">
													<strong class="primary-font">Other Sparrow</strong> <small class="pull-right text-muted">
														<span class="glyphicon glyphicon-time"></span>14 mins ago</small>
												</div>
												<p>
													HAhahahaha
												</p>
											</div>
										</li>
										<li class="left clearfix"><span class="chat-img pull-left">
											<img src="{{('/assets/img/acc-default2.png')}}" alt="User Avatar" class="img-circle" height="50">
										</span>
											<div class="chat-body clearfix">
												<div class="header">
													<strong class="primary-font">Yele Ojo</strong> <small class="pull-right text-muted">
														<span class="glyphicon glyphicon-time"></span>12 mins ago</small>
												</div>
												<p>
													How many  square feet ?  Cost to fabricate ?  Would this be concidered unreenforced concrete ?
												</p>
											</div>
										</li>
										<li class="left clearfix"><span class="chat-img pull-left">
											<img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
										</span>
											<div class="chat-body clearfix">
												<div class="header">
													<strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
														<span class="glyphicon glyphicon-time"></span>12 mins ago</small>
												</div>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipiscing elit.
												</p>
											</div>
										</li>
										<li class="left clearfix"><span class="chat-img pull-left">
											<img src="{{('/assets/img/acc-default.png')}}" alt="User Avatar" class="img-circle" height="50">
										 </span>
											<div class="chat-body clearfix">
												<div class="header">
													<strong class="primary-font">Other Sparrow</strong> <small class="pull-right text-muted">
														<span class="glyphicon glyphicon-time"></span>14 mins ago</small>
												</div>
												<p>
													HAhahahaha
												</p>
											</div>
										</li>
										<li class="left clearfix"><span class="chat-img pull-left">
											<img src="{{('assets/img/acc-default2.png')}}" alt="User Avatar" class="img-circle" height="50">
										</span>
											<div class="chat-body clearfix">
												<div class="header">
													<strong class="primary-font">Yele Ojo</strong> <small class="pull-right text-muted">
														<span class="glyphicon glyphicon-time"></span>12 mins ago</small>
												</div>
												<p>
													How many  square feet ?  Cost to fabricate ?  Would this be concidered unreenforced concrete ?
												</p>
											</div>
										</li>
									</ul>
								</div>
								<div class="panel-footer">
									<div class="input-group">
										<input id="btn-input" type="text" class="form-control input-sm form-chat" placeholder="Type your message here..." />
										<span class="input-group-btn">
											<button class="btn btn-warning btn-sm" id="btn-chat">
												Send</button>
										</span>
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
	{{--<?php include('inc_footer.php'); ?>--}}
    @include('partials.footer')
    @stack('click')
</body>
</html>
