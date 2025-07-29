<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Predictions;
use Modules\Admin\Entities\PredictionQuestion;
use Modules\Admin\Entities\Leagues;
use App\Common\Utility;
use App\UserModel;
use App\PredictionAnswer; 
use App\PredictionPrizeHistory; 
use App\PlayedPrediction; 
use Modules\Admin\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Cache;
use Redirect;
use Carbon\Carbon;
class PredictionsController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
       //$all_domain = Domain::getAll()->orderBy('id', 'DESC')->where('is_deleted',null)->get();
       //$this->domains = $all_domain;
    }



    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Predictions::query();

            // Handle search filtering
            if ($request->has('search') && $request->search['value']) {
                $searchValue = $request->search['value'];
                $query->where('home_team_name', 'like', "%$searchValue%")
                      ->orWhere('away_team_name', 'like', "%$searchValue%")
                      ->orWhere('group_name', 'like', "%$searchValue%")
                      ->orWhere('venue', 'like', "%$searchValue%");
            }

            // Handle sorting
            if ($request->has('order')) {
                $orderColumnIndex = $request->order[0]['column'];
                $orderDir = $request->order[0]['dir'];
                $columns = ['home_team_name', 'away_team_name', 'group_name', 'prediction_type', 'match_start_time', 'venue', 'is_active', 'winner_status'];
                $orderColumn = $columns[$orderColumnIndex];
                $query->orderBy($orderColumn, $orderDir);
            } else {
                $query->orderBy('created_at', 'desc');
            }

            // Handle pagination
            $perPage = $request->length ?? 10;
            $currentPage = ($request->start / $perPage) + 1;
            $competitions = $query->paginate($perPage, ['*'], 'page', $currentPage);

            // Prepare data for DataTables response
            $data = $competitions->items();
            $response = [
                'draw' => $request->draw,
                'recordsTotal' => $competitions->total(),
                'recordsFiltered' => $competitions->total(),
                'data' => $data,
            ];

            return response()->json($response);
        }

        return view('admin::predictions.index');
    }


       public function set($id = 0)
    {
        if ($id == 0) {
           return redirect()->back();
        } else {
          
          $answersQuery = PredictionAnswer::PredAnswerById($id)->toArray();
         // dd(  $answersQuery );
          $answers = empty($answersQuery) ? null : $answersQuery; 
       

          $quizzes = PredictionQuestion::isActive();
          $match= Predictions::fetchPredictionById($id);
        
            return view('admin::predictions.predictionsetresult',compact('answers','quizzes','match'));
        }
        
    }

      public function savePredictionResult(Request $request)
    {
        $scoreHome = trim($request->input('score_home'));
        $scoreAway = trim($request->input('score_away'));
        
        $predId = $request->input('pred_id');
        $answer=$request->input('answers') ;
       
        $score = $scoreHome . ' : ' . $scoreAway;
        $answers = [];
        $count = 1;
       
        foreach ($answer as $quesId => $ansValue) {
            $getPredType = Predictions::getPredictionType($predId);
            $answers[] = [
                'pred_id' => $predId,
                // 'pred_type' => $getPredType->prediction_type,
                'ques_id' => $quesId,
                'ans' => ($count == 1) ? $score : $ansValue,
                'created_at' =>date("Y-m-d H:i:s"),
            ];
            $count++;
        }

    
        
        $insertResult = PredictionAnswer::insertFinalPrediction($answers, $predId);
        $updateScore = Predictions::updateScore($predId, $scoreHome, $scoreAway);
        
     
        if ($insertResult) {
            $winn = $this->send_winner_gift($predId);
           
            if ($winn) {
                session()->flash('msg', 'Answer successfully submitted and winners processed.');
            } else {
                session()->flash('msg', 'Answer successfully submitted but unable to update user points.');
            }
        } else {
            session()->flash('msg', 'Error submitting answer.');
        }

        return redirect('/admin/prediction');
    }
    public function send_winner_gift($pid)
    {

        $stat = Predictions::getWinnerStatus($pid, 0);
        if ($stat->winner_status == 0) {
            $winners = PlayedPrediction::getWinners($pid)->get();
          
            if (!empty($winners)) {
                 $prize_log =null;
                foreach ($winners as $winner) {

                    $predStartEndDate = Predictions::PredStartEndDate($winner->pred_id)->first();
                   
                     $prize_log= PredictionPrizeHistory::create([
                        'pred_id' => $winner->pred_id,
                        'pred_type' => $stat->prediction_type,
                        'user_id' => $winner->user_id,
                        'coin_won' => $winner->coins,
                        'created_at' => date("Y-m-d H:i:s"),
                        'prediction_start_time' => $predStartEndDate->pred_start,
                        'prediction_end_time' => $predStartEndDate->pred_end,
                        'match_start_time' => $predStartEndDate->match_start
                    ]);

                     $update_coins= UserModel::UpdateTotalCoins($winner->user_id, $winner->coins);

                }
               
               if (!empty($prize_log)){
                 $statss=Predictions::getWinnerStatus($pid, 1);
                
                return true;
                }
            } else {
                
                return false;

            }
        } else {            
            return false;
        }
    }

   


    public function create()
    {
        $league_details = Leagues::getAllLeagues();

        // IDs to exclude
        $excludeIds = [24, 1538, 968, 732, 1326, 1085, 779];

        // Filter the leagues
        $league_details = array_filter($league_details, function ($league) use ($excludeIds) {
            return !in_array($league->sportsmonks_id, $excludeIds);
        });

        // Reset the array keys
        $league_details = array_values($league_details);

        return view('admin::predictions.create', compact('league_details'));
    }


    public function sumbitprediction(Request $request){

        $data = $request->all();

         $cacheKey = 'index_data';
         Cache::forget($cacheKey);

        if(!empty($data))
        {   

            $predictionObj = new Predictions();

            $adminTimezone = $request->session()->get('local_timezone', 'Asia/Jakarta');

            // $start=$data['prediction_start'];
            // $date = strtotime($start);
            // $start_date=date('Y-m-d H:i:s' ,$date);

            // $last=$data['prediction_end'];
            // $date1 = strtotime($last);
            // $end_date=date ('Y-m-d H:i:s' , $date1);
            
            $start_date = Carbon::parse($data['prediction_start'], $adminTimezone)->utc()->toDateTimeString();
            $end_date = Carbon::parse($data['prediction_end'], $adminTimezone)->utc()->toDateTimeString();

            if(isset($data['match']))
            {
                
            
                
       
                $match_id = $data['match'][0];
                $postdata = array('fixture_id' => $match_id);

                 $basic=config('global.basic');
                $query_url = $basic."fixtureDetails";

                $result = $this->curlGet($query_url,$postdata);
                $output = json_decode($result);
                $league_id = $data['leagues'];

                $league_details=Leagues::getLeagueData($league_id);

                $predictionObj['match_id']=$match_id;
                $predictionObj['league_id']=$league_id;
                $predictionObj['league_name']=$league_details->competition_name;
                $predictionObj['league_logo']=$league_details->old_logo;

                $predictionObj['home_team_id']=$output->match->homeTeam->id;
                $predictionObj['home_team_name']=$output->match->homeTeam->name;
                $predictionObj['home_team_logo']=$output->match->homeTeam->image_path;
                $predictionObj['score_home']=$output->match->homeTeam->score;

                $predictionObj['away_team_id']=$output->match->awayTeam->id;

                $predictionObj['away_team_name']=$output->match->awayTeam->name;
                $predictionObj['away_team_logo']=$output->match->awayTeam->image_path;
                $predictionObj['score_away']=$output->match->awayTeam->score;
        
                $predictionObj['match_start_time']=$output->match->date_time;
                $predictionObj['status']=$output->match->status;
                $predictionObj['venue']=$output->match->venue->name;
                $predictionObj['venue_image']=$output->match->venue->image_path;

                $predictionObj['group_name'] = $data['group_name'];
                $predictionObj['prediction_type'] = $data['prediction_type'];
                $predictionObj['prediction_start_time']=$start_date ;
                $predictionObj['prediction_end_time']= $end_date;
                $predictionObj['is_active']= 1;
                $predictionObj['is_end']= 0;
                $predictionObj['winner_status']= 0;
                $predictionObj['created_at']= date('Y-m-d H:i:s');
                $predictionObj['updated_at']= date('Y-m-d H:i:s');

                $result = $predictionObj->save();
               
                if($result){
                    return Redirect::to('/admin/prediction');
                }else{
                    return Redirect::to('/test');
                }

            }
        }
    }


    public function editprediction(Request $request){

        $predictionDetails = Predictions::fetchPredictionById($request['id']);

        $league_details = Leagues::getAllLeagues();

        // IDs to exclude
        $excludeIds = [24, 1538, 968, 732, 1326, 1085, 779];

        // Filter the leagues
        $league_details = array_filter($league_details, function ($league) use ($excludeIds) {
            return !in_array($league->sportsmonks_id, $excludeIds);
        });

        // Reset the array keys
        $league_details = array_values($league_details);
        
        $leagie_id = $predictionDetails->league_id;
        $basic=config('global.basic');
        $url = $basic."getMatches";

        $from = array('league_id' => $leagie_id);
        $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
        $response=$responseData['matches'];

        return view('admin::predictions.edit',compact('predictionDetails','league_details','response'));
    }

    public function delete(Request $request)
    {   

         $delete= Predictions ::deletePredictionById($request['id']);

        $cacheKey = 'index_data';
         Cache::forget($cacheKey);

       if($delete){
         $res['status'] = true;
        }else {
            $res['status'] = false;          
        }
        echo json_encode($res);
    }

 public function update_status(Request $request)
    {
        $res = [];
        $id = $request->id;
        
        $status = $request->status;
        
        if ($status) {
            $msg = 'Prediction is active';
        }else {
            $msg = 'Prediction is inactive';
        }

       
        $dt = Predictions::find($id);
        
        $dt->is_active = $status;


        if ($dt->save()) {
            $res['status'] = true;
            $res['msg'] = $msg;
        }else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';
        }

        $cacheKey = 'index_data';
         Cache::forget($cacheKey);
        echo json_encode($res);
    }


   

    public function updateprediction(Request $request){
           
            $cacheKey = 'index_data';
            Cache::forget($cacheKey);
            $data=$request->all();
            $adminTimezone = $request->session()->get('local_timezone', 'Asia/Jakarta');
            $start_date = Carbon::parse($data['prediction_start'], $adminTimezone)->utc()->toDateTimeString();
            $end_date = Carbon::parse($data['prediction_end'], $adminTimezone)->utc()->toDateTimeString();
            // $start=$data['prediction_start'];
            // $date = strtotime($start); 
            // $start_date=date('y-m-d h:i:s' ,$date);

            // $last=$data['prediction_end'];
            // $date1 = strtotime($last);
            // $end_date=date ('y-m-d h:i:s', $date1);

            if(isset($data['match'])){

               $data['id']= $data['prediction_tableId'];
               $prediction = Predictions ::predictionExits($data['prediction_tableId']);

               if($prediction){

                $match_id = $data['match'][0];
                $postdata = array('fixture_id' => $match_id);        

                $basic=config('global.basic');
                $query_url = $basic."fixtureDetails";
                
                $result = $this->curlGet($query_url,$postdata);
                $output = json_decode($result);
                $league_id = $data['leagues'];
                $league_details=Leagues::getLeagueData($league_id);

                $prediction= array();

                $prediction['id']= $data['prediction_tableId'];
                $prediction['match_id']=$match_id;
                $prediction['league_id']=$league_id;
                $prediction['league_name']=$league_details->competition_name;
                $prediction['league_logo']=$league_details->old_logo;

                $prediction['home_team_id']=$output->match->homeTeam->id;
                $prediction['home_team_name']=$output->match->homeTeam->name;
                $prediction['home_team_logo']=$output->match->homeTeam->image_path;
                $prediction['score_home']=$output->match->homeTeam->score;

                $prediction['away_team_id']=$output->match->awayTeam->id;
                $prediction['away_team_name']=$output->match->awayTeam->name;
                $prediction['away_team_logo']=$output->match->awayTeam->image_path;
                $prediction['score_away']=$output->match->awayTeam->score;
        
                
                $prediction['match_start_time']=$output->match->date_time;
                $prediction['status']=$output->match->status;
                $prediction['venue']=$output->match->venue->name;
                $prediction['venue_image']=$output->match->venue->image_path;

                $prediction['group_name'] = $data['group_name'];
                $prediction['prediction_type'] = $data['prediction_type'];
                $prediction['prediction_start_time']=$start_date ;
                $prediction['prediction_end_time']= $end_date;
                $prediction['is_active']= 1;
                $prediction['is_end']= 0;
                $prediction['winner_status']= 0;
                $prediction['created_at']= date('Y-m-d H:i:s');
                $prediction['updated_at']= date('Y-m-d H:i:s');

                $result = Predictions :: updatePrediction($prediction);
                // $result=$prediction->update();

            //     print_r($result);
            //     die("checking result");

                if($result){
                    return Redirect::to('/admin/prediction');
                }else{
                    return Redirect::to('/admin/test');
                }
                
               }

            }else{

                 $data['id']= $data['prediction_tableId'];
               $prediction = Predictions ::predictionExits($data['prediction_tableId']);

               if($prediction){

            
                $league_id = $data['leagues'];
                $league_details=Leagues::getLeagueData($league_id);

                $prediction= array();

                $prediction['id']= $data['prediction_tableId'];
                $prediction['league_id']=$league_id;
                $prediction['league_name']=$league_details->competition_name;
                $prediction['league_logo']=$league_details->old_logo;

                

                $prediction['group_name'] = $data['group_name'];
                $prediction['prediction_type'] = $data['prediction_type'];
                $prediction['prediction_start_time']=$start_date ;
                $prediction['prediction_end_time']= $end_date;
                $prediction['is_active']= 1;
                $prediction['is_end']= 0;
                $prediction['winner_status']= 0;
                $prediction['updated_at']= date('Y-m-d H:i:s');

                $result = Predictions :: updatePrediction($prediction);





                if($result){
                    return Redirect::to('/admin/prediction');
                }else{
                    return Redirect::to('/admin/test');
                };
            }
        
        }
    }

    public function show($id)
    {
        return view('admin::show');
    }

    public static function getmatches(Request $request){

        $leagie_id = $request->input('id');
        $start_date=$request->input('start_date');
        $from = array('league_id' => $leagie_id,
                      'start_date' =>$start_date);
        
        $basic=config('global.basic');
        $url =$basic.config('global.getmatches');
         $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
         

        $response['data']=$responseData['matches'];

        return $response;      
    }

    





    public function curlGet($query_url, $data=array())
    {
        $ch = curl_init($query_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: multipart/form-data'
        ));

        $response = curl_exec ($ch);
        $err = curl_error($ch); //if you need
        curl_close ($ch);
        return $response;
    }

    
}
