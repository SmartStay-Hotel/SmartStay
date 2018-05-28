{{-- GUEST INFORMATION --}}
<fieldset>
    <legend>Guest information:</legend>
    <label>First Name</label>
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
    <label>Last Name</label>
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}

    <label>NIE</label>
    {!! Form::text('nie', null, ['class' => 'form-control']) !!}

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


    <label>Check-in Date</label>
    {!! Form::date('checkin_date', null, ['class' => 'form-control']) !!}
    <label>Check-out Date</label>
    {!! Form::date('checkout_date', null, ['class' => 'form-control']) !!}
    <br/>
    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => '']) }}
    </p>
</fieldset>