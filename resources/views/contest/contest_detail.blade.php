@include('partials.header_portal')
<link href="/assets/css/lineup.css" rel="stylesheet" />

</head>

<body>
	<style>
	 body {
    background: #F4F4F4 !important;
}

.fs-12 {
    font-size: 12px;
}

.fs-14 {
    font-size: 14px;
}

.fs-18 {
    font-size: 18px;
}

.fw-bold {
    font-weight: bold;
}

.hr-white {
    border-color: #fff;
}

.card-point {
    margin: 1em;
    border-radius: 5px;
    filter: drop-shadow(0px 1px 4px rgba(110, 110, 110, 0.1));
    background: #fff;
    padding: 20px;
    margin-top: -30px;
}

.card-point .result {
    padding-bottom: 10px;
}

.point-icon {
    width: 18px;
    margin-right: 10px;
}

.card-summary .value {
    width: 100%;
    padding-top: 8px;
    padding-bottom: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-summary {
    background: #fff;
    border-radius: 5px;
    box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.16);
    padding: 14px;
}

.card-summary .score {
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-summary .name {
    font-size: 12px;
}

.card-summary .value {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 14px;
    border-radius: 5px;
    background: #E6E6E6;
}

.progress-point {
    margin-top: 10px;
}

.progress-point .progress {
    background: #55115D;
    border-radius: 10px;
    margin-bottom: 0;
}

.progress-point .progress .progress-bar {
    background: #AC4CB7;
    border-radius: 10px;
}

.question {
    font-size: 18px;
    text-align: center;
    color: #080808;
    margin-top: 20px;
    margin-bottom: 20px;
}

.card-submit {
    background: url({{ asset('assets/img/icon-timeline/bg-cardSubmit.png')}});
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 6px;
    padding: 20px;
    position: relative;
    margin: 1em;
}

.icon-question {
    position: absolute;
    width: 50px;
    height: 50px;
    top: -10px;
    right: -4px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff;
    border-radius: 50%;
    border: 2px solid #55115d;
}

.card-submit .date {
    font-size: 14px;
    text-align: center;
    color: #ffffff;
    margin-bottom: 42px;
}

.card-score {
    border-radius: 8px;
    background: #fff;
    border-radius: 0px 3px 3px rgba(0, 0, 0, 0.16);
    padding: 10px;
    display: grid;
    justify-content: center;
}

.card-summary .logo-club {
    width: 42px;
    height: 42px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.16);
}

.card-summary .logo-club .logos {
    width: auto;
    height: 35px;
}

.card-score .logo-club {
    width: 64px;
    height: 64px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.16);
    margin-top: -40px;
    margin-bottom: 10px;
    margin-left: 9px;
}

.card-score .logo-club .logos {
    width: auto;
    height: 50px;
}

.card-score .name-club {
    margin-bottom: 10px;
}

.center {
    align-items: center;
    display: flex;
}

.w-100 {
    width: 100%;
}

.mt-20 {
    margin-top: 20px;
}

.btn-light {
    background: #fff;
}

.btn-primary {
    background: #7CD327 !important;
    border-color: #7CD327 !important;
}

.statistic {
    margin: 1em;
}

.action-stats {
    position: relative;
}

.statistic .caret {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 20px;
}

.btn-dark:hover,
.btn-dark:focus,
.btn-dark:active {
    color: #fff !important;
}

.custom-gutter {
    margin-left: -0.5rem;
    margin-right: -0.5rem;
}

.custom-gutter>[class*='col-'] {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
}

.card-submit.top {
    margin-top: -30px;
}

.soft-purple {
    color: #F4CCF8;
}


/* custom card radio */
.custom-label {
    width: 100%;
}

.card-input {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.16);
    width: 100%;
    padding-top: 32px;
    padding-bottom: 32px;
    display: grid;
    align-items: center;
    justify-content: center;
}

.card-input-element {
    display: none;
}

.card-input:hover {
    cursor: pointer;
}

.card-input-element:checked+.card-input {
    background: #f4ccf8
}

.card-input .logo-club {
    width: 64px;
    height: 64px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.16);
}

.card-input .logo-club .logos {
    width: auto;
    height: 50px;
}

.card-input .name-club {
    margin-top: 10px;
}
.wrapper {
    margin: 0 auto;
    max-width: 520px;
    min-height: 100vh;
    background-color: whitesmoke;
}

a {
    text-decoration: none !important
}

.text-center {
    text-align: center
}

.text-justify {
    text-align: justify
}

.text-left {
    text-align: left
}

.text-right {
    text-align: right
}

.text-white {
    color: #FFFF
}

.text-black {
    color: black
}

.text-purple {
    color: #4B0654
}

.text-grey {
    color: grey
}

.bg-transparent {
    background-color: transparent
}

.bg-dark {
    background-color: #1F1F1F
}

.bg-darkgrey {
    background-color: #A3A3A3
}

.bg-grey {
    background-color: #D9D9D9
}

.bg-purple {
    background-color: #4B0654
}

.bg-white {
    background-color: white
}

.bg-whitepurple {
    background-color: #AC4CB7
}

.bg-whitesmoke {
    background-color: #F4F4F4
}

.bg-green {
    background-color: #7CD327
}

.bg-red {
    background-color: #EB0000
}

.bg-orange {
    background-color: #EF9C00
}

.bg-blueocean {
    background-color: #6BB6ED
}

.block {
    padding: 1em
}

.d-flex {
    display: flex;
}

.d-block {
    display: block
}

.d-inline {
    display: inline
}

.d-inline-block {
    display: inline-block
}

.j-start {
    justify-content: start !important
}

.j-center {
    justify-content: center !important
}

.j-between {
    justify-content: space-between !important
}

.j-around {
    justify-content: space-around !important
}

.j-end {
    justify-content: end !important
}

.ais-center {
    align-items: center !important
}

.ais-stretch {
    align-items: stretch !important
}

.flex-column {
    flex-direction: column
}

.float-left {
    float: left
}

.float-right {
    float: right
}

.h-max-c {
    height: max-content
}

.h-100 {
    height: 100%
}

.h-75 {
    height: 75%
}

.h-50 {
    height: 50%
}

.h-25 {
    height: 25%
}

.w-max-c {
    width: max-content
}

.w-100 {
    width: 100%
}

.w-75 {
    width: 75%
}

.w-50 {
    width: 50%
}

.w-25 {
    width: 25%
}

.hv-100 {
    height: 100vh
}

.wv-100 {
    width: 100vw
}


.m-1 {
    margin: .5em
}

.m-2 {
    margin: 1em
}

.mt-0 {
    margin-top: 0
}

.mt-1 {
    margin-top: .5em
}

.mt-2 {
    margin-top: 1em
}

.mr-0 {
    margin-right: 0
}

.mr-1 {
    margin-right: .5em
}

.mr-2 {
    margin-right: 1em
}

.mb-0 {
    margin-bottom: 0
}

.mb-1 {
    margin-bottom: .5em
}

.mb-2 {
    margin-bottom: 1em
}

.ml-0 {
    margin-left: 0
}

.ml-1 {
    margin-left: .5em
}

.ml-2 {
    margin-left: 1em
}

.my-0 {
    margin-top: 0;
    margin-bottom: 0
}

.my-1 {
    margin-top: -0.5em;
    margin-bottom: -0.5em;
}

.my-2 {
    margin-top: 1em;
    margin-bottom: 1em
}

.mx-0 {
    margin-right: 0;
    margin-left: 0
}

.mx-1 {
    margin-right: .5em;
    margin-left: .5em
}

.mx-2 {
    margin-right: 1em;
    margin-left: 1em
}

.ml-auto {
    margin-left: auto !important
}

.mr-auto {
    margin-right: auto !important
}

.mx-auto {
    margin-left: auto !important;
    margin-right: auto !important
}

.my-auto {
    margin-top: auto !important;
    margin-bottom: auto !important
}

.p-0 {
    padding: 0
}

.p-1 {
    padding: .5em
}

.p-2 {
    padding: 1em
}

.pt-0 {
    padding-top: 0
}

.pt-1 {
    padding-top: .5em
}

.pt-2 {
    padding-top: 1em
}

.pl-0 {
    padding-left: 0
}

.pl-1 {
    padding-left: .5em
}

.pl-2 {
    padding-left: 1em
}

.pl-3 {
    padding-left: 1.5em
}

.pr-0 {
    padding-right: 0
}

.pr-1 {
    padding-right: .5em
}

.pr-2 {
    padding-right: 1em
}

.pr-3 {
    padding-right: 1.5em
}

.pb-0 {
    padding-bottom: 0
}

.pb-1 {
    padding-bottom: .5em
}

.pb-2 {
    padding-bottom: 1em
}

.py-0 {
    padding-top: 0;
    padding-bottom: 0
}

.py-1 {
    padding-top: .5em;
    padding-bottom: .5em
}

.py-2 {
    padding-top: 1em;
    padding-bottom: 1em
}

.px-0 {
    padding-left: 0;
    padding-right: 0
}

.px-1 {
    padding-left: .5em;
    padding-right: .5em
}

.px-2 {
    padding-left: 1em;
    padding-right: 1em
}

.border {
    border: 1px solid #D6CED9
}

.border-top {
    border-top: 1px solid #D6CED9
}

.border-right {
    border-right: 1px solid #D6CED9
}

.border-bottom {
    border-bottom: 1px solid #D6CED9
}

.border-left {
    border-left: 1px solid #D6CED9
}

.radius-1 {
    border-radius: .5em
}

.radius-2 {
    border-radius: 1em
}

.radius-3 {
    border-radius: 1.5em
}

.btn-dark {
    background-color: #343131;
    color: white
}

.btn-dark:focus,
.btn-dark:hover {
    background-color: #201e1e;
    color: white
}

.btn-white {
    background-color: white;
    color: black
}

.btn-white:focus,
.btn-white:hover {
    background-color: white;
    color: black
}

.btn-purple {
    background-color: #AC4CB7;
    color: white
}

.btn-purple:focus,
.btn-purple:hover {
    background-color: #781783;
    color: white
}

.btn-grey {
    background-color: #C3C3C3;
    color: white
}

.btn-grey:focus,
.btn-grey:hover {
    background-color: #acacac;
    color: white
}

.btn-pill {
    border-radius: 50px
}

.btn-transparent {
    background-color: transparent
}

.img-fluid {
    max-width: 100%;
    height: auto
}

.shadow {
    box-shadow: 0 1px 3px rgba(0, 0, 0, .25)
}
.well {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    display: flex;justify-content: center;"
}
</style>
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

            <div id="user-data" data-user-id="{{ session('UserId') }}"></div><!--Fetch userid from seesion-->         

            <div id="skloader-contest"> </div>
            		<!-- progress bar  -->

				<div class="card-point">
				    <div class="row border-bottom result">
				        <div class="col-xs-6 text-center border-right">
				            <span class="fs-14 text-center" id="totalPointTxt"> {{ trans('lang.Total Points Win') }} </span>
				        </div>
				        <div class="col-xs-6 text-center">
				            <span class="value fs-14 fw-bold">
				                <img src="{{ asset('assets/img/icon-timeline/point-icon.svg')}}" class="point-icon" alt="" id="pointIcn">
				                <div class="fw-bold m" id="point">
				                   {{isset($user['coins'])?$user['coins']:'0'}} {{ trans('lang.points') }}
				                </div>
				            </span>
				        </div>
				    </div>
				    <div class="row progress-point">
				        <div class="col-xs-8">
				            <div class="progress">
				                <div class="progress-bar" id="questionBar"role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
				                </div>
				            </div>
				        </div>
				        <div class="col-xs-4">
				            <span class="progress-text" id="progress">1</span> <span class="text-muted" id="totalQuestion"> /6 {{ trans('lang.predicted') }} </span>
				        </div>
				    </div>
				</div>

				<!--------------------- Answer review section ------------------------------------------>
		    <div class="answer-review" id="review-section" style="display: none;" >
		        <!-- The dynamically generated review content will be appended here -->
                <div class="text-center">
                    <img src="{{asset('images/loader-img.gif')}}" style="width: 20%;">
                    <h2 class="text-center  fw-bold fs-25" id="title"> Please Wait........ </h4>         
                </div>	


        </div>


	    
		</div>

<!----------------------- Prediction Question ----------------------------------------->
	<div class="questions-container" id="questions-container">
	    @foreach ($questions as $question)
	    <div class="question" data-question-id="{{ $question->id }}" data-type="{{ $question->question_type }}"  data-prediction-id="{{$competitions['id'] }}"
	      data-home-team-logo="{{ $competitions['home_team_logo'] }}"
	      data-away-team-logo="{{ $competitions['away_team_logo'] }}" 
	      data-home-short-code="{{ isset($competitions['home_short_code']) ? $competitions['home_short_code'] : strtoupper(substr($competitions['home_team_name'], 0, 3)) }}" 
     	  data-away-short-code="{{ isset($competitions['away_short_code']) ? $competitions['away_short_code'] : strtoupper(substr($competitions['away_team_name'], 0, 3)) }}"
	       style="display: none;">
	        <div class="p-2 text-center">
	            <h3 class="text-purple my-1 font-weight-normal" id="questionText">{{ $question->question }}</h3>
	        </div>
	        <!-- <div class="prediction-wrapper bg-white mb-1"> -->
	            @if ($question->question_type === 1)

	             @include('contest.question1', ['qId' => $question, 'competitions' => $competitions])
	       
					
	            @elseif ($question->question_type === 3)  <!--type =2 2 options-->

	             @include('contest.question3', ['qId' => $question, 'competitions' => $competitions])

	            @elseif($question->question_type === 2) 

	             @include('contest.question2', ['qId' => $question, 'competitions' => $competitions])

	    		@endif
	    <!-- </div>	 -->
		</div>
	    @endforeach

	</div>

<!----------------------------------Prediction Questions End------------------------- -->




<div class="mt-20 statistic">
    <button class="btn btn-lg w-100 btn-dark action-stats" type="button" id="statisticBtn"> <img src="{{ asset('assets/img/icon-timeline/statistic.svg')}}" class="mr-1" alt="">{{ trans('lang.View Statistics') }}
        <span class="caret"></span>
    </button>
    <div class="mt-20 collapse" id="collapseExample">
        <div class="well">
            <!-- Place your statistic buttons inside this div -->
            <!-- <div class="col-xs-12 main-cat lm" style="padding-top: 10px; padding-bottom: 10px; margin-bottom: 36px; display: flex;justify-content: center;"> -->
                <a id="headToHeadBtn" style="background-color: #898989;
                    padding: 10px 12px;
                    border-radius: 5px;
                    color: #fff;
                    display: block;
                    text-align: center;
                    font-size: 15px;
                    font-weight: bold;
                    letter-spacing: 0.5px;
                    height: 41px;
                    margin-right: 33px">{{ trans('lang.Head to Head') }}</a>
                <a id="predictBtn" style="background-color: #898989;
                    padding: 10px 12px;
                    border-radius: 5px;
                    color: #fff;
                    display: block;
                    text-align: center;
                    font-size: 15px;
                    font-weight: bold;
                    letter-spacing: 0.5px;
                    height: 41px;">{{ trans('lang.Prediction') }}</a>
            <!-- </div> -->
        </div>
    </div>
</div>

<script>

</script>

	
	
<!--------------------------- head to head ------------------------------->
	<div id="h2h-tab" style="padding: 11px">
		<input type="hidden" name="match_id" value="{{$competitions['match_id']}}">
        <input type="hidden" name="homeTeamId" value="{{$competitions['home_team_id']}}">
        <input type="hidden" name="awayTeamId" value="{{$competitions['away_team_id']}}">
			  <div class="tab-pane fade p-3 in" id="head2head" aria-labelledby="head2head-tab">
                        <h4 style="font-weight: 700;font-size: 16px;margin-left: 11px" id="title">{{ trans('lang.Head to Head') }}</h4>
						<div class="liner"></div>

						<table class="table table-striped mb-10 text-small">
						<tbody>
							<tr>
							<td width="" class="text-left">
						<img src="{{$competitions['home_team_logo']}}" height="50" alt="" id="hClubImg">
					 </td>
					 <td width="" class="text-center bdr1"> <span class="ctr" id="wins"></span>{{ trans('lang.Wins') }}</td>
                     <td width="" class="text-center bdr1"><span class="ctr" id="draw"></span>{{ trans('lang.Draw') }}</td>
                     <td width="" class="text-center"><span class="ctr" id="loss"></span>{{ trans('lang.Wins') }}</td>

					<td width="" class="text-right">
						<img src="{{$competitions['away_team_logo']}}" height="50" alt="" id="aClubImg">
					</td>
				</tr>
			</tbody>
		</table>

						<div className="widget-content">
                            <div className="widget-content-wrapper" style="display: flex ; align-items: center";>
                                <div className="widget-content-left">
                                    <div className="widget-numbers fsize-3 text-win" id="hGoals"style="margin-left: 17px; font-weight: 400;font-size: 17px;"></div>
                                </div>
                                <div className="widget-content-middle" style="margin: auto">
                                    <div className="widget-numbers fsize-3 text-muted" style="font-weight: 400;font-size: 17px;color: gray;" id="goalScoreTitle">{{ trans('lang.GOALS SCORED') }}</div>
                                </div>
                                <div className="widget-content-right">
                                    <div className="widget-numbers fsize-3 text-lose" id="aGoals"style="margin-right: 17px; font-weight: 400 ;font-size: 17px;"></div>
                                </div>
                            </div>
                        </div>
						<div class="progress-bar-sm progress-bar-animated-alt progress">
						    <div class="progress-bar bg-win" id="homegoals" role="progressbar" aria-valuemin="0" aria-valuemax="100">
						    </div>
						    <div class="progress-bar bg-lose" id="awaygoals" role="progressbar" aria-valuemin="0" aria-valuemax="100">
						    </div>
						</div>



                        <table class="table table-striped custab mb-10">
                            <tbody id="matchHead">

                            </tbody>
                        </table>

                    </div>
			  <!-- ----------------------head to head end------------------------------->


	<!-- Home team last match -->
		
			<div class="col-xs-12 pd-0" style="float: left; margin-left: 3%; width:94%; margin-bottom: 10px" >
				<div class="col-md-12 pd-0"> 
					<div class="col-xs-12 pd-0" style="margin-left: -9px">
                        <h4 class="inline"><b style="color:black" id="lastMatchTitle">{{ trans('lang.Last Match') }} </b> </h4>					</div>
				<img id="clubImg" src="{{$competitions['home_team_logo']}}" alt="" style="height: 28px; width: 28px; margin-bottom: 5px;">
				 <strong id="clubName">{{$competitions['home_team_name']}}</strong>
				@if(isset($H_lastmatches))
			    @foreach($H_lastmatches as $leagueName => $matches)
			        @foreach($matches as $match)
			            @if($match['winnerTeamId'] == $competitions['home_team_id'])
			                <div>
			                    <div class="bdstat win" style="float: right; border-radius: 15px;" id="form">W</div>
			                </div>
			            @elseif($match['winner_status'] == '2')
			                <div>
			                    <div class="bdstat draw" style="float: right; border-radius: 15px;" id="form">D</div>
			                </div>
			            @else
			                <div>
			                    <div class="bdstat lose" style="float: right; border-radius: 15px;" id="form">L</div>
			                </div>
			            @endif
			        @endforeach
			    @endforeach
				@endif
			</div>
		</div>
		<div class="liner"></div>


			@if(isset($H_lastmatches))
    		@foreach($H_lastmatches as $leagueName => $matches)
				<h5 id="league">{{$leagueName}}</h5>
				<table class="table table-striped custab mb-10">
                    <tbody>
                    @foreach($matches as $match)
                      <tr>
                      <td style="display: flex;align-items:center">
                        <div class="col-xs-1 pd-0">
                            <img src="{{ $match['home_logo'] }}" style="height: 27px; display:flex;align-items: center" id="lClubImg">
                        </div>
                        <div class="col-xs-3 pd-0">
                            <p class="ml-1" id="lClubName" style="line-height: normal;">{{ $match['homeTeam_name'] }} </p>
                        </div>

                        <div class="col-xs-4 plr5 text-center">
                                <time datetime="" style="color: #999999" id="lastMatchDate">
                                    {{ date('D,d/m/y', strtotime($match['date_time'])) }}
                               </time>
                           
                            <br>
                            <strong  id="lastMatchScore">
                                @if($match['homeTeam_score'] > $match['awayTeam_score'])
                                <span style="color: green;">{{$match['homeTeam_score']}}</span> - <span style="color: red;">{{$match['awayTeam_score']}}</span>
                                @elseif($match['homeTeam_score'] < $match['awayTeam_score'])
                                <span style="color: red;">{{$match['homeTeam_score']}}</span> - <span style="color: green;">{{$match['awayTeam_score']}}</span>
                                @else
                                <span style="color: gray;">{{$match['homeTeam_score']}}</span> - <span style="color: gray;">{{$match['awayTeam_score']}}</span>
                                @endif
                               </strong>
                        </div>
                        
                        <div class="col-xs-3 pd-0">
                            <p  id="rClubName" style="line-height: normal;">{{ $match['awayTeam_name'] }}</p>
                        </div>

                        <div class="col-xs-1 pd-0">
                            <img src="{{ $match['away_logo'] }}" style="height: 27px;" id="rClubImg">
                        </div>
                      </td>
                </tr>
              @endforeach   
                </tbody>
            </table>
		    @endforeach
		@endif



			<!-- Away team last match -->


	
		<div class="col-xs-12 pd-0" style="float: left; margin-left: 3%; width:94%; margin-bottom: 10px  ">
				<div class="col-md-12 pd-0"> 
					<div class="col-xs-12 pd-0" style="margin-left: -9px">
                        <h4 class="inline"><b style="color:black" id="lastMatchTitle">{{ trans('lang.Last Match') }} </b> </h4> 					</div>
				<img src="{{$competitions['away_team_logo']}}" alt="" style="height: 28px; width: 28px; margin-bottom: 5px;">
				 <strong>{{$competitions['away_team_name']}}</strong>

				@if(isset($A_lastmatches))
			    @foreach($A_lastmatches as $leagueName => $matches)
			        @foreach($matches as $match)
			            @if($match['winnerTeamId'] == $competitions['away_team_id'])
			                <div>
			                    <div class="bdstat win" style="float: right; border-radius: 15px;">W</div>
			                </div>
			            @elseif($match['winner_status'] == '2')
			                <div>
			                    <div class="bdstat draw" style="float: right; border-radius: 15px;">D</div>
			                </div>
			            @else
			                <div>
			                    <div class="bdstat lose" style="float: right; border-radius: 15px;">L</div>
			                </div>
			            @endif
			        @endforeach
			    @endforeach
				@endif
			</div>
		</div>
		<div class="liner"></div>
			@if(isset($A_lastmatches))
    		@foreach($A_lastmatches as $leagueName => $matches)
				<h5>{{$leagueName}}</h5>
				<table class="table table-striped custab mb-10">
                    <tbody>
                    @foreach($matches as $match)
                      <tr>
                      <td style="display: flex;align-items:center">
                        <div class="col-xs-1 pd-0">
                            <img src="{{ $match['home_logo'] }}" style="height: 27px; display:flex;align-items: center" id="lClubImg">
                        </div>
                        <div class="col-xs-3 pd-0">
                            <p class="ml-1" id="lClubName" style="line-height: normal;">{{ $match['homeTeam_name'] }} </p>
                        </div>

                        <div class="col-xs-4 plr5 text-center">
                                <time datetime="" style="color: #999999" id="lastMatchDate">
                                    {{ date('D,d/m/y', strtotime($match['date_time'])) }}
                               </time>
                           
                            <br>
                            <strong  id="lastMatchScore">
                                @if($match['homeTeam_score'] > $match['awayTeam_score'])
                                <span style="color: green;">{{$match['homeTeam_score']}}</span> - <span style="color: red;">{{$match['awayTeam_score']}}</span>
                                @elseif($match['homeTeam_score'] < $match['awayTeam_score'])
                                <span style="color: red;">{{$match['homeTeam_score']}}</span> - <span style="color: green;">{{$match['awayTeam_score']}}</span>
                                @else
                                <span style="color: gray;">{{$match['homeTeam_score']}}</span> - <span style="color: gray;">{{$match['awayTeam_score']}}</span>
                                @endif
                               </strong>
                        </div>
                        
                        <div class="col-xs-3 pd-0">
                            <p  id="rClubName" style="line-height: normal;">{{ $match['awayTeam_name'] }}</p>
                        </div>

                        <div class="col-xs-1 pd-0">
                            <img src="{{ $match['away_logo'] }}" style="height: 27px;" id="rClubImg">
                        </div>
                      </td>
                </tr>
              @endforeach   
                </tbody>
            </table>
    @endforeach
	@endif
</div>

<!-- ---------------------prediction tab--------------------------->

                    <div class="tab-pane fade p-3 in" id="predic-tab" aria-labelledby="prediction-tab" >		
                        <div class="lm prediction_list" style="padding: 10px; height: auto;">
                        <div class="widget-content">
                            <div class="widget-content-outer">
                                
                                            {{-- <div class="col-xs-4">
                                                <div class="text-muted opacity-6" id="hclubWin">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}}</div>
                                                <div class="widget-numbers fsize-3 text-win" id="hclubWinPercentage">{{(isset($details['probability']['predictions']['home']) ? $details['probability']['predictions']['home']: '')}}%</div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="text-muted opacity-6" id="draw">{{ trans('lang.Draw') }}</div>
                                                <div class="widget-numbers fsize-3 text-muted" id="drawPercentage">{{(isset($details['probability']['predictions']['draw']) ? $details['probability']['predictions']['draw']: '')}}%</div>

                                            </div>
                                            <div class="col-xs-4">
                                                <div class="text-muted opacity-6" id="aClubWin">{{(isset($details['awayTeam']['name']) ? $details['awayTeam']['name']: '')}}</div>
                                                <div class="widget-numbers fsize-3 text-lose" id="aClubWinPercentage">{{(isset($details['probability']['predictions']['away']) ? $details['probability']['predictions']['away']: '')}}% </div>
                                            </div> --}}
                                            
                                 <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="text-muted opacity-6" id="hclubWin">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}}</div>
                                        <div class="widget-numbers fsize-3 text-win" id="hclubWinPercentage">{{(isset($details['probability']['predictions']['home']) ? $details['probability']['predictions']['home']: '')}}%</div>
                                    </div>
                                    <div class="widget-content-middle">
                                        <div class="text-muted opacity-6" id="draw">{{ trans('lang.Draw') }}</div>
                                        <div class="widget-numbers fsize-3 text-muted" id="drawPercentage">{{(isset($details['probability']['predictions']['draw']) ? $details['probability']['predictions']['draw']: '')}}%</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="text-muted opacity-6" id="aClubWin">{{(isset($details['awayTeam']['name']) ? $details['awayTeam']['name']: '')}}</div>
                                        <div class="widget-numbers fsize-3 text-lose" id="aClubWinPercentage">{{(isset($details['probability']['predictions']['away']) ? $details['probability']['predictions']['away']: '')}}% </div>
                                    </div>
                                </div>
                                <div class="widget-progress-wrapper mt-1">
                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                        <div class="progress-bar bg-win" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['home']) ? $details['probability']['predictions']['home']: '')}}%;"></div>
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['draw']) ? $details['probability']['predictions']['draw']: '')}}%;"></div>
                                        <div class="progress-bar bg-lose" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['away']) ? $details['probability']['predictions']['away']: '')}}%;"></div>
                                    </div>
                                </div>
                            </div>
                            <h4 id="dataTxt">{{ trans('lang.Data') }} </h4>
                            <div class="liner"></div>
                            <div style="border: none;">
                                <div>
                                    <div aria-expanded="true" style="padding: 0px;">
                                    <h4 class="title-pred" data-toggle="collapse" data-target="#pred1" id="predictionTxt">{{ trans('lang.Predictions') }} <i class="fa fa-arrow-circle-down pull-right"></i></h4>
                                    </div>
                                </div>
                            </div>
                            <div>
                            <div class="">
                                <div class="widget-content">
                                    <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                        <div class="text-muted opacity-6" id="bothTeamToScoreTxt">{{ trans('lang.Both Team To Score') }}</div>
                                        </div>
                                        <div class="widget-content-middle">
                                            <div class="text-muted opacity-6"></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="text-muted opacity-6" id="noScoreTxt">{{ trans('lang.No Score') }}</div>
                                        </div>
                                    </div>
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-numbers fsize-3 text-win2" id="bothTeamToScorePercentage">{{(isset($details['probability']['predictions']['btts']) ? $details['probability']['predictions']['btts']: '')}}%</div>
                                        </div>
                                        <div class="widget-content-middle">
                                            <div class="widget-numbers fsize-3 text-muted"></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers fsize-3 text-lose2" id="noScorePercentage">{{(isset($details['probability']['predictions']['btts']) ? 100-$details['probability']['predictions']['btts']: '')}}</div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper mt-1">
                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                            <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['btts']) ? $details['probability']['predictions']['btts']: '')}}%;"></div>
                                            <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['btts']) ? 100-$details['probability']['predictions']['btts']: '')}}%;"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 pd-0 mt-10">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-6" id="scoreProbability">{{ trans('lang.Score Probability') }}</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="text-muted opacity-6"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <table class="table table-striped custab mb-10">
                                        <tbody>
                                        @if (isset($details['probability']['predictions']['correct_score']))
                                        @foreach ($details['probability']['predictions']['correct_score'] as $key => $score )

                                        <tr class="listing">
                                            <td width="60%" class="text-spec">
                                                <div class="col-xs-6 pd-0">
                                                    <p class="">
                                                        <img src="{{(isset($details['homeTeam']['logo_path']) ? $details['homeTeam']['logo_path']: '-')}}" alt="" style="height: 15px; width: 11px; margin: 1px;"><strong style="margin-left: 5px;">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}}</strong>
                                                    </p>
                                                    <p class="">
                                                        <img src="{{(isset($details['awayTeam']['logo_path']) ? $details['awayTeam']['logo_path']: '-')}}" alt="" style="height: 15px; width: 11px; margin: 1px;"><strong style="margin-left: 5px;">{{(isset($details['awayTeam']['name']) ? $details['awayTeam']['name']: '')}}</strong>
                                                    </p>
                                                </div>
                                                <div class="col-xs-1">
                                                    <p class="text-left" style="padding-top: 15px; text-align: right;">{{isset($score) ? explode('-',trim($key))[0] :'-'}}</p>
                                                    <p class="text-left" style="padding-top: 15px; text-align: right;">{{isset($score) ? explode('-',trim($key))[1]: '-'}}</p>
                                                </div>
                                            </td>
                                            <td width="" class="text-center">
                                                <div class="widget-content">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers text-win">{{(isset($score) ? $score: '-')}}</div>
                                                        </div>
                                                        <div class="widget-content-middle">
                                                            <div class="widget-numbers text-muted"></div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="widget-numbers text-lose">{{(isset($score) ?(100- $score): '-')}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="progress-bar-sm progress-bar-animated-alt progress mb-0">
                                                    <div class="progress-bar bg-win" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" style="width:{{(isset($score) ? $score: '-')}}%;"></div>
                                                    <div class="progress-bar bg-default" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width:{{(isset($score) ?(100- $score): '-')}}%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="text-muted opacity-6">{{ trans('lang.Under 2 Goals') }}</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="text-muted opacity-6"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6">{{ trans('lang.Over 3 Goals') }}</div>
                                            </div>
                                        </div>
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['under_2_5']) ? $details['probability']['predictions']['under_2_5']: '')}}%</div>
                                            </div>
                                            <div class="widget-content-middle">
                                                <div class="widget-numbers fsize-3 text-muted"></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['over_2_5']) ? $details['probability']['predictions']['over_2_5']: '')}}% </div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper mt-1">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['under_2_5']) ? $details['probability']['predictions']['under_2_5']: '')}}%;"></div>
                                                <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['over_2_5']) ? $details['probability']['predictions']['over_2_5']: '')}}%;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" ">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="text-muted opacity-6">{{ trans('lang.3 or Less Goals') }}</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">{{ trans('lang.4 or More Goals') }}</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['under_3_5']) ? $details['probability']['predictions']['under_3_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['over_3_5']) ? $details['probability']['predictions']['over_3_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['under_3_5']) ? $details['probability']['predictions']['under_3_5']: '')}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['over_3_5']) ? $details['probability']['predictions']['over_3_5']: '')}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br> {{ trans('lang.No Score') }}</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">{{(isset($details['homeTeam']['name']) ? $details['homeTeam']['name']: '')}} <br> {{ trans('lang.Score At Least 1') }} </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['HT_under_0_5']) ? $details['probability']['predictions']['HT_under_0_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['HT_over_0_5']) ? $details['probability']['predictions']['HT_over_0_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['HT_under_0_5']) ? $details['probability']['predictions']['HT_under_0_5']: '')}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: {{(isset($details['probability']['predictions']['HT_over_0_5']) ? $details['probability']['predictions']['HT_over_0_5']: '')}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="text-muted opacity-6">{{(isset($details['awayTeam']['name']) ? $details['awayTeam']['name']: '')}} <br>{{ trans('lang.No Score') }}</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="text-muted opacity-6"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">{{(isset($details['awayTeam']['name']) ? $details['awayTeam']['name']: '')}} <br>{{ trans('lang.Score At Least 1') }} </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-win2">{{(isset($details['probability']['predictions']['AT_over_0_5']) ? $details['probability']['predictions']['AT_over_0_5']: '')}}%</div>
                                                    </div>
                                                    <div class="widget-content-middle">
                                                        <div class="widget-numbers fsize-3 text-muted"></div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers fsize-3 text-lose2">{{(isset($details['probability']['predictions']['AT_under_0_5']) ? $details['probability']['predictions']['AT_under_0_5']: '')}}% </div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-win2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{isset($details['probability']['predictions']['AT_over_0_5']) ? $details['probability']['predictions']['AT_over_0_5']: ''}}%;"></div>
                                                        <div class="progress-bar bg-lose2" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: {{isset($details['probability']['predictions']['AT_under_0_5']) ? $details['probability']['predictions']['AT_under_0_5']: ''}}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>



		  	</div>
		    <div class="clearfix"></div>
<audio id="audio_correct" src="{{ asset('audio/Football_Logo_1.mp3') }}" preload="auto" autoplay></audio>




    @include('partials.footernew')
<script>
    var translations = {
        'lets_play': '{{ trans('lang.Lets Play') }}',
        'match_result': '{{ trans('lang.Match Result') }}',
        'coming_soon': '{{ trans('lang.Coming Soon') }}',
        'prediction_result': '{{ trans('lang.Prediction Result') }}',
        'who_play': '{{ trans('lang.See Who Play') }}',
        'total_point_win': '{{ trans('lang.The total points that can be won') }}',
        'no_players':'{{ trans('lang.No players Found') }}',
        'start': '{{ trans('lang.Start') }}',
        'end': '{{ trans('lang.End') }}',
        'custom_match_result': '{{ trans('lang.Match Result') }}'
    };
</script>
<script src="{{ asset('assets/js/contest.js') }}"></script>
<script src="{{ asset('assets/js/Prediction.js') }}"></script>


</body>
</html>