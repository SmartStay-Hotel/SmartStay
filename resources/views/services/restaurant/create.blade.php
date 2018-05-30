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
        <table class="table table-sm table-hover text-center" id="alarmTable">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <thead id="alarmTableHeader">
            <tr><h2 id="alarmTitle"><i class="fas fa-utensils fa-xs" style="padding: 5px;"></i>Restaurant<a
                            href="{{ route('restaurant.index') }}"><i
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

            {!! Form::open(['route' => 'restaurant.store', null, 'method'=>'POST']) !!}
            @include('services.restaurant.partial.form')
            {!! Form::close() !!}

        </table>
    </div>
@endsection

@section('scripts')
@endsection