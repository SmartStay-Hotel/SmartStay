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

        .panel-heading li:last-child:hover {
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

        body {
            overflow-y: auto !important;
        }
    </style>
@endsection

@section('content')
    <div class="col-md-9 table-responsive" id="guestTableContainer">
        <h2 class="text-center">Manage Guests</h2>
        <br/>
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-file-text-o"></i><a href="{{ route('guests.index') }}"> All the current
                            Guests</a></li>
                    <li>Guest Information</li>
                </ul>
            </div>
            <div class="panel-body">
                <br/>
                <label for="firstname">Firstname: </label> {{ $guest->firstname }} <br/>
                <label for="lastname">Lastname: </label> {{ $guest->lastname }} <br/>
                <label for="nie">NIE: </label> {{ $guest->nie }} <br/>
                <label for="email">Email: </label> {{ $guest->email }} <br/>
                <label for="telephone">Telephone: </label> {{ $guest->telephone }} <br/>
                <label for="balance">Balance: </label> {{ $guest->balance }} €<br/>
                <label for="code">Code: </label> {{ $guest->code }} <br/>

            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->
@endsection
@section('scripts')
@endsection