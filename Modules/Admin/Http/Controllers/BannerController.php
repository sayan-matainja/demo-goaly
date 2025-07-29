<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Banner;
use Modules\Reward\Entities\Reward;
use Redirect;

class BannerController extends Controller
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
        $alldata = Banner :: All()->toArray();
        return view('admin::banner.index',compact('alldata'));
    }

    public function show()
    {
        
        $rewardlist = Reward :: GetAll()->toArray();

        return view('admin::banner.add',compact('rewardlist'));
    }
   
    public function store(Request $request)
    {
        $data = $request->all();

      
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        request()->image->move(public_path('images/prizeImage'), $filename);



        if($data['type'] == 'category'){

            $detailsObj = new Banner();

        $detailsObj['banner_type']= $data['type'];
        $detailsObj['banner_description']= $data['description'];
        $detailsObj['banner_image']= $filename;
        $detailsObj['banner_url']= $data['bannercat'];
        $detailsObj['category_id']= 0;
        $detailsObj['date_created']= date('Y-m-d H:i:s');
        $detailsObj['is_active']= 0;
        
        $result = $detailsObj->save();
        }else{
            $detailsObj = new Banner();

        $detailsObj['banner_type']= $data['type'];
        $detailsObj['banner_description']= $data['description'];
        $detailsObj['banner_image']= $filename;
        $detailsObj['banner_url']= 0;
        $detailsObj['category_id']= $data['bannerreward'];
        $detailsObj['date_created']= date("Y-m-d h:i:s");
        $detailsObj['is_active']= 0;
        
        $result = $detailsObj->save();
        }
       
        if($result){
            
            return Redirect::to('/admin/banner');
        }else{
            return Redirect::to('/test');
            
        }

    }

    public function edit($id)
    {
        $data = Banner::DataById($id);
        
        return view('admin::banner.edit',compact('data'));
    }

    
    public function update(Request $request)
    {
        $data=$request->all();
        $id=$data['Idd'];

        if($request->hasFile('image')){ 

            // Storage::delete($employee->file); 
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            request()->image->move(public_path('images/newsImage'), $filename);

            $banner = Banner::find($id);
            $banner->banner_type = $data['type'];
            $banner->banner_description = $data['description'];
            $banner->banner_url = isset($data['bannercat']) ? $data['bannercat']:'';
            $banner->category_id = 0;
            $banner->thumbnail= $filename;
           
            $upadteData=$banner->update();

        }else{

            $banner = Banner::find($id);
            $banner->banner_type = $data['type'];
            $banner->banner_description = $data['description'];
            $banner->banner_url = isset($data['bannercat']) ? $data['bannercat']:'';
            $banner->category_id = 0;
           
        
            $upadteData=$banner->update();

        }
        
       

        if($upadteData){
            return Redirect::to('/admin/banner');
        }else{
            return Redirect::to('/admin/banner');

        }

    }

  
    public function destroy($id)
    {
        $delete= Banner ::DeleteById($id);

        if($delete){
            return Redirect::to('/admin/banner');
        }else{
            return Redirect::to('/test');
        }
    }
}
