@extends('base.base')

@section('content')
<style>
	.page-navigation{
		margin-top: 55px;
	}
</style>
<div class="container">
  <div class="row">
    <div class="col-md-9"><h1 class="page-header">Edit Kuesioner <strong>#<% $kuesioner->id %></strong></h1></div>
    <div class="col-md-3">
      <div class="btn-group btn-group-justified page-navigation">
        <div class="btn-group"><a href="/kuesioner" type="button" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Balik</a></div>
        <div class="btn-group"><a href="/kuesioner/detail/<% $kuesioner->id %>" type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Detil</a></div>
        <div class="btn-group"><a href="/kuesioner/delete/<% $kuesioner->id %>" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus</a></div>
      </div>
    </div>
  </div>
<div class="row">
  <% Form::open(array('url' => 'kuesioner/edit/' . $kuesioner->id, 'method' => 'put', 'role' => 'form' )) %>
    <div class="col-md-4">
      <h3>Data Umum</h3>
      <div class="form-group">
        <label for="nama">1. Nama Perusahaan</label>
        <input type="text" class="form-control" required name="nama" id="nama" placeholder="Contoh: Saung Ayam" value="<% $kuesioner->nama %>">
      </div>
      <div class="checkbox">
        <label>
          <input type="hidden" name="go" value="0" >
          <input type="checkbox" name="go" value="1" @if ( $kuesioner->go ) checked @endif > Centang jika sudah Go Publik
        </label>
      </div>
      <div class="form-group">
        <label for="status1">2. Status Badan Usaha</label>
        <select class="form-control" name="status1" id="status1">
          <option @if ( $kuesioner->status1 === 'PT' ) selected @endif value="PT">PT (Perseroan Terbatas)</option>
          <option @if ( $kuesioner->status1 === 'Koperasi' ) selected @endif value="Koperasi">Koperasi</option>
          <option @if ( $kuesioner->status1 === 'Firma' ) selected @endif value="Firma">Firma</option>
          <option @if ( $kuesioner->status1 === 'CV' ) selected @endif value="CV">CV (<i>Commanditaire Venootschaap</i>)</option>
          <option @if ( $kuesioner->status1 === 'Persero' ) selected @endif value="Persero">Persero</option>
          <option @if ( $kuesioner->status1 === 'UD' ) selected @endif value="UD">UD (Usaha Dagang)</option>
          <option @if ( $kuesioner->status1 === 'Lainnya' ) selected @endif value="Lainnya">Lainnya</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tahun">3. Tahun Berdiri</label>
        <input type="number" min="1914" max="2114" step="1" class="form-control" name="tahun" id="tahun" placeholder="Contoh: 2000" value="<% $kuesioner->tahun %>">
      </div>
      <div class="form-group">
        <label for="status2">4. Status</label>
        <select class="form-control" name="status2" id="status2">
          <option @if ( $kuesioner->status2 === 'PMDN' ) selected @endif value="PMDN">PMDN (Penanaman Modal Dalam Negeri)</option>
          <option @if ( $kuesioner->status2 === 'JO' ) selected @endif value="JO">JO (Joint Operation)</option>
          <option @if ( $kuesioner->status2 === 'JV' ) selected @endif value="JV">JV (Joint Venture)</option>
          <option @if ( $kuesioner->status2 === 'JMA' ) selected @endif value="JMA">JMA (Joint Merger Acquisition)</option>
        </select>
      </div>
      <div class="form-group">
        <label for="alamat">5. Alamat Perusahaan</label>
        <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Contoh: Jl. H.R. Rasuna Said Kav. C-22"><% $kuesioner->alamat %></textarea>
      </div>
      <div class="form-group">
        <label for="kota">6. Kota</label>
        <input type="text" class="form-control" name="kota" id="kota" placeholder="Contoh: Kuningan, Jakarta Selatan" value="<% $kuesioner->kota %>">
      </div>
      <h4>7. Kontak Perusahaan</h4>
      <div class="form-group">
        <label for="telp">Telepon</label>
        <input type="text" class="form-control" name="telp" id="telp" placeholder="Contoh: +622197648321" value="<% $kuesioner->telp %>">
      </div>
      <div class="form-group">
        <label for="fax">Fax</label>
        <input type="text" class="form-control" name="fax" id="fax" placeholder="Contoh: +622197648321" value="<% $kuesioner->fax %>">
      </div>
      <div class="form-group">
        <label for="hp">Handphone</label>
        <input type="text" class="form-control" name="hp" id="hp" placeholder="Contoh: +622197648321" value="<% $kuesioner->hp %>">
      </div>
      <div class="form-group">
        <label for="web">8. Website</label>
        <input type="url" class="form-control" name="web" id="web" placeholder="Contoh: http://google.com" value="<% $kuesioner->web %>">
      </div>
      <div class="form-group">
        <label for="pj">9. Penanggung Jawab</label>
        <input type="text" class="form-control" name="pj" id="pj" placeholder="Contoh: Mas Budi" value="<% $kuesioner->pj %>">
      </div>
      <div class="form-group">
        <label for="manager">10. Jumlah Manajer</label>
        <input type="text" class="form-control" name="manager" id="manager" placeholder="Contoh: 4" value="<% $kuesioner->manager %>">
      </div>
      <div class="form-group">
        <label for="karyawan">11. Jumlah Karyawan</label>
        <input type="text" class="form-control" name="karyawan" id="karyawan" placeholder="Contoh: 10" value="<% $kuesioner->karyawan %>">
      </div>
    </div>
    <div class="col-md-4">
      <h3>Aspek Manajerial</h3>
      <div class="form-group">
        <label for="surat">12. Kelengkapan Surat</label>
        <select class="form-control" name="surat" id="surat">
          <option  @if ( $kuesioner->surat === '1' ) selected @endif value="1">Tidak Ada</option>
          <option  @if ( $kuesioner->surat === '2' ) selected @endif value="2">Tidak Lengkap</option>
          <option  @if ( $kuesioner->surat === '3' ) selected @endif value="3">Kurang Lengkap</option>
          <option  @if ( $kuesioner->surat === '4' ) selected @endif value="4">Lengkap</option>
          <option  @if ( $kuesioner->surat === '5' ) selected @endif value="5">Sangat Lengkap</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tsurat">13. Tahun Terbit Surat</label>
        <input type="number" min="1914" max="2114" step="1" class="form-control" name="tsurat" id="tsurat" placeholder="Contoh: 1999" value="<% $kuesioner->tsurat %>">
      </div>
      <div class="form-group">
        <label>14. Apakah perusahaan ada / memiliki kelengkapan perijinan perusahaan?</label><br>
        <label class="checkbox-inline"><input type="hidden" name="npwp" value="0" ><input type="checkbox" value="1" name="npwp" @if ( $kuesioner->npwp ) checked @endif >NPWP</label>
        <label class="checkbox-inline"><input type="hidden" name="siup" value="0" ><input type="checkbox" value="1" name="siup" @if ( $kuesioner->siup ) checked @endif >SIUP</label>
        <label class="checkbox-inline"><input type="hidden" name="iui"  value="0" ><input type="checkbox" value="1" name="iui" @if ( $kuesioner->iui ) checked @endif >IUI</label>
        <label class="checkbox-inline"><input type="hidden" name="situ" value="0" ><input type="checkbox" value="1" name="situ" @if ( $kuesioner->situ ) checked @endif >SITU</label>
      </div>
      <div class="form-group">
        <label for="sistem">15. Sistem Manajemen</label>
        <select class="form-control" name="sistem" id="sistem">
          <option @if ( $kuesioner->sistem === '1' ) selected @endif value="1">Tidak Memiliki</option>
          <option @if ( $kuesioner->sistem === '2' ) selected @endif value="2">Tidak Memiliki, Sedang Merencanakan</option>
          <option @if ( $kuesioner->sistem === '3' ) selected @endif value="3">Memiliki, Tidak Menerapkan</option>
          <option @if ( $kuesioner->sistem === '4' ) selected @endif value="4">Memiliki, Dijalankan Sebagian</option>
          <option @if ( $kuesioner->sistem === '5' ) selected @endif value="5">Memiliki, Dijalankan Semuanya</option>
        </select>
      </div>
      <div class="form-group">
        <label for="sertifikasi">16. Sertifikasi</label>
        <select class="form-control" name="sertifikasi" id="sertifikasi">
          <option @if ( $kuesioner->sertifikasi === '1' ) selected @endif value="1">Tidak Memiliki</option>
          <option @if ( $kuesioner->sertifikasi === '2' ) selected @endif value="2">Tidak Memiliki, Sedang Mengajukan</option>
          <option @if ( $kuesioner->sertifikasi === '3' ) selected @endif value="3">Memiliki, Tidak Valid</option>
          <option @if ( $kuesioner->sertifikasi === '4' ) selected @endif value="4">Memiliki, Suspended</option>
          <option @if ( $kuesioner->sertifikasi === '5' ) selected @endif value="5">Memiliki, Valid</option>
        </select>
      </div>
      <div class="form-group">
        <label for="struktur">17. Struktur Perusahaan</label>
        <select class="form-control" name="struktur" id="struktur">
          <option @if ( $kuesioner->struktur === '1' ) selected @endif value="1">Tidak Ada</option>
          <option @if ( $kuesioner->struktur === '2' ) selected @endif value="2">Tidak Lengkap</option>
          <option @if ( $kuesioner->struktur === '3' ) selected @endif value="3">Kurang Lengkap</option>
          <option @if ( $kuesioner->struktur === '4' ) selected @endif value="4">Lengkap</option>
          <option @if ( $kuesioner->struktur === '5' ) selected @endif value="5">Sangat Lengkap</option>
        </select>
      </div>
      <div class="form-group">
        <label for="mutu">18. Manajemen Mutu</label>
        <select class="form-control" name="mutu" id="mutu">
          <option @if ( $kuesioner->mutu === '1' ) selected @endif value="1">Tidak Memiliki</option>
          <option @if ( $kuesioner->mutu === '2' ) selected @endif value="2">Tidak Memiliki, Sedang Mengajukan</option>
          <option @if ( $kuesioner->mutu === '3' ) selected @endif value="3">Memiliki, Tidak Valid</option>
          <option @if ( $kuesioner->mutu === '4' ) selected @endif value="4">Memiliki, Suspended</option>
          <option @if ( $kuesioner->mutu === '5' ) selected @endif value="5">Memiliki, Valid</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tugas">19. Uraian Tugas</label>
        <select class="form-control" name="tugas" id="tugas">
          <option @if ( $kuesioner->tugas === '1' ) selected @endif value="1">Tidak Ada</option>
          <option @if ( $kuesioner->tugas === '2' ) selected @endif value="2">Tidak Lengkap</option>
          <option @if ( $kuesioner->tugas === '3' ) selected @endif value="3">Kurang Lengkap</option>
          <option @if ( $kuesioner->tugas === '4' ) selected @endif value="4">Lengkap</option>
          <option @if ( $kuesioner->tugas === '5' ) selected @endif value="5">Sangat Lengkap</option>
        </select>
      </div>
      <h4>20. Berapa besar modal perusahaan /usaha anda?</h4>
      <div class="form-group">
        <label for="modala">Modal Awal</label><input type="text" required name="modala" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->modala %>">
      </div>
      <div class="form-group">
        <label for="modals">Modal Sendiri</label><input type="text" required name="modals" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->modals %>">
      </div>
      <div class="form-group">
        <label for="modall">Modal Luar</label><input type="text" required name="modall" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->modall %>">
      </div>
      <div class="form-group">
        <label for="bank">21. Perbankan</label>
        <select class="form-control" name="bank" id="bank">
          <option @if ( $kuesioner->bank === '1' ) selected @endif value="1">Tidak pernah mengajukan pinjaman</option>
          <option @if ( $kuesioner->bank === '2' ) selected @endif value="2">Mengajukan Pinjaman, tapi tidak mendapat respon</option>
          <option @if ( $kuesioner->bank === '3' ) selected @endif value="3">Mengajukan Pinjaman, dan dijanjikan memperoleh pinjaman</option>
          <option @if ( $kuesioner->bank === '4' ) selected @endif value="4">Mengajukan Pinjaman, memperoleh pinjaman, jumlah tidak sesuai dengan yang diajukan</option>
          <option @if ( $kuesioner->bank === '5' ) selected @endif value="5">Mengajukan Pinjaman, memperoleh pinjaman, jumlah sesuai dengan yang diajukan</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Aspek Keuangan</h3>
      <h4>22. Likuiditas</h4>
      <div class="form-group">
        <label for="kas">Kas dan Setara Kas</label><input type="text" name="kas" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->kas %>">
      </div>
      <div class="form-group">
        <label for="ar">Piutang</label><input type="text" name="ar" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->ar %>">
      </div>
      <div class="form-group">
        <label for="inv">Persediaan</label><input type="text" name="inv" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->inv %>">
      </div>
      <div class="form-group">
        <label for="ca">Hutang Lancar</label><input type="text" required name="ca" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->ca %>">
      </div>
      <div class="form-group">
        <label for="std">Hutang Jangka Pendek</label><input type="text" required name="std" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->std %>">
      </div>
      <h4>23. Solvabilitas</h4>
      <div class="form-group">
        <label for="ld">Tanah</label><input type="text" name="ld" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->ld %>">
      </div>
      <div class="form-group">
        <label for="bd">Bangunan</label><input type="text" name="bd" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->bd %>">
      </div>
      <div class="form-group">
        <label for="me">Mesin dan Peralatan</label><input type="text" name="me" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->me %>">
      </div>
      <div class="form-group">
        <label for="vc">Kendaraan</label><input type="text" name="vc" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->vc %>">
      </div>
      <div class="form-group">
        <label for="oa">Inventaris Lainnya</label><input type="text" name="oa" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->oa %>">
      </div>
      <div class="form-group">
        <label for="ltd">Hutang Jangka Panjang</label><input type="text" required name="ltd" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->ltd %>">
      </div>
      <h4>24. Profitabilitas</h4>
      <div class="form-group">
        <label for="sales">Total Penjualan</label><input type="text" name="sales" required class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->sales %>">
      </div>
      <div class="form-group">
        <label for="expense">Total Pengeluaran</label><input type="text" name="expense" class="form-control" placeholder="Contoh: 50000000" value="<% $kuesioner->expense %>">
      </div>
    </div>
    <div class="col-md-12"><button type="submit" class="btn btn-success btn-lg btn-block">Edit</button></div>
  <% Form::close() %>
</div>
@stop
