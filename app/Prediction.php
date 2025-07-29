<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    //
    public function scopeFirst_week_pred($query, $last, $next)
	{
        return $query->where('prediction_start_time', '>=', $last)->where('prediction_start_time', '<=', $next)->where('prediction_type','=', 'weekly')->orderBy('prediction_start_time', 'asc');

	}
}
