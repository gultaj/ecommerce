@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Categories Admin Panel</h1><hr>
    <p>Here you can view, delete and create new categories.</p>
    <h2>Categories</h2><hr>
    <ul>
      @foreach ($categories as $category)
        <li>{{ link_to_route('admin.categories.edit', $category->name, [$category->id]) }} -
        {{ Form::open(['route' => ['admin.categories.destroy', $category->id], 'method' => 'delete', 'class' => 'form-inline']) }}
          {{ Form::hidden('id', $category->id) }}
          {{ Form::submit('delete') }}
        {{ Form::close() }}
        </li>
      @endforeach
    </ul>

    <h2>Create new category</h2><hr>
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

    {{ Form::open(['route' => 'admin.categories.store']) }}

      @include('admin.categories.partials.form')

    {{ Form::close() }}

  </div>

@stop
