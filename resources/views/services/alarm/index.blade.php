@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('alarm.create') }}"> New Alarm Order</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Alarm Date hour</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($alarms as $alarm)
            <tr>
                <th><a href="/service/alarm/{{$alarm->id}}">{{$alarm->id}}</a></th>
                <td>{{$alarm->day_hour}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('/service/alarm/' . $alarm->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>&nbsp;
                        <form action="{{url('/service/alarm', [$alarm->id])}}" method="POST">
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