<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Aplikasi Evaluasi UMKM Pasar Modal</title>
	<meta name="description" content="Aplikasi evaluasi Usaha Mikro Kecil Menengah untuk membantu menilai kesiapan untuk masuk ke pasar modal.">

	@include('includes.head')

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  @stack('css')
</head>

<body class="position-relative" data-spy="scroll" data-target=".spy">
    
    {{--  @yield('modal')  --}}

    @include('includes.header')

    @if (session()->has('message'))
      <div class="mb-5">
        <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
          {{ session('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @yield('content')

    <script src="{{ asset('js/main.js') }}"></script>
    <script defer src="{{ asset('js/fontawesome.js') }}"></script>
	  @stack('js')
</body>

</html>
