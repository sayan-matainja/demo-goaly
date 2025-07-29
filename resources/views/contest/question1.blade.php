

<section id="score">
    <div class="card-submit">
        <div class="icon-question">
            <img src="{{ asset('assets/img/icon-timeline/score.svg')}}" class="icons" alt=""               id="questionIcn">
        </div>
        <div class="date" id="matchDetail">
            @php
            $matchTime = $competitions['match_time'];
            $formattedDate = date('d/m/Y', strtotime($matchTime));
            @endphp
             {{substr($competitions['match_time_bar'], 0, 3)}}, {{ $formattedDate }}, {{ $competitions['venue'] }}
        </div>

        <div class="row center">
            <div class="col-xs-5">
                <div class="card-score">
                    <div class="logo-club">
                        <img src="{{$competitions['home_team_logo']}}" class="logos" alt="">
                    </div>
                    <div class="text-center name-club">
                        {{$competitions['home_short_code']}}
                    </div>
                    <select class="form-control text-center home-score">
                        <option>select</option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-2 text-center">
                <span class="text-white"> VS </span>
            </div>
            <div class="col-xs-5">
                <div class="card-score">
                    <div class="logo-club">
                        <img src="{{$competitions['away_team_logo']}}" class="logos" alt="">
                    </div>
                    <div class="text-center name-club">
                        {{$competitions['away_short_code']}}
                    </div>
                    <select class="form-control text-center away-score">
                        <option>select</option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row custom-gutter mt-20">


            <div class="col-xs-12">
            <button type="button" class="btn btn-lg btn-primary w-100 next-question" style="font-size: 12pt;" data-next="{{ $question->id + 1 }}" id="submitBtn">
               SUBMIT ANSWER 
            </button>
                
            </div>
        </div>
    </div>



</section>