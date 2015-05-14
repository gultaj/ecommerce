@extends('layouts.main')

@section('content')

  <div id="new-account">
    <h1>Create New Account</h1>

    {{ Form::open(['route' => 'users.store']) }}
        <p>
            <label for="firstname">
                <span class="required-field">*</span> FIRST NAME:
            </label>
            {{ Form::text('firstname', null, ['id' => 'firstname', 'required']) }}
            {{ $errors->first('firstname', '<p class="error">:message</p>') }}
        </p>
        <p>
            <label for="lastname">
                <span class="required-field">*</span> LAST NAME:
            </label>
            {{ Form::text('lastname', null, ['id' => 'lastname', 'required']) }}
            {{ $errors->first('lastname', '<p class="error">:message</p>') }}
        </p>
        <p>
            <label for="email">
                <span class="required-field">*</span> EMAIL:
            </label>
            {{ Form::email('email', null, ['id' => 'email', 'required']) }}
            {{ $errors->first('email', '<p class="error">:message</p>') }}
        </p>
        <p>
            <label for="password">
                <span class="required-field">*</span> PASSWORD:
            </label>
            {{ Form::password('password', null, ['id' => 'password', 'required']) }}
            {{ $errors->first('password', '<p class="error">:message</p>') }}
        </p>
        <p>
            <label for="password_confirmation">
                <span class="required-field">*</span> CONFIRM PASSWORD:
            </label>
            {{ Form::password('password_confirmation', null, ['id' => 'ppassword_confirmation', 'required']) }}
            {{ $errors->first('password_confirmation', '<p class="error">:message</p>') }}
        </p>
        <p>
            <label for="telephone">
                <span class="required-field">*</span> TELEPHONE:
            </label>
            {{ Form::text('telephone', null, ['id' => 'telephone', 'required']) }}
            {{ $errors->first('telephone', '<p class="error">:message</p>') }}
        </p>

        <p>Fields marked with <span class="required-field">*</span> are required.</p>

        <hr />
        {{ Form::submit('CREATE NEW ACCOUNT', ['class' => 'secondary-cart-btn'])}}
    {{ Form::close() }}
  </div><!-- end new-account -->

@stop
