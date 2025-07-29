<?php

namespace Modules\Admin\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\GamePoints;
use Modules\Admin\Entities\Games;
use Carbon;
class GamesSchedule extends Model
{
    protected $table = 'competition_game_schedule';
    protected $fillable = ['competition_type','icon','name','start_date','end_date','status'];

    public function game()
    {
        return $this->belongsTo(Games::class, 'id_games', 'id');
    }

    public function gamePoints()
    {
        return $this->hasMany(GamePoints::class, 'schedule_id', 'id');
    }

    public function scopeActiveGameDetails($query)
    {
        $currentDate = now()->toDateString();

        return $query->where('status', 1)
            ->whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate);
    }
    public function scopefetchAllGames()
    {
        $currentDate = now()->toDateString(); // Assuming you're using Carbon for dates

        return $this->with(['game'])
            ->where('status', 1)
            ->whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }




    public function scopegetHighScores($id_games = '', $limit = '', $date = ''){
        return false;
    }

}
