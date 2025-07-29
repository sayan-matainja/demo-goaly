<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'option_a', 'option_b', 'option_c', 'correct_option','image'];
    protected $table = 'quiz_questions';

    public function scopeisActive($query){
        return $query->where('is_active',1);

    }
}

