@extends('layout')
 
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('taxi.index') }}"> Back</a>
    </div>
    <h1>Edit Taxi Order</h1>
    <hr>
    <form action="/service/taxi" method="post">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
      <div class="form-group">
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