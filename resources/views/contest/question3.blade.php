<section id="goal">

    <div class="card-submit">
        <div class="icon-question">
            @switch($question->id)
                @case(2)
                    <img src="{{ asset('assets/img/icon-timeline/ball.svg') }}" class="icons" alt="">
                    @break
                @case(3)
                    <img src="{{ asset('assets/img/icon-timeline/Yellow-Card.svg') }}" class="icons" alt="">
                    @break
                @case(5)
                    <img src="{{ asset('assets/img/icon-timeline/substitute.svg') }}" class="icons" alt="">
                    @break
                @case(6)
                    <img src="{{ asset('assets/img/icon-timeline/Red-Card.svg') }}" class="icons" alt="">
                    @break
                @default
                    <!-- Default content or image if $question->id doesn't match any case -->
            @endswitch
    </div>

        <div class="date" id="matchDetail">
            @php
            $matchTime = $competitions['match_time'];
            $formattedDate = date('d/m/Y', strtotime($matchTime));
            @endphp
             {{substr($competitions['match_time_bar'], 0, 3)}}, {{ $formattedDate }}, {{ $competitions['venue'] }}
        </div>
        <div class="row custom-gutter">
            <div class="col-xs-4">
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
            <div class="col-xs-4">
                <label class="custom-label">

                    <input type="radio" name="goal_{{ $question->id }}" value="2" class="card-input-element">

                    <div class="card-input">
                        <div class="logo-club">
                            <img src="{{$competitions['away_team_logo']}}"class="logos" alt="">
                        </div>
                        <div class="text-center name-club">
                            {{$competitions['away_short_code']}}
                        </div>
                    </div>
                </label>
            </div>
            <div class="col-xs-4">
                <label class="custom-label">

                    <input type="radio" name="goal_{{ $question->id }}" value="3" class="card-input-element">

                    <div class="card-input">
                        <div class="logo-club">
                            <img src="{{ asset('assets/img/icon-timeline/goal.svg')}}" class="logos" alt="">
                        </div>
                        <div class="text-center name-club">
                            Neither
                        </div>
                    </div>
                </label>
            </div>


        </div>
        <div class="row custom-gutter mt-20">
             <div class="col-xs-3">
                <a href="javascript:void(0)" class="btn btn-lg btn-light w-100 back-question" data-prev="{{ $question->id - 1 }}"> <img src="{{ asset('assets/img/icon-timeline/back.png')}}" alt="" id="previousBtn"> </a>
                    </div>
            <div class="col-xs-9">
              <button type="button" class="btn btn-lg btn-primary w-100 next-question" style="font-size: 12pt;" data-next="{{ $question->id + 1 }}" id="submitBtn">
               SUBMIT ANSWER 
              </button>
            </div>
        </div>
    </div>
</section>