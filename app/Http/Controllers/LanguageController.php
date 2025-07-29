<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App;

class LanguageController extends Controller
{

    public function index(){
        return view('home.langIndex');
    }
    public function langChange(Request $request)
    {
        $availableLocales = config('app.supported_locales'); // Add more as needed

        $requestedLocale = $request->lang;
        if (in_array($requestedLocale, $availableLocales)) {
            App::setLocale($requestedLocale);
            session()->put('locale', $requestedLocale);
        } else {
            // Handle invalid language selection, maybe set a default or show an error message
            // For now, setting a default to 'en'
            App::setLocale('en');
            session()->put('locale', 'en');
        }
        $cacheKey = 'index_data';
         Cache::forget($cacheKey);
        return redirect()->back();
    }
}
