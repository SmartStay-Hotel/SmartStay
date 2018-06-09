<div class="w3-row-padding w3-card-1">
    {{-- BASIC INFORMATION --}}
    <fieldset>
        <legend>Trip information:</legend>
        <label>Guest</label>
        {!! Form::select('guest_id', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <label>Trip type</label>
        {!! Form::select('trip_type_id', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <br/>
    </fieldset>

    <br/>


    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </p>
</div>