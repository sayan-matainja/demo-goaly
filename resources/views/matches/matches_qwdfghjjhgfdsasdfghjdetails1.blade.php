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
                        <div class="part">
                            <div class="pt-title">Serie A</div>
                            <img class="unite" src="{{('/assets/img/slash.png')}}" alt="">
                            <div class="col-xs-12 lm mt-10">
                                <h5 class="text-center">{{(isset($details['date_time']) ? $details['date_time']: '')}}</h5>
                                <h5 class="text-center text-grey">
                                    Stadium: {{(isset($details['venue']['name']) ? $details['venue']['name']: '')}}<br>
                                    Referee: {{(isset($details['referee']['fullname']) ? $details['referee']['fullname']: '')}}
                                </h5>
                                <h5 class="text-center text-blue">{{(isset($details['status']) ? $details['status']: '-')}}</h5>
                                <div class="col-xs-6 scrL">
                                    <a href="{{route('team_detail')}}">
                                        <img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '-')}}" alt="">
                                    </a>
                                    <span>{{(isset($details['homeTeam']['score']) ? $details['homeTeam']['score']: '')}}</span>
                                    <br>
                                    <h4 class="tl">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}}</h4>
                                    <p class="text-right text-small text-grey mr-10">
                                    @if($details)
                                    @foreach ($details['goals'] as $value )
                                    @if($details['homeTeam']['id']==$value['team_id'])
                                    {{$value['player_name']}}({{$value['minute']}})<br>
                                    @endif
                                    @endforeach
                                    @endif
                                    </p>
                                </div>
                                <div class="col-xs-6 scrR">
                                    <span>{{(isset($details['awayTeam']['score']) ? $details['awayTeam']['score']: '')}}</span>
                                    <img src="{{(isset($details['awayTeam']['logo_path']) ? $details['awayTeam']['logo_path']: '-')}}" alt="">
                                    <br>
                                    <h4 class="tl">{{(isset($details['awayTeam']['name']) ? $details['awayTeam']['name']: '')}}</h4>
                                    <p class="text-small text-grey ml-10">
                                    @if ($details)
                                    @foreach ($details['goals'] as $value )
                                    @if($details['awayTeam']['id']==$value['team_id'])
                                    {{$value['player_name']}}({{$value['minute']}})<br>
                                    @endif
                                    @endforeach
                                    @endif
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="hr"></div>
                                </div>
                                <div class="row cm">
                                    <div class="col-xs-3 text-center">
                                    <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="" aria-selected="true">
                                        <strong>Timeline</strong>
                                    </a>
                                    </div>
                                    <div class="col-xs-3 text-center">
                                    <a class="nav-link" id="tow-tab"  data-toggle="tab" href="#two" role="tab" aria-controls="" aria-selected="false">
                                        <strong>Line-ups</strong>
                                        </a>
                                    </div>
                                    <div class="col-xs-3 text-center">
                                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="" aria-selected="false">
                                    <strong>Stats</strong>
                                    </a>
                                    </div>
                                    <div class="col-xs-3 text-center"><a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="" aria-selected="false">
                                        <strong>Comments</strong>
                                    </a>
                                    </div>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade p-3 active in" id="one" aria-labelledby="one-tab">
                                        <div class="row mt-10">
                                            <div class="hr"></div>
                                        </div>
                                        <div class="timeline">
                                            @if ($details)
                                            <div class="text-center mb-10">Match Details:</div>
                                            @foreach ($details['goals'] as $value )
                                            @if($details['homeTeam']['id']==$value['team_id'])
                                            <div class="match-row">
                                                <div class="tm">{{$value['minute']}}'</div>
                                                <div class="pn_home">{{$value['player_name']}}</div>
                                                <div class="sc"> <span class="card-yellow"></span> </div>
                                                <div class="pn_away">&nbsp;</div>
                                            </div>
                                            @else
                                            <div class="match-row">
                                                <div class="tm">{{$value['minute']}}'</div>
                                                <div class="pn_home">&nbsp;</div>
                                                <div class="sc"> <span class="red-yellow"></span></div>
                                                <div class="pn_away">{{$value['player_name']}}</div>
                                            </div>
                                            @endif
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-3" id="two" aria-labelledby="two-tab">
                                        @if ($details)
                                        {{--Line-ups --}}
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
                                                                            @if($lineup['stats']['goals']['scored']>0)
                                                                            <span class="evt evt1" data-type="player-bubble">
                                                                            <i class="far fa-futbol goal"></i>
                                                                            <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>
                                                                            </span>
                                                                            @endif
                                                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                                            <span class="evt evt2" data-type="player-bubble">
                                                                                <div class="yellow-card"></div>
                                                                            </span>
                                                                            @endif
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
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                    @endif
                                                                    @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                    @endif
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
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                @endif
                                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                    @endif
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
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                @endif
                                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                    @endif
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
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                @endif
                                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                    @endif
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
                                                                        @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                @endif
                                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                    @endif
                                                                        <!-- <span class="evt evt4" data-type="player-bubble">
                                                                            <i class='fas fa-arrow-down text-red'></i>
                                                                        </span> -->
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
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                @endif
                                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                                <div class="name" data-type="player-name">{{$lineup['player_name']}}</div>
                                                            </li>
                                                        @endif
                                                        @if($details['homeTeam']['id']==$lineup['team_id'] && $lineup['formation_position']==8)
                                                            <li data-type="player-item">
                                                                <div class="player" data-type="player-data">
                                                                    <span class="number" data-type="player-number">{{$lineup['number']}}</span>
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                    @endif
                                                                    @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                    @endif
                                                                    <!-- <span class="evt evt4" data-type="player-bubble">
                                                                        <i class='fas fa-arrow-down text-red'></i>
                                                                    </span> -->
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
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                        <span class="evt evt1" data-type="player-bubble">

                                                                            <i class="far fa-futbol goal"></i>
                                                                            <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                        </span>
                                                                    @endif
                                                                    @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                    @endif
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
                                                                @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                @endif
                                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                @endif
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
                                                                        @if($lineup['stats']['goals']['scored']>0)
                                                                        <span class="evt evt1" data-type="player-bubble">

                                                                            <i class="far fa-futbol goal"></i>
                                                                            <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                        </span>
                                                                        @endif
                                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                                            <span class="evt evt2" data-type="player-bubble">
                                                                                <div class="yellow-card"></div>
                                                                            </span>
                                                                        @endif
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
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                @endif
                                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                @endif
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
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                @endif
                                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                @endif
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
                                                                    @if($lineup['stats']['goals']['scored']>0)
                                                                    <span class="evt evt1" data-type="player-bubble">

                                                                        <i class="far fa-futbol goal"></i>
                                                                        <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                    </span>
                                                                @endif
                                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                @endif
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
                                                                            @if($lineup['stats']['goals']['scored']>0)
                                                                            <span class="evt evt1" data-type="player-bubble">

                                                                                <i class="far fa-futbol goal"></i>
                                                                                <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                            </span>
                                                                             @endif
                                                                             @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                @endif
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
                                                                            @if($lineup['stats']['goals']['scored']>0)
                                                                            <span class="evt evt1" data-type="player-bubble">

                                                                                <i class="far fa-futbol goal"></i>
                                                                                <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                            </span>
                                                                             @endif
                                                                             @if($lineup['stats']['cards']['yellowcards']>0)
                                                                    <span class="evt evt2" data-type="player-bubble">
                                                                        <div class="yellow-card"></div>
                                                                    </span>
                                                                @endif
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
                                                                            @if($lineup['stats']['goals']['scored']>0)
                                                                            <span class="evt evt1" data-type="player-bubble">

                                                                                <i class="far fa-futbol goal"></i>
                                                                                <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                            </span>
                                                                            @endif
                                                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                                                <span class="evt evt2" data-type="player-bubble">
                                                                                    <div class="yellow-card"></div>
                                                                                </span>
                                                                            @endif
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
                                                                            @if($lineup['stats']['goals']['scored']>0)
                                                                            <span class="evt evt1" data-type="player-bubble">

                                                                                <i class="far fa-futbol goal"></i>
                                                                                <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                            </span>
                                                                            @endif
                                                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                                                <span class="evt evt2" data-type="player-bubble">
                                                                                    <div class="yellow-card"></div>
                                                                                </span>
                                                                            @endif
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
                                                                            @if($lineup['stats']['goals']['scored']>0)
                                                                            <span class="evt evt1" data-type="player-bubble">

                                                                                <i class="far fa-futbol goal"></i>
                                                                                <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                            </span>
                                                                            @endif
                                                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                                                <span class="evt evt2" data-type="player-bubble">
                                                                                    <div class="yellow-card"></div>
                                                                                </span>
                                                                            @endif
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
                                                                            @if($lineup['stats']['goals']['scored']>0)
                                                                            <span class="evt evt1" data-type="player-bubble">

                                                                                <i class="far fa-futbol goal"></i>
                                                                                <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                            </span>
                                                                            @endif
                                                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                                                <span class="evt evt2" data-type="player-bubble">
                                                                                    <div class="yellow-card"></div>
                                                                                </span>
                                                                            @endif
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
                                                                            @if($lineup['stats']['goals']['scored']>0)
                                                                            <span class="evt evt1" data-type="player-bubble">

                                                                                <i class="far fa-futbol goal"></i>
                                                                                <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                            </span>
                                                                            @endif
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
                                                                            @if($lineup['stats']['goals']['scored']>0)
                                                                            <span class="evt evt1" data-type="player-bubble">

                                                                                <i class="far fa-futbol goal"></i>
                                                                                <span class="qtd" data-type="player-bubble-badge">{{$lineup['stats']['goals']['scored']}}</span>

                                                                            </span>
                                                                            @endif
                                                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                                                <span class="evt evt2" data-type="player-bubble">
                                                                                    <div class="yellow-card"></div>
                                                                                </span>
                                                                            @endif
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
                                        {{-- end Line-ups--}}
                                        {{--Line-ups Subtitutions--}}
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
                                                <br>
                                            </div>
                                        {{--End Subtitutions--}}
                                        @endif
                                    </div>
                                    <div class="tab-pane fade p-3" id="three" aria-labelledby="three-tab">
                                        <div class="timeline">
                                            <div class="stat">
                                                <div data-type="title">Shots</div>
                                                <div class="clearfix">
                                                    <div class="col-xs-1 text-right pd-5 lh24">{{(isset($details['stats'][0]['shots']['total']) ? $details['stats'][0]['shots']['total']: '-')}}</div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: {{(isset($details['stats'][0]['shots']['total']) ? $details['stats'][0]['shots']['total']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar" data-type="away-progress" style="width: {{(isset($details['stats'][1]['shots']['total']) ? $details['stats'][1]['shots']['total']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 text-left pd-5 lh24">{{(isset($details['stats'][1]['shots']['total']) ? $details['stats'][1]['shots']['total']: '-')}}</div>
                                                </div>
                                            </div>
                                            <div class="stat">
                                                <div data-type="title">Shot On Target</div>
                                                <div class="clearfix">
                                                    <div class="col-xs-1 text-right pd-5 lh24">{{(isset($details['stats'][0]['shots']['ongoal']) ? $details['stats'][0]['shots']['ongoal']: '-')}}</div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: {{(isset($details['stats'][0]['shots']['ongoal']) ? $details['stats'][0]['shots']['ongoal']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar" data-type="away-progress" style="width: {{(isset($details['stats'][1]['shots']['ongoal']) ? $details['stats'][1]['shots']['ongoal']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 text-left pd-5 lh24">{{(isset($details['stats'][1]['shots']['ongoal']) ? $details['stats'][1]['shots']['ongoal']: '-')}}</div>
                                                </div>
                                            </div>
                                            <div class="stat">
                                                <div data-type="title">Possession</div>
                                                <div class="clearfix">
                                                    <div class="col-xs-1 text-right pd-5 lh24">{{(isset($details['stats'][0]['possessiontime']) ? $details['stats'][0]['possessiontime']: '-')}}</div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: {{(isset($details['stats'][0]['possessiontime']) ? $details['stats'][0]['possessiontime']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar" data-type="away-progress" style="width: {{(isset($details['stats'][1]['possessiontime']) ? $details['stats'][1]['possessiontime']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 text-left pd-5 lh24">{{(isset($details['stats'][1]['possessiontime']) ? $details['stats'][1]['possessiontime']: '-')}}</div>
                                                </div>
                                            </div>
                                            <div class="stat">
                                                <div data-type="title">Passes</div>
                                                <div class="clearfix">
                                                    <div class="col-xs-1 text-right pd-5 lh24">{{(isset($details['stats'][0]['passes']['total']) ? $details['stats'][0]['passes']['total']: '-')}}</div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: {{(isset($details['stats'][0]['passes']['total']) ? ($details['stats'][0]['passes']['total'])/40: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar" data-type="away-progress" style="width: {{(isset($details['stats'][1]['passes']['total']) ? ($details['stats'][1]['passes']['total'])/40: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 text-left pd-5 lh24">
                                                    {{(isset($details['stats'][1]['passes']['total']) ? $details['stats'][1]['passes']['total']: '-')}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="stat">
                                                <div data-type="title">Fouls</div>
                                                <div class="clearfix">
                                                    <div class="col-xs-1 text-right pd-5 lh24">{{(isset($details['stats'][0]['fouls']) ? $details['stats'][0]['fouls']: '-')}}</div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: {{(isset($details['stats'][0]['fouls']) ? $details['stats'][0]['fouls']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar" data-type="away-progress" style="width: {{(isset($details['stats'][1]['fouls']) ? $details['stats'][1]['fouls']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 text-left pd-5 lh24">{{(isset($details['stats'][1]['fouls']) ? $details['stats'][1]['fouls']: '-')}}</div>
                                                </div>
                                            </div>
                                            <div class="stat">
                                                <div data-type="title">Ball Possesion (%)</div>
                                                <div class="clearfix">
                                                    <div class="col-xs-1 text-right pd-5 lh24">{{(isset($details['stats'][0]['passes']['percentage']) ? $details['stats'][0]['passes']['percentage']: '-')}}%</div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: {{(isset($details['stats'][0]['passes']['percentage']) ? $details['stats'][0]['passes']['percentage']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar" data-type="away-progress" style="width: {{(isset($details['stats'][1]['passes']['percentage']) ? $details['stats'][1]['passes']['percentage']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 text-left pd-5 lh24">{{(isset($details['stats'][1]['passes']['percentage']) ? $details['stats'][1]['passes']['percentage']: '-')}}%</div>
                                                </div>
                                            </div>
                                            <div class="stat">
                                                <div data-type="title">Corners</div>
                                                <div class="clearfix">
                                                    <div class="col-xs-1 text-right pd-5 lh24">{{(isset($details['stats'][0]['corners']) ? $details['stats'][0]['corners']: '-')}}</div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar md-progress-fright" data-type="home-progress" style="width: {{(isset($details['stats'][0]['corners']) ? $details['stats'][0]['corners']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 pd-5">
                                                        <div class="md-progress md-progress-container">
                                                            <div class="md-progress md-progress-bar" data-type="away-progress" style="width: {{(isset($details['stats'][1]['corners']) ? $details['stats'][1]['corners']: '0')}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 text-left pd-5 lh24">{{(isset($details['stats'][1]['corners']) ? $details['stats'][1]['corners']: '-')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--comments section--}}
                                    <div class="tab-pane fade p-3" id="four" aria-labelledby="four-tab">
                                    <ul class="chat">
                                        @if ($comments)
                                        @foreach ($comments as $comment )
                                        <li><span class="chat-img pull-left">
											<img src="{{('/assets/img/acc-default.png')}}" alt="User Avatar" class="img-circle" height="50"></span>
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

                                                            {{strtoupper(explode(' ',trim($comment['comment']))[0])}} {{strtoupper(explode(' ',trim($comment['comment']))[1])}}
                                                            @endif
                                                        </strong><small class="pull-right text-muted">
                                                            <span class="glyphicon glyphicon-time"></span>{{$comment['minute']}} mins ago</small>
                                                    </div>
                                                    <p>

                                                    {{$comment['comment']}}
                                                    </p>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    </div>
                               </div>
                               {{--@else
                               <div class="tab-content">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" style="font-size: 25px; color: rgb(183, 167, 167); letter-spacing: 1px; font-weight: 100; padding: 50px; text-align: center; line-height: 1.3;">
                                                <img src="{{('/images/nodata.png')}}" style="height: 100px; padding: 11px;">
                                                <div><span style="font-weight: 800;">NO DATA</span></div>
                                                <div>YET FOR THIS MATCH</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <div role="tabpanel" class="tab-pane active" id="timeline" style="margin-bottom: 20px;"></div>
                                </div>
                               @endif--}}
                        </div>
                    </div>
                </div>
		  	</div>
	   </div>
	</div>
    </div>
</div>
</div>
        @include('partials.footer')
        @stack('click')
</body>
</html>
