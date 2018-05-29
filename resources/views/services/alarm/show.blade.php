@extends('layouts.app')

@section('content')
    <h1>Showing Alarm order: {{ $alarm->id }}</h1>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('alarm.index') }}"> Back</a>
    </div>
    <div class="jumbotron text-center">
        <p>
            <strong>Date hour: </strong> {{ $alarm->day_hour }}<br>
            <strong>Guest_Id: </strong> {{ $alarm->guest_id }}<br>
            <strong>Guest Name: </strong> {{ $guest->firstname. " ".$guest->lastname }}<br>
            <strong>Guest Phone: </strong> {{ $guest->telephone }}
        </p>
    </div>
@endsection