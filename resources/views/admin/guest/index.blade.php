<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>Manage Guests</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
{{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

<!-- icheck checkboxes -->
    {{--   <link rel="stylesheet" href="{{ asset('icheck/square/yellow.css') }}"> --}}
    <link rel="stylesheet" href="https://raw.githubusercontent.com/fronteed/icheck/1.x/skins/square/yellow.css">

    <!-- toastr notifications -->
    {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
            border-right:1px solid #bbb;
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
    </style>

</head>
<body>
<div class="col-md-8 col-md-offset-2">
    <h2 class="text-center">Manage Guests</h2>
    <br/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <ul>
                <li><i class="fa fa-file-text-o"></i> All the current Guests</li>
                <a href="{{ route('guests.create') }}" class="add-modal">
                    <li>Add a Guest</li>
                </a>
            </ul>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="guestTable">
                <thead>
                <tr>
                    <th valign="middle">#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>NIE</th>
                    <th>E-mail</th>
                    <th>Telephone</th>
                    <th>Action</th>
                </tr>
                {{ csrf_field() }}
                </thead>
                <tbody>
                @foreach($guests as $indexKey => $guest)
                    <tr class="item{{$guest->id}} @if($guest->balance > 0) warning @endif">
                        <td class="col1">{{ $indexKey+1 }}</td>
                        <td>{{$guest->firstname}}</td>
                        <td>{{$guest->lastname}}</td>
                        <td>{{$guest->nie}}</td>
                        <td>{{$guest->email}}</td>
                        <td>{{$guest->telephone}}</td>
                        <td>
                            <button class="show-modal btn btn-success">
                                <span class="glyphicon glyphicon-eye-open"></span> Show
                            </button>
                            <button class="edit-modal btn btn-info">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </button>
                            <button class="delete-modal btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.panel-body -->
    </div><!-- /.panel panel-default -->
</div><!-- /.col-md-8 -->

</body>
</html>