<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = ['location','user_id','about'];
    
    public function user(){

        return $this->belongsTo('App\User');
    }
}
