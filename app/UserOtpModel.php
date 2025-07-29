<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOtpModel extends Model
{
    protected $table = 'user_otp';

    protected $fillable = ['msisdn','otp','otp_created','otp_expired'];

    public $timestamps = false;

   
}
