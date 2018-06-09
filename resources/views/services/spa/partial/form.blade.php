<fieldset>
    <legend>New reservation:</legend>
    <label>Room - Guest: </label>
    @if(empty($spa))
        {!! Form::select('guest_id', $guests, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('guest_id', $guests, $spa->guest_id, ['class' => 'form-control', 'id' => 'selectGuest', 'disabled']) !!}
        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'change']) }}
    @endif
    <br/>
    <label>Treatment type</label>
    @if(empty($spa))
        {!! Form::select('treatment_type_id', $treatment_types, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('treatment_type_id', $treatment_types, $spa->trip_types_id, ['class' => 'form-control', 'id' => 'selectTreatmentType', 'disabled']) !!}
    @endif

    <label>Reservation Date-Time</label>
    @if(empty($spa))
        {!! Form::datetimeLocal('day_hour', null, ['class' => 'form-control']) !!}
    @else
        {!! Form::datetimeLocal('day_hour', \Carbon\Carbon::parse($spa->day_hour), ['class' => 'form-control']) !!}
    @endif

    <br/>
    <p>

        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </p>
</fieldset>
