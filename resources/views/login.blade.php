@extends('layouts.main')
@section('title') User Login | @env('APP_NAME') @endenv @stop()

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row  ">
                <div class="col-3"></div>
                <div class="col-6">
                    <h2 class="mt-5 mb-4">Login Here</h2>
                    <form action={{ route('login') }} method="post">
                        @csrf
                        @include('form.messages')

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="*******">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

@stop()
