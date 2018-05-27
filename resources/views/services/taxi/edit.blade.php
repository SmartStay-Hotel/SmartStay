@extends('layouts.app')
 
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('taxi.index') }}"> Back</a>
    </div>
    <h1>Edit Taxi Order: {{ $taxi->id }}</h1>
    <hr>
    <form action="{{url('service/taxi', [$taxi->id])}}" method="post">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
      <div class="form-group">
          <!--Guest_id-->
          <label for="guest">Guest: </label><br>
          <select name="guest">
              @foreach ($guests as $guest)
                  <option value="{{ $guest->id }}"
                          @if($guest->id == $taxi->guest_id)
                          selected
                          @endif>
                      {{ $guest->firstname." ".$guest->lastname}}
                  </option>

              @endforeach
          </select><br/>
      <!-- Taxi Date -->
        <label for="title">Taxi Date: </label>
        <input type="text" value="{{$taxi->day_hour}}" class="form-control datepicker" id="day_hour"  name="day_hour" >
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