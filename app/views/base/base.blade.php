<!DOCTYPE html>
<html ng-app="UMKM">

<head>
	<title>Aplikasi Evaluasi UMKM Pasar Modal</title>
	<meta name="description" content="Aplikasi evaluasi Usaha Mikro Kecil Menengah untuk membantu menilai kesiapan untuk masuk ke pasar modal.">

	@include('base.head')
    @include('base.stylesheet')
</head>

<body ng-controller="AppCtrl" layout="column" layout-fill>
	<section layout="row" flex>
	    @include('base.sidenav')
	    <div layout="column" layout-fill>
	    	@include('base.header')
			<md-content flex class="md-padding">
				@yield('content')
			</md-content>
		</div>
	</section>

    @include('base.script')
</body>

</html>
