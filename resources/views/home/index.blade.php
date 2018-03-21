@extends('layouts.master')

@section('content')
	<div class="">
	  <div class="container" style="max-width:800px; margin-top:25vh">
	    <h1>Selamat datang di aplikasi Pasar Modal <span class="label label-success">v2.1</span></h1>
	    <p class="lead">Aplikasi ini bertujuan untuk memudahkan pengguna untuk mengukur sejauh mana kinerja Usaha Mikro Kecil Menengah agar mereka mampu memasuki Pasar Modal</p>
	    <p>
	    @auth
	      <a href="/kuesioner-new" class="btn btn-primary btn-lg" role="button">Kuesioner</a>
	    @else
	      <a href="/login" class="btn btn-primary btn-lg" role="button">Login</a>
	    @endauth
	    <a href="/pengantar" class="btn btn-default btn-lg" role="button">Pengantar</a>
	    <a href="/panduan" class="btn btn-default btn-lg" role="button">Panduan</a>
	    </p>
	  </div>
	</div>
@stop