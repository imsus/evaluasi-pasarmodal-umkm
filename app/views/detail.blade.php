@extends('base')

@section('title')

@stop

@section('content')
<style>
	.page-navigation{
		margin-top: 55px;
	}
  .pager {
    margin: 55px 0 0 0;
  }
</style>
<div class="container">
	<div class="row">
		<div class="col-md-9"><h1 class="page-header">Detail Kuesioner <strong>#{{ $kuesioner->id }}</strong></h1></div>
    <div class="col-md-3">
      <div class="btn-group btn-group-justified page-navigation">
        <div class="btn-group"><a href="/kuesioner" type="button" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Balik</a></div>
        <div class="btn-group"><a href="/kuesioner/edit/{{ $kuesioner->id }}" type="button" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a></div>
        <div class="btn-group"><a href="/kuesioner/print/{{ $kuesioner->id }}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Print</a></div>
      </div>
    </div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Data Umum</h3></div>
				<div class="panel-body">
					<h4>Kontak Perusahaan</h4>
					<dl class="dl-horizontal">
						<dt>Nama Perusahaan :</dt><dd>{{ $kuesioner->nama }}</dd>
						<dt>Alamat Perusahaan :</dt><dd><address>{{ $kuesioner->alamat }}</address></dd>
						<dt>Kota :</dt><dd>{{ $kuesioner->kota }}</dd>
						<dt>Telepon :</dt><dd>{{ $kuesioner->telp }}</dd>
						<dt>Fax :</dt><dd>{{ $kuesioner->fax }}</dd>
						<dt>Handphone :</dt><dd>{{ $kuesioner->hp }}</dd>
						<dt>Website :</dt><dd><a href="{{ $kuesioner->web }}">{{ $kuesioner->web }}</a></dd>
					</dl>
					<h4>Status Perusahaan</h4>
					<dl class="dl-horizontal">
						<dt>Tahun Berdiri :</dt><dd>{{ $kuesioner->tahun }}</dd>
						<dt>Status Badan Usaha :</dt><dd>
							@if ( $kuesioner->status1  === 'PT') PT (Perseroan Terbatas)
							@elseif ( $kuesioner->status1  === 'Koperasi') Koperasi
							@elseif ( $kuesioner->status1  === 'Firma')	Firma
							@elseif ( $kuesioner->status1  === 'CV') CV (Commanditaire Venoostchaap)
							@elseif ( $kuesioner->status1  === 'Persero') Persero
							@elseif ( $kuesioner->status1  === 'UD') UD (Usaha Dagang)
							@elseif ( $kuesioner->status1  === 'Lainnya') Lainnya
							@endif

							@if ( $kuesioner->go ) <span class="label label-success">Sudah Go Publik</span>
							@else <span class="label label-danger">Belum Go Publik</span>
							@endif
						</dd>
						<dt>Status Pemodalan:</dt><dd>
							@if ( $kuesioner->status2 === 'PMDN' ) PMDN (Penanaman Modal Dalam Negeri)
							@elseif ( $kuesioner->status2 === 'JO' ) JO (Joint Operation)
							@elseif ( $kuesioner->status2 === 'JV' ) JV (Joint Venture)
							@elseif ( $kuesioner->status2 === 'JMA' ) JMA (Joint Merger Acquisition)
							@endif
						</dd>
						<dt>Penanggung Jawab :</dt><dd>{{ $kuesioner->pj }}</dd>
						<dt>Jumlah Manajer :</dt><dd>{{ $kuesioner->manager }}</dd>
						<dt>Jumlah Karyawan :</dt><dd>{{ $kuesioner->karyawan }}</dd>
					</dl>
				</div>
			</div>
		</div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><h3>Aspek Keuangan</h3></div>
        <div class="panel-body">
          <h4>Likuiditas <span class="label @if ($kuesioner->liq >=2) label-success @else label-danger @endif">{{ round($kuesioner->liq,2) }}</span></h4>
          <dl class="dl-horizontal">
            <dt>Kas dan Setara Kas :</dt><dd>{{ 'Rp ' . number_format($kuesioner->kas, 0, ',', '.') }}</dd>
            <dt>Piutang :</dt><dd>{{ 'Rp ' . number_format($kuesioner->ar, 0, ',', '.') }}</dd>
            <dt>Persediaan :</dt><dd>{{ 'Rp ' . number_format($kuesioner->inv, 0, ',', '.') }}</dd>
            <dt>Hutang Lancar :</dt><dd>{{ 'Rp ' . number_format($kuesioner->ca, 0, ',', '.') }}</dd>
            <dt>Hutang Jangka Pendek :</dt><dd>{{ 'Rp ' . number_format($kuesioner->std, 0, ',', '.') }}</dd>
          </dl>
          <h4>Solvabilitas <span class="label @if ($kuesioner->sol >=2) label-success @else label-danger @endif">{{ round($kuesioner->sol,2) }}</span></h4>
          <dl class="dl-horizontal">
            <dt>Tanah :</dt><dd>{{ 'Rp ' . number_format($kuesioner->ld, 0, ',', '.') }}</dd>
            <dt>Bangunan :</dt><dd>{{ 'Rp ' . number_format($kuesioner->bd, 0, ',', '.') }}</dd>
            <dt>Mesin dan Peralatan :</dt><dd>{{ 'Rp ' . number_format($kuesioner->me, 0, ',', '.') }}</dd>
            <dt>Kendaraan :</dt><dd>{{ 'Rp ' . number_format($kuesioner->vc, 0, ',', '.') }}</dd>
            <dt>Inventaris Lainnya :</dt><dd>{{ 'Rp ' . number_format($kuesioner->oa, 0, ',', '.') }}</dd>
            <dt>Hutang Jangka Panjang :</dt><dd>{{ 'Rp ' . number_format($kuesioner->ltd, 0, ',', '.') }}</dd>
          </dl>
          <h4>Profitabilitas <span class="label @if ($kuesioner->prf >=2) label-success @else label-danger @endif">{{ round($kuesioner->prf,2) }}</span></h4>
          <dl class="dl-horizontal">
            <dt>Total Penjualan :</dt><dd>{{ 'Rp ' . number_format($kuesioner->sales, 0, ',', '.') }}</dd>
            <dt>Total Pengeluaran :</dt><dd>{{ 'Rp ' . number_format($kuesioner->expense, 0, ',', '.') }}</dd>
          </dl>
        </div>
      </div>
    </div>
	</div>
	<div class="row">
		<div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><h3>Aspek Manajerial</h3></div>
        <div class="panel-body">
          <h4>Surat</h4>
          <dl class="dl-horizontal">
            <dt>Kelengkapan Surat :</dt><dd>
               @if ( $kuesioner->surat === 1 ) Tidak Ada
               @elseif ( $kuesioner->surat === 2 ) Tidak Lengkap
               @elseif ( $kuesioner->surat === 3 ) Kurang Lengkap
               @elseif ( $kuesioner->surat === 4 ) Lengkap
               @elseif ( $kuesioner->surat === 5 ) Sangat Lengkap
               @endif
              <span class="badge">{{ $kuesioner->surat }}</span>
            </dd>
            <dt>Tahun Terbit Surat :</dt><dd>{{ $kuesioner->tsurat }}</dd>
            <dt>NPWP :</dt><dd>
              @if ( $kuesioner->npwp ) Ada
              @else Tidak Ada
              @endif
            </dd>
            <dt>SIUP :</dt><dd>
              @if ( $kuesioner->siup ) Ada
              @else Tidak Ada
              @endif
            </dd>
            <dt>IUI :</dt><dd>
              @if ( $kuesioner->iui ) Ada
              @else Tidak Ada
              @endif
            </dd>
            <dt>SITU :</dt><dd>
              @if ( $kuesioner->situ ) Ada
              @else Tidak Ada
              @endif
            </dd>
          </dl>
          <h4>Sistem</h4>
          <dl class="dl-horizontal">
            <dt>Sistem Manajemen :</dt><dd>
              @if ( $kuesioner->sistem === 1 ) Tidak Memiliki
              @elseif ( $kuesioner->sistem === 2 ) Tidak Memiliki, Sedang Merencanakan
              @elseif ( $kuesioner->sistem === 3 ) Memiliki, Tidak Diterapkan
              @elseif ( $kuesioner->sistem === 4 ) Memiliki, Dijalankan Sebagian
              @elseif ( $kuesioner->sistem === 5 ) Memiliki, Dijalankan Semuanya
              @endif
              <span class="badge">{{ $kuesioner->sistem }}</span></dd>
            <dt>Sertifikasi :</dt><dd>
              @if ( $kuesioner->sertifikasi === 1 ) Tidak Memiliki
              @elseif ( $kuesioner->sertifikasi === 2 ) Tidak Memiliki, Sedang Mengajukan
              @elseif ( $kuesioner->sertifikasi === 3 ) Memiliki, Tidak Valid
              @elseif ( $kuesioner->sertifikasi === 4 ) Memiliki, Suspended
              @elseif ( $kuesioner->sertifikasi === 5 ) Memiliki, Valid
              @endif
              <span class="badge">{{ $kuesioner->sertifikasi }}</span></dd>
            <dt>Struktur Perusahaan :</dt><dd>
              @if ( $kuesioner->struktur === 1 ) Tidak Ada
              @elseif ( $kuesioner->struktur === 2 ) Tidak Lengkap
              @elseif ( $kuesioner->struktur === 3 ) Kurang Lengkap
              @elseif ( $kuesioner->struktur === 4 ) Lengkap
              @elseif ( $kuesioner->struktur === 5 ) Sangat Lengkap
              @endif
              <span class="badge">{{ $kuesioner->struktur }}</span></dd>
            <dt>Manajemen Mutu :</dt><dd>
              @if ( $kuesioner->mutu === 1 ) Tidak Memiliki
              @elseif ( $kuesioner->mutu === 2 ) Tidak Memiliki, Sedang Mengajukan
              @elseif ( $kuesioner->mutu === 3 ) Memiliki, Tidak Valid
              @elseif ( $kuesioner->mutu === 4 ) Memiliki, Suspended
              @elseif ( $kuesioner->mutu === 5 ) Memiliki, Valid
              @endif
              <span class="badge">{{ $kuesioner->mutu }}</span></dd>
            <dt>Uraian Tugas :</dt><dd>
              @if ( $kuesioner->tugas === 1 ) Tidak Ada
              @elseif ( $kuesioner->tugas === 2 ) Tidak Lengkap
              @elseif ( $kuesioner->tugas === 3 ) Kurang Lengkap
              @elseif ( $kuesioner->tugas === 4 ) Lengkap
              @elseif ( $kuesioner->tugas === 5 ) Sangat Lengkap
              @endif
              <span class="badge">{{ $kuesioner->tugas }}</span></dd>
          </dl>
          <h4>Modal</h4>
          <dl class="dl-horizontal">
            <dt>Modal Awal :</dt><dd>{{ 'Rp ' . number_format($kuesioner->modala, 0, ',', '.') }}</dd>
            <dt>Modal Sendiri :</dt><dd>{{ 'Rp ' . number_format($kuesioner->modals, 0, ',', '.') }}</dd>
            <dt>Modal Luar :</dt><dd>{{ 'Rp ' . number_format($kuesioner->modall, 0, ',', '.') }}</dd>
            <dt>Perimbangan Modal :</dt><dd>
              @if ( $kuesioner->pmodal === 1 ) 76% - 100% Modal Luar
              @elseif ( $kuesioner->pmodal === 2 ) 51% - 75% Modal Luar
              @elseif ( $kuesioner->pmodal === 3 ) 26% - 50% Modal Luar
              @elseif ( $kuesioner->pmodal === 4 ) 16% - 25% Modal Luar
              @elseif ( $kuesioner->pmodal === 5 ) 0 - 15% Modal Luar
              @endif
              <span class="badge">{{ $kuesioner->pmodal }}</span></dd>
            <dt>Perbankan :</dt><dd>
              @if ( $kuesioner->bank === 1 ) Tidak pernah mengajukan pinjaman
              @elseif ( $kuesioner->bank === 2 ) Mengajukan pinjaman, tidak mendapat respon
              @elseif ( $kuesioner->bank === 3 ) Mengajukan pinjaman dan dijanjikan memperoleh pinjaman
              @elseif ( $kuesioner->bank === 4 ) Mengajukan pinjaman, memperoleh pinjaman, jumlah tidak sesuai dengan yang diajukan
              @elseif ( $kuesioner->bank === 5 ) Mengajukan pinjaman, memperoleh pinjaman, jumlah sesuai dengan yang diajukan
              @endif
              <span class="badge">{{ $kuesioner->bank }}</span></dd>
            <dt>Laba Rupiah :</dt><dd>
              @if ( $kuesioner->laba === 1 ) < 10 Juta
              @elseif ( $kuesioner->laba === 2 ) 10-20 Juta
              @elseif ( $kuesioner->laba === 3 ) 20-50 Juta
              @elseif ( $kuesioner->laba === 4 ) 50-100 Juta
              @elseif ( $kuesioner->laba === 5 ) > 100 Juta
              @endif
              <span class="badge">{{ $kuesioner->laba }}</span></dd>
            <dt>Laba Persen :</dt><dd>
              @if ( $kuesioner->plaba === 1 ) < 5%
              @elseif ( $kuesioner->plaba === 2 ) 5-10%
              @elseif ( $kuesioner->plaba === 3 ) 10-15%
              @elseif ( $kuesioner->plaba === 4 ) 15-25%
              @elseif ( $kuesioner->plaba === 5 ) > 25%
              @endif
              <span class="badge">{{ $kuesioner->plaba }}</span></dd>
          </dl>
        </div>
      </div>
    </div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Hasil Kuesioner</h3></div>
				<div class="panel-body">
					<h4>Keputusan</h4>
					<p>{{ $kuesioner->kepakh }}</p>
					<h4>Saran</h4>
					<p><blockquote>{{ $kuesioner->saran }}</blockquote></p>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
