<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Log;

class SendPushNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $title;
    protected $message;
    protected $fcmTokens;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title, $message, $fcmTokens)
    {
        $this->title = $title;
        $this->message = $message;
        $this->fcmTokens = $fcmTokens;
    }

    /**
     * Send the push notification manually using Kreait.
     */
    public function sendNotification()
    {
        $factory = (new Factory)
            ->withServiceAccount(base_path('lravelpushnotif-firebase-adminsdk-rv6y0-425b15d87a.json'));

        $messaging = $factory->createMessaging();

        foreach ($this->fcmTokens as $token) {

                $message = [
                    'token' => $token,
                    'notification' => [
                        'title' => $this->title,
                        'body'  => $this->message,
                        'icon'  => '/assets/img/logo_white.png', // optional
                    ],
                    'data' => [
                        'title' => $this->title,
                        'body'  => $this->message,
                        'click_action' => 'FLUTTER_NOTIFICATION_CLICK', // optional
                    ],
                    "priority"=> "high",
                ];


                // dd($message);
            try {
                $messaging->send($message);
                Log::info("✅ FCM message sent to token: {$token}");
            } catch (\Throwable $e) {
                Log::error("❌ Failed to send FCM to token {$token}: " . $e->getMessage());
            }
        }
    }
}
