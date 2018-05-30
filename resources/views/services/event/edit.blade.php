@extends('layouts.app')

@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
    </div>
    <h1>Edit Event Order: {{ $event->id }}</h1>
    <hr>
    <form action="{{url('service/event', [$event->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}

    <!--Guest_id-->
        <label for="guest">Guest: </label><br>
        <select name="guest">
            @foreach ($guests as $guest)
                <option value="{{ $guest->id }}"
                        @if($guest->id == $event->guest_id)
                        selected
                        @endif>
                    {{ $guest->firstname." ".$guest->lastname}}
                </option>

            @endforeach
        </select><br/>

        <!--Event_type_id -->
        <label for="guest">Event: </label><br>
        <select name="eventtype">
            @foreach ($eventTypes as $eventType)
                <option value="{{ $eventType->id }}"
                        @if($event->event_type_id == $eventType->id)
                        selected
                        @endif>
                    {{ $eventType->name." - ".$eventType->location }}
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