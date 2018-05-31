@extends('layouts.app')
 
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('snackdrink.index') }}"> Back</a>
    </div>
    <h1>Edit Snack and Drink Order: {{ $snackdrinks->id }}</h1>
    <hr>
     <form action="{{url('service/snackdrink', [$snackdrinks->id])}}" method="POST">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}

     <!--Guest_id-->
         <label for="guest">Guest: </label><br>
         <select name="guest">
             @foreach ($guests as $guest)
                 <option value="{{ $guest->id }}"
                         @if($guest->id == $snackdrinks->guest_id)
                         selected
                         @endif>
                     {{ $guest->firstname." ".$guest->lastname}}
                 </option>

             @endforeach
         </select><br/>

         <!--Product_id -->
         <label for="guest">Event: </label><br>
         <select name="productttype1">
             @foreach ($snackdrinks as $snackdrink)
                 <option value="{{ $snackdrink->id }}"
                         @if($snackdrink->event_type_id == $productType->id)
                         selected
                         @endif>
                     {{ $snackdrink->name}}
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