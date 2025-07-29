<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\NotificationModel;
use Modules\Admin\Entities\GamesSchedule;
use Modules\Admin\Entities\Games;
use ZipArchive;
use Illuminate\Support\Facades\Cache;
use Redirect;
use Carbon\Carbon;
class GameScheduleController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
     
    }
    public function index(Request $request)
    {
        $games = GamesSchedule::all();
        if ($request->ajax()) {  
        return response()->json(['games' => $games]);
    }
        return view('admin::games.schedule', compact('games'));
    }

        public function create(Request $request)
    {
        $allGames = Games::select('id','name')->get();

        return view('admin::games.scheduleAdd', compact('allGames'));
    }


	public function store(Request $request)
	{
	   $validator = Validator::make($request->all(), [
        'game_type' => 'required|string',
        'game_id' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $gameDetails=Games::find($request->input('game_id'));
	    $gameSchedule = new GamesSchedule;
	    $gameSchedule->competition_type = $request->input('game_type');
        $gameSchedule->name = $gameDetails->name;
	    $gameSchedule->icon = $gameDetails->icon;
	    $gameSchedule->start_date = $request->input('start_date');
	    $gameSchedule->end_date = $request->input('end_date');
	    $gameSchedule->id_games = $request->input('game_id');

	    if ($gameSchedule->save()) {
	        return Redirect::to('/admin/gameSchedule')->with('flash_message_success', 'Game Schedule Added successfully');
	    } else {
	        return Redirect::back()->withInput()->withErrors(['flash_message_error' => 'Database Error: Unable to add Game Schedule!']);
	    }
	}

    public function update(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'game_type' => 'required|string',
            'game_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $id = $request->input('id');
        $game_id = $request->input('game_id');

        $gameSchedule = GamesSchedule::findOrFail($id);

        // Find the game by its ID
        $game = Games::findOrFail($game_id);

        if (!$gameSchedule) {
            return Redirect::to('/admin/gameSchedule/edit')->with('flash_message_error', 'Game Schedule not found');
        }

        // Update game schedule details
        $gameSchedule->competition_type = $request->input('game_type');
        $gameSchedule->start_date = $request->input('start_date');
        $gameSchedule->end_date = $request->input('end_date');
        
        // Update the relationship with the game
        $gameSchedule->game()->associate($game);

        return $gameSchedule->update() ? Redirect::to('/admin/gameSchedule')->with('flash_message_success', 'Game Schedule Updated Successfully') : Redirect::to('/admin/gameSchedule')->with('flash_message_error', 'Database Error: Unable to update game Schedule');
    }


    public function edit($id)
    {
        $data  = GamesSchedule::find($id);
        $allGames = Games::select('id','name')->get();

        if ($data) {
        return view('admin::games.scheduleEdit',compact('data','allGames'));
        }else{
            return Redirect::to('/admin/gameSchedule')->with('flash_message_error','Game Schedule Not Available');
        }
    }


    public function update_status(Request $request)
    {
        $res = [];
        $id = $request->id;
        
        $status = $request->status;
        
        if ($status) {
            $msg = 'Schedule is active';
        }else {
            $msg = 'Schedule is inactive';
        }

       
        $dt = GamesSchedule::find($id);
        
        $dt->status = $status;


        if ($dt->save()) {
            $res['status'] = true;
            $res['msg'] = $msg;
        }else {
            $res['status'] = false;
            $res['msg'] = 'Somthing went wrong, try again later';
        }

        $cacheKey = 'index_data';
         Cache::forget($cacheKey);
        echo json_encode($res);
    }


     public function destroy($id)
    {
        $gameDetails = GamesSchedule::find($id);
        if (!$gameDetails) {
            return response()->json(['success' => false]);
        }
        
        if ($gameDetails->delete()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    private function delete_dir($src)
    { 
        if (is_dir($src)) {
            $dir = opendir($src);
            while (false !== ($file = readdir($dir))) { 
                if (($file != '.') && ($file != '..')) { 
                    if (is_dir($src . '/' . $file)) { 
                        $this->delete_dir($src . '/' . $file); 
                    } else { 
                        unlink($src . '/' . $file); 
                    } 
                } 
            }
            closedir($dir); 
            rmdir($src);
            return true; 
        }
        return false; 
    }

    private function delete_file($filePath)
    {
        if (file_exists($filePath)) {
            return unlink($filePath); 
        }
        return false; 
    }


}
