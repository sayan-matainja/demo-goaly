<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Modules\Admin\Entities\Predictions;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\WinnerDeclare::class,
        Commands\SendNotif::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('test:winner')
        ->timezone('Asia/Jakarta')
        ->lastDayOfMonth('15:00'); 

        $schedule->command('CronNotifBeforeContest')
        ->timezone('Asia/Jakarta')
        ->withoutOverlapping()        
        ->hourly();      
        
        // $schedule->command('CronNotifMatchEnd')
        // ->timezone('Asia/Jakarta')
        // ->withoutOverlapping()
        // ->hourly()
        // ->when(function () {
        //      $exists = Predictions::IsMatchEnd();
                        
        //      return $exists;
        //  }); 
      
        

        $schedule->command('CronContestNotif')
        ->timezone('Asia/Jakarta')
        ->withoutOverlapping()
        ->hourly()
        ->when(function () {
             $exists = Predictions::LivePrediction()->exists();
                        
             return $exists;
         });
                

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
