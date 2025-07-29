<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Question;
use Redirect;

class QuizQuestionController extends Controller
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
        $values = Question::All()->toArray();
        return view('admin::quiz.index',compact('values'));
    }


    public function create()
    {
        return view('admin::quiz.create');
    }

    
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'correct_option' => 'required|string|in:A,B,C', 
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data=$request->all();
        $detailsObj = new Question();

        $detailsObj['question']= $data['question'];
        $detailsObj['option_a']= $data['option_a'];
        $detailsObj['option_b']= $data['option_b'];
        $detailsObj['option_c']= $data['option_c'];
        $detailsObj['correct_option']= $data['correct_option'];

        // Handle image upload
        if ($request->hasFile('image')) {

            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            request()->image->move(public_path('images/quizImage'), $filename);   

            $detailsObj['image'] = $filename; 
        } 

        $result = $detailsObj->save();

        if($result){
            return Redirect::to('/admin/Quizquestion');
        }else{
            return Redirect::to('/admin/Quizquestion');

        }
    }

    
    public function edit($id)
    {
        $data = Question::find($id)->toArray();
        return view('admin::quiz.edit',compact('data'));
    }

    public function save(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'question' => 'required|string',
        'option_a' => 'required|string',
        'option_b' => 'required|string',
        'correct_option' => 'required|string|in:A,B,C', 
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

       if ($validator->fails()) { 
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $data=$request->all();

    $qid = $data['qid'];

    $question = Question::find($qid);
    $question->question = $data['question'];
    $question->option_a = $data['option_a'];
    $question->option_b = $data['option_b'];
    $question->option_c = $data['option_c'];
    $question->correct_option = $data['correct_option'];

        // Handle image upload
    if ($request->hasFile('image')) {

        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        request()->image->move(public_path('images/quizImage'), $filename);   

        $question->image = $filename; 
    }

    $upadteData=$question->update();

    if($upadteData){
        return Redirect::to('/admin/Quizquestion');
    }else{
        return Redirect::to('/admin/Quizquestion');

    }

}

public function destroy($id)
{
    $delete= Question::destroy($id);

    if($delete){
        return Redirect::to('/admin/Quizquestion');
    }else{
        return Redirect::to('/test');
    }
}
}
