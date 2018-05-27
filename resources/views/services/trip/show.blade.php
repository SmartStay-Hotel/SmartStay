@extends('layouts.app')
 
@section('content')
            <h1>Showing Trip Order: {{ $trip->id }}</h1>
   <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('trip.index') }}"> Back</a>
    </div>
    <div class="jumbotron text-center">
        <p>
            <strong>Trip Type: </strong> {{ $tripType->name }}<br>
            <strong>Trip Location: </strong> {{ $tripType->location }}<br>
            <strong>Guest Id: </strong> {{ $guest->id }}<br>
            <strong>Guest name:</strong> {{ $guest->firstname." ".$guest->lastname }}
        </p>
    </div>
@endsection