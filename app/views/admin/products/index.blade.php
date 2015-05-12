@extends('admin.layouts.main')

@section('content')

<div id="admin">
  <h1>Products Admin Panel</h1><hr>
  <p>Here you can view, delete and create new products.</p>

  <h2>Products</h2><hr>

  <ul>
    @foreach ($products as $product)
      <li>
        {{ HTML::image($product->image, $product->title, ['height' => 50]) }}
        {{ link_to_route('admin.products.edit', $product->title, [$product->id]) }} -
        {{ Form::open(['route' => ['admin.products.destroy', $product->id], 'method' => 'delete', 'class' => 'form-inline']) }}
          {{ Form::hidden('id', $product->id) }}
          {{ Form::submit('delete') }}
        {{ Form::close() }}
      </li>
    @endforeach
  </ul>

  <hr>
  {{ link_to_route('admin.products.create', 'Create new product', null, ['class' => 'tertiary-btn']) }}
</div>

@stop
