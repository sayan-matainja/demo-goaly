<?php

namespace App\Http\Controllers;

use App\user_register;
use Illuminate\Http\Request;
use App\UserModel;
use App\UserOtpModel;
use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\PredictionTotalPointCount;

use Modules\Admin\Entities\GamesSchedule;
use Modules\Admin\Entities\Games;
use Modules\Admin\Entities\GamePoints;
use Modules\Admin\Entities\GameWinnersSummary;
use stdClass;
use Session;
class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function storeMonthlyWinners()
    {
        $firstday = '2024-04-01';
        $lastday = '2024-04-30';

        $contestGames = GamesSchedule::where('competition_type', 'monthly')
            ->whereDate('start_date', '>=', $firstday)
            ->whereDate('end_date', '<=', $lastday)
            ->where('status', 1)
            ->with(['gamePoints.user', 'game'])
            ->get();

        $monthlyPrizes = PredictionTotalPointCount::getMonthlyWinnerPrize();

        $winnersData = [];

        foreach ($contestGames as $contestGame) {
            $winners = $contestGame->gamePoints
                ->groupBy('id_users')
                ->map(function ($group) {
                    return $group->sum('points');
                })
                ->sortByDesc(function ($totalPoints) {
                    return $totalPoints;
                })
                ->take(3);

            foreach ($winners as $userId => $totalPoints) {
                $user = $contestGame->gamePoints->firstWhere('id_users', $userId)->user;
                $prizeType = $winners->search($totalPoints) + 1;
                $prize = $monthlyPrizes[$prizeType - 1] ?? null;

                $winnersData[] = [
                    'schedule_id' => $contestGame->id,
                    'user_id' => $user->id,
                    'score' => $totalPoints,
                    'prize_type' => $prizeType,
                    'name' => $user->first_name ?? '' . ' ' . $user->last_name ?? '',
                    'avatar' => $user->img ?? 'user_no_image.png',
                    'msisdn' => $user->msisdn ?? '',
                    'id_games' => $contestGame->id_games,
                    'game_name' => $contestGame->game->name,
                    'competition_type' => $contestGame->competition_type,
                    'prize_name' => optional($prize)->prize_name,
                    'prize_image' => optional($prize)->prize_image,
                    'prize_status' => 0, // Default value is 0
                    'start_date' => $firstday,
                    'end_date' => $lastday,
                    'cron_type' => 3,
                ];
            }
        }

        // Batch insert winners data
        if (!empty($winnersData)) {            
            GameWinnersSummary::insert($winnersData);
        }
    }

    public function gameIndex($game_id)
    {
        $game_detail = GamesSchedule::ActiveGameDetails()->with('game')->find($game_id);
        if ($game_detail != false && $game_detail->status == 1) {
            $date = [
                'start_date' => $game_detail->start_date,
                'end_date' => $game_detail->end_date,
            ];
            $limit=10;
            $high_scores = GamePoints::getHighScores($game_id,$limit,$date);
            $userId = (Session::has('UserId')) ? Session::get('UserId') : null;

            if ($userId != null) {
                 $is_exist = UserModel::find($userId);

                $postdata = [
                    'user_id' => $is_exist->id,
                    'game_id' => $game_id,
                    'games_code' => $game_detail->game->games_code,
                ];

                $play_button_url = $this->getGameUrl($postdata);
                $response['playbutton'] = $play_button_url->data;
            } else {
                $response['playbutton'] = 'javascript:void(0);';
            }

            $response['id'] = $game_id;
            $response['gamedetail'] = $game_detail;
            $response['high_scores'] = $high_scores;
            $response['status'] = true;
            return view('home.gameindex', compact('response'));
        } else {
            $response['status'] = false;
            return view('home.gameindex', compact('response'));
        }
    }

    public function getGameUrl($postData = [])
    {
        $response = new stdClass();

        if (empty($postData)) {
            $response->status = false;
            $response->message = 'User Id or Game Id not Found';
        } else {
            try {
                $userId = $postData['user_id'];
                $gameId = $postData['game_id'];
                $games_code=$postData['games_code'];

                if (!empty($games_code)) {
                    $dataPostGame = $userId . "|" . $gameId;
                    $base64EncodedData = base64_encode($dataPostGame);

                    $response->status = true;
                    $response->message = "Games Url Found";
                    $response->data = "http://" . request()->getHttpHost() ."/games/{$games_code}/index.html?userid={$base64EncodedData}";
                } else {
                    $response->status = false;
                    $response->data = null;
                }

            } catch (\Exception $e) {
                
                $response->status = false;
                $response->message = $e->getMessage();
            }
        }

        return $response;
    }

    public function otpgenerate(Request $request)
    {
        $validator=Validator::make($request->all(), [
                                                        'msisdn' => 'required',
                                                    ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            if($request->isMethod('post'))
            {
                $otp = mt_rand(1000,9999);
                $msisdn = $request['msisdn'];

                $user_check = UserModel::whereMsisdn($msisdn)->first();

                if(!empty($user_check))
                {
                    $get_user = $user_check['msisdn'];
                    $id = $user_check['id'];
                    
                    $now = time();
                    $ten_minutes = $now + (10 * 60);
                    $startDate = date('Y-m-d H:i:s', $now);
                    $endDate = date('Y-m-d H:i:s', $ten_minutes);

                    $user_dtl = UserOtpModel::whereMsisdn($msisdn)->first();

                    $user_dtl->otp = $otp;
                    $user_dtl->otp_created = $startDate;
                    $user_dtl->otp_expired = $endDate;
                    $user_dtl->save();

                    return redirect('/otpSubmit')->with('get_user',$get_user);
                }
                else
                {
                    $user = UserModel::create([
                            'first_name' => 'Test',
                            'last_name' => 'LinkIT',
                            'msisdn' => $msisdn,
                            'otp' => '',
                            'password' => '$2a$04$Zz3HsojmxD8j2iwLAkH6FuZCJWvHTsZGKv7/VXenx6A87uoV7Ip5y',
                            'status' => 'inactive',
                            'is_active' => 1,
                            'created_at' => now()->format('Y-m-d H:i:s'),
                            'updated_at' => now()->format('Y-m-d H:i:s'),
                        ]);

                    if(UserModel::latest()->first()->id)
                    {
                        $now = time();
                        $ten_minutes = $now + (10 * 60);
                        $startDate = date('Y-m-d H:i:s', $now);
                        $endDate = date('Y-m-d H:i:s', $ten_minutes);

                        $otp = UserOtpModel::create([
                                                'msisdn' => $msisdn,
                                                'otp' => $otp,
                                                'otp_created' => $startDate,
                                                'otp_expired' => $endDate
                                            ]);

                        $last_id= UserModel::latest()->first()->id;
                        $user_check = UserModel::whereId($last_id)->first();

                        $get_user = $user_check['msisdn'];
                        return redirect('/otpSubmit')->with('get_user',$get_user);
                    }
                    else
                    {
                        return view('user.register_msisdn');
                    }
                }
            }
        }
    }

    public function otpSubmit(Request $request)
    {
        return view('user.register_otp');

    }

    public function otpVerify(Request $request)
    {
        $validator=Validator::make($request->all(), [
                                                        'otp' => 'required',
                                                    ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            if($request->isMethod('post'))
            {
                $msisdn = $request['msisdn'];
                $otp = $request['otp'];

                $user_check = UserModel::whereMsisdn($msisdn)->first();
               
                if(!empty($user_check))
                {
                    $otp_check = UserOtpModel::where(array('msisdn' => $msisdn,'otp'=>$otp))->first();

                    if(!empty($otp_check))
                    {
                        $current_time = now()->format('Y-m-d H:i:s');

                        if($current_time <= $otp_check->otp_expired)
                        {
                            return redirect('/otpSubmit')->with('flash_message_success','Sign Up Successful.');
                        }
                        else
                        {
                            return redirect('/otpSubmit')->with('flash_message_error','OTP expired, Please try again.');
                        }
                    }
                    else
                    {
                        return redirect('/otpSubmit')->with('flash_message_error','OTP not matched.');
                    }
                }
                else
                {
                    return redirect('/otpSubmit')->with('flash_message_error','Please Re-try.');
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user_register  $user_register
     * @return \Illuminate\Http\Response
     */
    public function show(user_register $user_register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_register  $user_register
     * @return \Illuminate\Http\Response
     */
    public function edit(user_register $user_register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_register  $user_register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_register $user_register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_register  $user_register
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_register $user_register)
    {
        //
    }
}
