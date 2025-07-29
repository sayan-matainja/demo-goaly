<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PlayedPrediction extends Model
{
    protected $table = 'user_played_prediction';
    //


    public function scopeContestHistory($query, $id)
    {
        return $query
            ->select([
                'pred_id',
                DB::raw("CONCAT((SELECT gpg.home_team_name FROM predictions AS gpg WHERE user_played_prediction.pred_id = gpg.id), ' vs ', (SELECT gpg.away_team_name FROM predictions AS gpg WHERE user_played_prediction.pred_id = gpg.id)) AS title"),
                DB::raw("REPLACE(submitted_answer, ':', '-') AS prediction"),
                DB::raw("CASE WHEN (SELECT gpph.coin_won FROM goaly_prediction_prize_history AS gpph WHERE gpph.pred_id = user_played_prediction.pred_id AND gpph.user_id = $id ORDER BY gpph.created_at LIMIT 1) THEN (SELECT gpph.coin_won FROM goaly_prediction_prize_history AS gpph WHERE gpph.pred_id = user_played_prediction.pred_id AND gpph.user_id = $id ORDER BY gpph.created_at LIMIT 1) ELSE '-' END AS coin"),
                DB::raw("CASE WHEN (SELECT winner_status FROM predictions WHERE id = user_played_prediction.pred_id) = 1 THEN CONCAT((SELECT gpg.score_home FROM predictions AS gpg WHERE gpg.id = user_played_prediction.pred_id), ' - ', (SELECT gpg.score_away FROM predictions AS gpg WHERE gpg.id = user_played_prediction.pred_id)) ELSE (SELECT DATE_FORMAT(gpg.prediction_end_time, '%a, %e/%c %h:%i %p') FROM predictions AS gpg WHERE gpg.id = user_played_prediction.pred_id) END AS result"),
                DB::raw("CASE WHEN (SELECT winner_status FROM predictions WHERE id = user_played_prediction.pred_id) = 1 THEN 1 ELSE 0 END AS f"),
            ])
            ->where('user_played_prediction.user_id', $id)
            ->where('user_played_prediction.question_id', 1);// Always check the  question1 id in the predictions_question table
    }

    public function scopeFirstPredDate($query, $userId)
    {
        return $query->select('created_at')
            ->where('user_id', $userId);
           
    }

    public function scopegetWinners($query, $pid)
    {
        return $query->selectRaw("pred_id, user_id,
    SUM(CASE WHEN submitted_answer = (SELECT ans FROM prediction_quiz_answer WHERE prediction_quiz_answer.pred_id = user_played_prediction.pred_id AND ques_id = question_id) 
    THEN (SELECT point FROM prediction_question WHERE prediction_question.id = question_id) ELSE 0 END) AS coins")
    ->where('pred_id', $pid)
    ->groupBy('pred_id', 'user_id');

    }


	public  function  scopeCheckPredictionId($query,$p_id,$u_id){

	return $query->select('*')
				 ->where('user_id', '=', $u_id)
				 ->where('pred_id', '=', $p_id)
				 ->get();
	}


public function scopeParticipateByPrediction($query, $id, $type = 0)
{
     return $query->selectRaw("user_played_prediction.user_id,
            users.msisdn as phone_no,
            CONCAT(users.first_name, ' ', users.last_name) AS name,
            user_played_prediction.pred_id,
            REPLACE(user_played_prediction.submitted_answer, ':', '-') AS prediction,
            user_played_prediction.created_at,
            CASE WHEN predictions.winner_status = 1
                THEN (SELECT coin_won FROM goaly_prediction_prize_history WHERE goaly_prediction_prize_history.user_id = user_played_prediction.user_id AND goaly_prediction_prize_history.pred_id = user_played_prediction.pred_id ORDER BY created_at DESC LIMIT 1)
                ELSE REPLACE(user_played_prediction.submitted_answer, ':', '-')
            END AS pts")
        ->from('user_played_prediction')
        ->join('users', 'users.id', '=', 'user_played_prediction.user_id')
        ->join('predictions', 'predictions.id', '=', 'user_played_prediction.pred_id')
        ->where('user_played_prediction.pred_id', $id)
        ->where('user_played_prediction.question_id', 1)       
        ->orderBy('pts', 'desc')
        ->when($type == 1, function ($query) {
            $query->limit(3);
        })
        ->get();
}





}
