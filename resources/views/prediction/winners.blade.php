@include('partials.header_portal')
</head>

<style>
    .header-winners {
        background-color: #700d7b;
        color: #fff;
        text-align: center;
        padding: 20px 10px 0;
        margin-bottom: 6px;

    }

    .sortmenu {
        padding: 0;
        margin: 0;
        list-style: none;
        display: flex;
        justify-content: space-around;
    }

    .buttonGray,
    .buttonPink {
        height: 40px;
        width: 108px;
        font-weight: 200;
        color: #000 !important;
        font-size: 14px;
        background-color: #e9e9e9;
        border-radius: 7px 7px 0 0;
    }

    .cover-winner {
        display: flex;
        flex-direction: column;
        margin-top: 15px;
        margin-bottom: 8px;

    }

    .winner {
        display: flex;
        background-color: #FFFFFF;
        border: 1pt solid #D5D5D5;
        border-radius: 5px;
        width: 100%;
    }

    .cover-image {
        display: flex;
        align-items: center;
        padding: 10px 1rem;
    }

    .cover-image div {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 120px;
        width: 120px;
        border: 6px solid #D5D5D5;
        border-radius: 50%;
    }

    .cover-image img {
        width: 70%;
    }

    .details {
        display: flex;
        flex: 1 1 auto !important;
        align-items: center;
        padding: 1rem .5rem;
        color: #3C3C3C;
    }

    .details-container {
        display: flex;
        flex-direction: column;
        flex: 1 1 auto !important;
    }

    .details .title {
        margin: 0;
        margin-bottom: .5rem;
        color: #700d7b;
        font-weight: normal;
    }

    .details .icon {
        width: 15%;
    }

    .detail-column {
        display: flex;
        align-items: center;
    }

    .detail-column span {
        flex: 1 1 auto !important;
    }

    .button_width {
        width: 30%;
    }

    .sortmenu {
        padding: 0;
        margin: 0;
        list-style: none;
        display: flex;
        justify-content: space-around;
    }

    .buttonGray {
        background-color: #e9e9e9;
        /* color: white; */
        height: 40px;
        border-radius: 7px 7px 0 0;
        width: 108px;
        font-weight: 200;
        color: black !important;
        font-size: 14px;
    }

    .buttonPink {
        background-color: #e8d5e7;
        /* color: white; */
        height: 40px;
        border-radius: 5px 5px 0 0;
        width: 108px;
        font-weight: 200;
        color: black !important;
        font-size: 14px;
    }

    .row.winners {
        padding-top: 6px;
    }

    .header-winners h4 {
        font-weight: 300;
        margin-bottom: 20px;
        font-size: 18px;
    }

    .buttonGray a {
        color: #000;
    }

    .buttonPink a {
        color: #a09191;
    }
</style>

<body>
    <div class="">
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content mt-10">

            <div style="margin-top:-8px">

                <div class="mb-10">

                    <div class="header-winners">
                        <h4 id="title">{{ trans('lang.WINNERS') }}</h4>
                        <ul class="sortmenu">
                            <button class="buttonGray" id="monthlyTab" style="border:none; width: 41%">
                                <a activekey="Monthly">{{ trans('lang.Monthly') }}</a>
                            </button>
                        </ul>
                    </div>

                    <div class="cover-winner">
                        
@php  $c=1;@endphp;
@if(empty($winners))
@foreach($monthly_prizes as $monthly_prize)                   
                      <!-- without winner -->
                       <div>
                            <div class="winner">
                                <div class="cover-image" id="rewardImg">
                                    <div>
                                <!-- <img src="{{$monthly_prize->prize_image}}" alt=""> -->
                                <img src="{{ isset($monthly_prize->prize_image) ? asset('images/prizeImage/'.$monthly_prize->prize_image) : asset('assets/img/acc-sample.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="details-container">
                                        <h3 class="title" style="border: none;" id="rewardTxt">
                                            {{$c++}}. Prize - .{{$monthly_prize->prize_name}}
                                        </h3>
                                        <div class="detail-column">
                                            <div class="icon" id="dateIcn" >
                                                <img src="/assets/img/clock.svg" alt="" class="mr-2">
                                            </div>
                                            <span style="font-size: 14px;" id="date">
                                           <img src="{{asset('images/prizeImage/clock.svg')}}"/>
                                           {{ date('Y/m/d', strtotime('last week monday')) }} - {{ date('Y/m/d', strtotime('last week saturday')) }}

                                            </span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
@endforeach

                       <!---- with winner  ---->
@endif

@if(isset($winners))
@foreach($winners as $winner)
                        <div class="winner">
                                    <div class="cover-image" id="rewardImg">
                                        <div>
                                    <img src="{{asset('images/prizeImage/'.$winner['prize_image']) }}" alt="" />
                                             
                                                
                                        </div>
                                    </div>
                                    <div class="details">
                                        <div class="details-container">
                                            <h3 class="title" style="border': none" id="rewardTxt">{{$winner['rank']}}. {{$winner['prize_name']}}</h3>
                                            <div class="detail-column">
                                                <div class="icon" id="winnerIcn">
                                                    <img src="{{asset('images/prizeImage/person.svg')}}" alt="" class="mr-2" />
                                                    </div>
                                                <span id="winner">{{ isset($winner['name']) ?$winner['name'] :$winner['msisdn'] }}</span>
                                            </div>
                                            <div class="detail-column">
                                                <div class="icon" id="pointIcn">
                                                <img src="{{asset('images/prizeImage/coins.svg')}}" alt="" class="mr-2" /></div>
                                                <span id="point">{{$winner['points']}} points</span>
                                            </div>
                                            <div class="detail-column">
                                                <div class="icon" id="dateIcn">
                                                    <img src="{{asset('images/prizeImage/clock.svg')}}" alt="" class="mr-2" />
                                                </div>
                                                <span style="fontSize: 14px" id="date">   {{ date('Y/m/d', strtotime($winner['start_date'])) }} - {{ date('Y/m/d', strtotime($winner['end_date'])) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

@endforeach
@endif
                    </div>





<script >
    var translations ={
            'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',
        };
</script>

                    @include('partials.footernew')



</body>

</html>
