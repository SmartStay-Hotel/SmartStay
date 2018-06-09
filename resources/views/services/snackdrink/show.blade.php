@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('snackdrink.index') }}">Snacks and Drinks</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show Order</li>
@endsection
@section('content')
            <h1>Showing Event Order: {{ $event->id }}</h1>
   <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
    </div>
    <div class="jumbotron text-center">
        <p>
            <strong>Event Type: </strong> {{ $eventType->name }}<br>
            <strong>Event Location: </strong> {{ $eventType->location }}<br>
            <strong>Guest Id: </strong> {{ $guest->id }}<br>
            <strong>Guest name:</strong> {{ $guest->firstname." ".$guest->lastname }}
        </p>
    </div>
@endsection