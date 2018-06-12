@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('spa.index') }}">Spa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Appointment</li>
@endsection
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('spa.index') }}"> Back</a>
    </div>
    <h1>Edit Spa Appointment Order: {{ $spa->id }}</h1>
    <hr>
     <form action="{{url('service/spa', [$spa->id])}}" method="POST">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
     <!--Guest_id-->
         <label for="guest">Guest: </label><br>
         <select name="guest">
             @foreach ($guests as $guest)
                 <option value="{{ $guest->id }}"
                         @if($guest->id == $spa->guest_id)
                         selected
                         @endif>
                     {{ $guest->firstname." ".$guest->lastname}}
                 </option>
             @endforeach
         </select><br/>
         <!--Spa_type_id -->
         <label for="guest">Trip: </label><br>
         <select name="spatype">
             @foreach ($spaTypes as $spaType)
                 <option value="{{ $spaType->id }}"
                         @if($spa->treatment_type_id == $spaType->id)
                         selected
                         @endif>
                     {{ $spaType->name." - ".$spaType->duration }}
                 </option>
             @endforeach
         </select><br/>
         <!--Day Hour-->
         <label for="title">Spa Date: </label>
         <input type="date" class="form-control datepicker" id="day_hour"  name="day_hour"/>
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