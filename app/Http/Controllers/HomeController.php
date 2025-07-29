<?php

namespace App\Http\Controllers;
use App\Common\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Modules\Admin\Entities\Predictions;
use Modules\Faq\Entities\FaqSetting;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\UserModel;
use Session;
use App\League;
use GuzzleHttp\Exception\RequestException;
class HomeController extends Controller
{   

 
    public function index(Request $request)
    {
        $cacheKey = 'index_data';

        $cachedData = Cache::remember($cacheKey, now()->addMinutes(5), function () use ($request) {
            $timezone = $request->session()->get('local_timezone', "Asia/Jakarta");

            $competitions = Predictions::isActive()->OrderByCreated()->limit(15)->get()->toArray();
            $competitions = collect($competitions)->map(function ($item) use ($timezone) {
        $fixture_id = $item['match_id'];
        $matchresult = League::getMatchdetails($fixture_id);
        $data = [
            'id' => isset($item['id']) ? $item['id'] : null,
            'fixture_id' => $fixture_id,
            'type' => 'competition',
            'home_short_code' => isset($matchresult['details'][0]['homeTeam']['short_code']) ?
                                         $matchresult['details'][0]['homeTeam']['short_code'] : null,
            'away_short_code' => isset($matchresult['details'][0]['awayTeam']['short_code']) ?
                                         $matchresult['details'][0]['awayTeam']['short_code'] : null,
            'home_team_score' => isset($matchresult['details'][0]['homeTeam']['score']) ?
                                         $matchresult['details'][0]['homeTeam']['score'] : '-',
            'away_team_score' => isset($matchresult['details'][0]['awayTeam']['score']) ?
                                         $matchresult['details'][0]['awayTeam']['score'] : '-',
            'publishedAt' => Carbon::parse($item['created_at'])->format('Y-m-d'),
            'match_time' => Utility::getUtcToLocal($item['match_start_time'], $timezone, "Y-m-d H:i"),
            'match_time_bar' => "NA",
        ];

        $match_time_bar = Utility::getUtcToLocal($item['match_start_time'], $timezone, "w");

        if (isset($match_time_bar)) {
            $data['match_time_bar'] = Carbon::create()->day($match_time_bar)->format('l');
        }
        return array_merge($item, $data);
    })->toArray();
            $allnews = League::news();
            $hottestNews = $allnews['hottestnews'] ?? [];
            $latestNews = $allnews['latestnews'] ?? [];
            $transferNews = $allnews['transfernews'] ?? [];

            $allRecords = array_merge($competitions, $hottestNews, $latestNews, $transferNews);

            $combinedData = collect($allRecords);
            $sortedData = $combinedData->sortByDesc('publishedAt')->values();
            return [
                'sortedData' => $sortedData,
                'details' => League::GetleagueRecord()->toArray(),
                'link' => config('global.sportsMonks_url')."assets/uploads/leagues/",
                'response' => (new Utility)->getResponse(config('global.basic') . config('global.getmatches'), ['type' => 'tomorrow']),
                'today' => now($timezone),
                'popupDetails' => include(public_path('assets/popupDetails.php')),
            ];
        });

        // Extract individual variables from cached data
        extract($cachedData);

        $data = view('home.index', compact('sortedData', 'details', 'link', 'response', 'today', 'popupDetails'))->render();

        return $data;
    }
    public function package($msisdn=''){
        return view('home.package',compact('msisdn'));
    }

    public function faq()
    {
         $faqs=FaqSetting::get();       

        return view('home.faq',compact('faqs'));
    }
     public function terms(){
        return view('home.termsCondition');
     }
      public function policy(){
        return view('home.privacy');

      }
     public function __construct()
    {
       
        setcookie('domain','home', 0);
       //$all_domain = Domain::getAll()->orderBy('id', 'DESC')->where('is_deleted',null)->get();
       //$this->domains = $all_domain;
    }


    public function liveMatch()
    {
        $utility = new Utility;
        $date=[];
        $responseData=$utility->getLiveMatchesData();
        return $responseData['matches'];
    }
    public function finishMatch()
    {
        $utility = new Utility;
        $responseData=$utility->getFinishMatchesData();
        return $responseData['matches'];
    }
    public function comingMatch()
    {
        $utility = new Utility;
        $responseData=$utility->getComingMatchesData();
        return $responseData['matches'];
    }


    public function team_detail()
    {
        return view('home.team_detail');
    }
    public function index_old()
    {
        return view('home.index_OLD');
    }
    
    public function video_more()
    {
        return view('home.video_more');
    }

    public function Settimezone(Request $request)
    {

        $timezone = $request->input('timezone');

        if(isset($timezone))
        {

            $request->session()->put('local_timezone', $timezone );

            date_default_timezone_set($timezone);
        }

        return Response()->json([
                        "massage" => "timezone set ".$timezone,
                        "date" => "timezone set ".date("Y-m-d H:i:s"),
                        "success" => 1,
                        "error" => 0
                    ]);

        
    }
   public function test($team_id)
    {
        $trophies = [];
        $utility = new Utility;
        $basic = config('global.sportsMonks_url');
        $url = $basic . config('global.clubTrophies');
        $from = array('club_id' => $team_id);

        try {
            $responseData = $utility->getResponse($url, $from);

            if (isset($responseData['trophies']) && count($responseData['trophies']) > 0) {
                $trophies = $responseData['trophies'];
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $errorMessage = $e->getMessage();
            dd("Guzzle Request Error : " . $errorMessage);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            dd("General Error : " . $errorMessage);
        }

        return $trophies;
    }
       public function testMatchdetails($matchId)
    {
        $trophies = [];
        $utility = new Utility;
        $basic = config('global.basic');
        $url = $basic . config('global.getMatchDetails');
        $from = array('fixture_id' => $matchId);

        try {
            $responseData = $utility->getResponse($url, $from);

                $trophies = $responseData;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $errorMessage = $e->getMessage();
            dd("Guzzle Request Error : " . $errorMessage);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            dd("General Error : " . $errorMessage);
        }

        return $trophies;
    }
    public function deployment(){

        return  "swaraj.matchdetails nodata"; 
    }
         public function optimize()
    {
         Artisan::call('config:clear');
         Artisan::call('optimize');
        return 'Configuration & Route cache cleared successfully';
    }

}
