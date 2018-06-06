<div class="w3-row-padding w3-card-1">
    {{-- BASIC INFORMATION --}}
    <fieldset>
        <legend>Housekeeping information:</legend>
        <label>Guest</label>
        {!! Form::select('guest_id', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <label>Bed Sheets</label>
        {!! Form::checkbox('bed_sheets', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <label>Cleaning</label>
        {!! Form::checkbox('cleaning', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <label>Minibar</label>
        {!! Form::checkbox('minibar', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <label>Blanket</label>
        {!! Form::checkbox('blanket', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <label>Toiletries</label>
        {!! Form::checkbox('toiletries', null, ['class' => 'form-control w3-input w3-border-teal']) !!}
        <label>Pillow</label>
        {!! Form::checkbox('pillow', null, ['class' => 'form-control w3-input w3-border-teal']) !!}

    </fieldset>

    <br/>


    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </p>
</div>