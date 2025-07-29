<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Newsmanagement;
use Redirect;

class NewsmanagementController extends Controller
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
        // die("news");
        $alldata = Newsmanagement :: All()->toArray();
        return view('admin::newsmanagement.index',compact('alldata'));
    }

    public function create()
    {
        return view('admin::create');
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        $data = Newsmanagement::DataById($id);
        return view('admin::newsmanagement.edit',compact('data'));
    }

    public function changes(Request $request)
    {
        $data=$request->all();
        $id=$data['Idd'];

        // print_r($data['type']);
        // die("update");

        if($request->hasFile('image')){ 

            // Storage::delete($employee->file); 
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            request()->image->move(public_path('images/newsImage'), $filename);

            $news = Newsmanagement::find($id);
            $news->place_for = $data['place_for'];
            $news->title = $data['newstitle'];
            $news->content = $data['newsdetails'];
            $news->thumbnail= $filename;
           
            $upadteData=$news->update();

        }else{

            $news = Newsmanagement::find($id);
            $news->place_for = $data['place_for'];
            $news->title = $data['newstitle'];
            $news->content = $data['newsdetails'];
           
        
            $upadteData=$news->update();

        }
        
       

        if($upadteData){
            return Redirect::to('/admin/newsmanagement');
        }else{
            return Redirect::to('/admin/newsmanagement');

        }

    }

    
    public function delete($id)
    {
        die("hi");
        $delete= Newsmanagement ::DeleteById($id);

        if($delete){
            return Redirect::to('/admin/newsmanagement');
        }else{
            return Redirect::to('/test');
        }
    }
}
