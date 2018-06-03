<fieldset>
    <legend>New reservation:</legend>
    <label>Room - Guest: </label>
    @if(empty($alarm))
        {!! Form::select('guest_id', $guests, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('guest_id', $guests, $alarm->guest_id, ['class' => 'form-control', 'id' => 'selectGuest', 'disabled']) !!}
        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'change']) }}
    @endif
    <br/>
    <label>Reservation Date-Time</label>
    @if(empty($alarm))
        {!! Form::datetimeLocal('day_hour', null, ['class' => 'form-control']) !!}
    @else
        {!! Form::datetimeLocal('day_hour', \Carbon\Carbon::parse($alarm->day_hour), ['class' => 'form-control']) !!}
    @endif

    <br/>
    <p>

        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn-save']) }}
    </p>
</fieldset>
