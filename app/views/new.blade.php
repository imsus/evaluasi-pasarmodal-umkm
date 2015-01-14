@extends('base')

@section('title')
<title>Kuesioner Baru</title>
@stop

@section('content')
<div class="container">
	<div class="row">
    <div class="col-md-10"><h1 class="page-header">Kuesioner Baru</h1></div>
    <div class="col-md-2"><a href="/kuesioner" class="btn btn-danger btn-block" style="margin: 55px 0px 0px 0px"><span class="glyphicon glyphicon-remove"></span> Batal</a></div>
  </div>
	<div class="row">
  	{{ Form::open(array('url' => 'kuesioner/new', 'role' => 'form' )) }}
  	<div class="col-md-4">
      <h3>Data Umum</h3>
    	<div class="form-group">
    		<label for="nama">1. Nama Perusahaan</label>
    		<input type="text" class="form-control" required name="nama" id="nama" placeholder="Contoh: Saung Ayam">
    	</div>
    	<div class="checkbox">
    		<label>
    			<input type="checkbox" name="go" value=""> Centang jika sudah Go Publik
    		</label>
    	</div>
    	<div class="form-group">
    		<label for="status1">2. Status Badan Usaha</label>
    		<select class="form-control" name="status1" id="status1">
    			<option value="PT">PT (Perseroan Terbatas)</option>
    			<option value="Koperasi">Koperasi</option>
    			<option value="Firma">Firma</option>
    			<option value="CV">CV (<i>Commanditaire Venootschaap</i>)</option>
    			<option value="Persero">Persero</option>
    			<option value="UD">UD (Usaha Dagang)</option>
    			<option value="Lainnya">Lainnya</option>
    		</select>
    	</div>
    	<div class="form-group">
    		<label for="tahun">3. Tahun Berdiri</label>
    		<input type="number" min="1914" max="2114" step="1" class="form-control" name="tahun" id="tahun" placeholder="Contoh: 2000">
    	</div>
    	<div class="form-group">
    		<label for="status2">4. Status</label>
    		<select class="form-control" name="status2" id="status2">
    			<option value="PMDN">PMDN (Penanaman Modal Dalam Negeri)</option>
    			<option value="JO">JO (Joint Operation)</option>
    			<option value="JV">JV (Joint Venture)</option>
    			<option value="JMA">JMA (Joint Merger Acquisition)</option>
    		</select>
    	</div>
    	<div class="form-group">
    		<label for="alamat">5. Alamat Perusahaan</label>
    		<textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Contoh: Jl. H.R. Rasuna Said Kav. C-22"></textarea>
    	</div>
    	<div class="form-group">
    		<label for="kota">6. Kota</label>
    		<input type="text" class="form-control" name="kota" id="kota" placeholder="Contoh: Kuningan, Jakarta Selatan">
    	</div>
    	<div class="form-group">
    		<h4>7. Kontak Perusahaan</h4>
    		<label for="telp">Telepon</label>
    		<input type="text" class="form-control" name="telp" id="telp" placeholder="Contoh: +622197648321">
    	</div>
    	<div class="form-group">
    		<label for="fax">Fax</label>
    		<input type="text" class="form-control" name="fax" id="fax" placeholder="Contoh: +622197648321">
    	</div>
    	<div class="form-group">
    		<label for="hp">Handphone</label>
    		<input type="text" class="form-control" name="hp" id="hp" placeholder="Contoh: +622197648321">
    	</div>
    	<div class="form-group">
    		<label for="web">8. Website</label>
    		<input type="url" class="form-control" name="web" id="web" placeholder="Contoh: http://google.com">
    	</div>
    	<div class="form-group">
    		<label for="pj">9. Penanggung Jawab</label>
    		<input type="text" class="form-control" name="pj" id="pj" placeholder="Contoh: Mas Budi">
    	</div>
    	<div class="form-group">
    		<label for="manager">10. Jumlah Manajer</label>
    		<input type="text" class="form-control" name="manager" id="manager" placeholder="Contoh: 4">
    	</div>
    	<div class="form-group">
    		<label for="karyawan">11. Jumlah Karyawan</label>
    		<input type="text" class="form-control" name="karyawan" id="karyawan" placeholder="Contoh: 10">
    	</div>
  	</div>
  	<div class="col-md-4">
      <h3>Aspek Manajerial</h3>
      <div class="form-group">
        <label for="surat">12. Kelengkapan Surat</label>
        <select class="form-control" name="surat" id="surat">
        	<option value="1">Tidak Ada</option>
        	<option value="2">Tidak Lengkap</option>
        	<option value="3">Kurang Lengkap</option>
        	<option value="4">Lengkap</option>
        	<option value="5">Sangat Lengkap</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tsurat">13. Tahun Terbit Surat</label>
        <input type="number" min="1914" max="2114" step="1" class="form-control" name="tsurat" id="tsurat" placeholder="Contoh: 1999">
      </div>
      <div class="form-group">
        <label>14. Apakah perusahaan ada / memiliki kelengkapan perijinan perusahaan?</label><br>
        <label class="checkbox-inline"><input type="checkbox" name="npwp" value="">NPWP</label>
        <label class="checkbox-inline"><input type="checkbox" name="siup" value="">SIUP</label>
        <label class="checkbox-inline"><input type="checkbox" name="iui" value="">IUI</label>
        <label class="checkbox-inline"><input type="checkbox" name="situ" value="">SITU</label>
      </div>
      <div class="form-group">
        <label for="sistem">15. Sistem Manajemen</label>
        <select class="form-control" name="sistem" id="sistem">
        	<option value="1">Tidak Memiliki</option>
        	<option value="2">Tidak Memiliki, Sedang Merencanakan</option>
        	<option value="3">Memiliki, Tidak Menerapkan</option>
        	<option value="4">Memiliki, Dijalankan Sebagian</option>
        	<option value="5">Memiliki, Dijalankan Semuanya</option>
        </select>
      </div>
      <div class="form-group">
        <label for="sertifikasi">16. Sertifikasi</label>
        <select class="form-control" name="sertifikasi" id="sertifikasi">
        	<option value="1">Tidak Memiliki</option>
        	<option value="2">Tidak Memiliki, Sedang Mengajukan</option>
        	<option value="3">Memiliki, Tidak Valid</option>
        	<option value="4">Memiliki, Suspended</option>
        	<option value="5">Memiliki, Valid</option>
        </select>
      </div>
      <div class="form-group">
        <label for="struktur">17. Struktur Perusahaan</label>
        <select class="form-control" name="struktur" id="struktur">
        	<option value="1">Tidak Ada</option>
        	<option value="2">Tidak Lengkap</option>
        	<option value="3">Kurang Lengkap</option>
        	<option value="4">Lengkap</option>
        	<option value="5">Sangat Lengkap</option>
        </select>
      </div>
      <div class="form-group">
        <label for="mutu">18. Manajemen Mutu</label>
        <select class="form-control" name="mutu" id="mutu">
        	<option value="1">Tidak Memiliki</option>
        	<option value="2">Tidak Memiliki, Sedang Mengajukan</option>
        	<option value="3">Memiliki, Tidak Valid</option>
        	<option value="4">Memiliki, Suspended</option>
        	<option value="5">Memiliki, Valid</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tugas">19. Uraian Tugas</label>
        <select class="form-control" name="tugas" id="tugas">
        	<option value="1">Tidak Ada</option>
        	<option value="2">Tidak Lengkap</option>
        	<option value="3">Kurang Lengkap</option>
        	<option value="4">Lengkap</option>
        	<option value="5">Sangat Lengkap</option>
        </select>
      </div>
      <div class="form-group">
        <h4>20. Berapa besar modal perusahaan /usaha anda?</h4>
        <label for="modala">Modal Awal</label><input type="text" required name="modala" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
        <label for="modals">Modal Sendiri</label><input type="text" required name="modals" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
        <label for="modall">Modal Luar</label><input type="text" required name="modall" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
        <label for="bank">21. Perbankan</label>
        <select class="form-control" name="bank" id="bank">
        	<option value="1">Tidak pernah mengajukan pinjaman</option>
        	<option value="2">Mengajukan Pinjaman, tapi tidak mendapat respon</option>
        	<option value="3">Mengajukan Pinjaman, dan dijanjikan memperoleh pinjaman</option>
        	<option value="4">Mengajukan Pinjaman, memperoleh pinjaman, jumlah tidak sesuai dengan yang diajukan</option>
        	<option value="5">Mengajukan Pinjaman, memperoleh pinjaman, jumlah sesuai dengan yang diajukan</option>
        </select>
      </div>
  	</div>
  	<div class="col-md-4">
      <h3>Aspek Keuangan</h3>
      <div class="form-group">
      	<h4>22. Likuiditas</h4>
      	<label for="kas">Kas dan Setara Kas</label><input type="text" name="kas" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="ar">Piutang</label><input type="text" name="ar" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="inv">Persediaan</label><input type="text" name="inv" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="ca">Hutang Lancar</label><input type="text" required name="ca" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="std">Hutang Jangka Pendek</label><input type="text" required name="std" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<h4>23. Solvabilitas</h4>
      	<label for="ld">Tanah</label><input type="text" name="ld" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="bd">Bangunan</label><input type="text" name="bd" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="me">Mesin dan Peralatan</label><input type="text" name="me" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="vc">Kendaraan</label><input type="text" name="vc" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="oa">Inventaris Lainnya</label><input type="text" name="oa" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="ltd">Hutang Jangka Panjang</label><input type="text" required name="ltd" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<h4>24. Profitabilitas</h4>
      	<label for="sales">Total Penjualan</label><input type="text" required name="sales" class="form-control" placeholder="Contoh: 50000000">
      </div>
      <div class="form-group">
      	<label for="expense">Total Pengeluaran</label><input type="text" name="expense" class="form-control" placeholder="Contoh: 50000000">
    	</div>
    </div>
		<div class="col-md-10"><button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button></div>
		<div class="col-md-2"><button type="reset" class="btn btn-danger btn-lg btn-block">Reset</button></div>
    {{ Form::close() }}
	</div>
</div>
@stop
