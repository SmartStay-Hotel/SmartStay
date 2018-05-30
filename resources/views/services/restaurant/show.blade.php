@extends('layouts.app')

@section('content')
    <h1>Showing Restaurant order: {{ $restaurant->id }}</h1>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('restaurant.index') }}"> Back</a>
    </div>
    <div class="jumbotron text-center">
        <p>
            <strong>Quantity: </strong> {{ $restaurant->quantity }}<br>
            <strong>Date hour: </strong> {{ $restaurant->day_hour }}<br>
            <strong>Guest Name: </strong> {{ $guest->firstname. " ".$guest->lastname }}<br>
            <strong>Guest Phone: </strong> {{ $guest->telephone }}
        </p>
    </div>
@endsection