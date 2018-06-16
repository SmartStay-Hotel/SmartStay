@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('housekeeping.index') }}">Housekeeping</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Order</li>
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
                {!! Form::open(['route' => 'housekeeping.store', null, 'method'=>'POST']) !!}
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
{{------------------------------------- OLD --------------------------------}}
{{--
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('housekeeping.index') }}"> Back</a>
    </div>
    <h1>Add New Housekeeping order</h1>
    <hr>
    <form action="/service/housekeeping" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="guest">Guest: </label>
            <select name="guest">
                @foreach ($guests as $guest)
                    <option value="{{ $guest->id }}">{{ $guest->firstname." ".$guest->lastname}}</option>
                @endforeach
            </select><br/>
            <label for="title">Bed sheets: </label>
            <input type="checkbox" class="form-control" id="bed_sheets" name="bed_sheets"/>
            <label for="title">Cleaning: </label>
            <input type="checkbox" class="form-control" id="cleaning" name="cleaning"/>
            <label for="title">Minibar: </label>
            <input type="checkbox" class="form-control" id="minibar" name="minibar"/>
            <label for="title">Blanket: </label>
            <input type="checkbox" class="form-control" id="blanket" name="blanket"/>
            <label for="title">Toiletries: </label>
            <input type="checkbox" class="form-control" id="toiletries" name="toiletries"/>
            <label for="title">Pillow: </label>
            <input type="checkbox" class="form-control" id="pillow" name="pillow"/>
            <!--
             <input type="checkbox" class="form-control" name="house[]" value="bed_sheets"/>
            <label for="title">Cleaning: </label>
            <input type="checkbox" class="form-control" name="house[]" value="cleaning"/>
            <label for="title">Minibar: </label>
            <input type="checkbox" class="form-control" name="house[]" value="minibar"/>
            <label for="title">Blanket: </label>
            <input type="checkbox" class="form-control" name="house[]" value="blanket"/>
            <label for="title">Toiletries: </label>
            <input type="checkbox" class="form-control" name="house[]" value="toiletries"/>
            <label for="title">Pillow: </label>
            <input type="checkbox" class="form-control" name="house[]" value="pillow"/>
            -->
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
@endsection
--}}