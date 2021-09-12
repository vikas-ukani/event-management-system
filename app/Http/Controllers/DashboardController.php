<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $eventIds = collect(Auth::user()->events)->pluck('id')->all();
        $schedules = Schedule::whereIn('event_id', $eventIds)->with('event')->get();
        return view('dashboard', compact('schedules'));
    }
}
