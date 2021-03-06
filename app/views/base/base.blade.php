<!DOCTYPE html>
<html ng-app="umkm">

<head>
	<title>Aplikasi Evaluasi UMKM Pasar Modal</title>
	<meta name="description" content="Aplikasi evaluasi Usaha Mikro Kecil Menengah untuk membantu menilai kesiapan untuk masuk ke pasar modal.">

	@include('base.head')
    @include('base.stylesheet')
</head>

<body>
    @include('base.header')

    @yield('content')

	@include('base.dialog')

	@section('script')
		@include('base.script')
	@show
</body>

</html>
