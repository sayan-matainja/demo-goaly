<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\NotificationModel;
use Modules\Admin\Entities\GamesSchedule;
use Modules\Admin\Entities\Games;
use ZipArchive;
use Redirect;
use Carbon\Carbon;
class GamesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
     
    }
    public function index(Request $request)
    {
        $games = Games::all();
        if ($request->ajax()) {  
        return response()->json(['games' => $games]);
    }
        return view('admin::games.index', compact('games'));
    }



    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'gamefile' => 'required|file|mimes:zip|max:20480',
            'imgInp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'imgInpbanner' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $name = $request->input('name');
        $description = $request->input('description');
        $url = $request->input('url');
        $game_code = time();
        $permissions = 0777;

        // Store game file
        if ($request->hasFile('gamefile')) {
            $gamefile = $request->file('gamefile');
            $gameFileName = 'gamefile_' . $game_code . '.' . $gamefile->getClientOriginalExtension();
            $gamefile->move(public_path('uploads/games'), $gameFileName);
            $gameFilePath = public_path('uploads/games/' . $gameFileName);
            if (!file_exists($gameFilePath)) {
                return response()->json(['error' => 'Failed to store game file'], 400);
            }
            chmod($gameFilePath, $permissions);

            // Extract zip file
            $extractTo = public_path('games/' . $game_code);
            $zip = new ZipArchive;
            if ($zip->open($gameFilePath) === TRUE) {
                $zip->extractTo($extractTo);
                $zip->close();

                // Remove disallowed files
                $files = File::files($extractTo);
                foreach ($files as $file) {
                    $extension = $file->getExtension();
                    $notAllowedExtensions = ['php', 'sh', 'py']; 
                    if (in_array($extension, $notAllowedExtensions)) {
                        unlink($file->getPathname());
                    }
                }
            } else {
                return response()->json(['error' => 'Failed to extract zip file'], 400);
            }
        } else {
            return response()->json(['error' => 'Game file not provided'], 400);
        }

        if ($request->hasFile('imgInp')) {
            $icon = $request->file('imgInp');
            $iconName = 'icon_' . Str::random(10) . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('uploads/gameImages'), $iconName);
        } else {
            return response()->json(['error' => 'Icon image not provided'], 400);
        }

        if ($request->hasFile('imgInpbanner')) {
            $banner = $request->file('imgInpbanner');
            $bannerName = 'banner_' . Str::random(10) . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/gameImages'), $bannerName);
        } else {
            return response()->json(['error' => 'Banner image not provided'], 400);
        }

        $game = new Games;
        $game->name = $name;
        $game->description = $description;
        $game->url = $url;
        $game->icon = $iconName;
        $game->banner = $bannerName;
        $game->games_code = $game_code;
        $game->save();
        return response()->json(['success' => true, 'message' => 'Game created successfully']);
    }



    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        $url = $request->input('url');
        $game_code = time();
        $permissions = 0777;
        $gameDetails = Games::find($id);

        
        if (!$gameDetails) {
            return Redirect::to('/admin/games')->with('flash_message_error', 'Game not found');
        }

        $old_game_code = $gameDetails->games_code;
        $game = Games::findOrFail($id); // Find the game by ID for updating

        // Update game details
        $game->name = $name;
        $game->description = $description;
        $game->url = $url;

        // Store game file
        if ($request->hasFile('gamefile')) {
            $gamefile = $request->file('gamefile');
            $gameFileName = 'gamefile_' . $game_code . '.' . $gamefile->getClientOriginalExtension();
            $gamefile->move(public_path('uploads/games'), $gameFileName);
            $gameFilePath = public_path('uploads/games/' . $gameFileName);

            if (!file_exists($gameFilePath)) {
                return Redirect::to('/admin/games')->with('flash_message_error', 'Failed to store game file');
            }

            chmod($gameFilePath, $permissions);

            // Extract zip file
            $extractTo = public_path('games/' . $game_code);
            $zip = new ZipArchive;
            if ($zip->open($gameFilePath) === TRUE) {
                $zip->extractTo($extractTo);
                $zip->close();

                // Remove disallowed files
                $files = File::files($extractTo);
                foreach ($files as $file) {
                    $extension = $file->getExtension();
                    $notAllowedExtensions = ['php', 'sh', 'py'];
                    if (in_array($extension, $notAllowedExtensions)) {
                        unlink($file->getPathname());
                    }
                }
                $game->games_code = $game_code;
                $d=$this->delete_dir(public_path('/games/' . $old_game_code));
                $zipFile = public_path('/uploads/games/gamefile_' . $old_game_code . ".zip");
                $del = $this->delete_file($zipFile);
            } else {
                return Redirect::to('/admin/games')->with('flash_message_error', 'Failed to extract zip file');
            }
        }

        // Store icon image
        if ($request->hasFile('imgInp')) {
            $icon = $request->file('imgInp');
            $iconName = 'icon_' . Str::random(10) . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('uploads/gameImages'), $iconName);
            $game->icon = $iconName;
        }

        // Store banner image
        if ($request->hasFile('imgInpbanner')) {
            $banner = $request->file('imgInpbanner');
            $bannerName = 'banner_' . Str::random(10) . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/gameImages'), $bannerName);
            $game->banner = $bannerName;
        }

        return $game->update() ? Redirect::to('/admin/games')->with('flash_message_success', 'Game Details Updated Successfully') : Redirect::to('/admin/games')->with('flash_message_error', 'Database Error: Unable to update game details');
    }

    public function edit($id)
    {
        $data  = Games::find($id);
        if ($data) {
        return view('admin::games.edit',compact('data'));
        }else{
            return Redirect::to('/admin/games')->with('flash_message_error','Game Details not found');
        }

        // if ($game) {
        //     return response()->json(['game' => $game]);
        // }

        // return response()->json(['error' => 'Notification not found.'], 404);
    }


    public function update_status(Request $request)
    {
        $res = [];
        $id = $request->id;
        
        $status = $request->status;
        
        if ($status) {
            $msg = 'Game is active';
        }else {
            $msg = 'Game is inactive';
        }

       
        $dt = Games::find($id);
        
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
        $gameDetails = Games::find($id);
        if (!$gameDetails) {
            return response()->json(['success' => false]);
        }

        $old_game_code = $gameDetails->games_code;

        if ($gameDetails->delete()) {
            $this->delete_dir(public_path('games/' . $old_game_code));
            $zipFile = public_path('uploads/games/gamefile_' . $old_game_code . '.zip');
            $del = $this->delete_file($zipFile);            
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
