@extends('base.base')

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
		<div class="col-md-3 hidden-print">
			<div class="btn-group btn-group-justified page-navigation">
				<div class="btn-group"><a href="/kuesioner-new" type="button" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Kembali</a></div>
				<div class="btn-group"><a href="/kuesioner-new/edit/{{ $kuesioner->id }}" type="button" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a></div>
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
						<dt>Nama UKM</dt><dd>{{ $kuesioner->kontak_nama }} &ensp;  @if ( $kuesioner->kontak_gopublik ) <span class="label label-success">Sudah Go Publik</span> @else <span class="label label-danger">Belum Go Publik</span> @endif</dd>
						<dt>Alamat Kantor/Pabrik</dt><dd>{{ $kuesioner->kontak_alamat }}</dd>
						<dt>Kota, Provinsi</dt><dd>{{ $kuesioner->kontak_kota }}</dd>
						<dt>No. Telepon</dt><dd>{{ $kuesioner->kontak_telepon }}</dd>
						<dt>No. Fax</dt><dd>{{ $kuesioner->kontak_fax }}</dd>
						<dt>No. Handphone</dt><dd>{{ $kuesioner->kontak_handphone }}</dd>
						<dt>Alamat Website</dt><dd><a href="{{ $kuesioner->kontak_website }}" target="_blank">{{ $kuesioner->kontak_website }}</a></dd>
					</dl>
					<h4>Status Perusahaan</h4>
					<dl class="dl-horizontal">
						<dt>Tahun Berdiri</dt><dd>{{ $kuesioner->status_tahun }}</dd>
						<dt>Status Usaha</dt><dd>{{ KuesionerNew::$status_usaha_option[$kuesioner->status_usaha] }}</dd>
						<dt>Status Pemodalan</dt><dd>{{ KuesionerNew::$status_pemodalan_option[$kuesioner->status_pemodalan] }}</dd>
						<dt>Penanggung Jawab</dt><dd>{{ $kuesioner->status_pj }}</dd>
						<dt>Jumlah Manajer</dt><dd>{{ $kuesioner->status_manajer }}</dd>
						<dt>Jumlah Karyawan</dt><dd>{{ $kuesioner->status_karyawan }}</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek Manajerial <small>{{ $kuesioner->saran_manajerial_score }}/105</small></h3></div>
				<div class="panel-body">
					<h4>Dokumen Legalitas Perusahaan </h4>
					<dl class="dl-horizontal">
						<dt>Akte Pendirian</dt><dd>{{ KuesionerNew::$dokumen_akte_option[$kuesioner->dokumen_akte] }}</dd>
						<dt>Tahun Terbit Surat</dt><dd>{{ $kuesioner->dokumen_tahun }}</dd>
						<dt>NPWP</dt><dd>@if ($kuesioner->dokumen_npwp) Ada @else Tidak Ada @endif</dd>
						<dt>SIUP</dt><dd>@if ($kuesioner->dokumen_siup) Ada @else Tidak Ada @endif</dd>
						<dt>TDP</dt><dd>@if ($kuesioner->dokumen_tdp) Ada @else Tidak Ada @endif</dd>
						<dt>IUI</dt><dd>@if ($kuesioner->dokumen_iui) Ada @else Tidak Ada @endif</dd>
						<dt>SITU</dt><dd>@if ($kuesioner->dokumen_situ) Ada @else Tidak Ada @endif</dd>
						<dt>Skor</dt><dd><span class="badge">{{ array_sum(array($kuesioner->dokumen_npwp, $kuesioner->dokumen_siup, $kuesioner->dokumen_tdp, $kuesioner->dokumen_iui, $kuesioner->dokumen_situ)) }}</span></dd>
					</dl>
					<h4>Sistem Manajemen</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Punya Sistem Manajemen">Punya Sistem Manajemen</dt><dd>{{ KuesionerNew::$sm_punya_option[$kuesioner->sm_punya] }} &ensp; <span class="badge">{{ $kuesioner->sm_punya }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Sistem Manajemen Tersertifikasi">Sistem Manajemen Tersertifikasi</dt><dd>{{ KuesionerNew::$sm_sertifikasi_option[$kuesioner->sm_sertifikasi] }} &ensp; <span class="badge">{{ $kuesioner->sm_sertifikasi }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Punya Struktur Organisasi">Punya Struktur Organisasi</dt><dd>{{ KuesionerNew::$sm_so_option[$kuesioner->sm_so] }} &ensp; <span class="badge">{{ $kuesioner->sm_so }}</span></dd>
						<dt>Job Description Jelas</dt><dd>{{ KuesionerNew::$sm_jobdesc_option[$kuesioner->sm_jobdesc] }} &ensp; <span class="badge">{{ $kuesioner->sm_jobdesc }}</span></dd>
						<dt>Punya SOP</dt><dd>{{ KuesionerNew::$sm_sop_option[$kuesioner->sm_sop] }} &ensp; <span class="badge">{{ $kuesioner->sm_sop }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Punya Sistem Pengarsipan">Punya Sistem Pengarsipan</dt><dd>{{ KuesionerNew::$sm_arsip_option[$kuesioner->sm_arsip] }} &ensp; <span class="badge">{{ $kuesioner->sm_arsip }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Melakukan Internal Audit Berkala">Melakukan Internal Audit Berkala</dt><dd>{{ KuesionerNew::$sm_audit_option[$kuesioner->sm_audit] }} &ensp; <span class="badge">{{ $kuesioner->sm_audit }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Menerapkan Total Quality Control">Menerapkan Total Quality Control</dt><dd>{{ KuesionerNew::$sm_tqc_option[$kuesioner->sm_tqc] }} &ensp; <span class="badge">{{ $kuesioner->sm_tqc }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Memerhatikan Kepuasan Pelanggan">Memerhatikan Kepuasan Pelanggan</dt><dd>{{ KuesionerNew::$sm_satisfaction_option[$kuesioner->sm_satisfaction] }} &ensp; <span class="badge">{{ $kuesioner->sm_satisfaction }}</span></dd>
					</dl>
					<h4>Kelengkapan Sarana dan Prasarana</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Luas Bangunan Kantor">Luas Bangunan Kantor</dt><dd>{{ KuesionerNew::$sarana_luas_kantor_option[$kuesioner->sarana_luas_kantor] }} &ensp; <span class="badge">{{ $kuesioner->sarana_luas_kantor }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Kondisi Bangunan Kantor">Kondisi Bangunan Kantor</dt><dd>{{ KuesionerNew::$sarana_kondisi_kantor_option[$kuesioner->sarana_kondisi_kantor] }} &ensp; <span class="badge">{{ $kuesioner->sarana_kondisi_kantor }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Perkiraan Nilai Kantor">Perkiraan Nilai Kantor</dt><dd>{{ KuesionerNew::$sarana_nilai_kantor_option[$kuesioner->sarana_nilai_kantor] }} &ensp; <span class="badge">{{ $kuesioner->sarana_nilai_kantor }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Luas Bangunan Gudang">Luas Bangunan Gudang</dt><dd>{{ KuesionerNew::$sarana_luas_gudang_option[$kuesioner->sarana_luas_gudang] }} &ensp; <span class="badge">{{ $kuesioner->sarana_luas_gudang }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Kondisi Bangunan Gudang">Kondisi Bangunan Gudang</dt><dd>{{ KuesionerNew::$sarana_kondisi_gudang_option[$kuesioner->sarana_kondisi_gudang] }} &ensp; <span class="badge">{{ $kuesioner->sarana_kondisi_gudang }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Perkiraan Nilai Gudang">Perkiraan Nilai Gudang</dt><dd>{{ KuesionerNew::$sarana_nilai_gudang_option[$kuesioner->sarana_nilai_gudang] }} &ensp; <span class="badge">{{ $kuesioner->sarana_nilai_gudang }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Jumlah Mobil Pribadi/Perusahaan">Jumlah Mobil Pribadi/Perusahaan</dt><dd>{{ KuesionerNew::$sarana_jumlah_mobil_option[$kuesioner->sarana_jumlah_mobil] }} &ensp; <span class="badge">{{ $kuesioner->sarana_jumlah_mobil }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Nilai Pasar Mobil Pribadi/Perusahaan">Nilai Pasar Mobil Pribadi/Perusahaan</dt><dd>{{ KuesionerNew::$sarana_nilai_mobil_option[$kuesioner->sarana_nilai_mobil] }} &ensp; <span class="badge">{{ $kuesioner->sarana_nilai_mobil }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Jumlah Mobil Angkutan/Pickup">Jumlah Mobil Angkutan/Pickup</dt><dd>{{ KuesionerNew::$sarana_jumlah_angkutan_option[$kuesioner->sarana_jumlah_angkutan] }} &ensp; <span class="badge">{{ $kuesioner->sarana_jumlah_angkutan }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Nilai Pasar Mobil Angkutan/Pickup">Nilai Pasar Mobil Angkutan/Pickup</dt><dd>{{ KuesionerNew::$sarana_nilai_angkutan_option[$kuesioner->sarana_nilai_angkutan] }} &ensp; <span class="badge">{{ $kuesioner->sarana_nilai_angkutan }}</span></dd>
					</dl>
					<h4>Potensi Perluasan</h4>
					<dl class="dl-horizontal">
						<dt>Rencana Perluasan</dt><dd>{{ KuesionerNew::$potensi_perluasan_option[$kuesioner->potensi_perluasan] }} &ensp; <span class="badge">{{ $kuesioner->potensi_perluasan }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek Mesin dan Produksi <small>{{ $kuesioner->saran_mesin_score }}/55</small></h3></div>
				<div class="panel-body">
					<h4>Efisiensi dan Efektivitas</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Memenuhi Standar">Memenuhi Standar</dt><dd>{{ KuesionerNew::$efisiensi_standar_option[$kuesioner->efisiensi_standar] }} &ensp; <span class="badge">{{ $kuesioner->efisiensi_standar }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Efisiensi Jumlah Mesin">Efisiensi Jumlah Mesin</dt><dd>{{ KuesionerNew::$efisiensi_jumlah_option[$kuesioner->efisiensi_jumlah] }} &ensp; <span class="badge">{{ $kuesioner->efisiensi_jumlah }}</span></dd>
						<dt>Kapasitas Mesin</dt><dd>{{ KuesionerNew::$efisiensi_kapasitas_option[$kuesioner->efisiensi_kapasitas] }} &ensp; <span class="badge">{{ $kuesioner->efisiensi_kapasitas }}</span></dd>
						<dt>Usia Mesin</dt><dd>{{ KuesionerNew::$efisiensi_umur_option[$kuesioner->efisiensi_umur] }} &ensp; <span class="badge">{{ $kuesioner->efisiensi_umur }}</span></dd>
						<dt>Perawatan Mesin</dt><dd>{{ KuesionerNew::$efisiensi_perawatan_option[$kuesioner->efisiensi_perawatan] }} &ensp; <span class="badge">{{ $kuesioner->efisiensi_perawatan }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Nilai Efisiensi Produksi">Nilai Efisiensi Produksi</dt><dd>{{ KuesionerNew::$efisiensi_rendemen_option[$kuesioner->efisiensi_rendemen] }} &ensp; <span class="badge">{{ $kuesioner->efisiensi_rendemen }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Varian Produk">Varian Produk</dt><dd>{{ KuesionerNew::$efisiensi_variasi_option[$kuesioner->efisiensi_variasi] }} &ensp; <span class="badge">{{ $kuesioner->efisiensi_variasi }}</span></dd>
					</dl>
					<h4>Kebutuhan Energi</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Kapasitas Penggunaan Listrik PLN">Kapasitas Penggunaan Listrik PLN</dt><dd>{{ KuesionerNew::$energi_pln_option[$kuesioner->energi_pln] }} &ensp; <span class="badge">{{ $kuesioner->energi_pln }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Kapasitas Penggunaan Listrik Genset">Kapasitas Penggunaan Listrik Genset</dt><dd>{{ KuesionerNew::$energi_genset_option[$kuesioner->energi_genset] }} &ensp; <span class="badge">{{ $kuesioner->energi_genset }}</span></dd>
					</dl>
					<h4>Penggunaan Energi Alternatif</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Penggunaan Energi Alternatif">Penggunaan Energi Alternatif</dt><dd>{{ KuesionerNew::$alternatif_energi_option[$kuesioner->alternatif_energi] }} &ensp; <span class="badge">{{ $kuesioner->alternatif_energi }}</span></dd>
					</dl>
					<h4>Inovasi Produk dan Proses Produksi</h4>
					<dl class="dl-horizontal">
						<dt>Inovasi Produk</dt><dd>{{ KuesionerNew::$inovasi_produk_option[$kuesioner->inovasi_produk] }} &ensp; <span class="badge">{{ $kuesioner->inovasi_produk }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek Keuangan <small>{{ $kuesioner->saran_keuangan_score }}/60</small></h3></div>
				<div class="panel-body">
					<h4>Data Keuangan</h4>
					<dl class="dl-horizontal">
						<dt>Kas</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_kas, 2, ',', '.') }}</dd>
						<dt>Piutang</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_piutang, 2, ',', '.') }}</dd>
						<dt>Persediaan</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_persediaan, 2, ',', '.') }}</dd>
						<dt>Hutang Lancar</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_hutang_lancar, 2, ',', '.') }}</dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Hutang Jangka Pendek">Hutang Jangka Pendek</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_hutang_pendek, 2, ',', '.') }}</dd>
						<dt>Tanah</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_tanah, 2, ',', '.') }}</dd>
						<dt>Bangunan</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_bangunan, 2, ',', '.') }}</dd>
						<dt>Mesin</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_mesin, 2, ',', '.') }}</dd>
						<dt>Kendaraan</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_kendaraan, 2, ',', '.') }}</dd>
						<dt>Inventaris Lainnya</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_inventaris, 2, ',', '.') }}</dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Hutang Jangka Panjang">Hutang Jangka Panjang</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_hutang_panjang, 2, ',', '.') }}</dd>
						<dt>Total Penjualan</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_total_penjualan, 2, ',', '.') }}</dd>
						<dt>Total Pengeluaran</dt><dd>{{ 'Rp' . number_format($kuesioner->rasio_total_pengeluaran, 2, ',', '.') }}</dd>
						<dt>Laba Usaha</dt><dd>{{ 'Rp' . number_format($kuesioner->laba_usaha, 2, ',', '.') }} &ensp; <span class="badge">{{ $kuesioner->laba_usaha_score }}</span></dd>
						<dt>Modal Awal</dt><dd>{{ 'Rp' . number_format($kuesioner->modal_awal, 2, ',', '.') }} &ensp; <span class="badge">{{ $kuesioner->modal_awal_score }}</span></dd>
						<dt>Modal Sendiri Saat Ini</dt><dd>{{ 'Rp' . number_format($kuesioner->modal_sendiri, 2, ',', '.') }} &ensp; <span class="badge">{{ $kuesioner->modal_sendiri_score }}</span></dd>
						<dt>Modal Luar Saat Ini</dt><dd>{{ 'Rp' . number_format($kuesioner->modal_luar, 2, ',', '.') }} &ensp; <span class="badge">{{ $kuesioner->modal_luar_score }}</span></dd>
						<dt>Perimbangan Modal</dt><dd>{{ $kuesioner->modal_perimbangan }} &ensp; <span class="badge">{{ $kuesioner->modal_perimbangan_score }}</span></dd>
					</dl>
					<h4>Analisa Aspek Rasio Keuangan</h4>
					<dl class="dl-horizontal">
						<dt>Rasio Likuiditas</dt><dd>{{ $kuesioner->rasio_likuiditas }} &ensp; <span class="badge">{{ $kuesioner->rasio_likuiditas_score }}</span></dd>
						<dt>Rasio Solvabilitas</dt><dd>{{ $kuesioner->rasio_solvabilitas }} &ensp; <span class="badge">{{ $kuesioner->rasio_solvabilitas_score }}</span></dd>
						<dt>Rasio Profitabilitas</dt><dd>{{ $kuesioner->rasio_profitabilitas }} &ensp; <span class="badge">{{ $kuesioner->rasio_profitabilitas_score }}</span></dd>
					</dl>
					<h4>Hubungan dengan Perbankan</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Hubungan dengan Perbankan">Hubungan dengan Perbankan</dt><dd>{{ KuesionerNew::$hubungan_pinjaman_option[$kuesioner->hubungan_pinjaman] }} &ensp; <span class="badge">{{ $kuesioner->hubungan_pinjaman }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Jumlah Ajuan Pinjaman">Jumlah Ajuan Pinjaman</dt><dd>{{ KuesionerNew::$hubungan_frekuensi_option[$kuesioner->hubungan_frekuensi] }} &ensp; <span class="badge">{{ $kuesioner->hubungan_frekuensi }}</span></dd>
						<dt>Kendala Internal</dt><dd>{{ KuesionerNew::$hubungan_internal_option[$kuesioner->hubungan_internal] }} &ensp; <span class="badge">{{ $kuesioner->hubungan_internal }}</span></dd>
						<dt>Kendala Eksternal</dt><dd>{{ KuesionerNew::$hubungan_eksternal_option[$kuesioner->hubungan_eksternal] }} &ensp; <span class="badge">{{ $kuesioner->hubungan_eksternal }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek SDM <small>{{ $kuesioner->saran_sdm_score }}/30</small></h3></div>
				<div class="panel-body">
					<h4>Pemenuhan Tenaga Kerja</h4>
					<dl class="dl-horizontal">
						<dt>Jumlah Tenaga Kerja</dt><dd>{{ KuesionerNew::$tk_jumlah_option[$kuesioner->tk_jumlah] }} &ensp; <span class="badge">{{ $kuesioner->tk_jumlah }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Kompetensi Tenaga Kerja">Kompetensi Tenaga Kerja</dt><dd>{{ KuesionerNew::$tk_kompetisi_option[$kuesioner->tk_kompetisi] }} &ensp; <span class="badge">{{ $kuesioner->tk_kompetisi }}</span></dd>
					</dl>
					<h4>Produktivitas Kerja</h4>
					<dl class="dl-horizontal">
						<dt>Lama Jam Kerja</dt><dd>{{ KuesionerNew::$produktif_jam_option[$kuesioner->produktif_jam] }} &ensp; <span class="badge">{{ $kuesioner->produktif_jam }}</span></dd>
						<dt>Jumlah Shift</dt><dd>{{ KuesionerNew::$produktif_shift_option[$kuesioner->produktif_shift] }} &ensp; <span class="badge">{{ $kuesioner->produktif_shift }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Standar Upah Tenaga Kerja">Standar Upah Tenaga Kerja</dt><dd>{{ KuesionerNew::$produktif_upah_option[$kuesioner->produktif_upah] }} &ensp; <span class="badge">{{ $kuesioner->produktif_upah }}</span></dd>
					</dl>
					<h4>Fasilitas untuk Tenaga Kerja</h4>
					<dl class="dl-horizontal">
						<dt>Fasilitas Tenaga Kerja</dt><dd>{{ KuesionerNew::$fasilitas_tk_option[$kuesioner->fasilitas_tk] }} &ensp; <span class="badge">{{ $kuesioner->fasilitas_tk }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek Pemasaran <small>{{ $kuesioner->saran_marketing_score }}/40</small></h3></div>
				<div class="panel-body">
					<h4>Strategi Pemasaran</h4>
					<dl class="dl-horizontal">
						<dt>Strategi Pemasaran</dt><dd>{{ KuesionerNew::$marketing_strategy_option[$kuesioner->marketing_strategy] }} &ensp; <span class="badge">{{ $kuesioner->marketing_strategy }}</span></dd>
					</dl>
					<h4>Bauran Pemasaran</h4>
					<dl class="dl-horizontal">
						<dt>Jumlah Varian Produk</dt><dd>{{ KuesionerNew::$mix_product_option[$kuesioner->mix_product] }} &ensp; <span class="badge">{{ $kuesioner->mix_product }}</span></dd>
						<dt>Penerapan Harga</dt><dd>{{ KuesionerNew::$mix_price_option[$kuesioner->mix_price] }} &ensp; <span class="badge">{{ $kuesioner->mix_price }}</span></dd>
						<dt>Saluran Distribusi</dt><dd>{{ KuesionerNew::$mix_place_option[$kuesioner->mix_place] }} &ensp; <span class="badge">{{ $kuesioner->mix_place }}</span></dd>
						<dt>Penerapan Promosi</dt><dd>{{ KuesionerNew::$mix_promotion_option[$kuesioner->mix_promotion] }} &ensp; <span class="badge">{{ $kuesioner->mix_promotion }}</span></dd>
					</dl>
					<h4>Penguasaan Pasar</h4>
					<dl class="dl-horizontal">
						<dt data-toggle="tooltip" data-placement="bottom" title="Keadaan Market Share">Keadaan Market Share</dt><dd>{{ KuesionerNew::$market_share_option[$kuesioner->market_share] }} &ensp; <span class="badge">{{ $kuesioner->market_share }}</span></dd>
					</dl>
					<h4>Cakupan Pasar</h4>
					<dl class="dl-horizontal">
						<dt>Luas Cakupan Pasar</dt><dd>{{ KuesionerNew::$market_coverage_option[$kuesioner->market_coverage] }} &ensp; <span class="badge">{{ $kuesioner->market_coverage }}</span></dd>
					</dl>
					<h4>Persaingan</h4>
					<dl class="dl-horizontal">
						<dt>Persaingan Produk</dt><dd>{{ KuesionerNew::$market_competition_option[$kuesioner->market_competition] }} &ensp; <span class="badge">{{ $kuesioner->market_competition }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Hasil Analisa Kuesioner <small>{{ $kuesioner->output_skor }}/290</small></h3></div>
				<div class="panel-body">
					<h4>Skor Total &mdash; {{ $kuesioner->output_skor }}/290 <small>{{ round($kuesioner->output_skor / 290 * 100, 2) . '%' }}</small></h4>
					<br>
					<h4>Skor Aspek Manajerial &mdash; {{ $kuesioner->saran_manajerial_score }}/105 <small>{{ round($kuesioner->saran_manajerial_score / 105 * 100, 2) . '%' }}</small></h4>
					<h5>Saran</h5>
					<br>
					<h4>Skor Aspek Mesin dan Produksi &mdash; {{ $kuesioner->saran_mesin_score }}/55 <small>{{ round($kuesioner->saran_mesin_score / 55 * 100, 2) . '%' }}</small></h4>
					<h5>Saran</h5>
					<br>
					<h4>Skor Aspek Keuangan &mdash; {{ $kuesioner->saran_keuangan_score }}/60 <small>{{ round($kuesioner->saran_keuangan_score / 60 * 100, 2) . '%' }}</small></h4>
					<h5>Saran</h5>
					<br>
					<h4>Skor Aspek SDM &mdash; {{ $kuesioner->saran_sdm_score }}/30 <small>{{ round($kuesioner->saran_sdm_score / 30 * 100, 2) . '%' }}</small></h4>
					<h5>Saran</h5>
					<br>
					<h4>Skor Aspek Pemasaran &mdash; {{ $kuesioner->saran_marketing_score }}/40 <small>{{ round($kuesioner->saran_marketing_score / 40 * 100, 2) . '%' }}</small></h4>
					<h5>Saran</h5>
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
