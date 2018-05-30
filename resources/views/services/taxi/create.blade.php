@extends('layouts.app')
 
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('taxi.index') }}"> Back</a>
    </div>
    <h1>Add New Taxi order</h1>
    <hr>
     <form action="/service/taxi" method="post">
     {{ csrf_field() }}
      <div class="form-group">
          <label for="guest">Guest: </label>
          <select name="guest">
              @foreach ($guests as $guest)
                  <option value="{{ $guest->id }}">{{ $guest->firstname." ".$guest->lastname}}</option>
              @endforeach
          </select><br/>
        <label for="title">Taxi Date: </label>
        <input type="date" class="form-control datepicker" id="day_hour"  name="day_hour"/>
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