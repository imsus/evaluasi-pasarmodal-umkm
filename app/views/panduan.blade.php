@extends('base')

@section('title')
<title>Panduan</title>
@stop

@section('content')
<div class="container" style="max-width:960px">
  <div class="page-header">
    <h1>Panduan Penggunaan Aplikasi</h1>
  </div>
  <div class="row">
    <div class="col-md-9">
    <h2 id="login">Login/Logout</h2>
    <p>Untuk dapat menggunakan aplikasi ini, Anda diharuskan untuk login. Untuk melakukan login, silakan klik tombol login (Gambar 1) untuk masuk halaman login.</p>
    <a href="/img/Image-001.png">
      <img src="/img/Image-001.png" class="img-responsive" alt="Gambar 1">
    </a>
    <p style="text-align: center"><small>Gambar 1</small></p>
    <p>Pada halaman login (Gambar 2) masukkan kredensial sebagai berikut:</p>
    <p>
      <pre>username: umkm
password: umkm</pre>
    </p>
    <a href="/img/Image-002.png">
      <img src="/img/Image-002.png" class="img-responsive" alt="Gambar 2">
    </a>
    <p style="text-align: center"><small>Gambar 2</small></p>
    <p>Jika sudah login, maka Anda akan diarahkan ke halaman dashboard kuesioner.</p>
    <h2 id="dasbor">Halaman Dasbor</h2>
    <p>Pada halaman dasbor (Gambar 3), Anda akan menemukan kumpulan data kuesioner yang telah Anda masukkan sebelumnya. Di halaman ini Anda dapat menambah kuesioner baru, mengedit kuesioner, melihat detil kuesioner, dan menghapus kuesioner.</p>
    <a href="/img/Image-005.png">
      <img src="/img/Image-005.png" class="img-responsive" alt="Gambar 3">
    </a>
    <p style="text-align: center"><small>Gambar 3</small></p>
    <h2 id="buat">Membuat Kuesioner</h2>
    <p>Pada halaman pembuatan kuesioner (Gambar 4), Anda akan diminta untuk menginput data yang dibutuhkan oleh kuesioner. Tidak semua data perlu dimasukkan. Pada saat melakukan submit, aplikasi akan memberikan peringatan validasi jika ada data yang diperlukan belum dimasukkan.</p>
    <a href="/img/Image-004.png">
      <img src="/img/Image-004.png" class="img-responsive" alt="Gambar 4">
    </a>
    <p style="text-align: center"><small>Gambar 4</small></p>
    <h2 id="detil">Detil Kuesioner</h2>
    <p>Halaman ini (Gambar 5) menjelaskan informasi merupakan hasil kalkulasi dan analisis dari data kuesioner yang telah dimasukkan sebelumnya. Laporan berupa Data Umum, Aspek Keuangan, Aspek Manajerial, dan Hasil.</p>
    <a href="/img/Image-006.png">
      <img src="/img/Image-006.png" class="img-responsive" alt="Gambar 5">
    </a>
    <p style="text-align: center"><small>Gambar 5</small></p>
    <h2 id="edit">Mengedit Kuesioner</h2>
    <p>Pada halaman pengeditan kuesioner (Gambar 6), Anda dapat memanipulasi data yang sudah Anda masukkan. Gunakan tombol edit di bagian bawah form untuk mengkonfirmasi perubahan yang sudah dilakukan.</p>
    <a href="/img/Image-007.png">
      <img src="/img/Image-007.png" class="img-responsive" alt="Gambar 6">
    </a>
    <p style="text-align: center"><small>Gambar 6</small></p>
    <h2 id="hapus">Menghapus Kuesioner</h2>
    <p>Untuk menghapus kuesioner, Anda dapat menghapus dengan menekan tombol hapus pada halaman dasbor dan halaman edit kuesioner.</p>
    <h2 id="print">Mengeprint Kuesioner</h2>
    <p>Kuesioner yang telah dibuat dapat disimpan sebagai dokumen atau dicetak (Gambar 7). Caranya adalah menekan tombol print pada halaman dasbor kuesioner dan halaman detil kuesioner. Hasilnya berupa dokumen pdf yang dapat disimpan dan dapat dicetak langsung.</p>
    <a href="/img/Image-008.png">
      <img src="/img/Image-008.png" class="img-responsive" alt="Gambar 7">
    </a>
    <p style="text-align: center"><small>Gambar 7</small></p>
    </div>
    <div class="col-md-3 visible-lg">
      <div data-spy="affix" data-offset-top="190">
        <ul class="nav nav-stacked">
          <li><a href="#login">Login/Logout</a></li>
          <li><a href="#dasbor">Halaman Dasbor</a></li>
          <li><a href="#buat">Membuat Kuesioner</a></li>
          <li><a href="#detil">Detil Kuesioner</a></li>
          <li><a href="#edit">Mengedit Kuesioner</a></li>
          <li><a href="#hapus">Menghapus Kuesioner</a></li>
          <li><a href="#print">Mengeprint Kuesioner</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@stop
