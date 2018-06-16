@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('housekeeping.index') }}">Housekeeping</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Reservation</li>
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
            <tr><h2 id="serviceTitle"><i class="fas fa-broom" style="padding: 5px;"></i>Housekeeping<a
                            href="{{ route('housekeeping.index') }}"><i
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

                {!! Form::model($housekeeping, ['route' => ['housekeeping.update', $housekeeping->id], 'method'=>'PATCH', null]) !!}
                @include('services.housekeeping.partial.form')
                {!! Form::close() !!}

        </table>

    </div>
@endsection
@section('scripts')
    <script>
        document.getElementsByClassName("itemDropdown")[2].style.color="white";
    </script>
@endsection

{{--
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('housekeeping.index') }}"> Back</a>
    </div>
    <h1>Edit Housekeeping Order: {{ $housekeeping->id }}</h1>
    <hr>
    <form action="{{url('service/housekeeping', [$housekeeping->id])}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <!--Guest_id-->
            <label for="guest">Guest: </label><br>
            <select name="guest">
                @foreach ($guests as $guest)
                    <option value="{{ $guest->id }}"
                            @if($guest->id == $housekeeping->guest_id)
                            selected
                            @endif>
                        {{ $guest->firstname." ".$guest->lastname}}
                    </option>

                @endforeach
            </select><br/>

            <!-- Bed_Sheets -->
            <label for="title">Bed sheets: </label>
            <input type="checkbox" class="form-control" id="bed_sheets" name="bed_sheets"
                    {{ ($housekeeping->bed_sheets) ? "checked" : "" }}/>

            <!-- Cleaning -->
            <label for="title">Cleaning: </label>
            <input type="checkbox" class="form-control" id="cleaning" name="cleaning"
                    {{ ($housekeeping->cleaning) ? "checked" : "" }}/>

            <!-- Minibar -->
            <label for="title">Minibar: </label>
            <input type="checkbox" class="form-control" id="minibar" name="minibar"
                    {{ ($housekeeping->minibar) ? "checked" : "" }}/>

            <!-- Blanket -->
            <label for="title">Blanket: </label>
            <input type="checkbox" class="form-control" id="blanket" name="blanket"
                    {{ ($housekeeping->blanket) ? "checked" : "" }}/>

            <!-- Toiletries -->
            <label for="title">Toiletries: </label>
            <input type="checkbox" class="form-control" id="toiletries" name="toiletries"
                    {{ ($housekeeping->toiletries) ? "checked" : "" }}/>

            <!-- Pillow -->
            <label for="title">Pillow: </label>
            <input type="checkbox" class="form-control" id="pillow" name="pillow"
                    {{ ($housekeeping->pillow) ? "checked" : "" }}/>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection--}}