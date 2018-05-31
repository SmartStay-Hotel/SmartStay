@extends('admin.layout')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@endsection
@section('content')

    <h2 id="newBookingTitle"><i class="far fa-calendar-plus" style="padding: 5px;"></i>New Booking<a href="#"><i id="addGuest" class="fas fa-user-plus"></i></a></h2>
    <div class="flex-grid">
        <div id="panel" class="panel panel-default" id="newBookingPanel" style="margin: 0px !important;  border: #5A6268 2px solid; border-bottom: #5A6268 20px solid; border-top: #5A6268 20px solid;">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-file-text-o"></i><a href="{{ route('guests.index') }}"> All the current
                            Guests</a></li>
                    <li>Add a Guest</li>
                </ul>
            </div>

            <div class="panel-body">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open(['route' => 'guests.store', null, 'method'=>'POST']) !!}
                @include('admin.guest.partial.form')
                {!! Form::close() !!}
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#roomType').change(function (event) {
                var route;
                if ($('#disabled_adapted').prop('checked') && $('#jacuzzi').prop('checked')) {
                    route = 'roomType/' + event.target.value + '/adapted/1/jacuzzi/1';
                } else if ($('#disabled_adapted').prop('checked')) {
                    route = 'roomType/' + event.target.value + '/adapted/1';
                } else if ($('#jacuzzi').prop('checked')) {
                    route = 'roomType/' + event.target.value + '/jacuzzi/1';
                } else {
                    route = 'roomType/' + event.target.value + '';
                }
                $.get(route, function (response, state) {
                    $('#roomNumber').empty();
                    for (var i = 0; i <= response.length - 1; i++) {
                        $('#roomNumber').append($('<option></option>')
                            .attr('value', response[i].number)
                            .text(response[i].number));
                    }
                });
            });
        });
        /*$(document).ready(function () {
            var roomTypeId;
            var roomNumberOption;
            $('#roomType').change(function () {
                roomTypeId = this.value;
                $('#roomNumber option').each(function (key, value) {
                    roomNumberOption = value;
                    if (roomNumberOption.value !== roomTypeId) {
                        $(this).remove();
                    }
                });
            });
        });
        */
    </script>
@endsection