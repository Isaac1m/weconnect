<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

use Session;

class ProfilesController extends Controller
{
    //


    public function index($slug){

        $user = User::where('slug',$slug)->first();

        return view('profiles.profile')->withUser($user);
    }


    public function edit(){

        $profile = Auth::user()->profile;

        return view('profiles.edit')->withProfile($profile);
    }


    public function update(Request $request){

        $this->validate($request,[

            'location' => 'required',
            'about' => 'required|max:255'
        ]);


        Auth::user()->profile()->update([
            'location' => $request->location,
            'about' => $request->about
        ]);

        if($request->hasFile('avatar')){

            Auth::user()->update([

                'avatar' => $request->avatar->store('public/avatars'),
            ]);
        }

        Session::flash('success', 'Profile Updated');

        return redirect()->route('profile.index', ['slug' => Auth::user()->slug]);

    }
}
