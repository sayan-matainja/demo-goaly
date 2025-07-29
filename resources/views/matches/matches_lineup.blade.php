@include('partials.header')

<link href="/assets/css/lineup.css" rel="stylesheet" />
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
						<img class="unite" src="{{('/assets/img/slash.png')}}" alt="">

						<div class="col-xs-12 lm mt-10">
                        <h5 class="text-center">{{$details['date_time']}}</h5>
							<h5 class="text-center text-grey">
								Stadium: {{$details['venue']['name']}}<br>
								Referee: {{$details['referee']['fullname']}}
							</h5>
							<h5 class="text-center text-blue">{{$details['status']}}</h5>
							<div class="col-xs-6 scrL">
								<img src="{{$details['homeTeam']['logo_path']}}" alt="">
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
										<strong>Line-ups</strong>
									</a>
								</div>
								<div class="col-xs-3 text-center">
									<a href="/matches-stat/{{$details['id']}}" class="">
										Stats
									</a>
								</div>
								<div class="col-xs-3 text-center">
									<a href="/matches-comment/{{$details['id']}}" class="">
										Comments
									</a>
								</div>
							</div>
							<div class="row mt-10">
								<div class="hr"></div>
							</div>
							<div class="timeline">
								<div class="field" data-type="lineup-field">
									<div class="home-info" data-type="home-info">
										<div class="name" data-type="team">
											<img src="{{$details['homeTeam']['logo_path']}}" height="24" alt=""/> &nbsp;{{$details['homeTeam']['name']}}
										</div>
										<div class="formation" data-type="formation">4-3-3</div>
									</div>
									<div class="field-wrap">
										<div class="corners">
											<div></div>
											<div></div>
											<div></div>
											<div></div>
										</div>
										<div class="middle"></div>
										<div class="circle"></div>
										<div class="center"></div>
										<div class="goal-box">
											<div></div>
											<div></div>
											<div></div>
										</div>
										<div class="goal-box goal-box-right">
											<div></div>
											<div></div>
											<div></div>
										</div>
										<div class="home" data-type="home-players">
                                        @foreach ($lineups as $lineup)
                                        @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==1)
                                            <div class="players-row" data-type="player-row" style="height: 88px;">
												<ul class="item" data-type="player-row-content">
													<li data-type="player-item">
														<div class="player" data-type="player-data">

															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
															<span class="evt evt2" data-type="player-bubble">
																<div class="yellow-card"></div>
															</span>
														</div>
														<div class="name" data-type="player-name">{{$lineup['player_name']}}</div>
													</li>
												</ul>
											</div>
                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==2)
                                            <div class="players-row" data-type="player-row" style="height: 88px;">
                                                <ul class="item" data-type="player-row-content">
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                        <span class="evt evt4" data-type="player-bubble">
                                                            <i class='fas fa-arrow-down text-red'></i>
                                                        </span>
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"></span> {{$lineup['player_name']}}
                                                    </div>
                                                </li>
                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==3)
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"></span> {{$lineup['player_name']}}
                                                    </div>
                                                </li>
                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==4)
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"></span>{{$lineup['player_name']}}
                                                    </div>
                                                </li>
                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==5)
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"></span> {{$lineup['player_name']}}
                                                    </div>
                                                </li>
                                            </ul>
                                            </div>
                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==6)
                                            <div class="players-row" data-type="player-row" style="height: 88px;">
												<ul class="item" data-type="player-row-content">
                                                    <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
															<span class="evt evt4" data-type="player-bubble">
																<i class='fas fa-arrow-down text-red'></i>
															</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"></span> {{$lineup['player_name']}}
														</div>
													</li>
                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==7)
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                        <span class="evt evt2" data-type="player-bubble">
                                                            <div class="yellow-card"></div>
                                                        </span>
                                                    </div>
                                                    <div class="name" data-type="player-name">{{$lineup['player_name']}}</div>
                                                </li>
                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==8)
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                        <span class="evt evt4" data-type="player-bubble">
                                                            <i class='fas fa-arrow-down text-red'></i>
                                                        </span>
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"></span> {{$lineup['player_name']}}
                                                    </div>
                                                </li>
                                            </ul>
											</div>
                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==9)
                                            <div class="players-row" data-type="player-row" style="height: 88px;">
												<ul class="item" data-type="player-row-content">
                                                   <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
														</div>
													</li>
                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==10)
                                               <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                        <span class="evt evt1" data-type="player-bubble">
                                                            <i class="far fa-futbol goal"></i>
                                                            <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"></span> {{$lineup['player_name']}}
                                                    </div>
                                                </li>

                                            @endif
                                            @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==11)
                                                    <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
															<span class="evt evt1" data-type="player-bubble">
																<i class="far fa-futbol goal"></i>
																<span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>
															</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"></span> {{$lineup['player_name']}}
														</div>
													</li>
												</ul>
											</div>
                                            @endif
                                        @endforeach
										</div>
                                        <div class="away" data-type="away-players">

                                        @foreach ($awaylineups as $lineup)
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==11)
                                        <div class="players-row" data-type="player-row" style="height: 88px;">
												<ul class="item" data-type="player-row-content">
                                            <li data-type="player-item">
                                                <div class="player" data-type="player-data">
                                                    <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                    <span class="evt evt4" data-type="player-bubble">
                                                        <i class='fas fa-arrow-down text-red'></i>
                                                    </span>
                                                </div>
                                                <div class="name" data-type="player-name">
                                                    <span class="hidden-xxs"></span>
                                                    <span class="visible-inline-xxs"></span> {{$lineup['player_name']}}
                                                </div>
                                            </li>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==10)
                                            <li data-type="player-item">
                                                <div class="player" data-type="player-data">
                                                    <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                    <span class="evt evt4" data-type="player-bubble">
                                                        <i class='fas fa-arrow-down text-red'></i>
                                                    </span>
                                                </div>
                                                <div class="name" data-type="player-name">
                                                    <span class="hidden-xxs"></span>
                                                    <span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
                                                </div>
                                            </li>
                                            </ul>
										</div>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==9)
                                        <div class="players-row" data-type="player-row" style="height: 88px;">
										<ul class="item" data-type="player-row-content">
                                            <li data-type="player-item">
                                                <div class="player" data-type="player-data">
                                                    <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                </div>
                                                <div class="name" data-type="player-name">
                                                    <span class="hidden-xxs"></span>
                                                    <span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
                                                </div>
                                            </li>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==8)
                                        <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
														</div>
													</li>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==7)
                                        <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
															<span class="evt evt1" data-type="player-bubble">
																<i class="far fa-futbol goal"></i>
															</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
														</div>
													</li>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==6)
                                        <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
															<span class="evt evt4" data-type="player-bubble">
																<i class='fas fa-arrow-down text-red'></i>
															</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
														</div>
													</li>
                                                    </ul>
											</div>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==5)
                                        <div class="players-row" data-type="player-row" style="height: 88px;">
												<ul class="item" data-type="player-row-content">
                                                <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
														</div>
													</li>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==4)
                                        <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
															<span class="evt evt2" data-type="player-bubble">
																<div class="red-card"></div>
															</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
														</div>
													</li>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==3)
                                        <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
														</div>
													</li>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==2)
                                        <li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
														</div>
													</li>
												</ul>
											</div>
                                        @endif
                                        @if($details['awayTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==1)
                                        <div class="players-row" data-type="player-row" style="height: 88px;">
												<ul class="item" data-type="player-row-content">
													<li data-type="player-item">
														<div class="player" data-type="player-data">
															<span class="number" data-type="player-number">{{$lineup['number']}}</span>
														</div>
														<div class="name" data-type="player-name">
															<span class="hidden-xxs"></span>
															<span class="visible-inline-xxs"> </span> {{$lineup['player_name']}}
														</div>
													</li>
												</ul>
											</div>
                                        @endif
                                        @endforeach
										</div>
									</div>
									<div class="away-info" data-type="away-info">
										<div class="name" data-type="team">
											<img src="{{$details['awayTeam']['logo_path']}}" height="24" alt=""/>
											&nbsp;{{$details['awayTeam']['name']}}
										</div>
										<div class="formation" data-type="formation">4-4-2</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-xs-12 lm mt-10 timeline">
							<h4>Subtitutions</h4>
							<div class="mb-10">
								<img src="{{$details['homeTeam']['logo_path']}}" height="34" alt=""/>
								&nbsp; {{$details['homeTeam']['name']}}
							</div>
                            @foreach ($lineups as $lineup)
                            @if($details['homeTeam']['id']==$lineup['team_id'])
                            <div class="match-row">
								<div class="tm">{{$lineup['number']}}</div>
								<div class="pn">{{$lineup['player_name']}}</div>
                                <div class="sc">
									<i class='fas fa-arrow-up text-green'></i>
								</div>
							</div>
                            @endif
                            @endforeach
							<!-- <div class="match-row">
								<div class="tm">6'</div>
								<div class="pn">Dejan Lovren</div>
							</div>
							<div class="match-row">
								<div class="tm">8'</div>
								<div class="pn">Naby Keita</div>
								<div class="sc">
									<i class='fas fa-arrow-up text-green'></i>
								</div>
							</div>
							<div class="match-row">
								<div class="tm">14'</div>
								<div class="pn">Jordan Henderson</div>
								<div class="sc">
									<i class='fas fa-arrow-up text-green'></i>
								</div>
							</div>
							<div class="match-row">
								<div class="tm">15'</div>
								<div class="pn">Daniel Sturridge</div>
								<div class="sc">
									<i class='fas fa-arrow-up text-green'></i>
								</div>
							</div>
							<div class="match-row">
								<div class="tm">1'</div>
								<div class="pn">Simon Mignolet</div>
							</div>
							<div class="match-row">
								<div class="tm">23'</div>
								<div class="pn">Xherdan Shaqiri</div>
							</div>
							<div class="match-row">
								<div class="tm">27'</div>
								<div class="pn">Divock Origi</div>
							</div> -->

							<div class="mb-10 mt-15">
								<img src="{{$details['awayTeam']['logo_path']}}" height="34" alt=""/>
								&nbsp; {{$details['awayTeam']['name']}}
							</div>
                            @foreach ($lineups as $lineup)
                            @if($details['awayTeam']['id']==$lineup['team_id'])
                            <div class="match-row">
								<div class="tm">{{$lineup['number']}}</div>
								<div class="pn">{{$lineup['player_name']}}</div>
                                <div class="sc">
									<i class='fas fa-arrow-up text-green'></i>
								</div>
							</div>
                            @endif
                            @endforeach
							<!-- <div class="match-row">
								<div class="tm">2'</div>
								<div class="pn">Matthew Lowton</div>
							</div>
							<div class="match-row">
								<div class="tm">7'</div>
								<div class="pn">Johann Gudmundsson</div>
								<div class="sc">
									<i class='fas fa-arrow-up text-green'></i>
									<i class="far fa-futbol goal"></i>
								</div>
							</div>
							<div class="match-row">
								<div class="tm">14'</div>
								<div class="pn">Robbie Brady</div>
							</div> -->
							<br>
						</div>

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
