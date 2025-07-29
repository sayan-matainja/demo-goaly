<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Userreward extends Model
{
    protected $table = 'user_reward';

    protected $fillable = ['user_id','reward_id','created_at','is_active','reward_status'];

    public function scopeAll($query)
    {
        return $query->get();
    }

    public function scopeUserRewards($query)
    {
        return $query->join('user_list', 'user_list.id', '=', 'user_reward.user_id')->join('rewards', 'rewards.id', '=', 'user_reward.reward_id');
    }


}
