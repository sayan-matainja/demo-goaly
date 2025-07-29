@include('partials.header_portal')
</head>
<style>

body {
    background-color: #EDEEEF;
    font-size: calc(14px + (26 - 14) * ((100vw - 300px) / (1600 - 300)));
    line-height: calc(1.3em + (1.5 - 1.2) * ((100vw - 300px)/(1600 - 300)));
  }
  .wrapper {
    margin: 0 auto;
    height: 100vh;
    max-width: 540px;
  }
  .shadow {
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
  }
  .header-leaderboard {
    background-color: #700d7b;
      color: white;
      text-align: center;
      padding: 0 10px;
      padding-top: 20px;
/*      margin-bottom: 6px;*/
      margin-top: -8px
  }
  .header-leaderboard h4 {
    font-weight: 300;
  }
  .body-leaderboard .dropdown {
    margin: 0 2rem;
  }
  .body-leaderboard .dropdown button {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 16px 2rem;
    margin-top: -25px;
    color: grey;
    background-color: white;
  }
  .body-leaderboard .dropdown .dropdown-menu {
    width: 100%;
  }
  .cover-board {
    display: flex;
    flex-direction: column;
  }
  .board {
    background-color: #FFFFFF;
    border: 1pt solid #D5D5D5;
    border-radius: 5px;
    padding: 1em;
    margin: 2.5rem 1rem 0;
  }
  .board:last-child {
    margin-bottom: 2rem;
  }
 .boardd {
    background-color: #FFFFFF;
    border: 1pt solid #D5D5D5;
    border-radius: 5px;
    padding: 1em;
    margin: 2.5rem 1rem 0;
  }
  .boardd:last-child {
    margin-bottom: 2rem;
  }
  .player {
    text-align: center;
  }
  .player .cover-img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: inline-block;
    margin-top: -40px;
  }
  .player .cover-img img {
    width: 60px;
    height: 60px;
  }
  .player .cover-img div {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 20px;
    min-height: 20px;
    padding: 0 4px;
    margin-top: -15px;
    margin-left: 35px;
    color: white;
    font-size:  9pt;
    background-color: #700D7B;
    border: 1px solid white;
    border-radius: 50%;
  }
  .player .name {
    display: block;
    color: #700D7B;
    margin: 1em 0;
  }
  .player .achievement {
    display: flex;
    padding: 15px 10px;
    border-radius: 5px;
    background-color: #EFD8F2;
  }
  .player .achievement img {
    margin-right: 5px;
  }
  .player .achievement .point, .achievement .win {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50%;
  }
  .history h4 {
    text-align: center;
    margin: 20px 0 10px;
  }
  .cover-record {
    display: flex;
    flex-direction: column;
  }
  .record {
    padding: 1rem 0;
  }
  .record:not(:last-child) {
    border-bottom: 1px solid #D5D5D5;
  }
  .match {
    display: flex;
    justify-content: center;
    margin: 5px 0;
  }
  .match .left-team {
    width: 40%;
    text-align: right;
    display: flex;
    align-items: center;
    justify-content: flex-end;
  }
  .match .right-team {
    width: 40%;
    text-align: left;
    display: flex;
    align-items: center;
  }
  .match .score {
    width: 20%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .match-point {
    display: flex;
    align-items: center;
  }
  .match-point .date {
    width: 40%;
    color: #A8A8A8;
    font-size: 9pt;
    text-align: right;
    padding-right: .5rem;
  }
  .match-point .point {
    width: 22%;
    padding: 2px 10px;
    border-radius: 2em;
    text-align: center;
    color: white;
    font-size: 10px;
    background-color: #4B0654;
  }
  .see-all {
    padding: 1rem 1rem .4rem;
  }
  .see-all a {
    float: right;
    color: #700d7b;
  }
  div.dropdown.btn-group {
    width: -webkit-fill-available;
  }
  .dropdown.btn-group button {
    border: 0;
  }
  .row.leaderboard {
    min-height: 112px;
  }
  
  
  .sortmenu{
    padding: 0;
      margin: 0;
      list-style: none;
      display: flex;
      justify-content: space-around;
  }
  .buttonGray{
    background-color: #e9e9e9;
      /* color: white; */
      height: 40px;
      border-radius: 7px 7px 0 0;
      width: 108px;
      font-weight: 200;
      color: black !important;
      font-size: 14px;
  }
  .buttonPink{
    background-color: #e8d5e7;
      /* color: white; */
      height: 40px;
      border-radius: 5px 5px 0 0;
      width: 108px;
      font-weight: 200;
      color: black !important;
      font-size: 14px;
  }
  .row.leaderboard {
    margin-top: 6px;
  }
  .header-leaderboard h4 {
    font-weight: 300;
    margin-bottom: 20px;
    font-size: 18px;
  }
  #slider {
    margin: 1em;
  }
  #slider .carousel-inner {
    border-radius: 10px;
    overflow: hidden;
  }
  #slider .item {
    height: 115px;
  }
  #slider .carousel-indicators {
    margin-bottom: -40px;
  }
  #slider .carousel-indicators li {
    background-color: rgb(180, 180, 180);
  }
  #slider .carousel-indicators li.active {
    background-color: #700d7b;
  }
  button {
    background: #f60;
    border-radius: 4px;
    border: none;
    color: #fff;
    font-size: 13px;
    padding: 10px 20px;
}

    </style>

<body>
   
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content mt-10">
            <div class="row leaderboard">
                <div class="header-leaderboard">
                      <h4 id="title">{{ trans('lang.LEADERBOARD') }}</h4>

                  <ul class="sortmenu">
                    <button class="buttonGray" id="allButton" fdprocessedid="8cs4p">
                        <a variant="All" eventkey="All">{{ trans('lang.All') }}</a>
                    </button>
                    <button class="buttonPink" id="monthlyButton" fdprocessedid="z5pkzk">
                        <a activekey="All">{{ trans('lang.Monthly') }}</a>
                    </button>
                 </ul>

                </div>

            </div>


            <!-- slider  Start Here -->
  <div class="container" style="margin-top:3px;padding-right: 8px;padding-left: 8px">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators" style="margin-bottom: -10px;" id="dots">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="./images/bannerImage/Banner-Tsel-Goaly-Jaket.png" alt="" style="width:100%;" id="rewardImg">
      </div>

      <div class="item">
        <img src="./images/bannerImage/Banner-Tsel-Goaly-Jersey.png" alt="" style="width:100%;" id="rewardImg">
      </div>
    
    <div class="item">
        <img src="./images/bannerImage/Banner-Tsel-Goaly-Topi.png" alt="" style="width:100%;" id="rewardImg">
      </div>

      <div class="item">
        <img src="./images/bannerImage/Banner-Tsel-Goaly-Botol.png" alt="" style="width:100%;" id="rewardImg">
      </div>
      
    </div>

   
   
  </div>
</div>

<!-- slider end -->

<div class="cover-board" id="general" style="padding-top: 24px;">

<!---------------------------- General leader list --------------------->
@if(isset($general))
@foreach($general as $index => $gen)

<div class="board shadow listing" >
    <div class="player">
        <div class="cover-img">
           <img src="{{ isset($gen['image']) ? asset('uploads/'.$gen['image']) : asset('/images/leaderboard/user_no_image.png') }}" alt="" style="border-radius: 50%;" id="photoProfile">
            <div></div>
        </div>
        <span class="name my-2" id="name">{{ isset($gen['name'])?$gen['name']:$gen['msisdn'] }}</span>
        <div class="achievement">
            <div class="win">
                <img src="{{ asset('./images/leaderboard/cup.svg') }}" alt="" id="wonIcn">
                <span id="wonCounter">{{ $gen['wins'] }} {{ trans('lang.Won') }}</span>
            </div>
            <span class="text-secondary">|</span>
            <div class="point">
                <img src="{{ asset('./images/leaderboard/coins.svg') }}" alt="" id="pointIcn">
                <span id="totalPoint">{{ $gen['coins'] }} {{ trans('lang.Points') }}</span>
            </div>
        </div>
    </div>

    {{-- for history --}}

    <div class="history">
        <h4 id="historyPoint">{{ trans('lang.History Point') }}</h4>
        <div class="cover-record"></div>
    </div>
    <div>
      @if(isset($gen['history']) && count($gen['history']) > 0)
    @foreach($gen['history'] as $i => $his)
        <div class="record {{ $i >= 2 ? 'record-' . $index : '' }}" style="{{ $i >= 2 ? 'display: none;' : '' }}">
            <div class="match">
                <div class="left-team">ll
                  <span class="leaderboardEllipsis" style="margin-right: 5px"> {{ $his['prediction']['home_team_name'] }}</span>
                 <img src="{{ $his['prediction']['home_team_logo'] }}" width="20%" alt="" id="hClubImg"> 
                </div>
                <span class="score" id="score">{{ $his['prediction']['score_home'] }}-{{ $his['prediction']['score_away'] }}</span>
                <div class="right-team">
                    <img src="{{ $his['prediction']['away_team_logo'] }}" width="20%" alt="" id="aClubImg"> 
                    <span class="leaderboardEllipsis" style="margin-left: 5px">{{ $his['prediction']['away_team_name'] }}</span>
                </div>
            </div>
            <div class="match-point">
                <span class="date" id="date">
                    <time datetime="1639866954000">{{ \Carbon\Carbon::parse(isset($his['updated_at']) ? $his['updated_at'] : $his['created_t'])->format('d/m/Y') }}
                    </time>
                </span>
                <span class="point" id="point">{{ $his['coins'] }}</span>
            </div>
        </div>

        @if($i == count($gen['history']) - 1 && count($gen['history']) > 2)
            <!-- Display "See All" button after the last iteration only if count is greater than 2 -->
            <div class="see-all">
                <a class="btn btn-default w-100 see-all-button" data-player-index="{{ $index }}" style="border: 1px solid rgb(156, 37, 168)" id="seeAllBtn">{{ trans('lang.See All') }}</a>
            </div>
        @endif
    @endforeach
@endif

        
    </div>
    {{-- <div style="color: rgb(168, 168, 168); font-size: 12px; font-style: italic;">{{ trans('lang.User Subscribe from ') }}<time datetime="1639866954000">
{{ $gen['subscribe_date'] }}
</time> with &nbsp; {{ isset($gen['renewal_count'])?$gen['renewal_count']:'0' }} &nbsp;charge
</div> --}}
</div>

@endforeach
@endif
<!-- ------------------------ Geeneral leader list end ------------------------->
<button class="btn btn-default" id="seeAllLeadersBtn"style="border: 1px solid rgb(156, 37, 168);margin:1em">{{ trans('lang.See More Top User') }}</button>
  <div class="clearfix"></div>
</div>

<!-- ---------------------------Monthly Leader List------------------------------>
<div class="cover-board" id="monthly" style="padding-top: 24px;" >
@if(isset($monthly))
@foreach($monthly as $index => $mon)

<!-- <div class="boardd shadow " style="{{ $index >= 3 ? 'display: none;' : '' }}"> for toggle-->
<div class="boardd shadow listing2" >
    <div class="player">
        <div class="cover-img">
           <img src="{{ isset($mon['image']) ? asset('uploads/'.$mon['image']) : asset('/images/leaderboard/user_no_image.png') }}" alt="" style="border-radius: 50%;">
            <div></div>
        </div>
        <span class="name my-2">{{ isset($mon['name'])?$mon['name']:$mon['msisdn'] }}</span>
        <div class="achievement">
            <div class="win">
                <img src="{{ asset('./images/leaderboard/cup.svg') }}" alt="">
                <span>{{ $mon['wins'] }} Won</span>
            </div>
            <span class="text-secondary">|</span>
            <div class="point">
                <img src="{{ asset('./images/leaderboard/coins.svg') }}" alt="">
                <span>{{ $mon['coins'] }}</span>
            </div>
        </div>
    </div>

    {{-- for history --}}

    <div class="history">
        <h4>History Point</h4>
        <div class="cover-record"></div>
    </div>
    <div>
      @if(isset($mon['history']) && count($mon['history']) > 0)        

        @foreach($mon['history'] as $i => $his)
            <div class="record {{ $i >= 2 ? 'record-' . $index : '' }}" style="{{ $i >= 2 ? 'display: none;' : '' }}">
                    <div class="match">
                        <div class="left-team">
                          <span class="leaderboardEllipsis" style="margin-right: 5px">{{ $his['homeTeamName'] }}</span>
                            <img src="{{ $his['homeTeamLogo'] }}" width="20%" alt=""> 
                        </div>
                        <span class="score">{{ $his['homeTeamScore'] }}-{{ $his['awayTeamScore'] }}</span>
                        <div class="right-team">
                            <img src="{{ $his['awayTeamLogo'] }}" width="20%" alt="">
                            <span class="leaderboardEllipsis" style="margin-left: 5px">{{ $his['awayTeamName'] }}</span>
                             
                        </div>
                    </div>
                    <div class="match-point">
                        <span class="date">
                            <time datetime="1639866954000">{{ \Carbon\Carbon::parse(isset($his['user_played_date']) ? $his['user_played_date'] : $his['history_createdAt'])->format('d/m/Y') }}
                            </time>
                        </span>
                        <span class="point">{{ $his['coin_won'] }}</span>
                    </div>
                </div>
            @if($i == count($gen['history']) - 1 && count($gen['history']) > 2)
            <!-- Display "See All" button after the last iteration only if count is greater than 2 -->
            <div class="see-all">
                <a class="btn btn-default w-100 see-all-button" data-player-index="{{ $index }}" style="border: 1px solid rgb(156, 37, 168)">{{ trans('lang.See All') }}</a>
            </div>
        @endif
        @endforeach
    @endif
        
    </div>
    {{-- <div style="color: rgb(168, 168, 168); font-size: 12px; font-style: italic;">{{ trans('lang.User Subscribe from') }} <time datetime="1639866954000">
{{ $mon['subscribe_date'] }}
</time> with &nbsp; {{ isset($mon['renewal_count'])?$mon['renewal_count']:'0' }} &nbsp;charge
</div> --}}
</div>

@endforeach
@endif

<button class="btn btn-default w-100" id="monthlyLeader"style="border: 1px solid rgb(156, 37, 168); ">{{ trans('lang.See More Top User') }}</button>



                <div class="clearfix"></div>
</div>

<!-- --------------------------MOnthly leader list End--------------------------->


      
    @include('partials.footernew')

<script>
    var translations = {
        'see_all': '{{ trans('lang.See All') }}',
        'see_less': '{{ trans('lang.See Less') }}',
        'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',
        
    };

$(document).ready(function() {
        
        function mylisting() {
        var size_item = $('.listing').length;
        var v=3;
        $('.listing').hide(); // hide all divs with class `listing`
        if(size_item <= v){ $("#seeAllLeadersBtn").hide(); }

        $('.listing:lt('+v+')').show();

        $('#seeAllLeadersBtn').click(function (e) {
            e.preventDefault();
            v= (v+3 <= size_item) ? v+3 : size_item;
            
            $('.listing:lt('+v+')').show();
            if($(".listing:visible").length >= size_item ){ $("#seeAllLeadersBtn").hide(); }
        });
      }
        function mylisting2() {
        var size_item = $('.listing2').length;
        var v=3;
        $('.listing2').hide(); // hide all divs with class `listing`
        if(size_item <= v){ $("#monthlyLeader").hide(); }

        $('.listing2:lt('+v+')').show();

        $('#monthlyLeader').click(function (e) {
            e.preventDefault();
            v= (v+3 <= size_item) ? v+3 : size_item;
            
            $('.listing2:lt('+v+')').show();
            if($(".listing2:visible").length >= size_item ){ $("#monthlyLeader").hide(); }
        });
      }
      
      mylisting();
      mylisting2();

  });
    
</script>

</body>

</html>
