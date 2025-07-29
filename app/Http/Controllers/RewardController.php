<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reward;
class RewardController extends Controller
{
    //
    public function index()
    {
        $rewards=Reward::get()->toArray();
        // dd( $data);
        return view('reward.index',compact('rewards'));
    }

    public function reward_detail()
    {
        return view('reward.reward_detail');
    }
    public function reward_all()
    {
        return view('reward.reward_all');
    }
}
