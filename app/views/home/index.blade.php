@extends('base.base')

@section('content')
	<div layout="column" layout-fill layout-align="center start">
		<h1>Selamat Datang di aplikasi Pasar Modal v3.0</h1>
		<p>Aplikasi ini bertujuan untuk memudahkan pengguna mengukur sejauh mana kinerja Usaha Mikro Kecil Menengah agar mereka mampu memasuki Pasar Modal.</p>
		<div layout="row">
			<md-button href="/login" class="md-raised md-primary">Login</md-button>
			<md-button href="/kuesioner" class="md-raised md-primary">Kuesioner</md-button>
			<md-button href="/panduan">Panduan</md-button>
			<md-button href="/pengantar">Pengantar</md-button>
		</div>
	</div>
@stop
