<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'code'
    ];

    public function total_minutes_diff()
    {
        $d1 = strtotime('now');
        $d2 = strtotime($this->updated_at);
        $totalSecondsDiff = abs($d1 - $d2);
        $totalMinutesDiff = $totalSecondsDiff / 60;
        return $totalMinutesDiff;
    }


}
