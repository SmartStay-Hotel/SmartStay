<fieldset>
    <legend>New order:</legend>
    <label>Room - Guest: </label>
    @if(empty($snack))
        {!! Form::select('guest_id', $guests, ['class' => 'form-control'], ['placeholder' => '--- Choose an option ---']) !!}
    @else
        {!! Form::select('guest_id', $guests, $snack->guest_id, ['class' => 'form-control', 'id' => 'selectGuest', 'disabled']) !!}
        <label>Change </label>
        {{ Form::checkbox('checkbox', 1, null, ['id' => 'change']) }}
    @endif
    <br/><br/>
    <div id="products">
    <label>Products</label>
    {!! Form::select('product_type_id[]', $productTypes, ['class' => 'form-control'], ['placeholder' => '--- Choose a product ---']) !!}
        <button type="button" id="addProduct" class="btn">+</button>
    <br/>
    <label>How many?</label>
    {!! Form::number('quantity[]', 1, ['class' => 'form-control']) !!}
    <br/>
    </div>
    <p>
        {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn-save']) }}
    </p>
</fieldset>
