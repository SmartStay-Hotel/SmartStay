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
                    <li><i class="fa fa-file-text-o"></i> All the current Guests</li>
                    <a href="{{ route('guests.create') }}" class="add-modal">
                        <li>Add a Guest</li>
                    </a>
                </ul>
            </div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="guestTable">
                    <thead>
                    <tr>
                        <th valign="middle">#</th>
                        <th>Full name</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </tr>
                    {{ csrf_field() }}
                    </thead>
                    <tbody>
                    @foreach($guests as $indexKey => $guest)
                        <tr class="item{{$guest->id}} @if($guest->balance > 0) warning @endif">
                            <td class="col1">{{ $indexKey+1 }}</td>
                            <td>{{$guest->firstname . " ".$guest->lastname}}</td>
                            <td>{{$guest->telephone}}</td>
                            <td>
                                <a href="{{ route('guests.show', $guest->id) }}" class="show-modal btn btn-success">
                                    <span class="glyphicon glyphicon-eye-open"></span> Show
                                </a>
                                <a href="{{ route('guests.edit', $guest->id) }}" class="edit-modal btn btn-info">
                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                </a>
                                {!! Form::open(['method' => 'DELETE','route' => ['guests.destroy', $guest->id], 'style'=>'display:inline']) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash"></span> Delete', array('type' => 'submit', 'class' => 'delete-modal btn btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->
@endsection
@section('scripts')
@endsection