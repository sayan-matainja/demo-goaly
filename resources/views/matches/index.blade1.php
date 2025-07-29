@include('partials.header')
</head>

<!-- <body onload="myFunction()"> -->
	<!--<div id="loader"><div id="spin"></div></div>-->
<body>
<div id="Matches"></div>
	<div class="">
    @include('partials.topmenubar')
		<div class="clearfix"></div>
		@include('partials.sidebar')
	  <div class="page-content">
			<!-- Menu Cat -->
			<div class="col-xs-12 nnav">
				<ul class="nav nav-tabs">
					<li>
						<a href="{{route('home')}}" class="ingrid">
							<i class="far fa-futbol text-center"></i>
							<span class="text-small">Home</span>
						</a>
					</li>
					<li>
						<a href="{{route('contest')}}" class="ingrid">
							<i class="fas fa-history text-center"></i>
							<span class="text-small">Contest</span>
						</a>
					</li>
					<li class="active">
						<a href="{{route('matches')}}" class="ingrid">
							<i class="far fa-clock text-center"></i>
							<span class="text-small">Live</span>
						</a>
					</li>
					<li>
						<a href="{{route('news')}}" class="ingrid">
							<i class="far fa-newspaper text-center"></i>
							<span class="text-small">News</span>
						</a>
					</li>
				</ul>
			</div>
		  	<div class="clearfix"></div>
			<!-- Contest Detail -->
			<div class="col-xs-12">
		  	<div class="row">
			<div class="col-6">
			  <div class="mt-10 plr15">
				<div class="card-header tab-card-header" style="position: relative; width: 100%; overflow: auto; text-align: center; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
				<div >
				<ul class="nav nav-tabs card-header-tabs" id="myleague" role="tablist" style="list-style: none; display: flex; flex-direction: row; margin: 0px; padding: 0px;">

					@foreach ($response as $key=>$res )
					@if ($key==0)
					<li class="nav-item active">
						<a class="nav-link" id="competition-tab-{{$res['competition_id']}}" data-toggle="tab" href="#competition-{{$res['competition_id']}}" role="tab" aria-controls="competition-{{$res['competition_id']}}" aria-selected="true">
						<div class="logo-l"><img src="{{$res['logo']}}" alt=""/> </div>
						</a>
							</li>
					@else
							<li class="nav-item">
								<a class="nav-link" id="competition-tab-{{$res['competition_id']}}" onclick="myFunction({{$res['competition_id']}},1)" data-toggle="tab" href="#competition-{{$res['competition_id']}}" role="tab" aria-controls="competition-{{$res['competition_id']}}" aria-selected="false">
									<div class="logo-l"><img src="{{$res['logo']}}" alt=""/> </div>
								</a>
							</li>
					@endif
					@endforeach
				  </ul>

				  </div>
				</div>


				<div class="tab-content" id="myTabContent">

				  @foreach ($response as $key=>$res )
                         @if ($key==0)
				  <div class="tab-pane fade p-3 active in" id="competition-{{$res['competition_id']}}" aria-labelledby="competition-tab-{{$res['competition_id']}}">
                                    <div class="row mt-10 mb-10">
				  		<div class="col-xs-3 lh24">
							<a class="datetime btn btn-default" onclick="myFunction({{$res['competition_id']}},4)" id="live-{{$res['competition_id']}}"><img src="{{('assets/img/logo-live.png')}}" alt=""></a>
						</div>
						<div class="col-xs-9 text-right">

								<a  class="datetime btn btn-default activ" onclick="myFunction({{$res['competition_id']}},1)" id="previous-{{$res['competition_id']}}">
									Previous
								</a>
								<a  class="datetime btn btn-default" onclick="myFunction({{$res['competition_id']}},2)" id="today-{{$res['competition_id']}}">
									Today
								</a>
								<a  class="datetime btn btn-default" onclick="myFunction({{$res['competition_id']}},3)" id="next-{{$res['competition_id']}}">
									Next
								</a>


						</div>
				  </div>
                  @else
                  <div class="tab-pane fade p-3" id="competition-{{$res['competition_id']}}" aria-labelledby="competition-tab-{{$res['competition_id']}}">
                  <div class="row mt-10 mb-10">
				  		<div class="col-xs-3 lh24">
                          <a class="datetime btn btn-default" onclick="myFunction({{$res['competition_id']}},4)" id="live-{{$res['competition_id']}}"><img src="{{('assets/img/logo-live.png')}}" alt=""></a>
						</div>
						<div class="col-xs-9 text-right">

								<a  class="datetime btn btn-default activ" onclick="myFunction({{$res['competition_id']}},1)" id="previous-{{$res['competition_id']}}">
									Previous
								</a>
								<a  class="datetime btn btn-default" onclick="myFunction({{$res['competition_id']}},2)" id="today-{{$res['competition_id']}}">
									Today
								</a>
								<a  class="datetime btn btn-default" onclick="myFunction({{$res['competition_id']}},3)" id="next-{{$res['competition_id']}}">
									Next
								</a>


						</div>
				  </div>
                  @endif
                  <div class="part">
						<div class="pt-title">{{$res['competition_name']}}</div>
						<img class="unite" src="" alt="">
						<a href="{{route('matches_standing')}}" class="stand btn btn-default chk2">
							<i class="fas fa-table"></i>&nbsp; Standing
						</a>
                        <div class="col-xs-12 mt-10">
							<div class="lm">
                            <table class="table table-striped custab">
								<thead>
									<tr>
										<th><strong>Matches</strong></th>
										<th class="text-center">

											<!--<span class="pull-right text-small">Matchweek 14</span>-->
										</th>

									</tr>
								</thead>
                                <tbody id="table-data-{{$res['competition_id']}}">
                                   <tr class="clickable-row" data-href="{{route('matches_timeline')}}">
									</tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                     </div>
				  </div>
				  @endforeach
			    </div>
			</div>
  </div>
		  	</div>
		    <div class="clearfix"></div>


	  </div>
	</div>
    @include('partials.footer')
    @stack('customjs')
    @stack('click')

</body>
</html>
