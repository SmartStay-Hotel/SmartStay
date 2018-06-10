    <fieldset>
        <legend>New reservation:</legend>
        <label>Room - Guest: </label>
        @if(empty($housekeeping))
            {!! Form::select('guest_id', $guests, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
        @else
            {!! Form::select('guest_id', $guests, $housekeeping->guest_id, ['class' => 'form-control', 'id' => 'selectGuest', 'disabled']) !!}
            <label>Change </label>
            {{ Form::checkbox('checkbox', 1, null, ['id' => 'change']) }}
        @endif
        <br/>
        <label>Bed Sheets</label>
        @if(empty($housekeeping->bed_sheets))
            {!! Form::checkbox('bed_sheets',0, false, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @else
            {!! Form::checkbox('bed_sheets',1, true, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @endif
        <label>Cleaning</label>
        @if(empty($housekeeping->cleaning))
            {!! Form::checkbox('cleaning', 0, false, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @else
            {!! Form::checkbox('cleaning', 1, true, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @endif

        <label>Minibar</label>
        @if(empty($housekeeping->minibar))
            {!! Form::checkbox('minibar',0, false, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @else
            {!! Form::checkbox('minibar', 1, true, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @endif
        <label>Blanket</label>
        @if(empty($housekeeping->blanket))
            {!! Form::checkbox('blanket',0, false, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @else
            {!! Form::checkbox('blanket',1, true, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @endif
        <label>Toiletries</label>
        @if(empty($housekeeping->toiletries))
            {!! Form::checkbox('toiletries',0, false, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @else
            {!! Form::checkbox('toiletries',1, true, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @endif
        <label>Pillow</label>
        @if(empty($housekeeping->pillow))
            {!! Form::checkbox('pillow',0, false, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @else
            {!! Form::checkbox('pillow',1, true, ['class' => 'form-control w3-input w3-border-teal']) !!}
        @endif
    <br/>
    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </p>
</fieldset>