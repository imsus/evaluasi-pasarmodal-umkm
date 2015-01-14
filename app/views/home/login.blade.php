@extends('base.base')

@section('content')
	<div class="container" style="max-width:300px">
	<h2 class="text-center page-header">Login</h2>
	{{ Form::open(array('url' => 'login')) }}
	  <div class="form-group">
	  	{{ Form::text('username', null, array('class' => 'form-control', 'id' => 'username', 'placeholder' => 'Masukkan Username')) }}
	  </div>
	  <div class="form-group">
	  	{{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Masukkan Password')) }}
	  </div>
	  	{{Form::submit('Masuk', array('class' => 'btn btn-primary btn-block btn-lg'))}}
	{{ Form::close() }}
	</div>
@stop
