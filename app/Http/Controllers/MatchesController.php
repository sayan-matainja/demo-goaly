<?php

namespace App\Http\Controllers;
use App\Common\Utility;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use App\League;
use App\UserMatchComments;
use App\Http\Requests\commentRequest;
use Modules\Admin\Entities\MatchVideos;
use Illuminate\Support\Facades\Cache;

use DateTime;
use DateTimeZone;
use App\UserFavouriteTeam;
use Session;
use DB;


class MatchesController extends Controller
{

    public function index_old()
    {
        $basic=config('global.basic');
        $url =config('global.LeaguesDetails');
        $from=array('page' => 'live');
        // $url='http://smartcms.goaly.mobi/api/addusercomment';
        // $from=array('user_id'=>63607, 'match_id'=>18452084, 'comment'=>'hello');
        $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
        //dd($responseData);
        $response= $responseData['leagues'];
        //dd($response);
        return view('matches.index',compact('response'));

    }

    //10.05.2022
    public function index()
    {
        $time_zone = "asia/kolkata";//$_COOKIE["fcookie"];

        $matches = [];

        $league_details = League::GetleagueRecord();
        // return view('matches.index',compact('matches'));
        return view('matches.index',compact('matches','time_zone','league_details'));
    }

    public function matches_standing()
    {
        $url =config('global.LeaguesDetails');
        $from=array('page' => 'live');
        $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
        $response= $responseData['leagues'];
        return view('matches.matches_standing',compact('response'));
        //return view('matches.matches_standing');
    }


    //10.05.2022
    public function team_details($id)
    {
        $team_id = $id;
        $utility = new Utility;
        $basic=config('global.sportsMonks_url');
        $url =$basic.config('global.clubDetails');
        $from=array('club_id' => $team_id);
        $responseData=$utility->getResponse($url,$from);

        $trophies_raw=$responseData['clubtrophies']??'';
        $trophies=$trophies_raw??'';

        // dd($trophies);

        $team_nm = $responseData['team_details']['team']??'';
        $team_code = $responseData['team_details']['team_name'] ?? ''; 
        $team_lgo = $responseData['team_details']['team_logo'];
        $league_id = $responseData['team_details']['league_id']??'';
        $league_name = $responseData['team_details']['team_league']??'';
        $country = $responseData['team_details']['team_country']??'';
        $city = $responseData['team_details']['team_city']??'';
        $venue = $responseData['team_details']['team_venuename'];
        $season_id = $responseData['team_details']['season_id'];
        $season_name = $responseData['team_details']['season_name'];
        $isFavteam='0';

        
        $teamSeasonInfo=$responseData??'';
        $coaches = $responseData['season_info']['Coaches']['data'] ?? null;
        $coaches = collect($coaches) 
        ->sortByDesc(function ($coach) {
            return $coach['active'] ? 1 : 0; 
        })
        ->sortByDesc(function ($coach) {
            return strtotime($coach['end']); 
        })
        ->values() // reset keys
        ->all();
        $teamTopPlayers=$responseData['clubTopplayers']??'';
        $UserId= Session::get('UserId');
        $table_id=0;
        if (!empty($UserId)) {
            $userChuch = UserFavouriteTeam::UserFavourite($UserId)->get();

            foreach ($userChuch as $favteam) {
                if ($team_id == $favteam->id) {
                    $table_id=$favteam->table_id;
                    $isFavteam = '1';
                    break; 
                }
            }
        }
        return view('matches.club_details',compact('team_id','team_nm','team_code','team_lgo','league_id','league_name','country','venue','city','season_id','season_name','trophies','isFavteam','teamSeasonInfo','table_id','teamTopPlayers','coaches'));
    }


public function teamMatches($id)
{
    $team_id = $id;
    $utility = new Utility;
    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.clubLastAndPreMatch');
    $from=array('club_id' => $team_id,
);
    $responseData=$utility->getResponse($url,$from);
    $pastMatches=$responseData['past_matches'];
    $futureMatches=$responseData['future_matches'];
    return compact('pastMatches','futureMatches');
}

public function teamBasicInfo($team_id)
{
    $details=[];
    $utility = new Utility;
    $basic=config('global.basic');
    $url =$basic.config('global.getTeamDetails');
    $from=array('team_id' => $team_id);
    $responseData=$utility->getResponse($url,$from);
    if(count($responseData['details'])>0){
        $details=$responseData['details'][0];
    }
    return $details;
}
public function teamTrophies($team_id)
{
    $details=[];
    $utility = new Utility;
    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.clubTrophies');
    $from = array('club_id' => $team_id);
    $responseData=$utility->getResponse($url,$from);
    $trpohies= $responseData['trophies'];
    return $trpohies;
}

public function teamSeasonInfo($team_id,$season_id)
{
    $details=[];
    $utility = new Utility;
    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.teamSeasonInfo');
    $from = ['club_id' => $team_id, 'season_id' => $season_id];
    $responseData=$utility->getResponse($url,$from);

    return $responseData;
}
public function teamTeamScorer($team_id)
{
    $utility = new Utility;
    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.clubTopPlayers');
    $from=array('club_id' => $team_id);
    $details=$utility->getResponse($url,$from);
    if($details['success']==0){
        $details=[];
    }
    return $details;
}

public function teamMatchesByRound($team_id)
{
    $utility = new Utility;
    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.MatchesByRound');
    $from=array('club_id' => $team_id);
    $details=$utility->getResponse($url,$from);
    if($details['success']==0){
        $details=[];
    }
    return $details;
}
public function teamYellowAndRedcard($team_id)
{
    $utility = new Utility;
    $basic=config('global.basic');
    $url =$basic.'YellowAndRedcard';
    $from=array('team_id' => $team_id);
    $details=$utility->getResponse($url,$from);
    if($details['success']==0){
        $details=[];
    }
    return $details;
}
public function TeamPlayers($team_id,$season_id)
{
    $utility = new Utility;
    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.teamPlayers');        
    $from = ['club_id' => $team_id, 'season_id' => $season_id];
    $details=$utility->getResponse($url,$from);
    if($details['success']==0){
        $details=[];
    }
    return $details;
}
public function TeamByStanding($team_id)
{
    $detailsl=[];
    $utility = new Utility;
    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.clubStanding');    
    $from=array('club_id' => $team_id);
    $responseData=$utility->getResponse($url,$from);
        // dd($responseData);
    if(isset($responseData['standing'])){
        if(isset($responseData['standing'][0]['data']))
            $detailsl=$responseData['standing'];
    }

    return $detailsl;
}
public function TeamByStats($team_id)
{
    $detailsl=[];
    $utility = new Utility;
    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.teamscoredetails');
    $from=array('team_id' => $team_id);
    $responseData=$utility->getResponse($url,$from);
        // if(isset($responseData['standing'])){
        //     if(isset($responseData['standing'][0]['data']))
        //     $detailsl=$responseData['standing'][0]['data'];
        // }
    return $responseData['total'];
}
    //12.05.2022
public function match_details(Request $request,$id)
{
    $details=[];
    $sportsmonk=config('global.sportsMonks_url');
    $urll=$sportsmonk.config('global.getMatchnews');
    $url_n =$sportsmonk.config('global.getLastMatchByTeam');

    $utility = new Utility;

    $from=array('id'=>$id);
    $response=$utility->getResponse($sportsmonk.config('global.fixtureDetails'),$from);
    if(isset($response['match_details'])){
        $details=$response['match_details']['0'];
    }
    $lineups_raw=$utility->getResponse($sportsmonk.config('global.matchComments&Lineup'),$from);

    $matchstats_raw=$utility->getResponse($sportsmonk.config('global.matchStatsDetails'),array('match_id'=>$id));



    $lineups=[];
    $awaylineups=[];
    if(isset($lineups_raw['match_details']['0']['lineup']) && !empty($lineups_raw['match_details']['0']['lineup'])){
        $position = array();
        $lineups=$lineups_raw['match_details']['0']['lineup'];
        foreach ($lineups as $key => $row)
        {

            $position[$key] = $row['formation_position'];
        }
        array_multisort($position, SORT_ASC, $lineups_raw['match_details']['0']['lineup']);
        $lineups=$lineups_raw['match_details']['0']['lineup'];
        array_multisort($position, SORT_DESC, $lineups_raw['match_details']['0']['lineup']);
        $awaylineups=$lineups_raw['match_details']['0']['lineup'];
    }
    $timezone = $request->session()->get('local_timezone',"Asia/ Jakarta");


    $m_time=$details['date_time'];
    $match_time = Utility::getUtcToLocal($details['date_time'],$timezone,"Y-m-d H:i");


    $details['date_time'] = $match_time;

        // stats
    $Shot=$Shots=$ShotOnTarget=$ShotOnTargets=$Possession=$Possessions=$Passe=$Passes=$PassAccuracy=$PassAccuracys=$Foul=$Fouls=$Corner=$Corners='';

    if (isset($matchstats_raw['match_statsdetails'][0]['shots_total'], $matchstats_raw['match_statsdetails'][1]['shots_total'])) {
        $totalShots = $matchstats_raw['match_statsdetails'][0]['shots_total'] + $matchstats_raw['match_statsdetails'][1]['shots_total'];
        $Shot = $totalShots > 0 ? (100 * $matchstats_raw['match_statsdetails'][0]['shots_total']) / $totalShots : 0;
        $Shots = $totalShots > 0 ? (100 * $matchstats_raw['match_statsdetails'][1]['shots_total']) / $totalShots : 0;
    }

    if (isset($matchstats_raw['match_statsdetails'][0]['shots_ongoal'], $matchstats_raw['match_statsdetails'][1]['shots_ongoal'])) {
        $totalShotsOnGoal = $matchstats_raw['match_statsdetails'][0]['shots_ongoal'] + $matchstats_raw['match_statsdetails'][1]['shots_ongoal'];
        $ShotOnTarget = $totalShotsOnGoal > 0 ? (100 * $matchstats_raw['match_statsdetails'][0]['shots_ongoal']) / $totalShotsOnGoal : 0;
        $ShotOnTargets = $totalShotsOnGoal > 0 ? (100 * $matchstats_raw['match_statsdetails'][1]['shots_ongoal']) / $totalShotsOnGoal : 0;
    }

    if (isset($matchstats_raw['match_statsdetails'][0]['possessiontime'], $matchstats_raw['match_statsdetails'][1]['possessiontime'])) {
        $totalPossession = $matchstats_raw['match_statsdetails'][0]['possessiontime'] + $matchstats_raw['match_statsdetails'][1]['possessiontime'];
        $Possession = $totalPossession > 0 ? (100 * $matchstats_raw['match_statsdetails'][0]['possessiontime']) / $totalPossession : 0;
        $Possessions = $totalPossession > 0 ? (100 * $matchstats_raw['match_statsdetails'][1]['possessiontime']) / $totalPossession : 0;
    }

    if (isset($matchstats_raw['match_statsdetails'][0]['pass_total'], $matchstats_raw['match_statsdetails'][1]['pass_total'])) {
        $totalPass = $matchstats_raw['match_statsdetails'][0]['pass_total'] + $matchstats_raw['match_statsdetails'][1]['pass_total'];
        $Passe = $totalPass > 0 ? (100 * $matchstats_raw['match_statsdetails'][0]['pass_total']) / $totalPass : 0;
        $Passes = $totalPass > 0 ? (100 * $matchstats_raw['match_statsdetails'][1]['pass_total']) / $totalPass : 0;
    }

    if (isset($matchstats_raw['match_statsdetails'][0]['pass_accurate'], $matchstats_raw['match_statsdetails'][1]['pass_accurate'])) {
        $totalPassAccurate = $matchstats_raw['match_statsdetails'][0]['pass_accurate'] + $matchstats_raw['match_statsdetails'][1]['pass_accurate'];
        $PassAccuracy = $totalPassAccurate > 0 ? (100 * $matchstats_raw['match_statsdetails'][0]['pass_accurate']) / $totalPassAccurate : 0;
        $PassAccuracys = $totalPassAccurate > 0 ? (100 * $matchstats_raw['match_statsdetails'][1]['pass_accurate']) / $totalPassAccurate : 0;
    }

    if (isset($matchstats_raw['match_statsdetails'][0]['fouls'], $matchstats_raw['match_statsdetails'][1]['fouls'])) {
        $totalFouls = $matchstats_raw['match_statsdetails'][0]['fouls'] + $matchstats_raw['match_statsdetails'][1]['fouls'];
        $Foul = $totalFouls > 0 ? (100 * $matchstats_raw['match_statsdetails'][0]['fouls']) / $totalFouls : 0;
        $Fouls = $totalFouls > 0 ? (100 * $matchstats_raw['match_statsdetails'][1]['fouls']) / $totalFouls : 0;
    }

    if (isset($matchstats_raw['match_statsdetails'][0]['corners'], $matchstats_raw['match_statsdetails'][1]['corners'])) {
        $totalCorners = $matchstats_raw['match_statsdetails'][0]['corners'] + $matchstats_raw['match_statsdetails'][1]['corners'];
        $Corner = $totalCorners > 0 ? (100 * $matchstats_raw['match_statsdetails'][0]['corners']) / $totalCorners : 0;
        $Corners = $totalCorners > 0 ? (100 * $matchstats_raw['match_statsdetails'][1]['corners']) / $totalCorners : 0;
    }


    $u_comments=UserMatchComments::GetUserComments($id)->get();
    $fromm=array('id'=>$id,
        'date_time'=>$m_time, 
        'hometeam'=>$details['home_team_name'],
        'awayteam'=>$details['away_team_name']);      
    $res=$utility->getResponse($urll,$fromm);
    $form_n = [
        'homeTeam' => $details['home_team_id'],
        'awayTeam' => $details['away_team_id']
    ];

    $response_match=$utility->getResponse($url_n,$form_n);

    $H_lastmatches=$response_match['homeTeam_match'];
    $A_lastmatches=$response_match['awayTeam_match'];

    $m_news = isset($res['News']) && !empty($res['News']) ? $res['News'] : null;
    $highlights=MatchVideos::getHighlights($id)->first();
    return view('matches.matches_details',compact('details','lineups','awaylineups','Shot','Shots','ShotOnTarget','ShotOnTargets','Possession','Possessions','Passe','Passes','PassAccuracy','PassAccuracys','Foul','Fouls','Corner','Corners','u_comments','timezone','m_news','H_lastmatches','A_lastmatches','highlights','matchstats_raw'));
}
public function match_details_old(Request $request,$id)
{

    $details=[];
    $basic=config('global.basic');
    $sportsmonk=config('global.sportsMonks_url');
    $urll=$sportsmonk.config('global.getMatchnews');

    $url_n =$sportsmonk.config('global.getLastMatchByTeam');

    $utility = new Utility;
    $url =$basic."fixtureDetails";
    $from=array('fixture_id'=>$id);
    $response=$utility->getResponse($url,$from);
    if(isset($response)){
        $details=$response['match'];
    }
    if(isset($response['message'])){
        return redirect()->back();
    }

    $lineups=[];
    $awaylineups=[];
    if(isset($details['lineup'])){
        $position = array();
        foreach ($details['lineup'] as $key => $row)
        {
            $position[$key] = $row['formation_position'];
        }
        array_multisort($position, SORT_ASC, $details['lineup']);
        $lineups=$details['lineup'];
        array_multisort($position, SORT_DESC, $details['lineup']);
        $awaylineups=$details['lineup'];
    }
    $timezone = $request->session()->get('local_timezone',"Asia/ Jakarta");


    $m_time=$details['date_time'];
    $match_time = Utility::getUtcToLocal($details['date_time'],$timezone,"Y-m-d H:i");


    $details['date_time'] = $match_time;

        // stats
    $Shot=$Shots=$ShotOnTarget=$ShotOnTargets=$Possession=$Possessions=$Passe=$Passes=$PassAccuracy=$PassAccuracys=$Foul=$Fouls=$Corner=$Corners='';

    if (isset($details['stats'][0]['shots']['total'])){
        $totals=$details['stats'][0]['shots']['total']+$details['stats'][1]['shots']['total'];
        $Shot=(100*$details['stats'][0]['shots']['total'])/$totals;
        $Shots=(100*$details['stats'][1]['shots']['total'])/$totals;
    }
    if (isset($details['stats'][0]['shots']['ongoal'])){
     $totals=$details['stats'][0]['shots']['ongoal']+$details['stats'][1]['shots']['ongoal'];
     $ShotOnTarget=(100*$details['stats'][0]['shots']['ongoal'])/$totals;
     $ShotOnTargets=(100*$details['stats'][1]['shots']['ongoal'])/$totals;
 }
 if (isset($details['stats'][0]['possessiontime']))
 {
    $totals=$details['stats'][0]['possessiontime']+$details['stats'][1]['possessiontime'];
    $Possession=(100*$details['stats'][0]['possessiontime'])/$totals;
    $Possessions=(100*$details['stats'][1]['possessiontime'])/$totals;
}
if (isset($details['stats'][0]['passes']['total']))
{
    $totals=$details['stats'][0]['passes']['total']+$details['stats'][1]['passes']['total'];
    $Passe=(100*$details['stats'][0]['passes']['total'])/$totals;
    $Passes=(100*$details['stats'][1]['passes']['total'])/$totals;
}
if (isset($details['stats'][0]['passes']['accurate']))
{
    $totals=$details['stats'][0]['passes']['accurate']+$details['stats'][1]['passes']['accurate'];
    $PassAccuracy=(100*$details['stats'][0]['passes']['accurate'])/$totals;
    $PassAccuracys=(100*$details['stats'][1]['passes']['accurate'])/$totals;
}
if (isset($details['stats'][0]['fouls']))
{
    $totals=$details['stats'][0]['fouls']+$details['stats'][1]['fouls'];
    $Foul=(100*$details['stats'][0]['fouls'])/$totals;
    $Fouls=(100*$details['stats'][1]['fouls'])/$totals;
}
if (isset($details['stats'][0]['corners'])){
    $totals=$details['stats'][0]['corners']+$details['stats'][1]['corners'];
    $Corner=(100*$details['stats'][0]['corners'])/$totals;
    $Corners=(100*$details['stats'][1]['corners'])/$totals;
}


$u_comments=UserMatchComments::GetUserComments($id)->get();
    // dd( $u_comments);
$fromm=array('id'=>$id,
    'date_time'=>$m_time, 
    'hometeam'=>$details['homeTeam']['name'],
    'awayteam'=>$details['awayTeam']['name']);      
$res=$utility->getResponse($urll,$fromm);
$form_n = [
    'homeTeam' => $details['homeTeam']['id'],
    'awayTeam' => $details['awayTeam']['id']
];

$response_match=$utility->getResponse($url_n,$form_n);

$H_lastmatches=$response_match['homeTeam_match'];
$A_lastmatches=$response_match['awayTeam_match'];

$m_news = isset($res['News']) && !empty($res['News']) ? $res['News'] : null;

$highlights=MatchVideos::getHighlights($id)->first();

return view('matches.matches_details',compact('details','lineups','awaylineups','Shot','Shots','ShotOnTarget','ShotOnTargets','Possession','Possessions','Passe','Passes','PassAccuracy','PassAccuracys','Foul','Fouls','Corner','Corners','u_comments','timezone','m_news','H_lastmatches','A_lastmatches','highlights'));
}

public function matchTimeline($id)
{
    $basic = config('global.basic');
    $url = $basic . "comments";
    $utility = new Utility;

    $response = $utility->getResponse($url, ['fixture_id' => $id]);

    $comments = [];
    $status = null;
    if (isset($response['success'])){
        $details = $response['match'];

        if(!empty($details['comments'])) {
            usort($details['comments'], fn($a, $b) => $b['order'] <=> $a['order']);
            $comments = $details['comments'];
        }
        $status = $details['status'];
    }
    return compact('comments', 'status');
}

public function HandToHand($homeTeamId, $awayTeamId)
{
    $details=[];
    $utility = new Utility; 

    $basic=config('global.sportsMonks_url');
    $url=$basic.config('global.handTwoHand');        
    $from=array('homeTeam'=>$homeTeamId,
        'awayTeam'=>$awayTeamId,
    );             

    $response=$utility->getResponse($url,$from);
    if(isset($response['success'])){
        $details=$response;
    }
    return $details;
}
public function matchplayers($fixture_id)
{
    $details=[];
    $basic=config('global.sportsMonks_url');
    $utility = new Utility;
    $url =$basic.config('global.getMatchPlayersStatsById');
    $from=array('id' =>$fixture_id);
    $response=$utility->getResponse($url,$from);
    if(isset($response['match_players_stats'])&& !empty($response['match_players_stats'])){
        $details=$response['match_players_stats']['0']??[];
    }
    return $details;
}
    //17.05.2022
public function matchDetails(Request $request)
{
    $fixture_id = $request->input('fixture_id');
    $postdata = array('fixture_id' => $fixture_id);

    $query_url = "http://apigoaly.code-dev.in/api/getMatchDetails";
    $result = $this->curlGet($query_url,$postdata);
    $output = json_decode($result);

    if($output->success == 1)
    {
        $date_time = $output->details[0]->date_time;
        if(!empty($date_time))
        {
            $date_time_split = explode(" ", $date_time);
            $date = $date_time_split[0];
            $time = $date_time_split[1];

            return Response()->json([
                "massage" => "Match info.",
                "date_time" => $date_time,
                "date" => $date,
                "time" => $time,
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
    else
    {
        return Response()->json([
            "massage" => "No data found",
            "success" => 0,
            "error" => 1
        ]);
    }
}

public function matches_lineup($id)
{
    $utility = new Utility;
    $responseData=$utility->matchDetails($id);
    $details=$responseData['match_details'][0];
    $position = array();

    foreach ($details['lineup'] as $key => $row)
    {
        $position[$key] = $row['formation_position'];
    }

    array_multisort($position, SORT_ASC, $details['lineup']);
    $lineups=$details['lineup'];
    foreach ($details['lineup'] as $key => $row)
    {
        $position[$key] = $row['formation_position'];
    }
    array_multisort($position, SORT_DESC, $details['lineup']);
    $awaylineups=$details['lineup'];
        //dd($lineups);
    return view('matches.matches_lineup',compact('details','lineups','awaylineups'));
}

public function matches_stat()
{
    return view('matches.matches_stat');
}


public function matches_comment($id)
{
    $utility = new Utility;
    $responseData=$utility->matchDetails($id);
    $details=$responseData['match_details'][0];
    $order = array();
    foreach ($details['comments'] as $key => $row)
    {
        $order[$key] = $row['order'];
    }
    array_multisort($order, SORT_DESC, $details['comments']);
    $comments=$details['comments'];
        //dd($details['comments']);
    return view('matches.matches_comment',compact('details','comments'));
}

public function getleagues()
{
    $url =config('global.LeaguesDetails');
    $from=array('page' => 'live');
    $utility = new Utility;
    $responseData=$utility->getResponse($url,$from);
    return $responseData['leagues'];
        //dd($responseData['leagues']);

}

public function matchByLeague($id,$day)
{
      //dd($day);
    $match= League::findSportsmonksId($id)->first();
    $league_id=$match->sportsmonks_id;
    //$league_id=301;
    if($day==1)
      $type='yesterday';
  elseif($day==2)
    $type='today';
elseif($day==3)
    $type='tomorrow';
if($day==4)
    $from=array('league_id'=>$league_id);
else
    $from=array('league_id'=>$league_id,'type' => $type);
    //dd($from);


$basic=config('global.basic');
$url =$basic.config('global.liveMatchDetailsUrl');
    //dd($url);
    //$url='config('global.sportsMonks_url')SportsMonks/liveMatches_sportsmonks';
    //$from=array('league_id'=>$league_id);
$utility = new Utility;
$responseData=$utility->getResponse($url,$from);
    //$responseData=$utility->matchDetailsByLeague($league_id,$day);
    //dd($responseData[0]['homeTeam']);
$responseMatch = array();
foreach ($responseData as $x =>$value) {
            //dd($value);
    $responseHomeTeam = json_decode($value['homeTeam'], TRUE);

    $responseAwayTeam = json_decode($value['awayTeam'], TRUE);
    array_push($responseMatch, [$responseHomeTeam,$responseAwayTeam,$value['status'],$value['date_time'],$value['season_id'],$value['league_id'],$value['id']]);

}
          //dd($responseMatch);
        //dd($responseMatch);
return $responseMatch;
}

    // public function matchByStanding($id)
    // {
    // $utility = new Utility;
    // $responseData=$utility->matchesStanding($id);
    // return $responseData;
    // }
public function advanceStats()
{
    return view('matches.detail_match_stats_advance');
}
public function userCommnent(commentRequest $request)
{
    $data = $request->all();
        #create or update your data here
    $dataArr=array();
    $dataArr['comment']=isset($data['comment'])?$data['comment']:null;
    $dataArr['match_id']=isset($data['match_id'])?$data['match_id']:null;
    $dataArr['user_id']=Session::get('UserId');
    if( $dataArr['comment']!=null)
    {


        $result = UserMatchComments::create($dataArr);
    }
    $r = UserMatchComments::GetUserComments($dataArr['match_id'])->get();
    $result=isset($r)?$r:null;
    return $result;

}

public function teamDetail($id)
{
    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.teamDetail');
    $from=array('id' =>$id);
    $utility = new Utility;
    $matches=$utility->getResponse($url,$from);
    $url =$basic.config('global.newsForTeam');
    $news=$utility->getResponse($url,$from);
    $url =$basic.config('global.teamStanding');
    $standing=$utility->getResponse($url,$from);
    $url =$basic.config('global.etteamplayers');
    $players=$utility->getResponse($url,$from);

    return view('matches.team_detail',compact('matches','news','standing','players'));
}

public function playerDetails($pid)
{ 
    // $cacheKey = 'player_details_' . $pid;
    // $cacheDuration = now()->addHours(1); 
    // $cachedPlayerDetails = Cache::get($cacheKey);

    // if ($cachedPlayerDetails) {
    //     return $cachedPlayerDetails;
    // }

    $basic = config('global.sportsMonks_url');
    $fromm = array('player_id' => $pid);
    $utility = new Utility;
    $url = $basic . config('global.playerbasicstats');
    $url2 = $basic . config('global.playersMatches');
    $url4 = $basic . config('global.playeradvstats');

    $playerstats = $utility->getResponse($url, $fromm);
    $player = !empty($playerstats['players']) ? $playerstats['players'] : null;

    $matches = $utility->getResponse($url2, $fromm);

    $playersmatches = !empty($matches['matches']) ? $matches['matches']['0'] : null;

    $adv = $utility->getResponse($url4, $fromm);

    $advStats = !empty($adv['Match_History']) ? $adv['Match_History'] : null;

    $view = view('matches.player_details', compact('player', 'playersmatches', 'advStats'))->render();
    // Cache::put($cacheKey, $view, $cacheDuration);
    return $view;
}


public function playerInfomatches(Request $request){

    $utility  = new Utility;
    $teamId   = $request['teamId'];
    $seasonId = $request['seasonId'];
    $leagueId = $request['leagueId'];

    $basic=config('global.sportsMonks_url');
    $url =$basic.config('global.playerInfoPageMatches');
    $from=array('league_id'=>$leagueId,'season_id'=>$seasonId,'team_id'=>$teamId);
    $response=$utility->getResponse($url,$from);


    return Response()->json($response);
}
public function playermatchDetails(Request $request){
    $utility = new Utility;
    $team = $request['team_id'];
    $position = $request['position'];
    $id = $request['match_id'];

    $basic=config('global.sportsMonks_url');
    $url3 =$basic.config('global.matchPlayerDetails');
    $fromm=array('team_id' =>$team,'position' =>$position,'match_id' =>$id);
    $response=$utility->getResponse($url3,$fromm);

    $playerDetails=$response['match_playerdetails'];
    return Response()->json($playerDetails);

}

public function playerNews($pid){
    $utility = new Utility;

    $basic=config('global.sportsMonks_url');
    $url3 =$basic.config('global.getPlayerNews');
    $fromm=array('player_id' =>$pid);
    $News=$utility->getResponse($url3,$fromm);
    $playersnews = !empty($News['news']) ? $News['news'] : null;
    return Response()->json($playersnews);
}

public function allTeamMatches(Request $request)
{
    $date = $request->input('date');
    $type = $request->input('type');

    $filter_date = date("d-m-Y", strtotime($date));

    if($type == "yesterday"){
        $data = array('end_date' => $filter_date);
    }
    elseif ($type == "today") {

        $data = array('start_date' => $filter_date , 'end_date' => $filter_date);
    }

    elseif ($type == "tomorrow") {
        $data = array('start_date' => $filter_date);
    }

    else
    {
        $data = '';
    }


    $client = new GuzzleClient();
    $URI = 'http://apigoaly.code-dev.in/api/getMatches';
    $params['headers'] = ['Content-Type' => 'multipart/form-data'];
    $params['form_params'] = array('start_date' => $filter_date);
    $response = $client->post($URI, $params);
    $result = $response->getBody();

    $output = json_decode($result);

    print_r($output);die("+++");

    if(isset($output) && !empty($output))
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

public function getmatches(Request $request)
{
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    $type = $request->input('type');
    $team_type = $request->input('team_type');
    $league_id = $request->input('league');
    $leagues[] =$league_id;

    $fav_teams=array();

    if($team_type =="myTeamTab"){
        $user_id= Session::get('UserId');              


        $userFav =UserFavouriteTeam::UserFavourite($user_id)->get()->toArray();

        if (!empty($userFav)) {
            $fav_teams=$userFav;
        }
    }


    $postdata = array(

     'fav_teams' =>$fav_teams,
     'league_id' => $league_id,
     'type' => $type,
     'start_date'=>$start_date,
     'end_date'=>$end_date

 );





    $basic=config('global.basic');
    $url =$basic.config('global.getmatches');


    $utility = new Utility;
    $responseData=$utility->getResponse($url,$postdata);

    $response= $responseData;

    return Response()->json($response);


}
public function getLivematches(Request $request)
{
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    $type = $request->input('type');
    $team_type = $request->input('team_type');
    $league_id = $request->input('league');
    $leagues[] =$league_id;

    $fav_teams=array();

    if($team_type =="myTeamTab"){
        $user_id= Session::get('UserId');              


        $userFav =UserFavouriteTeam::UserFavourite($user_id)->get()->toArray();

        if (!empty($userFav)) {
            $fav_teams=$userFav;
        }
    }



    $postdata = array(

     'fav_teams' =>$fav_teams,
     'league_id' => $league_id,
     'type' => $type,
     'start_date'=>$start_date,
     'end_date'=>$end_date

 );





    $basic=config('global.basic');
    $url =$basic.config('global.liveMatches');


    $utility = new Utility;
    $responseData=$utility->getResponse($url,$postdata);

    $response= $responseData;

    return Response()->json($response);


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


    //     public function matches_details_old($id)
    // {
    //     $utility = new Utility;
    //     $basic=config('global.basic');
    //     $url =$basic.config('global.match_detail_url');
    //     $from=array('id'=>$id);
    //     $responseData=$utility->getResponse($url,$from);
    //     if(count($responseData)>0){
    //     $details=$responseData['match_details'][0];
    //     $basic=config('global.basic');
    //     $url =$basic.config('global.handTwoHand');
    //     $from=array('homeTeam' => $details['homeTeam']['id'],'awayTeam' => $details['awayTeam']['id']);
    //     $handToHand=$utility->getResponse($url,$from);
    //     }
    //     else
    //     {
    //         $details="";
    //         $comments="";
    //         $lineups="";
    //         $awaylineups="";
    //         return view('matches.matches_details',compact('details','comments','lineups','awaylineups'));
    //     }

    //     //comments session
    //     $order = array();
    //     foreach ($details['comments'] as $key => $row)
    //     {
    //         $order[$key] = $row['order'];
    //     }
    //     array_multisort($order, SORT_DESC, $details['comments']);
    //     $comments=$details['comments'];
    //     //dd($details['comments']);
    //     //lineup session
    //     $position = array();

    //     foreach ($details['lineup'] as $key => $row)
    //     {
    //         $position[$key] = $row['formation_position'];
    //     }

    //     array_multisort($position, SORT_ASC, $details['lineup']);
    //     $lineups = $details['lineup'];
    //     foreach ($details['lineup'] as $key => $row)
    //     {
    //         $position[$key] = $row['formation_position'];
    //     }
    //     array_multisort($position, SORT_DESC, $details['lineup']);
    //     $awaylineups=$details['lineup'];
    //     //dd($details);
    //     return view('matches.matches_details',compact('details','comments','lineups','awaylineups','handToHand'));
    // }

}
