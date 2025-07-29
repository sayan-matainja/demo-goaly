<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavouriteTeam extends Model
{
    protected $table = 'userfavouriteteams';
    public $timestamps = false;
    //
    public function scopeUserFavourite($query, $UserId){
        return $query->where('user_id','=',$UserId);
    }
}
