<?php

namespace Modules\Admin\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Leagues extends Model
{
    protected $table = 'leagues';
    protected $fillable = ['order','id','competition_name','competition_id','old_logo','white_logo','pos','sportsmonks_id'];
    public function scopeAll($query)
    {
        return $query->get();
    }

    public static function getAllLeagues(){

        return $quary = DB::table('leagues')->select('*')->get()->toarray();;
 
    }

    public static function getLeagueData($id){

        return $quary = DB::table('leagues')->select('*')->where('sportsmonks_id',$id)->first();
 
    }
}
 