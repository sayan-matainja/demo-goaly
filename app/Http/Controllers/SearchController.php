<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\League;  
use Illuminate\Support\Facades\Http; 
use Illuminate\Support\Facades\Config;
use App\Common\Utility;

use GuzzleHttp\Client as GuzzleClient;
class SearchController extends Controller
{
    //
    public function index()
    {
        return view('search.index');
    }


        public function search_result($query)
    {
       

        $suggestion = League ::getSearchSuggestion($query);
        $data = [];
        if($suggestion!=false){


        foreach ($suggestion as $key) {
            $data[] = $key->name;
        }
    }
        if ($suggestion) {
            return response()->json([
                'suggestion' => $data,
                'success' => 1,
                'error' => 0
            ], 200);
        } else {
            return response()->json([
                'success' => 0,
                'error' => 1
            ], 200);
        }
    }

    public function playerSuggetions($query)
    {
        try {
            $basic = config('global.basic');
            $url = $basic . 'playerSuggetions';
            $params = ['term' => $query]; 

            $utility = new Utility();
            $responseData = $utility->getResponse($url, $params);
            if (isset($responseData['success']) && isset($responseData['suggestion'])) {
                $responseData['suggestion'] = is_array($responseData['suggestion']) ? $responseData['suggestion'] : [];
                return response()->json($responseData, 200);
            }

            return response()->json([
                'suggestion' => [],
                'success' => 0,
                'error' => 1,
                'message' => 'API response format error.'
            ], 500); 

        } catch (Exception $e) {
            return response()->json([
                'suggestion' => [],
                'success' => 0,
                'error' => 1,
                'message' => 'Failed to fetch player suggestions from external service.'
            ], 500);
        }
    }

    public function searchPlayerData(Request $request){
        $name= $request->input('query');
        $basic = config('global.basic');
        $url = $basic . config('global.playerByname');   

        $params = ['playerName' => $name]; 

        $utility = new Utility();
        $responseData = $utility->getResponse($url, $params);  
        return response()->json($responseData, 200);

    }
    public function searchTeamData(Request $request)
    {
       

        $teamname = $request->input('query');
        $teamData = League ::getteamdata($teamname);
        if (!$teamData) {
            return response()->json([
                'news' => [],
                'matches' => [],
                'messages' => 'No news or schedule available',
                'success' => 0,
                'error' => 1,
            ], 200);
        }
        $teamid = $teamData['id'];

        $utility = new Utility;
            $basic=config('global.basic');
            $url =$basic.'TeamLastAndPreMatch';
            $from=array('team_id' => $teamid,
                        'query' => $teamname, );
            $responseData=$utility->getResponse($url,$from);
            $pastMatches=$responseData['past_matches'];
            $futureMatches=$responseData['future_matches'];
            $teams=$responseData['teams'];
           return compact('pastMatches','futureMatches','teams');  


    }
}