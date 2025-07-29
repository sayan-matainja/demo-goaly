<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\PredictionPrizeHistory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Admin\Entities\GamePoints;
use Modules\Admin\Entities\Predictions;
use Modules\Admin\Entities\GameWinnersSummary;

class UserModel extends Authenticatable
{
    protected $guard = 'appuser';

    protected $table = 'users';

    protected $fillable = ['first_name','last_name','password','gender','dial_code','phone_no', 'msisdn',  'otp','status','subscription_status','subscription_type','freemium','ip_address','subscribe_date','subscribe_expired_date','country','img','coins','identity_key','zone','last_login','is_active','created_at','updated_at'];

    public $timestamps = false;

    public function gamePoints()
    {
        return $this->hasMany(GamePoints::class, 'id_users', 'id');
    }
    public function gameWinners()
    {
        return $this->hasMany(GameWinnersSummary::class, 'user_id');
    }
     public function prizeHistories()
    {
        return $this->hasMany(PredictionPrizeHistory::class, 'user_id');
    }

    public function predictions()
    {
        return $this->hasManyThrough(Predictions::class, PredictionPrizeHistory::class, 'user_id', 'id', 'id', 'pred_id');
    }
        public function scopeGeneralLeaderboardScore($query)
        {
            return $query->select('id', 'msisdn', 'subscribe_date', 'renewal_count', DB::raw("CONCAT(first_name, ' ', last_name) as name"), 'img')
                ->withCount(['prizeHistories as wins' => function ($query) {
                    $query->where('coin_won', '!=', 0);
                }])
                ->selectSub(function ($query) {
                    $query->from('goaly_prediction_prize_history')
                          ->whereColumn('user_id', 'users.id') // Ensure this is correct
                          ->selectRaw('SUM(coin_won)');
                }, 'coins')
                ->having('wins', '>', 0)
                ->orderBy('coins', 'desc');
        }

    public function scopeMonthlyLeaderboardScore($query, $firstday, $lastday)
    {
        return $query->select([
                    'users.id',
                    'users.msisdn',
                    'users.subscribe_date',
                    'users.renewal_count',
                    DB::raw("CONCAT(users.first_name, ' ', users.last_name) as name"),
                    'users.img',
                ])
                ->withCount(['prizeHistories as wins' => function ($subQuery) use ($firstday, $lastday) {
                    $subQuery->where('pred_type', 'monthly')
                             ->whereBetween('match_start_time', [$firstday, $lastday]);
                }])
                ->addSelect(['coins' => function ($subQuery) use ($firstday, $lastday) {
                    $subQuery->selectRaw('SUM(coin_won)')
                             ->from('goaly_prediction_prize_history')
                             ->whereColumn('user_id', 'users.id')
                             ->where('pred_type', 'monthly')
                             ->whereBetween('match_start_time', [$firstday, $lastday]);
                }])
                ->whereHas('prizeHistories', function ($subQuery) use ($firstday, $lastday) {
                    $subQuery->where('pred_type', 'monthly')
                             ->whereBetween('match_start_time', [$firstday, $lastday]);
                })
                ->orderBy('coins', 'desc');
    }






     public function scopeGeneralLeaderboardScore_old($query)
    {
       
        return $query
            ->selectRaw("id, msisdn, subscribe_date, renewal_count, CONCAT(first_name, ' ', last_name) as name,img,
                (
                    SELECT COUNT(*)
                    FROM `goaly_prediction_prize_history`
                    JOIN `predictions` ON `goaly_prediction_prize_history`.`pred_id` = `predictions`.`id`
                    WHERE `goaly_prediction_prize_history`.`user_id` = users.id AND `goaly_prediction_prize_history`.`coin_won` != '0'
                ) as wins,
                (
                    SELECT SUM(coin_won)
                    FROM `goaly_prediction_prize_history`
                    JOIN `predictions` ON `goaly_prediction_prize_history`.`pred_id` = `predictions`.`id`
                    WHERE `goaly_prediction_prize_history`.`user_id` = users.id
                ) as coins")
            ->whereRaw("
                (
                    SELECT COUNT(*)
                    FROM `goaly_prediction_prize_history`
                    WHERE `goaly_prediction_prize_history`.`user_id` = users.id AND `goaly_prediction_prize_history`.`coin_won` != '0'
                ) != 0")
            ->orderBy('coins', 'desc');
    }

    public function scopeMonthlyLeaderboardScore_old($query, $firstday, $lastday)
    {    
        
       return $query
                ->select([
                    'users.id',
                    'users.msisdn',
                    'users.subscribe_date',
                    'users.renewal_count',
                    DB::raw("CONCAT(users.first_name, ' ', users.last_name) as name"),
                    'img',
                    DB::raw("(SELECT COUNT(*) FROM goaly_prediction_prize_history WHERE goaly_prediction_prize_history.user_id = users.id AND coin_won != 0 AND pred_type = 'monthly') as wins"),
                    DB::raw("(SELECT SUM(coin_won) FROM goaly_prediction_prize_history WHERE user_id = users.id AND pred_type = 'monthly' AND (DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') >= ? AND DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') <= ?)) as coins"),
                    'users.id',
                ])
                ->from('goaly_prediction_prize_history')
                ->whereRaw("DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') >= ?", $firstday)
                ->whereRaw("DATE_FORMAT(goaly_prediction_prize_history.match_start_time, '%Y-%m-%d') <= ?", $lastday)
                ->where('pred_type', 'monthly')
                ->leftJoin('users', 'goaly_prediction_prize_history.user_id', '=', 'users.id')
                ->groupBy('users.id','users.msisdn','name','users.subscribe_date','users.renewal_count','img')
                ->orderBy('coins', 'desc')
                ->setBindings([$firstday, $lastday], 'select');
    }




  


    public function scopeUserDetails($query, $phone_no)
    {
        $user = $query->where('msisdn', $phone_no)->first();

        if ($user) {
            // User found, return true and user details
            return ['status' => true, 'user' => $user];
        } else {
            // User not found, return false
            return ['status' => false];
        }
    }

public static function subscription_history($msisdn, $type,$ipAddress, $nextcharge)
{
    $subs_history = DB::table('subscription_history')->insert([
        'msisdn' => $msisdn,
        'subscription_type' => $type,
        'ip_address' =>$ipAddress,
        'subscribe_date' => date('Y-m-d H:i:s'),
        'subscribe_expired_date' => $nextcharge
    ]);

    return $subs_history; // Return the result of the insert operation (true/false)
}

public function scopeUpdateTotalCoins($query, $userid, $coins)
{
        return $query->where('id', $userid)
                 ->update(['coins' => $query->raw("COALESCE(coins, 0) + {$coins}")]);
                 
}
public function scopeResetUserCoins($query, $userid, $coins)
{
    return $query->where('id', $userid)
                 ->update(['coins' => $coins]);
}



}