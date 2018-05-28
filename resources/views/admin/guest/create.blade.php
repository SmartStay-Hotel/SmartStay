@extends('admin.layout')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        .panel-heading {
            padding: 0;
        }

        .panel-heading ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .panel-heading li {
            float: left;
            border-right: 1px solid #bbb;
            display: block;
            padding: 14px 16px;
            text-align: center;
        }

        .panel-heading li:first-child:hover {
            background-color: #ccc;
        }

        .panel-heading li:last-child {
            border-right: none;
        }

        .panel-heading li a:hover {
            text-decoration: none;
        }

        .table.table-bordered tbody td {
            vertical-align: baseline;
        }

        fieldset {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
        }

        body {
            overflow-y: auto !important;
        }
    </style>
@endsection
@section('content')

    <div class="col-md-8 col-md-offset-2" id="guestTableContainer">
        <h2 class="text-center">Manage Guests</h2>
        <br/>
        <div class="panel panel-default">
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
    </div><!-- /.col-md-8 -->

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