@include('partials.header_portal')
</head>

<body>
    
    
    <div>
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content">

            

            <div class="block bg-grey">
                <!-- menu ------------------------------------>
                @include('partials.topmenu_portal')
                
                <!-- menu ------------------------------------>
            </div>

            <div class="block">
                <div class="d-flex" style="margin-top: -2.75em; width: 96%;margin-left: 7px;">
                    <a href="#" id="myTeamTab"class="btn btn-lg border w-50 mr-1" data-href="myTeamTab" style="color: grey;background-color: white; display:block;font-size:17px">{{ trans('lang.My Team') }}</a>
                    <a href="#" id="allTeamTab" class="btn btn-lg border w-50 ml-1 team_active" data-href="allTeamTab" style="color: grey;  background-color: white;display:block; font-size:17px" >{{ trans('lang.All Team') }}</a>
                </div>

                <!-- filter days -->
                <ul class="filter-days">

                    <a class="nav-link"   id="yesterday_match-tab"  onclick="tabAction(1)" data-toggle="tab" href="#yesterday_match" role="tab" aria-controls="" aria-selected="false">
                    <li class="btn border radius-1" data-type="yesterday" id="yesterdayTab">{{ trans('lang.Yesterday') }}</li>
                        </a>
                    <a class="nav-link"  id="today_match-tab" onclick="tabAction(2)" data-toggle="tab" href="#today_match" role="tab" aria-controls="" aria-selected="true">

                    <li class="btn border radius-1 date_active" id="todayTab" data-type="today">{{ trans('lang.Today') }}</li>
                        </a>
                    <!-- <a class="nav-link"   id="tommorow_match-tab" onclick="tabAction(3)" data-toggle="tab" href="#tommorow_match" role="tab" aria-controls="" aria-selected="false">
                    <li class="btn border radius-1" id="tomorrowTab" data-type="tomorrow">{{ trans('lang.Tomorrow') }}</li></a>-->
                    
                    <a class="nav-link"   id="weekly_match-tab" onclick="tabAction(5)" data-toggle="tab" href="#weekly_match" role="tab" aria-controls="" aria-selected="false">
                    <li class="btn border radius-1" id="weeklyTab" data-type="weekly">{{ trans('lang.weekly') }}</li></a>

                    <a class="nav-link"   id="live_match-tab" onclick="tabAction(4)" data-toggle="tab" href="#live_match" role="tab" aria-controls="" aria-selected="false">
                    <li class="btn border radius-1" id="liveTab" data-type="live">{{ trans('lang.Live') }}</li></a>

                </ul>
                <!-- filter days -->

                <!-- filter league -->
                <div id="league_list" style="width: 96%; margin-left: 6px;">
                    @if(!empty($league_details))
                        <div class="custom-dropdown">
                            <div class="dropdown-button">
                                <button class="dropdown-toggle" id="leagueDropdown" data-toggle="dropdown">
                                   All Leagues
                                   <i class="fa fa-caret-down fa-lg" aria-hidden="true" style="position: absolute;right:26px;"></i>
                                </button>
                                
                                <ul class="dropdown-menu" aria-labelledby="leagueDropdown">
                                    <li data-value="">All Leagues</li>
                                    @foreach($league_details as $league)
                                        <li data-value="{{$league['sportsmonks_id']}}">
                                            <img src="{{asset('assets/img/league/'.$league['old_logo'])}}" class="league-image" />
                                            {{$league['competition_name']}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>



                <!-- filter league -->

            </div>



            <div class="tab-content" id="myTabContent">



             <div id="skloader"> @include('matches.sk_loader_matches')</div>

            <!-- <img id="skloader" src="{{ asset('images/loader-img.gif') }}" style="display: none;"> -->
            <!-- ei loader ta inline  -->

             


                <div class="tab-pane fade p-3 " id="yesterday_match" aria-labelledby="yesterday_match-tab">
                    <div class="matchDisplay"></div>
                    
                </div>

                <div class="tab-pane fade p-3  active in" id="today_match" aria-labelledby="today_match-tab">
                    <div class="matchDisplay"></div>

                </div>

            <div class="tab-pane fade p-3 " id="tommorow_match" aria-labelledby="tommorow_match-tab">
                    <div class="matchDisplay"></div>

                </div>
                 <div class="tab-pane fade p-3 " id="weekly_match" aria-labelledby="weekly_match-tab">
                    <div class="matchDisplay"></div>

                </div>

            </div>

        </div>
    </div>

    @include('partials.footernew')
    <script>
        var translations = {
        'Coming_Soon': '{{ trans('lang.Coming Soon') }}',
        'Finished': '{{ trans('lang.Finished') }}',
        'login_first': '{{ trans('lang.login_first') }}',        
        'sorryNoFavClub': '{{ trans('lang.sorryNoFavClub') }}',
        'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',

    };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.43/moment-timezone-with-data.min.js"></script>
     <script src="{{ asset('js/frontend/_match.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script> -->

    <script type="text/javascript">
        
  



$(document).ready(function () {
    const $dropdownButton = $('.dropdown-button');
    const $dropdownMenu = $dropdownButton.find('.dropdown-menu');

    $dropdownButton.on('click', function () {
        $dropdownMenu.toggle(); // Toggle the visibility of the dropdown menu
    });

    $(document).on('click', function (event) {
        if (!$dropdownButton.is(event.target) && !$dropdownButton.has(event.target).length) {
            $dropdownMenu.hide(); // Hide the dropdown menu when clicking outside
        }
    });

    $dropdownMenu.on('click', 'li', function () {
        const leagueName = $(this).text();
        const leagueLogo = $(this).find('img').attr('src');
        if (leagueLogo) {
            $dropdownButton.find('.dropdown-toggle').html(`
              <img src="${leagueLogo}" class="selected-image" /> ${leagueName}
              <i class="fa fa-caret-down fa-lg" aria-hidden="true" style="position: absolute; right: 26px;"></i>
            `);

        } else {
            
            $dropdownButton.find('.dropdown-toggle').html(`${leagueName}`);
        }
    });
    });





    </script>
</body>
</html>

