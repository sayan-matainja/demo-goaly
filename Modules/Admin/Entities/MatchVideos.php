<?php

namespace Modules\Admin\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MatchVideos extends Model
{
    protected $table = 'match_videos';
    protected $fillable = ['fixture_id','title','video'];

    public function scopeAll($query)

    {
        return $query->get();
    }

    public function scopegetHighlights($query,$fixtureId)

    {
        return $query->select('fixture_id','video')->where('fixture_id',$fixtureId);
    }

    
}