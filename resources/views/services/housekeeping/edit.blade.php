@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('housekeeping.index') }}">Housekeeping</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
@endsection
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
@endsection