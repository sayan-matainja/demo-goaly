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

           
<!-- my team --------------------------------->
<div class="my-team bg-white border radius-1 " id="myTeam">
    <div class="fevtTeam" >
        <div>
          <span id="favouriteClubTitle"><strong>{{ trans('lang.Favourite Club') }}</strong></span>
        </div>
        <div >
              <div id="UserFavourite" style="display: flex ; margin-right: 16px ">  </div>
        </div>
        <div>
          @if(session('UserId'))   
          <a id="addBtn" class="add-club-button">+</a>
          @else
          <a id="show" class="add-club-button" >+</a>
          @endif
      </div>


      </div>
    
    
</div>

                <!-- filter days ----------------------------->

                <!-- filter days ----------------------------->

                <!-- filter league --------------------------->  


                <div id="league_list" style="width: 96%; margin-left: 6px;">
                @if(!empty($details))
                    <div class="custom-dropdown">
                        <div class="dropdown-button">
                            <button class="dropdown-toggle" id="leagueDropDown" data-toggle="dropdown">
                               All Leagues
                               <i class="fa fa-caret-down fa-lg" aria-hidden="true" style="position: absolute;right:26px;"></i>
                            </button>
                            
                            <ul class="dropdown-menu" aria-labelledby="leagueDropDown">
                                <li data-value="">All Leagues</li>
                                @foreach($details as $league)
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
             <!-- filter league End--------------------------->  
                
            </div>

            <!-- contest ------------------------------------->

            <div id="skloader-contest"> @include('prediction.skloader')</div>



                <div  id="contest" >
                            
                </div>
            <!-- contest end ---------------------------------->
        </div>
    
    @include('partials.footernew')

<!----- Add fav club modal ------>
<div id="myModalClub" class="modal fade" role="dialog" >
  <div class="modal-dialog" style="margin-left: 23px">
    <!-- Modal content-->
    <div class="modal-content" style="margin-left:-14px;margin-top:67px">
      <div class="modal-header">
        <button id="xBtn" type="button" class="close" data-dismiss="modal" ><b>X</b></button>
        <h4 class="modal-title text-center">
        <img id="logoAddFavClub" src="{{asset('/assets/img/logo-goaly.png')}}" alt="" style="height:50px;width:auto"/>
      </h4>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="myTabContent">
      @if(!empty($details))

                        @foreach($details as $league)


                            
                                <a class="nav-link" id="team-{{$league['sportsmonks_id']}}-tab" data-toggle="tab" href="#team-{{$league['sportsmonks_id']}}" role="tab" aria-controls="Team-{{$league['sportsmonks_id']}}" aria-selected="true" aria-expanded="true">
                                <div class="league">
                                    <div class="league-logo border-right">

                                        <img src="{{ asset('/assets/img/league') .'/' . $league['old_logo'] }}" alt="" id="leagueImg">
                                    </div>
                                    <div class="league-title" style="color:black ;font-weight:600" id="leagueName">{{$league['competition_name']}}</div>

                                </div>
                            </a>

                                <div class="tab-pane fade  p-3 in" id="team-{{$league['sportsmonks_id']}}" aria-labelledby="team-{{$league['sportsmonks_id']}}-tab">
                                    <div id="team-ui-{{$league['sportsmonks_id']}}" class="team-containerr">
                                        

                                    </div>
                                </div>
                        @endforeach
                    @endif
            </div>
            </div>
            <div class="modal-footer">
            <button  id ="saveBtn" type="button" class="btn btn-success btn-lg btn-block" style="background: rgb(22, 80, 14);color:white">Save</button>
              <button  id ="closeBtn" type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal"  style="background:rgb(215, 13, 78); color:white">Close</button>
            </div>
     
      </div>
    </div>

  </div>

<!-----------------------Add fav team modal end ----------------------->


<!-- ---------------------Show fav club modal ----------------------->

 <div id="favteams" class="modal fade" back-drop role="dialog">
    <div class="modal-dialog" style="margin-left: 23px">
       
        <div class="modal-content" style="margin-left:-14px;margin-top:67px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="xBtn"><b>X</b></button>
                <h4 class="modal-title text-center">
                    <img id="logoEditFavClub"  src="{{ asset('/assets/img/logo-goaly.png') }}" alt=""
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
 <!------------------------ Show fav club modal end ------------------------>

   
<!---------------------------- Contestent Modal    -------------------------->
     <div id="UserPlay" class="modal fade" role="dialog" style="display: none;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title text-center">
                <img src="{{('assets/img/logo-goaly.png')}}" height="60" alt="" id="playLogo">
              </h4>
          </div>
          <div class="modal-body pt-0">
                <div class="standing">
                  <h2 id="popUpTitle">{{ trans('lang.Users Play This Contest') }}</h2>
                    <table class="table table-striped table-responsive">

                        <tbody id="contestantTableBody">
                            <!-- Contestant rows will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
          </div>
          <div class="modal-footer">
              <div class="col-xs-12 plfix">
                <a href="" class="text-center">
                    <button type="button" class="btn-reg" data-dismiss="modal" id="closeBtn">
                        <strong>{{ trans('lang.Close') }}</strong>
                    </button>
                </a>
              </div>
          </div>
        </div>

      </div>
    </div>
<!---------------------------- Contestent Modal End-------------------------->

<!---------------------------- Contestent Answer Modal    -------------------------->
     <div id="answer" class="modal fade" role="dialog" style="display: none;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">See All</button>
            <h4 class="modal-title text-center">
                <img src="{{('assets/img/logo-goaly.png')}}" height="60" alt="" id="playLogo">
              </h4>
          </div>
          <div class="modal-body pt-0">            
                <div class="standing">                    
                    
                    <table class="table table-striped table-responsive">
                        <div style="text-align: center;">
                            <img src="{{asset('images/ajax-loader.gif')}}" id="loaderIimg" style="display:none; width: 25%;">
                        </div>
                        <div id="cotestent"style="width: 100%;">
                        </div>
                        <tbody id="answerTableBody">
                            
                        </tbody>
                    </table>
                </div>
          </div>
          
        </div>

      </div>
    </div>
<!---------------------------- Contestent Answer Modal End-------------------------->
@if(Session::has('error'))
    <script type="text/javascript">
        Swal.fire({
            title: "Warning!",
            text: "{{ Session::get('error') }}",
            icon: "warning",
            timer: 3000, 
            showConfirmButton: false 
        });
    </script>
@endif
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
        'no_players':'{{ trans('lang.No players Found') }}',
        'start': '{{ trans('lang.Start') }}',
        'end': '{{ trans('lang.End') }}',
        'custom_match_result': '{{ trans('lang.Match Result') }}',
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
        'Question': '{{ trans('lang.Question') }}',
        'Answer': '{{ trans('lang.Answer') }}',
        'no_data':'{{trans('lang.No data available')}}',
        question: {
            "Can you predict the score?": "{{ trans('lang.Can you predict the score?') }}",
            "Which team first to make goal?": "{{ trans('lang.Which team first to make goal?') }}",
            "which first team to receive yellow card?": "{{ trans('lang.which first team to receive yellow card?') }}",
            "Which team has highest ball possession?": "{{ trans('lang.Which team has highest ball possession?') }}",
            "Which team first do substitute?": "{{ trans('lang.Which team first do substitute?') }}",
            "Which team to receive red card?": "{{ trans('lang.Which team to receive red card?') }}"
        }
    };
</script>




<script src="{{ asset('assets/js/Prediction.js') }}"></script>





</body>
</html>
