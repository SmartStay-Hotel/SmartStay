@extends('layouts.app')
 
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('snackdrink.index') }}"> Back</a>
    </div>
    <h1>Add New Snack And Drink Order</h1>
    <hr>
     <form action="/service/snackdrink" method="post">
     {{ csrf_field() }}
      <div class="form-group">
          <!--Guest-->
          <label for="guest">Guest: </label>
          <select name="guest">
              @foreach ($guests as $guest)
                  <option value="{{ $guest->id }}">{{ $guest->firstname." ".$guest->lastname}}</option>
              @endforeach
          </select><br/>
          <!-- Product Type (Snacks)-->
          <label for="guest">Snacks: </label>
          <select name="producttype1">
              @foreach ($productTypes as $productType)
                  @if($productType->type_id == 1)
                  <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                  @endif
              @endforeach
          </select><br/>
          <label>Quantity: </label>
          <input type="number" class="form-control" name="quantity1">

          <!-- Product Type (Drinks)-->
          <label for="guest">Drinks: </label>
          <select name="producttype2">
              @foreach ($productTypes as $productType)
                  @if($productType->type_id == 2)
                      <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                  @endif
              @endforeach
          </select><br/>
          <label>Quantity: </label>
          <input type="number" class="form-control" name="quantity2">
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