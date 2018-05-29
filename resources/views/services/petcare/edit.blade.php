@extends('layouts.app')
 
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('petcare.index') }}"> Back</a>
    </div>
    <h1>Edit Housekeeping Order: {{ $petcare->id }}</h1>
    <hr>
    <form action="{{url('service/petcare', [$petcare->id])}}" method="post">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
      <div class="form-group">
          <!--Guest_id-->
          <label for="guest">Guest: </label><br>
          <select name="guest">
              @foreach ($guests as $guest)
                  <option value="{{ $guest->id }}"
                  @if($guest->id == $petcare->guest_id)
                      selected
                  @endif>
                      {{ $guest->firstname." ".$guest->lastname}}
                  </option>

              @endforeach
          </select><br/>

          <!-- Water -->
          <label for="title">Water: </label>
          <input type="checkbox" class="form-control" id="water"  name="water"
                 {{ ($petcare->water) ? "checked" : "" }}/>

          <!-- Snacks -->
          <label for="title">Snacks: </label>
          <input type="checkbox" class="form-control" id="snacks"  name="snacks"
                 {{ ($petcare->snacks) ? "checked" : "" }}/>

          <!-- Standard_food -->
          <label class="radio-inline">
              <input type="radio" name="food[]" value="0" {{ ($petcare->standard_food) ? "checked" : "" }}/>Standard Food: </label>
          <!-- Premium food-->
          <label class="radio-inline">
              <input type="radio" name="food[]" value="1" {{ ($petcare->premium_food) ? "checked" : "" }}/>Premium Food: </label>
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