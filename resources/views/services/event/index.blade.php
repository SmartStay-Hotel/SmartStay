@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Events</li>
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('event.create') }}"> New Event Order</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Event Type</th>
            <th scope="col">Order Date</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <th scope="row"><a href="/service/event/{{$event->id}}">{{$event->id}}</a></th>
                <td>{{ $event->event_type_id }}</td>
                <td>{{ $event->order_date }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ URL::to('service/event/' . $event->id . '/edit') }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>&nbsp;
                        <form action="{{url('service/event', [$event->id])}}" method="POST">
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