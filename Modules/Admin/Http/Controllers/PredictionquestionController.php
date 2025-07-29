<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\PredictionQuestion;
use Redirect;

class PredictionquestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
       //$all_domain = Domain::getAll()->orderBy('id', 'DESC')->where('is_deleted',null)->get();
       //$this->domains = $all_domain;
    }
    
    public function index()
    {
        $values = PredictionQuestion::All()->toArray();
        return view('admin::predictionquestion.index',compact('values'));
    }


    public function create()
    {
        return view('admin::create');
    }

    
    public function insert(Request $request)
    {
        $data=$request->all();

        $detailsObj = new PredictionQuestion();

        $detailsObj['question']= $data['question'];
        $detailsObj['heading']= $data['heading'];
        $detailsObj['question_type']= $data['type'];
        $detailsObj['point']= $data['point'];
        $detailsObj['created_at']= date('Y-m-d h:i:s');
        $detailsObj['updated_at']= date('Y-m-d h:i:s');
        $detailsObj['is_active']= 1;

        $result = $detailsObj->save();

        if($result){
            return Redirect::to('/admin/predictionquestion');
        }else{
            return Redirect::to('/admin/predictionquestion');

        }
    }

    
    public function edit($id)
    {
        $data = PredictionQuestion::DataById($id)->toArray();
        return view('admin::predictionquestion.edit',compact('data'));
    }

    public function save(Request $request)
    {
        $data=$request->all();

        $qid = $data['qid'];
        
        $question = PredictionQuestion::find($qid);
        $question->question = $data['question'];
        $question->heading = $data['heading'];
        $question->question_type = $data['type'];
        $question->point = $data['point'];
        $question->created_at =  date('Y-m-d h:i:s');
        $question->updated_at =  date('Y-m-d h:i:s');
        $question->is_active = 1;
        
        $upadteData=$question->update();

        if($upadteData){
            return Redirect::to('/admin/predictionquestion');
        }else{
            return Redirect::to('/admin/predictionquestion');

        }

    }

    public function destroy($id)
    {
        $delete= PredictionQuestion ::destroy($id);

        if($delete){
            return Redirect::to('/admin/predictionquestion');
        }else{
            return Redirect::to('/test');
        }
    }
}
