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
    <!-- Spa Type -->
    <label for="guest">Spa Treatment: </label>
    @if(empty($spa))
        {!! Form::select('treatment_type_id', $spaTypes, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('treatment_type_id', $spaTypes, $spa->treatment_type_id, ['class' => 'form-control', 'id' => 'selectSpaType', 'disabled']) !!}

        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'changespa']) }}
    @endif
    <br/>
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