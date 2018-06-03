<fieldset>
    <legend>New reservation:</legend>
    <label>Room - Guest: </label>
    @if(empty($taxi))
        {!! Form::select('guest_id', $guests, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('guest_id', $guests, $taxi->guest_id, ['class' => 'form-control', 'id' => 'selectGuest', 'disabled']) !!}
        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'change']) }}
    @endif
    <br/>
    <label>Reservation Date-Time</label>
    @if(empty($taxi))
        {!! Form::datetimeLocal('day_hour', null, ['class' => 'form-control']) !!}
    @else
        {!! Form::datetimeLocal('day_hour', \Carbon\Carbon::parse($taxi->day_hour)->format('Y-m-d\Th:m'), ['class' => 'form-control']) !!}
    @endif

    <br/>
    <p>

        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn-save']) }}
    </p>
</fieldset>
