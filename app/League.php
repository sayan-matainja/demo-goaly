<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Common\Utility;
use Illuminate\Support\Facades\DB;

class League extends Model
{
    //

    protected $fillable = ['order','id','competition_name','competition_id','old_logo', 'white_logo',  'pos','sportsmonks_id',];

    public function scopefindSportsmonksId($query, $deleted_at)
    {
        return $query->where('competition_id',$deleted_at);
    }

    public function scopeGetleagueRecord($query)
    {
        return $query->get();
    }

    public function scopeGetLeagueDetails($query,$league_id)
    {
        $records = $query->where('id','=',$league_id)->first();

        return $records;
    }

    public function scopeGetLeagueDetailsBySportsmonkId($query,$league_id)
    {
        $records = $query->where('sportsmonks_id','=',$league_id)->first();

        return $records;
    }

    public static function getMatchdetails($fixture_id = ''){        
        
        $from=array('fixture_id'=>$fixture_id);// $from is an array add your api keys/payload inside it  
        $utility = new Utility;        
        $basic=config('global.basic');
        $url =$basic.config('global.getMatchDetails');
        $records=$utility->getResponse($url,$from);
        return $records;
    }

    public function scopeNews()
    {
        $utility = new Utility;
        $basic = config('global.sportsMonks_url');
        $from = "";
        $url = $basic . config('global.hottes');
        $hottestnews = array_slice($utility->getResponse($url, $from), 0, 20);
        foreach ($hottestnews as &$hottest) {
            $hottest['type'] = 'news';
            $hottest['news'] = 'Hottest News';
        }

        $url = $basic . config('global.latest');
        $latestnews = array_slice($utility->getResponse($url, $from), 0, 20);
        foreach ($latestnews as &$latest) {
            $latest['type'] = 'news';
            $latest['news'] = 'Latest News';
        }

        $url = $basic . config('global.transfer');
        $transfernews = array_slice($utility->getResponse($url, $from), 0, 20);
        foreach ($transfernews as &$transfer) {
            $transfer['type'] = 'news';
            $transfer['news'] = 'Transfer News';
        }

        $news = compact('hottestnews', 'latestnews', 'transfernews');
        return $news;
    }



    public static function getSearchSuggestion($term)
    {
        $results = DB::table('ApiSportsMonks_TeamsBySeason')
            ->select('name')
            ->where('name', 'like', $term . '%')
            ->groupBy('name')
            ->orderBy('name', 'asc')
            ->get();

        if ($results->count() > 0) {
            return $results->toArray();
        } else {
            return false;
        }
    }

    public static function getTeamData($term)
{
    $result = DB::table('ApiSportsMonks_TeamsBySeason')
        ->select('id', 'name', 'logo_path', 'short_code')
        // ->selectSub(function ($query) {
        //     $query->select('competition_name')
        //         ->from('leagues')
        //         ->whereColumn('competition_id', 'league_id');
        // }, 'league_name')
        
        ->where('name', $term)
        ->first();

    if ($result) {
        return (array) $result;
    } else {
        return false;
    }
}



}
