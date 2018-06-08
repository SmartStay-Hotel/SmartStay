@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">

    <h2 id="serviceTitle"><i class="fas fa-taxi" style="padding: 5px;"></i>Taxi<a href="{{ route('taxi.create') }}"><i id="addGuest" class="fas fa-user-plus"></i></a></h2>
    <table class="table table-sm table-hover text-center" id="serviceTable">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <thead id="serviceTableHeader">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Guest Name</th>
                <th scope="col">Room Nº</th>
                <th scope="col">Day and Time</th>
                <th scope="col">Completed?</th>
                <th scope="col" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($taxis as $indexKey => $taxi)
                <tr>
                    <td>{{ ++$indexKey }}</td>
                    <td>{{ $taxi->guest->firstname . ' ' . $taxi->guest->lastname }}</td>
                    <td> {{ $taxi->guest->rooms[0]->number }} </td>
                    <td>{{ $taxi->day_hour }}</td>
                    <td class="text-center"><input type="checkbox" name="{{ $taxi->id }}" id="completed"
                                                   @if ($taxi->status == '2') checked @endif></td>
                    <td>
                        <a href="{{ route('taxi.show', $taxi->id) }}" class="show-modal btn btn-success">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                        <a href="{{ route('taxi.edit', $taxi->id) }}" class="edit-modal btn btn-info">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        {!! Form::open(['method' => 'DELETE','route' => ['taxi.destroy', $taxi->id], 'style'=>'display:inline']) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash"></span>', array('type' => 'submit', 'class' => 'delete-modal btn btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(':checkbox').change(function (event) {
                var route = 'statusTaxi/' + event.target.name + '';
                if ($(this).is(':checked')) {
                    if (confirm("Is it already completed?")) {
                        $.get(route, function (response, state) {
                            console.log("Completed " + response);
                        });
                    } else {
                        this.checked = false;
                    }
                } else {
                    $.get(route, function (response, state) {
                        console.log("In process " + response);
                    });
                }
            });
        });
    </script>
@endsection