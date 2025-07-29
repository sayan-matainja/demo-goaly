<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PredictionAnswer extends Model
{
    protected $table = 'prediction_quiz_answer';


     public function scopePredAnswerById($query,$pred_id)
    {
        return $query->where('pred_id',$pred_id)->get();
        
    }
     public static function insertFinalPrediction($data, $id)
{
    
    static::where('pred_id', $id)->delete();

    
    static::insert($data);

    return static::where('pred_id', $id)->count() > 0;
}
















}
