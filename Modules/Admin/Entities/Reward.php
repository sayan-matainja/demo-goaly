<?php

namespace Modules\Reward\Entities;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{

    protected $table = 'rewards';

    protected $fillable = ['id','title','description','reward_image','banner_image', 'coin', 'is_active', 'is_top','date_created', 'click_reward'];

    public function scopeGetAll($query)
    {
        return $query->whereIs_active('1')->get();
    }
    
}
