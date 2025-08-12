@include('partials.header_portal')
</head>
<style>
</style>
<body>
    <div>
        @include('home.welcomePopup')
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content">
            <div class="block bg-grey" style="background:rgba(201, 195, 195, 0.59);margin-top: 5px">
                <!-- menu -->
                @include('partials.topmenu_portal')
                <!-- menu -->
            </div>
            <!-- my team -->
            <div class="my-team bg-white border radius-1 " id="myTeam">
                <div class="fevtTeam">
                    <div>
                        <span id="favouriteClubTitle"><strong>{{ trans('lang.Favourite Club') }}</strong></span>
                    </div>
                    <div>
                        <div id="UserFavourite" style="display: flex ; margin-right: 16px "> </div>
                    </div>
                    <div style="display: flex; align-items: center;">
                        @if (session('UserId'))
                            <a id="addBtn" class="add-club-button">+</a>
                        @else
                            <a id="show" class="add-club-button">+</a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- slider  Start Here -->
            <div class="container">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" id="dots" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" id="dots" data-slide-to="1"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img id="rewardImg" src="./images/bannerImage/demo-goaly-banner-1.jpg" alt="Reward"
                                style="width:100%;">
                        </div>
                        <div class="item">
                            <img id="rewardImg" src="./images/bannerImage/demo-goaly-banner-2.png" alt="Reward"
                                style="width:100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider end -->
            <!-- New code here -->
            <div class="block">
                <div class="timeline">
                    <div class="timeline-header">
                        <h3 id="timelineTitle">{{ trans('lang.Timeline') }}</h3>
                    </div>
                    <!-- Transfer news  -->
                    @if (!empty($sortedData))
                        @foreach ($sortedData as $index => $item)
                            @if ($item['type'] === 'news')
                                <div class="timeline-group" {{ $index > 2 ? 'loading=lazy' : '' }}>
                                    <div
                                        class="timeline-group-header {{ $item['news'] === 'Transfer News' ? 'header-transfer' : '' }} clearfix">
                                        <span class="float-left">
                                            <span class="icon-transfer mr-1" id="newsTypeIcn"></span> <strong
                                                id="newsType">{{ trans('lang.' . $item['news']) }}</strong>
                                        </span>
                                        <span class="float-right text-right"><a class="seeAllLink"
                                                href="javascript:void(0)" data-newsType="{{ $item['news'] }}"
                                                id="seeAllLink">{{ trans('lang.See All') }}</a></span>
                                    </div>
                                    <div class="timeline-group-content media">
                                        <div class="media-left p-0">
                                            <div class="thumbail-news">
                                                <img id="newsImg" src="{{ $item['urlToImage'] }}"
                                                    onerror="this.onerror=null; this.src='{{ asset('images/newsImage/news-default.jpg') }}';"
                                                    alt="News">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading" id="newsTitle">{{ $item['title'] }}</h4>
                                            <small class="text-muted" id="newsDate">{{ $item['publishedAt'] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <!-- Transfer news end-->
                            @else
                                <!-- for showing Predictions/competitions -->
                                <div class="timeline-group" {{ $index > 2 ? 'loading=lazy' : '' }}>
                                    <div class="timeline-group-header header-match clearfix">
                                        <span class="float-left">
                                            <span class="icon-ball mr-1" id="matchIcn"></span> <strong
                                                id="matchTxt">{{ trans('lang.Match') }}</strong>
                                        </span>
                                        @if ($today >= $item['prediction_start_time'] && $today <= $item['prediction_end_time'] && $today < $item['match_time'])
                                            <span class="timeline-label blue"
                                                id="matchStatus">{{ trans('lang.Ongoing Prediction') }} </span>
                                        @elseif($today > $item['prediction_end_time'] || $today > $item['match_time'])
                                            <span class="timeline-label red"
                                                id="matchStatus">{{ trans('lang.End Match') }}</span>
                                        @else
                                            <span class="timeline-label blue"
                                                id="matchStatus">{{ trans('lang.Coming Soon') }}</span>
                                        @endif
                                    </div>
                                    <div class="match-area">
                                        <div class="row small mb-1">
                                            <div class="col-xs-6">
                                                <p class="m-0 text-left" id="league">
                                                    {{ $item['league_name'] ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <p class="m-0 text-right" id="matchDate">
                                                    {{ $item['match_time'] ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <div class="row d-flex ais-center mb-1 min-gutter">
                                            <div class="col-xs-5">
                                                <div class="club-box club-l">
                                                    <div class="club-pict">
                                                        <a href="/team/details/{{ $item['home_team_id'] }}">
                                                            <img id="hClubImg" alt="Home Team"
                                                                src="{{ $item['home_team_logo'] ?? 'N/A' }}"
                                                                alt="club">
                                                        </a>
                                                    </div>
                                                    <div class="club-name">
                                                        <span
                                                            id="hClubName">{{ isset($item['home_short_code']) ? $item['home_short_code'] : strtoupper(substr($item['home_team_name'], 0, 3)) }}
                                                        </span>

                                                        <span class="match-result"
                                                            id="hClubScore">{{ $item['home_team_score'] ?? '-' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-2 text-center" id="vs">VS</div>
                                            <div class="col-xs-5">
                                                <div class="club-box club-r">
                                                    <div class="club-name">
                                                        <span id="aClubName">
                                                            {{ isset($item['away_short_code']) ? $item['away_short_code'] : strtoupper(substr($item['away_team_name'], 0, 3)) }}
                                                        </span>
                                                        <span class="match-result"
                                                            id="aClubScore">{{ $item['away_team_score'] ?? '-' }}</span>
                                                    </div>
                                                    <div class="club-pict">
                                                        <a href="/team/details/{{ $item['away_team_id'] }}">
                                                            <img id="aClubImg" alt="Away Team"
                                                                src="{{ $item['away_team_logo'] ?? 'N/A' }}"
                                                                alt="club">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            @if ($today >= $item['prediction_start_time'] && $today <= $item['prediction_end_time'] && $today < $item['match_time'])
                                                @if (session('UserId'))
                                                    <a href="/contest/detail/{{ $item['id'] }}"
                                                        class="btn bg-green p-1 w-50 text-white mx-auto"
                                                        id="joinBtn">{{ trans('lang.Join') }}</a>
                                                @else
                                                    <a href="{{ route('logined') }}"
                                                        class="btn bg-green p-1 w-50 text-white mx-auto"
                                                        id="joinBtn">{{ trans('lang.Join') }}</a>
                                                @endif
                                            @elseif($today > $item['prediction_end_time'] || $today > $item['match_time'])
                                                <a href="/match/details/{{ $item['fixture_id'] }}"
                                                    class="btn btn-purple p-1 w-50 text-white mx-auto"
                                                    id="seeResultBtn">{{ trans('lang.See Result') }}</a>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="timeline-group" {{ $index > 2 ? 'loading=lazy' : '' }}>
                            <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}"
                                alt="No Data Found">
                        </div>
                    @endif
                    <!-- competition end --><!-- upcomming match start --><!-- upcoming matches end -->
                </div>
            </div>
            <!-- floating button code here -->
            <div class='float-button'>
                <a href="https://linkit360.com/contact-us/">
                    <img src="{{ asset('assets/img/floating-copyright.png') }}" alt="Description" />
                </a>
            </div>
            <!-- floating button code end -->
        </div>
        <!--page content -->
        <!-- Add fav club modal -->
        <div id="myModalClub" class="modal fade" role="dialog">
            <div class="modal-dialog" style="margin-left: 23px">
                <!-- Modal content-->
                <div class="modal-content" style="margin-left:-14px;margin-top:67px">
                    <div class="modal-header">
                        <button id="xBtn" type="button" class="close" data-dismiss="modal"><b>X</b></button>
                        <h4 class="modal-title text-center">
                            <img id="logoAddFavClub" src="{{ asset('/assets/img/logo-goaly.png') }}" alt="Add Favorite Club"
                                style="height:50px;width:auto"/>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content" id="myTabContent">
                            @if (!empty($details))
                                @foreach ($details as $league)
                                    <a class="nav-link" id="team-{{ $league['sportsmonks_id'] }}-tab"
                                        data-toggle="tab" href="#team-{{ $league['sportsmonks_id'] }}"
                                        role="tab" aria-controls="Team-{{ $league['sportsmonks_id'] }}"
                                        aria-selected="true" aria-expanded="true">
                                        <div class="league">
                                            <div class="league-logo border-right">

                                                <img src="{{ asset('/assets/img/league') . '/' . $league['old_logo'] }}"
                                                    id="leagueImg" alt="League Image">
                                            </div>
                                            <div class="league-title" style="color:black ;font-weight:600"
                                                id="leagueName" alt="League">{{ $league['competition_name'] }}</div>
                                        </div>
                                    </a>
                                    <div class="tab-pane fade  p-3 in" id="team-{{ $league['sportsmonks_id'] }}"
                                        aria-labelledby="team-{{ $league['sportsmonks_id'] }}-tab">
                                        <div id="team-ui-{{ $league['sportsmonks_id'] }}" class="team-containerr">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id ="saveBtn" type="button" class="btn btn-success btn-lg btn-block"
                            style="background: rgb(22, 80, 14);color:white">{{ trans('lang.Save') }}</button>
                        <button id ="closeBtn" type="button" class="btn btn-secondary btn-lg btn-block"
                            data-dismiss="modal"
                            style="background:rgb(215, 13, 78); color:white">{{ trans('lang.Close') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add fav team modal end -->
        <!-- Show fav club modal -->
        <div id="favteams" class="modal fade" back-drop role="dialog">
            <div class="modal-dialog" style="margin-left: 23px">
                <div class="modal-content" style="margin-left:-14px;margin-top:67px">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="xBtn"><b>X</b></button>
                        <h4 class="modal-title text-center">
                            <img id="logoEditFavClub" src="{{ asset('/assets/img/logo-goaly.png') }}" alt="Edit Favorite Club"
                                style="height: 50px; width: auto" />
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content" id="myTabContent">
                            <table id="favTeamTable" class="table table-striped table-responsive">
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- Show fav club modal end -->
    </div>

    @include('partials.footernew')
    <script>
        var translations = {
            'lets_play': '{{ trans('lang.Lets Play') }}',
            'match_result': '{{ trans('lang.Match Result') }}',
            'coming_soon': '{{ trans('lang.Coming Soon') }}',
            'prediction_result': '{{ trans('lang.Prediction Result') }}',
            'No': '{{ trans('lang.No') }}',
            'Points': '{{ trans('lang.Points') }}',
            'Prediction': '{{ trans('lang.Prediction') }}',
            'Players': '{{ trans('lang.Players') }}',
            'who_play': '{{ trans('lang.See Who Play') }}',
            'total_point_win': '{{ trans('lang.The total points that can be won') }}',
            'no_players': '{{ trans('lang.No players Found') }}',
            'start': '{{ trans('lang.Start') }}',
            'end': '{{ trans('lang.End') }}',
            'custom_match_result': '{{ trans('lang.Match Result') }}',
            'login_first': '{{ trans('lang.login_first') }}',
            'no_team': '{{ trans('lang.no_team') }}',
            'fav_team': '{{ trans('lang.fav_team') }}',
            'team_remove': '{{ trans('lang.team_remove') }}',
            'deleted': '{{ trans('lang.deleted') }}',
            'team_deleted': '{{ trans('lang.team_deleted') }}',
            'fav_team': '{{ trans('lang.fav_team') }}',
            'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
            'Login': '{{ trans('lang.Login') }}',
            'cancel': '{{ trans('lang.cancel') }}',
        };
    </script>

    <script src="{{ asset('assets/js/Prediction.js') }}"></script>
    <script src="{{ asset('js/frontend/home.js') }}"></script>
    @if (Session::has('unauthorized'))
        <script type="text/javascript">
            Swal.fire({
                title: '{{ trans('lang.Unauthorized') }}',
                text: '{{ trans('lang.please_sub') }}',
                icon: "info",
                confirmButtonText: "Ok"
            })
        </script>
    @endif
</body>
</html>
