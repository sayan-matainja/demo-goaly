<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_register extends Model
{
    //
    protected $fillable = ['first_name','last_name','gender','region','phone', 'email',  'password',];

    protected $hidden = ['password',  'remember_token'];
}
