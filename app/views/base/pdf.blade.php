<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{ HTML::style('bower_components/skeleton/css/normalize.css'); }}
		{{ HTML::style('bower_components/skeleton/css/skeleton.css'); }}
	</head>
	<body>
		@yield('content')
	</body>
</html>
