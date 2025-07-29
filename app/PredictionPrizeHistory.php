<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Predictions;
use App\UserModel;
class PredictionPrizeHistory extends Model
{
    protected $table = 'goaly_prediction_prize_history';
    protected $primaryKey = 'id';
    
    
    protected $fillable = [
        'pred_id',
        'pred_type',
        'user_id',
        'coin_won',
        'created_at',
        'prediction_start_time',
        'prediction_end_time',
        'match_start_time'
    ];

    public function scopeMonthlyType($query)
    {
        return $query->where('pred_type', 'monthly');
    }
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function prediction()
    {
        return $this->belongsTo(Predictions::class, 'pred_id');
    }

    public function scopeHasNonZeroCoinWin($query)
    {
        return $query->where('coin_won', '!=', '0');
    }

    public function scopeWithinDateRange($query, $firstDay, $lastDay)
    {
        return $query->whereDate('match_start_time', '>=', $firstDay)
                     ->whereDate('match_start_time', '<=', $lastDay);
    }
    public function scopePredHistory($query, $userId)
    {
        return $query->with(['user:id,first_name,last_name,email', 'prediction'])
            ->where('user_id', $userId)
            ->selectRaw('goaly_prediction_prize_history.*, (SELECT COUNT(*) FROM goaly_prediction_prize_history WHERE user_id = ? AND coin_won != 0) as wins', [$userId])
            ->selectRaw('(SELECT SUM(coin_won) FROM goaly_prediction_prize_history WHERE user_id = ?) as coins', [$userId]);
    }
    

    public function scopeMonthlyPredHistory($query, $userId, $firstDay, $lastDay)
{
    return $query
        ->selectRaw("$userId as user_id, predictions.id,
                     predictions.match_start_time,
                     predictions.home_team_name as homeTeamName,
                     predictions.home_team_logo as homeTeamLogo,
                     predictions.away_team_name as awayTeamName,
                     predictions.away_team_logo as awayTeamLogo,
                     predictions.score_away as awayTeamScore,
                     predictions.score_home as homeTeamScore,
                     goaly_prediction_prize_history.coin_won,
                     goaly_prediction_prize_history.created_at as history_createdAt,
                     (select created_at from user_played_prediction where user_id=$userId AND pred_id=predictions.id limit 1) as user_played_date")
        ->from('goaly_prediction_prize_history')
        ->where('goaly_prediction_prize_history.user_id', $userId)
        ->whereRaw("DATE_FORMAT(predictions.match_start_time, '%Y-%m-%d') >= ?", [$firstDay])
        ->whereRaw("DATE_FORMAT(predictions.match_start_time, '%Y-%m-%d') <= ?", [$lastDay])
        ->where('pred_type', 'monthly')
        ->leftJoin('predictions', 'goaly_prediction_prize_history.pred_id', '=', 'predictions.id');
}

    public function scopeWinner($query, $id)
    {
        return $query->select("user_id", "pred_id", "coin_won as pts")
            ->from('goaly_prediction_prize_history')
            ->where('pred_id', $id)
            ->orderBy('coin_won', 'desc')
            ->get()
            ->map(function ($result) {
                $user = UserModel::find($result->user_id);
                if ($user) {
                    $result->name = $user->first_name . ' ' . $user->last_name;
                    $result->msisdn = $user->msisdn;
                }
                return $result;
            });
    }

      public function scopeWeeklyWinnerBoardScore($query, $last, $next)
    {
          return $query
        ->selectRaw("CONCAT(users.first_name, ' ', users.last_name) as name, prediction_start_time, prediction_end_time, users.phone_no, users.msisdn, SUM(coin_won) as coins, users.id, MAX(subscribe_date) as subscription_date")
        ->whereRaw("DATE_FORMAT(goaly_prediction_prize_history.created_at, '%Y-%m-%d') >= ?", [$last])
        ->whereRaw("DATE_FORMAT(goaly_prediction_prize_history.created_at, '%Y-%m-%d') <= ?", [$next])
        ->leftJoin("users", "goaly_prediction_prize_history.user_id", "=", "users.id")
        ->groupBy("users.first_name", "users.last_name", "users.phone_no", "users.msisdn", "prediction_start_time", "prediction_end_time", "users.id")
        ->orderByDesc("coins");
    }

    

public function scopeMonthlyWinnerBoardScore($query, $firstDay, $lastDay)
{

    $previous_month_start = date('Y-m-d', strtotime($firstDay . ' -1 month'));
    $previous_month_end = date('Y-m-d', strtotime('last day of ' . $previous_month_start)); 


    return $query
        ->selectRaw("CONCAT(users.first_name, ' ', users.last_name) as name, users.phone_no as phone_no, users.msisdn as msisdn, users.subscribe_date, 
            (SUM(coin_won) + IFNULL(
                (SELECT total_points FROM prediction_total_point_count 
                 WHERE user_id = users.id 
                 AND start_date = :previous_month_start 
                 AND end_date = :previous_month_end
                ), 0)) as coins, users.id, MIN(goaly_prediction_prize_history.created_at), MAX(goaly_prediction_prize_history.created_at)", [
                'previous_month_start' => $previous_month_start,
                'previous_month_end' => $previous_month_end,
            ])
        ->whereRaw("DATE(goaly_prediction_prize_history.created_at) >= :first_day", ['first_day' => $firstDay])
        ->whereRaw("DATE(goaly_prediction_prize_history.created_at) <= :last_day", ['last_day' => $lastDay])
        ->leftJoin("users", "goaly_prediction_prize_history.user_id", "=", "users.id")
        ->groupBy("users.first_name", "users.last_name", "users.phone_no", "users.msisdn", "users.subscribe_date", "users.id")
        ->orderByDesc("coins")
        ->orderBy("subscribe_date");
}












}
