<?php

namespace App;

use Storage;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use App\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','slug','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    

    public function profile(){

        return $this->hasOne('App\Profile');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // public function likes()
    // {
    //     return $this->hasMany('App\Like');
    // }

    public function getAvatarAttribute($avatar)
    {
        return asset(Storage::url($avatar));
    }
}
