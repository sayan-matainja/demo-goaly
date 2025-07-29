<?php

namespace Modules\Admin\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\GamesSchedule;
use Modules\Admin\Entities\GamePoints;

class Games extends Model
{
    
    protected $table = 'games';
    protected $fillable = ['games_code','name','description','icon','banner','url','status','game_contest'];
        public function gamesSchedules()
    {
        return $this->hasMany(GamesSchedule::class, 'id_games', 'id');
    }

    public function gamePoints()
    {
        return $this->hasMany(GamePoints::class, 'id_games', 'id');
    }
}
