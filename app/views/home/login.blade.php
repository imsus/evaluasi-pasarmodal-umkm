@extends('base.base')

@section('content')
	<div layout="row" layout-align="center center" flex>
		<div style="min-width: 300px; max-width: 400px" layout-padding	>
			<h2>Silahkan Masuk</h2>
			<% Form::open(array('url' => 'login')) %>
			    <md-input-container>
			    	<% Form::label('username', null) %>
					<% Form::input('text', 'username', null, array('ng-model' => 'user.title', 'required' => '')) %>
			    </md-input-container>
			    <md-input-container>
			    	<% Form::label('password', null) %>
					<% Form::input('password', 'password', null, array('required' => '')) %>
			    </md-input-container>
			    <md-button type="submit" class="md-raised">Masuk</md-button>
		    <% Form::close() %>
	    </div>
    </div>
@stop
