@extends('admin.layout')
@section('css')
    <style>
        body {
            overflow-y: auto !important;
        }
    </style>
@endsection
@section('content')

    <h2 id="checkInTitle">CHECK IN</h2>
    <div class="col-sm-7" id="checkInTable">
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th valign="middle">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Check-in Day</th>
                    <th scope="col">Check-out Day</th>
                    <th scope="col">Room Nº</th>
                    <th scope="col">Check in</th>
                </tr>
                </thead>
                <tbody>
                @foreach($guests as $indexKey => $guest)
                    <tr>
                        <td class="col1">{{ ++$indexKey }}</td>
                        <td>{{ $guest->firstname . ' ' . $guest->lastname }}</td>
                        <td>{{ $guest->roomType }}</td>
                        <td>{{ $guest->checkin_date }}</td>
                        <td>{{ $guest->checkout_date }}</td>
                        <td>{{ $guest->number }}</td>
                        <td>
                            <button>Check in</button>
                            {{--{!! Form::open(['method' => 'DELETE','route' => ['guests.destroy', $guest->id], 'style'=>'display:inline']) !!}
                            {!! Form::button('', array('type' => 'submit', 'class' => 'fas fa-sign-out-alt fa-lg', 'id' => 'exitBtn')) !!}
                            {!! Form::close() !!}--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
@endsection