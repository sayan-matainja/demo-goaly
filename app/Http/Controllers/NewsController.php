<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common\Utility;

class NewsController extends Controller
{
    //
    public function getlatestnews(Request $request)
    {
        $newsType = $request->input('newsType') ?? 'Latest';
        $utility = new Utility;
        $basic = config('global.sportsMonks_url');
        $from = "";

        $hottestNewsUrl = $basic . config('global.hottes');
        $hottestnews = $this->getSlicedNews($hottestNewsUrl, $from, 50);

        $latestNewsUrl = $basic . config('global.latest');
        $latestnews = $this->getSlicedNews($latestNewsUrl, $from, 50);

        $transferNewsUrl = $basic . config('global.transfer');
        $transfernews = $this->getSlicedNews($transferNewsUrl, $from, 50);
        $videosUrl = $basic . config('global.videos');
        $videos = $this->getSlicedNews($videosUrl, $from, 50);
        return view('news.index',compact('hottestnews','latestnews','transfernews','videos','newsType'));    }

    public function getSlicedNews($url, $from, $limit)
    {
        $utility = new Utility;

        $response = $utility->getResponse($url, $from);

        return is_array($response) ? array_slice($response, 0, $limit) : [];
    }


    public function news_detail()
    {
        return view('news.news_detail');
    }
    public function news_latest()
    {
        return view('news.news_latest');
    }
    public function news_transfer()
    {
        return view('news.news_transfer');
    }
}
