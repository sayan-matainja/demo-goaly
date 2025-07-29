<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Winner;
// use Illuminate\Http\UploadedFile;
use App\Common\Utility; 
use Redirect;
use Validator;

class WinnermanagementController extends Controller
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
        $alldata = Winner :: All()->toArray();
        return view('admin::winnermanagement.index',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function add()
    {
         return view('admin::winnermanagement.add');
    }

    public function sumbit(Request $request)
    {

        $data = $request->all();
    
        $validatedData = $request->validate([
            'type' =>'required',
            'rank' =>'required',
            'prizename' =>'required',
            'prize_size' =>'required',
            'start_date' =>'required',
            'end_date' =>'required',
            'image'=>'required|image'
        ], [
            'type.required' => 'Type is required',
            'rank.required' => 'Rank is required',
            'prizename.required' => 'Prizename is required',
            'prize_size.required'=>'PrizeSize is required',
            'start_date.required' => 'start date is required',
            'end_date.required' => 'end date is required',
            'image.required' => 'image is required'
        ]);

        // $data = $request->all();
       
        $file= $request->file('image');
        // print_r($data);
        // print_r($validatedData);
        // print_r($file); die('<hello');
        $filename= date('YmdHi').$file->getClientOriginalName();
        request()->image->move(public_path('images/prizeImage'), $filename);
        
        $detailsObj = new Winner();

        $detailsObj['type']= $data['type'];
        $detailsObj['rank']= $data['rank'];
        $detailsObj['prize_name']= $data['prizename'];
        $detailsObj['prize_size']= $data['prize_size'];
        $detailsObj['prize_image']= $filename;
        $detailsObj['start_date']= $data['start_date'];
        $detailsObj['end_date']= $data['end_date'];
        $detailsObj['status']= 0;
// dd($detailsObj);
        $result = $detailsObj->save();
               
        if($result){
            // return redirect()->route('/users')->with('success', __('User created Successfully!'));
            return Redirect::to('/admin/winnermanagment');
        }else{
            return Redirect::to('/test');
            // return view('test',compact('request'));
        }
    }


    public function edit($id){

        $data = Winner::DataById($id);

        return view('admin::winnermanagement.edit',compact('data'));
    }

   
    public function update(Request $request)
    {
        $data=$request->all();
        $id=$data['Idd'];

        if($request->hasFile('image')){ 

            // Storage::delete($employee->file); 
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            request()->image->move(public_path('images/prizeImage'), $filename);

            $Winner = Winner::find($id);
            $Winner->type = $data['type'];
            $Winner->rank = $data['rank'];
            $Winner->prize_name = $data['prizename'];
            $Winner->prize_size = $data['prize_size'];
            $Winner->prize_image= $filename;
            $Winner->start_date = $data['start_date'];
            $Winner->end_date = $data['end_date'];
        
            $upadteData=$Winner->update();

        }else{

            $Winner = Winner::find($id);
            $Winner->type = $data['type'];
            $Winner->rank = $data['rank'];
            $Winner->prize_size = $data['prize_size'];
            $Winner->prize_name = $data['prizename'];
            $Winner->start_date = $data['start_date'];
            $Winner->end_date = $data['end_date'];
        
            $upadteData=$Winner->update();

        }
        
       

        if($upadteData){
            return Redirect::to('/admin/winnermanagment');
        }else{
            return Redirect::to('/admin/winnermanagment');

        }

       
    }

    public function destroy($id)
    {
        $delete= Winner ::DeleteById($id);

        if($delete){
            return Redirect::to('/admin/winnermanagment');
        }else{
            return Redirect::to('/test');
        }
    }
     public function update_status(Request $request)
    {
        $res = [];
        $id = $request->reward_id;
        $status = $request->status;

        if ($status) {
            $msg = 'Prize activated';
        }else {
            $msg = 'Prize deactivated';
        }

        // dd($status);
        $dtl = Winner::DataById($id);
        $dtl->status = $status;


        if ($dtl->save()) {
            $res['status'] = true;
            $res['msg'] = $msg;
        }else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';
        }

        echo json_encode($res);
    }
}
