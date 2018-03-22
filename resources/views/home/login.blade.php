@extends('layouts.master')

@section('content')
	<div class="container mt-5 w-25">
    <h2 class="text-center mb-3">Login</h2>
    @if ($errors->any())
      @foreach ($errors->all() as $message)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endforeach
    @endif
    {{ Form::open(['url' => action('Auth\LoginController@login')]) }}
      <div class="form-group">
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', null, ['class' => 'form-control', 'id' => 'username', 'required' => 'required', 'autocomplete' => 'username']) }}
      </div>
      <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'required', 'autocomplete' => 'current-password']) }}
      </div>
      <button class="btn btn-primary btn-block btn-lg">
        <i class="fal fa-sign-in-alt"></i>
        <span class="ml-2">Masuk</span>
      </button>
    {{ Form::close() }}
	</div>
@stop
