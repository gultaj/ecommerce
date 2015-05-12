@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Categories Admin Panel</h1><hr>
    <p>Here you can view, delete and create new categories.</p>
    <h2>Edit Category</h2><hr>

    {{ Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'put']) }}

      @include('admin.categories.partials.form')

    {{ Form::close() }}

  </div>

@stop
