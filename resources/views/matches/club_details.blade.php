@include('partials.header_portal')

</head>


<body>

    <div>
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')

        <div id="skloader_club"> @include('club.skloader_club')</div>
        <div class="page-content" id="club_body_content" style="display:none;">

            <!-- league-cover -->
            <div class="club-cover">
                <div class="club-cover-mask">
                    <div class="inner-club-cover">
                        <div class="club-logo" id="clubLogo">
                            <img class="img-fluid" src="{{$team_lgo}}" alt="">         
                        </div>
                        <div class="line bg-purple text-white">
                            <div class="box">
                                <h5 id="venueTxt">{{ trans('lang.Venue') }} :</h5>
                                <span id="venueName">{{$venue}}</span>
                            </div>
                            <div class="box">
                                <h5 id="cityTxt">{{ trans('lang.City') }}:</h5>
                                <span id="city">{{$city}}</span>
                            </div>
                        </div>
                        <div class="line bg-white">
                            <div class="box">
                                <h5 id="leagueTxt">{{ trans('lang.League') }}</h5>
                                <span id="league">{{$league_name}}</span>
                            </div>
                            <div class="box">
                                <h5 id="countryTxt">{{ trans('lang.Country') }} :</h5>
                                <span id="country">{{$country}}</span>
                            </div>
                        </div>
                        <div class="follow-container" id="follow-container" style="display: flex;">
                            @if($isFavteam == '1')
                            <button class="btn btn-lg unfollow-button" data-table-id="{{ isset($table_id) ? $table_id : '' }}"
                            data-team-nm="{{ isset($team_nm) ? $team_nm : '' }}"
                            data-team-code="{{ isset($team_code) ? $team_code : '' }}"
                            data-team-lgo="{{ isset($team_lgo) ? $team_lgo : '' }}"
                            data-league-name="{{ isset($league_name) ? $league_name : '' }}" id="unfollowBtn">                                
                            {{ trans('lang.Unfollow') }}
                        </button>
                        @else
                        <button class="btn btn-lg follow-button"
                        data-table-id="{{ isset($table_id) ? $table_id : '' }}"
                        data-team-nm="{{ isset($team_nm) ? $team_nm : '' }}"
                        data-team-code="{{ isset($team_code) ? $team_code : '' }}"
                        data-team-lgo="{{ isset($team_lgo) ? $team_lgo : '' }}"
                        data-league-name="{{ isset($league_name) ? $league_name : '' }}" id="followBtn">
                        {{ trans('lang.Follow') }}
                    </button>
                    @endif
                </div>


                        <!-- <div class="seasonSelection">Select Season</div>
                        <select name="cars" id="cars" class="seasonList" fdprocessedid="7fw975">
                            <option value="2023/24">2023/24</option>
                            <option value="2022/23">2022/23</option>
                            <option value="2021/22" >2021/22</option>
                            
                      </select> -->
                  </div>
              </div>
          </div>
          <input type="hidden" name="TeamId" id="team_id"  value="{{$team_id}}">
          <input type="hidden" name="season_id" id="season_id" value="{{isset($season_id)?$season_id:''}}">
          <input type="hidden" name="league_id" id="league_id" value="{{isset($league_id)?$league_id:''}}">
          <!-- league menu -->
          <ul class="club-menu bg-purple" id="team_details" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" id="infoTab " data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true" aria-expanded="true">{{ trans('lang.Info') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="matchTab " data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false" aria-expanded="false">{{ trans('lang.Match') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="playerTab " data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">{{ trans('lang.Player') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="coachTab " data-toggle="tab" href="#coach" role="tab" aria-controls="coach" aria-selected="false">{{ trans('lang.Coaches') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="standingsTab " data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false" aria-expanded="false">{{ trans('lang.Standings') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="statsTab " data-toggle="tab" href="#stats" role="tab" aria-controls="stats" aria-selected="false" aria-expanded="false">{{ trans('lang.Stats') }}</a>
            </li>
            <!-- <ul class="club-menu bg-purple"> -->
                <!-- <li class="active"><a href="17.html">Info</a></li>
                <li><a href="18.html">Match</a></li>
                <li><a href="19.html">Player</a></li> -->
                <!-- <li><a href="#">Standings</a></li> -->
            </ul>

            <!-- tabs content -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active p-3 in" id="one" aria-labelledby="infoTab ">
                    <div class="tab-content">
                        <!-- club highlight work-->
                        <div class="club-highlight block bg-grey">
                            <h5 class="Tseason" style="margin-left: 11px">{{$season_name??'2024/2025'}}</h5>
                            <ul>
                                <li>
                                    <span id="Matched_played">{{$teamSeasonInfo['season_info']['Matched_played']??'-'}}</span>
                                    <span id="matchesPlayedTxt">{{ trans('lang.Matches Played') }}</span>
                                </li>
                                <li>
                                    <span id="Goal">{{$teamSeasonInfo['season_info']['Goals']??'-'}}</span>
                                    <span id="goalTxt">{{ trans('lang.Goal') }}</span>
                                </li>
                                <li>
                                    <span id="Yellow">{{$teamSeasonInfo['season_info']['Yellow_Cards']??'-'}}</span>
                                    <span id="yellowCardTxt">{{ trans('lang.Yellow Cards') }}</span>
                                </li>
                                <li>
                                 <span id="Red">{{$teamSeasonInfo['season_info']['Red_Cards']??'-'}}</span>
                                 <span id="redCardTxt">{{ trans('lang.Red Cards') }} </span>
                             </li>

                         </ul>

                     </div>

                     <!-- top player -->
                     <div class="pleague-top-player-box">
                        <div class="tag bg-dark d-flex text-white">
                            <span class="mr-auto" id="topPlayerTxt">{{ trans('lang.Top Player') }}</span>
                            <span class='Tseason' id="season"></span>
                        </div>
                        <div class="bg-white">
                            <ul id="top-players">
                                 @if(isset($teamTopPlayers) && !empty($teamTopPlayers['success']))
                                 @foreach(['goals', 'assists', 'yellowcards'] as $type)
                                 @if(isset($teamTopPlayers[$type]) && is_array($teamTopPlayers[$type]) && !empty($teamTopPlayers[$type]))
                                    @php $Player = $teamTopPlayers[$type]; @endphp
                                <li class="m-0">
                                    <a>
                                        <div class="ptop-player-box">
                                            <div class="ptop-player-box-glass"></div>
                                            <span class="ptop-player-box-position" id="playerPosition">{{ $Player['position_name'] }}</span>
                                            <div class="ptop-player-box-team player-team-lgo">
                                                <img class="img-fluid" src="{{ $Player['team_logo'] ?? '-' }}" alt="" id="clubImg">
                                            </div>
                                            <a href="/player/details/{{ $Player['player_id'] }}">
                                                <img src="{{ $Player['player_image'] }}" alt="Player Image" onerror="this.src='{{ asset('assets/img/players/no-player.png') }}'">
                                            </a>
                                            <p class="m-0" style="height:auto;">
                                                {{ $Player['player_name'] ? Str::limit($Player['player_name'], 17) : '-' }}
                                            </p>
                                            <div class="ptop-player-box-score">
                                                {{ ucfirst($type) }}<br>
                                                <strong><b>{{ $Player[$type] ?? '0' }}</b></strong>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                                @else
                                <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" class="no-data-img">
                                @endif
                            </ul>
                        </div>
                    </div>


                    <!-- club matches -->

                    <div class="tag bg-purple d-flex text-white">
                        <span class="mr-auto">{{ trans('lang.Last Game') }}</span>
                        <span class="bg-whitepurple" id="previouslisting_more" data-target="pastMatches">{{ trans('lang.More') }}</span>
                    </div>
                    <div class="container-matches" id="pastMatches">

                    </div>

                    <div class="tag bg-purple d-flex text-white">
                        <span class="mr-auto" id="nextGameTxt">{{ trans('lang.Next Game') }}</span>
                        <span class="bg-whitepurple" id="load_more" data-target="futureMatches">{{ trans('lang.More') }}</span>
                    </div>
                    <div class="container-matches" id="futureMatches">

                    </div>

                    

                    <!-- competion history -->
                    <div class="tag bg-green d-flex text-white">
                        <span class="mx-auto" id="trophy">{{ trans('lang.Trophy') }}</span>
                    </div>
                    <div class="competion-hstr" id="trophies">
                        <ul>
                           @if(!empty($trophies))
                           @foreach($trophies as $trophy)
                           <li>
                            <div class="cover-img">
                                <img src="{{ isset($trophy['league_logo']) ? $trophy['league_logo'] : asset('assets/img/Group 169.png') }}" alt="" id="trophyLeagueImg">
                            </div>

                            <h3><strong id="trophyLeagueTotal">{{ $trophy['win_times'] }}</strong></h3>
                            <span id="trophyLeague">{{ $trophy['league_name']??'Local League' }}</span>
                        </li>
                        @endforeach
                        @else
                        <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt="">        
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane fade p-3" id="two" aria-labelledby="matchTab ">
            <div class="tab-content">



                <!-- league matches -->
                <div class="tag"><u><b></b></u></div>
                <div class="container-matches" id="matches">

                </div>

            </div>
        </div>
        <div class="tab-pane fade p-3" id="three" aria-labelledby="playerTab ">
            <div id="skloader_club2">@include('club.skloader_club2')</div>
            <div class="tab-content" id="three-tab-content"style="display:none;">
                <div class="standings table-responsive">
                    <table class="table">
                      <thead>
                        <tr class="bg-dark text-white">
                            <td id="numberTitle">{{ trans('lang.No.') }}</td>
                            <td id="playerPosition">{{ trans('lang.Goal Keepers') }}</td>
                            <td id="playedTitle">{{ trans('lang.Played') }}</td>
                            <td id="saveTitle">{{ trans('lang.Save') }}</td>
                            <td id="yellowTitle">{{ trans('lang.Yellow') }}</td>
                            <td id="redTitle">{{ trans('lang.Red') }}</td>
                        </tr>
                    </thead>
                    <tbody id="GoalKeepers">

                    </tbody>

                </table>
            </div>
            <div class="standings table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-dark text-white">
                            <td id="numberTitle">{{ trans('lang.No.') }}</td>
                            <td id="playerPosition">{{ trans('lang.Defenders') }}</td>
                            <td id="playedTitle">{{ trans('lang.Played') }}</td>
                            <td id="saveTitle">{{ trans('lang.Save') }}</td>
                            <td id="yellowTitle">{{ trans('lang.Yellow') }}</td>
                            <td id="redTitle">{{ trans('lang.Red') }}</td>                                    
                        </tr>
                    </thead>
                    <tbody id="Defender">

                    </tbody>

                </table>
            </div>
            <div class="standings table-responsive">
                <table class="table">

                    <thead>
                        <tr class="bg-dark text-white">                                    
                         <td id="numberTitle">{{ trans('lang.No.') }}</td>
                         <td id="playerPosition">{{ trans('lang.Midfielders') }}  </td>
                         <td id="playedTitle">{{ trans('lang.Played') }}</td>
                         <td id="goalTitle">{{ trans('lang.Goal') }}</td>
                         <td id="yellowTitle">{{ trans('lang.Yellow') }}</td>
                         <td id="redTitle">{{ trans('lang.Red') }}</td>              
                     </tr>
                 </thead>
                 <tbody id="Midfilders">

                 </tbody>
             </table>
         </div>
         <div class="standings table-responsive">
            <table class="table">
                <thead>
                    <tr class="bg-dark text-white">
                        <td id="numberTitle">{{ trans('lang.No.') }}</td>
                        <td id="playerPosition">{{ trans('lang.Attackers') }}</td>
                        <td id="playedTitle">{{ trans('lang.Played') }}</td>
                        <td id="goalTitle">{{ trans('lang.Goal') }}</td>
                        <td id="yellowTitle">{{ trans('lang.Yellow') }}</td>
                        <td id="redTitle">{{ trans('lang.Red') }}</td>              

                    </tr>
                </thead>
                <tbody id="Attackers">

                </tbody>
            </table>
        </div>

    </div>
        </div>
        <div class="tab-pane fade p-3" id="coach" aria-labelledby="coachTab ">
          <div class="tab-content" id="coach-tab-content">
            <div class="standings table-responsive">
            <table class="table table-bordered coach-table">
    <thead class="bg-dark text-white">
        <tr>
            <th style="width: 50px;">{{ trans('lang.No.') }}</th>
            <th style="min-width: 200px;">{{ trans('lang.Name') }}</th>
            <th style="width: 120px;">{{ trans('lang.From') }}</th>
            <th style="width: 120px;">{{ trans('lang.To') }}</th>
        </tr>
    </thead>
    <tbody id="Coaches">
        @if (!empty($coaches) && count($coaches) > 0)
            @foreach ($coaches as $index => $coach)
            <tr>
                <td class="coach-index">{{ $index + 1 }}.</td>
                <td class="coach-name-col">
                    <div class="coach-info">
                        <img src="{{ $coach['coach']['image_path'] ?? '/images/default.png' }}"
                             alt="{{ $coach['coach']['display_name'] }}"
                             class="coach-avatar"
                             onerror="this.src='/images/default.png'">
                        <span class="coach-name">
                            {{ $coach['coach']['display_name'] ?? '-' }}
                        </span>
                    </div>
                </td>
                <td>{{ \Carbon\Carbon::parse($coach['start'])->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($coach['end'])->format('d M Y') }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">
                    <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}"  alt="No Data">
                </td>
            </tr>
        @endif
    </tbody>
</table>


        </div>


        </div>
        </div>
<div class="tab-pane fade p-3" id="four" aria-labelledby="standingsTab ">
   <!-- tabs content -->
   <div class="tab-content">

    {{-- <div class="block bg-grey">
        <div class="dropdown">
            <button class="btn btn-lg btn-white w-100 d-flex ais-center" type="button" data-toggle="dropdown">
                <span class="text-grey">Game Week 38</span>
                <span class="caret ml-auto"></span>
            </button>
            <ul class="dropdown-menu w-100">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
    </div> --}}

    <div class="standings table-responsive">
     <div class="tab-content" id="standings">


     </div>
 </div>

</div>
</div>
<div class="tab-pane fade p-3" id="stats" aria-labelledby="stats-tab">
    <div class="tab-content premium">
        <div class="club-stats table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-black">
                        <td class="text-left club-stats-title">
                            <span class="icon icon-writing" id="recordIcn"></span>
                            <span id="recordTxt"> {{ trans('lang.Record') }}</span>
                        </td>
                        <td>{{ trans('lang.Home') }}</td>
                        <td>{{ trans('lang.Away') }}</td>
                        <td>{{ trans('lang.Total') }}</td>
                    </tr>
                </thead>
                <tbody id="Record">

                </tbody>
            </table>
        </div>

        <div class="club-stats table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-black">
                        <td class="text-left club-stats-title">
                            <span class="icon icon-ball" id="goalIcn"></span>
                            <span id="goalTxt">{{ trans('lang.Goal & No Goal') }}</span>
                        </td>
                        <td>{{ trans('lang.Home') }}</td>
                        <td>{{ trans('lang.Away') }}</td>
                        <td>{{ trans('lang.Total') }}</td>
                    </tr>
                </thead>
                <tbody id="Goals">

                </tbody>
            </table>
        </div>

        <div class="club-stats table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-black">
                        <td class="text-left club-stats-title">
                            <span class="icon icon-average" id="avrGoalIcn"></span>
                            <span id="avrGoalTxt">{{ trans('lang.Average Goals') }}</span>
                        </td>
                        <td>{{ trans('lang.Home') }}</td>
                        <td>{{ trans('lang.Away') }}</td>
                        <td>{{ trans('lang.Total') }}</td>
                    </tr>
                </thead>
                <tbody id="Average">

                </tbody>
            </table>
        </div>

        <div class="club-stats table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-black">
                        <td class="text-left club-stats-title">
                            <span id="scoringMinutesIcn" class="icon icon-time-left"></span>
                            <span id="scoringMinutesTxt">{{ trans('lang.Scoring Minutes') }}</span>
                        </td>
                        <td class="text-right">{{ trans('lang.Count') }}</td>
                    </tr>
                </thead>
                <tbody id="Scoring"></tbody>
            </table>

        </div>

        <div class="club-stats table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-black">
                        <td class="text-left club-stats-title">
                            <span id="goalConcededMinutesIcn" class="icon icon-time-left"></span>
                            <span id="goalConcededMinutesTxt">{{ trans('lang.Goals Conceded Minutes') }}</span>
                        </td>
                        <td class="text-right">{{ trans('lang.Count') }}</td>
                    </tr>
                </thead>

                <tbody id="Conceded">

                </tbody>
            </table>
        </div>

        <div class="club-stats table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-black">
                        <td class="text-left club-stats-title">
                            <span id="gamePlayIcn" class="icon icon-play"></span>
                            <span id="gamePlayTxt">{{ trans('lang.Game Play') }}</span>
                        </td>
                        <td class="text-right">&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">{{ trans('lang.Attacks') }}</td>
                        <td class="text-right" id="attacks"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Dangerous Attacks') }}</td>
                        <td class="text-right" id="dangerous_attacks"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Avg Ball Possession Percentage') }}</td>
                        <td class="text-right" id="avg_ball_possession_percentage"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Shot Blocked') }}</td>
                        <td class="text-right" id="shots_blocked"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Shot of Target') }}</td>
                        <td class="text-right" id="shots_off_target"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Avg. Shots off Target per Game') }}</td>
                        <td class="text-right" id="avg_shots_off_target_per_game"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Shot on Target') }}</td>
                        <td class="text-right" id="shots_on_target"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Avg. Shots on Target per Game') }}</td>
                        <td class="text-right" id="avg_shots_on_target_per_game"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Avg. Corners') }}</td>
                        <td class="text-right" id="avg_corners"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Total Corners') }}</td>
                        <td class="text-right" id="total_corners"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.BTTS') }}</td>
                        <td class="text-right" id="btts"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Avg. Player Ratings') }}</td>
                        <td class="text-right" id="avg_player_rating"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Avg. Player Ratings per Match') }}</td>
                        <td class="text-right" id="avg_player_rating_per_match"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Tackles') }}</td>
                        <td class="text-right" id="tackles"></td>
                    </tr>
                </tbody>

            </table>

        </div>

        <div class="club-stats table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-black">
                        <td class="text-left club-stats-title">
                            <span id="disciplineIcn" class="icon icon-flag"></span>
                            <span id="disciplineTxt">{{ trans('lang.Discipline') }}</span>
                        </td>
                        <td class="text-right">&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">{{ trans('lang.Red Cards') }}</td>
                        <td class="text-right" id="redcards-stats"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Yellow Cards') }}</td>
                        <td class="text-right" id="yellowcards-stats"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Fouls') }}</td>
                        <td class="text-right" id="fouls"></td>
                    </tr>
                    <tr>
                        <td class="text-left">{{ trans('lang.Offsides') }}</td>
                        <td class="text-right" id="offsides"></td>
                    </tr>
                </tbody>
            </table>


        </div>

    </div>
    <div class="premium-alert">
        <img src="{{ asset('assets/img/icon-lock-premium.png') }}" id="lockIcn" class="img-responsive mb-2" style="margin-left: auto; margin-right: auto;" width="30" alt="Lock">
        <h3 id="warningTitle">{{ trans('lang.This Is a Part of Goaly Premium') }}</h3>
        <p class="mb-1" id="warningDesc">{{ trans('lang.Get full access to all features by subscribe Goaly') }}</p>
        <a href="#" id="subscribeBtn" class="btn btn-lg btn-block btn-default my-1 bg-green text-white btn-subscribe">{{ trans('lang.Subscribe') }}</a>
        <p id="subscribeTxt">{{ trans('lang.Already Subscribed?') }} <a class="text-purple" id="loginLink" href="/login">{{ trans('lang.Login') }}</a></p>
    </div>


</div>
</div>


</div>
</div>
<script>
    var translations = {
        'Win': '{{ trans('lang.Win') }}',
        'Draw': '{{ trans('lang.Draw') }}',
        'Lose': '{{ trans('lang.Lose') }}',
        'GoalsFor': '{{ trans('lang.Goals for') }}',
        'GoalsAgainst': '{{ trans('lang.Goals Against') }}',
        'CleanSheets': '{{ trans('lang.Clean Sheets') }}',
        'FailedToScore': '{{ trans('lang.Failed to Score') }}',
        'AvgGoalsPerGameScored': '{{ trans('lang.Avg. Goals per Game Scored') }}',
        'AvgGoalsPerGameConceded': '{{ trans('lang.Avg. Goals per Game Conceded') }}',
        'AvgFirstGoalScored': '{{ trans('lang.Avg. First Goal Scored') }}',
        'AvgFirstGoalConceded': '{{ trans('lang.Avg. First Goal Conceded') }}',
        'Season': '{{ trans('lang.Season') }}',
        'Coming_Soon': '{{ trans('lang.Coming Soon') }}',
        'Finished': '{{ trans('lang.Finished') }}',
        'Follow': '{{ trans('lang.Follow') }}',
        'Unfollow': '{{ trans('lang.Unfollow') }}',
        'Goals': '{{ trans('lang.Goals') }}',
        'Assists': '{{ trans('lang.Assists') }}',
        'Red Cards': '{{ trans('lang.Red Cards') }}',
        'Yellowcards': '{{ trans('lang.Yellow Cards') }}',
        'login_first':'{{trans('lang.login_first')}}',
        'no_team':'{{ trans('lang.no_team') }}',
        'fav_team':'{{trans('lang.fav_team')}}',
        'team_remove':'{{trans('lang.team_remove')}}',
        'deleted':'{{trans('lang.deleted')}}',
        'team_deleted':'{{trans('lang.team_deleted')}}',
        'fav_team':'{{trans('lang.fav_team')}}',
        'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',

    };
</script>

<script src="{{ asset('assets/js/teamDetails.js') }}"></script>
@if(Session::has('User') && Session::get('User')['status'] == 'active')
<script type="text/javascript">
    $('.premium').removeClass('premium');
    $('.premium-alert').hide();
</script>
@endif
@include('partials.footernew')
</body>
</html>