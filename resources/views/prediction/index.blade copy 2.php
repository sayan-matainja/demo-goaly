@include('partials.header_portal')
</head>


<body>
    <div>
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content container-fluid">

            <div class="block bg-grey">
                <!-- menu ------------------------------------>
                @include('partials.topmenu_portal')
                <!-- menu ------------------------------------>
            </div>

            <div class="block">
                <!-- my team --------------------------------->
                <div class="my-team bg-white border radius-1">
                    <span><strong>My Team</strong></span>
                    <ul>
                        <li><img src="{{ asset('assets/img/ic-chelsea.png') }}"></li>
                        <li><img src="{{ asset('assets/img/ic-albion.png') }}"></li>
                        <li><img src="{{ asset('assets/img/ic-chelsea.png') }}"></li>
                    </ul>
                    <a href="#"><img src="{{ asset('assets/img/ic-green-add.png') }}"></a>
                </div>
                <!-- my team --------------------------------->

                <!-- filter days ----------------------------->
               <!-- <ul class="filter-days">
                    <li class="btn border radius-1 filter-days-active">Yesterday</li>
                    <li class="btn border radius-1">Today</li>
                    <li class="btn border radius-1">Tommorow</li>
                    <li class="btn border radius-1">Others</li>
                    <li class="btn border radius-1">Others</li>
                    <li class="btn border radius-1">Others</li>
                </ul> ------------>
                <!-- filter days ----------------------------->

                <!-- filter league --------------------------->
                <!-- <div class="dropdown filter-league">
                    <button class="btn btn-default dropdown-toggle w-100 d-flex ais-center" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="mr-auto">All League</span>
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenu2">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
                 filter league --------------------------->
            </div>

            <!-- contest ------------------------------------->

             @if(!empty($competitions))

              @foreach($competitions as $competition)


            <div class="contest">
                <div class="d-flex j-center">
                    <div class="club-left mx-1 text-center">
                        <div class="logo"><img src="{{$competition->home_team_logo}}"></div>
                        <h5 class="mb-0">{{$competition->home_team_name}}</h5>
                    </div>
                    <div class="mid mx-2 d-flex ais-center">
                        <div class="h-max-c">
                            <div class="date p-1"> Sunday <br> 28/11/2020 </div>
                            <div class="place p-1">{{$competition->venue}}</div>
                        </div>
                    </div>
                    <div class="club-right mx-1 text-center">
                        <div class="logo"><img src="{{$competition->away_team_logo}}"></div>
                        <h5 class="mb-0">{{$competition->away_team_name}}</h5>
                    </div>
                </div>
                <h3 class="text-center text-white"><strong>20:35 hrs</strong></h3>
                <button type="button" class="btn bg-green p-2 w-100 my-2 text-white" style="font-size: 12pt;"><strong>LET'S PLAY</strong></button>
                <div class="d-flex">
                    <div class="w-50 p-1 bg-whitesmoke border-right" style="border-top-left-radius: 10px;">Start: <br> <strong>Mon, 23/03/20</strong></div>
                    <div class="w-50 p-1 bg-whitesmoke" style="border-top-right-radius: 10px;">End: <br> <strong>Sun, 05/04/20</strong></div>
                </div>
                <div class="w-100 p-2 text-white" style="border: 1px solid whitesmoke; border-radius: 0 0 10px 10px;">
                    Total point can win: <b>100</b>
                </div>
                <button type="button" class="btn btn-lg btn-purple mt-2">See Who Play</button>
            </div>
            <!-- contest ------------------------------------->

              @endforeach
                @endif

        </div>
    </div>
    @include('partials.footernew')
</body>
</html>
