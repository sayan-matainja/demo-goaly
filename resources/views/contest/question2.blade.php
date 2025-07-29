<section id="possession">
    <div class="card-submit">
        <div class="icon-question">
            <img src="{{ asset('assets/img/icon-timeline/kicking-ball.svg')}}" class="icons" alt="">
        </div>
        <div class="date" id="matchDetail">
            @php
            $matchTime = $competitions['match_time'];
            $formattedDate = date('d/m/Y', strtotime($matchTime));
            @endphp
             {{substr($competitions['match_time_bar'], 0, 3)}}, {{ $formattedDate }}, {{ $competitions['venue'] }}
        </div>
        <div class="row custom-gutter">
            <div class="col-xs-6">
                <label class="custom-label">

                    <input type="radio" name="goal_{{ $question->id }}" value="1" class="card-input-element">

                    <div class="card-input">
                        <div class="logo-club">
                            <img src="{{$competitions['home_team_logo']}}" class="logos" alt="">
                        </div>
                        <div class="text-center name-club">
                            {{$competitions['home_short_code']}}
                        </div>
                    </div>
                </label>
            </div>
            <div class="col-xs-6">
                <label class="custom-label">

                    <input type="radio" name="goal_{{ $question->id }}" value="2" class="card-input-element">

                    <div class="card-input">
                        <div class="logo-club">
                            <img src="{{$competitions['away_team_logo']}}" class="logos" alt="">
                        </div>
                        <div class="text-center name-club">
                            {{$competitions['away_short_code']}}
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <div class="row custom-gutter mt-20">
             <div class="col-xs-3">
                        <a href="javascript:void(0)" class="btn btn-lg btn-light w-100 back-question" data-prev="{{ $question->id - 1 }}" id="previousBtn"> <img src="{{ asset('assets/img/icon-timeline/back.png')}}" alt=""> </a>
                    </div>
        
            <div class="col-xs-9">
                 <button type="button" class="btn btn-lg btn-primary w-100 next-question" style="font-size: 12pt;" data-next="{{ $question->id + 1 }}" id="submitBtn">
               SUBMIT ANSWER 
              </button>
            </div>
        </div>
    </div>



</section>