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

    public function getWeekDayInRange($weekday, $dateFromString, $dateToString, $format = 'Y-m-d')
    {
        $dateFrom = new \DateTime($dateFromString);
        $dateTo = new \DateTime($dateToString);
        $dates = [];

        if ($dateFrom > $dateTo) {
            return $dates;
        }

        if (date('N', strtotime($weekday)) != $dateFrom->format('N')) {
            $dateFrom->modify("next $weekday");
        }

        while ($dateFrom <= $dateTo) {
            $dates[] = $dateFrom->format($format);
            $dateFrom->modify('+1 week');
        }

        return $dates;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $input = $request->validated();

        $startingDate = Carbon::parse($input['start_time'], env('APP_TIMEZONE'))->format('Y-m-d');
        $startingTime = Carbon::parse($input['start_time'], env('APP_TIMEZONE'))->format('H:i');

        $ending90Date = Carbon::parse($startingDate, env('APP_TIMEZONE'))->addDays(90)->format('Y-m-d');
        $endingTime = Carbon::parse($input['end_time'], env('APP_TIMEZONE'))->format('H:i');

        $input['user_id']  =Auth::id();
        $event = Event::create($input);
        if ($event->id) {
            $allDayOfWeekRange = $this->getWeekDayInRange(
                $input['day_of_the_week'],
                $startingDate,
                $ending90Date,
                'Y-m-d'
            );

            $scheduledEventDates = [];
            foreach ($allDayOfWeekRange as $date) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
