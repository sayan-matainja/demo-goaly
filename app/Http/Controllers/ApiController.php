<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Entities\GamesSchedule;
use Modules\Admin\Entities\GamePoints;
use Modules\Admin\Entities\Games;
use Session;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\UserModel;
class ApiController extends Controller
{
   
    public function notify(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'msisdn' => 'required|numeric',
            'event' => 'required|string',
            'package' => 'required|numeric',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'Validation failed', 'errors' => $validator->errors()], 400);
        }
        $ipAddress = $request->ip();
        if ($request->isMethod('get')) {
            // Handle GET request here
            $msisdn = $request->query('msisdn');
            $event = $request->query('event');
            $subs_type= $request->query('package');
            $balance_status = $request->query('status');
            

        } elseif ($request->isMethod('post')) {
            // Handle POST request here
            $msisdn = $request->input('msisdn');
            $event = $request->input('event');
            $subs_type = $request->input('package');
            $balance_status = $request->input('status');


        } else {
            return response()->json(['msg' => 'Method not allowed'], 405);
        }

        if ($subs_type == 1)
            $type = 'daily';
        else
            $type = 'weekly';

       
            if ($event == 'reg') {

                if (is_numeric($msisdn)) {


                    if (($subs_type == 1) || ($subs_type == 2)) {

                        $is_exist =UserModel::where('msisdn',$msisdn)->first();


                        if ($is_exist == true) {

                          $today = strtotime(date("Y-m-d H:i:s"));

                         if ($subs_type == 1) {
                                $nextcharge = date('Y-m-d H:i:s', strtotime('+ 1 days'));  //For daily

                            } else if ($subs_type == 2) {
                                $nextcharge = date('Y-m-d H:i:s', strtotime('+8 day', $today));  //For weekly    
                            }
                       
                       $subshistory =UserModel::subscription_history($msisdn, $type,$ipAddress, $nextcharge);
                       $update_data = UserModel::where('msisdn', $msisdn)->update([
                            'msisdn' => $msisdn,
                            'updated_at' => date("Y-m-d H:i:s"),
                            'subscription_status' => 'subscribed',
                            'balance_status' => $balance_status,
                            'status' => 'active',
                            'subscription_type' => $type,
                            'ip_address' => $ipAddress,
                            'event' => $event,
                            'subscribe_date' => date('Y-m-d H:i:s'),
                            'subscribe_expired_date' => $nextcharge
                        ]);

                      
                            if ($update_data > 0){
                                $result['msg'] = "subscribe success";
                                $result['msisdn'] = $msisdn;
                                $result['status'] = 'active';
                            } else {
                                $result['msg'] = "db_error";
                            }
                        } else {

                            $today = strtotime(date("Y-m-d H:i:s"));

                            if ($subs_type == 1) {
                                $nextcharge = date('Y-m-d H:i:s', strtotime('+ 1 days'));  //For daily

                            } else if ($subs_type == 2) {
                                $nextcharge = date('Y-m-d H:i:s', strtotime('+8 day', $today));  //For weekly    
                            }

                           $new_data = UserModel::insert([
                            'msisdn' => $msisdn,
                            'subscription_status' => 'subscribed',
                            'balance_status' => $balance_status,
                            'status' => 'active',
                            'subscription_type' => $type,
                            'ip_address' => $ipAddress,
                            'event' => $event,
                            'subscribe_date' => date('Y-m-d H:i:s'),
                            'subscribe_expired_date' => $nextcharge
                        ]);


                        $subshistory =UserModel::subscription_history($msisdn, $type,$ipAddress, $nextcharge);
                            if ($new_data) {
                                $result['msg'] = "subscribe success";
                                $result['msisdn'] = $msisdn;
                                $result['status'] = 'active';
                            } else {
                                $result['msg'] = "db_error";
                            }
                        }
                    } else {

                        $result['msg'] = "subscriber type must be 1 or 2";
                    }
                } else {

                    $result['msg'] = "Msisdn should be numeric";
                }
            } else {

                $result['msg'] = "Wrong Event Input";
                $result['success'] = 'false';
            }
       

        return response()->json($result);
    }

    public function unsub_notify(Request $request)
    {

               $validator = Validator::make($request->all(), [
            'msisdn' => 'required|numeric',
            'event' => 'required|string',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'Validation failed', 'errors' => $validator->errors()], 400);
        }
        $ipAddress = $request->ip();
        if ($request->isMethod('get')) {
            // Handle GET request here
            $msisdn = $request->query('msisdn');
            $event = $request->query('event');
            

        } elseif ($request->isMethod('post')) {
            // Handle POST request here
            $msisdn = $request->input('msisdn');
            $event = $request->input('event');
            


        } else {
            return response()->json(['msg' => 'Method not allowed'], 405);
        }
            
           
            if ($event == 'unreg') {
                if (is_numeric($msisdn)) {

                    $check_user_exist =UserModel::where('msisdn',$msisdn)->first();
 // dd($check_user_exist['status']);
                    if ($check_user_exist) {
                        $data = array(
                            "msisdn"        => $msisdn,
                            "status"        => 'active',
                        );

                      
                        if ($check_user_exist['status']=='active') {
                            $date = date('Y-m-d H:i:s');

                            $update_data = array(
                                "status"              => 'inactive',
                                "subscription_status" => 'not subscribed',
                                "event"=>$event,
                                "updated_at"        => $date,
                            );

                            // $update_id = $this->api_model->user_unsubscribe($update_data, $msisdn);
                             $update_id = UserModel::where('msisdn', $msisdn)->update( $update_data);
                            if ($update_id > 0) {
                                $result['code'] = 200;
                                $result['msg'] = "successfully unsubscribed";
                                $result['msisdn'] = $msisdn;
                                $result['status_member'] = 'not subscribed';
                            }
                        } else {
                            $result['code'] = 200;
                            $result['msg'] = "user already unsubscribed";
                            $result['msisdn'] = $msisdn;
                            $result['status'] = 'inactive';
                        }
                    } else {

                        $result['code'] = 400;
                        $result['msg'] = "msisdn not exist";
                        $result['msisdn'] = $msisdn;
                    }
                } else {
                    $result['code'] = 400;
                    $result['msg'] = "Msisdn should be numeric";
                }
            }
            else{
                $result['code'] = 400;                
                $result['msg'] = "wrong event entered";
            }
             return response()->json($result);
        }

    public function callback(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'msisdn' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'Invalid msisdn format', 'errors' => $validator->errors()], 400);
        }

        
        Session::flush();

        $ipAddress = $request->ip();

        if ($request->isMethod('get')) {
            // Handle GET request here
            $msisdn = $request->query('msisdn');
        } elseif ($request->isMethod('post')) {
            // Handle POST request here
            $msisdn = $request->input('msisdn');
        } else {
            return response()->json(['msg' => 'Method not allowed'], 405);
        }

        $result = UserModel::UserDetails($msisdn);

        if ($result['status']) {
            $UserData = $result['user'];
            $userInfo = [
                'id' => $UserData['id'],
                'first_name' => $UserData['first_name'],
                'last_name' => $UserData['last_name'],
                'status' => $UserData['status'],
                'img' => $UserData['img'],
                'msisdn' => $UserData['msisdn'],
            ];

            $cacheKey = 'index_data';
            Cache::forget($cacheKey);
            
            Session::put('User', $userInfo);
            Session::put('UserId', $UserData['id']);
            Session::save();
            
            
                return redirect('/');
           
                
            
        } else {
            return redirect('/login')->with('flash_message_error', 'pleaseLogin');
        }
    }



    public function gamePoints(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'userid' => 'required|string',
            'score' => 'required|numeric',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => 0,
                'error' => 1,
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $userid = base64_decode($request->input('userid'));
        list($id_users, $id_games) = explode("|", $userid);
        $score = $request->input('score');

        if (empty($id_users) || empty($id_games) || strpos($userid, '|') === false) {
            return response()->json([
                'success' => 0,
                'error' => 1,
                'message' => 'Invalid user ID or score.',
            ], 400);
        }

        $userInfo = UserModel::find($id_users);

        if (!$userInfo) {
            return response()->json([
                'success' => 0,
                'error' => 1,
                'message' => 'Invalid user ID.',
            ], 400);
        }

        $gameDetail = GamesSchedule::ActiveGameDetails()->find($id_games);
        $schedule_id = $gameDetail ? $gameDetail->id : null;

        $data = [
            'id_users' => $id_users,
            'id_games' => $id_games,
            'schedule_id' => $schedule_id,
            'points' => $score,
            'date' => now()->toDateTimeString(),
        ];

        $result = GamePoints::pointsUpdate(
            ['id_users' => $id_users, 'id_games' => $id_games, 'schedule_id' => $schedule_id],
            $data
        );



        return response()->json([
            'success' => $result ? 1 : 0,
            'error' => $result ? 0 : 1,
            'message' => $result ? 'Points recorded successfully.' : 'Failed to record points.',
        ], $result ? 200 : 500);
    }


}