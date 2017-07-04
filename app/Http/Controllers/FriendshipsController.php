<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public $id;

    public function check($id){

        if(Auth::user()->is_friends_with($id) === 1){

            return ['status' => 'friends'];
        }

        if(Auth::user()->has_pending_friend_request_from($id) === 1){

            return ['status' => 'pending'];
        }


        if(Auth::user()->has_pending_friend_request_sent_to($id) === 1){

            return ['status' => 'waiting'];
        }

        return ['status' => 'not_friends'];
    }

    public function add_friend($id){

        //notifications, emails, brodcasting

        $response = Auth::user()->add_friend($id);

        User::find($id)->notify( new \App\Notifications\NewFriendRequest(Auth::user()));

        return $response;

    }

    public function accept_friend($id){

        //notifications, emails, brodcasting
      

        $response = Auth::user()->accept_friend($id);

        User::find($id)->notify(new \App\Notifications\FriendRequestAccepted(Auth::user()));

        return $response;


    }
}
