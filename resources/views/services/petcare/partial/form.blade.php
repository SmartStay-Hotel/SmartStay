<fieldset>
    <legend>New reservation:</legend>
    <label>Room - Guest: </label>
    @if(empty($petcare))
        {!! Form::select('guest_id', $guests, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('guest_id', $guests, $petcare->guest_id, ['class' => 'form-control', 'id' => 'selectGuest', 'disabled']) !!}
        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'change']) }}
    @endif
    <br/>
    <label>Water</label>
    @if(empty($petcare->water))
        {!! Form::checkbox('water', 1, false, ['class' => 'form-control w3-input w3-border-teal']) !!}
    @else
        {!! Form::checkbox('water', 1, true, ['class' => 'form-control w3-input w3-border-teal']) !!}
    @endif
    <label>Snacks</label>
    @if(empty($petcare->snacks))
        {!! Form::checkbox('snacks', 1, false, ['class' => 'form-control w3-input w3-border-teal']) !!}
    @else
        {!! Form::checkbox('snacks', 1, true, ['class' => 'form-control w3-input w3-border-teal']) !!}
    @endif

    <label>Standard Food</label>
    @if(empty($petcare->standard_food))
        {!! Form::radio('food','standard_food', false, ['class' => 'form-control w3-input w3-border-teal']) !!}
    @else
        {!! Form::radio('food','standard_food', true, ['class' => 'form-control w3-input w3-border-teal']) !!}
    @endif

    <label>Premium Food</label>
    @if(empty($petcare->premium_food))
        {!! Form::radio('food','premium_food', false, ['class' => 'form-control w3-input w3-border-teal']) !!}
    @else
        {!! Form::radio('food','premium_food', true, ['class' => 'form-control w3-input w3-border-teal']) !!}
    @endif
    <br/>
    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </p>
</fieldset>