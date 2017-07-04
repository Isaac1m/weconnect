@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Notifications</div>

                <div class="panel-body">

                <ul class="list-group">
                    @foreach($notifications as $notification)
                        <li class="list-group-item">
                            @if( $notification->type =='App\Notifications\NewFriendRequest' ||  $notification->type =='App\Notifications\FriendRequestAccepted')
                                <img src="{{ Auth::user()->find($notification->data['requester_id'])->first()->avatar }}" alt="avatar" class="pull-left" height="30px" width="30px" style="border-radius:50%;"> &nbsp;
                                <a href="{{ route('profile.index', ['slug' => Auth::user()->find($notification->data['requester_id'])->first()->slug]) }}"> {{$notification->data['name']}} &nbsp; {{$notification->data['message']}} </a> &nbsp;
                                 <span class="pull-right">{{ $notification->created_at->diffForHumans() }}</span>
                            @else

                            {{$notification->data['name']}} &nbsp; {{$notification->data['message']}} &nbsp;
                            <span class="pull-right">{{ $notification->created_at->diffForHumans() }}</span>
                            @endif
                        </li>
                    @endforeach

                </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
