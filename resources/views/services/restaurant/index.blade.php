@extends('layouts.app')

@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
         <div class="pull-right">
            <a class="btn btn-success" href="{{ route('restaurant.create') }}"> New Restaurant Order</a>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Quantity</th>
              <th scope="col">Date hour</th>
            </tr>
          </thead>
          <tbody>
            @foreach($restaurants as $restaurant)
            <tr>
              <th><a href="/service/restaurant/{{$restaurant->id}}">{{$restaurant->id}}</a></th>
              <td> {{ $restaurant->quantity }} </td>
              <td>{{$restaurant->day_hour}}</td>
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('/service/restaurant/' . $restaurant->id . '/edit') }}">
                   <button type="button" class="btn btn-warning">Edit</button>
                  </a>&nbsp;
                <form action="{{url('/service/restaurant', [$restaurant->id])}}" method="POST">
                     <input type="hidden" name="_method" value="DELETE">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
              </div>
 </td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endsection