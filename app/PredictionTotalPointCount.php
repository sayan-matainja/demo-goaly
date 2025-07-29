<?php

namespace App;
use DB;
use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Model;

class PredictionTotalPointCount extends Model
{
    protected $table = 'prediction_total_point_count';
    protected $fillable = ['id','user_id','msisdn',  'rank',    'total_points',    'start_date',  'end_date','subscription_date'];
     public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
        public  function InsertTotalPointCount($mLists, $firstDay, $lastDay)
    {   
        
        $todayDate = date('Y-m-d');        
        $dateObj = new DateTime($todayDate);
      
        $declaration_month = $dateObj->format('j M, Y');

        


            if (!empty($mLists)) {

                // $rank = 1;
        foreach ($mLists as $data) {

            $userId = $data['id'];
            $msisdn = $data['msisdn'];
            $currentPoints = $data['points'];
            $subscription_date=$data['subscription_date'];
            
            
            
          
          
          
            // Check if the record already exists
            $recordExists = $this->where('user_id', $userId)
                ->where('start_date', $firstDay)
                ->where('end_date', $lastDay)
                ->exists();

            if (!$recordExists) {
                $insertData = [
                    'user_id' => $userId,
                    'msisdn' => $msisdn,
                    'rank' => $data['rank'],
                    'total_points' => $currentPoints,
                    'start_date' => $firstDay,
                    'declaration_month' => $declaration_month,
                    'subscription_date' => $subscription_date,
                    'end_date' => $lastDay,
                ];
                
                $this->create($insertData);
            }
            // $rank++;
        }

        return true;
    }

    return false;
    }

        public function scopeResetMonthlyPoints($query, $first_day, $last_day, $userId, $updatedPoints)
    {
       
        
        return $query->where('user_id', $userId)
                     ->where('start_date', $first_day)
                     ->where('end_date', $last_day)
                     ->update(['total_points' => $updatedPoints]);
    }

    public function scopeGetTotalPoints($query, $first_day, $last_day, $identifier)
    {
       

      return $query->select('total_points', 'rank')
                 ->where('end_date', '<=', $last_day)
                 ->where(function ($q) use ($identifier) {
                     $q->where('user_id', $identifier)
                       ->orWhere('msisdn', $identifier);
                 })
                 ->orderBy('end_date', 'desc')
                 ->first(); 
    }

    public function scopeGetPreviousMonthTotalPoints($query, $user_id, $start_date, $end_date)
    {
        $previous_month_start = date('Y-m-d', strtotime($start_date . ' -1 month'));
        $previous_month_end = date('Y-m-t', strtotime($start_date . ' -1 month'));
// print_r($previous_month_start);die();
        return $query->select('total_points')
                     ->where('user_id', $user_id)
                     ->where('start_date', '=',$previous_month_start)
                     ->where('end_date','=', $previous_month_end);
                     
    }

    public static function getMonthlyWinnerPrize()
    {
       
        return DB::table('winner_prize_management')
            ->select(
                'id',
                'type',
                'rank',
                'prize_name',
                'prize_image',
                'start_date',
                'end_date',
                'prize_size'
            )
            ->where('type', 'monthly')
            ->where('status', 1)
            ->orderBy('rank', 'asc')
            ->get();
    }

}
