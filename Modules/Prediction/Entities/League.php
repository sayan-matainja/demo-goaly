<?php

namespace Modules\Prediction\Entities;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'leagues';
    protected $fillable = ['order','id','competition_name','competition_id','old_logo','white_logo','pos','sportsmonks_id'];
    public function scopeAll($query)
    {
        return $query->get();
    }
}
