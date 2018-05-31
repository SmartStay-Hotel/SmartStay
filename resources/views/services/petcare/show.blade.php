@extends('layouts.app')
 
@section('content')
            <h1>Showing Pet Care order: {{ $petcare->id }}</h1>
   <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('petcare.index') }}"> Back</a>
    </div>
    <div class="jumbotron text-center">
        <p>
            <strong>Guest_Id: </strong> {{$petcare->guest_id}}<br>
            <strong>Guest Name: </strong> {{ $guest->firstname. " ".$guest->lastname }}<br>
            <strong>Guest Phone: </strong> {{ $guest->telephone }}
        </p>
    </div>
@endsection