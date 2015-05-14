@extends('layouts.main')

@section('content')

  <section id="signin-form">
    <h1>I have an account</h1>
    {{ Form::open(['route' => 'auth.login.post']) }}
      <p>
        {{ HTML::image('img/email.gif', 'Email Address') }}
        {{ Form::email('email', null, ['placeholder' => 'Email']) }}
        {{ $errors->first('email', '<p class="error">:message</p>') }}
      </p>
      <p>
        {{ HTML::image('img/password.gif', 'Password') }}
        {{ Form::password('password', ['placeholder' => 'Password']) }}
        {{ $errors->first('password', '<p class="error">:message</p>') }}
      </p>
      <p>
        {{ Form::button('Log in', ['class' => 'secondary-cart-btn', 'type' => 'submit']) }}
      </p>
    {{ Form::close() }}
  </section><!-- end signin-form -->
  <section id="signup">
    <h2>I'm a new customer</h2>
    <h3>You can create an account in just a few simple steps.<br>
        Click below to begin.</h3>
    {{ link_to_route('users.create', 'CREATE NEW ACCOUNT', null, ['class' => 'default-btn']) }}
  </section><!--- end signup -->


@stop
