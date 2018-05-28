@extends('layouts.app')
 
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('trip.index') }}"> Back</a>
    </div>
    <h1>Add New Trip Order</h1>
    <hr>
     <form action="/service/trip" method="post">
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
          <label for="guest">Trip: </label>
          <select name="triptype">
              @foreach ($tripTypes as $tripType)
                  <option value="{{ $tripType->id }}">{{ $tripType->name." - ".$tripType->location}}</option>
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