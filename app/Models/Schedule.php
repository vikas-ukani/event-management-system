<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'event_id',
        'date',
        'starting_time',
        'ending_time',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];


    public function event()
    {
        return $this->hasOne(Event::class, 'id', 'event_id');
    }
}
