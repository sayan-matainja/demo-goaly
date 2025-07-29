<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    protected $fillable = ['banner_description','banner_type','category_id','banner_image','banner_url','is_active','date_created'];

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
