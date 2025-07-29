@include('partials.headernew')
<link href="{{ asset('/assets/css/lineup.css') }}" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
</head>

<body id="{{$fixture_id}}" onload="matchDetails(document.body);">
    <div class="wrapper">
        <!-- header -->
        <img src="{{ asset('assets/img/header.png') }}" width="100%" alt="">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- content -->
        <div class="detail-match">
            <div class="detail-match-header">
                <h4>DISPLAY</h4>
                <?php dd($details['homeTeam']['logo_path']) ?>
                <div class="row row-no-gutters sec-1">
                    <div class="col-xs-4 club">
                        <img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '')}}" alt="">
                        <p>{{(isset($details['homeTeam']'[name]') ? $details['homeTeam']'[name]': '')}}</p>
                    </div>
                    <div class="col-xs-4">
                        <div class="score-board">
                            <!-- <div class="date">
                                {{(isset($date_time) ? $date: '')}}
                                <br>
                                {{(isset($date_time) ? $time: '')}}
                            </div> -->

                            <div id="dt_id"></div>

                            <div class="score">{{(isset($scores->localteam_score) ? $scores->localteam_score: '')}} : {{(isset($scores->visitorteam_score) ? $scores->visitorteam_score: '')}}</div>
                        </div>
                    </div>
                    <div class="col-xs-4 club">
                        <img src="{{(isset($visitor_team_details->logo_path) ? $visitor_team_details->logo_path: '')}}" alt="">
                        <p>{{(isset($visitor_team_details->name) ? $visitor_team_details->name: '')}}</p>
                    </div>
                </div>
                <div class="sec-3">
                    <div class="card">
                        <!-- goal -->
                        <div class="row row-no-gutters d-flex ais-stretch">
                            <div class="col-xs-5 d-flex ais-center j-start">
                                <table>
                                    @if($goals)
                                        @foreach($goals as $goal)
                                            @if($goal->team_id == $details['homeTeam']->id)
                                                <tr>
                                                    <td>{{$goal->player_name}}</td>
                                                    <td class="pl-3">{{$goal->minute}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                            <div class="col-xs-2 d-flex ais-center j-center">
                                <img src="{{ asset('assets/img/detail-match/goal.png') }}" alt="">
                            </div>
                            <div class="col-xs-5 d-flex ais-center j-center">
                                <table>
                                    @if(count($goals)>0)
                                        @foreach($goals as $goal)
                                            @if($goal->team_id == $visitor_team_details->id)
                                                <tr>
                                                    <td>{{$goal->player_name}}</td>
                                                    <td class="pl-3">{{$goal->minute}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-no-gutters sec-2">
                    <div class="col-xs-6 stadium">
                        Stadium: <br> {{(isset($venue->name) ? $venue->name: '')}}
                    </div>
                    <div class="col-xs-6 referee">
                        Referee: <br> {{(isset($referee->fullname) ? $referee->fullname: '')}}
                    </div>
                </div>
            </div>

            <div class="match-detail-body">
                <div class="menu menu-details">
                    <ul class="nav nav-pills">

                    <li class="activ1e"> <a class="nav-link" id="timeline-tab" onclick="myFunction(1)" data-toggle="tab" href="#timeline" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/timeline2.png') }}">Timeline</a></li>
                    <li><a class="nav-link" id="players-tab" onclick="myFunction(2)" data-toggle="tab" href="#players" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/players.png') }}">Players</a></li>
                    <li><a class="nav-link" id="lineups-tab" onclick="myFunction(1)" data-toggle="tab" href="#lineups" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/lineups.png') }}">Lineups</a></li>
                    <li><a class="nav-link" id="stats-tab" onclick="myFunction(1)" data-toggle="tab" href="#stats" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/stats.png') }}">Stats</a></li>
                    <li><a class="nav-link" id="head2head-tab" onclick="myFunction(1)" data-toggle="tab" href="#head2head" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/head2head.png') }}">Head to Head</a></li>
                        <li><a class="nav-link" id="prediction-tab" onclick="myFunction(1)" data-toggle="tab" href="#prediction" role="tab" aria-controls="" aria-selected="false"><img src="{{ asset('assets/img/detail-match/icon-menu/prediction.png') }}">Prediction</a></li>
                        <li><a href="#live-chat"><img src="{{ asset('assets/img/detail-match/icon-menu/live-chat.png') }}">Live Chat</a></li>
                        <li><a href="#news"><img src="{{ asset('assets/img/detail-match/icon-menu/news.png') }}">News</a></li>

                    </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade p-3 active in" id="timeline" aria-labelledby="timeline-tab">
                        <!-- <div role="tabpanel" class="tab-pane active" id="timeline" style="margin-bottom: 20px;"> -->
                        <!-- <div class="row activit"> -->
                            @if ($comments)
                            @foreach ($comments as $comment )
                            <div class="col-xs-2">
                                <div class="notif-icon">
                                    <div class="icon">
                                        <img src="/assets/img/detail-match/icon-timeline/Group 114.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-10">
                                <div class="notif-body">
                                    <div class="msg">
                                        <h4>
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
                                        </h4>
                                        <span>{{$comment['comment']}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        <!-- </div> -->
                    </div>
                    <div class="tab-pane fade p-3 in" id="players" aria-labelledby="players-tab">
                        <!-- <div role="tabpanel" class="tab-pane" id="players"> -->
                            <div class="block">

                                <div class="player-states"><div class="pull-left"><strong>Passes</strong></div><div class="pull-right">Successfull/Total</div></div>
                                <table class="table table-responsive players">
                                    <tbody>
                                    @if(isset($details['playersStats']['final_passes']))
                                    @foreach ($details['playersStats']['final_passes'] as $players )
                                        <tr><td class="one"><img src="{{$players['team_logo']}}" alt="" class="player-img"></td>
                                        <td class="ver-mid">{{$players['players_name']}}</td>
                                        <td class="one"><img src="{{$players['players_logo']}}" alt="" class="player-img">
                                    </td>
                                    <td class="text-right"><strong>{{$players['passes_total']}}</strong> /<strong> {{round($players['passes_success'])}}</strong></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody></table>
                                <div class="goaly player-states"><div class="pull-left"><strong>Passing Accuracy (Final Third)</strong></div><div class="pull-right">&nbsp;</div></div>
                                <table class="table table-responsive players">
                                    <tbody>
                                    @if (isset($details['playersStats']['final_passingAccuracy']))
                                    @foreach ($details['playersStats']['final_passingAccuracy'] as $players )
                                        <tr><td class="one"><img src="{{$players['team_logo']}}" alt="" class="player-img"></td>
                                        <td class="ver-mid">{{$players['players_name']}}</td>
                                        <td class="one"><img src="{{$players['players_logo']}}" alt="" class="player-img">
                                    </td>
                                    <td class="text-right"><strong>{{$players['passing_accuracy']}}%</strong></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody></table>
                                <div class="goaly player-states"><div class="pull-left"><strong>Crosses</strong></div><div class="pull-right">Successfull/Total</div></div>
                                <table class="table table-responsive players">
                                    <tbody>
                                    @if (isset($details['playersStats']['final_crosses']))
                                    @foreach ($details['playersStats']['final_crosses'] as $players )
                                        <tr><td class="one"><img src="{{$players['team_logo']}}" alt="" class="player-img"></td>
                                        <td class="ver-mid">{{$players['players_name']}}</td>
                                        <td class="one"><img src="{{$players['players_logo']}}" alt="" class="player-img">
                                    </td>
                                    <td class="text-right"><strong>{{$players['crosses_accuracy']}}</strong>/<strong>{{$players['crosses_total']}}</strong></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody></table>
                                <div class="goaly player-states"><div class="pull-left"><strong>Shots</strong></div><div class="pull-right">Goal / On Target / Total</div></div>
                                <table class="table table-responsive players">
                                    <tbody>
                                    @if (isset($details['playersStats']['final_shots']))
                                    @foreach ($details['playersStats']['final_shots'] as $players )
                                        <tr><td class="one"><img src="{{$players['team_logo']}}" alt="" class="player-img"></td>
                                        <td class="ver-mid">{{$players['players_name']}}</td>
                                        <td class="one"><img src="{{$players['players_logo']}}" alt="" class="player-img">
                                    </td>
                                    <td class="text-right"><strong>{{$players['shots_goal']}}</strong>/<strong>{{$players['shots_onTarget']}}</strong>/<strong>{{$players['shots_total']}}</strong></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody></table>
                                <div class="goaly player-states"><div class="pull-left"><strong>Chances Created</strong></div><div class="pull-right">Assists / Chances</div></div>
                                <table class="table table-responsive players">
                                    <tbody>
                                    @if (isset($details['playersStats']['final_changesCreated']))
                                    @foreach ($details['playersStats']['final_changesCreated'] as $players )
                                        <tr><td class="one"><img src="{{$players['team_logo']}}" alt="" class="player-img"></td>
                                        <td class="ver-mid">{{$players['players_name']}}</td>
                                        <td class="one"><img src="{{$players['players_logo']}}" alt="" class="player-img">
                                    </td>
                                    <td class="text-right"><strong>{{$players['created_assists']}}</strong>/<strong>{{$players['created_chances']}}</strong></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody></table>
                            </div>
                    </div>
                    <div class="tab-pane fade p-3 in" id="lineups" aria-labelledby="lineups-tab">

                    {{--Line-ups --}}
                        {{-- <div class="field" data-type="lineup-field">
                            <div class="home-info" data-type="home-info">
                                <div class="name" data-type="team">
                                    <img src="{{(isset($details['homeTeam']['logo_path']) ?$details['homeTeam']['name']: '')}}" height="24" alt=""/> &nbsp;{{(isset($details['homeTeam']['name']) ?$details['homeTeam']['name']: '')}}
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
                                    <img src="{{(isset($details['awayTeam']['logo_path']) ?$details['homeTeam']['name']: '')}}" height="24" alt=""/>
                                    &nbsp;{{(isset($details['awayTeam']['name']) ?$details['awayTeam']['name']: '')}}
                                </div>
                                <div class="formation" data-type="formation">4-4-2</div>
                            </div>
                        </div> --}}
                    {{-- end Line-ups--}}
                    </div>
                    <div class="tab-pane fade p-3 in" id="stats" aria-labelledby="stats-tab">
                    <!-- <div role="tabpanel" class="tab-pane" id="stats"> -->

                        <div class="block">
                            <div class="row min-gutter">
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a href="#" class="btn btn-block btn-cta-premium active">Basic Stats</a>
                                </div>
                                <div class="col-xs-6 col md-6 col-lg-6">
                                    <a href="{{route('advancestats')}}" class="btn btn-block btn-cta-premium"><span class="icon icon-external-link"></span> Advance Stats</a>
                                </div>
                            </div>
                        </div>
                        <div class="stats-header">
                            <img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '-')}}" alt="">
                            <h4>TEAM STATS</h4>
                            <img src="{{(isset($details['awayTeam']['logo_path']) ? $details['awayTeam']['logo_path']: '-')}}" alt="">
                        </div>
                        <div class="stats-body">
                            <div class="stats-item">
                            @if (isset($details['stats'][0]['shots']['total']))
                            @php
                                $totals=$details['stats'][0]['shots']['total']+$details['stats'][1]['shots']['total'];
                                $p=(100*$details['stats'][0]['shots']['total'])/$totals;
                                $q=(100*$details['stats'][1]['shots']['total'])/$totals;
                            @endphp
                                <div class="point-left" style="width: {{$p}}%;">{{$details['stats'][0]['shots']['total']}}</div>
                                <div class="point-name">Shots</div>
                                <div class="point-right" style="width: {{$q}}%;">{{$details['stats'][1]['shots']['total']}}</div>
                            @endif
                            </div>
                            <div class="stats-item">
                            @if (isset($details['stats'][0]['shots']['ongoal']))
                            @php
                                $totals=$details['stats'][0]['shots']['ongoal']+$details['stats'][1]['shots']['ongoal'];
                                $p=(100*$details['stats'][0]['shots']['ongoal'])/$totals;
                                $q=(100*$details['stats'][1]['shots']['ongoal'])/$totals;
                            @endphp
                                <div class="point-left" style="width: {{$p}}%;">{{$details['stats'][0]['shots']['ongoal']}}</div>
                                <div class="point-name">Shot On Target</div>
                                <div class="point-right" style="width: {{$q}}%;">{{$details['stats'][1]['shots']['ongoal']}}</div>
                            @endif
                            </div>
                            <div class="stats-item">
                            @if (isset($details['stats'][0]['possessiontime']))
                            @php
                                $totals=$details['stats'][0]['possessiontime']+$details['stats'][1]['possessiontime'];
                                $p=(100*$details['stats'][0]['possessiontime'])/$totals;
                                $q=(100*$details['stats'][1]['possessiontime'])/$totals;
                            @endphp
                                <div class="point-left" style="width: {{$p}}%;">{{$details['stats'][0]['possessiontime']}}</div>
                                <div class="point-name">Possession</div>
                                <div class="point-right" style="width: {{$q}}%;">{{$details['stats'][1]['possessiontime']}}</div>
                            @endif
                            </div>
                            <div class="stats-item">
                            @if (isset($details['stats'][0]['passes']['total']))
                            @php
                                $totals=$details['stats'][0]['passes']['total']+$details['stats'][1]['passes']['total'];
                                $p=(100*$details['stats'][0]['passes']['total'])/$totals;
                                $q=(100*$details['stats'][1]['passes']['total'])/$totals;
                            @endphp
                                <div class="point-left" style="width: {{$p}}%;">{{$details['stats'][0]['passes']['total']}}</div>
                                <div class="point-name">Passes</div>
                                <div class="point-right" style="width: {{$q}}%;">{{$details['stats'][1]['passes']['total']}}</div>
                            @endif
                                <!-- <div class="point-left" style="width: 70%;">5</div>
                                <div class="point-name">Passes</div>
                                <div class="point-right" style="width: 30%;">2</div> -->
                            </div>
                            <div class="stats-item">
                            @if (isset($details['stats'][0]['passes']['accurate']))
                            @php
                                $totals=$details['stats'][0]['passes']['accurate']+$details['stats'][1]['passes']['accurate'];
                                $p=(100*$details['stats'][0]['passes']['accurate'])/$totals;
                                $q=(100*$details['stats'][1]['passes']['accurate'])/$totals;
                            @endphp
                                <div class="point-left" style="width: {{$p}}%;">{{$details['stats'][0]['passes']['accurate']}}</div>
                                <div class="point-name">Pass accuracy</div>
                                <div class="point-right" style="width: {{$q}}%;">{{$details['stats'][1]['passes']['accurate']}}</div>
                            @endif
                                <!-- <div class="point-left" style="width: 10%;">0</div>
                                <div class="point-name">Pass accuracy</div>
                                <div class="point-right" style="width: 90%;">1</div> -->
                            </div>
                            <div class="stats-item">
                            @if (isset($details['stats'][0]['fouls']))
                            @php
                                $totals=$details['stats'][0]['fouls']+$details['stats'][1]['fouls'];
                                $p=(100*$details['stats'][0]['fouls'])/$totals;
                                $q=(100*$details['stats'][1]['fouls'])/$totals;
                            @endphp
                                <div class="point-left" style="width: {{$p}}%;">{{$details['stats'][0]['fouls']}}</div>
                                <div class="point-name">Fouls</div>
                                <div class="point-right" style="width: {{$q}}%;">{{$details['stats'][1]['fouls']}}</div>
                            @endif
                            </div>
                            <div class="stats-item">
                            @if (isset($details['stats'][0]['fouls']))
                            @php
                                $totals=$details['stats'][0]['corners']+$details['stats'][1]['corners'];
                                $p=(100*$details['stats'][0]['corners'])/$totals;
                                $q=(100*$details['stats'][1]['corners'])/$totals;
                            @endphp
                                <div class="point-left" style="width: {{$p}}%;">{{$details['stats'][0]['corners']}}</div>
                                <div class="point-name">Corners</div>
                                <div class="point-right" style="width: {{$q}}%;">{{$details['stats'][1]['corners']}}</div>
                            @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade p-3 in" id="head2head" aria-labelledby="head2head-tab">
                        <h3>Head to Head</h3>
                        <table class="table table-striped mb-10 text-small">
                            <tbody><tr>
                                <td width="" class="text-left">
                                    <img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '-')}}" height="50" alt="">
                                </td>

                                <td width="" class="text-center bdr1"><span class="ctr">{{$handToHand['statusOfGame']['draw']}}</span>Draw</td>
                                <td width="" class="text-center"><span class="ctr">{{$handToHand['statusOfGame']['loss']}}</span>Wins</td>
                                <td width="" class="text-right"><img src="{{(isset($details['homeTeam']['logo_path']) ? $details['awayTeam']['logo_path']: '-')}}" height="50" alt="">
                                </td>
                            </tr></tbody>
                        </table>
                        <div class="progress-bar-sm progress-bar-animated-alt progress"><div class="progress-bar bg-win" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 81.8182%;"></div><div class="progress-bar bg-lose" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 18.1818%;"></div></div>
                        @if ($handToHand)
                        <table class="table table-striped custab mb-10">
                            <tbody>
                                @foreach ($handToHand['matches'] as $match )
                                <tr>
                                    <td width="50" class="text-date">
                                        {{date('D', strtotime($match['date']))}}, {{isset(explode('-',trim($match['date']))[0])?explode('-',trim($match['date']))[0]:'----'}}/{{isset(explode('-',trim($match['date']))[1])?explode('-',trim($match['date']))[1]:'--'}}/{{isset(explode('-',trim($match['date']))[2])?explode('-',trim($match['date']))[2]:'--'}}
                                    </td>
                                    <td>
                                        <div class="col-xs-2 handToHand" ><p class="">{{$match['homeTeam']}}</p>
                                        </div>
                                        <div class="col-xs-2 handToHand" >
                                            <img class="handToHandimg" src="{{$match['homeTeamLogo']}}">
                                        </div>
                                        <div class="col-xs-4 handToHand" >
                                            <strong>{{$match['homeTeamScore']}} - {{$match['awayTeamScore']}}</strong>
                                        </div>
                                        <div class="col-xs-2 handToHand"><img class="handToHandimg" src="{{$match['awayTeamLogo']}}"></div>
                                        <div class="col-xs-2 handToHand" >
                                            <p class="">{{$match['awayTeam']}}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div> --}}
                    <div class="tab-pane fade p-3 in" id="prediction" aria-labelledby="prediction-tab">
                        <div class="lm prediction_list" style="padding: 10px; height: auto;">
                        <div class="widget-content">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="text-muted opacity-6">Nantes</div>
                                    </div>
                                    <div class="widget-content-middle">
                                        <div class="text-muted opacity-6">Draw</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="text-muted opacity-6">Lorient</div>
                                    </div>
                                </div>
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-numbers fsize-3 text-win">{{(isset($details['probability']['predictions']['home']) ? $details['probability']['predictions']['home']: '')}}%</div>
                                    </div>
                                    <div class="widget-content-middle">
                                        <div class="widget-numbers fsize-3 text-muted">{{(isset($details['probability']['predictions']['draw']) ? $details['probability']['predictions']['draw']: '')}}%</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers fsize-3 text-lose">{{(isset($details['probability']['predictions']['away']) ? $details['probability']['predictions']['away']: '')}}% </div>
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
                            <h4>Data</h4>
                            <div class="liner"></div>
                            <div style="border: none;">
                                <div>
                                    <div aria-expanded="true" style="padding: 0px;">
                                    <h4 class="title-pred" data-toggle="collapse" data-target="#pred1">Predictions<i class="fa fa-arrow-circle-down pull-right"></i></h4>
                                    </div>
                                </div>
                            </div>
                            <div>
                            <div class="">
                                <div class="widget-content">
                                    <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                        <div class="text-muted opacity-6">Both Team To Score</div>
                                        </div>
                                        <div class="widget-content-middle">
                                            <div class="text-muted opacity-6"></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="text-muted opacity-6">No Score</div>
                                        </div>
                                    </div>
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['btts']) ? $details['probability']['predictions']['btts']: '')}}%</div>
                                        </div>
                                        <div class="widget-content-middle">
                                            <div class="widget-numbers fsize-3 text-muted"></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['btts']) ? 100-$details['probability']['predictions']['btts']: '')}}</div>
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
                                                <div class="text-muted opacity-6">Score Probability</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="text-muted opacity-6"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped custab mb-10">
                                        <tbody>

                                        @if (isset($details['probability']['predictions']['correct_score']))
                                        @foreach ($details['probability']['predictions']['correct_score'] as $score )
                                        {{-- @php
                                        dd($score);
                                     @endphp --}}
                                        {{-- <tr>
                                            <td width="60%" class="text-spec">
                                                <div class="col-xs-6 pd-0">
                                                    <p class="">
                                                        <img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '-')}}" alt="" style="height: 15px; width: 11px; margin: 1px;"><strong style="margin-left: 5px;">Colorado Rapids</strong>
                                                    </p>
                                                    <p class="">
                                                        <img src="{{(isset($details['awayTeam']['logo_path']) ? $details['awayTeam']['logo_path']: '-')}}" alt="" style="height: 15px; width: 11px; margin: 1px;"><strong style="margin-left: 5px;">Los Angeles FC</strong>
                                                    </p>
                                                </div>
                                                <div class="col-xs-1">
                                                    <p class="text-left" style="padding-top: 15px; text-align: right;">{{$score['homeTeam']['score']}}</p>
                                                    <p class="text-left" style="padding-top: 15px; text-align: right;">{{$score['awayTeam']['score']}}</p>
                                                </div>
                                            </td>
                                            <td width="" class="text-center">
                                                <div class="widget-content">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers text-win">{{$score['homeTeam']['prob']}}%</div>
                                                        </div>
                                                        <div class="widget-content-middle">
                                                            <div class="widget-numbers text-muted"></div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="widget-numbers text-lose">{{100-$score['homeTeam']['prob']}}% </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="progress-bar-sm progress-bar-animated-alt progress mb-0">
                                                    <div class="progress-bar bg-win" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" style="width: {{$score['homeTeam']['prob']}}%;"></div>
                                                    <div class="progress-bar bg-default" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width: {{$score['awayTeam']['score']}}%;"></div>
                                                </div>
                                            </td>
                                        </tr> --}}
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-6">Under 2 Goals</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="text-muted opacity-6"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6">Over 3 Goals</div>
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
                                                        <div class="text-muted opacity-6">3 or Less Goals</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">4 or More Goals</div>
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
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br> No Score</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br> Score At Least 1 </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['predictions']['prediction']['HT_under_0_5']) ? $details['predictions']['prediction']['HT_under_0_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['predictions']['prediction']['HT_over_0_5']) ? $details['predictions']['prediction']['HT_over_0_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['predictions']['prediction']['HT_under_0_5']) ? $details['predictions']['prediction']['HT_under_0_5']: '')}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['predictions']['prediction']['HT_over_0_5']) ? $details['predictions']['prediction']['HT_over_0_5']: '')}}%;"></div>
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
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br>No Score</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br>Score At Least 1 </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['predictions']['prediction']['AT_over_0_5']) ? $details['predictions']['prediction']['AT_over_0_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['predictions']['prediction']['AT_under_0_5']) ? $details['predictions']['prediction']['AT_under_0_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['predictions']['prediction']['AT_over_0_5']) ? $details['predictions']['prediction']['AT_over_0_5']: '')}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['predictions']['prediction']['AT_under_0_5']) ? $details['predictions']['prediction']['AT_under_0_5']: '')}}%;"></div>
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
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$('#btn-chat').on('click', function() {
var comment = $('#btn-input').val();
var match_id = $('#btn-match-id').val();
var base_url = window.location.origin;
if(comment!=""){
    $.ajax({
        url: base_url+"/comment",
        type: "POST",
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            comment: comment,
            match_id:match_id,
        },
        //console.log(response); return false;
        //cache: false,
        success: function(dataResult){
            $("#btn-input").val('');
             $.each(dataResult,function(index,matches){
                                         $("#sms").append('matches.comment');
            console.log(index);
            });
        }
    });
    }
    else{
        alert('Please fill all the field !');
    }
});
});

    // $(document).ready(function() {
    //     let activity = $('.activity')
    //     for (var i=0; i<10; i++) {
    //         activity.clone().appendTo('#timeline')
    //     }
    // })
    // $('.menu .nav a').click(function (e) {
    //     e.preventDefault()
    //     $(this).tab('show')
    // })
    // $(document).ready(function() {
    //     let activity = $('.activity')
    //     for (var i=0; i<10; i++) {
    //         activity.clone().appendTo('#timeline')
    //     }
    // })


    $(document).ready(function() {

        let activity = $('.activity')
        for (var i=0; i<10; i++) {
            activity.clone().appendTo('#timeline')
        }
    })
</script>
</html>
