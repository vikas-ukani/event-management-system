@extends('layouts.main')
@section('title') Event Create | @env('APP_NAME') @endenv @stop()
@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row  ">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <h2 class="mt-5 mb-4">Create an Event</h2>
                        <form id="EventForm" action={{ route('event.store') }} method="POST">
                            @csrf
                            @include('form.messages')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter event title" />
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5"
                                    placeholder="Enter Event description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Start Time</label>

                                <div class="form-group">
                                    <div class='input-group date'>
                                        <input id='start_time' type="text" name="start_time" class="form-control"
                                            id="start_time" placeholder="Select start time" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">End Time</label>
                                <div class="form-group">
                                    <div class='input-group date'>
                                        <input id='end_time' type="text" name="end_time" class="form-control"
                                            id="end_time" placeholder="Select end time" />

                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Day of the Week </label>
                                <div class="form-group">
                                    <select name="day_of_the_week" $day$dayid="day_of_the_week" class="form-control">
                                        @foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                                            <option value={{ $day }}>{{ $day }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" id="save_event" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#start_time').datetimepicker();
            $('#end_time').datetimepicker();
        });


        // $("#save_event").click(function() {
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('event.store') }}",
        //         method: "POST",
        //         data: $('#EventForm').serialize(),
        //         success: function(data) {
        //             console.log(data);
        //             // $('#dateSelected').text(data);
        //         }
        //     });
        //     return false;
        // })
    </script>
@stop()
