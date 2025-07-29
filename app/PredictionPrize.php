<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PredictionPrize extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(UserList::class, 'user_id', 'id');
    }
    public function scopeWin($query)
    {
        return $query->where('coin_won', '!=', 0);

    }
    public function scopePredHistory($query,$id)
	{
        return $query->where('user_id','=', $id)
                     ->join('prediction_games', 'prediction_prizes.pred_id', '=', 'prediction_games.id')
                     ;

	}
	public function scopeget_weekly_pred_history($query, $id, $last, $next)
	{
		//echo $id;die("in model");
        return $query
                     ->where('user_id','=', $id)
                     ->where('prediction_games.match_start_time', '>=' , $last)
                     ->where('prediction_games.match_start_time', '<=', $next)
                     ->where('pred_type','=', 'weekly')
                     ->join('prediction_games', 'prediction_prizes.pred_id', '=', 'prediction_games.id')
                     ;

	}
    
    public function scopeMonthlyPredHistory($query, $id, $firstday, $lastday)
	{
        // $id= 316;
        return $query
                        ->where('prediction_prizes.user_id','=', $id)
                        ->where('prediction_games.match_start_time', '>=' , $firstday)
                        ->where('prediction_games.match_start_time', '<=', $lastday)
                        ->where('pred_type', '=' ,'monthly')
                        ->join('prediction_games', 'prediction_prizes.pred_id', '=', 'prediction_games.id')
                        ;
		$this->db->select("$id as user_id,goaly_prediction_game.id,
							goaly_prediction_game.match_start_time,
							goaly_prediction_game.home_team_name as homeTeamName,
							goaly_prediction_game.home_team_logo as homeTeamLogo,
							goaly_prediction_game.away_team_name as awayTeamName,
				 			goaly_prediction_game.away_team_logo as awayTeamLogo,
				 			goaly_prediction_game.score_away as awayTeamScore,
							goaly_prediction_game.score_home as homeTeamScore,
							goaly_prediction_prize_history.coin_won,
				 			goaly_prediction_prize_history.created_at as history_createdAt");
		$this->db->from("goaly_prediction_prize_history");
		$this->db->where('goaly_prediction_prize_history.user_id', $id);
		$this->db->where("DATE_FORMAT(goaly_prediction_game.match_start_time, '%Y-%m-%d') >=", $firstday);
		$this->db->where("DATE_FORMAT(goaly_prediction_game.match_start_time, '%Y-%m-%d') <=", $lastday);
		$this->db->where("pred_type", 'monthly');
		$this->db->join('goaly_prediction_game', 'goaly_prediction_prize_history.pred_id=goaly_prediction_game.id', 'LEFT');
		$q = $this->db->get();
		return $q->num_rows() > 0 ? $q->result_array() : array();
	}
}
