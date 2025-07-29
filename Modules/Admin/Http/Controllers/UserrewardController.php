<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Reward;
use Modules\Admin\Entities\Userreward;
use Redirect;

class UserrewardController extends Controller
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
        $all_details= Userreward::UserRewards()->get()->toArray();
        return view('admin::userreward.index',compact('all_details'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::userreward.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        

        $validatedData = $request->validate([
            'tittle' =>'required',
            'description' =>'required',
            'coin'=>'required',
            'thumb_image' =>'required',
            'image'=>'required|image'
        ], [
            'type.required' => 'Type is required',
            'rank.required' => 'Rank is required',
            'coin.required' => 'Coin is required',
            'thumb_image.required' => 'thumbnail image is required',
            'image.required' => 'banner image is required'
        ]);

        $thumb_file= $request->file('thumb_image');
        $filename1= date('YmdHi').$thumb_file->getClientOriginalName();
        request()->image->move(public_path('images/prizeImage'), $filename1);

        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        request()->image->move(public_path('images/prizeImage'), $filename);

        $detailsObj = new Reward();

        $detailsObj->type= $data['description'];
        $detailsObj->rank= $data['title'];
        $detailsObj->prize_name= $data['coin'];
        $detailsObj->reward_image= $filename;
        $detailsObj->banner_image= $filename1;
        $detailsObj->is_active= 0;
        $detailsObj->is_top= 0;
        $detailsObj->click_reward= 0;
        $detailsObj->date_created = date('Y-m-d H:i:s');

        $result = $detailsObj->save();
               
        if($result){
            // return redirect()->route('/users')->with('success', __('User created Successfully!'));
            return Redirect::to('/admin/reward');
        }else{
            return Redirect::to('/test');
            // return view('test',compact('request'));
        }



        // $coin = $request->coin;
        // $type = $request->type;
        // $title = $request->title;
        // $description = $request->description;

        // $status = Reward::create([
        //     'coin' => $coin,
        //     'title' => $title,
        //     'is_active' => '1',
        //     'click_reward' => '0',
        //     'reward_type_id' => $type,
        //     'description' => $description,
        //     'date_created' => date('Y-m-d H:i:s'),

        // ]);

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    
    public function edit($id)
    {
        return view('admin::edit');
    }

    
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
        //
    }
}
