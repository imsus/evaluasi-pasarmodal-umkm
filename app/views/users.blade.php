@extends('base')

@section('content')
	<div class="container">
	<h1 class="page-header">Dasbor Kuesioner</h1>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<td>ID</td>
				<td>Email</td>
				<td>User</td>
				<td>Date</td>
			</thead>
	 		@foreach($users as $user)
	        <tr>
	        	<td>{{ $user->id }}</td>
	        	<td>{{ $user->email }}</td>
	        	<td>{{ $user->name }}</td>
				<td>{{ $user->updated_at }}</td>
	        </tr>
	    	@endforeach
		</table>
	</div>
	<hr>
	{{ Form::open(array('users' => 'foo/bar')) }}
    	{{ Form::label('email', 'E-Mail Address'); }} {{ Form::text('email', 'example@gmail.com');}}
    	{{ Form::submit('Click Me!');}}
	{{ Form::close() }}
	</div>
@stop