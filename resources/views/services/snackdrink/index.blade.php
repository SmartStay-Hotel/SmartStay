@extends('layouts.app')
 
@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
         <div class="pull-right">
            <a class="btn btn-success" href="{{ route('snackdrink.create') }}"> New Snack and Drink Order</a>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Guest_id</th>
                <th scope="col">Product_id</th>
                <th scope="col">Price</th>
                <th></th>
                <th></th>
            </tr>
          </thead>
          <tbody>
          @foreach($snackanddrinks as $snackanddrink)
                <tr>
                    <th scope="row"><a href="/service/event/{{ $snackanddrink->id }}">{{ $snackanddrink->id }}</a></th>
                    <td>{{ $snackanddrink->guest_id }}</td>
                    <td>{{ $snackanddrink->product_type_id }}</td>
                <td>{{ $snackanddrink->order_date }}</td>
              <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{ URL::to('service/event/' . $snackanddrink->id . '/edit') }}">
                       <button type="button" class="btn btn-warning">Edit</button>
                      </a>&nbsp;
                    <form action="{{url('service/event', [$snackanddrink->id])}}" method="POST">
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