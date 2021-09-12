<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # PASS
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created event to schedule events.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $input = $request->validated();

        /** get Date and Time for Start Date */
        $startingDate = Carbon::parse($input['start_time'], env('APP_TIMEZONE'))->format('Y-m-d');
        $startingTime = Carbon::parse($input['start_time'], env('APP_TIMEZONE'))->format('H:i');

        /** get Date and Time for End Date */
        $ending90Date = Carbon::parse($startingDate, env('APP_TIMEZONE'))->addDays(90)->format('Y-m-d');
        $endingTime = Carbon::parse($input['end_time'], env('APP_TIMEZONE'))->format('H:i');

        $input['user_id'] = Auth::id();
        $event = Event::create($input);
        if ($event->id) {
            $allDayOfWeekRange = $this->getWeekDaysInRange(
                $input['day_of_the_week'],
                $startingDate,
                $ending90Date
            );

            $scheduledEventDates = [];
            /** Refactor Schedule Events Records */
            foreach ($allDayOfWeekRange as $date) {
                /** Extract Hour and Minutes for saving Date to Schedulers. */
                [$hour, $minute] = explode(':', $startingTime);
                $scheduledEventDates[] = [
                    'event_id' => $event->id,
                    'date' => Carbon::parse($date)->addHours((int)($hour))->addMinutes((int) ($minute)),
                    'starting_time'  =>  $startingTime,
                    'ending_time'  => $endingTime,
                ];
            }
            DB::table('schedules')->insert($scheduledEventDates);
        }
        return redirect()->to('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        # PASS
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        # PASS
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        # PASS
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # PASS
    }
}
