<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Newsmanagement extends Model
{
    protected $table = 'news_management';

    protected $fillable = ['title','content','thumbnail','place_for','status','created_at'];

    public function scopeAll($query)
    {
        return $query->get();
    }

    public function scopeDataById($query,$id){

        return $query->where('id',$id)->first();

    }

    public function scopeDeleteById($query,$id){

        return $query->where('id',$id)->delete();

    }
}
