@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Spa</li>
@endsection
@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
         <div class="pull-right">
            <a class="btn btn-success" href="{{ route('spa.create') }}"> New Spa Order</a>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Spa Treatment Type</th>
                <th scope="col">Day Hour</th>
                <th scope="col">Price</th>
                <th></th>
                <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($spaAppointments as $spa)
            <tr>
                <th scope="row"><a href="/service/spa/{{$spa->id}}">{{$spa->id}}</a></th>
                <td>{{ $spa->treatment_type_id }}</td>
                <td>{{ $spa ->day_hour }}</td>
                <td>{{ $spa ->price }}</td>
              <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{ URL::to('service/spa/' . $spa->id . '/edit') }}">
                       <button type="button" class="btn btn-warning">Edit</button>
                      </a>&nbsp;
                    <form action="{{url('service/spa', [$spa->id])}}" method="POST">
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