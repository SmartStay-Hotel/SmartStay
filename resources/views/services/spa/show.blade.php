@extends('layouts.app')
 
@section('content')
            <h1>Showing Spa Appointment Order: {{ $spa->id }}</h1>
   <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('spa.index') }}"> Back</a>
    </div>
    <div class="jumbotron text-center">
        <p>
            <strong>Treatment Spa Type: </strong> {{ $spaType->name }}<br>
            <strong>Duration: </strong> {{ $spaType->duration }}<br>
            <strong>Guest Id: </strong> {{ $guest->id }}<br>
            <strong>Guest name:</strong> {{ $guest->firstname." ".$guest->lastname }}
        </p>
    </div>
@endsection