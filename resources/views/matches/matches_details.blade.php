@include('partials.header_portal')
<link href="/assets/css/lineup.css" rel="stylesheet" />


</head>

<body>

    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <div>
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content">
        <!-- header -->
        <!-- <div id="sk_loader_match_details" style="display:inline">@include('matches.sk_loader_match_details')</div> -->



        <!-- content -->
        <div class="detail-match" id="match_details_body" style="display:none">


            <div class="detail-match-header">
                <div style="display: flex;padding: 10px 30px;">
                    <a class="sd-scale" href="javascript:history.back()">
                        <img src="{{asset('assets/img/arrow-left-icon.png')}}">                    
                    </a>
                </div>
                
                <a href="/league/details/{{$details['sportsmonks_id']}}">
                <h4 style="color: #7CD327" id="leagueTxt">{{$details['league_name']}}</h4></a>
                <div class="row row-no-gutters sec-1">
                    <div class="col-xs-4 club">
                        <a href="{{route('team',[$details['home_team_id']])}}"><img src="{{(isset($details['home_team_logo']) ? $details['home_team_logo']: '-')}}" alt="" id="hClubImg" ></a>
                        <p id="hClubName">{{(isset($details['home_team_name']) ? $details['home_team_name']: '')}}</p>
                    </div>
                    <div class="col-xs-4">
                        <div class="score-board">

                            <div class="date" id="matchDate">
                           {{$details['date_time']}}
                            </div>
                            <div class="score" id="score">{{(isset($details['home_team_score']) ? $details['home_team_score']: '')}} : {{(isset($details['away_team_score']) ? $details['away_team_score']: '')}}</div>
                        </div>
                    </div>
                    <div class="col-xs-4 club">
                    <a href="{{route('team',[$details['away_team_id']])}}"><img src="{{(isset($details['away_team_logo']) ? $details['away_team_logo']: '-')}}" alt=""          id="aClubImg"></a>
                        <p id="aClubName">{{(isset($details['away_team_name']) ? $details['away_team_name']: '')}}</p>
                    </div>
                </div>
                @if(!empty($details['goals']))
                <div class="sec-3">
                    <div class="card">
                        <!-- goal -->
                        <div class="row row-no-gutters d-flex ais-stretch">
                            <div class="col-xs-5 d-flex ais-center j-start">
                                <table>
                                    @if(isset($details['goals']))
                                    @foreach ($details['goals'] as $value )
                                   @if(isset($value['participant_id']) && $details['home_team_id'] == $value['participant_id'])

                                    <tr><td id="playerName">{{$value['player_name']}}</td><td class="pl-3" id="goalTime"><td class="pl-3" id="goalTime"><td class="pl-3" id="goalTime">
                                    {{ $value['minute'] }}{{ $value['extra_minute'] ? '+'.$value['extra_minute'] : '' }}'{{ $value['type_id'] == '16' ? '(P)' : '' }}</td></td></td></tr>
                                    @endif
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                            <div class="col-xs-2 d-flex ais-center j-center">
                                <img src="/assets/img/detail-match/goal.png" alt="" id="goalIcn">
                            </div>
                            <div class="col-xs-5 d-flex ais-center j-center">
                                <table>
                                @if(isset($details['goals']))
                                    @foreach ($details['goals'] as $value )
                                    @if(isset($value['participant_id']) && $details['away_team_id']==$value['participant_id'])
                                    <tr><td id="playerName">{{$value['player_name']}}</td><td class="pl-3" id="goalTime"><td class="pl-3" id="goalTime">
                                    {{ $value['minute'] }}{{ $value['extra_minute'] ? '+'.$value['extra_minute'] : '' }}'{{ $value['type_id'] == '16' ? '(P)' : '' }}</td></td></tr>
                                    @endif
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                                <!-- <div class="col-12 text-center">
                                    <img src="{{ asset('assets/img/detail-match/icon-menu/no-data.png') }}" style="height: 100px; padding: 11px;">
                                    <div>
                                        <span style="font-weight: 800;">NO DATA</span>
                                    </div>
                                    <div>{{ trans('lang.YET FOR THIS MATCH') }}</div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-12 pd-10">
                                    <div class="team">
                                        <br>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                @endif
                <div class="row row-no-gutters sec-2">
                    <div class="col-xs-6 stadium" id="stadiumTitle">{{ trans('lang.Stadium') }}
                        : <br id="stadium"> {{(isset($details['venue']) ? $details['venue']: '')}}
                    </div>
                    <div class="col-xs-6 referee" id="refereeTitle">
                        {{ trans('lang.Referee') }}: <br id="referee"> {{(isset($details['referee']) ? $details['referee']: 'Michael Oliver')}}
                    </div>
                </div>
            </div>
            <input type="hidden" name="match_id" value="{{$details['match_id']}}">
            <input type="hidden" name="homeTeamId" value="{{$details['home_team_id']}}">
            <input type="hidden" name="awayTeamId" value="{{$details['away_team_id']}}">
            <div class="match-detail-body">
                <div class="menu menu-details" style="margin-bottom: 0px" >
                    <ul class="nav nav-pills">
                        <li class="active">
                            <a class="nav-link" id="timelineTab" data-toggle="tab" href="#timeline" role="tab" aria-controls="" aria-selected="false" data-image="timeline">
                            <img src="{{ asset('assets/img/detail-match/icon-menu/timeline2.png') }}" id="timelineIcn">
                                {{ trans('lang.Timeline') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" id="playerTab" data-toggle="tab" href="#players" role="tab" aria-controls="" aria-selected="false" data-image="players">
                                <img src="{{ asset('assets/img/detail-match/icon-menu/players.png') }}" id="playerIcn">
                                {{ trans('lang.Players') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" id="lineUpTab" data-toggle="tab" href="#lineups" role="tab" aria-controls="" aria-selected="false" data-image="lineups">
                                <img src="{{ asset('assets/img/detail-match/icon-menu/lineups.png') }}" id="lineUpIcn"> 
                                {{ trans('lang.Lineups') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" id="statsTab" data-toggle="tab" href="#stats" role="tab" aria-controls="" aria-selected="false" data-image="stats">
                                <img src="{{ asset('assets/img/detail-match/icon-menu/stats.png') }}" id="statsIcn">
                                {{ trans('lang.Stats') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" id="headToHeadTab" data-toggle="tab" href="#head2head" role="tab" aria-controls="" aria-selected="false" data-image="head2head">
                                <img src="{{ asset('assets/img/detail-match/icon-menu/head2head.png') }}" id="headToHeadIcn">
                                {{ trans('lang.Head to Head') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" id="predictionTab " data-toggle="tab" href="#prediction" role="tab" aria-controls="" aria-selected="false" data-image="prediction">
                                <img src="{{ asset('assets/img/detail-match/icon-menu/prediction.png') }}" id="predictionIcn">
                                {{ trans('lang.Prediction') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" id="live-chat-tab" data-toggle="tab" href="#live-chat" role="tab" aria-controls="" aria-selected="false" data-image="live-chat">
                                <img src="{{ asset('assets/img/detail-match/icon-menu/live-chat.png') }}" id="liveChatIcn">
                                {{ trans('lang.Fan_Discussion') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" id="newsTab " data-toggle="tab" href="#team-news" role="tab" aria-controls="" aria-selected="false" data-image="news">
                                <img src="{{ asset('assets/img/detail-match/icon-menu/news.png') }}" id="newsIcn">
                                {{ trans('lang.News') }}
                            </a>
                        </li>
                    </ul>                   
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                
                    <div class="tab-pane fade p-3 active in" id="timeline" aria-labelledby="d" style="background: gainsboro;">
                        @if(!empty($highlights))
                        <div class="video-box premium embed-responsive embed-responsive-16by9 video-listing" id="video">
                        
                        <iframe width="560" height="315" src="{{$highlights['video']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        
                        
                        </div>
                        @endif


                        <div id="sk_loader_match_details_timeline" ></div>

                    </div>
                <div class="tab-pane fade p-3 in" id="players" aria-labelledby="playerTab">
    
   

                        <div class="block-match-details" style="margin: 0px 0px 0px 0px">
                            <div class="row row-no-gutters" style="margin:0px">
                                <div class="col-xs-6 col md-6 col-lg-6">
                                <a class="btn btn-block btn-cta-premium active" 
                                id="basicTab">{{ trans('lang.Basic Stats') }}</a>
                                </div>
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a class="btn btn-block btn-cta-premium"
                                    id="advanceTab">
                                    <!-- <span class="icon icon-external-link"></span>  -->
                                {{ trans('lang.Advance Stats') }}</a>
                                </div>
                            </div>
                        </div> 

                         <div id="sk_loader_match_details_player" ></div>

                        <div class="block-match-details" id="player_info" style="display:none;padding:5px;">

                            <div class="player-states"><div class="pull-left"><strong id="passesTitle">       {{ trans('lang.Passes') }}</strong></div><div class="pull-right" id="passesVariable">{{ trans('lang.Successful/Total') }}</div></div>
                            <table class="table table-responsive players">
                                <tbody id="final_passes">

                            </tbody>
                        </table>
                            <div class="goaly player-states"><div class="pull-left"><strong id="passingAccuracyTitle">{{ trans('lang.Passing Accuracy (Final Third)') }}</strong></div><div class="pull-right">&nbsp;</div></div>
                            <table class="table">
                                <tbody id="final_passingAccuracy">

                            </tbody></table>
                            <div class="goaly player-states"><div class="pull-left"><strong id="crossesTitle">{{ trans('lang.Crosses') }}</strong></div><div class="pull-right" id="crossesVariable">{{ trans('lang.Successful/Total') }}</div></div>
                            <table class="table">
                                <tbody id="final_crosses">

                            </tbody></table>
                            <div class="goaly player-states"><div class="pull-left"><strong id="shotsTitle">{{ trans('lang.Shots') }}</strong></div><div class="pull-right" id="shotsVariable">{{ trans('lang.Goal / On Target / Total') }}</div></div>
                            <table class="table">
                                <tbody id="final_shots">

                            </tbody></table>
                            <div class="goaly player-states"><div class="pull-left"><strong id="chancesTitle">{{ trans('lang.Chances Created') }}</strong></div><div class="pull-right" id="chancesVariable">{{ trans('lang.Assists / Chances') }}</div></div>
                            <table class="table">
                                <tbody id="final_changesCreated">

                            </tbody></table>
                        </div>

                    <div class="block-match-details" id="adv-player_info" style="display:none;">

                    {{-- advance--}}
                    <div class="py-2 px-2">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="" id="teamTitle">{{ trans('lang.Team') }}</label>
                                <select name="teamid" id="teamDropDown" class="form-control" fdprocessedid="2wer94">
                                    <option value="">All</option>
                                    <option value="{{$details['home_team_id']}}">{{$details['home_team_name']}}
                                    </option>
                                    <option value="{{$details['away_team_id']}}">{{$details['away_team_name']}}</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label for="" id="positionTitle">{{ trans('lang.Position') }}</label>
                            <select name="positions" id="positionDropDown" class="form-control" fdprocessedid="ougex">
                                    <option value="">All</option><option value="A">Attacker</option><option value="M">Midfielder</option><option value="D">Defender</option><option value="G">Goalkeeper</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="adv-player_infos"></div>

                    </div>
                </div>
                    <div class="tab-pane fade p-3 in" id="lineups" aria-labelledby="lineups-tab">

                        {{--Line-ups --}}
                        <div class="field" data-type="lineup-field">
                            <div class="home-info" data-type="home-info">
                                <div class="name" data-type="team">
                                    <img src="{{isset($details['home_team_logo'])?$details['home_team_logo']:''}}" height="24" alt=""/> &nbsp;{{isset($details['home_team_name'])?$details['home_team_name']:''}}
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

                                @if(isset($lineups))
                                @foreach ($lineups as $lineup)
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==1)
                                        <div class="players-row" data-type="player-row" style="height: 88px;">
                                            <ul class="item" data-type="player-row-content">
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">

                                                        <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">
                                                        <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                        <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>
                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                        <span class="evt evt2" data-type="player-bubble">
                                                            <div class="yellow-card"></div>
                                                        </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">{{isset($lineup['player_name'])?$lineup['player_name']:''}}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==2)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                        <ul class="item" data-type="player-row-content">
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                                @endif
                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                                @endif
                                                @endif
                                                <span class="evt evt4" data-type="player-bubble">
                                                    <i class='fas fa-arrow-down text-red'></i>
                                                </span>
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==3)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                                @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==4)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span>{{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==5)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}

                                            </div>
                                        </li>
                                    </ul>
                                    </div>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==6)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                        <ul class="item" data-type="player-row-content">
                                            <li data-type="player-item">
                                                <div class="player" data-type="player-data">
                                                    <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                    @if(isset($lineup['stats']['goals']))
                                                    @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                                    <!-- <span class="evt evt4" data-type="player-bubble">
                                                        <i class='fas fa-arrow-down text-red'></i>
                                                    </span> -->
                                                </div>
                                                <div class="name" data-type="player-name">
                                                    <span class="hidden-xxs"></span>
                                                    <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                </div>
                                            </li>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==7)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">{{isset($lineup['player_name'])?$lineup['player_name']:''}}</div>
                                        </li>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==8)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                                @endif
                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                                @endif
                                                @endif
                                                <!-- <span class="evt evt4" data-type="player-bubble">
                                                    <i class='fas fa-arrow-down text-red'></i>
                                                </span> -->
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    </ul>
                                    </div>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==9)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                        <ul class="item" data-type="player-row-content">
                                        <li data-type="player-item">
                                                <div class="player" data-type="player-data">
                                                    <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                    <span class="evt evt1" data-type="player-bubble">

                                                        <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                        <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                    </span>
                                                @endif
                                                @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                                @endif
                                                @endif
                                                </div>
                                                <div class="name" data-type="player-name">
                                                    <span class="hidden-xxs"></span>
                                                    <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                </div>
                                            </li>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==10)
                                    <li data-type="player-item">
                                        <div class="player" data-type="player-data">
                                            <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                            @if(isset($lineup['stats']['goals']))
                                            @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                        </div>
                                        <div class="name" data-type="player-name">
                                            <span class="hidden-xxs"></span>
                                            <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                        </div>
                                    </li>
                                    @endif
                                    @if($details['home_team_id']==$lineup['team_id'] && $lineup['formation_position']==11)
                                            <li data-type="player-item">
                                                <div class="player" data-type="player-data">
                                                    <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                    @if(isset($lineup['stats']['goals']))
                                                    @if($lineup['stats']['goals']['scored']>0)
                                                    <span class="evt evt1" data-type="player-bubble">

                                                        <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                        <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                    </span>
                                                    @endif
                                                    @if($lineup['stats']['cards']['yellowcards']>0)
                                                        <span class="evt evt2" data-type="player-bubble">
                                                            <div class="yellow-card"></div>
                                                        </span>
                                                    @endif
                                                    @endif
                                                </div>
                                                <div class="name" data-type="player-name">
                                                    <span class="hidden-xxs"></span>
                                                    <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                @endforeach
                                @endif
                                </div>
                                <div class="away" data-type="away-players">

                                @foreach ($awaylineups as $lineup)
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==11)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                            <ul class="item" data-type="player-row-content">
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                                <span class="evt evt4" data-type="player-bubble">
                                                    <i class='fas fa-arrow-down text-red'></i>
                                                </span>
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"></span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==10)
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                                <span class="evt evt4" data-type="player-bubble">
                                                    <i class='fas fa-arrow-down text-red'></i>
                                                </span>
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                        </ul>
                                    </div>
                                    @endif
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==9)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                    <ul class="item" data-type="player-row-content">
                                        <li data-type="player-item">
                                            <div class="player" data-type="player-data">
                                                <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                @if(isset($lineup['stats']['goals']))
                                                @if($lineup['stats']['goals']['scored']>0)
                                                <span class="evt evt1" data-type="player-bubble">

                                                    <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                    <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                </span>
                                            @endif
                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                            </div>
                                            <div class="name" data-type="player-name">
                                                <span class="hidden-xxs"></span>
                                                <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                            </div>
                                        </li>
                                    @endif
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==8)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                            @endif
                                                            @if($lineup['stats']['cards']['yellowcards']>0)
                                                <span class="evt evt2" data-type="player-bubble">
                                                    <div class="yellow-card"></div>
                                                </span>
                                            @endif
                                            @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==7)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==6)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                        <span class="evt evt4" data-type="player-bubble">
                                                            <i class='fas fa-arrow-down text-red'></i>
                                                        </span>

                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                                </ul>
                                        </div>
                                    @endif
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==5)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">
                                            <ul class="item" data-type="player-row-content">
                                            <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==4)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                        {{-- <span class="evt evt2" data-type="player-bubble">
                                                            <div class="red-card"></div>
                                                        </span> --}}
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==3)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                    @endif
                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==2)
                                    <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif

                                    @if($details['away_team_id']==$lineup['team_id'] && $lineup['formation_position']==1)
                                    <div class="players-row" data-type="player-row" style="height: 88px;">

                                            <ul class="item" data-type="player-row-content">
                                                <li data-type="player-item">
                                                    <div class="player" data-type="player-data">
                                                        <span class="number" data-type="player-number">{{isset($lineup['jersey_number'])?$lineup['jersey_number']:''}}</span>
                                                        @if(isset($lineup['stats']['goals']))
                                                        @if($lineup['stats']['goals']['scored']>0)
                                                        <span class="evt evt1" data-type="player-bubble">

                                                            <img src="{{ asset('assets/img/icon-timeline/football.png') }}" class="icons" alt="">
                                                            <span class="qtd" data-type="player-bubble-badge">{{isset($lineup['stats']['goals']['scored'])?$lineup['stats']['goals']['scored']:''}}</span>

                                                        </span>
                                                        @endif

                                                        @if($lineup['stats']['cards']['yellowcards']>0)
                                                            <span class="evt evt2" data-type="player-bubble">
                                                                <div class="yellow-card"></div>
                                                            </span>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <div class="name" data-type="player-name">
                                                        <span class="hidden-xxs"></span>
                                                        <span class="visible-inline-xxs"> </span> {{isset($lineup['player_name'])?$lineup['player_name']:''}}
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
                                    <img src="{{$details['away_team_logo']}}" height="24" alt=""/>
                                    &nbsp;{{$details['away_team_name']}}
                                </div>
                                <div class="formation" data-type="formation">4-4-2</div>
                            </div>
                        </div>
                    {{-- end Line-ups--}}
                    </div>
                    <div class="tab-pane fade p-3 in" id="stats" aria-labelledby="stats-tab">
                    <!-- <div role="tabpanel" class="tab-pane" id="stats"> -->

                       <div class="block-match-details" style="margin: 0px 6px 0px 4px">
                           <div class="row row-no-gutters" style="margin:0px">
                                <div class="col-xs-6 col md-6 col-lg-6">
                                <a class="btn btn-block btn-cta-premium active" 
                                id="basicBtn">{{ trans('lang.Basic Stats') }}</a>
                                </div>
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a class="btn btn-block btn-cta-premium"
                                    id="advanceBtn">
                                    <!-- <span class="icon icon-external-link"></span>  -->
                                    {{ trans('lang.Advance Stats') }}
                                </a>
                                </div>
                            </div>
                        </div>
                        <div class="stats-header">
                            <img src="{{(isset($details['home_team_logo']) ? $details['home_team_logo']: '-')}}" alt="" id="hClubImg">
                             <h4 id="teamStatsTitle">{{ trans('lang.TEAM STATS') }}</h4>
                            <img src="{{(isset($details['away_team_logo']) ? $details['away_team_logo']: '-')}}" alt="" id="aClubImg">
                        </div>
                        <div class="stats-body" id="genStats">
                            @if(isset($matchstats_raw['match_statsdetails']) && !empty($matchstats_raw['match_statsdetails']))

                                @include('components.matches-stat-bar', ['statKey' => 'shots_total','statsLabel'=>'Shots'])
                                @include('components.matches-stat-bar', ['statKey' => 'shots_ongoal','statsLabel'=>'Shot_on_Target'])
                                @include('components.matches-stat-bar', ['statKey' => 'possessiontime','statsLabel'=>'Possession'])
                                @include('components.matches-stat-bar', ['statKey' => 'pass_total','statsLabel'=>'Passes'])
                                @include('components.matches-stat-bar', ['statKey' => 'pass_accurate','statsLabel'=>'Pass accuracy'])
                                @include('components.matches-stat-bar', ['statKey' => 'fouls','statsLabel'=>'Fouls'])
                                @include('components.matches-stat-bar', ['statKey' => 'corners','statsLabel'=>'Corners'])

                              
                            @else
                                <div class="col-12 text-center">
                                    <img src="{{ asset('assets/img/detail-match/icon-menu/no-data.png') }}" style="height: 100px; padding: 11px;">
                                    <div>
                                        <span style="font-weight: 800;">NO DATA</span>
                                    </div>
                                    <div>{{ trans('lang.YET FOR THIS MATCH') }}</div>
                                </div>
                            @endif
                        </div>

                        <div class="advstats-body" id="advStats" style="display: none;">
                            @include('matches.detail_match_stats_advance', ['stat' => $matchstats_raw['match_statsdetails']])
                         </div>
                    </div>
                    <!-- h2h tab start -->
                    <div class="tab-pane fade p-3 in" id="head2head" aria-labelledby="head2head-tab" style="padding: 13px">
                        <div class="head-to-head"> 
                             <h3 style="vertical-align: bottom; display: table-cell;" id="title">{{ trans('lang.Head to Head') }}</h3>
                             <div class="liner"></div>

                        </div>
                       
                        <table class="table table-striped mb-10 text-small" style="margin-top: 4px">
                            <tbody><tr>
                                <td width="" class="text-left">
                                    <img src="{{(isset($details['home_team_logo']) ? $details['home_team_logo']: '-')}}" height="50" alt="" id="hClubImg">
                                </td>
                                <td width="" class="text-center bdr1"> <span class="ctr" id="wins"></span>{{ trans('lang.Wins') }}</td>
                                <td width="" class="text-center bdr1"><span class="ctr" id="draw"></span>{{ trans('lang.Draw') }}</td>
                                <td width="" class="text-center"><span class="ctr" id="loss"></span>{{ trans('lang.Wins') }}</td>
                                <td width="" class="text-right"><img src="{{(isset($details['away_team_logo']) ? $details['away_team_logo']: '-')}}" height="50" alt="" id="aClubImg">
                                </td>
                            </tr></tbody>
                        </table>

                        <div className="widget-content">
                            <div className="widget-content-wrapper" style="display: flex ; align-items: center";>
                                <div className="widget-content-left">
                                    <div className="widget-numbers fsize-3 text-win" id="hGoals"style="margin-left: 17px; font-weight: 400;font-size: 17px;"></div>
                                </div>
                                <div className="widget-content-middle" style="margin: auto">
                                    <div className="widget-numbers fsize-3 text-muted" style="font-weight: 400;font-size: 17px;color: gray;" id="goalScoreTitle">{{ trans('lang.GOALS SCORED') }}</div>
                                </div>
                                <div className="widget-content-right">
                                    <div className="widget-numbers fsize-3 text-lose" id="aGoals"style="margin-right: 17px; font-weight: 400 ;font-size: 17px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-bar-sm progress-bar-animated-alt progress"><div class="progress-bar bg-win" id="homegoals"role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div><div class="progress-bar bg-lose" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" id="awaygoals" ></div></div>

                        <table class="table table-striped custab mb-10">
                            <tbody id="matchHead">

                            </tbody>
                        </table>

                            <!-- Home team last match -->
        
            <div class="col-xs-12 pd-0" style="float: left; margin-left: 3%; width:94%; margin-bottom: 10px" >
                <div class="col-md-12 pd-0"> 
                    <div class="col-xs-12 pd-0" style="margin-left: -9px">
                        <h4 class="inline"><b style="color:black" id="lastMatchTitle">{{ trans('lang.Last Match') }} </b> </h4>
                    </div>
                    <div>
                        <img src="{{$details['home_team_logo']}}" alt="" style="height: 28px; width: 28px; margin-bottom: 5px;" id="clubImg">
                        <strong id="clubName">{{$details['home_team_name']}}</strong>
                                  
                @if(isset($H_lastmatches))
                @foreach($H_lastmatches as $leagueName => $matches)
                    @foreach($matches as $match)
                        @if($match['winnerTeamId'] == $details['home_team_id'])
                            <div>
                                <div class="bdstat win" style="float: right; border-radius: 15px;" id="form">W</div>
                            </div>
                        @elseif($match['winner_status'] == '2')
                            <div>
                                <div class="bdstat draw" style="float: right; border-radius: 15px;" id="form">D</div>
                            </div>
                        @else
                            <div>
                                <div class="bdstat lose" style="float: right; border-radius: 15px;" id="form">L</div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                @endif
            </div></div>
        </div>
        <div class="liner"></div>


            @if(isset($H_lastmatches))
            @foreach($H_lastmatches as $leagueName => $matches)
                <h5 id="league">{{$leagueName}}</h5>
                <table class="table table-striped custab mb-10">
                    <tbody>
                    @foreach($matches as $match)
                      <tr>
                      <td style="display: flex;align-items:center">
                        <div class="col-xs-1 pd-0">
                            <img src="{{ $match['home_logo'] }}" style="height: 27px; display:flex;align-items: center" id="lClubImg">
                        </div>
                        <div class="col-xs-3 pd-0">
                            <p class="ml-1" id="lClubName" style="line-height: normal;">{{ $match['homeTeam_name'] }} </p>
                        </div>

                        <div class="col-xs-4 plr5 text-center">
                                <time datetime="" style="color: #999999" id="lastMatchDate">
                                    {{ date('D,d/m/y', strtotime($match['date_time'])) }}
                               </time>
                           
                            <br>
                            <strong  id="lastMatchScore">
                                @if($match['homeTeam_score'] > $match['awayTeam_score'])
                                <span style="color: green;">{{$match['homeTeam_score']}}</span> - <span style="color: red;">{{$match['awayTeam_score']}}</span>
                                @elseif($match['homeTeam_score'] < $match['awayTeam_score'])
                                <span style="color: red;">{{$match['homeTeam_score']}}</span> - <span style="color: green;">{{$match['awayTeam_score']}}</span>
                                @else
                                <span style="color: gray;">{{$match['homeTeam_score']}}</span> - <span style="color: gray;">{{$match['awayTeam_score']}}</span>
                                @endif
                               </strong>
                        </div>
                        
                        <div class="col-xs-3 pd-0">
                            <p  id="rClubName" style="line-height: normal;">{{ $match['awayTeam_name'] }}</p>
                        </div>

                        <div class="col-xs-1 pd-0">
                            <img src="{{ $match['away_logo'] }}" style="height: 27px;" id="rClubImg">
                        </div>
                       
                
                      </td>
                    
                    {{-- <td>
                        <time datetime="" style="color: #999999" id="lastMatchDate">
                            {{ date('D,d/m/y', strtotime($match['date_time'])) }}
                       </time>
                        <br>
                        <strong style="margin-left:26px" id="lastMatchScore">
                        @if($match['homeTeam_score'] > $match['awayTeam_score'])
                        <span style="color: green;">{{$match['homeTeam_score']}}</span> - <span style="color: red;">{{$match['awayTeam_score']}}</span>
                        @elseif($match['homeTeam_score'] < $match['awayTeam_score'])
                        <span style="color: red;">{{$match['homeTeam_score']}}</span> - <span style="color: green;">{{$match['awayTeam_score']}}</span>
                        @else
                        <span style="color: gray;">{{$match['homeTeam_score']}}</span> - <span style="color: gray;">{{$match['awayTeam_score']}}</span>
                        @endif
                       </strong>
                    </td> --}}
                </tr>
              @endforeach   
                </tbody>
            </table>
            @endforeach
        @endif



            <!-- Away team last match -->


    
        <div class="col-xs-12 pd-0" style="float: left; margin-left: 3%; width:94%; margin-bottom: 10px  ">
                <div class="col-md-12 pd-0"> 
                    <div class="col-xs-12 pd-0" style="margin-left: -9px">
                        <h4 class="inline"><b style="color:black" id="lastMatchTitle">{{ trans('lang.Last Match') }} </b> </h4>
                    </div>
                <img src="{{$details['away_team_logo']}}" alt="" style="height: 28px; width: 28px; margin-bottom: 5px;" id="clubImg">
                 <strong id="clubName">{{$details['away_team_name']}}</strong>

                @if(isset($A_lastmatches))
                @foreach($A_lastmatches as $leagueName => $matches)
                    @foreach($matches as $match)
                        @if($match['winnerTeamId'] == $details['away_team_id'])
                            <div>
                                <div class="bdstat win" style="float: right; border-radius: 15px;"  id="form">W</div>
                            </div>
                        @elseif($match['winner_status'] == '2')
                            <div>
                                <div class="bdstat draw" style="float: right; border-radius: 15px;" id="form">D</div>
                            </div>
                        @else
                            <div>
                                <div class="bdstat lose" style="float: right; border-radius: 15px;" id="form">L</div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                @endif
            </div>
        </div>
        <div class="liner"></div>
            @if(isset($A_lastmatches))
            @foreach($A_lastmatches as $leagueName => $matches)
                <h5 id="league">{{$leagueName}}</h5>
                <table class="table table-striped custab mb-10">
                    <tbody>
                    @foreach($matches as $match)
                      <tr>
                      <td style="display: flex;align-items:center">
                        <div class="col-xs-1 pd-0">
                            <img src="{{ $match['home_logo'] }}" style="height: 27px; display:flex;align-items: center" id="lClubImg">
                        </div>
                        <div class="col-xs-3 pd-0">
                            <p class="ml-1" id="lClubName" style="line-height: normal;">{{ $match['homeTeam_name'] }} </p>
                        </div>

                        <div class="col-xs-4 plr5 text-center">
                                <time datetime="" style="color: #999999" id="lastMatchDate">
                                    {{ date('D,d/m/y', strtotime($match['date_time'])) }}
                               </time>
                           
                            <br>
                            <strong  id="lastMatchScore">
                                @if($match['homeTeam_score'] > $match['awayTeam_score'])
                                <span style="color: green;">{{$match['homeTeam_score']}}</span> - <span style="color: red;">{{$match['awayTeam_score']}}</span>
                                @elseif($match['homeTeam_score'] < $match['awayTeam_score'])
                                <span style="color: red;">{{$match['homeTeam_score']}}</span> - <span style="color: green;">{{$match['awayTeam_score']}}</span>
                                @else
                                <span style="color: gray;">{{$match['homeTeam_score']}}</span> - <span style="color: gray;">{{$match['awayTeam_score']}}</span>
                                @endif
                               </strong>
                        </div>
                        
                        <div class="col-xs-3 pd-0">
                            <p  id="rClubName" style="line-height: normal;">{{ $match['awayTeam_name'] }}</p>
                        </div>

                        <div class="col-xs-1 pd-0">
                            <img src="{{ $match['away_logo'] }}" style="height: 27px;" id="rClubImg">
                        </div>
                      </td>
                </tr>
              @endforeach   
                </tbody>
            </table>
    
    @endforeach
    @endif
<!-- end away team last match -->
                    </div>

                    <!-- Prediction Tab -->
                    <div class="tab-pane fade p-3 in" id="prediction" aria-labelledby="predictionTab ">
                        <div class="lm prediction_list" style="padding: 10px; height: auto;">
                        <div class="widget-content">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="text-muted opacity-6" id="hclubWin">{{(isset($details['home_team_name']) ? $details['home_team_name']: '')}}</div>
                                    </div>
                                    <div class="widget-content-middle">
                                        <div class="text-muted opacity-6" id="draw">Draw</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="text-muted opacity-6" id="aClubWin">{{(isset($details['away_team_name']) ? $details['away_team_name']: '')}}</div>
                                    </div>
                                </div>
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-numbers fsize-3 text-win" id="hclubWinPercentage">{{(isset($details['probability']['predictions']['home']) ? $details['probability']['predictions']['home']: '')}}%</div>
                                    </div>
                                    <div class="widget-content-middle">
                                        <div class="widget-numbers fsize-3 text-muted" id="drawPercentage">{{(isset($details['probability']['predictions']['draw']) ? $details['probability']['predictions']['draw']: '')}}%</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers fsize-3 text-lose" id="aClubWinPercentage">{{(isset($details['probability']['predictions']['away']) ? $details['probability']['predictions']['away']: '')}}% </div>
                                    </div>
                                </div>
                                <div class="widget-progress-wrapper mt-1">
                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                        <div class="progress-bar bg-win" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['home']) ? $details['probability']['predictions']['home']: '')}}%;"></div>
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['draw']) ? $details['probability']['predictions']['draw']: '')}}%;"></div>
                                        <div class="progress-bar bg-lose" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['away']) ? $details['probability']['predictions']['away']: '')}}%;"></div>
                                    </div>
                                </div>
                            </div>
                            <h4 id="dataTxt">{{ trans('lang.Data') }} </h4>
                            <div class="liner"></div>
                            <div style="border: none;">
                                <div>
                                    <div aria-expanded="true" style="padding: 0px;">
                                    <h4 class="title-pred" data-toggle="collapse" data-target="#pred1" id="predictionTxt">{{ trans('lang.Predictions') }} <i class="fa fa-arrow-circle-down pull-right"></i></h4>
                                    </div>
                                </div>
                            </div>
                            <div>
                            <div class="">
                                <div class="widget-content">
                                    <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                        <div class="text-muted opacity-6" id="bothTeamToScoreTxt">{{ trans('lang.Both Team To Score') }}</div>
                                        </div>
                                        <div class="widget-content-middle">
                                            <div class="text-muted opacity-6"></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="text-muted opacity-6" id="noScoreTxt">{{ trans('lang.No Score') }}</div>
                                        </div>
                                    </div>
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-numbers fsize-3 text-win2" id="bothTeamToScorePercentage">{{(isset($details['probability']['predictions']['btts']) ? $details['probability']['predictions']['btts']: '')}}%</div>
                                        </div>
                                        <div class="widget-content-middle">
                                            <div class="widget-numbers fsize-3 text-muted"></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers fsize-3 text-lose2" id="noScorePercentage">{{(isset($details['probability']['predictions']['btts']) ? 100-$details['probability']['predictions']['btts']: '')}}</div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper mt-1">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['btts']) ? $details['probability']['predictions']['btts']: '')}}%;"></div>
                                            <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['btts']) ? 100-$details['probability']['predictions']['btts']: '')}}%;"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 pd-0 mt-10">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-6" id="scoreProbability">{{ trans('lang.Score Probability') }}</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="text-muted opacity-6"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6" id="load_more"><strong>{{ trans('lang.MORE') }}</strong> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped custab mb-10">
                                        <tbody>
                                        @if (isset($details['probability']['predictions']['correct_score']))
                                        @foreach ($details['probability']['predictions']['correct_score'] as $key => $score )

                                        <tr class="listing">
                                            <td width="60%" class="text-spec">
                                                <div class="col-xs-6 pd-0">
                                                    <p class="">
                                                        <img src="{{(isset($details['home_team_logo']) ? $details['home_team_logo']: '-')}}" alt="" style="height: 15px; width: 11px; margin: 1px;"><strong style="margin-left: 5px;">{{(isset($details['home_team_name']) ? $details['home_team_name']: '')}}</strong>
                                                    </p>
                                                    <p class="">
                                                        <img src="{{(isset($details['away_team_logo']) ? $details['away_team_logo']: '-')}}" alt="" style="height: 15px; width: 11px; margin: 1px;"><strong style="margin-left: 5px;">{{(isset($details['away_team_name']) ? $details['away_team_name']: '')}}</strong>
                                                    </p>
                                                </div>
                                                <div class="col-xs-1">
                                                    <p class="text-left" style="padding-top: 15px; text-align: right;">{{isset($score) ? explode('-',trim($key))[0] :'-'}}</p>
                                                    <p class="text-left" style="padding-top: 15px; text-align: right;">{{isset($score) ? explode('-',trim($key))[1]: '-'}}</p>
                                                </div>
                                            </td>
                                            <td width="" class="text-center">
                                                <div class="widget-content">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers text-win">{{(isset($score) ? $score: '-')}}</div>
                                                        </div>
                                                        <div class="widget-content-middle">
                                                            <div class="widget-numbers text-muted"></div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="widget-numbers text-lose">{{(isset($score) ?(100- $score): '-')}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="progress-bar-sm progress-bar-animated-alt progress mb-0">
                                                    <div class="progress-bar bg-win" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" style="width:{{(isset($score) ? $score: '-')}}%;"></div>
                                                    <div class="progress-bar bg-default" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width:{{(isset($score) ?(100- $score): '-')}}%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-6">{{ trans('lang.Under 2 Goals') }}</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="text-muted opacity-6"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6">{{ trans('lang.Over 3 Goals') }}</div>
                                            </div>
                                        </div>
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['under_2_5']) ? $details['probability']['predictions']['under_2_5']: '')}}%</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="widget-numbers fsize-3 text-muted"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['over_2_5']) ? $details['probability']['predictions']['over_2_5']: '')}}% </div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper mt-1">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['under_2_5']) ? $details['probability']['predictions']['under_2_5']: '')}}%;"></div>
                                                <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['over_2_5']) ? $details['probability']['predictions']['over_2_5']: '')}}%;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" ">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="text-muted opacity-6">{{ trans('lang.3 or Less Goals') }}</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">{{ trans('lang.4 or More Goals') }}</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['under_3_5']) ? $details['probability']['predictions']['under_3_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['over_3_5']) ? $details['probability']['predictions']['over_3_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['under_3_5']) ? $details['probability']['predictions']['under_3_5']: '')}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['over_3_5']) ? $details['probability']['predictions']['over_3_5']: '')}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="text-muted opacity-6">{{(isset($details['home_team_name']) ? $details['home_team_name']: '')}} <br> {{ trans('lang.No Score') }}</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6"><span style="display: flex;float: right;">{{(isset($details['home_team_name']) ? $details['home_team_name']: '')}}</span> <br> <span style="display: flex;float: right;">{{ trans('lang.Score At Least 1') }} </span></div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['HT_under_0_5']) ? $details['probability']['predictions']['HT_under_0_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['HT_over_0_5']) ? $details['probability']['predictions']['HT_over_0_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['HT_under_0_5']) ? $details['probability']['predictions']['HT_under_0_5']: '')}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['HT_over_0_5']) ? $details['probability']['predictions']['HT_over_0_5']: '')}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="text-muted opacity-6">{{(isset($details['away_team_name']) ? $details['away_team_name']: '')}} <br>{{ trans('lang.No Score') }}</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">
                                                            <span style="display: flex;float: right;">{{(isset($details['away_team_name']) ? $details['away_team_name']: '')}}</span> <br><span style="display: flex;float: right;">{{ trans('lang.Score At Least 1') }} </span></div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['AT_over_0_5']) ? $details['probability']['predictions']['AT_over_0_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['AT_under_0_5']) ? $details['probability']['predictions']['AT_under_0_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{isset($details['probability']['predictions']['AT_over_0_5']) ? $details['probability']['predictions']['AT_over_0_5']: ''}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: {{isset($details['probability']['predictions']['AT_under_0_5']) ? $details['probability']['predictions']['AT_under_0_5']: ''}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

<!------------ UserComment tab start ---------->

                    <div class="tab-pane fade p-3 in" id="live-chat" aria-labelledby="liveChatTab ">  
                    <input type="hidden" value="{{$timezone}}" name="userTimeZone" id="userTimeZone"  >           
                               <div class="chat">              
                                <!-- Chat messages go here -->
                                @if(isset($u_comments))
                                    @foreach($u_comments as $u_comment)
                                    @php
                                    $timezone = session('local_timezone', 'Asia/Jakarta');
                                    $localTime = \Carbon\Carbon::parse($u_comment['c_time'])
                                        ->timezone($timezone)
                                        ->format("Y-m-d H:i");
                                    @endphp

                                        <div class="liveChatContain">
                                            <div class="AccountInfo" >
                                                <div class="AcountImg">
                                                    @if ($u_comment['image'])
                                                    <img src="{{asset('uploads/'.$u_comment['image'])}}"   id="photoProfile">
                                                @else
                                                    <img src="{{asset('assets/img/default_avatar.png')}}"  id="photoProfile">
                                                @endif
                                            </div>

                                            <div class="AcountDetails">
                                                <div class="AcountName"> 
                                                    <strong class="primary-font" id="name">{{$u_comment['name']}}</strong>
                                                </div>
                                                <div class="TimeDetails">
                                                    <small class="pull-right text-muted">
                                                        <img src="{{ asset('images/prizeImage/clock.svg') }}" id="messageTime">
                                                        <time class="timeago"  style="margin-left: 2px;"datetime="{{ $localTime }}"></time>
                                                    </small> 
                                                </div>

                                            </div>
                                            
                                            </div>

                                            <div class="chat-body"> 
                                                <p id="message">{{$u_comment['comment']}}</p>
                                            </div>
                                            <hr style="border-top: 3px solid #eee">
                                        </div>
                                    @endforeach
                                @endif
                           </div>
                        

                        <!-- Input field for sending messages -->
                        <div class="panel-footer" >
                            <div class="input-group">
                                <input id="messageInput" type="text" class="form-control input-sm form-chat" placeholder="Type your message here..." value="">
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="sendBtn">{{ trans('lang.Send') }}</button>
                                </span>
                            </div>
                        </div>
                    </div>
<!------------ UserComment tab end ---------->
<div class="tab-pane bg-white fade p-3 in" id="team-news" aria-labelledby="newsTab ">
    @if(isset($m_news))
    
    @foreach($m_news as $index => $news)
        
    <div class="team">
         @if($index === 0)
        <a href="{{ $news['url'] }}">
            <div class="title-img">
                <img src="{{ $news['urlToImage'] }}" alt="" style="height: 100%; width: 100%;" id="sliderImg">
            </div>
            
            <h2 class="slider-heading" style="color: black; font-weight: 600; font-size: 13px; letter-spacing: 0px;" id="sliderNews">{{ $news['title'] }}</h2>
            <p  style="color: black; font-weight: 600; font-size: 13px; letter-spacing: 0px; margin-left: 12px " id="sliderNewsPortal">{{ $news['name'] }}</p>
            <div class="hr"></div>
        </a>
        @endif
        <br>
        <div class="col-xs-12 ct">
            <div class="row">
            <div class="col-xs-5">
            <a class="post-img" href="{{ $news['url'] }}">
                <img class="news-list-img" src="{{ $news['urlToImage'] }}" alt="" id="newsImg">
            
          </div>
            <div class="col-xs-7">
                <p class="title-cat" style="color: #337AB7; font-weight: 600; font-size: 13px; letter-spacing: 0px;" id="newsTitle">{{ $news['title'] }}</p>
                <p class="title-cat" style="color: black; font-weight: 600; font-size: 13px; letter-spacing: 0px;" id="newsPortal">{{ $news['name'] }}</p>
                
            </div>
        </a>
           </div>
        <span class="news-devider"></span>

        </div>
    </div>
   
    @endforeach
   
    

    @else
    
    <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('assets/img/detail-match/icon-menu/no-data.png') }}" style="height: 100px; padding: 11px;">
                <div>
                    <span style="font-weight: 800;">NO DATA</span>
                </div>
                <div>YET FOR THIS MATCH</div>
            </div>
        </div>
        

    @endif
    <div class="row">
            <div class="col-12 pd-10">
                <div class="team">
                    <br>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>



    

</div>
<!-- MatchNews Tab End------------------- -->

                </div>
            </div>
        </div>
    </div>
    <script>
    var translations = {
        'team_stats': '{{ trans('lang.TEAM STATS') }}',
        'team_adv_stats': '{{ trans('lang.TEAM ADVANCE STATS') }}',
        'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',

    };
</script>
</body>
@include('partials.footernew')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>

<script src="{{ asset('assets/js/matchDetails.js') }}"></script>
<script src="{{ asset('assets/js/jquery.timeago.js') }}"></script>

@if(Session::has('User') && Session::get('User')['status'] == 'active')
    <script type="text/javascript">
        $('.premium').removeClass('premium');
        $('.premium-alert').hide();
    </script>
@endif

<script type="text/javascript">

        $(document).ready(function() {

         jQuery("time.timeago").timeago();


       $('#sk_loader_match_details').hide();
        $('#match_details_body').show();

        $("#basicBtn").click(function() {
        $("#basicBtn").addClass("active");
        $("#advanceBtn").removeClass("active");

        $("#genStats").show();
        $("#advStats").hide();
    });

    // Click event for "Advance Stats" tab
    $("#advanceBtn").click(function() {
        $("#advanceBtn").addClass("active");
        $("#basicBtn").removeClass("active");

        $("#advStats").show();
        $("#genStats").hide();
        $("#teamStatsTitle").text(translations.team_adv_stats);

    });

    $('.btn-subscribe').click(function() {
            $('.premium-alert').hide();
            $('.premium').removeClass('premium');
        })
$("#basicBtn").click(function () {
    

   
    $("#teamStatsTitle").text(translations.team_stats);
});


    
    $("#basicTab").click(function() {
        $("#basicTab").addClass("active");
        $("#advanceTab").removeClass("active");

        $("#player_info").show();
        $("#adv-player_info").hide();
    });

    // Click event for "Advance Stats" tab
    $("#advanceTab").click(function() {
        $("#advanceTab").addClass("active");
        $("#basicTab").removeClass("active");

        $("#adv-player_info").show();
        $("#player_info").hide();
       

    });










    // $('#stats-tab').click(function(){
    //     var parentClassName = $(this).parent().attr('class');
    //     $('#stats-tab').html('<img src="http://127.0.0.1:8000/assets/img/detail-match/icon-menu/stats2.png">Stats');
     });
    </script>
</html>
