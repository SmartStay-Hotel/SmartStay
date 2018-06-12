{{-- GUEST INFORMATION --}}
<fieldset>
    <legend>Guest information:</legend>
    <label>First Name</label>
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
    <label>Last Name</label>
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}

    <label>NIF</label>
    {!! Form::text('nif', null, ['class' => 'form-control']) !!}

    <label>Email</label>
    {!! Form::email('email', null, ['class' => 'form-control']) !!}

    <label>Telephone</label>
    {!! Form::tel('telephone', null, ['class' => 'form-control']) !!}
    <br/>
</fieldset>
<hr>
<fieldset>
    <legend>Book now:</legend>
    @if(!empty($roomTypes))
        <label>Features:</label><br/>
        {{ Form::checkbox('disabled_adapted', 1, null, ['id' => 'disabled_adapted']) }}
        <label> Disabled Adapted</label><br/>
        {{ Form::checkbox('jacuzzi', 1, null, ['id' => 'jacuzzi']) }}
        <label> Jacuzzi</label><br/>
        <hr>
        <label>Room Type</label>
        {!! Form::select('type_id', $roomTypes, null, ['class' => 'form-control', 'id' => 'roomType', 'placeholder' => '--- Choose an option ---']) !!}
        <label>Room Number</label>
        {!! Form::select('number', ['placeholder' => '--- Choose an option ---'], null, ['class' => 'form-control', 'id' => 'roomNumber']) !!}
        <br/>
        <hr>
    @endif

    {{--<select name="number" class="form-control" id="roomNumber">
        <option selected="selected" value="">--- Choose an option ---</option>
        @foreach($rooms as $room => $type_id)
            <option value="{{ $type_id }}">{{ $room }}</option>
        @endforeach
    </select>--}}

    @if(!isset($guest))
        <label>Check-in Date</label><br/>
        <strong>Today: {{ \Carbon\Carbon::now() }}</strong><br/>
        {!! Form::date('checkin_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'style' => 'display:none']) !!}{{-- Hacer fecha por defecto hoy--}}

        <label>Check-out Date</label>
        {!! Form::date('checkout_date', \Carbon\Carbon::tomorrow(), ['class' => 'form-control']) !!}
        <br/>
    @else
        <label>Check-in Date</label><br/>
        {!! Form::date('checkin_date', $guest->rooms[0]->pivot->checkin_date, ['class' => 'form-control']) !!}{{-- Hacer fecha por defecto hoy--}}

        <label>Check-out Date</label>
        {!! Form::date('checkout_date', $guest->rooms[0]->pivot->checkout_date, ['class' => 'form-control']) !!}
        <br/>
    @endif
    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-secondary']) }}
    </p>
</fieldset>