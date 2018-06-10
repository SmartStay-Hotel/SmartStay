@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('trip.index') }}">Trips</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Trip</li>
@endsection
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('trip.index') }}"> Back</a>
    </div>
    <h1>Edit Trip Order: {{ $trip->id }}</h1>
    <hr>
    <form action="{{url('service/trip', [$trip->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <!--Guest_id-->
        <label for="guest">Guest: </label><br>
        <select name="guest">
            @foreach ($guests as $guest)
                <option value="{{ $guest->id }}"
                        @if($guest->id == $trip->guest_id)
                        selected
                        @endif>
                    {{ $guest->firstname." ".$guest->lastname}}
                </option>

            @endforeach
        </select><br/>
        <!--Trip_type_id -->
        <label for="guest">Trip: </label><br>
        <select name="triptype">
            @foreach ($tripTypes as $tripType)
                <option value="{{ $tripType->id }}"
                        @if($trip->trip_type_id == $tripType->id)
                        selected
                        @endif>
                    {{ $tripType->name." - ".$tripType->location }}
                </option>
            @endforeach
        </select><br/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection