@include('partials.header')

</head>

<body>
	<div class="">
    @include('partials.topmenu')

		<div class="clearfix"></div>
		@include('partials.sidebar')

	   <div class="page-content mt-10">
			<!-- Menu Cat -->
			<div class="col-xs-12 main-cat">
				<ul class="nav nav-tabs">
					<li><a href="{{route('home')}}">Home</a></li>
					<li><a href="{{route('contest')}}">Contest</a></li>
					<li class="active"><a href="{{route('matches')}}">Live</a></li>
					<li><a href="{{route('news')}}">News</a></li>
				</ul>
			</div>
		  	<div class="clearfix"></div>
			<!-- Contest Detail -->
			<div class="col-xs-12">
                <div class="row">
                    <div class="col-6">
                        <div class="mt-10 plr15">
                        <div class="card-header tab-card-header" style="overflow: scroll;">
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
                                        <a class="nav-link" id="competition-tab-{{$res['competition_id']}}" onclick="myFunction({{$res['competition_id']}})" data-toggle="tab" href="#competition-{{$res['competition_id']}}" role="tab" aria-controls="competition-{{$res['competition_id']}}" aria-selected="false">
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
                        @else
                        <div class="tab-pane fade p-3" id="competition-{{$res['competition_id']}}" aria-labelledby="competition-tab-{{$res['competition_id']}}">
                        @endif
                        <div class="part">
                                <div class="pt-title">{{$res['competition_name']}}</div>
                                <img class="unite" src="{{('assets/img/slash.png')}}" alt="">
                                <a href="{{route('matches')}}" class="stand btn btn-default chk2">
                                    <i class="fas fa-arrow-left"></i>&nbsp; Back
                                </a>
                                <div class="col-xs-12 mt-10">
                                    <div class="standing">
                                        <h2>{{$res['competition_name']}} Standing</h2>
                                        <table class="table table-striped custab">
                                            <thead>
                                                <tr class="clr-aqua">
                                                    <th>Pos</th>
                                                    <th>Teams</th>
                                                    <th>Pl</th>
                                                    <th>W</th>
                                                    <th>D</th>
                                                    <th>L</th>
                                                    <th>GD</th>
                                                    <th>Pts</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-data-matches-{{$res['competition_id']}}">
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
		  	</div>
		    <div class="clearfix"></div>
        </div>
	</div>
	@include('partials.footer')
    @stack('Standingdata')
    @stack('click')
</body>
</html>
