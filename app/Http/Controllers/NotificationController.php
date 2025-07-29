<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Common\Utility;
use Illuminate\Http\Request;
use Kutia\Larafirebase\Facades\Larafirebase;
use Illuminate\Support\Facades\Http;
use Modules\Admin\Entities\Predictions;
use Notification;
use App\Notifications\SendPushNotification;
use Session;
use App\UserModel;
use App\NotificationModel;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller

{
    public function livematch(){
            $today=date("Y-m-d H:i:s");
             $exists = Predictions::PredictionStart()->exists();    
                 
       
        $from = array('start_date' =>$today);
        $oneHourAgo = strtotime("-1 hour", strtotime($today));
        // dd($oneHourAgo );
        $basic=config('global.basic');
        $url =$basic.config('global.getmatches');
        $utility = new Utility;
        $response=$utility->getResponse($url,$from);
        dd($response);
        $check = false;

        // Check if "matches" key exists in the response
        if (isset($response['matches'])) {
            $matches = $response['matches'];

            
            foreach ($matches as $match) {

            if (strtotime($today) >= strtotime("-1 hour", strtotime($match['date_time'])) && strtotime($today) <= strtotime($match['date_time'])) {
   
                
                    // Match satisfies the condition, set the flag to true
                    // dd(strtotime("-1 hour", strtotime($match['date_time'])).'->'.$today);

                    $check = true;
                    break; // No need to check further matches, we found one that matches.
                }
            }
        }

        if ($check) {
            $n = NotificationModel::Message(2);
            $title = $n->title;
            $message = $n->message;

            try {
                $fcmTokens = UserModel::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

                Notification::send(null, new SendPushNotification($title, $message, $fcmTokens));

                return response()->json(['msg' => 'Push Notification Sent Successfully']);
            } catch (\Exception $e) {
                report($e);
                return response()->json(['msg' => 'Error While sending Push Notification']);
            }
        }  
        else{
            return response()->json(['msg' => 'NO Live Matches']);
        } 
        
    }

   public function updateToken(Request $request){

    $UserId = Session::get('UserId');      
    try{
        $s=UserModel::whereId($UserId)->update(['fcm_token'=>$request->usertoken]);
        return response()->json([
            'success'=>true
        ]);
    }catch(\Exception $e){
        report($e);
        return response()->json([
            'success'=>false
        ],500);
    }
 }
    public function notification(Request $request){

          $check= Predictions::LivePrediction()->exists();
       if($check){

        $n=NotificationModel::Message($type=1);
       
        $title=$n->title;
        $message=$n->message;
    

        try{
        $fcmTokens = UserModel::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();


        Notification::send(null,new SendPushNotification($title,$message,$fcmTokens));

       

        // Larafirebase::withTitle($title)
        //     ->withBody($message)
        //     ->sendMessage($fcmTokens);
                return response()->json(['msg' => 'Push Notification Sent Successfully']);

                
            }catch(\Exception $e){
                report($e);
                return response()->json(['msg' => 'Eror While sending Push Notif']);

            }
       
        }else{
        return response()->json(['msg' => 'NO Live Competition Found']);

        }    

    }

    public function kickOffNotification(Request $request)
    {
        try {
            $title = '⏱️ Kick-Off Reminder!';
            $message = 'The match is about to begin! Tune in now and cheer for your favorite team.';

            Log::info('[KickOffNotification] Preparing to send notification.', [
                'title' => $title,
                'message' => $message
            ]);

            $fcmTokens = UserModel::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

            Log::info('[KickOffNotification] FCM Tokens Retrieved:', [
                'count' => count($fcmTokens),
                'tokens_sample' => array_slice($fcmTokens, 0, 5) // just to preview a few tokens
            ]);

            $notifier = new SendPushNotification($title, $message, $fcmTokens);
            $notifier->sendNotification(); // Manually call the method

            Log::info('[KickOffNotification] Notification dispatched successfully.');

            return response()->json(['msg' => 'Push Notification Sent Successfully']);
        } catch (\Exception $e) {
            Log::error('[KickOffNotification] Error while sending notification:', [
                'error' => $e->getMessage()
            ]);
            report($e);
            return response()->json(['msg' => 'Error While Sending Push Notification']);
        }
    }

    public function cardNotification(Request $request)
    {
        try {
            $fixture    = $request->input('fixture', 'Match');
            $playerName = $request->input('player_name', 'Unknown Player');
            $minute     = $request->input('minute', 'N/A');
            $info       = $request->input('info', '');
            $cardType   = strtolower($request->input('card_type', 'yellowcard')); // "yellowcard" or "redcard"

            // Set emoji + title + message based on card type
            if ($cardType === 'redcard') {
                $emoji  = '🟥';
                $title  = "{$emoji} Red Card Issued!";
                $message = "{$fixture} — {$playerName} received a RED card at {$minute}' minute. {$info}";
            } else { // yellowcard default
                $emoji  = '🟨';
                $title  = "{$emoji} Yellow Card Issued!";
                $message = "{$fixture} — {$playerName} received a YELLOW card at {$minute}' minute. {$info}";
            }

            Log::info('[CardNotification] Preparing to send notification.', [
                'title' => $title,
                'message' => $message
            ]);

            $fcmTokens = UserModel::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

            Log::info('[CardNotification] FCM Tokens Retrieved:', [
                'count' => count($fcmTokens),
                'tokens_sample' => array_slice($fcmTokens, 0, 5)
            ]);

            $notifier = new SendPushNotification($title, $message, $fcmTokens);
            $notifier->sendNotification();

            Log::info('[CardNotification] Notification dispatched successfully.');

            return response()->json(['msg' => 'Card Notification Sent Successfully']);
        } catch (\Exception $e) {
            Log::error('[CardNotification] Error while sending notification:', [
                'error' => $e->getMessage()
            ]);
            report($e);
            return response()->json(['msg' => 'Error While Sending Card Notification']);
        }
    }

    public function goalNotification(Request $request)
    {
        try {
            $goalScorer = $request->input('player_name', 'Unknown Player');
            $minute     = $request->input('minute', 'N/A');
            $result     = $request->input('result', 'Score not available');
            $fixture  = $request->input('fixture');

            $title = '⚽ Goal !!!';
            $message = "{$fixture} — {$goalScorer} scored in the {$minute}' minute! Current Score: {$result}";

            $fcmTokens = UserModel::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

            Log::info('[GoalNotification] FCM Tokens Retrieved:', [
                'count' => count($fcmTokens),
                'tokens_sample' => array_slice($fcmTokens, 0, 5)
            ]);

            $notifier = new SendPushNotification($title, $message, $fcmTokens);
            $notifier->sendNotification();

            Log::info('[GoalNotification] Notification dispatched successfully.');

            return response()->json(['msg' => 'Goal Notification Sent Successfully']);
        } catch (\Exception $e) {
            Log::error('[GoalNotification] Error while sending notification:', [
                'error' => $e->getMessage()
            ]);
            report($e);
            return response()->json(['msg' => 'Error While Sending Goal Notification']);
        }
    }


    public function sendFCMNotification($title, $message, $fcmTokens)
    {
        $serverKey = env('YOUR_FIREBASE_SERVER_KEY'); // From Firebase Console
        $url = 'https://fcm.googleapis.com/fcm/send';

        foreach ($fcmTokens as $token) {
            $data = [
                'to' => $token,
                'notification' => [
                    'title' => $title,
                    'body'  => $message,
                    'sound' => 'default',
                ],
                'priority' => 'high',
            ];

            $headers = [
                'Authorization: key=' . $serverKey,
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $result = curl_exec($ch);

            if ($result === FALSE) {
                Log::error('FCM Send Error: ' . curl_error($ch));
            } else {
                Log::info("✅ FCM Message Sent: $result");
            }

            curl_close($ch);
        }
    }


}