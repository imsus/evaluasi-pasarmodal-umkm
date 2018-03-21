@extends('layouts.master')

@section('content')
@php
  function progressClass($progress)
  {
      if ($progress <= .33) {
          return 'progress-bar-danger';
      } elseif ($progress <= .67) {
          return 'progress-bar-warning';
      } elseif ($progress <= 1) {
          return 'progress-bar-success';
      }
  }

  function labelClass($score)
  {
      if ($score <= 1) {
          return 'label-danger';
      } elseif ($score <= 3) {
          return 'label-warning';
      } elseif ($score <= 5) {
          return 'label-success';
      }
  }
@endphp

<style>
	.page-navigation{
		margin-top: 55px;
	}
	.pager {
		margin: 55px 0 0 0;
	}
</style>
<div class="container mt-5">
	<div class="row flex align-items-center mb-4">
		<div class="col-md-8"><h1 class="mb-0">Detail Kuesioner <strong>#{{ $questionnaire->id }}</strong></h1></div>
		<div class="col-md-4 hidden-print text-right">
			<div class="btn-group btn-group-justified">
        <a href="{{ route('questionnaire.index') }}" class="btn btn-light flex align-items-center justify-content-center">
          <span class="fal fa-home"></span>
          <span class="ml-2">Kembali</span>
        </a>
        <a href="{{ route('questionnaire.edit', $questionnaire->id) }}" class="btn btn-light flex align-items-center justify-content-center">
          <span class="fal fa-pen"></span>
          <span class="ml-2">Edit</span>
        </a>
        <a href="{{ route('questionnaire.print', $questionnaire->id) }}" class="btn btn-light flex align-items-center justify-content-center">
          <span class="fal fa-print"></span>
          <span class="ml-2">Print</span>
        </a>
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
						<dt>Nama UKM</dt><dd>{{ $questionnaire->kontak_nama }} &ensp;  @if ( $questionnaire->kontak_gopublik ) <span class="label label-success">Sudah Go Publik</span> @else <span class="label label-danger">Belum Go Publik</span> @endif</dd>
						<dt>Alamat Kantor/Pabrik</dt><dd>{{ $questionnaire->kontak_alamat }}</dd>
						<dt>Kota, Provinsi</dt><dd>{{ $questionnaire->kontak_kota }}</dd>
						<dt>No. Telepon</dt><dd>{{ $questionnaire->kontak_telepon }}</dd>
						<dt>No. Fax</dt><dd>{{ $questionnaire->kontak_fax }}</dd>
						<dt>No. Handphone</dt><dd>{{ $questionnaire->kontak_handphone }}</dd>
						<dt>Alamat Website</dt><dd><a href="{{ $questionnaire->kontak_website }}" target="_blank">{{ $questionnaire->kontak_website }}</a></dd>
					</dl>
					<h4>Status Perusahaan</h4>
					<dl class="dl-horizontal">
						<dt>Tahun Berdiri</dt><dd>{{ $questionnaire->status_tahun }}</dd>
						<dt>Status Usaha</dt><dd>{{ App\Questionnaire::$status_usaha_option[$questionnaire->status_usaha] }}</dd>
						<dt>Status Pemodalan</dt><dd>{{ App\Questionnaire::$status_pemodalan_option[$questionnaire->status_pemodalan] }}</dd>
						<dt>Penanggung Jawab</dt><dd>{{ $questionnaire->status_pj }}</dd>
						<dt>Jumlah Manajer</dt><dd>{{ $questionnaire->status_manajer }}</dd>
						<dt>Jumlah Karyawan</dt><dd>{{ $questionnaire->status_karyawan }}</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek Manajerial <small>{{ $questionnaire->saran_manajerial_score }}/105</small></h3></div>
				<div class="panel-body">
					<h4>Dokumen Legalitas Perusahaan</h4>
					<dl class="dl-horizontal">
						<dt>Akte Pendirian</dt><dd>{{ App\Questionnaire::$dokumen_akte_option[$questionnaire->dokumen_akte] }}</dd>
						<dt>Tahun Terbit Surat</dt><dd>{{ $questionnaire->dokumen_tahun }}</dd>
						<dt>NPWP</dt><dd>@if ($questionnaire->dokumen_npwp) Ada @else Tidak Ada @endif</dd>
						<dt>SIUP</dt><dd>@if ($questionnaire->dokumen_siup) Ada @else Tidak Ada @endif</dd>
						<dt>TDP</dt><dd>@if ($questionnaire->dokumen_tdp) Ada @else Tidak Ada @endif</dd>
						<dt>IUI</dt><dd>@if ($questionnaire->dokumen_iui) Ada @else Tidak Ada @endif</dd>
						<dt>SITU</dt><dd>@if ($questionnaire->dokumen_situ) Ada @else Tidak Ada @endif</dd>
						<dt>Skor</dt><dd><span class="label {{ labelClass(array_sum(array($questionnaire->dokumen_npwp, $questionnaire->dokumen_siup, $questionnaire->dokumen_tdp, $questionnaire->dokumen_iui, $questionnaire->dokumen_situ))) }}">{{ array_sum(array($questionnaire->dokumen_npwp, $questionnaire->dokumen_siup, $questionnaire->dokumen_tdp, $questionnaire->dokumen_iui, $questionnaire->dokumen_situ)) }}</span></dd>
					</dl>
					<h4>Sistem Manajemen</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Punya Sistem Manajemen">Punya Sistem Manajemen</dt><dd>{{ App\Questionnaire::$sm_punya_option[$questionnaire->sm_punya] }} &ensp; <span class="label {{ labelClass($questionnaire->sm_punya) }}">{{ $questionnaire->sm_punya }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Sistem Manajemen Tersertifikasi">Sistem Manajemen Tersertifikasi</dt><dd>{{ App\Questionnaire::$sm_sertifikasi_option[$questionnaire->sm_sertifikasi] }} &ensp; <span class="label {{ labelClass($questionnaire->sm_sertifikasi) }}">{{ $questionnaire->sm_sertifikasi }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Punya Struktur Organisasi">Punya Struktur Organisasi</dt><dd>{{ App\Questionnaire::$sm_so_option[$questionnaire->sm_so] }} &ensp; <span class="label {{ labelClass($questionnaire->sm_so) }}">{{ $questionnaire->sm_so }}</span></dd>
						<dt>Job Description Jelas</dt><dd>{{ App\Questionnaire::$sm_jobdesc_option[$questionnaire->sm_jobdesc] }} &ensp; <span class="label {{ labelClass($questionnaire->sm_jobdesc) }}">{{ $questionnaire->sm_jobdesc }}</span></dd>
						<dt>Punya SOP</dt><dd>{{ App\Questionnaire::$sm_sop_option[$questionnaire->sm_sop] }} &ensp; <span class="label {{ labelClass($questionnaire->sm_sop) }}">{{ $questionnaire->sm_sop }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Punya Sistem Pengarsipan">Punya Sistem Pengarsipan</dt><dd>{{ App\Questionnaire::$sm_arsip_option[$questionnaire->sm_arsip] }} &ensp; <span class="label {{ labelClass($questionnaire->sm_arsip) }}">{{ $questionnaire->sm_arsip }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Melakukan Internal Audit Berkala">Melakukan Internal Audit Berkala</dt><dd>{{ App\Questionnaire::$sm_audit_option[$questionnaire->sm_audit] }} &ensp; <span class="label {{ labelClass($questionnaire->sm_audit) }}">{{ $questionnaire->sm_audit }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Menerapkan Total Quality Control">Menerapkan Total Quality Control</dt><dd>{{ App\Questionnaire::$sm_tqc_option[$questionnaire->sm_tqc] }} &ensp; <span class="label {{ labelClass($questionnaire->sm_tqc) }}">{{ $questionnaire->sm_tqc }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Memerhatikan Kepuasan Pelanggan">Memerhatikan Kepuasan Pelanggan</dt><dd>{{ App\Questionnaire::$sm_satisfaction_option[$questionnaire->sm_satisfaction] }} &ensp; <span class="label {{ labelClass($questionnaire->sm_satisfaction) }}">{{ $questionnaire->sm_satisfaction }}</span></dd>
					</dl>
					<h4>Kelengkapan Sarana dan Prasarana</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Luas Bangunan Kantor">Luas Bangunan Kantor</dt><dd>{{ App\Questionnaire::$sarana_luas_kantor_option[$questionnaire->sarana_luas_kantor] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_luas_kantor) }}">{{ $questionnaire->sarana_luas_kantor }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Kondisi Bangunan Kantor">Kondisi Bangunan Kantor</dt><dd>{{ App\Questionnaire::$sarana_kondisi_kantor_option[$questionnaire->sarana_kondisi_kantor] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_kondisi_kantor) }}">{{ $questionnaire->sarana_kondisi_kantor }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Perkiraan Nilai Kantor">Perkiraan Nilai Kantor</dt><dd>{{ App\Questionnaire::$sarana_nilai_kantor_option[$questionnaire->sarana_nilai_kantor] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_nilai_kantor) }}">{{ $questionnaire->sarana_nilai_kantor }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Luas Bangunan Gudang">Luas Bangunan Gudang</dt><dd>{{ App\Questionnaire::$sarana_luas_gudang_option[$questionnaire->sarana_luas_gudang] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_luas_gudang) }}">{{ $questionnaire->sarana_luas_gudang }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Kondisi Bangunan Gudang">Kondisi Bangunan Gudang</dt><dd>{{ App\Questionnaire::$sarana_kondisi_gudang_option[$questionnaire->sarana_kondisi_gudang] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_kondisi_gudang) }}">{{ $questionnaire->sarana_kondisi_gudang }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Perkiraan Nilai Gudang">Perkiraan Nilai Gudang</dt><dd>{{ App\Questionnaire::$sarana_nilai_gudang_option[$questionnaire->sarana_nilai_gudang] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_nilai_gudang) }}">{{ $questionnaire->sarana_nilai_gudang }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Jumlah Mobil Pribadi/Perusahaan">Jumlah Mobil Pribadi/Perusahaan</dt><dd>{{ App\Questionnaire::$sarana_jumlah_mobil_option[$questionnaire->sarana_jumlah_mobil] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_jumlah_mobil) }}">{{ $questionnaire->sarana_jumlah_mobil }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Nilai Pasar Mobil Pribadi/Perusahaan">Nilai Pasar Mobil Pribadi/Perusahaan</dt><dd>{{ App\Questionnaire::$sarana_nilai_mobil_option[$questionnaire->sarana_nilai_mobil] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_nilai_mobil) }}">{{ $questionnaire->sarana_nilai_mobil }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Jumlah Mobil Angkutan/Pickup">Jumlah Mobil Angkutan/Pickup</dt><dd>{{ App\Questionnaire::$sarana_jumlah_angkutan_option[$questionnaire->sarana_jumlah_angkutan] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_jumlah_angkutan) }}">{{ $questionnaire->sarana_jumlah_angkutan }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Nilai Pasar Mobil Angkutan/Pickup">Nilai Pasar Mobil Angkutan/Pickup</dt><dd>{{ App\Questionnaire::$sarana_nilai_angkutan_option[$questionnaire->sarana_nilai_angkutan] }} &ensp; <span class="label {{ labelClass($questionnaire->sarana_nilai_angkutan) }}">{{ $questionnaire->sarana_nilai_angkutan }}</span></dd>
					</dl>
					<h4>Potensi Perluasan</h4>
					<dl class="dl-horizontal">
						<dt>Rencana Perluasan</dt><dd>{{ App\Questionnaire::$potensi_perluasan_option[$questionnaire->potensi_perluasan] }} &ensp; <span class="label {{ labelClass($questionnaire->potensi_perluasan) }}">{{ $questionnaire->potensi_perluasan }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek Mesin dan Produksi <small>{{ $questionnaire->saran_mesin_score }}/55</small></h3></div>
				<div class="panel-body">
					<h4>Efisiensi dan Efektivitas</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Memenuhi Standar">Memenuhi Standar</dt><dd>{{ App\Questionnaire::$efisiensi_standar_option[$questionnaire->efisiensi_standar] }} &ensp; <span class="label {{ labelClass($questionnaire->efisiensi_standar) }}">{{ $questionnaire->efisiensi_standar }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Efisiensi Jumlah Mesin">Efisiensi Jumlah Mesin</dt><dd>{{ App\Questionnaire::$efisiensi_jumlah_option[$questionnaire->efisiensi_jumlah] }} &ensp; <span class="label {{ labelClass($questionnaire->efisiensi_jumlah) }}">{{ $questionnaire->efisiensi_jumlah }}</span></dd>
						<dt>Kapasitas Mesin</dt><dd>{{ App\Questionnaire::$efisiensi_kapasitas_option[$questionnaire->efisiensi_kapasitas] }} &ensp; <span class="label {{ labelClass($questionnaire->efisiensi_kapasitas) }}">{{ $questionnaire->efisiensi_kapasitas }}</span></dd>
						<dt>Usia Mesin</dt><dd>{{ App\Questionnaire::$efisiensi_umur_option[$questionnaire->efisiensi_umur] }} &ensp; <span class="label {{ labelClass($questionnaire->efisiensi_umur) }}">{{ $questionnaire->efisiensi_umur }}</span></dd>
						<dt>Perawatan Mesin</dt><dd>{{ App\Questionnaire::$efisiensi_perawatan_option[$questionnaire->efisiensi_perawatan] }} &ensp; <span class="label {{ labelClass($questionnaire->efisiensi_perawatan) }}">{{ $questionnaire->efisiensi_perawatan }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Nilai Efisiensi Produksi">Nilai Efisiensi Produksi</dt><dd>{{ App\Questionnaire::$efisiensi_rendemen_option[$questionnaire->efisiensi_rendemen] }} &ensp; <span class="label {{ labelClass($questionnaire->efisiensi_rendemen) }}">{{ $questionnaire->efisiensi_rendemen }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Varian Produk">Varian Produk</dt><dd>{{ App\Questionnaire::$efisiensi_variasi_option[$questionnaire->efisiensi_variasi] }} &ensp; <span class="label {{ labelClass($questionnaire->efisiensi_variasi) }}">{{ $questionnaire->efisiensi_variasi }}</span></dd>
					</dl>
					<h4>Kebutuhan Energi</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Kapasitas Penggunaan Listrik PLN">Kapasitas Penggunaan Listrik PLN</dt><dd>{{ App\Questionnaire::$energi_pln_option[$questionnaire->energi_pln] }} &ensp; <span class="label {{ labelClass($questionnaire->energi_pln) }}">{{ $questionnaire->energi_pln }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Kapasitas Penggunaan Listrik Genset">Kapasitas Penggunaan Listrik Genset</dt><dd>{{ App\Questionnaire::$energi_genset_option[$questionnaire->energi_genset] }} &ensp; <span class="label {{ labelClass($questionnaire->energi_genset) }}">{{ $questionnaire->energi_genset }}</span></dd>
					</dl>
					<h4>Penggunaan Energi Alternatif</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Penggunaan Energi Alternatif">Penggunaan Energi Alternatif</dt><dd>{{ App\Questionnaire::$alternatif_energi_option[$questionnaire->alternatif_energi] }} &ensp; <span class="label {{ labelClass($questionnaire->alternatif_energi) }}">{{ $questionnaire->alternatif_energi }}</span></dd>
					</dl>
					<h4>Inovasi Produk dan Proses Produksi</h4>
					<dl class="dl-horizontal">
						<dt>Inovasi Produk</dt><dd>{{ App\Questionnaire::$inovasi_produk_option[$questionnaire->inovasi_produk] }} &ensp; <span class="label {{ labelClass($questionnaire->inovasi_produk) }}">{{ $questionnaire->inovasi_produk }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek Keuangan <small>{{ $questionnaire->saran_keuangan_score }}/60</small></h3></div>
				<div class="panel-body">
					<h4>Data Keuangan</h4>
					<dl class="dl-horizontal">
						<dt>Kas</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_kas, 2, ',', '.') }}</dd>
						<dt>Piutang</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_piutang, 2, ',', '.') }}</dd>
						<dt>Persediaan</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_persediaan, 2, ',', '.') }}</dd>
						<dt>Hutang Lancar</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_hutang_lancar, 2, ',', '.') }}</dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Hutang Jangka Pendek">Hutang Jangka Pendek</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_hutang_pendek, 2, ',', '.') }}</dd>
						<dt>Tanah</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_tanah, 2, ',', '.') }}</dd>
						<dt>Bangunan</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_bangunan, 2, ',', '.') }}</dd>
						<dt>Mesin</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_mesin, 2, ',', '.') }}</dd>
						<dt>Kendaraan</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_kendaraan, 2, ',', '.') }}</dd>
						<dt>Inventaris Lainnya</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_inventaris, 2, ',', '.') }}</dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Hutang Jangka Panjang">Hutang Jangka Panjang</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_hutang_panjang, 2, ',', '.') }}</dd>
						<dt>Total Penjualan</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_total_penjualan, 2, ',', '.') }}</dd>
						<dt>Total Pengeluaran</dt><dd>{{ 'Rp' . number_format($questionnaire->rasio_total_pengeluaran, 2, ',', '.') }}</dd>
						<dt>Laba Usaha</dt><dd>{{ 'Rp' . number_format($questionnaire->laba_usaha, 2, ',', '.') }} &ensp; <span class="label {{ labelClass($questionnaire->laba_usaha_score) }}">{{ $questionnaire->laba_usaha_score }}</span></dd>
						<dt>Modal Awal</dt><dd>{{ 'Rp' . number_format($questionnaire->modal_awal, 2, ',', '.') }} &ensp; <span class="label {{ labelClass($questionnaire->modal_awal_score) }}">{{ $questionnaire->modal_awal_score }}</span></dd>
						<dt>Modal Sendiri Saat Ini</dt><dd>{{ 'Rp' . number_format($questionnaire->modal_sendiri, 2, ',', '.') }} &ensp; <span class="label {{ labelClass($questionnaire->modal_sendiri_score) }}">{{ $questionnaire->modal_sendiri_score }}</span></dd>
						<dt>Modal Luar Saat Ini</dt><dd>{{ 'Rp' . number_format($questionnaire->modal_luar, 2, ',', '.') }} &ensp; <span class="label {{ labelClass($questionnaire->modal_luar_score) }}">{{ $questionnaire->modal_luar_score }}</span></dd>
						<dt>Perimbangan Modal</dt><dd>{{ $questionnaire->modal_perimbangan }} &ensp; <span class="label {{ labelClass($questionnaire->modal_perimbangan_score) }}">{{ $questionnaire->modal_perimbangan_score }}</span></dd>
					</dl>
					<h4>Analisa Aspek Rasio Keuangan</h4>
					<dl class="dl-horizontal">
						<dt>Rasio Likuiditas</dt><dd>{{ $questionnaire->rasio_likuiditas }} &ensp; <span class="label {{ labelClass($questionnaire->rasio_likuiditas_score) }}">{{ $questionnaire->rasio_likuiditas_score }}</span></dd>
						<dt>Rasio Solvabilitas</dt><dd>{{ $questionnaire->rasio_solvabilitas }} &ensp; <span class="label {{ labelClass($questionnaire->rasio_solvabilitas_score) }}">{{ $questionnaire->rasio_solvabilitas_score }}</span></dd>
						<dt>Rasio Profitabilitas</dt><dd>{{ $questionnaire->rasio_profitabilitas }} &ensp; <span class="label {{ labelClass($questionnaire->rasio_profitabilitas_score) }}">{{ $questionnaire->rasio_profitabilitas_score }}</span></dd>
					</dl>
					<h4>Hubungan dengan Perbankan</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Hubungan dengan Perbankan">Hubungan dengan Perbankan</dt><dd>{{ App\Questionnaire::$hubungan_pinjaman_option[$questionnaire->hubungan_pinjaman] }} &ensp; <span class="label {{ labelClass($questionnaire->hubungan_pinjaman) }}">{{ $questionnaire->hubungan_pinjaman }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Jumlah Ajuan Pinjaman">Jumlah Ajuan Pinjaman</dt><dd>{{ App\Questionnaire::$hubungan_frekuensi_option[$questionnaire->hubungan_frekuensi] }} &ensp; <span class="label {{ labelClass($questionnaire->hubungan_frekuensi) }}">{{ $questionnaire->hubungan_frekuensi }}</span></dd>
						<dt>Kendala Internal</dt><dd>{{ App\Questionnaire::$hubungan_internal_option[$questionnaire->hubungan_internal] }} &ensp; <span class="label {{ labelClass($questionnaire->hubungan_internal) }}">{{ $questionnaire->hubungan_internal }}</span></dd>
						<dt>Kendala Eksternal</dt><dd>{{ App\Questionnaire::$hubungan_eksternal_option[$questionnaire->hubungan_eksternal] }} &ensp; <span class="label {{ labelClass($questionnaire->hubungan_eksternal) }}">{{ $questionnaire->hubungan_eksternal }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek SDM <small>{{ $questionnaire->saran_sdm_score }}/30</small></h3></div>
				<div class="panel-body">
					<h4>Pemenuhan Tenaga Kerja</h4>
					<dl class="dl-horizontal">
						<dt>Jumlah Tenaga Kerja</dt><dd>{{ App\Questionnaire::$tk_jumlah_option[$questionnaire->tk_jumlah] }} &ensp; <span class="label {{ labelClass($questionnaire->tk_jumlah) }}">{{ $questionnaire->tk_jumlah }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Kompetensi Tenaga Kerja">Kompetensi Tenaga Kerja</dt><dd>{{ App\Questionnaire::$tk_kompetisi_option[$questionnaire->tk_kompetisi] }} &ensp; <span class="label {{ labelClass($questionnaire->tk_kompetisi) }}">{{ $questionnaire->tk_kompetisi }}</span></dd>
					</dl>
					<h4>Produktivitas Kerja</h4>
					<dl class="dl-horizontal">
						<dt>Lama Jam Kerja</dt><dd>{{ App\Questionnaire::$produktif_jam_option[$questionnaire->produktif_jam] }} &ensp; <span class="label {{ labelClass($questionnaire->produktif_jam) }}">{{ $questionnaire->produktif_jam }}</span></dd>
						<dt>Jumlah Shift</dt><dd>{{ App\Questionnaire::$produktif_shift_option[$questionnaire->produktif_shift] }} &ensp; <span class="label {{ labelClass($questionnaire->produktif_shift) }}">{{ $questionnaire->produktif_shift }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Standar Upah Tenaga Kerja">Standar Upah Tenaga Kerja</dt><dd>{{ App\Questionnaire::$produktif_upah_option[$questionnaire->produktif_upah] }} &ensp; <span class="label {{ labelClass($questionnaire->produktif_upah) }}">{{ $questionnaire->produktif_upah }}</span></dd>
					</dl>
					<h4>Fasilitas untuk Tenaga Kerja</h4>
					<dl class="dl-horizontal">
						<dt>Fasilitas Tenaga Kerja</dt><dd>{{ App\Questionnaire::$fasilitas_tk_option[$questionnaire->fasilitas_tk] }} &ensp; <span class="label {{ labelClass($questionnaire->fasilitas_tk) }}">{{ $questionnaire->fasilitas_tk }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek Pemasaran <small>{{ $questionnaire->saran_marketing_score }}/40</small></h3></div>
				<div class="panel-body">
					<h4>Strategi Pemasaran</h4>
					<dl class="dl-horizontal">
						<dt>Strategi Pemasaran</dt><dd>{{ App\Questionnaire::$marketing_strategy_option[$questionnaire->marketing_strategy] }} &ensp; <span class="label {{ labelClass($questionnaire->marketing_strategy) }}">{{ $questionnaire->marketing_strategy }}</span></dd>
					</dl>
					<h4>Bauran Pemasaran</h4>
					<dl class="dl-horizontal">
						<dt>Jumlah Varian Produk</dt><dd>{{ App\Questionnaire::$mix_product_option[$questionnaire->mix_product] }} &ensp; <span class="label {{ labelClass($questionnaire->mix_product) }}">{{ $questionnaire->mix_product }}</span></dd>
						<dt>Penerapan Harga</dt><dd>{{ App\Questionnaire::$mix_price_option[$questionnaire->mix_price] }} &ensp; <span class="label {{ labelClass($questionnaire->mix_price) }}">{{ $questionnaire->mix_price }}</span></dd>
						<dt>Saluran Distribusi</dt><dd>{{ App\Questionnaire::$mix_place_option[$questionnaire->mix_place] }} &ensp; <span class="label {{ labelClass($questionnaire->mix_place) }}">{{ $questionnaire->mix_place }}</span></dd>
						<dt>Penerapan Promosi</dt><dd>{{ App\Questionnaire::$mix_promotion_option[$questionnaire->mix_promotion] }} &ensp; <span class="label {{ labelClass($questionnaire->mix_promotion) }}">{{ $questionnaire->mix_promotion }}</span></dd>
					</dl>
					<h4>Penguasaan Pasar</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Keadaan Market Share">Keadaan Market Share</dt><dd>{{ App\Questionnaire::$market_share_option[$questionnaire->market_share] }} &ensp; <span class="label {{ labelClass($questionnaire->market_share) }}">{{ $questionnaire->market_share }}</span></dd>
					</dl>
					<h4>Cakupan Pasar</h4>
					<dl class="dl-horizontal">
						<dt>Luas Cakupan Pasar</dt><dd>{{ App\Questionnaire::$market_coverage_option[$questionnaire->market_coverage] }} &ensp; <span class="label {{ labelClass($questionnaire->market_coverage) }}">{{ $questionnaire->market_coverage }}</span></dd>
					</dl>
					<h4>Persaingan</h4>
					<dl class="dl-horizontal">
						<dt>Persaingan Produk</dt><dd>{{ App\Questionnaire::$market_competition_option[$questionnaire->market_competition] }} &ensp; <span class="label {{ labelClass($questionnaire->market_competition) }}">{{ $questionnaire->market_competition }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Hasil Analisa Kuesioner <small>{{ $questionnaire->output_skor }}/290</small></h3></div>
				<div class="panel-body">
					<h4>Skor Total &mdash; {{ $questionnaire->output_skor }}/290 <small>{{ round($questionnaire->output_skor / 290 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->output_skor / 290 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->output_skor / 290 * 100, 0) . '%' }};">
							{{ round($questionnaire->output_skor / 290 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Keputusan</h5>
					<blockquote>
						<p>{{ $questionnaire->output_keputusan }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek Manajerial &mdash; {{ $questionnaire->saran_manajerial_score }}/105 <small>{{ round($questionnaire->saran_manajerial_score / 105 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_manajerial_score / 105 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_manajerial_score / 105 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_manajerial_score / 105 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_manajerial }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek Mesin dan Produksi &mdash; {{ $questionnaire->saran_mesin_score }}/55 <small>{{ round($questionnaire->saran_mesin_score / 55 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_mesin_score / 55 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_mesin_score / 55 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_mesin_score / 55 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_mesin }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek Keuangan &mdash; {{ $questionnaire->saran_keuangan_score }}/60 <small>{{ round($questionnaire->saran_keuangan_score / 60 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_keuangan_score / 60 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_keuangan_score / 60 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_keuangan_score / 60 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_keuangan }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek SDM &mdash; {{ $questionnaire->saran_sdm_score }}/30 <small>{{ round($questionnaire->saran_sdm_score / 30 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_sdm_score / 30 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_sdm_score / 30 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_sdm_score / 30 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_sdm }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek Pemasaran &mdash; {{ $questionnaire->saran_marketing_score }}/40 <small>{{ round($questionnaire->saran_marketing_score / 40 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_marketing_score / 40 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_marketing_score / 40 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_marketing_score / 40 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_marketing }}</p>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
	@parent
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
@stop
