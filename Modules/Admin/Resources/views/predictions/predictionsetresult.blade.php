@extends('admin.layout.admin_template')


@section('admin_content')

{{--Set prediction--}}

    <style>
        .title_text {
            font-weight: bold;
        }

        .title-error-div {
            margin-top: 10px;
        }

        .radio-inline {
            margin-right: 20px;
        }
    </style>

<div class="col-xs-12 text-left">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <h5>Set Prediction</h5>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <form name="pred_update" id="pred_update" method="post" enctype="multipart/form-data" action="{{ route('savepredictionresult') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="match_id" value="{{ $match->match_id }}">
        <input type="hidden" name="pred_id" value="{{ $match->id }}">
        <div class="row" style="margin-top:20px;">
            <div class="form-group">
                <div class="col-xs-12 text-left">
                    <label for="game_start" class="title_text">Match Score</label>
                </div>
                <div class="col-xs-12 title-error-div">
                    <label class="radio-inline">
                    <input type="number" name="score_home" value="" placeholder="Home Team" step="1" required>
                    </label>
                    <label class="radio-inline">
                    <input type="number" name="score_away" value="" placeholder="Away Team" required step="1">
                    </label>
                </div>
            </div>
        </div>
        @php $i = 1;$key=0; @endphp
        @foreach ($quizzes as $i => $quiz)
            @if ($quiz->question_type == 1)
                <div class="row" style="margin-top:20px;">
                    <div class="form-group">
                        <div class="col-xs-12 text-left">
                            <label for="game_start" class="title_text">{{ $quiz->question }}</label>
                        </div>
                        <div class="col-xs-12 title-error-div">
                            <input type="text" name="answers[{{ $quiz->id }}]" id="matchscore" class="input-box-extra-small score" value="{{ $answers[$key]['ans'] ?? '' }}" readonly="true">
                        </div>
                        <span id="title-error" class="help-error" style="text-align:center;"></span>
                    </div>
                </div>
               @elseif ($quiz->question_type == 2 || $quiz->question_type == 3)
        <div class="col-xs-12 title-error-div">
            <div class="col-xs-12 text-left">
                <label for="game_start" class="title_text">{{ $quiz->question }}</label>
            </div>
            @php
                $ansValue = isset($answers[$key]['ans']) ? $answers[$key]['ans'] : '';
            @endphp
            <label class="radio-inline">
                <input type="radio" name="answers[{{ $quiz->id }}]" value="1" {{ $ansValue == '1' ? 'checked' : '' }}>
                {{ $match->home_team_name }}
            </label>
            <label class="radio-inline">
                <input type="radio" name="answers[{{ $quiz->id }}]" value="2" {{ $ansValue == '2' ? 'checked' : '' }}>
                {{ $match->away_team_name }}
            </label>
            <label class="radio-inline">
                <input type="radio" name="answers[{{ $quiz->id }}]" value="3" {{ $ansValue == '3' ? 'checked' : '' }}>
                None
            </label>
        </div>
    @endif
            <div class="clearfix"></div>
            @php $i++;$key++; @endphp
        @endforeach

        <div class="row">
            <div class="col-xs-6">
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" name="btn_sub" value="{{ $match->id }}">SAVE</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

