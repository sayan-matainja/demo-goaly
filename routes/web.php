<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




 Auth::routes();
// Quizes
Route::get('/quiz/question/{id?}', 'QuizController@showQuestion')->name('question');
Route::post('/quiz/check-answer/{id}', 'QuizController@checkAnswer')->name('quiz.check');
Route::get('/quiz/question/next', 'QuizController@nextQuestion')->name('quiz.next');
Route::get('/quiz/end', 'QuizController@endQuiz')->name('quiz.endQuiz');
Route::get('/quiz/reset', 'QuizController@resetQuiz')->name('quiz.reset');
Route::get('/quiz/result', 'QuizController@showResult')->name('quiz.result');
Route::get('/quiz/start', 'QuizController@startQuiz')->name('quiz.start');

// Quizes
// 

Route::post('/getLastMatchByTeam', 'MatchesController@LastMatchByTeam'); //17.05.2022

Route::get('/optimize', 'HomeController@optimize');
Route::get('/deployment', 'HomeController@deployment');
Route::get('/test/{id}', 'HomeController@test');
Route::get('/testMatchdetails/{id}', 'HomeController@testMatchdetails');

//Push-Notif routes
Route::post('/fcm/token', 'NotificationController@updateToken')->name('fcmToken');
Route::get('/send-notification','NotificationController@notification')->name('notification');
Route::get('/conteststart','NotificationController@livematch');
Route::get('/kickOffRemineder', 'NotificationController@kickOffNotification');
Route::get('/cardNotification', 'NotificationController@cardNotification');
Route::get('/goalNotification', 'NotificationController@goalNotification');


//contest&Prediction

Route::get('/contest22', 'ContestController@index');
Route::get('/contest-history', 'ContestController@contest_history')->name('contest_history');
Route::get('/contest/detail/{id}', 'PredictionController@contest_detail')->name('contest_detail');
Route::post('/setsubmitprediction', 'PredictionController@setsubmitprediction');
Route::post('/getUserQusAns', 'PredictionController@getUserQusAns');
Route::get('/new-contest-detail', 'ContestController@new_contest_detail')->name('contest_detail_2');
Route::get('/getContestant/{id}', 'PredictionController@getContestant');
Route::get('/contest-detail-result', 'ContestController@contest_detail_result')->name('contest_detail_result');
Route::get('/contest-viewtip', 'ContestController@contest_viewtip')->name('contest_viewtip');
Route::get('/getwinnerboard', 'PredictionController@getWinnerBoard')->name('getwinnerboard');

Route::get('/contest', 'PredictionController@index')->name('contest');
Route::post('/contestsByLeague', 'PredictionController@contestsByLeague')->name('contestsByLeague');
Route::post('/UpdateTeam', 'PredictionController@UpdateTeam')->name('UpdateTeam');
Route::post('/followTeam', 'PredictionController@followTeam')->name('followTeam');
Route::get('/team/delete/{id}', 'PredictionController@team_delete')->name('team-delete');
Route::get('/UserFavourite', 'PredictionController@UserFavourite')->name('UserFavourite');
Route::get('/getUser', 'PredictionController@getUser')->name('getUser');

//matches
Route::get('/matches', 'MatchesController@index')->name('matches');
Route::get('/match/details/{id}', 'MatchesController@match_details')->name('matchDetails');
Route::get('/matches-standing', 'MatchesController@matches_standing')->name('matches_standing');
Route::get('/HandToHand/{homeTeamId}/{awayTeamId}', 'MatchesController@HandToHand')->name('HandToHand');
Route::get('/matchTimeline/{id}', 'MatchesController@matchTimeline')->name('matchTimeline');
Route::get('/players/{id}', 'MatchesController@matchplayers')->name('matchplayers');
Route::post('/usercomment', 'MatchesController@userCommnent');
Route::post('/myTeamMatches', 'MatchesController@myTeamMatches');
Route::post('/getmatches', 'MatchesController@getmatches'); //06.05.2022
Route::post('/getLivematches', 'MatchesController@getLivematches'); //07.05.2025
Route::post('/matchDetails', 'MatchesController@matchDetails'); //17.05.2022

// Route::get('/matches/{id}', 'MatchesController@matches_details')->name('matches_details');
Route::get('/team/{id}', 'MatchesController@teamDetail')->name('teamDetail');
Route::get('/player/details/{pid}', 'MatchesController@playerDetails')->name('playerDetails');
Route::post('/playerInfomatches','MatchesController@playerInfomatches')->name('playerInfomatches');
Route::post('/playermatchDetails', 'MatchesController@playermatchDetails')->name('playermatchDetails');

Route::get('/playerNews/{pid}', 'MatchesController@playerNews');
Route::get('/matches-timeline', 'MatchesController@matches_timeline')->name('matches_timeline');
Route::get('/matches-lineup/{id}', 'MatchesController@matches_lineup')->name('lineup');
Route::get('/matches-lineup', 'MatchesController@matches_lineup')->name('matches_lineup');
Route::get('/matches-stat/{id}', 'MatchesController@matches_stat')->name('matches_stat');
Route::get('/matches-comment/{id}', 'MatchesController@matches_comment')->name('matches_comment');
// Route::get('/matches-comment', 'MatchesController@matches_comment')->name('matches_comment');
Route::get('/getleagues', 'MatchesController@getleagues')->name('getleagues');
Route::get('/matchByLeague/{id}/{day}', 'MatchesController@matchByLeague')->name('matchByLeague');
// Route::get('/matchByStanding/{id}', 'MatchesController@matchByStanding')->name('matchByStanding');
Route::get('/advancestats', 'MatchesController@advanceStats')->name('advancestats');
Route::post('/comment', 'MatchesController@comment')->name('comment');

//team Route
Route::get('/team/details/{id}', 'MatchesController@team_details')->name('team');
Route::get('/teamBasicInfo/{id}', 'MatchesController@teamBasicInfo')->name('teamBasicInfo');
Route::get('/teamTrophies/{id}', 'MatchesController@teamTrophies')->name('teamTrophies');
Route::get('/teamSeasonInfo/{team_id}/{season_id}', 'MatchesController@teamSeasonInfo')->name('teamSeasonInfo');
Route::get('/teamTeamScorer/{id}', 'MatchesController@teamTeamScorer')->name('teamTeamScorer');
Route::get('/teamMatches/{id}', 'MatchesController@teamMatches')->name('teamMatches');
Route::get('/MatchesByRound/{id}', 'MatchesController@teamMatchesByRound')->name('MatchesByRound');
Route::get('/TeamPlayers/{team_id}/{season_id}', 'MatchesController@TeamPlayers')->name('TeamPlayers');
Route::get('/teamYellowAndRedcard/{id}', 'MatchesController@teamYellowAndRedcard')->name('teamYellowAndRedcard');
Route::get('/TeamByStanding/{id}', 'MatchesController@TeamByStanding')->name('TeamByStanding');
Route::get('/Stats/{id}', 'MatchesController@TeamByStats')->name('Stats');



 //12.05.2022 //12.05.2022

Route::post('/getLeague', 'LeagueController@getLeague'); //19.05.2022
Route::post('/MatchesListByLeague', 'LeagueController@MatchesListByLeague'); //24.05.2022



//news
Route::get('/news', 'NewsController@getlatestnews')->name('newss');
Route::get('/news-detail', 'NewsController@news_detail')->name('news_detail');
Route::get('/news-latest', 'NewsController@news_latest')->name('news_latest');
Route::get('/news-transfer', 'NewsController@news_transfer')->name('news_transfer');

//profile
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/edit/profile', 'ProfileController@edit')->name('edit-profile');
Route::post('/update/profile', 'ProfileController@update')->name('update-profile');
Route::get('/contests/history', 'ProfileController@profile_contest_history')->name('profile_contest_history');
//search
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/search-suggestions/{query?}', 'SearchController@search_result')->name('search-suggestion');
Route::get('/player-suggestions/{query?}', 'SearchController@playerSuggetions')->name('player-suggestion');
Route::post('/search-result', 'SearchController@searchTeamData')->name('search-result');
Route::post('/player-search-result', 'SearchController@searchPlayerData')->name('player-search-result');
//leaderboard
Route::get('/leaderboard', 'LeaderboardController@index')->name('leaderboard');
Route::get('/leaderboard-detail', 'LeaderboardController@leaderboard_detail')->name('leaderboard_detail');
//login
Route::get('/login', 'UserController@login')->name('logined');
Route::get('/callback', 'ApiController@callback');
Route::post('/unsubscribe', 'UserController@unsubscribe');
Route::get('/register', 'UserController@register')->name('register');
Route::post('/register-submit', 'UserController@store')->name('submit');
Route::post('/userSubmit', 'UserController@userSubmit'); //10.06.2022
Route::get('/logout', 'UserController@logout'); //10.06.2022
Route::post('/checkUserStatus', 'UserController@checkuserStatus')->name('checkUserStatus'); 

//Register
Route::post('/otpgenerate', 'UserRegisterController@otpgenerate'); //13.06.2022
Route::get('/otpSubmit', 'UserRegisterController@otpSubmit'); //13.06.2022
Route::post('/otpVerify', 'UserRegisterController@otpVerify'); //13.06.2022

//League===============================>
Route::get('/league', 'LeagueController@index')->name('league');
Route::get('/league/details/{id}', 'LeagueController@league_detail'); //24.05.2022
Route::get('/LeagueRound/{id}', 'LeagueController@LeagueRound')->name('LeagueRound');
Route::get('/LeagueMatch/{league_id}/{round_id}', 'LeagueController@LeagueMatch')->name('LeagueMatch');
Route::get('/LeagueStanding/{league_id}', 'LeagueController@LeagueStanding')->name('LeagueStanding');
Route::get('/TopScores/{league_id}/{season_id}', 'LeagueController@LeagueTopScores')->name('LeagueTopScores');
Route::get('/TopPlayers/{league_id}/{comp_id}', 'LeagueController@LeagueTopPlayers')->name('LeagueTopPlayers');
Route::get('/LastAndNextMatch/{id}', 'LeagueController@LastAndNextMatch');
Route::get('/Leaguebyteam', 'PredictionController@Leaguebyteam')->name('Leaguebyteam');
Route::get('/leagueStats/{league_id}', 'LeagueController@leagueStats');
Route::get('/teamsByleagueId/{league_id}', 'LeagueController@leagueTeams');

Route::get('/league/News/{league_id}', 'LeagueController@leagueNews');

//home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/leaderboardPost', 'LeaderboardController@leaderboardPost')->name('leaderboardPost');
Route::get('/privacy&policy', 'HomeController@policy')->name('policyy');
Route::get('/terms&condition', 'HomeController@terms')->name('terms');

Route::get('/finish', 'HomeController@finishMatch');
Route::get('/live', 'HomeController@liveMatch');
Route::get('/coming', 'HomeController@comingMatch');
Route::get('/detail', 'HomeController@detail')->name('detail');
Route::get('/team-detail', 'HomeController@team_detail')->name('team_detail');
Route::get('/index-old', 'HomeController@index_old')->name('index_old');
Route::get('/faqs', 'HomeController@faq')->name('faq-view');
Route::get('/video-more', 'HomeController@video_more')->name('video_more');
Route::get('/gameIndex/{game_id?}', 'UserRegisterController@gameIndex');
Route::get('/storeMonthlyWinners', 'UserRegisterController@storeMonthlyWinners');
Route::get('/package/{msisdn?}', 'UserController@package')->name('package');
Route::get('/subscribe', 'UserController@subscribe')->name('subscribe');
Route::post('/unsubscribe', 'UserController@unsubscribe')->name('unsubscribe');

// Route::get('/logout', function(){
//     Auth::logout();
//     return Redirect::to('/');
// });


// set time zone from custom JS

Route::get('/set-timezone', 'HomeController@Settimezone')->name('settimezone');
Route::get('change/lang', 'LanguageController@langChange')->name('LangChange');



