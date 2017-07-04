<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    //To be mass assigned

    protected $fillable = ['requester','user_requested','status'];
}
