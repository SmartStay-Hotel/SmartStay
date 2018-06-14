@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Manage Guests</li>
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

    </style>
@endsection

@section('content')
    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <h2 id="newBookingTitle">Manage Guests</h2>

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
                        <th>Room Nº</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Action</th>
                    </tr>
                    {{ csrf_field() }}
                    </thead>
                    <tbody>
                    @foreach($guests as $indexKey => $guest)
                        @if(isset($guest->rooms[0]))
                            <tr class="item{{$guest->id}} @if($guest->balance > 0) warning @endif">
                                <td class="col1">{{ $indexKey+1 }}</td>
                                <td>{{$guest->firstname . " " . $guest->lastname}}</td>
                                <td>{{$guest->rooms[0]->number}}</td>
                                <td>{{$guest->rooms[0]->pivot->checkin_date}}</td>
                                <td>{{$guest->rooms[0]->pivot->checkout_date}}</td>
                                <td class="text-center">
                                    <a href="{{ route('guests.show', $guest->id) }}" class="show-modal btn btn-success">
                                        <span class="far fa-eye"></span>
                                    </a>
                                    <a href="{{ route('guests.edit', $guest->id) }}" class="edit-modal btn btn-info">
                                        <span class="far fa-edit"></span>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['guests.destroy', $guest->id], 'style'=>'display:inline']) !!}
                                    {!! Form::button('<span class="far fa-trash-alt"></span>', array('type' => 'submit', 'class' => 'btn-delete btn btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                    {{ $guests->render() }}
                    <p>
                        <span id="guestTotal">{{ $guests->total() }}</span> orders | page {{ $guests->currentPage() }} of {{ $guests->lastPage() }}
                    </p>
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function (e) {
                var $this = this;
                e.preventDefault();
                toastr.options = {'closeButton': true, 'timeOut': false, 'closeOnHover': false};
                toastr.error('<button type="button" class="btn-yes btn">Yes</button>', 'You are about to delete a guest!');
                $('.btn-yes').click(function () {
                    var row = $($this).parents('tr');
                    var form = $($this).parents('form');
                    var url = form.attr('action');

                    row.fadeOut();
                    $.post(url, form.serialize(), function (result) {
                        $('#guestTotal').html(result.total);
                        toastr.options = {'closeButton': true, 'timeOut': 5000, 'closeOnHover': true, 'progressBar': true};
                        toastr.success(result.message);
                    }).fail(function () {
                        row.fadeIn();
                        toastr.options = {'closeButton': true, 'timeOut': 5000, 'closeOnHover': true, 'progressBar': true};
                        toastr.warning('Something went wront', 'Alert!');
                    });

                });
            });
        })
    </script>

    <script>
        document.getElementById("guests").style.color="white";
    </script>
@endsection