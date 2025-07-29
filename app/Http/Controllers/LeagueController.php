<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\League;
use DB;
use App\Common\Utility;


class LeagueController extends Controller
{
    public function index()
    {
        $details = League::GetleagueRecord()->toArray();

        // IDs to exclude
        $excludeIds = [24, 1538, 968, 732, 1326, 1085];

        // Filter the leagues
        $filteredDetails = array_filter($details, function ($league) use ($excludeIds) {
            return !in_array($league['sportsmonks_id'], $excludeIds);
        });

        // Reset the array keys
        $details = array_values($filteredDetails);

        return view('League.index', compact('details'));
    }

        public function LastAndNextMatch($id)
    {

        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.lastAndNextMatch');
        $from=array('sportsmonks_id' => $id);
        $responseData=$utility->getResponse($url,$from);
       
        return response($responseData);
            
    }

    public function leagueTeams($league_id){
         $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.leagueTeam');
        $from=array('league_id' => $league_id);
        $responseData=$utility->getResponse($url,$from);
      
        return response($responseData);
    }

    public function leagueNews($league_id){
        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.leagueNews');
        $from=array('sportsmonks_id' => $league_id);
        $responseData=$utility->getResponse($url,$from);
      
        return response($responseData);
    }

    public function league_detail($id)
    {
        $league_id = $id;
        $details=[];
         $leagueDetails = League::GetLeagueDetailsBySportsmonkId($id);
        
        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.leagueDetail');
        $from=array('league_id' => $league_id);
        $responseData_1=$utility->getResponse($url,$from);
        if(count($responseData_1['standing'])>0)
        {
            $details = $responseData_1['standing'];
        }
            $details['competition_id'] =$leagueDetails['competition_id'];
            $details['logo'] =$leagueDetails['old_logo'];
        
        $url2 =$basic.config('global.leagueStats');
        $from2=array('comp_id' => $leagueDetails['competition_id']);
        $responseData=$utility->getResponse($url2,$from2);

        if($responseData['success']==1){
            $stats['goals']=$responseData['stats']['0']??NULL;
            $stats['assists']=$responseData['stats']['1']??NULL;
            $stats['y_card']=$responseData['stats']['2']??NULL;
            $stats['r_card']=$responseData['stats']['3']??NULL;
        }
        
       // dd($stats);


        return view('League.league_details',compact('league_id','details', 'stats'));
    }

    public function getLeague(Request $request)
    {
        $league_details = League::GetleagueRecord();

        if(!empty($league_details))
        {
            return Response()->json([
                "massage" => "League list.",
                "league" => $league_details,
                "success" => 1,
                "error" => 0
            ]);
        }
        else
        {
            return Response()->json([
                "massage" => "No data found",
                "success" => 0,
                "error" => 1
            ]);
        }
    }

    public function MatchesListByLeague(Request $request)
    {
        $league_id = $request->input('league_id');
        $league = $league_id;
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $type = $request->input('type');

        $filter_start_date = date("d-m-Y", strtotime($start_date));
        $filter_end_date = date("d-m-Y", strtotime($end_date));

        $postdata = array('start_date' => $filter_start_date ,'end_date' => $filter_end_date, 'league' => $league);

        $query_url = "http://apigoaly.code-dev.in/api/MatchesListByLeague";
        $result = $this->curlGet($query_url,$postdata);
        $output = json_decode($result);

        if(isset($output) && !empty($output))
        {
            if($output->success == 1)
            {
                $matches = $output->matches;

                return Response()->json([
                        "massage" => "Matches list.",
                        "matches" => $matches,
                        "success" => 1,
                        "error" => 0
                    ]);
            }
            else
            {
                return Response()->json([
                        "massage" => "No data found",
                        "success" => 0,
                        "error" => 1
                    ]);
            }
        }
    }

    public function curlGet($query_url, $data)
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
    public function LeagueRound($league_id)
    {
        $round=[];
        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.roundByLeague');
        $from=array('sportsmonks_id' => $league_id);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $round=$responseData['round_list'];
        }
        return $responseData;
    }
    public function LeagueMatch($league_id,$round_id)
    {
        $matches=[];
        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.matchesByRound');
        $from=array('league_id' => $league_id, 'round_id' => $round_id);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $matches=$responseData['matches'];
        }

        return $matches;
    }
    public function LeagueStanding($league_id)
    {
        $standing=[];
        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.leagueStanding');
        $from=array('sportsmonks_id' => $league_id,);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $standing=$responseData['standing'];
        }

        return $standing;
    }
    public function LeagueTopScores($league_id, $season_id)
    {
        $scores=[];
        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.leagueSeasonInfo');
        $from=array('league_id' => $league_id,'season_id' => $season_id);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $scores=$responseData['season_info'];
        }

        return $scores;
    }

    public function leagueStats($league_id)
    {
        
        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.leagueStats');
        $from=array('comp_id' => $league_id);
        $responseData=$utility->getResponse($url,$from);


        if($responseData['success']==1){
            $stats['goals']=$responseData['stats']['0'];
            $stats['assists']=$responseData['stats']['1'];
            $stats['y_card']=$responseData['stats']['2'];
            $stats['r_card']=$responseData['stats']['3'];
        }
        
        return $stats;
    }
    public function LeagueTopPlayers($league_id, $comp_id)
    {
        $players=[];
        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.leagueTopPlayers');
        $from=array('comp_id' => $comp_id);
        $responseData=$utility->getResponse($url,$from);
        if($responseData['success']==1){
            $players=$responseData['stats'];
        }
        return $players;
    }
}
