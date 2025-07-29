<?php

namespace Modules\Prediction\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Domain\Entities\Domain;
use Modules\Prediction\Entities\League;
use Modules\Prediction\Entities\Prediction;
// use Modules\Faq\Entities\League;  
use Modules\Prediction\Entities\GoalyPredictionGame;
use Modules\Prediction\Http\Requests\PredictionRequest;
use App\Common\Utility;
class PredictionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
       // $all_domain = Domain::getAll()->orderBy('id', 'DESC')->where('is_deleted', null)->get();
       // $this->domains = $all_domain;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
    public function index()
    {
        $allCompetitions = Prediction::select('*')->orderBy('created_at', 'DESC')->get()->toarray();
        //dd($allCompetitions);
        return view('prediction::index',compact('allCompetitions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    public function create()
    {
        $league_details = League::select('*')->get()->toarray();
        //dd($league_details);
        return view('prediction::addprediction',compact('league_details'));
    }

    public function delete(Request $request){

        $delete_prediction= Prediction::where('id', '=', $request['id'])->delete();
        
        if($delete_prediction){
           
            $response['success'] =  1;
            return $response;
            // Test commit
            
        }
    }

    public function getmatches(Request $request){

        // $postdata=$request->input('id');
        $league_id = $request->input('league_id');
        $league = $league_id;
        $type = $request->input('type');

        $filter_start_date = date("Y-m-d", strtotime('first day of this month'));
        $filter_end_date = date("Y-m-d", strtotime('last day of this month'));

        $postdata = array('start_date' => $filter_start_date , 'end_date' => $filter_end_date, 'league' => $league);

        // $query_url = "http://apigoaly.code-dev.in/api/getMatches";
        $query_url ="http://apigoaly.code-dev.in/api/MatchesListByLeague";
        $result = $this->curlGet($query_url,$postdata);
        $output = json_decode($result);

        $output = json_decode($result);

        print_r($output);
        die("testing");

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    
    public function store(PredictionRequest $request)
    {
        // $utility = new Utility;
        // $basic=config('global.basic');
        // $url =$basic.config('global.match_detail_url');
        // $from=array('id'=>(int)$request->match[0]);
        // $responseData=$utility->getResponse($url,$from);
        $data =GoalyPredictionGame::get();
        dd($data);
        return $request->match[0];

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $basic="https://cms-dtac.th.goaly.mobi/";
        $url =$basic.config('global.MatchByLeague');
        $from=array('id' => $id);
        $utility = new Utility;
        $responseData=$utility->getResponse($url,$from);
        // $response= $responseData['leagues'];
        // dd($response);
        return $responseData;
    
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('prediction::edit');

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        
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

}
