@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('spa.index') }}">Spa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Appointment</li>
@endsection
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('spa.index') }}"> Back</a>
    </div>
    <h1>Add New Spa Order</h1>
    <hr>
     <form action="/service/spa" method="post">
     {{ csrf_field() }}
      <div class="form-group">
          <!--Guest-->
          <label for="guest">Guest: </label>
          <select name="guest">
              @foreach ($guests as $guest)
                  <option value="{{ $guest->id }}">{{ $guest->firstname." ".$guest->lastname}}</option>
              @endforeach
          </select><br/>
          <!-- Spa Type -->
          <label for="guest">Spa Treatment Type: </label>
          <select name="spatype">
              @foreach ($spaTypes as $spaType)
                  <option value="{{ $spaType->id }}">{{ $spaType->name}}</option>
              @endforeach
          </select><br/>
          <!--Day Hour-->
          <label for="title">Spa Date: </label>
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
@section('scripts')
    <script>
        document.getElementsByClassName("itemDropdown")[5].style.color="white";
    </script>
@endsection