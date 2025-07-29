@include('partials.header_portal')
<style>
    .badge-success {
        background-color: #28a745 !important;
        color: #fff;
    }
    .no-data-msg {
    text-align: center;
    color: #666;
    font-size: 16px;
    margin: 20px 0;
    font-weight: 500;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 60px; /* Adjust based on your design */
}


</style>
</head>


<body>
    <div class="wrapper">
        <!-- header image -->
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')

        <div class="bg-whitepurple">
            <!-- player-cover -->
            <div class="player-cover" style="margin-top: 64px">
                @if(isset($player))

                <div class="pict" id="playerImg" style="margin-top:15px">
                    <img class="a" src="{{(!empty($player['image_path']) ? $player['image_path']: '')}}" alt="">
                    <!-- img class="b" src="{{(!empty($player['team_logo']) ? $player['team_logo']: '')}}" alt=""> -->
                </div>
                <input type="hidden" name="pid" id="player_id" value="{{(!empty($player['player_id']) ? $player['player_id']: '')}}">
                <h5 class="name" id="playerFullName">{{(!empty($player['fullname']) ? $player['fullname']: '')}}</h5>
                <div class="pos" style="margin-bottom: 15px">
                    <span id="playerNumber">{{(!empty($player['player_number']) ? $player['player_number']: '')}}</span>
                    <span id="playerPosition">
                     {{$player['position_name']??'FW'}}

                 </span>

             </div>
             @else
             <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt="" class="img-size" >
             @endif
         </div>

     </div>

     <!-- plyer menu -->
     <ul class="club-menu bg-purple" id="team_details" role="tablist">
        <li class="nav-item active" >
            <a class="nav-link" id="infoTab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true" aria-expanded="true">Info</a>
        </li>
        <li class="nav-item" >
            <a class="nav-link" id="matchTab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false" aria-expanded="false">Match</a>
        </li>
        <li class="nav-item" >
            <a class="nav-link" id="statsTab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Stats</a>
        </li>
        <li class="nav-item" >
            <a class="nav-link" id="trasferTab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="false">Transfers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false" aria-expanded="false">News</a>
        </li>

    </ul>

    <!-- tabs content -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active p-3 in" id="one" aria-labelledby="one-tab">
            <div class="tab-content">

                <!-- player highlight -->
                <input type="hidden" id='team_id' value="{{(!empty($player['team_id']) ? $player['team_id']: ' ')}}">
                <input type="hidden" id='league_id' value="{{(!empty($player['league_id']) ? $player['league_id']: ' ')}}">
                <input type="hidden" id='season_id' value="{{(!empty($player['season_id']) ? $player['season_id']: ' ')}}">

                <div class="player-highlight block bg-grey">
                    <h5 id="season">Season {{(!empty($player['season']) ? $player['season']: 'NA')}}</h5> 
                    <ul style="padding: 16px">
                        <li>
                            <span id="matchPlayedValue">{{(!empty($player['appearences']) ? $player['appearences']: '0')}}</span>
                            <span id="matchPlayedTxt">Matches Played</span>
                        </li>
                        <li>
                            <span id="minutesPlayedValue">{{(!empty($player['minutes']) ? $player['minutes']: '0')}}</span>
                            <span id="minutesPlayedTxt">Minutes Played</span>
                        </li>

                        <li>
                            <span id="yellowCardValue">{{(!empty($player['yellow_card']) ? $player['yellow_card']: '0')}}</span>
                            <span id="yellowCardTxt">Yellow Cards</span>
                        </li>
                        <li>
                            <span id="redCardValue">{{(!empty($player['red_card']) ? $player['red_card']: '0')}}</span>
                            <span id="redCardTxt">Red Cards</span>
                        </li>
                        <li>
                            <span id="assistValue">{{(!empty($player['assist']) ? $player['assist']: '0')}}</span>
                            <span id="assistTxt">Assists</span>
                        </li>
                    </ul>
                </div>

                <!-- player matches -->
                <div class="container-matches" id="matches">

                    @include('club.skloader_club2')


                </div>

                <!-- player matches end -->

                <!-- player info -->
                 @php
                        $transfers = collect($player['transfers'])->whereNotNull('amount')->values();
                        $highestTransfer = $transfers->sortByDesc('amount')->first();
                        $marketValue = $highestTransfer ? '€' . number_format($highestTransfer['amount'] / 1000000, 0) . 'M' : 'N/A';
                        $latest = $transfers->last();
                        $previous = $transfers->count() > 1 ? $transfers->slice(-2, 1)->first() : null;
                        $trendIcon = '';
                        $trendColor = '';
                        if ($latest && $previous) {
                            if ($latest['amount'] > $previous['amount']) {
                                $trendIcon = '↑';
                                $trendColor = 'text-success';
                            } elseif ($latest['amount'] < $previous['amount']) {
                                $trendIcon = '↓';
                                $trendColor = 'text-danger';
                            }
                        }
                         $sortedTransfers = collect($player['transfers'])->sortByDesc('date')->values();
                        @endphp
                <div class="player-info">
                    @if(isset($player))
                    <div class="name">
                        <h4 class="my-0"><strong id="fullname">{{(!empty($player['fullname']) ? $player['fullname']: '')}}</strong></h4>
                        <span id="name">{{(!empty($player['common_name']) ? $player['common_name']: '')}}</span>
                    </div>

                    <!-- personal -->
                    <div class="tag" id="personalInfoTxt">Personal Info</div>
                    <div class="personal">
                        <table class="table">
                            <tr>
                                <td id="dateOfBirthTxt">Date of Birth</td>
                                <td id="dateOfBirthValue">{{(!empty($player['birthdate']) ? $player['birthdate']: '')}}</td>
                            </tr>
                            <tr>
                                <td id="citizenshipTxt">Citizenship</td>
                                <td>
                                    <img id="countryImg"style="width: 36px; padding: 5px;"src="{{ !empty($player['country_flag']) ? $player['country_flag'] : '' }}">

                                    <span id="countryTxt" >{{ $player['birthcountry'] ?? '' }}</span>    
                                </td>
                            </tr>
                            <tr>
                                <td id="ageTxt">Age</td>
                                <td id="ageValue">                              
                                    @if(!empty($player['birthdate']))
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $player['birthdate'])->age }}
                                    @else
                                    Unknown
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td id="weightTxt">Weight</td>
                                <td id="weightValue">{{(!empty($player['weight']) ? $player['weight']: '')}}</td>
                            </tr>
                            <tr>
                                <td id="heightTxt">Height</td>
                                <td id="heightValue">{{(!empty($player['height']) ? $player['height']: '')}}</td>
                            </tr>
                            <tr>
                                <td id="marketvalueTxt">Current Market Value:</td>
                                <td id="marketValue">{{($marketValue)}}</td>
                            </tr>
                        </table>
                    </div>
                    @else
                    <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt="" class="img-size" style="margin-left: 30%;" >@endif

                </div>
            </div>
        </div>
        <div class="tab-pane fade p-3" id="two" aria-labelledby="two-tab">
            <!-- tabs content -->
            <div class="tab-content">
                <!-- player match -->
                <div class="tab-content row">
                  <div class="tag" id="league">
                    <u>
                       <b>
                          <div>{{(!empty($player['league_name']) ? $player['league_name']: '')}}</div>
                      </b>
                  </u>
              </div>
              @if(isset($playersmatches) && !empty($playersmatches))
              @foreach($playersmatches as $match)

              <div class="container-matches">
                <div class="matches">
                    <div class="d-flex j-center">
                        <div class="club-left mx-1 text-center" style="text-align: -webkit-center; width: min-content;">
                            <div class="logo" id="hClubImg" style="max-width: 65px;height: 66px;">
                                <img src="{{$match['home_team_logo']}}" alt="" style="max-width: 50px;">
                            </div>
                            <h5 class="mb-0" style="font-size: 11px;" id="hClubName">{{$match['home_team_name']}}</h5>
                        </div>
                        <div class="mid mx-2 d-flex flex-column my-auto">
                            <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt;">
                                <span id="hClubScore">{{$match['home_team_score']}}</span>
                                <span class="mx-2 border-right"></span>
                                <span id="aClubScore" >{{$match['away_team_score']}}</span>
                            </div>
                            <span class="my-1" id="matchDate">{{$match['time']}}</span>

                            <a href="{{route('matchDetails', $match['id'] )}}" >
                                <span class="btn-pill bg-red" id="matchStatus" style="padding: 1px 27px;border-radius: 15px;color: white;">Finished</span>
                            </div></a>
                            <div class="club-right mx-1 text-center" style="text-align: -webkit-center; width: min-content;">
                                <div class="logo" style="max-width: 65px;height: 66px;" id="aClubImg">
                                    <img src="{{$match['away_team_logo']}}" alt="" style="max-width: 50px;">
                                </div>

                                <h5 class="mb-0" style="font-size: 11px;" id="aClubName">{{$match['away_team_name']}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <!-- <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt="" class="no-data-img" style="margin-left: 30%;" > -->
                <div class="no-data-msg">No Matches available.</div>
                @endif
            </div>
        </div>
    </div>
    <div class="tab-pane fade p-3" id="three" aria-labelledby="three-tab">
        <!-- tabs content -->
        <div class="block bg-grey">
            <div class="d-flex">
                <a class="btn btn-lg border  w-50 mr-1 ml-1" id="basicStatsBtn">Basic Stats</a>
                <a class="btn btn-lg border w-50 mr-1" id="advanceStatsBtn" >Advance Stats</a>
            </div>
        </div>
        <div class="tab-content" id="pl-stats" >

            @if(isset($player))
            <!-- player main stats -->
            <div class="block bg-grey"  >
                <div class="player-stats-main block bg-white shadow radius-1"style="background-color: #fff">
                    <div class="box border-right border-bottom" >
                        <span id="matchesPlayedTxt"> Matches Played</span>
                        <br> <strong id="matchesPlayedValue">{{(!empty($player['appearences']) ? $player['appearences']: '0')}}</strong>  </div>
                        @if(($player['position_id']) == '1')
                        <div class="box border-bottom border-left">Saves<br> <strong>{{(!empty($player['goals_saves']) ? $player['goals_saves']: '0')}}</strong></div>
                        @else
                        <div class="box border-bottom border-left">
                            <span id="ShootsOfTargetTxt">Shoots of Target</span>

                            <br> 
                            <strong id="ShootsOfTargetValue">{{(!empty($player['short_on_target']) ? $player['short_on_target']: '0')}}</strong></div>
                            @endif
                            <div class="w-100 d-flex j-center">
                                <div class="progress-circle c100 p75 m-0 green" style="margin:-13% 0;">
                                    <span>
                                        @if(($player['position_id']) == '1')
                                        <strong>Clean <br> Sheets</strong>
                                        <span class="mt-1">{{(!empty($player['cleansheet']) ? $player['cleansheet']: '0')}}</span>
                                        @else
                                        <strong id="goalTxt">Goal</strong>
                                        <span class="mt-1" id="goalValue">{{(!empty($player['goals']) ? $player['goals']: '0')}}</span>
                                        @endif
                                    </span>
                                    <div class="slice">
                                        <div class="bar"></div>
                                        <div class="fill"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="box border-top border-right">
                                <strong id="minutesValue">{{(!empty($player['minutes']) ? $player['minutes']: '0')}}</strong>
                                <br>
                                <span id="minutesTxt"> Minutes</span>


                            </div> 
                            @if(($player['position_id']) == '1')
                            <div class="box border-bottom border-left">Interception<br> <strong>{{(!empty($player['interception']) ? $player['interception']: '0')}}</strong></div>
                            @else  
                            <div class="box border-left border-top">
                                <strong id="assistValue">{{(!empty($player['assist']) ? $player['assist']: '0')}}</strong>
                                <br>
                                <span id="assistTxt">Assists</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- player stats detail -->
                    @if(($player['position_id']) == '1')
                    <div class="player-stats-detail block" >
                        <h3 class="m-0 p-1 bg-dark text-white text-center">Goal Keeping</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li><span>Saves</span><span>{{ !empty($player['goals_saves']) ? $player['goals_saves'] : '0' }}</span></li>
                                <li><span>Inside Box Saves</span><span>{{ !empty($player['goals_insidebox_save']) ? $player['goals_insidebox_save'] : '0' }}</span></li>
                                <li><span>Penalties Saves</span><span>{{ !empty($player['penalty_saved']) ? $player['penalty_saved'] : '0' }}</span></li>
                                <li><span>Penalties Missed</span><span>{{ !empty($player['penalty_missed']) ? $player['penalty_missed'] : '0' }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="player-stats-detail block">
                        <h3 class="m-0 p-1 bg-dark text-white text-center" id="deffenceTxt">Deffence</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li><span id="tackleTxt">Tackle</span><span id="tackleValue">{{ !empty($player['tackles']) ? $player['tackles'] : '0' }}</span></li>
                                <li><span id="interceptionTxt">Interception</span><span id="interceptionValue">{{ !empty($player['interception']) ? $player['interception'] : '0' }}</span></li>
                                <li><span id="foulsDrawnTxt">Fouls Drawn</span><span id="foulsDrawnValue">{{ !empty($player['foul_drawn']) ? $player['foul_drawn'] : '0' }}</span></li>
                                <li><span id="blocksTxt">Blocks</span><span id="blocksValue">{{ !empty($player['blocks']) ? $player['blocks'] : '0' }}</span></li>
                                <li><span id="ownGoalsTxt">Own Goals</span><span id="ownGoalsValue">{{ !empty($player['own_goal']) ? $player['own_goal'] : '0' }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="player-stats-detail block">
                        <h3 class="m-0 p-1 bg-dark text-white text-center" id="teamPlayTxt">Team Play</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li><span id="crossesTxt">Crosses</span><span id="crossesValue">{{ !empty($player['cross_total']) ? $player['cross_total'] : '0' }}</span></li>
                                <li><span id="crossAccuratetxt">Cross Accurate</span><span id="crossAccurateValue">{{ !empty($player['crosses_accurate']) ? $player['crosses_accurate'] : '0' }}</span></li>
                                <li><span id="passesTxt">Passes</span><span id="passesValue">{{ !empty($player['pass_total']) ? $player['pass_total'] : '0' }}</span></li>
                                <li><span id="assistTxt">Assists</span><span id="assistValue">{{ !empty($player['assist']) ? $player['assist'] : '0' }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="player-stats-detail block">
                        <h3 class="m-0 p-1 bg-dark text-white text-center" id="diciplineTxt">Discipline</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li><span id="yellowCardTxt">Yellow card</span><span id="yellowCardValue">{{ !empty($player['yellow_card']) ? $player['yellow_card'] : '0' }}</span></li>
                                <li><span id="redCardTxt">Red Card</span><span id="redCardValue">{{ !empty($player['red_card']) ? $player['red_card'] : '0' }}</span></li>
                                <li><span id="foulsTxt">Fouls</span><span id="foulsValue">{{ !empty($player['foul_commited']) ? $player['foul_commited'] : '0' }}</span></li>
                            </ul>
                        </div>
                    </div>


                    @else

                    <div class="player-stats-detail block">
                        <h3 class="m-0 p-1 bg-dark text-white text-center" id="attackTxt">Attacks</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li><span id="goalsTxt">Goals</span><span id="goalsValue">{{ !empty($player['goals']) ? $player['goals'] : '0' }}</span></li>
                                <li><span id="penaltiesScoresTxt">Penalties Scores</span><span id="penaltiesScoresValue">{{ !empty($player['penalty_scores']) ? $player['penalty_scores'] : '0' }}</span></li>
                                <li><span id="duelsWonTxt">Duels Won</span><span id="duelsWonValue">{{ !empty($player['duel_own']) ? $player['duel_own'] : '0' }}</span></li>
                                <li><span id="totalShotsTxt">Total Shots</span><span id="totalShotsValue">{{ !empty($player['short_total']) ? $player['short_total'] : '0' }}</span></li>
                                <li><span id="shotsOnTargetTxt">Shots on Target</span><span id="shotsOnTargetValue">{{ !empty($player['short_on_target']) ? $player['short_on_target'] : '0' }}</span></li>
                                <li><span id="shotsOffTargetTxt">Shots off target</span><span id="shotsOffTargetValue">{{ !empty($player['short_off_target']) ? $player['short_off_target'] : '0' }}</span></li>
                                <li><span id="dribblesTxt">Dribbles</span><span id="dribblesValue">{{ !empty($player['dribbles_success']) ? $player['dribbles_success'] : '0' }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="player-stats-detail block">
                        <h3 class="m-0 p-1 bg-dark text-white text-center" id="deffenceTxt">Deffence</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li><span id="tackleTxt">Tackle</span><span id="tackleValue">{{ !empty($player['tackles']) ? $player['tackles'] : '0' }}</span></li>
                                <li><span id="interceptionTxt">Interception</span><span id="interceptionValue">{{ !empty($player['interception']) ? $player['interception'] : '0' }}</span></li>
                                <li><span id="foulsDrawnTxt">Fouls Drawn</span><span id="foulsDrawnValue">{{ !empty($player['foul_drawn']) ? $player['foul_drawn'] : '0' }}</span></li>
                                <li><span id="blocksTxt">Blocks</span><span id="blocksValue">{{ !empty($player['blocks']) ? $player['blocks'] : '0' }}</span></li>
                                <li><span id="ownGoalsTxt">Own Goals</span><span id="ownGoalsValue">{{ !empty($player['own_goal']) ? $player['own_goal'] : '0' }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="player-stats-detail block">
                        <h3 class="m-0 p-1 bg-dark text-white text-center" id="teamPlayTxt">Team Play</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li><span id="crossesTxt">Crosses</span><span id="crossesValue">{{ !empty($player['cross_total']) ? $player['cross_total'] : '0' }}</span></li>
                                <li><span id="crossAccurateTxt">Cross Accurate</span><span id="crossAccurateValue">{{ !empty($player['crosses_accurate']) ? $player['crosses_accurate'] : '0' }}</span></li>
                                <li><span id="passesTxt">Passes</span><span id="passesValue">{{ !empty($player['pass_total']) ? $player['pass_total'] : '0' }}</span></li>
                                <li><span id="assistTxt">Assists</span><span id="assistValue">{{ !empty($player['assist']) ? $player['assist'] : '0' }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="player-stats-detail block">
                        <h3 class="m-0 p-1 bg-dark text-white text-center" id="disciplineTxt">Discipline</h3>
                        <div class="block bg-white shadow">
                            <ul>
                                <li><span id="yellowCardTxt">Yellow card</span><span id="yellowCardValue">{{ !empty($player['yellow_card']) ? $player['yellow_card'] : '0' }}</span></li>
                                <li><span id="redCardTxt">Red Card</span><span id="redCardValue">{{ !empty($player['red_card']) ? $player['red_card'] : '0' }}</span></li>
                                <li><span id="foulsTxt">Fouls</span><span id="foulsValue">{{ !empty($player['foul_commited']) ? $player['foul_commited'] : '0' }}</span></li>
                            </ul>
                        </div>
                    </div>




                    @endif
                    @else
                    <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt="" class="img-size" style="margin-left: 30%;" >
                    @endif
                </div>
                <!-- player Adv stats -->
                <div class=""  id="pl-adv">

                    <div class="player-stats-detail block mt-1"><h3 class="m-0 p-1 bg-dark text-white text-center" id="matchHistoryTxt">Match History</h3><div class="block bg-white shadow"><div class="match-history table-responsive mb-0 premium bg-whitesmoke"><table class="table"><thead style="background-color: rgb(239, 216, 242);"><tr class="text-black"><td id="matchTxt">Match</td><td id="playingTimeTxt">Playing Time</td><td id="ratingTxt">Rating</td></tr></thead>

                        <tbody>
                            @if(!empty($advStats))
                            @foreach($advStats as $advstat )
                            <tr><td class="match"><img id="hClubImg"src="{{!empty($advstat['home_team_logo']) ? $advstat['home_team_logo'] : '' }}" alt="Team" style="max-width: 30px;height: auto;"><span class="teamSec">vs</span>
                                <img id="aClubImg"src="{{!empty($advstat['away_team_logo']) ? $advstat['away_team_logo'] : '' }} "style="max-width: 30px;height: auto;" alt="Team"></td><td id="playingTimeValue">{{!empty($advstat['played_minute']) ? $advstat['played_minute'] : '' }}'</td><td id="ratingValue">{{!empty($advstat['rating']) ? $advstat['rating'] : '' }}</td></tr>
                                @endforeach
                                @else
                                <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" class="img-size" style="margin-left: 30%;" >
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="premium-alert">
                <img id="lockIcn"src="{{asset('assets/img/icon-lock-premium.png')}}" class="img-responsive mb-2" style="margin-left: auto; margin-right: auto;" width="30" alt="Lock">
                <h3 id="warningTitle">This Is a Part of Goaly Premium</h3>
                <p class="mb-1" id="warningDesc">Get full access to all feature by subscribe Goaly</p>
                <a href="#" class="btn btn-lg btn-block btn-default my-1 bg-green text-white btn-subscribe" id="subscribeBtn">Subscribe</a>
                <p id="subscribeTxt">Already Subsribe? <a class="text-purple" href="{{route('logined')}}" id="loginLink">Login</a></p>
            </div>


        </div>

        <!-- player adv stats end -->
    </div>
    <!-- trasfer tab -->
    <div class="tab-pane fade p-3" id="five" aria-labelledby="trasferTab">
        <div class="tab-content" >
            <div class="container my-5">

                <div class="table-responsive">
                    <table class="table table-bordered bg-white shadow-sm rounded">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Transfer Date</th>
                                <th class="text-center">From</th>
                                <th class="text-center">→</th>
                                <th class="text-center">To</th>
                                <th class="text-center">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                       


                            @foreach($sortedTransfers as $transfer)
                            <tr>
                                {{-- Date --}}
                                <td class="text-center align-middle">
                                    {{ \Carbon\Carbon::parse($transfer['date'])->format('j M Y') }}
                                </td>

                                {{-- From Team --}}
                                <td class="text-center">
                                    <img src="{{ $transfer['fromteam']['image_path'] ?? '' }}" class="rounded-circle mb-1" style="height: 36px; width: 36px;">
                                    <div style="max-width: 80px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 0.85rem;">
                                        {{ Str::limit($transfer['fromteam']['name'] ?? 'N/A', 7, '...') }}
                                    </div>
                                </td>

                                {{-- Arrow --}}
                                <td class="text-center align-middle text-muted" style="font-size: 1.3rem;">→</td>

                                {{-- To Team --}}
                                <td class="text-center">
                                    <img src="{{ $transfer['toteam']['image_path'] ?? '' }}" class="rounded-circle mb-1" style="height: 36px; width: 36px;">
                                    <div style="max-width: 80px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 0.85rem;">
                                        {{ Str::limit($transfer['toteam']['name'] ?? 'N/A', 7, '...') }}
                                    </div>
                                </td>

                                {{-- Price --}}
                                <td class="text-center align-middle">
                                    @if($transfer['amount'])
                                    <span class="badge badge-pill badge-success">€{{ number_format($transfer['amount'] / 1000000, 0) }}M</span>
                                    @else
                                    <span class="badge badge-pill badge-secondary">Loan</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            <tr id="market-value-row" style="display:none;">
                            <td colspan="5" class="text-center font-weight-bold bg-warning text-dark">
                                Current Market Value: {{ $marketValue }}
                                @if($trendIcon)
                                    <span class="{{ $trendColor }}" style="font-size: 1.2rem;">{{ $trendIcon }}</span>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

    <!-- transfer end -->
    <div class="tab-pane fade p-3" id="four" aria-labelledby="four-tab">
        <div class="tab-content" >


            <div id="my-pics" class="carousel slide" data-ride="carousel" style="width:100%;margin:auto;">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                   <li data-target="#my-pics" data-slide-to="0" class="active"></li>
                   <li data-target="#my-pics" data-slide-to="1"></li>
                   <li data-target="#my-pics" data-slide-to="2"></li>
               </ol>

               <!-- Content -->
               <div class="carousel-inner" role="listbox" style="height: 262px">

                 <!-- Slide 1 -->
                 <div class="item active"id="slider-1" >
                     <img src="{{asset('/assets/img/detail-match/icon-menu/no-Data-Found.png')}}" class="no-data-img-playerDetails" alt="no img" id="sliderImg" style="border-radius: 9px">
                     <div class="caption-carousel">
                      <h3 id="sliderNews" class="slider-heading"></h3>

                  </div>
              </div>

              <!-- Slide 2 -->
              <div class="item" id="slider-2">
                <img src="{{asset('/assets/img/detail-match/icon-menu/no-Data-Found.png')}}" class="no-data-img-playerDetails" alt="no img" id="sliderImg" style="border-radius: 9px">
                <div class="caption-carousel">
                    <h3 id="sliderNews" class="slider-heading"></h3>

                </div>
            </div>

            <!-- Slide 3 -->
            <div class="item" id="slider-3">
                <img src="{{asset('/assets/img/detail-match/icon-menu/no-Data-Found.png')}}" class="no-data-img-playerDetails" alt="no img" id="sliderImg" style="border-radius: 9px">

                <div class="caption-carousel">
                    <h3 id="sliderNews" ></h3>

                </div>
            </div>
        </div>
        <br>
        <div class="clearfix"></div>

    </div>


<!------news---->
<div class="team col-xs-12 ct" id="pnewss-tab"></div>



</div>
</div>
</div>
</div>
@include('partials.footernew')
@if(Session::has('User') && Session::get('User')['status'] == 'active')
<script type="text/javascript">
    var translations ={
        'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',
    };
    $('.premium').removeClass('premium');
    $('.premium-alert').hide();
</script>
@endif
<script src="{{ asset('assets/js/playerdetails.js') }}"></script>



</body>
</html>
