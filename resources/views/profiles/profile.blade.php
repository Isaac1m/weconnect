@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                     {{$user->name}}
                </div>
                <div class="panel-body">
                    <center>
                        <img src="{{ $user->avatar }} "  width="70px" height="70px" style="border-radius:50%;">
                    </center>
                    <br>
                    <p class="text-center">
                        {{$user->profile->location}}
                    </p>
                        <p class="text-center">
                            @if(Auth::id() == $user->id)
                                <a href="{{route('profile.edit')}}" class="btn btn-primary"> Edit Profile</a>
                            @endif    
                        </p>
                </div>
            </div>

            @if(Auth::id() != $user->id)

                <div class="panel panel-default">
                    <div class="panel-body">
                        <friend :profile_user_id="{{ $user->id }}"></friend>
                    </div>
                </div>

            @endif

                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        About Me
                    </div>
                    <div class="panel-body">
                        {{$user->profile->about}}
                    </div>
                </div>
        </div>
    </div> 
@stop