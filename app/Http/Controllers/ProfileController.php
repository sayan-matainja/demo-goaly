<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\PlayedPrediction;
use Modules\Admin\Entities\Predictions;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\UserModel;
use File;

class ProfileController extends Controller
{
    public function index()
    {
    	$UserId = Session::get('UserId');
    	$countries=DB::table('country_list')->get();
    	if ($UserId) {

            $user_details = UserModel::whereId($UserId)->first();
            $userInfo = [
                    'id' => $user_details['id'],
                    'first_name' => $user_details['first_name'],
                    'last_name' => $user_details['last_name'],
                    'status' => $user_details['status'],
                    'img' => $user_details['img'],
                    'msisdn' => $user_details['msisdn'] ];
    
                Session::put('User', $userInfo);   

            return view('profile.index',compact('user_details'));
        }
        else{

            return redirect('/login')->with('flash_message_error', 'Unauthorized! Please Login');
        }
    }
    public function profile_contest_history()
    {

        $UserId = Session::get('UserId');
        if($UserId){        
         
          $contests=PlayedPrediction::ContestHistory($UserId)->get();
       
          return view('profile.profile_contest_history',compact('contests'));
        }else{
          return redirect('/login')->with('flash_message_error', 'Unauthorized! Please Login');

        }
    }

    public function edit(Request $request ){
        $UserId = Session::get('UserId');
        $countries=DB::table('country_list')->get();

        if ($UserId) {
            $user_details = UserModel::whereId($UserId)->first();
            
        }   
    $matchingCountry = DB::table('country_list')->where('country_name', $user_details['country'])->first();

        $country_id = $matchingCountry ? $matchingCountry->country_code : null;
      

        return view('profile.edit',compact('user_details','countries','country_id'));

    }

    public function update(Request $request)
    { 
        $userId = Session::get('UserId');

        $user = UserModel::find($userId);

        if (!$user) {
          
            Session::flash('error', 'User not found.');
            return redirect()->route('profile');
        }

         $rules = [
            'country' => 'required|string|max:11',
            'first_name' => 'required|string|max:30|regex:/^[a-zA-Z]+$/',
            'last_name' => 'required|string|max:30|regex:/^[a-zA-Z]+$/',
            'email' => [
                'required',
                'email',
                'min:7',
                'max:100',
                'regex:/^[a-zA-Z]+[a-zA-Z0-9._-]*[a-zA-Z0-9]@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'unique:users,email,' . $userId,
            ],
        ];


        $customMessages = [
        'first_name.regex' => 'Invalid name format. Please check again.',
        'first_name.max' => 'Maximum name length is :max characters. Please check again.',
        'last_name.regex' => 'Invalid name format. Please check again.',
        'last_name.max' => 'Maximum name length is :max characters. Please check again.',
        'email.min' => 'Minimum email length is :min characters. Please check again.',
        'email.max' => 'Maximum email length is :max characters. Please check again.',
        'email.regex' => 'Invalid email format. Please check again.',
        'email.unique' => 'This email is already taken. Please choose a different one.',
        ];
 
        $validator = Validator::make($request->all(), $rules, $customMessages);
        if ($validator->fails()) { 
        return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('img')) {
            $destination = public_path('/uploads');
            $permissions = 0755; // Octal notation for 755 permissions

            if (!is_dir($destination)) {
                mkdir($destination, $permissions, true); // true parameter creates nested directories
            }

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
           
            $file->move($destination, $filename);
            $user->img = $filename;
        }

        $user->country = $request->input('country');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        $updateResult = $user->save();

        if (!$updateResult) {
            // Handle the case where the update fails
            Session::flash('error', 'Failed to update user details.');
            return redirect()->route('profile');
        }

        // Flash a success message to the session
        Session::flash('success', 'User details updated successfully.');

        // Redirect back to the form
        return redirect()->route('profile');
    }

}
