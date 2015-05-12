<p>
  {{ Form::label('title') }}
  {{ Form::text('title') }}
</p>
<p>
  {{ Form::label('description') }}
  {{ Form::textarea('description') }}
</p>
<p>
  {{ Form::label('category_id', 'Category') }}
  {{ Form::select('category_id', Category::lists('name', 'id')) }}
</p>
<p>
  {{ Form::label('price') }}
  {{ Form::number('price', null, ['class' => 'form-price']) }}
</p>
<p>
  <label for="availability">
    {{ Form::checkbox('availability', 1, true, ['id' => 'availability', 'class' => 'form-check']) }} In stock
  </label>
</p>
<p>
  {{ Form::label('image') }}
  {{ Form::file('image') }}
</p>
  {{ Form::submit('Save product', ['class' => 'secondary-cart-btn']) }}
