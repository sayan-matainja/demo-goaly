@include('partials.header_portal')
</head>

<body>
	<div class="">
        @include('partials.topmenubar_portal')
		<div class="clearfix"></div>
            @include('partials.sidebar_portal_new')
	  	<div class="page-content mt-10">
  			<div class="part">
		  		<div class="pt-title">{{ trans('lang.Your Account') }}</div>
				<a href="{{route('profile')}}" id="backBtn" class="stand btn btn-default chk2">
					<img src="{{ asset('assets/img/arrow-left-icon.png') }}" style="width: 20px" >
					{{ trans('lang.Back') }}
				</a>
				<div class="col-xs-12 mt-10">
					<div class="standing ct-history">
					  <h2 style="font-weight:bold;" id="title">{{ trans('lang.Your Contests History') }}</h2>
						<table class="table table-striped table-responsive">
						    <tbody>
						        <tr class="clr-aqua">
						            <th id="numberTitle">{{ trans('lang.No') }}</th>
						            <th id="contestTitle">{{ trans('lang.Contest Title') }}</th>
						            <th id="predictionTitle">{{ trans('lang.Prediction') }}</th>
						            <th id="resultTitle">{{ trans('lang.Result') }}</th>
						            <th id="pointTitle">{{ trans('lang.Points') }}</th>
						        </tr>
						        @if(isset($contests))
						            @foreach($contests as $index => $contest)
						                <tr class="wpos">
						                    <td id="number">{{ $index + 1 }}</td>
						                    <td id="contest">{{ $contest['title'] }}</td>
						                    <td id="prediction">{{ $contest['prediction'] }}</td>
						                    <td class="text-red" id="result">{{ $contest['result'] }}</td>
						                    <td id="pointPerContest">{{ $contest['coin'] }}</td>
						                </tr>
						            @endforeach
						        @else
						            <tr class="wpos">
						                <td colspan="5">{{ trans('lang.No Contest Found') }}</td>
						            </tr>
						        @endif
						    </tbody>
						</table>

					</div>
				</div>
				<div class="liner"></div>
				<div class="clearfix"></div>
		  	</div>
	  </div>
	</div>
	@include('partials.footernew')
    @stack('location')
</body>
</html>
