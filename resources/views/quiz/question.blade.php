@include('partials.header_portal')
<style>
    .quiz-box {
        max-width: 500px;
        margin: 30px auto;
        background-color: #fff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .quiz-progress-bar {
        background-color: #e0e0e0;
        height: 8px;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 15px;
    }

    .quiz-progress-bar-inner {
        height: 100%;
        background-color: green;
        transition: width 0.3s ease;
    }

    .question-img {
        height: 120px;
        object-fit: contain;
        display: block;
        margin: 10px auto 20px;
    }

    .option-btn {
        display: block;
        width: 100%;
        margin-bottom: 10px;
        border: 2px solid #28a745;
        color: #28a745;
        background-color: #fff;
        border-radius: 8px;
        padding: 12px;
        font-size: 16px;
    }

    .option-btn:hover {
        background-color: #28a745;
        color: #fff;
    }

    #question-count {
        font-weight: 500;
        font-size: 14px;
        margin-bottom: 5px;
        color: #6f42c1;
        text-align: right;
    }

    #timer {
        font-size: 14px;
        font-weight: bold;
    }
</style>
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
            <div id="quiz-container">
                <div class="container">
                    <div class="quiz-box">

                        {{-- Progress & Question Counter --}}
                        <div class="text-right mb-2">
                            Question {{ $currentIndex }}/{{ $totalCount }}
                        </div>
                        <div class="quiz-progress-bar">
                            <div class="quiz-progress-bar-inner" style="width: {{ ($currentIndex / $totalCount) * 100 }}%;"></div>
                        </div>


                        {{-- Timer --}}
                        <div id="timer" class="text-danger text-center mb-3">
                            Time Left: <span id="time"></span>
                        </div>

                        {{-- Question Image --}}
                        <img src="{{ $question->image ? asset('images/quizImage/' . $question->image) : asset('images/quizImage/default.png') }}"
                        alt="Question Image"
                        class="question-img">

                        {{-- Question --}}
                        <div class="question mb-4 text-center" data-question-id="{{ $question->id }}">
                            <h4><strong>{{ $question->question }}</strong></h4>
                        </div>

                        {{-- Options --}}
                        <ul class="list-unstyled">
                            @foreach($options as $key => $option)
                            <li>
                                <button class="option-btn" data-option="{{ $key }}">
                                    {{ $option }}
                                </button>
                            </li>
                            @endforeach
                        </ul>

                        {{-- Result Placeholder --}}
                        <div id="result" class="mt-4 text-center" style="display: none;">
                            <h5>Results:</h5>
                            <ul id="result-list" class="list-unstyled"></ul>
                            <button id="next-question" class="btn btn-primary" style="display:none;">Next Question</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
<!---------------------------- Contestent Answer Modal End-------------------------->
@include('partials.footernew')

@if(Session::has('error'))
<script type="text/javascript">
    Swal.fire({
        title: "Error!",
        text: "{{ Session::get('error') }}",
        icon: "error",
        confirmButtonText: "Ok"
    }).then(() => {
        location.reload();
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
        'no_data':'{{trans('lang.No data available')}}'
    };
</script>




<script src="{{ asset('assets/js/quiz.js') }}"></script>





</body>
</html>


