<?php

namespace Invoice\Http\Controllers;

use Illuminate\Http\Request;
use Invoice\Profile;
use Image;
use Invoice\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function user() {
        $profile = Profile::first();
        return view('/user')->withProfile($profile);
    }
    public function createProfile(Request $request) {
        $this->validate($request, [
            'companyLogo' => 'required',
            'tax' => 'required',
            'rate' => 'required'
        ]);
        $profile = new Profile;
        if($request->hasFile('companyLogo')){
            $companyLogo = $request->file('companyLogo');
            $filename = time() . '.' . $companyLogo->getClientOriginalExtension();
            $location = public_path('system/' . $filename);
            Image::make($companyLogo)->resize(800,400)->save($location);
            $profile->companyLogo = $filename;
        }
        $profile->rate = $request->rate;
        $profile->tax = $request->tax;
        $profile->save();
        return redirect()->back()->with('status', 'Profile Created Successfully!!!');
    }
    public function editProfile(Request $request, $id) {
        $profile = Profile::find($id);
        $profile->rate = $request->rate;
        $profile->tax = $request->tax;
        $profile->save();
        return redirect()->back()->with('status', 'Rate and Rate edited successfully');
    }
    public function addUSer(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        $time = Carbon::now();
        $status = 0;

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $status;
        $user->email_verified_at = $time;
        $user->password = bcrypt($request->name);
        $user->save();
        return redirect()->back()->with('status', 'User added successfully');
    }
}