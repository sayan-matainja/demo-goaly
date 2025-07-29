<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPrizeRedeem extends Model
{
   protected $table = 'user_prize_redeem';

    public function scopecheckMsisdnRedeemPrize($query,$msisdn, $firstDay, $lastDay, $type)
    {
        return $query->where('type', $type)
            ->where('winner_msisdn', $msisdn)
            ->where('prize_start_date', '>=', $firstDay)
            ->where('prize_end_date', '<=', $lastDay)
            ->exists();
    }














}
