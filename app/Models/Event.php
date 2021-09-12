<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'day_of_the_week',
    ];

    protected $casts = [
        'start_time' => 'date:hh:mm',
        'end_time' => 'date:hh:mm'
    ];

    public function getStartTimeAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
    }

    public function getEndTimeAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
    }
}
