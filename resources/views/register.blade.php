@extends('layouts.main')
@section('title') User Registration | @env('APP_NAME') @endenv @stop()

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row  ">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <h2 class="mt-5 mb-4">Registration Here</h2>
                        <form action={{ route('register') }} method="post" enctype="multipart/form-data">
                            @csrf
                            @include('form.messages')

                            <div class="mb-3">
                                <label for="name" class="form-label">First Name </label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter your first name" />
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name </label>
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                    placeholder="Enter your last name" />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="name@example.com" />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="*******" />
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" placeholder="*******" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>

@stop()
