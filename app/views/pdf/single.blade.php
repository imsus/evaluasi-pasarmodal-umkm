@extends('base.pdf')

@section('content')
	<h5>Kuesioner <strong>#1</strong></h5>

	<h6>Data Umum</h6>
	<table class="u-full-width">
	  <tr><th colspan="2">Kontak Perusahaan</th></tr>
	  <tr><td>Nama UKM</td><td>{{ $kuesioner->kontak_nama }} &ensp;  @if ( $kuesioner->kontak_gopublik ) [Sudah Go Publik] @else [Belum Go Publik] @endif</td></tr>
	  <tr><td>Alamat Kantor/Pabrik</td><td>{{ $kuesioner->kontak_alamat }}</td></tr>
	  <tr><td>Kota, Provinsi</td><td>{{ $kuesioner->kontak_kota }}</td></tr>
	  <tr><td>No. Telepon</td><td>{{ $kuesioner->kontak_telepon }}</td></tr>
	  <tr><td>No. Fax</td><td>{{ $kuesioner->kontak_fax }}</td></tr>
	  <tr><td>No. Handphone</td><td>{{ $kuesioner->kontak_handphone }}</td></tr>
	  <tr><td>Alamat Website</td><td>{{ $kuesioner->kontak_website }}</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Status Perusahaan</th></tr>
	  <tr><td>Tahun Berdiri</td><td>{{ $kuesioner->status_tahun }}</td></tr>
	  <tr><td>Status Usaha</td><td>{{ KuesionerNew::$status_usaha_option[$kuesioner->status_usaha] }}</td></tr>
	  <tr><td>Status Pemodalan</td><td>{{ KuesionerNew::$status_pemodalan_option[$kuesioner->status_pemodalan] }}</td></tr>
	  <tr><td>Penanggung Jawab</td><td>{{ $kuesioner->status_pj }}</td></tr>
	  <tr><td>Jumlah Manajer</td><td>{{ $kuesioner->status_manajer }}</td></tr>
	  <tr><td>Jumlah Karyawan</td><td>{{ $kuesioner->status_karyawan }}</td></tr>
	</table>
	<div style="margin-bottom: 32px"><br></div>

	<h6>Aspek Manajerial</h6>
	<table class="u-full-width">
	  <tr><th colspan="2">Dokumen Legalitas Perusahaan</th></tr>
	  <tr><td>Akte Pendirian</td><td>{{ KuesionerNew::$dokumen_akte_option[$kuesioner->dokumen_akte] }}</td></tr>
	  <tr><td>Tahun Terbit Surat</td><td>{{ $kuesioner->dokumen_tahun }}</td></tr>
	  <tr><td>NPWP</td><td>@if ($kuesioner->dokumen_npwp) Ada @else Tidak Ada @endif</td></tr>
	  <tr><td>SIUP</td><td>@if ($kuesioner->dokumen_siup) Ada @else Tidak Ada @endif</td></tr>
	  <tr><td>TDP</td><td>@if ($kuesioner->dokumen_tdp) Ada @else Tidak Ada @endif</td></tr>
	  <tr><td>IUI</td><td>@if ($kuesioner->dokumen_iui) Ada @else Tidak Ada @endif</td></tr>
	  <tr><td>SITU</td><td>@if ($kuesioner->dokumen_situ) Ada @else Tidak Ada @endif</td></tr>
	</table>
	<table class="u-full-witdh">
	  <tr><th colspan="2">Dokumen Legalitas Perusahaan</th></tr>
	  <tr><td>Punya Sistem Manajemen</td><td>{{ KuesionerNew::$sm_punya_option[$kuesioner->sm_punya] }} &ensp; [{{ $kuesioner->sm_punya }}]</td></tr>
	  <tr><td>Sistem Manajemen Tersertifikasi</td><td>{{ KuesionerNew::$sm_sertifikasi_option[$kuesioner->sm_sertifikasi] }} &ensp; [{{ $kuesioner->sm_sertifikasi }}]</td></tr>
	  <tr><td>Punya Struktur Organisasi</td><td>{{ KuesionerNew::$sm_so_option[$kuesioner->sm_so] }} &ensp; [{{ $kuesioner->sm_so }}]</td></tr>
	  <tr><td>Job Description Jelas</td><td>{{ KuesionerNew::$sm_jobdesc_option[$kuesioner->sm_jobdesc] }} &ensp; [{{ $kuesioner->sm_jobdesc }}]</td></tr>
	  <tr><td>Punya SOP</td><td>{{ KuesionerNew::$sm_sop_option[$kuesioner->sm_sop] }} &ensp; [{{ $kuesioner->sm_sop }}]</td></tr>
	  <tr><td>Punya Sistem Pengarsipan</td><td>{{ KuesionerNew::$sm_arsip_option[$kuesioner->sm_arsip] }} &ensp; [{{ $kuesioner->sm_arsip }}]</td></tr>
	  <tr><td>Melakukan Internal Audit Berkala</td><td>{{ KuesionerNew::$sm_audit_option[$kuesioner->sm_audit] }} &ensp; [{{ $kuesioner->sm_audit }}]</td></tr>
	  <tr><td>Menerapkan Total Quality Control</td><td>{{ KuesionerNew::$sm_tqc_option[$kuesioner->sm_tqc] }} &ensp; [{{ $kuesioner->sm_tqc }}]</td></tr>
	  <tr><td>Memerhatikan Kepuasan Pelanggan</td><td>{{ KuesionerNew::$sm_satisfaction_option[$kuesioner->sm_satisfaction] }} &ensp; [{{ $kuesioner->sm_satisfaction }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Kelengkapan Sarana dan Prasarana</th></tr>
	  <tr><td>Luas Bangunan Kantor</td><td>{{ KuesionerNew::$sarana_luas_kantor_option[$kuesioner->sarana_luas_kantor] }} &ensp; [{{ $kuesioner->sarana_luas_kantor }}]</td></tr>
	  <tr><td>Kondisi Bangunan Kantor</td><td>{{ KuesionerNew::$sarana_kondisi_kantor_option[$kuesioner->sarana_kondisi_kantor] }} &ensp; [{{ $kuesioner->sarana_kondisi_kantor }}]</td></tr>
	  <tr><td>Perkiraan Nilai Kantor</td><td>{{ KuesionerNew::$sarana_nilai_kantor_option[$kuesioner->sarana_nilai_kantor] }} &ensp; [{{ $kuesioner->sarana_nilai_kantor }}]</td></tr>
	  <tr><td>Luas Bangunan Gudang</td><td>{{ KuesionerNew::$sarana_luas_gudang_option[$kuesioner->sarana_luas_gudang] }} &ensp; [{{ $kuesioner->sarana_luas_gudang }}]</td></tr>
	  <tr><td>Kondisi Bangunan Gudang</td><td>{{ KuesionerNew::$sarana_kondisi_gudang_option[$kuesioner->sarana_kondisi_gudang] }} &ensp; [{{ $kuesioner->sarana_kondisi_gudang }}]</td></tr>
	  <tr><td>Perkiraan Nilai Gudang</td><td>{{ KuesionerNew::$sarana_nilai_gudang_option[$kuesioner->sarana_nilai_gudang] }} &ensp; [{{ $kuesioner->sarana_nilai_gudang }}]</td></tr>
	  <tr><td>Jumlah Mobil Pribadi/Perusahaan</td><td>{{ KuesionerNew::$sarana_jumlah_mobil_option[$kuesioner->sarana_jumlah_mobil] }} &ensp; [{{ $kuesioner->sarana_jumlah_mobil }}]</td></tr>
	  <tr><td>Nilai Pasar Mobil Pribadi/Perusahaan</td><td>{{ KuesionerNew::$sarana_nilai_mobil_option[$kuesioner->sarana_nilai_mobil] }} &ensp; [{{ $kuesioner->sarana_nilai_mobil }}]</td></tr>
	  <tr><td>Jumlah Mobil Angkutan/Pickup</td><td>{{ KuesionerNew::$sarana_jumlah_angkutan_option[$kuesioner->sarana_jumlah_angkutan] }} &ensp; [{{ $kuesioner->sarana_jumlah_angkutan }}]</td></tr>
	  <tr><td>Nilai Pasar Mobil Angkutan/Pickup</td><td>{{ KuesionerNew::$sarana_nilai_angkutan_option[$kuesioner->sarana_nilai_angkutan] }} &ensp; [{{ $kuesioner->sarana_nilai_angkutan }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Potensi Perluasan</th></tr>
	  <tr><td>Rencana Perluasan</td><td>{{ KuesionerNew::$potensi_perluasan_option[$kuesioner->potensi_perluasan] }} &ensp; [{{ $kuesioner->potensi_perluasan }}]</td></tr>
	</table>
	<div style="margin-bottom: 32px"><br></div>

	<h6>Aspek Mesin dan Produksi</h6>
	<table class="u-full-width">
	  <tr><th colspan="2">Efisiensi dan Efektivitas</th></tr>
	  <tr><td>Memenuhi Standar</td><td>{{ KuesionerNew::$efisiensi_standar_option[$kuesioner->efisiensi_standar] }} &ensp; [{{ $kuesioner->efisiensi_standar }}]</td></tr>
	  <tr><td>Efisiensi Jumlah Mesin</td><td>{{ KuesionerNew::$efisiensi_jumlah_option[$kuesioner->efisiensi_jumlah] }} &ensp; [{{ $kuesioner->efisiensi_jumlah }}]</td></tr>
	  <tr><td>Kapasitas Mesin</td><td>{{ KuesionerNew::$efisiensi_kapasitas_option[$kuesioner->efisiensi_kapasitas] }} &ensp; [{{ $kuesioner->efisiensi_kapasitas }}]</td></tr>
	  <tr><td>Usia Mesin</td><td>{{ KuesionerNew::$efisiensi_umur_option[$kuesioner->efisiensi_umur] }} &ensp; [{{ $kuesioner->efisiensi_umur }}]</td></tr>
	  <tr><td>Perawatan Mesin</td><td>{{ KuesionerNew::$efisiensi_perawatan_option[$kuesioner->efisiensi_perawatan] }} &ensp; [{{ $kuesioner->efisiensi_perawatan }}]</td></tr>
	  <tr><td>Nilai Efisiensi Produksi</td><td>{{ KuesionerNew::$efisiensi_rendemen_option[$kuesioner->efisiensi_rendemen] }} &ensp; [{{ $kuesioner->efisiensi_rendemen }}]</td></tr>
	  <tr><td>Varian Produk</td><td>{{ KuesionerNew::$efisiensi_variasi_option[$kuesioner->efisiensi_variasi] }} &ensp; [{{ $kuesioner->efisiensi_variasi }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Kebutuhan Energi</th></tr>
	  <tr><td>Kapasitas Penggunaan Listrik PLN</td><td>{{ KuesionerNew::$energi_pln_option[$kuesioner->energi_pln] }} &ensp; [{{ $kuesioner->energi_pln }}]</td></tr>
      <tr><td>Kapasitas Penggunaan Listrik Genset</td><td>{{ KuesionerNew::$energi_genset_option[$kuesioner->energi_genset] }} &ensp; [{{ $kuesioner->energi_genset }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Kebutuhan Energi Alternatif</th></tr>
	  <tr><td>Penggunaan Energi Alternatif</td><td>{{ KuesionerNew::$alternatif_energi_option[$kuesioner->alternatif_energi] }} &ensp; [{{ $kuesioner->alternatif_energi }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Inovasi Produk dan Proses Produksi</th></tr>
	  <tr><td>Inovasi Produk</td><td>{{ KuesionerNew::$inovasi_produk_option[$kuesioner->inovasi_produk] }} &ensp; [{{ $kuesioner->inovasi_produk }}]</td></tr>
	</table>
	<div style="margin-bottom: 32px"><br></div>

	<h6>Aspek Keuangan</h6>
	<table class="u-full-width">
	  <tr><th colspan="2">Data Keuangan</th></tr>
	  <tr><td>Kas</td><td>{{ 'Rp' . number_format($kuesioner->rasio_kas, 2, ',', '.') }}</td></tr>
	  <tr><td>Piutang</td><td>{{ 'Rp' . number_format($kuesioner->rasio_piutang, 2, ',', '.') }}</td></tr>
	  <tr><td>Persediaan</td><td>{{ 'Rp' . number_format($kuesioner->rasio_persediaan, 2, ',', '.') }}</td></tr>
	  <tr><td>Hutang Lancar</td><td>{{ 'Rp' . number_format($kuesioner->rasio_hutang_lancar, 2, ',', '.') }}</td></tr>
	  <tr><td>Hutang Jangka Pendek</td><td>{{ 'Rp' . number_format($kuesioner->rasio_hutang_pendek, 2, ',', '.') }}</td></tr>
	  <tr><td>Tanah</td><td>{{ 'Rp' . number_format($kuesioner->rasio_tanah, 2, ',', '.') }}</td></tr>
	  <tr><td>Bangunan</td><td>{{ 'Rp' . number_format($kuesioner->rasio_bangunan, 2, ',', '.') }}</td></tr>
	  <tr><td>Mesin</td><td>{{ 'Rp' . number_format($kuesioner->rasio_mesin, 2, ',', '.') }}</td></tr>
	  <tr><td>Kendaraan</td><td>{{ 'Rp' . number_format($kuesioner->rasio_kendaraan, 2, ',', '.') }}</td></tr>
	  <tr><td>Inventaris Lainnya</td><td>{{ 'Rp' . number_format($kuesioner->rasio_inventaris, 2, ',', '.') }}</td></tr>
	  <tr><td>Hutang Jangka Panjang</td><td>{{ 'Rp' . number_format($kuesioner->rasio_hutang_panjang, 2, ',', '.') }}</td></tr>
	  <tr><td>Total Penjualan</td><td>{{ 'Rp' . number_format($kuesioner->rasio_total_penjualan, 2, ',', '.') }}</td></tr>
	  <tr><td>Total Pengeluaran</td><td>{{ 'Rp' . number_format($kuesioner->rasio_total_pengeluaran, 2, ',', '.') }}</td></tr>
	  <tr><td>Laba Usaha</td><td>{{ 'Rp' . number_format($kuesioner->laba_usaha, 2, ',', '.') }} &ensp; [{{ $kuesioner->laba_usaha_score }}]</td></tr>
	  <tr><td>Modal Awal</td><td>{{ 'Rp' . number_format($kuesioner->modal_awal, 2, ',', '.') }} &ensp; [{{ $kuesioner->modal_awal_score }}]</td></tr>
	  <tr><td>Modal Sendiri Saat Ini</td><td>{{ 'Rp' . number_format($kuesioner->modal_sendiri, 2, ',', '.') }} &ensp; [{{ $kuesioner->modal_sendiri_score }}]</td></tr>
	  <tr><td>Modal Luar Saat Ini</td><td>{{ 'Rp' . number_format($kuesioner->modal_luar, 2, ',', '.') }} &ensp; [{{ $kuesioner->modal_luar_score }}]</td></tr>
	  <tr><td>Perimbangan Modal</td><td>{{ $kuesioner->modal_perimbangan }} &ensp; [{{ $kuesioner->modal_perimbangan_score }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Analisa Aspek Rasio Keuangan</th></tr>
	  <tr><td>Rasio Likuiditas</td><td>{{ $kuesioner->rasio_likuiditas }} &ensp; [{{ $kuesioner->rasio_likuiditas_score }}]</td></tr>
	  <tr><td>Rasio Solvabilitas</td><td>{{ $kuesioner->rasio_solvabilitas }} &ensp; [{{ $kuesioner->rasio_solvabilitas_score }}]</td></tr>
	  <tr><td>Rasio Profitabilitas</td><td>{{ $kuesioner->rasio_profitabilitas }} &ensp; [{{ $kuesioner->rasio_profitabilitas_score }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Hubungan dengan Perbankan</th></tr>
	  <tr><td>Hubungan dengan Perbankan</td><td>{{ KuesionerNew::$hubungan_pinjaman_option[$kuesioner->hubungan_pinjaman] }} &ensp; [{{ $kuesioner->hubungan_pinjaman }}]</td></tr>
	  <tr><td>Jumlah Ajuan Pinjaman</td><td>{{ KuesionerNew::$hubungan_frekuensi_option[$kuesioner->hubungan_frekuensi] }} &ensp; [{{ $kuesioner->hubungan_frekuensi }}]</td></tr>
	  <tr><td>Kendala Internal</td><td>{{ KuesionerNew::$hubungan_internal_option[$kuesioner->hubungan_internal] }} &ensp; [{{ $kuesioner->hubungan_internal }}]</td></tr>
	  <tr><td>Kendala Eksternal</td><td>{{ KuesionerNew::$hubungan_eksternal_option[$kuesioner->hubungan_eksternal] }} &ensp; [{{ $kuesioner->hubungan_eksternal }}]</td></tr>
	</table>
	<div style="margin-bottom: 32px"><br></div>

	<h6>Aspek SDM</h6>
	<table class="u-full-width">
	  <tr><th colspan="2">Pemenuhan Tenaga Kerja</th></tr>
	  <tr><td>Jumlah Tenaga Kerja</td><td>{{ KuesionerNew::$tk_jumlah_option[$kuesioner->tk_jumlah] }} &ensp; [{{ $kuesioner->tk_jumlah }}]</td></tr>
	  <tr><td>Kompetensi Tenaga Kerja</td><td>{{ KuesionerNew::$tk_kompetisi_option[$kuesioner->tk_kompetisi] }} &ensp; [{{ $kuesioner->tk_kompetisi }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Produktivitas Kerja</th></tr>
	  <tr><td>Lama Jam Kerja</td><td>{{ KuesionerNew::$produktif_jam_option[$kuesioner->produktif_jam] }} &ensp; [{{ $kuesioner->produktif_jam }}]</td></tr>
	  <tr><td>Jumlah Shift</td><td>{{ KuesionerNew::$produktif_shift_option[$kuesioner->produktif_shift] }} &ensp; [{{ $kuesioner->produktif_shift }}]</td></tr>
	  <tr><td>Standar Upah Tenaga Kerja</td><td>{{ KuesionerNew::$produktif_upah_option[$kuesioner->produktif_upah] }} &ensp; [{{ $kuesioner->produktif_upah }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Fasilitas untuk Tenaga Kerja</th></tr>
	  <tr><td>Fasilitas Tenaga Kerja</td><td>{{ KuesionerNew::$fasilitas_tk_option[$kuesioner->fasilitas_tk] }} &ensp; [{{ $kuesioner->fasilitas_tk }}]</td></tr>
	</table>
	<div style="margin-bottom: 32px"><br></div>

	<h6>Aspek Pemasaran</h6>
	<table class="u-full-width">
	  <tr><th colspan="2">Strategi Pemasaran</th></tr>
	  <tr><td>Strategi Pemasaran</td><td>{{ KuesionerNew::$marketing_strategy_option[$kuesioner->marketing_strategy] }} &ensp; [{{ $kuesioner->marketing_strategy }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Bauran Pemasaran</th></tr>
	  <tr><td>Jumlah Varian Produk</td><td>{{ KuesionerNew::$mix_product_option[$kuesioner->mix_product] }} &ensp; [{{ $kuesioner->mix_product }}]</td></tr>
	  <tr><td>Penerapan Harga</td><td>{{ KuesionerNew::$mix_price_option[$kuesioner->mix_price] }} &ensp; [{{ $kuesioner->mix_price }}]</td></tr>
	  <tr><td>Saluran Distribusi</td><td>{{ KuesionerNew::$mix_place_option[$kuesioner->mix_place] }} &ensp; [{{ $kuesioner->mix_place }}]</td></tr>
	  <tr><td>Penerapan Promosi</td><td>{{ KuesionerNew::$mix_promotion_option[$kuesioner->mix_promotion] }} &ensp; [{{ $kuesioner->mix_promotion }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Penguasaan Pasar</th></tr>
	  <tr><td>Keadaan Market Share</td><td>{{ KuesionerNew::$market_share_option[$kuesioner->market_share] }} &ensp; [{{ $kuesioner->market_share }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Cakupan Pasar</th></tr>
	  <tr><td>Luas Cakupan Pasar</td><td>{{ KuesionerNew::$market_coverage_option[$kuesioner->market_coverage] }} &ensp; [{{ $kuesioner->market_coverage }}]</td></tr>
	</table>
	<table class="u-full-width">
	  <tr><th colspan="2">Persaingan</th></tr>
	  <tr><td>Persaingan Produk</td><td>{{ KuesionerNew::$market_competition_option[$kuesioner->market_competition] }} &ensp; [{{ $kuesioner->market_competition }}]</td></tr>
	</table>
	<div style="margin-bottom: 32px"><br></div>

	<h6>Hasil Analisa Kuesioner</h6>
	<h6>Skor Total &mdash; {{ $kuesioner->output_skor }}/290 <small>{{ round($kuesioner->output_skor / 290 * 100, 2) . '%' }}</small></h6>
	<h6>Keputusan</h6>
	<blockquote>
		<p>{{ $kuesioner->output_keputusan }}</p>
	</blockquote>
	<br>
	<h6>Skor Aspek Manajerial &mdash; {{ $kuesioner->saran_manajerial_score }}/105 <small>{{ round($kuesioner->saran_manajerial_score / 105 * 100, 2) . '%' }}</small></h6>
	<strong>Saran</strong>
	<blockquote>
		<p>{{ $kuesioner->saran_manajerial }}</p>
	</blockquote>
	<br>
	<h6>Skor Aspek Mesin dan Produksi &mdash; {{ $kuesioner->saran_mesin_score }}/55 <small>{{ round($kuesioner->saran_mesin_score / 55 * 100, 2) . '%' }}</small></h6>
	<strong>Saran</strong>
	<blockquote>
		<p>{{ $kuesioner->saran_mesin }}</p>
	</blockquote>
	<br>
	<h6>Skor Aspek Keuangan &mdash; {{ $kuesioner->saran_keuangan_score }}/60 <small>{{ round($kuesioner->saran_keuangan_score / 60 * 100, 2) . '%' }}</small></h6>
	<strong>Saran</strong>
	<blockquote>
		<p>{{ $kuesioner->saran_keuangan }}</p>
	</blockquote>
	<br>
	<h6>Skor Aspek SDM &mdash; {{ $kuesioner->saran_sdm_score }}/30 <small>{{ round($kuesioner->saran_sdm_score / 30 * 100, 2) . '%' }}</small></h6>
	<strong>Saran</strong>
	<blockquote>
		<p>{{ $kuesioner->saran_sdm }}</p>
	</blockquote>
	<br>
	<h6>Skor Aspek Pemasaran &mdash; {{ $kuesioner->saran_marketing_score }}/40 <small>{{ round($kuesioner->saran_marketing_score / 40 * 100, 2) . '%' }}</small></h6>
	<strong>Saran</strong>
	<blockquote>
		<p>{{ $kuesioner->saran_marketing }}</p>
	</blockquote>
@stop
