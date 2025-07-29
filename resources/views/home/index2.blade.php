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
                <div class="menu">
                    <div class="menu-link">
                        <a href="{{route('home')}}"><img src="{{ asset('assets/img/icon-menu-home-active.png') }}" alt=""></a>
                        <span class="text-purple">Home</span>
                    </div>
                    <div class="menu-link">
                        <a href="{{route('contest')}}"><img src="{{ asset('assets/img/Group 169.png') }}" alt=""></a>
                        <span class="text-grey">Contest</span>
                    </div>
                    <div class="menu-link">
                        <a href="{{route('matches')}}"><img src="{{ asset('assets/img/Group 168.png') }}" alt=""></a>
                        <span class="text-grey">Matches</span>
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
                <!-- my team --------------------------------->
                <div class="my-team bg-white border radius-1" id="myTeam">
                    <span><strong>Favourite Club</strong></span>
                   
                    <ul id="UserFavourite">                   
                    </ul>
                    <a href="javascript:void(0)" id="show"><img src="{{ asset('assets/img/ic-green-add.png') }}"></a>
                </div>
                <div class="club-cover hide"  id="hide">
                <div class="club-cover-mask">
                    <div class="inner-club-cover">
                    <div>
                        <span style="margin: 12px;"><strong>
                            </strong></span>
                            <a  data-toggle="modal" data-target="#myModalClub" id="open">
                                <img src="{{ asset('assets/img/addClub.png')}}" alt="" style="height: 50px; margin: 9px;">
                                </a>
                            <a>
                                <img src="{{ asset('assets/img/RemoveClub.png')}}" alt="" style="height: 50px; margin: 9px;">
                            </a>
                            <a id="clubHide">
                                <img src="{{ asset('assets/img/hied.png')}}" alt="" style="height: 50px; margin: 9px;">
                            </a>

                            <div class="clearfix" style="clear: both;" id="UserFev"></div>
                    </div>
                    <div class="col-12 form-group">


                </div>
                    </div>
                </div>
            </div>
                
            </div>

            <!-- contest ------------------------------------->

            <div id="skloader-contest"> @include('prediction.skloader')</div>
             @if(!empty($competitions))

              @foreach($competitions as $competition) <!--for showing contests -->


            <div class="contest" style="display:none;">
                <div class="d-flex j-center">
                    <div class="club-left mx-1 text-center">
                        <div class="logo"><img src="{{$competition['home_team_logo']}}"></div>
                        <h5 class="mb-0">{{$competition['home_team_name']}}</h5>
                    </div>
                    <div class="mid mx-2 d-flex ais-center">
                        <div class="h-max-c">
                            <div class="date p-1"> {{$competition['match_time_bar']}}<br>{{$competition['match_time']}} </div>
                            <div class="place p-1">{{$competition['venue']}}</div>
                        </div>
                    </div>
                    <div class="club-right mx-1 text-center">
                        <div class="logo"><img src="{{$competition['away_team_logo']}}"></div>
                        <h5 class="mb-0">{{$competition['away_team_name']}}</h5>
                    </div>
                </div>
                
                
                
            </div>
            <!-- contest ------------------------------------->
              @endforeach
                @endif

            <div id="matchDisplay"></div>
<div id="skloader2"> 

  <div class="container">
    <div class="mainBg skeleton-loader2">
      <div class="row">
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
        <div class="col-xs-4">
          <div class="center-box">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
                <div class="col-xs-2 p0">
                  <div class="sapaator">&nbsp;</div>
                </div>
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-box skeleton-loader"></div>
          <div class="button-wrap skeleton-loader"></div>
        </div>
        
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
      </div>
    </div>
    <div class="mainBg skeleton-loader2">
      <div class="row">
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
        <div class="col-xs-4">
          <div class="center-box">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
                <div class="col-xs-2 p0">
                  <div class="sapaator">&nbsp;</div>
                </div>
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-box skeleton-loader"></div>
          <div class="button-wrap skeleton-loader"></div>
        </div>
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
      </div>
    </div>
    <div class="mainBg skeleton-loader2">
      <div class="row">
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
        <div class="col-xs-4">
          <div class="center-box">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
                <div class="col-xs-2 p0">
                  <div class="sapaator">&nbsp;</div>
                </div>
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-box skeleton-loader"></div>
          <div class="button-wrap skeleton-loader"></div>
        </div>
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
      </div>
    </div>
    <div class="mainBg skeleton-loader2">
      <div class="row">
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
        <div class="col-xs-4">
          <div class="center-box">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
                <div class="col-xs-2 p0">
                  <div class="sapaator">&nbsp;</div>
                </div>
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-box skeleton-loader"></div>
          <div class="button-wrap skeleton-loader"></div>
        </div>
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
      </div>
    </div>
    <div class="mainBg skeleton-loader2">
      <div class="row">
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
        <div class="col-xs-4">
          <div class="center-box">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
                <div class="col-xs-2 p0">
                  <div class="sapaator">&nbsp;</div>
                </div>
                <div class="col-xs-5 p0">
                  <div class="small-text skeleton-loader"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-box skeleton-loader"></div>
          <div class="button-wrap skeleton-loader"></div>
        </div>
        <div class="col-xs-4">
          <div class="logo-wrap skeleton-loader"></div>
          <div class="text-box skeleton-loader"></div>
        </div>
      </div>
    </div>
  </div>
</div>

         </div> 
    <!--page content -->
    </div>
    @include('partials.footernew')

<script src="{{ asset('assets/js/Prediction.js') }}"></script>
<script src="{{ asset('js/frontend/home.js')}}"></script>
    <script type="text/javascript">


    </script>


</body>
</html>