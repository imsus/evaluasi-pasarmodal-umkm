<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Aplikasi Pasar Modal</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @if (Auth::check())
			<li @if ( Request::segment(1)=='kuesioner' ) { class="active" } @endif><a href="/kuesioner-new"><span class="glyphicon glyphicon-stats"></span> Kuesioner</a>
			</li>
		@endif
		<li @if ( Request::segment(1)=='pengantar' ) { class="active" } @endif><a href="/pengantar"><span class="glyphicon glyphicon-book"></span> Pengantar Pasar Modal</a>
		</li>
		<li @if ( Request::segment(1)=='panduan' ) { class="active" } @endif><a href="/panduan"><span class="glyphicon glyphicon-pencil"></span> Panduan</a>
		</li>
		<li><a href="/tentang" data-toggle="modal" data-target="#tentang"><span class="glyphicon glyphicon-copyright-mark"></span> Tentang</a>
		</li>
      </ul>
      <div class="navbar-right" style="margin-right: 0;">
      	@if (Auth::check())
      		<?php $user = Auth::user() ?>
			<p class="navbar-text">Halo, <strong>{{ $user->username }}</strong></p>
			<a href="/logout" class="btn btn-danger navbar-btn"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
      	@else
      		<p class="navbar-text">Anda belum login</p>
			<a href="/login" class="btn btn-primary navbar-btn"><span class="glyphicon glyphicon-log-in"></span> Login</a>
      	@endif
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
