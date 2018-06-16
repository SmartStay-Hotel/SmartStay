@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Check in</li>
@endsection
@section('css')
    <style>
    </style>
@endsection
@section('content')
    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
    <h2 id="checkInTitle"><i class="fas fa-sign-in-alt" style="padding: 5px;"></i>Check in</h2>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-sm table-hover text-center" id="checkInTable">
                <thead id="checkInTableHeader">
                <tr>
                    <th valign="middle">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Check-in Day</th>
                    <th scope="col">Check-out Day</th>
                    <th scope="col">Room Nº</th>
                    <th scope="col">Info</th>
                   {{-- <th scope="col">Check in</th> --}}
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
                            <a href="{{ route('guests.show', $guest->id) }}" class="show-modal btn btn-success">
                                <span class="glyphicon glyphicon-eye-open"></span> Show
                            </a>
                        </td>
                        {{-- <td>
                            -<button>Check in</button>
                             {!! Form::open(['method' => 'DELETE','route' => ['guests.destroy', $guest->id], 'style'=>'display:inline']) !!}
                             {!! Form::button('', array('type' => 'submit', 'class' => 'fas fa-sign-out-alt fa-lg', 'id' => 'exitBtn')) !!}
                             {!! Form::close() !!}
                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        {{ $guests->render() }}
        <p>
            <span id="checkoutTotal">{{ $guests->total() }}</span> checkin | page {{ $guests->currentPage() }} of {{ $guests->lastPage() }}
        </p>
    </div>
@endsection
@section('scripts')
@endsection