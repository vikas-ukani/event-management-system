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
                        <form action={{ route('event.store') }} method="POST">
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
                                        <input  id='start_time' type='text' class="form-control" placeholder='Select start time' />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">End Time</label>
                                <div class="form-group">
                                    <div class='input-group date' >
                                        <input id='end_time' type='text' class="form-control" placeholder='Select end time'  />
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
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#start_time').datetimepicker();
            $('#end_time').datetimepicker();
        });
    </script>
@stop()
