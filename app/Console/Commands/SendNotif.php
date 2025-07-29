<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Kutia\Larafirebase\Facades\Larafirebase;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Modules\Admin\Entities\Predictions;
use Notification;
use App\UserModel;
use App\NotificationModel;
use App\Notifications\SendPushNotification;
use Session;
use DB;
class SendNotif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronContestNotif';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Push Notification to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
            $n=NotificationModel::Message($type=1);
           
            $title=$n->title;
            $message=$n->message;    

         try{
            $fcmTokens = UserModel::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
            Notification::send(null,new SendPushNotification($title,$message,$fcmTokens));
           

            // Larafirebase::withTitle($title)/     ->withBody($message)//     ->sendMessage($fcmTokens);


            Log::info('Push notification sent successfully.');
            
         }catch (\Exception $e) {
            report($e);
            // Log an error message
            Log::error('Error sending push notification: ' . $e->getMessage());
        }

    }




}







