<div class="w3-row-padding w3-card-1">
    {{-- BASIC INFORMATION --}}
    <fieldset>
        <legend>Event information:</legend>
        <label>Guest</label>
        {!! Form::select('guest_id', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <label>Event type</label>
        {!! Form::select('event_type_id', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <br/>
    </fieldset>

    <br/>


    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'w3-btn w3-teal']) }}
    </p>
</div>