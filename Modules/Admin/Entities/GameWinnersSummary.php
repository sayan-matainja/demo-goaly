<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\PredictionTotalPointCount;
use Modules\Admin\Entities\GamesSchedule;
use Modules\Admin\Entities\Games;
use Modules\Admin\Entities\GamePoints;
use Modules\Admin\Entities\Prizelist;
class GameWinnersSummary extends Model
{   
    protected $table='game_winners_summary';
    protected $fillable = [
        'schedule_id', 'user_id', 'score', 'prize_type', 'name', 'avatar', 'msisdn',
        'id_games', 'game_name', 'competition_type','competition_date',  'prize_name', 'prize_image',
        'start_date', 'end_date', 'cron_type'
    ];



}
