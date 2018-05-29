@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@endsection

@section('content')

    <div class="col-sm-9 table-responsive" id="alarmTableContainer">

        <table class="table table-sm table-hover text-center" id="alarmTable">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <thead id="alarmTableHeader">
            <tr><h2 id="alarmTitle"><i class="fas fa-utensils fa-xs" style="padding: 5px;"></i>Restaurant<a
                            href="{{ route('restaurant.create') }}"><i
                                id="addGuest" class="fas fa-user-plus fa-xs"
                                style="padding-left: 70%; color: white; z-index: 1;"></i></a></h2>
            </tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Guest Name</th>
                <th scope="col">Room Nº</th>
                <th scope="col">Day and Time</th>
                <th scope="col">People Nº</th>
                <th scope="col" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($restaurants as $indexKey => $restaurant)
                <tr>
                    <td>{{ ++$indexKey }}</td>
                    <td>{{ $restaurant->guest->firstname . ' ' . $restaurant->guest->lastname }}</td>
                    <td> {{ $restaurant->guest->rooms[0]->number }} </td>
                    <td>{{ $restaurant->day_hour }}</td>
                    <td> {{ $restaurant->quantity }} </td>
                    <td>
                        <a href="{{ route('restaurant.show', $restaurant->id) }}" class="show-modal btn btn-success">
                            <span class="glyphicon glyphicon-eye-open"></span> Show
                        </a>
                        <a href="{{ route('restaurant.edit', $restaurant->id) }}" class="edit-modal btn btn-info">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                        {!! Form::open(['method' => 'DELETE','route' => ['restaurant.destroy', $restaurant->id], 'style'=>'display:inline']) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash"></span> Delete', array('type' => 'submit', 'class' => 'delete-modal btn btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
@endsection