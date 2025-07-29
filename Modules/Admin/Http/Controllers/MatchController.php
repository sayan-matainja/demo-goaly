<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\NotificationModel;
use Modules\Admin\Entities\MatchVideos;
use App\League;
use Redirect;
use App\Common\Utility;
use Illuminate\Routing\Controller;

class MatchController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
        setcookie('domain','home', 0);
       //$all_domain = Domain::getAll()->orderBy('id', 'DESC')->where('is_deleted',null)->get();
       //$this->domains = $all_domain;
    }


    public function index()
    {
        $league_details = League::GetleagueRecord();         
        
        return view('admin::Allmatches.match',compact('league_details'));
    }

        public function store(Request $request)
    {
        
        echo "store";
    }

    public function update(Request $request)
    {
        $vid = MatchVideos::updateOrCreate(
            ['fixture_id' => $request->fixtureId], // Use the appropriate field for matching existing records
            [
                'title' => $request->editmatchtitle,
                'video' => $this->getYoutubeEmbedUrl($request->match_video), // Convert YouTube link to embed URL
                // Add other fields as needed
            ]
        );
        if ($vid) {
        return response()->json(['success' => true, 'message' => 'Video uploaded successfully.']);
        }

        return response()->json(['success' => false, 'message' =>'Unable to upload MatchVideo.'], 500);
    }


    

    private function getYoutubeEmbedUrl($youtubeLink)
    {
        // Extract video ID from YouTube link
        $videoId = $this->extractYoutubeVideoId($youtubeLink);

        if (!$videoId) {
            // Handle invalid YouTube link
            return null;
        }

        // Construct and return the YouTube embed URL
        return "https://www.youtube.com/embed/{$videoId}";
    }

    private function extractYoutubeVideoId($youtubeLink)
    {
        // Extract video ID from YouTube link
        preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $youtubeLink, $matches);

        return isset($matches[1]) ? $matches[1] : null;
    }


    public function edit($fixtureId)
    {
            try {
            $vid = MatchVideos::where('fixture_id', $fixtureId)->first();

            return response()->json(['video' => $vid ?$vid['video']: '']);
        } catch (\Exception $e) {
            return response()->json(['video' => ''], 500);
        }

    }


 

      public function destroy($id)
    {
        $notification = NotificationModel::find($id);

        if ($notification) {
            $notification->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }








    
}
