@extends('layouts.app')
 
@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
         <div class="pull-right">
            <a class="btn btn-success" href="{{ route('trip.create') }}"> New Trip Order</a>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Trip Type</th>
              <th scope="col">Order Date</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach($trips as $trip)
            <tr>
                <th scope="row"><a href="/service/trip/{{$trip->id}}">{{$trip->id}}</a></th>
                <td>{{ $trip->trip_type_id }}</td>
                <td>{{ $trip ->order_date }}</td>
                <td>{{ $trip ->price }}</td>
              <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{ URL::to('service/trip/' . $trip->id . '/edit') }}">
                       <button type="button" class="btn btn-warning">Edit</button>
                      </a>&nbsp;
                    <form action="{{url('service/trip', [$trip->id])}}" method="POST">
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