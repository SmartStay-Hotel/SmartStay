@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('alarm.index') }}">Alarm</a></li>
    <li class="breadcrumb-item active" aria-current="page">New Alarm</li>
@endsection
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

    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
        <table class="table table-sm table-hover text-center" id="serviceTable">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <thead id="serviceTableHeader">
            <tr><h2 id="serviceTitle"><i class="far fa-clock fa-xs" style="padding: 5px;"></i>Alarm<a
                            href="{{ route('alarm.index') }}"></a></h2>
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


        </table>
        {!! Form::open(['route' => 'alarm.store', null, 'method'=>'POST']) !!}
        @include('services.alarm.partial.form')
        {!! Form::close() !!}
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