@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('guests.index') }}">Manage Guests</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show Guest</li>
@endsection
@section('css')
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
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
    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <h2 id="newBookingTitle">Show Guest</h2>
        <br/>
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-file-text-o"></i><a href="{{ route('guests.index') }}"> All the current
                            Guests</a></li>
                    <li>Guest Information</li>
                </ul>
            </div>
            <div class="panel-body" style="padding-left: 20px;">
                <br/>
                <label for="firstname">Firstname: </label> {{ $guest->firstname }} <br/>
                <label for="lastname">Lastname: </label> {{ $guest->lastname }} <br/>
                <label for="nif">NIF: </label> {{ $guest->nif }} <br/>
                <label for="email">Email: </label> {{ $guest->email }} <br/>
                <label for="telephone">Telephone: </label> {{ $guest->telephone }} <br/>
                <label for="balance">Balance: </label> {{ $guest->balance }} €<br/>
                <label for="code">Code: </label> {{ $guest->code }} <br/>

            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->
@endsection
@section('scripts')
    <script>
        document.getElementById("guests").style.color="white";
    </script>
@endsection