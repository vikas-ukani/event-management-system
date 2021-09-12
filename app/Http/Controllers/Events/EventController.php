<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Supports\Traits\DateConvertor;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // use DateConvertor;

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
        // $date = $this->isoToUTCFormat($input['start_date']);
        // $date = explode(' ', $date);
        // $dateRanges = $this->getAllWeeksDatesFromDateRange($program->start_date, $program->end_date, 'Y-m-d');
        // foreach ($dateRanges as $index => $dayRange) {
        //     /** check in array if exists then return */
        //     if (in_array($date[0],  $dayRange)) {
        //         $weekCounterNumberIs = $index + 1;
        //         break;
        //     }
        // }
        // return isset($weekCounterNumberIs) ? $weekCounterNumberIs : count($dateRanges);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        dd('valid', $request->validated());
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
