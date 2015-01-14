<!DOCTYPE html>
<html>

<head>
  @yield('title')
  {{ HTML::style('css/bootstrap.min.css'); }}
  {{ HTML::style('css/fluidbox.css'); }}
  <style>
  .affix-top{
    top:190px;
  }
  .affix{
    top:20px;
  }
  .affix>ul{
    width:210px;
  }
  .container{margin-bottom: 60px}
  </style>
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button><a class="navbar-brand" href="/">Aplikasi Pasar Modal</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        @if (Auth::check())
          <li @if ( Request::segment(1) == 'kuesioner' ) { class="active" } @endif ><a href="/kuesioner"><span class="glyphicon glyphicon-stats"></span> Kuesioner</a></li>
        @endif
          <li @if ( Request::segment(1) == 'pengantar' ) { class="active" } @endif><a href="/pengantar"><span class="glyphicon glyphicon-book"></span> Pengantar Pasar Modal</a></li>
          <li @if ( Request::segment(1) == 'panduan' ) { class="active" } @endif><a href="/panduan"><span class="glyphicon glyphicon-pencil"></span> Panduan</a></li>
          <li><a href="/tentang" data-toggle="modal" data-target="#tentang"><span class="glyphicon glyphicon-copyright-mark"></span> Tentang</a></li>
        </ul>
        @if (Auth::check())
          <?php $user = Auth::user(); ?>
          <div class="navbar-right">
            <p class="navbar-text">Halo, <strong>{{ $user->username }}</strong></p>
            <a href="/logout" class="btn btn-danger navbar-btn"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
          </div>
        @else
        <div class="navbar-right">
          <p class="navbar-text">Anda belum login</p>
          <a href="/login" class="btn btn-primary navbar-btn navbar-right"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </div>
    @endif
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  @yield('content')
  <div class="modal fade bs-modal-sm" id="tentang" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#aplikasi" data-toggle="tab">Aplikasi</a></li>
            <li><a href="#changelog" data-toggle="tab">Log</a></li>
            <li><a href="#technology" data-toggle="tab">Teknologi</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="aplikasi">
              <div class="text-center">
                <h3>Aplikasi Pasar Modal</h3>
                <p><span class="label label-success">v2.0</span></p>
                <p>oleh Imam Susanto</p>
              </div>
            </div>
            <div class="tab-pane fade" id="changelog">
              <h4 class="text-center">5 Maret 2014</h4>
              <ul>
                <li>Major Upgrade<br>by 'Imam Susanto'</li>
              </ul>
              <h4 class="text-center">2009</h4>
              <ul>
                <li>Initial Release<br>by 'semuut'</li>
              </ul>
            </div>
            <div class="tab-pane fade" id="technology">
              <h4 class="text-center">Teknologi yang digunakan</h4>
              <table class="table text-center">
                <thead>
                  <tr>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Versi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>XAMPP</td>
                    <td>1.8.3</td>
                  </tr>
                  <tr>
                    <td>Apache</td>
                    <td>2.4.7</td>
                  </tr>
                  <tr>
                    <td>PHP</td>
                    <td>5.5</td>
                  </tr>
                  <tr>
                    <td>MySQL</td>
                    <td>5.6.14</td>
                  </tr>
                  <tr>
                    <td>Laravel</td>
                    <td>4.1</td>
                  </tr>
                  <tr>
                    <td>Bootstrap</td>
                    <td>3.1.0</td>
                  </tr>
                  <tr>
                    <td>jQuery</td>
                    <td>1.10.2</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{ HTML::script('js/jquery.min.js'); }}
  {{ HTML::script('js/bootstrap.min.js'); }}
  {{ HTML::script('js/imagesloaded.js'); }}
  {{ HTML::script('js/fluidbox.min.js'); }}
  <script>
    $(function () {
        $(".col-md-9>a").fluidbox();
    });
  </script>
  </body>
</html>
