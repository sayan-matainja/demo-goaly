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
    Route::get('/predictionHistory/{id?}/{firstDay}/{lastDay}', 'WinnerlistController@predictionHistory')->name('predictionHistory');

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('login');
    Route::post('/submit', 'AdminController@create');
    Route::get('/logout', 'AdminController@logout');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', 'AdminController@dashboard');

        Route::prefix('prediction')->group(function() {

            Route::get('/', 'PredictionsController@index')->name('predictions.index');
            Route::post('/store', 'PredictionController@store')->name('store');
            Route::get('/add', 'PredictionsController@create')->name('create');
            Route::get('/edit/{id}', 'PredictionsController@editprediction')->name('editprediction');
            Route::get('/set/{id}', 'PredictionsController@set')->name('setprediction');
            Route::post('/savepredictionresult', 'PredictionsController@savepredictionresult')->name('savepredictionresult');
            Route::post('/delete', 'PredictionsController@delete')->name('delete');
            Route::post('/getmatches', 'PredictionsController@getmatches')->name('getmatches');
            Route::post('/sumbitprediction','PredictionsController@sumbitprediction')->name('sumbitprediction');
            Route::post('/updateprediction','PredictionsController@updateprediction')->name('updateprediction');
            Route::post('/togglestatus','PredictionsController@update_status');

          });  
    


        Route::prefix('notifications')->group(function(){
           
            Route::get('/', 'PushNotificationController@index')->name('notificationss');
            Route::post('/store','PushNotificationController@store');
            Route::get('/edit/{id}', 'PushNotificationController@edit');
            Route::post('/update','PushNotificationController@update');
            Route::get('/destroy/{id}','PushNotificationController@destroy');
            
        });

        Route::prefix('games')->group(function(){
           
            Route::get('/', 'GamesController@index');
            Route::post('/store','GamesController@store');
            Route::get('/edit/{id}', 'GamesController@edit');
            Route::post('/update','GamesController@update');
            Route::get('/destroy/{id}','GamesController@destroy');
            Route::post('/togglestatus','GamesController@update_status');
            
        });
        Route::prefix('gameSchedule')->group(function(){
           
            Route::get('/', 'GameScheduleController@index');
            Route::post('/store','GameScheduleController@store');
            Route::get('/add','GameScheduleController@create');
            Route::get('/edit/{id}', 'GameScheduleController@edit');
            Route::post('/update','GameScheduleController@update');
            Route::get('/destroy/{id}','GameScheduleController@destroy');
            Route::post('/togglestatus','GameScheduleController@update_status');
            
            
        });


        Route::prefix('reward')->group(function(){

            Route::get('/', 'RewardController@index')->name('reward');

        });

        Route::prefix('predictionquestion')->group(function(){
           
            Route::get('/', 'PredictionquestionController@index')->name('predictionquestion');
            Route::post('/sumbit','PredictionquestionController@insert')->name('insert');
            Route::get('/edit/{id}', 'PredictionquestionController@edit')->name('edit');
            Route::post('/save','PredictionquestionController@save')->name('save');
            Route::get('/destroy/{id}','PredictionquestionController@destroy')->name('destroy');
            
        });
        Route::prefix('Quizquestion')->group(function(){
           
            Route::get('/', 'QuizQuestionController@index')->name('quiz.question');
            Route::post('/sumbit','QuizQuestionController@insert')->name('quiz.insert');
            Route::get('/edit/{id}', 'QuizQuestionController@edit')->name('quiz.edit');
            Route::post('/save','QuizQuestionController@save')->name('quiz.save');
            Route::get('/destroy/{id}','QuizQuestionController@destroy')->name('quiz.destroy');
            
        });

        Route::prefix('banner')->group(function(){

            Route::get('/', 'BannerController@index')->name('banner');
            Route::get('/add','BannerController@show')->name('addbanner');
            Route::post('/sumbit','BannerController@store')->name('banner.store');
            Route::get('/edit/{id}', 'BannerController@edit')->name('banner.edit');
            Route::post('/update','BannerController@update')->name('banner.save');
            Route::get('/destroy/{id}','BannerController@destroy')->name('banner.destroy');

        });

        Route::prefix('userreward')->group(function(){

            Route::get('/', 'UserrewardController@index')->name('userreward');
            Route::get('/add','UserrewardController@create')->name('adduserreward');
            Route::post('/sumbit','UserrewardController@store')->name('reward.store');

        });

        Route::prefix('prizelist')->group(function(){

            Route::get('/', 'PrizelistController@index')->name('prizelist');
            
        });

        Route::prefix('winnermanagment')->group(function(){

            Route::get('/', 'WinnermanagementController@index')->name('name');
            Route::get('/add','WinnermanagementController@add')->name('addnew');
            Route::post('/sumbit','WinnermanagementController@sumbit')->name('sumbit');
            Route::get('/edit/{id}', 'WinnermanagementController@edit')->name('winnermanagement.edit');
            Route::post('/update','WinnermanagementController@update')->name('update');
            Route::post('/updateStatus','WinnermanagementController@update_status')->name('updateStatus');
            Route::get('/destroy/{id}','WinnermanagementController@destroy')->name('winner.destroy');

        });
        Route::prefix('winnerList')->group(function(){
            Route::get('/', 'WinnerlistController@index')->name('winnerlist');
            
        });

        Route::prefix('newsmanagement')->group(function(){

            Route::get('/','NewsmanagementController@index')->name('news');
            Route::get('/edit/{id}', 'NewsmanagementController@edit')->name('news.edit');
            Route::post('/update','NewsmanagementController@changes')->name('changes');
            Route::get('/delete/{id}','NewsmanagementController@delete')->name('news.delete');

        });

        Route::prefix('tremservices')->group(function(){

            Route::get('/', 'TermservicesController@index')->name('termservices');

        });

        Route::prefix('matches')->group(function(){

            Route::get('/', 'MatchController@index')->name('allmatches');
            Route::post('/store','MatchController@store')->name('matchstore');
            Route::get('/edit/{fixtureId}', 'MatchController@edit')->name('matchedit');
            Route::post('/update','MatchController@update')->name('matchupdate');
            Route::get('/destroy/{id}','MatchController@destroy')->name('matchdestroy');

        });

       

    
    Route::post('/set_cookie', 'AdminController@set_cookie');

    });
});
    