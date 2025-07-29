<?php

namespace App\Console\Commands;
use Session;
use Notification;
use App\UserModel;
use App\NotificationModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Modules\Admin\Entities\Predictions;
use App\Notifications\SendPushNotification;
use Kutia\Larafirebase\Facades\Larafirebase;

class ContestStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronNotifBeforeContest';

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
        $exists = Predictions::predictionStart()->get();

        if ($exists->isEmpty()) {
            $this->info('No contest in the next 1 hour');
            return 0; // Assuming 0 means success in the context of console commands
        }

        $n = NotificationModel::message(2);
        $title = $n->title;
        $message = $n->message;

        try {
            $fcmTokens = UserModel::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

            Notification::send(null, new SendPushNotification($title, $message, $fcmTokens));

            $this->info('Push Notification Sent Successfully');
            return 0; // Assuming 0 means success in the context of console commands
        } catch (\Exception $e) {
            report($e);
            $this->error('Error While sending Push Notification');
            return 1; // Assuming 1 means failure in the context of console commands
        }
    }

}
