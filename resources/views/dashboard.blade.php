@extends('layouts.main')
@section('title') User Dashboard | @env('APP_NAME') @endenv @stop()

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <div class="content-wrapper">
        <div class="container">
            <h1 align="center" class="text-muted mt-3">Management My Events</h1>
            <div class="row mt-5 ">
                <div id='CalendarEvents'></div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#CalendarEvents').fullCalendar({
                header: {
                    right: 'prev,next today',
                    center: 'title',
                    left: 'month,basicWeek,basicDay'
                },
                navLinks: false,
                editable: false,
                displayEventTime: true,
                events: [
                    @foreach ($schedules as $schedule)
                        {
                        title : '{{ $schedule->event->name ?? '' }}',
                        description : '{{ $schedule->event->description ?? '' }}',
                        start : '{{ $schedule->date }}',
                        },
                    @endforeach
                ],
            })

            $('.fc-event-container').find('.fc-content').addClass('p-2');
        });
    </script>
@stop()
