<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        'user_id',
        'description',
        'start_time',
        'end_time',
        'day_of_the_week',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];


    /**
     * Set the user's id.
     *
     * @param  string  $value
     * @return void
     */
    public function setUserIdAttribute($value)
    {
        // dd('user', Auth::id());
        return $this->attributes['user_id'] = Auth::id();
    }

    public function getStartTimeAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
    }

    public function getEndTimeAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'event_id', 'id');
    }
}
