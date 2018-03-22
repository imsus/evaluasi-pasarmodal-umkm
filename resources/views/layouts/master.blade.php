<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Aplikasi Evaluasi UMKM Pasar Modal</title>
	<meta name="description" content="Aplikasi evaluasi Usaha Mikro Kecil Menengah untuk membantu menilai kesiapan untuk masuk ke pasar modal.">

	@include('includes.head')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body style="position: relative" data-spy="scroll" data-target=".spy">
    @include('includes.header')

    @yield('content')

	  @include('includes.modal')

    <script src="https://cdn.jsdelivr.net/combine/npm/vue@2/dist/vue.min.js,npm/@fortawesome/fontawesome@1,npm/@fortawesome/fontawesome-free-regular@5,npm/@fortawesome/fontawesome-free-brands@5,npm/popper.js@1,npm/jquery@3/dist/jquery.slim.min.js,npm/bootstrap@4/dist/js/bootstrap.min.js"></script>
    <script defer src="/js/fontawesome.js"></script>
    <script src="https://unpkg.com/masonry-layout@4.2.1/dist/masonry.pkgd.min.js"></script>
	  @stack('js')
</body>

</html>
