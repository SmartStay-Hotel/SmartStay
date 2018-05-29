@extends('layouts.app')

@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('alarm.index') }}"> Back</a>
    </div>
    <h1>Add New Alarm order</h1>
    <hr>
    <form action="/service/alarm" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="guest">Guest: </label>
            <select name="guest">
                @foreach ($guests as $guest)
                    <option value="{{ $guest->id }}">{{ $guest->firstname." ".$guest->lastname}}</option>
                @endforeach
            </select><br/>
            <label for="title">Alarm Date: </label>
            <input type="datetime-local" class="form-control datepicker" id="day_hour" name="day_hour"/>
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