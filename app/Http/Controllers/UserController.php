<?php

namespace App\Http\Controllers;

//namespace App\Http\Requests\;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\user_register;
use App\UserModel;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Common\Utility;

use Session;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    

   public function login()
   {
    return Session::has('UserId') ? redirect()->back() : view('user.login');
   }

    public function userSubmit(Request $request)
    {
        $rules = [
            'login' => 'required|string|regex:/^[0-9]+$/|max:15', // Only allow numeric input, at least 15 characters
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/login')->with('flash_message_error', 'Invalid phone number. Please check again.');
        }

        if ($request->isMethod('post')) {
            $data = $request->input();

            if ($data['login'] !== null) {
                $result = UserModel::UserDetails($data['login']);

                if ($result['status']) {
                    $UserData = $result['user'];

                    $userInfo = [
                        'id' => $UserData['id'],
                        'first_name' => $UserData['first_name'],
                        'last_name' => $UserData['last_name'],
                        'status' => $UserData['status'],
                        'subscription_type' => $UserData['subscription_type'],
                        'img' => $UserData['img'],
                        'coins' => $UserData['coins'],
                        'msisdn' => $UserData['msisdn'],
                    ];

                    Session::put('User', $userInfo);
                    Session::put('UserId', $UserData['id']);
                    $s = UserModel::whereId($UserData['id'])->update(['fcm_token' => $request->usertoken]);

                        $cacheKey = 'index_data';
                        Cache::forget($cacheKey);
                    return redirect('/');
                } else {
                    Auth::guard('appuser')->logout();
                    return redirect('/login')->with('flash_message_error', 'Invalid phone number. Please check again.');
                }
            } else {
                return redirect('/login')->with('flash_message_error', 'Invalid phone number. Please check again.');
            }
        }

        return redirect('/login');
    }





    // public function unsubscribe(Request $request)
    // {
    //     $msisdn = Session::get('User.msisdn');

    //     if (empty($msisdn)) {
    //         return response()->json(['msg' => 'Please Login'], 404);
    //     }

    //     $url = 'http://we-eg.goaly.mpx.mobi:8104/api/v1/unsubscribe?msisdn=' . $msisdn;

    //     $utility = new Utility();
    //     $response = json_decode($utility->curlGet($url)); 
    //     if ($response->code == 200) {
    //         return response()->json(['msg' => 'Unsubscribed Successfully'], 200);
    //     } elseif ($response->code  == 400 && isset($response->data)) {
    //         return response()->json(['msg' => $response->data, 400]);  // Invalid MSISDN message
    //     } else {
    //         return response()->json(['msg' => 'Network Error or Bad Request'],400);
    //     }
    // }



    public function logout()
    {   
        $cacheKey = 'index_data';
        Cache::forget($cacheKey);
        Session::flush();
        Auth::guard('appuser')->logout();
        return redirect('/');
    }

    public function register()
    {   $countrylist=DB::table('country_list')->get();
        return view('user.register_msisdn',compact('countrylist'));
    }

    public function subscribe(){
        return view('home.subscribe');
    }

    public function package($msisdn=''){
        return view('home.package',compact('msisdn'));
    }
    
    public function unsubscribe(Request $request)
    {
        $msisdn = Session::get('User.msisdn');

        if (empty($msisdn)) {
            return response()->json(['msg' => 'Please Login'], 404);
        }

        $user = UserModel::where('msisdn', $msisdn)->first();
        
        if (!$user) {
            return response()->json(['msg' => 'User not found'], 404);
        }

        $data = [                            
            'subscription_status' => 'not subscribed',
            'status' => 'inactive',
            'ip_address' => $request->ip(),
            'updated_at' => now()
        ];                  

        $unsubSuccess = UserModel::where('msisdn', $msisdn)->update($data);    

        if ($unsubSuccess) {
            return response()->json(['msg' => 'Unsubscribed Successfully'], 200);
        } else {
            return response()->json(['msg' => 'Network Error or Bad Request'], 400);
        }
    }

    public function store(UserRequest $request)
    {
         //return $request;
        //  $request->validate(['file' => 'required|mimes:png,jpeg,jpg,|max:20480']);
        //  $image_name = $request->file->getClientOriginalName();
        //  $image_path = $request->imageUpload . "_" . md5(time()) . "_" . $request->file->getClientOriginalName();
        //  $image = $request->file('imageUpload');
        //  dd($image);
        //  $image->move(public_path('/user_images'),$image_path);
         //$abc = $request->file->store('user_registers', $image_path);
        $admin = user_register::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'countrycode' => $request->countrycode,
            'region' => $request->region,
            'phone' => $request->phone,
            // 'image_name' => $image_name,
            // 'image_path' => $image_path,

        ]);
        $last_id = $admin['id'];
        if ($last_id) {
            return redirect(route('logined'));
        }

    }
    public function checkuserStatus(Request $request){
        $user=UserModel::where('msisdn',$request->msisdn)->first();

        return response()->json([
                'status' => $user?1:0, 
                'user' => $user??[], 
            ]);
        }
}
