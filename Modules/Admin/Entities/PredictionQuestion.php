<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class PredictionQuestion extends Model
{
    protected $table ='prediction_question';
    protected $fillable = ['question_type','question','heading','point','created_at','is_active'];

    public function scopeAll($query)
    {
        return $query->get();
    }

    public function scopeDataById($query,$id){

        return $query->where('id',$id)->first();

    }

    public function scopeisActive($query){

        return $query->where('is_active',1)->get();

    }
}
