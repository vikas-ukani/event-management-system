@extends('layouts.main')
@section('title') User Information | @env('APP_NAME') @endenv @stop()

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row  ">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <h2 class="mt-5 mb-4">User Informations</h2>
                        <form action={{ route('users.update', ['user' => $user->id]) }} method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @include('form.messages')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name"
                                    value={{ old('name') ?? $user->name }} />
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username </label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Enter your username" value={{ old('username') ?? $user->username }} />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="name@example.com" value={{ old('email') ?? $user->email }} />
                            </div>

                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="number" name="mobile" class="form-control" id="mobile"
                                    placeholder="Enter mobile number" />
                            </div>

                            <div class="mb-3">
                                <label for="Image" class="form-label">Image</label>
                                {{-- {{ dd(public_path('/images' . $user->profile_image)) }} --}}
                                <img src={{ url('/images/' . $user->profile_image) }} alt="Alt" height="100" width="100"
                                    class="img-rounded rounded">
                                <input type="file" name="profile_image" class="form-control" id="profile_image"
                                    accept=".jpg,.gif" />
                            </div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth"
                                    value={{ old('date_of_birth') ?? $user->date_of_birth }} />
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" cols="30" rows="4"
                                    class="form-control">{{ old('address') ?? $user->address }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Country:</label>
                                <select name="country_id" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option value=''> Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value={{ $country->id }} @if ($user->country_id == $country->id)
                                            selected
                                    @endif
                                    >
                                    {{ $country->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">State:</label>
                                <select name="state_id" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option value=''> Select State</option>
                                    @foreach ($states as $state)
                                        <option value={{ $state->id }} @if ($user->state_id == $state->id)
                                            selected
                                    @endif>
                                    {{ $state->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">City:</label>
                                <select name="city_id" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option value=''> Select City</option>
                                    @foreach ($cities as $city)
                                        <option value={{ $city->id }} @if ($user->city_id == $city->id)
                                            selected
                                    @endif>
                                    {{ $city->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <a href={{ route('dashboard') }} class="btn btn-link">Back to List</a>
                                {{-- <button type="submit" class="btn btn-success">Update</button> --}}
                            </div>
                        </form>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>

@stop()
