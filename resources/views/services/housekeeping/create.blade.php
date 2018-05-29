@extends('layouts.app')

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