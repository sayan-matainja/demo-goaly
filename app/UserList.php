<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table = 'user_list';
    public function scopeGeneralleaderboardscore($query)
	{ // 11 Jun 2019
        return $query   ->join('prediction_prizes', 'user_list.id', '=', 'prediction_prizes.pred_id')
                        ->join('prediction_games', 'prediction_prizes.pred_id', '=', 'prediction_games.id')
                        ->where('prediction_prizes.coin_won','!=',0)
                        // ->where('prediction_prizes.user_id','=','user_list.id')
                        ->orderBy('coins', 'desc')
                        ;

	}

}
