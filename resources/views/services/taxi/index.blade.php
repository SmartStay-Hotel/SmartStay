@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('taxi.create') }}"> New Taxi Order</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Taxi Date hour</th>
        </tr>
        </thead>
        <tbody>
        @foreach($taxis as $taxi)
            <tr>
                <th><a href="/service/taxi/{{$taxi->id}}">{{$taxi->id}}</a></th>
                <td>{{$taxi->day_hour}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('/service/taxi/' . $taxi->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>&nbsp;
                        <form action="{{url('/service/taxi', [$taxi->id])}}" method="POST">
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