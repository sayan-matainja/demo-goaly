<?php 
namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\GamesSchedule;
use App\UserModel;

use Modules\Admin\Entities\Games;
class GamePoints extends Model
{
    protected $table = 'game_points';
    protected $fillable = ['id_users', 'id_games', 'points', 'date', 'schedule_id'];
    
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_users', 'id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'id_games', 'id');
    }

    public function competitionGameSchedule()
    {
        return $this->belongsTo(CompetitionGameSchedule::class, 'schedule_id', 'id');
    }


    public function scopegetHighScores($query, $id_games = '', $limit = '', $date = '')
    {
        $query = $query->select('id_games', 'id_users', 'points')
                      ->with(['user' => function ($query) {
                        $query->select('id', 'first_name', 'last_name', 'msisdn', 'subscription_status');
                        }])
                      ->where('id_games', $id_games)
                      ->groupBy('id_users', 'id_games', 'points')
                      ->orderByDesc('points');

        if (!empty($date)) {
            $query->whereDate('date', '>=', $date['start_date'])
                  ->whereDate('date', '<=', $date['end_date']);
        }

        if (!empty($limit)) {
            $query->limit($limit);
        }

        $highScores = $query->get();

        $lnk = public_path('assets/uploads/profiles/');
        $noImg = public_path('assets/uploads/profiles/img-ava.png');

        $highScores->transform(function ($score) use ($lnk, $noImg) {
        $score->image = isset($score->user->img) ? $lnk . $score->user->img : $noImg;
        $score->name = isset($score->user->first_name, $score->user->last_name) ? $score->user->first_name . ' ' . $score->user->last_name : null;
        $score->msisdn = $score->user->msisdn ?? null;
        $score->status = $score->user->subscription_status ?? null;
        unset($score->user); 
        return $score;
        });

        return $highScores->toArray();
    }


    public function scopepointsUpdate($query,$where,$data)
    {
        $existingRecord = $query->where($where)->first();

        if ($existingRecord) {
            if ($existingRecord->points > $data['points']) {
                // Keep the previous high score
                $data['points'] = $existingRecord->points;
            }
            $existingRecord->update($data);
            return $existingRecord;
        } else {
            return $query->create($data);
        }
    }
}
