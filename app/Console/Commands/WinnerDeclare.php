<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use App\Common\Utility;
use App\PlayedPrediction;
use Modules\Admin\Entities\Predictions;
use App\UserModel;
use App\UserPrizeRedeem;
use App\PredictionPrizeHistory;
use App\PredictionTotalPointCount;
use Session;
use DB;

class WinnerDeclare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:winner';

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
                $winnerboard = [];
        $w_lists = [];
        $m_lists = [];
        $w_data = [];
        $m_data = [];
        $w_rank = 1;
        $m_rank = 0;
        $point = 0;
        

        $last=date("Y-m-d", strtotime("last week monday"));
        $next=date("Y-m-d", strtotime("last week sunday"));
        $first_day = date("Y-m-d", strtotime('first day of previous month'));
        $last_day = date("Y-m-d", strtotime('last day of previous month'));
        $today = date('Y-m-d');

        
        // $last="2023-08-22";
        // $next="2023-08-30";
        // $first_day="2023-08-01";
        // $last_day="2023-08-31";
        // $today="2023-09-01";

        // $weekly_lists = PredictionPrizeHistory::WeeklyWinnerBoardScore($last, $next)->get();

        // foreach ($weekly_lists as $weekly_list) {

        //     if ($point > $weekly_list['coins']) {
        //         $w_rank++;
        //     }

        //     $w_lists[] = [
        //         'id' => $weekly_list['id'],
        //         'name' => $weekly_list['name'],
        //         'phone_no' => $weekly_list['phone_no'],
        //         'points' => $weekly_list['coins'],
        //         'start_time' => $weekly_list['prediction_start_time'],
        //         'end_time' => $weekly_list['prediction_end_time'],
        //         'rank' => $w_rank,
        //     ];

        //     $point = $weekly_list['coins'];
        // }

        $monthly_lists = PredictionPrizeHistory::MonthlyWinnerBoardScore($first_day,$last_day)->get();
       // dd( $monthly_lists );
            foreach ($monthly_lists as $monthly_list) {

            // if ($point > $monthly_list['coins']) 
            // {
            //     $m_rank ++;
            // }  
                $m_rank++;
             $check_msisdn_redeem_prize = UserPrizeRedeem::checkMsisdnRedeemPrize($monthly_list['msisdn'], $first_day, $last_day, 'monthly');

            $m_lists[] = array(
                                'id'=>$monthly_list['id'],
                                'name'=>$monthly_list['name'],
                                'phone_no'=>$monthly_list['phone_no'],
                                'msisdn'=>$monthly_list['msisdn'],
                                'subscription_date'=> $monthly_list['subscribe_date'],
                                'points'=>$monthly_list['coins'],
                                'rank'=> $m_rank,
                                'redeem_status' => $check_msisdn_redeem_prize
                            );
            $point = $monthly_list['coins'];
        }
        // dd($m_lists);

        $predictionModel = new PredictionTotalPointCount();
        $insertTotalPointCount =$predictionModel ->InsertTotalPointCount($m_lists, $first_day, $last_day);
        
   
    $winnerDeclarationDate = $last_day;

    $claimDeadline = date('Y-m-d', strtotime($winnerDeclarationDate . ' + 10 days')); // Deadline for rank 1-3
    $claimDeadline2 = date('Y-m-d', strtotime($winnerDeclarationDate . ' + 14 days')); // Deadline for rank 4-10

    // Check if the current date is beyond the claim deadline
    if ($today > $claimDeadline) {
        // Reset the points of the rank 1 user in the monthly competition
        if (!empty($m_lists) && $m_lists[0]['rank'] === 1 && $m_lists[0]['redeem_status'] == '') {
            $userId = $m_lists[0]['id'];
            $updatedPoints = 0;
           $q=PredictionTotalPointCount::ResetMonthlyPoints($first_day, $last_day, $userId, $updatedPoints);
        }
    }

    $monthly_prizes =PredictionTotalPointCount ::getMonthlyWinnerPrize();
     
    $winners= [];

        foreach ($m_lists as $m_list) {
            foreach ($monthly_prizes as $monthly_prize) {
                $winner_rank = $m_list['rank'];
                $prize_rank = $monthly_prize->rank;

                if ($winner_rank == $prize_rank) {
                    if ($today > $claimDeadline2) {
                        if ($winner_rank >= 4 && $winner_rank <= 10 && !$m_list['redeem_status']) {
                            // For ranks 4 to 10 and if the prize is not claimed
                            $flag = 1;
                            $userId = $m_list['id'];
                            $prevMonthpoint = $m_list['points'];
                        } else {
                            // For ranks 1 to 3 and other conditions
                            $flag = 0;
                        }
                    } else {
                        $flag = 0; // Claim deadline not passed
                    }
                    
                    $winnerId = $m_list['id'];
                    $total_points = 0;

                    // Call the get_total_points() function to retrieve the total points for the winner
                    $totalPoints = PredictionTotalPointCount::GetTotalPoints($first_day, $last_day, $winnerId);
                   
                    // Update 'total_points' key with the actual value if available
                    if ($totalPoints !== false) {
                        $total_points = $totalPoints;
                    }

                    $winners[] = array_merge($m_list, array(
                        'prize_name' => $monthly_prize->prize_name,
                        'prize_image' => $monthly_prize->prize_image,
                        'start_date' => $first_day,
                        'end_date' => $last_day,
                        'prize_size' => explode(",", $monthly_prize->prize_size),
                        'total_points' => $totalPoints->total_points,
                        'rank' => $totalPoints->rank,
                        'flag' => $flag,
                        
                    ));
                    break;
                   // Exit the inner loop after finding a  match
                }
               

            }
        }
    }
}
