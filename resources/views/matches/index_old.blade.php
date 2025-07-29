@include('partials.headernew')
</head>



<body>
    <div class="wrapper">
        <!-- header image ---------------------------------------->
       <img src="{{ asset('assets/img/header.png') }}" class="img-fluid" alt="">
        <!-- header image ---------------------------------------->

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="block bg-grey">
            <!-- menu ------------------------------------>
            <div class="menu">
                <div class="menu-link">
                    <a href="{{route('home')}}"><img src="{{ asset('assets/img/Group 169.png') }}" alt=""></a>
                    <span class="text-grey">Contest</span>
                </div>
                <div class="menu-link">
                    <a href="{{route('matches')}}"><img src="{{ asset('assets/img/Group 163.png') }}" alt=""></a>
                    <span class="text-purple">Matches</span>
                </div>
                <div class="menu-link">
                    <a href="{{route('league')}}"><img src="{{ asset('assets/img/Group 167.png') }}" alt=""></a>
                    <span class="text-grey">League</span>
                </div>
                <div class="menu-link">
                    <a href="{{route('news')}}"><img src="{{ asset('assets/img/Group 166.png') }}" alt=""></a>
                    <span class="text-grey">News</span>
                </div>
            </div>
            <!-- menu ------------------------------------>
        </div>

        <div class="block">
            <div class="d-flex" style="margin-top: -2.75em;">
                <a href="#" class="btn btn-lg border btn-white text-white w-50 mr-1">My Team</a>
                <a href="#" class="btn btn-lg border btn-purple w-50 ml-1">All Team</a>
            </div>

            <!-- filter days -->
            <ul class="filter-days">

                <a class="nav-link" id="yesterday_match-tab" onclick="tabAction(1)" data-toggle="tab" href="#yesterday_match" role="tab" aria-controls="" aria-selected="true">
                <li class="btn border radius-1 activ" id="yesterday_match_id">Yesterday</li>
                    </a>
                <a class="nav-link" id="today_match-tab" onclick="tabAction(2)" data-toggle="tab" href="#today_match" role="tab" aria-controls="" aria-selected="false">
                <li class="btn border radius-1" id="today_match_id">Today</li>
                    </a>
                <a class="nav-link" id="tommorow_match-tab" onclick="tabAction(3)" data-toggle="tab" href="#tommorow_match" role="tab" aria-controls="" aria-selected="false">
                <li class="btn border radius-1" id="tommorow_match_id">Tommorow</li></a>

            </ul>
            <!-- filter days -->

            <!-- filter league -->
            <div id="league_list">
                <select name="league_id" id="league_id_list" class="form-control select2me selectAggregate">
                        <option value="NA">Select League</option>
                        @if(!empty($league_details))
                            @foreach($league_details as $league)
                                <option value="{{$league['sportsmonks_id']}}">{{$league['competition_name']}}</option>
                            @endforeach
                        @endif
                </select>
            </div>
            <!-- filter league -->

        </div>


        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade p-3 active in" id="yesterday_match" aria-labelledby="yesterday_match-tab">

                <div id="matchDisplay"></div>
                {{-- @php
                    dd($matches);
                @endphp --}}
                @if(count($matches)>0)
                    @foreach($matches as $matche)
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <a href="{{route('team',[$matche->homeTeam_id])}}">
                                        <div class="logo">
                                            <img src="{{$matche->homeTeam_image}}" alt="">
                                        </div>
                                    </a>
                                    <h5 class="mb-0">{{$matche->homeTeam_name}}</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                        <span>{{$matche->localteam_score}}</span>
                                        <span class="mx-2 border-right"></span>
                                        <span>{{$matche->visitorteam_score}}</span>
                                    </div>
                                    @php
                                        $dt = new \DateTime($matche->date_time);
                                        $tz = new \DateTimeZone($time_zone);
                                        $set_tz= $dt->setTimezone($tz);
                                        $date_time = $dt->format('Y-m-d H:i');
                                    @endphp
                                    <span class="my-1">{{$date_time}}</span>
                                    <a href="{{url('/match/details/'.$matche->fixture_id)}}">
                                        <span class="btn-pill bg-red" style="padding: 1px 27px;
                                            border-radius: 15px;color: white;">Finished</span>
                                    </a>
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <a href="{{route('team',[$matche->awayTeam_id])}}">
                                        <div class="logo">
                                            <img src="{{$matche->awayTeam_image}}" alt="">
                                        </div>
                                    </a>
                                    <h5 class="mb-0">{{$matche->awayTeam_name}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            <div class="tab-pane fade p-3 in" id="today_match" aria-labelledby="today_match-tab">
                <div id="matchDisplay"></div>

            </div>

            <div class="tab-pane fade p-3 in" id="tommorow_match" aria-labelledby="tommorow_match-tab">
                <div id="matchDisplay"></div>

            </div>

        </div>


    </div>
</body>
</html>

