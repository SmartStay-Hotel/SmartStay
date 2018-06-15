<fieldset>
    <legend>New reservation:</legend>
    <label>Room - Guest: </label>
    @if(empty($trip))
        {!! Form::select('guest_id', $guests, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('guest_id', $guests, $trip->guest_id, ['class' => 'form-control', 'id' => 'selectGuest', 'disabled']) !!}
        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'change']) }}
    @endif
    <br/>
    <!-- Trip Type -->
    <label for="guest">Trip: </label>
    @if(empty($trip))
        {!! Form::select('trip_type_id', $tripTypes, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('trip_type_id', $tripTypes, $trip->trip_type_id, ['class' => 'form-control', 'id' => 'selectTripType', 'disabled']) !!}
        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'changetrip']) }}
    @endif
    <br/>
    <label>How many person will you be with?</label>
    {!! Form::number('people_num', null, ['class' => 'form-control']) !!}
    <br/>
    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </p>
</fieldset>