@extends('layouts.master')

@section('content')
	<div class="container mt-5 w-25">
    <h2 class="text-center mb-3">Login</h2>
    {{ Form::open(['url' => action('Auth\LoginController@login')]) }}
      <div class="form-group">
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', old('username'), ['class' => $errors->first('username') ? 'is-invalid form-control' : 'form-control', 'id' => 'username', 'required' => 'required', 'autocomplete' => 'username']) }}
        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
      </div>
      <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['class' => $errors->first('password') ? 'is-invalid form-control' : 'form-control', 'id' => 'password', 'required' => 'required', 'autocomplete' => 'current-password']) }}
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
      </div>
      <button class="btn btn-primary btn-block btn-lg">
        <i class="fal fa-sign-in-alt"></i>
        <span class="ml-2">Masuk</span>
      </button>
    {{ Form::close() }}
	</div>
@stop
