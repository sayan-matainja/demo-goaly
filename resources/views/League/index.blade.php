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

            <div class="block">
                <div class="d-flex" style="margin-top: -2.75em;">
                    <span class="btn-lg border btn-white w-100 text-center" id="leagueSelectionTxt"><strong>{{ trans('lang.League Selection') }}</strong></span>
                </div>

                <!-- list league -->
                <div class="container-league">
                    
                    @if(!empty($details))
                        @foreach($details as $league)

                            <a href="{{url('/league/details/'.$league['sportsmonks_id'])}}">
                                <div class="league">
                                    <div class="league-logo border-right">
                                       <!--  @php
                                            $img = $league['old_logo'];
                                            $logo = config('global.sportsMonks_url')."/assets/uploads/leagues/".$img;
                                        @endphp -->
                               <img  id="leagueImg"src="{{ asset('/assets/img/league') .'/' . $league['old_logo'] }}" alt="">
                                        <!-- <img src="{{$logo}}" alt=""> -->
                                    </div>
                                    <div class="league-title">{{$league['competition_name']}}</div>
                                    <span class="league-arrow"></span>
                                </div>
                            </a>
                        @endforeach
                    @endif

                </div>
                <!-- list league -->

            </div>
        </div>
    </div>
    <script type="text/javascript">
        var translations ={
            'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',
        };
    </script>
    @include('partials.footernew')
</body>
</html>
