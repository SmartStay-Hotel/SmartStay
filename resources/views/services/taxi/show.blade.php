@extends('layouts.app')
 
@section('content')
            <h1>Showing Taxi order: {{ $taxi->id }}</h1>
   <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('taxi.index') }}"> Back</a>
    </div>
    <div class="jumbotron text-center">
        <p>
            <strong>Date hour: </strong> {{ $taxi->day_hour }}<br>
            <strong>Guest_Id: </strong> {{ $taxi->guest_id }}<br>
            <strong>Guest Name: </strong> {{ $guest->firstname. " ".$guest->lastname }}<br>
            <strong>Guest Phone: </strong> {{ $guest->telephone }}
        </p>
    </div>
@endsection