<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UserMatchComments extends Model
{
    protected $table = 'user_match_comments';
    protected $fillable = ['comment','match_id','user_id'];

    public function scopeGetUserComments($query, $matchId)
    {
        $lnk = asset('assets/uploads');
        $noImg = asset('/images/leaderboard/user_no_image.png');

        return $query->select([
                'comment',
                'match_id',
                'created_at as c_time',
                \DB::raw("(select concat(first_name, ' ', last_name) from users where id = user_id) as name"),
                \DB::raw("(select img from users where id = user_id) as image")
            ])
            ->where('match_id', $matchId)
            ->orderBy('created_at', 'asc');
            
    }
}

