<?php

namespace Modules\Admin\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Common\Utility;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class Predictions extends Model
{
   
    protected $table = 'predictions';
    protected $primaryKey = 'id';
    
    // protected $fillable = ['order','competition_name','competition_id','old_logo','white_logo','pos','sportsmonks_id','created_at'];
    protected $fillable = ['match_id','league_id','league_name','league_logo','home_team_id','home_team_name','home_team_logo',
                            'score_home','away_team_id','away_team_name','away_team_logo','score_away','match_start_time',
                            'status','venue','venue_image','group_name','prediction_type','prediction_start_time','prediction_end_time',
                            'is_active','is_end','winner_status','created_at','updated_at'];

    public function scopeAll($query)
    {
        return $query->get();
    }

        public function scopeFirstMonthPred($query,$firstDay, $lastDay)
    {
        return $query->select('id')
            ->whereDate('prediction_start_time', '>=', $firstDay)
            ->whereDate('prediction_start_time', '<=', $lastDay)
            ->where('prediction_type', 'monthly')
            ->orderBy('prediction_start_time', 'asc')
            ->limit(1);
           
    }

        public function scopeLivePrediction($query)
    {   
        $today = date('Y-m-d');
        return $query->where('is_active', 1)
            ->where('winner_status', 0)
            ->whereDate('prediction_start_time', '<=', $today)
            ->whereDate('prediction_end_time', '>=', $today);
           
    }



    public function scopePredictionStart($query)
    {   
        $timezone = Session::get('local_timezone', 'Asia/Jakarta');
        $today = now()->format('Y-m-d');
        $currentDateTime = Carbon::now($timezone)->toDateTimeString();

        return $query->whereDate('prediction_start_time', '=', $today)
            ->where('prediction_start_time', '>', $currentDateTime)
            ->whereRaw('TIMESTAMPDIFF(SECOND, ?, prediction_start_time) <= 3600', [$currentDateTime]);
    }







     public function scopeIsMatchEnd($query){

        $today=date("Y-m-d H:i:s");
        
        $from = array('start_date' =>$today);
    

        $basic=config('global.basic');
        $url =$basic.config('global.getmatches');
        $utility = new Utility;
        $response=$utility->getResponse($url,$from);
        
        $check = false;

         if (isset($response['matches'])) {
            $matches = $response['matches'];

            
            foreach ($matches as $match) {

                if ( $match['match_status'] == "Finished" ||  $match['status'] == "FT") {
                
                    $check = true;
                    break; // No need to check further matches, we found one that matches.
                }
            }
        }
        return $check;
           


     }



    public function scopeFirstWeekPred($query, $last, $next)
    {
        return $query->select('id')->where('prediction_start_time', '>=', $last)->where('prediction_start_time', '<=', $next)->where('prediction_type','=', 'weekly')->orderBy('prediction_start_time', 'asc');

    }

    public static function fetchPredictionById($id){

      return $quary = DB::table('predictions')->select('*')->where('id',$id)->first();
    }
    
    public static function fetchallprediction(){

       return $quary = DB::table('predictions')->select('*')->orderBy('created_at','DESC')->get()->toarray();

    }

    public static function deletePredictionById($id){

      return $quary = DB::table('predictions')->where('id', $id)->delete();
    }


    public static function predictionExits($id){

      return $quary = DB::table('predictions')->where('id', $id)->get();

    }

    public static function updatePrediction($value){

     

      $values = DB::table('predictions')->where('id',$value['id'])->update($value);

      return $values;
    
    }
    //   print_r($value);
    //   die("hjlj");

    //   return $quary = DB::table('predictions')
    //   ->where('id','=',$value['prediction_tableId'])
    //   ->update([
    //       'group_name' => $value['group_name'],
    //       'prediction_type'=>$value['prediction_type'],
    //       'prediction_start_time'=>$value['prediction_start'],
    //       'prediction_end_time'=>$value['prediction_end'],
    //       'league_name'=>$value['support_provided'],
    //       'match_id'=>$value['match_id'],
    //       'updated_at'=>date('Y-m-d H:i:s')]);
    // }

   public static function scopeisActive($query)
   {

     return $query->where('is_active', 1);

   }

   public function scopeisEnd($query)
   {
       return $query->where('is_end', 1);
   }

    public function scopeOrderByCreated($query)
   {
       return $query->orderBy('created_at','DESC');
   }

       public function scopeGetPredictionType($query, $pred_id)
    {
        return $query->select('prediction_type')
            ->where('id', $pred_id)
            ->first();
    }
    public function scopePredStartEndDate($query, $pred_id)
    {
        return $query->select('id', 'match_start_time as match_start', 'prediction_start_time as pred_start', 'prediction_end_time as pred_end')
            ->where('id', $pred_id);
    }
    
   

    public static function updateScore($pred_id, $score_home, $score_away)
    {
        $data = [
            'score_home' => $score_home,
            'score_away' => $score_away
        ];

        return self::where('id', $pred_id)
                    ->update($data);
    }
     public function scopegetWinnerStatus($query,$id, $f)
        {
            if ($f == 0) {
                return $query->select('id', 'winner_status', 'prediction_type')
                    ->where('id', $id)
                    ->first();
            }
            
            if ($f == 1) {
            $query->where('id', $id)->update(['winner_status' => 1]);
            return true; 
            }

            return false;
        }

     public function scopecontestsByleague($query,$leagueId){

        return $query->where('league_id',$leagueId);

     }


}
