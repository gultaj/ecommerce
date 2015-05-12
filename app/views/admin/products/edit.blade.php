@extends('layouts.main')

@section('content')
  <div id="admin">
    <h1>Products Admin Panel</h1><hr>
    <p>Here you can view, delete and create new products.</p>
    <h2>Edit product</h2><hr>

    @if ($errors->has())

    <div id="form-errors">
      <p>The following errors have occured:</p>

      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>

    @endif


    {{ Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'put', 'files' => true]) }}

      @include('admin.products.partials.form')

    {{ Form::close() }}

  </div>

@stop
