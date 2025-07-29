<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use App\Common\Utility;
use App\PlayedPrediction;
use Modules\Admin\Entities\Predictions;
use Modules\Admin\Entities\PredictionQuestion;
use App\UserModel;
use App\UserPrizeRedeem;
use App\PredictionAnswer; 
use App\PredictionPrizeHistory;
use App\PredictionTotalPointCount;
use App\League;
use App\UserFavouriteTeam;
use Session;
use DB;
class WinnerlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
     
    }
    
    public function index(Request $request)
    {
        $start_date = $request->get('startDate') ?? date("Y-m-d", strtotime("last week sunday"));
        $end_date = $request->get('endDate') ?? date("Y-m-d", strtotime("last week saturday"));

        $ts = strtotime($end_date);
        
        // Calculate the Sunday and Saturday of the week for the given start_date and end_date
        $start_of_week = date("Y-m-d", strtotime('sunday this week -1 week', $ts));
        $end_of_week = date("Y-m-d", strtotime('saturday this week', $ts));
        if ($request->ajax()) {
            $winners = PredictionPrizeHistory::WeeklyWinnerBoardScore($start_of_week, $end_of_week)->get() ?? '';
            
            return response()->json([
                'data' => $winners,
                'last' => $start_of_week,
                'next' => $end_of_week
            ]);
        }

        // Render view with filtered data and adjusted week range
        return view('admin::winnerlist.index', compact('start_of_week', 'end_of_week'));
    }





    public function predictionHistory($id='',$firstDay='',$lastDay=''){
       
        $pred_his = PredictionPrizeHistory::PredHistory($id)
                    ->whereDate('created_at', '>=', $firstDay)
                     ->whereDate('created_at', '<=', $lastDay)    
                    ->get()->toArray();
        return response()->json(['history' => $pred_his??'']);

    }


}
