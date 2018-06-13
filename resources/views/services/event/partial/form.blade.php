<fieldset>
    <legend>New reservation:</legend>
    <label>Room - Guest: </label>
    @if(empty($event))
        {!! Form::select('guest_id', $guests, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('guest_id', $guests, $event->guest_id, ['class' => 'form-control', 'id' => 'selectGuest', 'disabled']) !!}
        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'change']) }}
    @endif
    <br/>
    <!-- Trip Type -->
    <label for="guest">Event: </label>
    @if(empty($event))
        {!! Form::select('event_type_id', $eventTypes, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('event_type_id', $eventTypes, $event->event_type_id, ['class' => 'form-control', 'id' => 'selectEventType', 'disabled']) !!}
        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'changeevent']) }}
    @endif
    <br/>
    <label>How many person will you be with?</label>
    {!! Form::number('people_num', null, ['class' => 'form-control']) !!}
    <br/>
    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </p>
</fieldset>