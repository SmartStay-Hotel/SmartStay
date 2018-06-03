@extends('admin.layout')

@section('css')
    <style>
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
    </style>
@endsection

@section('content')

    <div class="col-sm-9 table-responsive" id="alarmTableContainer">
        <table class="table table-sm table-hover text-center" id="serviceTable">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <thead id="serviceTableHeader">
            <tr><h2 id="serviceTitle"><i class="fas fa-utensils fa-xs" style="padding: 5px;"></i>Alarm<a
                            href="{{ route('alarm.index') }}"><i
                                id="addGuest" class="fas fa-user-plus fa-xs"
                                style="padding-left: 70%; color: white; z-index: 1;"></i></a></h2>
            </tr>
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

            {!! Form::open(['route' => 'alarm.store', null, 'method'=>'POST']) !!}
            @include('services.alarm.partial.form')
            {!! Form::close() !!}

        </table>
    </div>
@endsection

@section('scripts')
    <script>
        /*
        console.log("test-page");
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var url = "http://127.0.0.1:8000/admin/service/restaurant";
            var data = {quantity: 10, day_hour: "2018-11-02T23:59"};
            $.post(url, data, function (result) {
                console.log(result);
            })
        });
        */
    </script>
@endsection