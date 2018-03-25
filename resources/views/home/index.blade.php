@extends('layouts.master')

@section('content')
	<div class="">
	  <div class="container" style="max-width:800px; margin-top:25vh">
	    <h1>Selamat datang di aplikasi Pasar Modal <span class="badge badge-success align-text-bottom">v2.2</span></h1>
	    <p class="lead">Aplikasi ini bertujuan untuk memudahkan pengguna untuk mengukur sejauh mana kinerja Usaha Mikro Kecil Menengah agar mereka mampu memasuki Pasar Modal</p>
	    <p>
	    @auth
        <a href="{{ route('questionnaire.index') }}" class="btn btn-primary btn-lg" role="button">
          <i class="fal fa-sign-in-alt"></i>
          <span class="ml-2">Kuesioner</span>
        </a>
	    @else
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg" role="button">
          <i class="fal fa-sign-in-alt"></i>
          <span class="ml-2">Login</span>
        </a>
	    @endauth
      <a href="{{ route('home.pengantar') }}" class="btn btn-default btn-lg" role="button">
        <i class="fal fa-book"></i>
        <span class="ml-2">Pengantar</span>
      </a>
      <a href="{{ route('home.panduan') }}" class="btn btn-default btn-lg" role="button">
        <i class="fal fa-question-circle"></i>
        <span class="ml-2">Panduan</span>
      </a>
	    </p>
	  </div>
	</div>
@stop
