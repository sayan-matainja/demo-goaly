<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
   protected $table = 'notifications';


    public function scopeMessage($query,$type){
        return $query->select('title','message')->where('type',$type)->first();
    }
}
