<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <a class="navbar-brand" href="{{ route('home') }}">Aplikasi Pasar Modal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('questionnaire.index') }}">Kuesioner</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home.pengantar') }}">Pengantar Pasar Modal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home.panduan') }}">Panduan</a>
      </li>
    </ul>
    @auth
      <div class="d-flex align-items-center">
        <div class="navbar-text mr-3">Halo, <strong>{{ auth()->user()->username }}</strong></div>
        {{ Form::open(['url' => action('Auth\LoginController@logout')]) }}
          <button class="btn btn-light text-danger navbar-btn d-flex align-items-center justify-content-center">
            <i class="fal fa-sign-out-alt"></i>
            <span class="ml-2">Logout</span>
          </button>
        {{ Form::close() }}
      </div>
    @else
      <div class="d-flex align-items-center">
        <div class="navbar-text mr-3">Anda belum login</div>
        <a href="{{ route('login') }}" class="btn btn-primary navbar-btn">
          <i class="fal fa-sign-in-alt"></i>
          <span class="ml-2">Login</span>
        </a>
      </div>
    @endauth
  </div>
</nav>
