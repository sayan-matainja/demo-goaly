<?php

namespace App\Console\Commands;
use Session;
use Notification;
use App\UserModel;
use App\NotificationModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Notifications\SendPushNotification;
use Kutia\Larafirebase\Facades\Larafirebase;


class MatchEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronNotifMatchEnd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
         $n = NotificationModel::Message(3);
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
}
