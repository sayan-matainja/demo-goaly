@include('partials.header_portal')
</head>

<body>
<style type="text/css">    
.hide-records {
    display: none;
}
</style>

    <div>
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content container-fluid" >
            <div class="league-cover row">
            <!-- league-cover -->
            <input type="hidden" name="league_id" value="{{$league_id}}">
            <input type="hidden" name="season_id" value="{{isset($details['id'])?$details['id']:''}}">
            <input type="hidden" name="comp_id" value="{{isset($details['competition_id'])?$details['competition_id']:''}}">
            @if (isset($details))


            <div class="league-cover">
                <div class="inner-league-cover">
                    <div class="logo">
                       
                        @php
                            $img = isset($details['logo'])?$details['logo']:'';
                           
                        @endphp
                        <img src="{{ asset('/assets/uploads/leagues') .'/' . $img }}" alt="">
                    </div>
                    <h4 class="name">{{isset($details['competition_name'])?$details['competition_name']:''}}</h4>
                    <span id="season">{{ trans('lang.Season') }} {{isset($details['name'])?$details['name']:''}}</span>
                    <!-- <span>Round 37/38</span> -->
                </div>
            </div>
            @endif
            <!-- league menu -->

            <ul class="league-menu bg-purple">
                <li class="nav-item active">
                    <a class="nav-link" id="infoTab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true" aria-expanded="true">{{ trans('lang.Info') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="matchTab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false" aria-expanded="false">{{ trans('lang.Match') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="standingsTab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">{{ trans('lang.Standings') }}</a>
                </li>
                <li>
                    <a class="nav-link"  id="statsTab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false">{{ trans('lang.Stats') }}</a>
                </li>
                <li>
                    <a class="nav-link" id="newsTab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="false">{{ trans('lang.News') }}</a>
                     </li>
                <li><a class="nav-link" id="teamsTab" data-toggle="tab" href="#six" role="tab" aria-controls="six" aria-selected="false">{{ trans('lang.Teams') }}</a>
                </li>
            </ul>
            <!-- tabs content -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active p-3 in" id="one" aria-labelledby="infoTab">
                    <div class="tab-content">
                        <!-- league highlight -->

                            <div class="league-highlight block bg-grey" style="padding: 15px; margin-top: 1px;">
                                <h5>{{ trans('lang.Season')}} {{isset($details['name'])?$details['name']:''}}</h5>
                                <ul>
                                    <li>
                                        <span id="Matched_played"></span>
                                        <span id="matchPlayedTxt">{{ trans('lang.Matches Played') }}</span>
                                    </li>
                                    <li>
                                        <span id="Goal"></span>
                                        <span id="goalTxt">{{ trans('lang.Goal') }}</span>
                                    </li>
                                    <li>
                                        <span id="Yellow"></span>
                                        <span id="yellowCardTxt">{{ trans('lang.Yellow Card') }}</span>
                                    </li>
                                    <li>
                                        <span id="Red"></span>
                                        <span id="redCardTxt">{{ trans('lang.Red Card') }}</span>
                                    </li>
                                    <!-- <li>
                                        <span id="Assists"></span>
                                        <span id="assistTxt">Assists</span>
                                    </li> -->
                                </ul>
                            </div>


                        <!-- league top player -->
                        <div class="pleague-top-player-box">
                            <div class="tag bg-dark d-flex text-white">
                                <span class="mr-auto" id="topPlayerTxt">{{ trans('lang.Top Player') }}</span>
                                <span id="seasonTxt">{{ trans('lang.Season') }} {{isset($details['name'])?$details['name']:''}}</span>
                            </div>
                            <div class="bg-white">
                                <ul id="PlayerDetails">

                                </ul>
                            </div>
                        </div>

                                       <!-- For "Last Game league matches" -->
                    <div class="tag bg-purple d-flex text-white">
                        <span class="mr-auto" id="lastGameTxt">{{ trans('lang.Last Game') }}</span>
                        <span class="bg-whitepurple more-button" data-target="last-match" id="loadMoreLastGame">{{ trans('lang.More') }}</span>
                    </div>
                    <div class="container-matches" id="last-match">
                        <!-- The container for "Last Game" records -->
                    </div>

                    <!-- For "Next Game" -->
                    <div class="tag bg-purple d-flex text-white">
                        <span class="mr-auto" id="nextGameTxt">{{ trans('lang.Next Game') }}</span>
                        <span class="bg-whitepurple more-button" data-target="next-match" id="loadMoreNextGame">{{ trans('lang.More') }}</span>
                    </div>
                    <div class="container-matches" id="next-match">
                        <!-- The container for "Next Game" records -->
                    </div>

                    </div>
                </div>
                <!-- league matches end -->
                <div class="tab-pane fade p-3" id="two" aria-labelledby="matchTab">
                    <div class="tab-content">

                        <div class="block bg-grey">
                            <div class="dropdown">

                                <select id="gameWeekDropDown" name="round" class="btn btn-lg btn-white w-100 d-flex ais-center" style="width: 94%;margin-left:10px">

                                </select>
                                {{-- <ul class="dropdown-menu w-100">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul> --}}
                            </div>
                        </div>

                        <!-- league matches -->
                       
                        <div class="container-matches" id="match">

                        </div>


                    </div>
                </div>
                <!-- standing content -->
                <div class="tab-pane fade p-3" id="three" aria-labelledby="standingsTab">
                    <div class="tab-content" id="standings">


                    </div>
                </div>

                <!-- news content -->
                <div class="tab-pane fade p-3" id="five" aria-labelledby="newsTab">
                    <div class="tab-content" >

                      
                        <div id="my-pics" class="carousel slide" data-ride="carousel" style="width:100%;margin:auto;">

                            <!-- Indicators -->
                     <ol class="carousel-indicators" style="bottom: 15px">
                     <li data-target="#my-pics" data-slide-to="0" class="active"></li>
                     <li data-target="#my-pics" data-slide-to="1"></li>
                     <li data-target="#my-pics" data-slide-to="2"></li>
                     </ol>
                        
                     <!-- Content -->
                    <div class="carousel-inner" role="listbox" style=" height: 262px;">

               <!-- Slide 1 -->
             <div class="item active" id="slider-1">
               <img id="sliderImg" class="league-detais-carousel" src="" alt="no image " style="border-radius: 9px" >
             <div class="league-caption-carousel" >
              <h3 id="sliderNews" class="slider-heading"></h3>
             
             </div>
             </div>
    
                <!-- Slide 2 -->
                <div class="item" id="slider-2" >
                <img id="sliderImg" class="league-detais-carousel" src=""  alt="no image " style="border-radius: 9px">
               <div class="league-caption-carousel" >
                <h3 id="sliderNews" class="slider-heading"></h3>
                
               </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="item" id="slider-3">
                <img id="sliderImg" class="league-detais-carousel" src=""  alt="no image " style="border-radius: 9px">
                <div class="league-caption-carousel" >
                <h3 id="sliderNews" class="slider-heading"></h3>
               
                </div>
                </div>
            </div>
            <br>
              <div class="clearfix"></div>
                
       </div>
       <!------news---->
       <div class="team col-xs-12 ct" id="newss-tab"></div>
      
        </div>
            <button class="btn btn-lg btn-dark w-100" id="seeAllBtn" data-target="newss-tab" style="margin-left: 5px; width: 97%;">{{ trans('lang.See All') }}</button>
        </div>



          <!-- stats content -->
          <div class="tab-pane fade p-3" id="four" aria-labelledby="statsTab">
            <div class="tab-content" id="stats">
              <div class="tag bg-dark d-flex text-white"><span id="statsType">{{ trans('lang.Players-Goals') }}</span></div>
                <!-- <div class="league-stats"> 
                    <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt="" class="img-size" >
                 </div> -->

<div class="league-player-rank">
    <ul>
        @if(!empty($stats['goals']['data']))
        @foreach($stats['goals']['data'] as $key => $player)
            <li>
                <span id="number">{{ $key + 1 }}</span>
                <div class="desc">
                    <div class="cover-img" style="max-width: 50px;">
                    <a href="{{route('playerDetails', $player['player_id'])}}">
                        <img id="playerImg"class="img-fluid" src="{{ $player['image_path'] }}" alt="" style="max-width: 50px;" onerror="this.onerror=null;this.src='{{ asset('assets/img/players/no-player.png') }}';">
                    </a>                    </div>
                    <div style="width: 110px;">
                        <h5 class="m-0" id="playerName"><b style="font-size: 10px;">{{ $player['name'] }}</b></h5>
                        <span style="font-size: 10px;" id="clubName">{{ $player['team_name'] }}</span>
                    </div>
                    <div class="cover-img" style="max-width: 50px;">
                        <img class="img-fluid" id="clubImg" src="{{ $player['team_logo'] }}" alt="" style="max-width: 50px;">
                    </div>
                </div>
                <span id="value">{{ $player['scores'] }}</span>
            </li>
        @endforeach
        @else
        <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt=""  class="img-size">

        @endif
    </ul>
</div>






 <div class="tag bg-dark d-flex text-white"><span id="statsType">{{ trans('lang.Players-Assists') }}</span></div>
<div class="league-player-rank ">
    <ul>
        @if(!empty($stats['assists']['data']))
        @foreach($stats['assists']['data'] as $key => $player)
            <li>
                <span>{{ $key + 1 }}</span>
                <div class="desc">
                    <div class="cover-img" style="max-width: 50px;">
                    <a href="{{route('playerDetails', $player['player_id'])}}">
                        <img id="playerImg" class="img-fluid" src="{{ $player['image_path'] }}" alt="" style="max-width: 50px;" onerror="this.onerror=null;this.src='{{ asset('assets/img/players/no-player.png') }}';">
                    </a>
                    </div>
                    <div style="width: 110px;">
                        <h5 class="m-0" id="playerName"><b style="font-size: 10px;">{{ $player['name'] }}</b></h5>
                        <span style="font-size: 10px;" id="clubName">{{ $player['team_name'] }}</span>
                    </div>
                    <div class="cover-img" style="max-width: 50px;">
                        <img class="img-fluid" id="clubImg"src="{{ $player['team_logo'] }}" alt="" style="max-width: 50px;">
                    </div>
                </div>
                <span id="value">{{ $player['scores'] }}</span>
            </li>
        @endforeach
        @else
        <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt="" class="img-size"  >

        @endif
    </ul>
</div>

               
<div class="tag bg-dark d-flex text-white"><span id="statsType">{{ trans('lang.Players-Yellow Cards') }}</span></div>
<div class="league-player-rank">
    <ul>
        @if(!empty($stats['y_card']['data']))
        @foreach($stats['y_card']['data'] as $key => $player)
            <li>
                <span>{{ $key + 1 }}</span>
                <div class="desc">
                    <div class="cover-img" style="max-width: 50px;">
                    <a href="{{route('playerDetails', $player['player_id'])}}">
                        <img id="playerImg" class="img-fluid" src="{{ $player['image_path'] }}" alt="" style="max-width: 50px;" onerror="this.onerror=null;this.src='{{ asset('assets/img/players/no-player.png') }}';">
                    </a>                    </div>
                    <div style="width: 110px;">
                        <h5 class="m-0" id="playerName"><b style="font-size: 10px;">{{ $player['name'] }}</b></h5>
                        <span style="font-size: 10px;" id="clubName">{{ $player['team_name'] }}</span>
                    </div>
                    <div class="cover-img" style="max-width: 50px;">
                        <img class="img-fluid" id="clubImg" src="{{ $player['team_logo'] }}" alt="" style="max-width: 50px;">
                    </div>
                </div>
                <span id="value">{{ $player['scores'] }}</span>
            </li>
        @endforeach
        @else
        <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt="" class="img-size" >

        @endif
    </ul>
</div>

               
                <div class="tag bg-dark d-flex text-white"><span id="statsType">{{ trans('lang.Players-Red Cards') }}</span></div>
<div class="league-player-rank">
    <ul>
        @if(!empty($stats['r_card']['data']))
        @foreach($stats['r_card']['data'] as $key => $player)
            <li>
                <span>{{ $key + 1 }}</span>
                <div class="desc">
                    <div class="cover-img" style="max-width: 50px;">
                    <a href="{{route('playerDetails', $player['player_id'])}}">
                        <img id="playerImg" class="img-fluid" src="{{ $player['image_path'] }}" alt="" style="max-width: 50px;" onerror="this.onerror=null;this.src='{{ asset('assets/img/players/no-player.png') }}';">
                    </a>                    </div>
                    <div style="width: 110px;">
                        <h5 class="m-0" id="playerName"><b style="font-size: 10px;">{{ $player['name'] }}</b></h5>
                        <span style="font-size: 10px;" id="clubName">{{ $player['team_name'] }}</span>
                    </div>
                    <div class="cover-img" style="max-width: 50px;">
                        <img class="img-fluid" id="clubImg" src="{{ $player['team_logo'] }}" alt="" style="max-width: 50px;">
                    </div>
                </div>
                <span id="value">{{ $player['scores'] }}</span>
            </li>
        @endforeach
        @else
        <img src="{{ asset('assets/img/detail-match/icon-menu/no-Data-Found.png') }}" alt="" class="img-size" >

        @endif
    </ul>
</div>

                



            </div>
        </div>
          <div class="tab-pane fade p-3" id="six" aria-labelledby="teamsTab">
        </div>

    </div>
    @include('partials.footernew')
    <script src="{{ asset('assets/js/leagueDetails.js') }}"></script>

<script type="text/javascript">
     var translations = {
        'see_all': '{{ trans('lang.See All') }}',
        'see_less': '{{ trans('lang.See Less') }}',
        'more': '{{ trans('lang.More') }}',
        'less': '{{ trans('lang.Less') }}',
        'Coming_Soon': '{{ trans('lang.Coming Soon') }}',
        'Finished': '{{ trans('lang.Finished') }}',
        'Goals': '{{ trans('lang.Goals') }}',
        'Assists': '{{ trans('lang.Assists') }}',
        'Red cards': '{{ trans('lang.Red Cards') }}',
        'Yellow cards': '{{ trans('lang.Yellow Cards') }}',
        'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',

    };
var base_url = window.location.origin;
var league_id= document.getElementsByName('league_id')[0].value;
$(document).ready(function () {
    $(".more-button").click(function () {
        var targetId = $(this).data("target");
        var container = $("#" + targetId);

        // Select all matches within the container
        var matches = container.find(".matches");

        // Determine the index at which to start hiding records (2 in this case)
        var startIndex = 2;

        // Toggle the "hide-records" class starting from the startIndex
        matches.slice(startIndex).toggleClass("hide-records");

        if (container.find(".matches.hide-records").length > 0) {
            $(this).text(translations.more);
        } else {
            $(this).text(translations.less);
        }
    });

        $("#seeAllBtn").click(function (e) {
            e.preventDefault();
        var targetId = $(this).data("target");
        var container = $("#" + targetId);
console.log(container);
        // Select all matches within the container
        var newss = container.find(".bg-white");

        // Determine the index at which to start hiding records (2 in this case)
        var startIndex = 4;

        // Toggle the "hide-records" class starting from the startIndex
        newss.slice(startIndex).toggleClass("hide-records");

        if (container.find(".bg-white.hide-records").length > 0) {
            $(this).text(translations.see_all);
        } else {
            $(this).text(translations.see_less);
        }
    });
});



</script>
</body>
</html>
