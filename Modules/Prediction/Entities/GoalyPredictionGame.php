<?php

namespace Modules\Prediction\Entities;

use Illuminate\Database\Eloquent\Model;

class GoalyPredictionGame extends Model
{
    protected $fillable = ['match_id','league_id','league_name','league_logo','	home_team_id','home_team_name','home_team_logo','score_home','away_team_id','away_team_name','away_team_logo','score_away','match_start_time','status','venue','venue_image','group_name','prediction_type','prediction_start_time','prediction_end_time','is_active','is_end','winner_status'];
}
