@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('event.index') }}">Event</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Event</li>
@endsection
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
    </div>
    <h1>Add New Event Order</h1>
    <hr>
    <form action="/service/event" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <!--Guest-->
            <label for="guest">Guest: </label>
            <select name="guest">
                @foreach ($guests as $guest)
                    <option value="{{ $guest->id }}">{{ $guest->firstname." ".$guest->lastname}}</option>
                @endforeach
            </select><br/>
            <!-- Trip Type -->
            <label for="guest">Event: </label>
            <select name="eventtype">
                @foreach ($eventTypes as $event)
                    <option value="{{ $event->id }}">{{ $event->name." - ".$event->location}}</option>
                @endforeach
            </select><br/>
        </div>
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