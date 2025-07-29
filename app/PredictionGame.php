<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PredictionGame extends Model
{
    //
    public function scopePreWeekPred($query,$last1, $next1)
	{

        return $query
                    ->where('prediction_start_time', '>=' , $last1)
                    ->where('prediction_start_time', '<=', $next1)
                    // ->where('prediction_type','=', 'weekly')
                    ->orderBy('prediction_start_time', 'asc')
                    ;
	}
    public function scopeFirstQuarterlyPred($query, $quarterly_first_date, $quarterly_last_date)
	{
        return $query
                        ->where('prediction_start_time', '>=' , $quarterly_first_date)
                        ->where('prediction_start_time', '<=', $quarterly_last_date)
                        // ->where('prediction_type','=', 'quarterly')
                        ->orderBy('prediction_start_time', 'asc')
                        ;

		$this->db->select("id");
		$this->db->from("goaly_prediction_game");
		$this->db->where("DATE_FORMAT(goaly_prediction_game.prediction_start_time, '%Y-%m-%d') >=", $quarterly_first_date);
		$this->db->where("DATE_FORMAT(goaly_prediction_game.prediction_start_time, '%Y-%m-%d') <=", $quarterly_last_date);
		$this->db->where("prediction_type", 'quarterly');
		$this->db->order_by('prediction_start_time', 'ASC');
		$this->db->limit(1);
		$q = $this->db->get();
		return $q->num_rows() > 0 ? $q->row() : array();
	}
}
