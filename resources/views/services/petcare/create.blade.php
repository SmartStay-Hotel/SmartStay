@extends('layouts.app')
 
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('petcare.index') }}"> Back</a>
    </div>
    <h1>Add New Pet Care order</h1>
    <hr>
     <form action="/service/petcare" method="post">
     {{ csrf_field() }}
      <div class="form-group">
          <label for="guest">Guest: </label>
          <select name="guest">
              @foreach ($guests as $guest)
                  <option value="{{ $guest->id }}">{{ $guest->firstname." ".$guest->lastname}}</option>
              @endforeach
          </select><br/>
      </div>

          <label for="title">Water: </label>
          <input type="checkbox" class="form-control" id="water"  name="water"/>
          <label for="title">Snacks: </label>
          <input type="checkbox" class="form-control" id="snacks"  name="snacks"/>
          <label class="radio-inline"><input type="radio" name="standardf">Standard Food</label>
          <label class="radio-inline"><input type="radio" name="premiumf">Premium Food</label>
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