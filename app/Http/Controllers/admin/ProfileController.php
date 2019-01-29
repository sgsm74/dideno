<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Helpers\DateHelper;

class ProfileController extends Controller
{
        //عوض کردن رمز عبور
    public function changePassword(Request $request){

    	$this->validate($request,[
            'oldPassword' => 'required|string',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if(Hash::check($request->oldPassword, Auth::user()->password)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return back()->with('error','رمز عبور فعلی را اشتباه وارد کرده اید');
    }

    //به روز رسانی اطلاعات کاربر
    public function update(Request $request){
		$this->validate($request,[
			'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'fatherName' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'major' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:11',
            'SN' => 'required|string|max:10',
            'grade' => 'required|in:"none", "diploma", "associate", "bachelor", "master", "doctoral"',
            'avatar' => 'nullable',
		]);

		$user = User::find(Auth::id());
		$user->firstName = $request->get('firstName');
		$user->lastName = $request->get('lastName');
		$user->fatherName = $request->get('fatherName');
		$user->city = $request->get('city');
		$user->major = $request->get('major');
		$user->university = $request->get('university');
		$user->phoneNumber = $request->get('phoneNumber');
		$user->SN = $request->get('SN');
		$user->grade = $request->get('grade');

		$date = date_create();
        date_timestamp_set($date, $request->get('birthday'));
		$user->birthday = $date;

		$user->gender = $request->get('gender');
    	if($request->hasFile('avatar')){
            $avatar = Input::file('avatar');
            $avatarName = $avatar->getClientOriginalName();
            $path = 'uploads/avatars/'.date('Y-m-d').'/';
            // $dir = $path.'/'.$avatarName;
            // if(Storage::disk('public')->put($path.'/'.$avatarName, File::get($avatar))){
            //  $user->avatar = $dir;
            // }
            if($avatar->move($path, $avatarName)){
                $user->avatar = $path.''.$avatarName;
            }
        }

    	$user->save();
    	return back();
    }
}
