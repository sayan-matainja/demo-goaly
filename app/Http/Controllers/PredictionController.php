<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use Carbon\Carbon;
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
use App\UserFavouriteTeam;
use Session;
use DB;
class PredictionController extends Controller
{

    public function getUserQusAns(Request $request){
        $user_id=$request->userId;
        $pred_id=$request->predId;

        $home_score = 0;
        $away_score = 0;
        $neither   = 0;
        $homeTeam_id = 0;
        $awayTeam_id = 0;
        $homelogo = "";
        $awaylogo = "";
        $pred_details = Predictions::fetchPredictionById($pred_id);
    
        $homeTeamLogo = $pred_details->home_team_logo;
        $awayTeamLogo = $pred_details->away_team_logo;


        $user_info = UserModel::whereId($user_id)->first();
        $user_name = $user_info->first_name . " " . $user_info->last_name;
        $user_img = $user_info->image;

        $data = array();
        $answers = PlayedPrediction::CheckPredictionId($pred_id,$user_id);
        foreach ($answers as $answer) {

            $ques_id = $answer->question_id;
            $ques_details = PredictionQuestion::DataById($ques_id);
            $ques = $ques_details->question;
            $submitted_answer = $answer->submitted_answer;
            $date = Carbon::parse($answer->created_at)->format('D H:i,d/m/Y');
            if (strstr($submitted_answer, ':') != '') {

                $explode_ans = explode(':', $submitted_answer);
                $home_score = $explode_ans[0];
                $away_score = $explode_ans[1];
                $homeTeam_id = $pred_details->home_team_id;
                $awayTeam_id = $pred_details->away_team_id;
                $homelogo = $homeTeamLogo;
                $awaylogo = $awayTeamLogo;
            } else {
                if (($answer->submitted_answer) == 1 && ($answer->submitted_answer) != 2 && ($answer->submitted_answer) != 3) {
                    $home_score = 1;
                    $away_score = 0;
                    $homeTeam_id = $pred_details->home_team_id;
                    $awayTeam_id = 0;
                    $homelogo = $homeTeamLogo;
                    $awaylogo = "";
                    $neither = 0;
                } elseif (($answer->submitted_answer) == 2 && ($answer->submitted_answer) != 1 && ($answer->submitted_answer) != 3) {
                    $home_score = 0;
                    $away_score = 1;
                    $homeTeam_id = 0;
                    $awayTeam_id = $pred_details->away_team_id;
                    $homelogo = "";
                    $awaylogo = $awayTeamLogo;
                    $neither = 0;
                } elseif (($answer->submitted_answer) == 3 && ($answer->submitted_answer) != 1 && ($answer->submitted_answer) != 2) {
                    $home_score = 0;
                    $away_score = 0;
                    $homeTeam_id = 0;
                    $awayTeam_id = 0;
                    $homelogo = "";
                    $awaylogo = "";
                    $neither = 1;
                }
            }
            // die("condition");
            $data[] = array(
                'pred_id' => $answer->pred_id,
                'user_id' => $answer->user_id,
                'user_name' => $user_name,
                'question_id' => $ques_id,
                'question' => $ques,
                'point' => $ques_details->point,
                'home_score' => $home_score,
                'away_score' => $away_score,
                'neither'    => $neither,
                'homeTeam_id' => $homeTeam_id,
                'awayTeam_id' => $awayTeam_id,
                'homelogo' => $homelogo,
                'awaylogo' => $awaylogo

            );
        }

            if ($data) {
                return response()->json(['success' => 1, 'questionAnswers' => $data, 'user_name' => $user_name, 'user_image' => $user_img, 'created_at' => $date], 200);
            } else {
                return response()->json(['success' => 1, 'questionAnswers' => [], 'user_name' => "", 'created_at' => "", 'user_image' => "", "message" => "No data available!"], 200);
            }

    }
     

    public function contest_detail($id)
    {
      
      $user=Session::get('User');
      if(!isset($user)){
      return redirect('/login')->with('flash_message_error','Unauthorized! Please Login to Play Contest.');
      }

        if($user['status']=='active'){
        $items = Predictions::fetchPredictionById($id); 

        if(now()>$items->prediction_end_time){
          Session::flash('error', 'Contest Already Over.');
            return redirect()->route('contest');

        }
        $matchresult=League::getMatchdetails($id);

        $utility = new Utility;

        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.getLastMatchByTeam');
        $questions = PredictionQuestion::isActive();
         
        $basic_n=config('global.basic');        
        $url_n =$basic_n."fixtureDetails";
                 

        $timezone = Session::get('local_timezone', "Asia/Jakarta");
        if ($items) {
        $data['id'] = $items->id;

        $data['match_id'] = $items->match_id;

        $matchresult=League::getMatchdetails($items->match_id);
        $data['league_id'] = $items->league_id;
        $data['league_name'] = $items->league_name;
        $data['league_id'] = $items->league_id;
        $data['league_logo'] = $items->league_logo;
        $data['home_team_id'] = $items->home_team_id;
        $data['home_team_name'] = $items->home_team_name;

        $data['home_short_code'] = isset($matchresult['match_details']['home_team_short_code']) ? $matchresult['match_details']['home_team_short_code'] : '';


        $data['home_team_logo'] = $items->home_team_logo;
        $data['score_home'] = $items->score_home;
        $data['away_team_id'] = $items->away_team_id;
        $data['away_team_name'] = $items->away_team_name;
        $data['home_short_code'] = isset($matchresult['details'][0]['homeTeam']['short_code']) ?
                                     $matchresult['details'][0]['homeTeam']['short_code'] : '';
        $data['away_short_code'] = isset($matchresult['details'][0]['awayTeam']['short_code']) ?
                                     $matchresult['details'][0]['awayTeam']['short_code'] : '';                                     
        $data['away_team_logo'] = $items->away_team_logo;
        $data['match_start_time'] = $items->match_start_time;
        $data['status'] = $items->status;
        $data['venue'] = $items->venue;
        $data['venue_image'] = $items->venue_image;
        $data['group_name'] = $items->group_name;
        $data['prediction_start_time'] = $items->prediction_start_time;
        $data['prediction_end_time'] = $items->prediction_end_time;
        $data['is_active'] = $items->is_active;
        $data['winner_status'] = $items->winner_status;

        $match_time = Utility::getUtcToLocal($data['match_start_time'], $timezone, "Y-m-d");
        $match_time_bar = Utility::getUtcToLocal($data['match_start_time'], $timezone, "w");
        $bar = "NA";

        $form = [
            'homeTeam' => $items->home_team_id,
            'awayTeam' => $items->away_team_id
        ];

       $response=$utility->getResponse($url,$form);

       $from_n=array('fixture_id'=>$items->match_id);
       $d=$utility->getResponse($url_n,$from_n);
       $details=$d['match'];
        if (isset($match_time_bar)) {
            $daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            $bar = $daysOfWeek[$match_time_bar];
        }

        $data['match_time'] = $match_time;
        $data['match_time_bar'] = $bar;

       
        }
        
        $competitions = $data;
        $H_lastmatches=$response['homeTeam_match'];
        $A_lastmatches=$response['awayTeam_match'];
    

         return view('contest.contest_detail', compact('competitions', 'details', 'questions','user',
            'H_lastmatches','A_lastmatches'));
        }else {
        Session::flash('error', trans('lang.Please Subscribe to Play Contests.'));
        return redirect()->route('home');
        }

    }

     public function index()
     {      

        $details = League::GetleagueRecord()->toArray();
        $link = "http://" . $_SERVER['HTTP_HOST']."/assets/uploads/leagues/";
                
        return view('prediction.index',compact('details','link'));

     }


    public function contestsByLeague(Request $request)
    {

        $competitions = !empty($request->leagueId) 
        ? Predictions::isActive()->contestsByleague($request->leagueId)->OrderByCreated()->get()
        : Predictions::isActive()->OrderByCreated()->limit(20)->get();



       $timezone = $request->session()->get('local_timezone',"Asia/Jakarta");

        $competitions = $competitions->map(function($items) use ($timezone){


         $data['id'] = $items->id;
         $data['fixture_id'] = $items->match_id;

         $data['league_id'] = $items->league_id;
         $data['league_name'] = $items->league_name;
         $data['league_id'] = $items->league_id;
         $data['league_logo'] = $items->league_logo;
         $data['home_team_id'] = $items->home_team_id;
         $data['home_team_name'] = $items->home_team_name;
         $data['home_team_logo'] = $items->home_team_logo;
         $data['score_home'] = $items->score_home;
         $data['away_team_id'] = $items->away_team_id;
         $data['away_team_name'] = $items->away_team_name;
         $data['away_team_logo'] = $items->away_team_logo;
         $data['match_start_time'] = $items->match_start_time;
         $data['status'] = $items->status;
         $data['venue'] = $items->venue;
         $data['venue_image'] = $items->venue_image;
         $data['group_name'] = $items->group_name;
         $data['prediction_start_time'] = Carbon::parse($items->prediction_start_time)->setTimezone($timezone)->format("Y-m-d H:i:s");
        $data['prediction_end_time'] = Carbon::parse($items->prediction_end_time)->setTimezone($timezone)->format("Y-m-d H:i:s");

         $data['is_active'] = $items->is_active;
         $data['winner_status'] = $items->winner_status;

         
         $match_time = Utility::getUtcToLocal($data['match_start_time'],$timezone,"Y-m-d");

          $match_time_bar = Utility::getUtcToLocal($data['match_start_time'],$timezone,"w");
          $bar = "NA";

          /*0 for Sunday, 6 for Saturday*/
          if(isset($match_time_bar))
          {
             if($match_time_bar == 0)
                $bar = "Sunday";
            else if($match_time_bar == 1)
                $bar = "Monday";
                 else if($match_time_bar == 2)
                $bar = "Tuesday";
                else if($match_time_bar == 3)
                $bar = "Wednesday";
                 else if($match_time_bar == 4)
                $bar = "Thursday";
                else if($match_time_bar == 5)
                $bar = "Friday";
                else if($match_time_bar == 6)
                $bar = "Saturday";
          }


         $data['match_time'] = $match_time;
         $data['match_time_bar'] =  $bar;

          return $data;


       });

        $current_time = Carbon::now($timezone)->toDateTimeString();

        $details = League::GetleagueRecord()->toArray();

        $link = "http://" . $_SERVER['HTTP_HOST']."/assets/uploads/leagues/";

        
        // If the request is AJAX, return a JSON response
        return response()->json([
            'competitions' => $competitions,
            'details' => $details,
            'link' => $link,
            'current_time' => $current_time,
        ]);
    }











       public function getWinnerBoard()
    {
        $winnerboard = [];
        $w_lists = [];
        $m_lists = [];
        $w_data = [];
        $m_data = [];
        $w_rank = 1;
        $m_rank = 0;
        $point = 0;
        

        $last=date("Y-m-d", strtotime("last week monday"));
        $next=date("Y-m-d", strtotime("last week sunday"));

        $first_day = date("Y-m-d", strtotime('first day of previous month'));
        $last_day = date("Y-m-d", strtotime('last day of previous month'));
        $today = date('Y-m-d');

        // $last="2023-08-22";
        // $next="2023-08-30";

        // $first_day="2023-10-01";
        // $last_day="2023-10-31";
        // $today="2023-11-03";

      

        $monthly_lists = PredictionPrizeHistory::MonthlyWinnerBoardScore($first_day,$last_day)->get();


// $query = PredictionPrizeHistory::MonthlyWinnerBoardScore($first_day,$last_day);
// $sql = $query->toSql();
// $bindings = $query->getBindings();
// 
// dd($sql, $bindings);
// $results = $query->get();// All these lines Output the SQL query and parameter bindings/values for debugging

            foreach ($monthly_lists as $monthly_list) {

            // if ($point > $monthly_list['coins']) 
            // {
            //     $m_rank ++;
            // }  
                $m_rank++;
             $check_msisdn_redeem_prize = UserPrizeRedeem::checkMsisdnRedeemPrize($monthly_list['msisdn'], $first_day, $last_day, 'monthly');

            $m_lists[] = array(
                                'id'=>$monthly_list['id'],
                                'name'=>$monthly_list['name'],
                                'phone_no'=>$monthly_list['phone_no'],
                                'msisdn'=>$monthly_list['msisdn'],
                                'subscription_date'=> $monthly_list['subscribe_date'],
                                'points'=>$monthly_list['coins'],
                                'rank'=> $m_rank,
                                'redeem_status' => $check_msisdn_redeem_prize
                            );
            $point = $monthly_list['coins'];
        }
         // dd($m_lists);

        $predictionModel = new PredictionTotalPointCount();
        $insertTotalPointCount =$predictionModel ->InsertTotalPointCount($m_lists, $first_day, $last_day);
        
   
    $winnerDeclarationDate = $last_day;

    $claimDeadline = date('Y-m-d', strtotime($winnerDeclarationDate . ' + 10 days')); // Deadline for rank 1-3
    $claimDeadline2 = date('Y-m-d', strtotime($winnerDeclarationDate . ' + 14 days')); // Deadline for rank 4-10

    // Check if the current date is beyond the claim deadline
    if ($today > $claimDeadline) {
        // Reset the points of the rank 1 user in the monthly competition
        if (!empty($m_lists) && $m_lists[0]['rank'] === 1 && $m_lists[0]['redeem_status'] == '') {
            $userId = $m_lists[0]['id'];
            $updatedPoints = 0;
           $q=PredictionTotalPointCount::ResetMonthlyPoints($first_day, $last_day, $userId, $updatedPoints);
           //$q=UserMOdel::ResetUserCoins($userId, $updatedPoints);
        }
    }

    $monthly_prizes =PredictionTotalPointCount ::getMonthlyWinnerPrize();
     
    $winners= [];

        foreach ($m_lists as $m_list) {
            foreach ($monthly_prizes as $monthly_prize) {
                $winner_rank = $m_list['rank'];
                $prize_rank = $monthly_prize->rank;

                if ($winner_rank == $prize_rank) {
                    if ($today > $claimDeadline2) {
                        if ($winner_rank >= 4 && $winner_rank <= 10 && !$m_list['redeem_status']) {
                            // For ranks 4 to 10 and if the prize is not claimed
                            $flag = 1;
                            $userId = $m_list['id'];
                            $prevMonthpoint = $m_list['points'];
                        } else {
                            // For ranks 1 to 3 and other conditions
                            $flag = 0;
                        }
                    } else {
                        $flag = 0; // Claim deadline not passed
                    }
                    
                    $winnerId = $m_list['id'];
                    $total_points = 0;

                    // Call the get_total_points() function to retrieve the total points for the winner
                    $totalPoints = PredictionTotalPointCount::GetTotalPoints($first_day, $last_day, $winnerId);
                   
                    // Update 'total_points' key with the actual value if available
                    if ($totalPoints !== false) {
                        $total_points = $totalPoints;
                    }

                    $winners[] = array_merge($m_list, array(
                        'prize_name' => $monthly_prize->prize_name,
                        'prize_image' => $monthly_prize->prize_image,
                        'start_date' => $first_day,
                        'end_date' => $last_day,
                        'prize_size' => explode(",", $monthly_prize->prize_size),
                        'total_points' => $totalPoints->total_points,
                        'rank' => $totalPoints->rank,
                        'flag' => $flag,
                        
                    ));
                    break;
                   // Exit the inner loop after finding a  match
                }
               

            }
        }


        return view('prediction.winners',compact('winners','monthly_prizes'));

    }

     public function getContestant($id)
    {

        $status = Predictions::getWinnerStatus($id,0);
        
        if (!empty($status)) {
            if ($status->winner_status == 0) {
                $label = 'Prediction';
                $players = PlayedPrediction::ParticipateByPrediction($id, 0);  
               
            } elseif ($status->winner_status == 1) {
                $label = 'winner';
                $players = PredictionPrizeHistory::Winner($id, 0);
               
            } elseif ($status->winner_status === '') {
                $label = 'Pts';
                $players = PlayedPrediction::ParticipateByPrediction($id, 0);
            }      
            
            return $players ?
                response()->json(['players' => $players, 'status' => $label,  'success' => 1, 'error' => 0], 200) :
                response()->json(['players' => [], 'status' => 'Pts', 'success' => 0, 'error' => 1], 200);
        } else {
            return response()->json(['players' => [], 'status' => 'Pts','success' => 0, 'error' => 1], 200);
        }
    }





     public function Leaguebyteam()
     {   
         $UserId= Session::get('UserId');

        $userFavTeam=UserFavouriteTeam::select('id','name')->where('user_id',$UserId)->get()->toArray();
        
         $utility = new Utility;
         $basic=config('global.basic');
         $url =$basic.'teamsByLeagues';
         $data = (['userFavTeam' => $userFavTeam]);
      
         $responseData=$utility->getResponse($url, $data);

         return $responseData;
     }
     public function getUser()
     {
        $UserId= Session::get('UserId');

         return $UserId;
     }
     public function UpdateTeam(Request $request)
     {
        $userFevarates = $request->users;
       
        foreach ($userFevarates as  $userFevarate)
        {

           if($userFevarate==null){
            continue;
           }
            $userFeb       = new UserFavouriteTeam();

            $userFeb->user_id=Session::get('UserId');
            $userFeb->league_id =isset($userFevarate['league_id'])?$userFevarate['league_id']:'';
            $userFeb->id=isset($userFevarate['id'])?$userFevarate['id']:'';
            $userFeb->league_name=isset($userFevarate['league_name'])?$userFevarate['league_name']:'';
            $userFeb->short_code=isset($userFevarate['short_code'])?$userFevarate['short_code']:'';
            $userFeb->name=isset($userFevarate['name'])?$userFevarate['name']:'';
            $userFeb->badge=isset($userFevarate['logo_path'])?$userFevarate['logo_path']:'';
            $userFeb->status=isset($userFevarate['status'])?$userFevarate['status']:'';
            $userFeb ->save();


    }

           return $userFeb ;

     }

public function followTeam(Request $request)
{
    // Retrieve data from the AJAX request
    $team_id = $request->input('team_id');
    $teamName = $request->input('teamName');
    $teamCode = $request->input('teamCode');
    $teamLogo = $request->input('teamLogo');
    $league_id = $request->input('league_id');
    $leagueName = $request->input('leagueName');

    
    $userFeb = new UserFavouriteTeam();

    $userFeb->user_id = Session::get('UserId'); // Assuming you have the 'UserId' in your session

    $userFeb->id = $team_id;
    $userFeb->league_id = $league_id;
    $userFeb->league_name = $leagueName;
    $userFeb->name = $teamName;
    $userFeb->short_code = isset($teamCode) ? $teamCode : strtoupper(substr($teamName, 0, 3));

    $userFeb->badge = $teamLogo;
    $userFeb->status = 'selected';

    $userFeb->save();
   

    return response()->json(['table_id' => $userFeb->id]);
}

     public function UserFavourite()
     {  $userFavteams='';
        $UserId= Session::get('UserId');
        if($UserId){
         $userFavteams=UserFavouriteTeam::UserFavourite($UserId)->get();
                  
         return response()->json(['success' => '1','userFavteams'=>$userFavteams]);

        }
        else{
         return response()->json(['success' => '0','userFavteams'=>$userFavteams]);

        }
     }

    public function team_delete($id)
    {
        $table_id=$id;
        $UserId= Session::get('UserId');

        $team = UserFavouriteTeam::where('table_id', $table_id)
            ->where('user_id', $UserId)
            ->first();
         if ($team) {
            $team->delete();
            return response()->json(['message'=>'Team deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Team not found'], 404);
        }
    }


  

    public function setsubmitprediction(Request $request) {
        $answers = $request->input('userAnswers');
        $p_id = $request->input('predictionId');
        $homeTeamId = $request->input('homeTeamId');
        $awayTeamId = $request->input('awayTeamId');
        $u_id = $request->input('userId');

        $prediction = PlayedPrediction::CheckPredictionId($p_id, $u_id);

        if ($prediction->isNotEmpty()) {
            foreach ($answers as $answer) {
                $q_id = $answer['questionId'];

                PlayedPrediction::where('user_id', $u_id)
                                ->where('question_id', $q_id)
                                ->where('pred_id', $p_id)
                                ->update([
                                    'submitted_answer' => $answer['answer'],
                                    'created_at' => date('Y-m-d H:i:s')
                                ]);
            }

            return response(['success' => 1, 'error' => 0, 'message' => 'Answer updated successfully'], 200);
        } else {
            $data = [];

            foreach ($answers as $answer) {
                $data[] = [
                    'pred_id' => $answer['predictionId'],
                    'question_id' => $answer['questionId'],
                    'submitted_answer' => $answer['answer'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'user_id' => $u_id
                ];
            }

            $setpred = PlayedPrediction::insert($data);

            if ($setpred) {
                return response(['success' => 1, 'error' => 0, 'message' => 'Thanks for playing'], 200);
            } else {
                return response(['success' => 0, 'error' => 1, 'message' => 'Sorry, something went wrong'], 200);
            }
        }
    }


}
