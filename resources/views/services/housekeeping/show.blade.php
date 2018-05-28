@extends('layouts.app')
 
@section('content')
            <h1>Showing Housekeeping order: {{ $housekeeping->id }}</h1>
   <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('housekeeping.index') }}"> Back</a>
    </div>
    <div class="jumbotron text-center">
        <p>
            <strong>Guest_Id: </strong> {{$housekeeping->guest_id}}<br>
            <strong>Guest Name: </strong> {{ $guest->firstname. " ".$guest->lastname }}<br>
            <strong>Guest Phone: </strong> {{ $guest->telephone }}
        </p>
    </div>
@endsection