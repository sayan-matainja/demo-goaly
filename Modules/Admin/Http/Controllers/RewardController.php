<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Reward\Entities\Reward;
use Illuminate\Routing\Controller;

class RewardController extends Controller
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
        
      return view('admin::Reward.index');
    }



    public function create()
    {
        return view('admin::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('admin::show');
    }

    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
        //
    }
}
