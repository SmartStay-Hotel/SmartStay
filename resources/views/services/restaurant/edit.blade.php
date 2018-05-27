@extends('layouts.app')
 
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('restaurant.index') }}"> Back</a>
    </div>
    <h1>Edit Restaurant Order: {{ $restaurant->id }}</h1>
    <hr>
    <form action="{{url('service/restaurant', [$restaurant->id])}}" method="post">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
      <div class="form-group">
          <!--Guest_id-->
          <label for="guest">Guest: </label><br>
          <select name="guest">
              @foreach ($guests as $guest)
                  <option value="{{ $guest->id }}"
                          @if($guest->id == $restaurant->guest_id)
                          selected
                          @endif>
                      {{ $guest->firstname." ".$guest->lastname}}
                  </option>

              @endforeach
          </select><br/>
      <!-- Quantity -->
          <label for="title">Quantity: </label>
          <input type="text" value="{{$restaurant->quantity}}" class="form-control" id="quantity"  name="quantity" >
          <!-- Restaurant Date -->
        <label for="title">Restaurant Date: </label>
        <input type="text" value="{{$restaurant->day_hour}}" class="form-control datepicker" id="day_hour"  name="day_hour" >
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