@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Check out</li>
@endsection
@section('content')
    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
    <h2 id="checkOutTitle"><i class="fas fa-sign-out-alt" style="padding: 5px;"></i>Check out</h2>
    <div class="flex-grid">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <table class="table table-sm table-hover text-center" id="checkOutTable">
                    <thead id="checkOutTableHeader">
                <tr>
                    <th valign="middle">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Check-in Day</th>
                    <th scope="col">Check-out Day</th>
                    <th scope="col">Room Nº</th>
                    <th scope="col">Price for Orders</th>
                    <th scope="col">Check out</th>
                </tr>
                </thead>
                <tbody>
                @foreach($guests as $indexKey => $guest)
                    <tr class="table-@if($guest->balance > 0)warning @endif">
                        <td class="col1">{{ ++$indexKey }}</td>
                        <td>{{ $guest->firstname . ' ' . $guest->lastname }}</td>
                        <td>{{ $guest->roomType }}</td>
                        <td>{{ $guest->checkin_date }}</td>
                        <td>{{ $guest->checkout_date }}</td>
                        <td>{{ $guest->number }}</td>
                        <th scope="row">{{ $guest->balance }}</th>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['guests.destroy', $guest->id], 'style'=>'display:inline']) !!}
                            {!! Form::button('', array('type' => 'submit', 'class' => 'fas fa-sign-out-alt fa-lg', 'id' => 'exitBtn')) !!}
                            {!! Form::close() !!}
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