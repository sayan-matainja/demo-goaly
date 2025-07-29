<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\Utility;
use App\PlayedPrediction;
use Modules\Admin\Entities\Predictions;
use Modules\Admin\Entities\PredictionQuestion;
use App\UserModel;
use App\UserPrizeRedeem;
use App\PredictionAnswer; 
use App\PredictionPrizeHistory;
use App\PredictionTotalPointCount;
use App\League;

use App\Prediction;
use App\UserList;
use App\PredictionPrize;

use App\PredictionGame;
use Illuminate\Support\Facades\DB;
class LeaderboardController extends Controller
{
    
    public function index()
    {

        $leaderboard = [];
        $general = [];
        $weekly = [];
        $monthly = [];
        $quarterly = [];


        $last = date("Y-m-d", strtotime('monday this week'));
        $next = date("Y-m-d", strtotime('sunday this week'));

        $first_day = date("Y-m-d", strtotime('first day of this month'));
        $last_day = date("Y-m-d", strtotime('last day of this month'));
// $first_day='2023-08-01';
// $last_day='2023-08-31';

        // general leaderboard data    

        $get_first_week_pred = Predictions::FirstWeekPred($last, $next)->get();

      

        $get_first_week_pred_id = isset($get_first_week_pred->id) ? $get_first_week_pred->id : '';

        $g_list = UserModel::GeneralLeaderboardScore()->get()->toArray();

      

        foreach ($g_list as $key => $user) {


            $pred_his = PredictionPrizeHistory::PredHistory($user['id'])->get()->toArray();

           

            if ($get_first_week_pred_id != '')
                $first_pred_date = PlayedPrediction::FirstPredDate($user['id'])->first();
           
            $general[] = array(
                'user_id' => $user['id'],
                'subscribe_date'=>$user['subscribe_date'],
                'name' => $user['name'],
                'msisdn' => $user['msisdn'],
                'renewal_count'=>$user['renewal_count'],
                'image' => $user['img'],
                'coins' => $user['coins'],
                'wins' => $user['wins'],
                'first_pred_datetime' => isset($first_pred_date->created_at) ? $first_pred_date->created_at : '',
                'history' => $pred_his
            );
        }


        //monthly leaderboard

        $get_first_month_pred = Predictions::FirstMonthPred($first_day, $last_day)->get();
        $get_first_month_pred_id = isset($get_first_month_pred->id) ? $get_first_month_pred->id : '';

        $m_list = UserModel::Monthlyleaderboardscore($first_day, $last_day)->get()->toArray();

        foreach ($m_list as $user) {

        $pred_his = PredictionPrizeHistory::MonthlyPredHistory($user['id'], $first_day, $last_day)->get()->toArray();

            if ($get_first_month_pred_id != '')
                $first_pred_date =PlayedPrediction::FirstPredDate($user['id'])->first();

            $monthly[] = array(
                'user_id' => $user['id'],
                'subscribe_date'=>$user['subscribe_date'],
                'name' => $user['name'],
                'msisdn' => $user['msisdn'],
                'renewal_count'=>$user['renewal_count'],
                'image' => $user['img'],
                'coins' => $user['coins'],
                'wins' => $user['wins'],
                'first_pred_datetime' => isset($first_pred_date->created_at) ? $first_pred_date->created_at : '',
                'history' => $pred_his
            );
        }


        return view('leaderboard.leaderboard',compact('general','monthly'));


    }
    public function leaderboard_detail()
    {
        return view('leaderboard.leaderboard_detail');
    }
    

}
