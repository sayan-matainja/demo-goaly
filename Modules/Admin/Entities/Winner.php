<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{

    protected $table = 'winner_prize_management';

    protected $fillable = ['type','rank','prize_name','prize_size','prize_image','start_date','end_date','status'];

    public function scopeAll($query)
    {
        return $query->get();
    }

    public function scopeDataById($query,$id){

        return $query->where('id',$id)->first();

    }

    public function scopeUpdateDataById($query,$data){

        return $query->where('id',$data['Idd'])->update(
            ['type' => $data['type']],
            ['rank' => $data['rank']],
            ['prize_name' => $data['prizename']],
            ['start_date' => $data['start_date']],
            ['end_date' => $data['end_date']]);

    }

    public function scopeDeleteById($query,$id){

        return $query->where('id',$id)->delete();

    }
}
