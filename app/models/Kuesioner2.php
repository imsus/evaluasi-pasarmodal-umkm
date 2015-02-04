<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Kuesioner2 extends Eloquent {
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	protected $fillable = array(
		// Kontak Perusahaan
		'kontak_nama',
		'kontak_gopublik',
		'kontak_alamat',
		'kontak_kota',
		'kontak_telepon',
		'kontak_fax',
		'kontak_handphone',
		'kontak_website',
		// Status Perusahaan
		'status_tahun',
		'status_usaha',
		'status_pemodalan',
		'status_pj',
		'status_manajer',
		'status_karyawan',

		// Dokumen legalitas perusahaan
		'dokumen_akte',
		'dokumen_tahun',
		'dokumen_npwp',
		'dokumen_siup',
		'dokumen_tdp',
		'dokumen_iui',
		'dokumen_situ',
		// Sistem manajemen
		'sm_punya',
		'sm_sertifikasi',
		'sm_so');
		'sm_jobdesc',
		'sm_sop');
		'sm_arsip',
		'sm_audit',
		'sm_tqc');
		'sm_satisfaction',
		// Kelengkapan Sarana dan Prasarana
		'sarana_luas_kantor',
		'sarana_kondisi_kantor',
		'sarana_nilai_kantor',
		'sarana_luas_gudang',
		'sarana_kondisi_gudang',
		'sarana_nilai_gudang',
		'sarana_jumlah_mobil',
		'sarana_nilai_mobil',
		'sarana_jumlah_angkutan',
		'sarana_nilai_angkutan',
		// Potensi Perluasan
		'potensi_perluasan',

		// Efisiensi dan efektivitas
		'efisiensi_standar',
		'efisiensi_jumlah',
		'efisiensi_kapasitas',
		'efisiensi_umur',
		'efisiensi_perawatan',
		'efisiensi_rendemen',
		'efisiensi_variasi',
		// Kebutuhan energi
		'energi_pln',
		'energi_genset',
		// Penggunaan energi alternatif selain PLN dan Genset
		'alternatif_energi',
		// Inovasi produk dan proses produksi
		'inovasi_produk',

		// Nilai Modal
		'modal_awal',
		'modal_sendiri',
		'modal_luar',
		'modal_perimbangan',
		// Laba Usaha
		'laba_usaha',
		// Hubungan dengan perbankan
		'hubungan_pinjaman',
		'hubungan_frekuensi',
		'hubungan_internal',
		'hubungan_eksternal',
		// Analisa aspek rasio keuangan
		'rasio_kas',
		'rasio_piutang',
		'rasio_persediaan',
		'rasio_hutang_lancar',
		'rasio_hutang_pendek',
		'rasio_tanah',
		'rasio_bangunan',
		'rasio_mesin',
		'rasio_kendaraan',
		'rasio_inventaris',
		'rasio_hutang_panjang',
		'rasio_total_aset',
		'rasio_total_hutang',
		'rasio_total_modal',
		'rasio_total_penjualan',
		'rasio_total_pengeluaran',

		// Pemenuhan tenaga kerja
		'tk_jumlah',
		'tk_kompetisi',
		// Produktivitas Kerja
		'produktif_jam',
		'produktif_shift',
		'produktif_upah',
		// Fasilitas untuk tenaga kerja
		'fasilitas_tk',

		// Strategi pemasaran
		'marketing_strategy',
		// Bauran pemasaran
		'mix_product',
		'mix_price',
		'mix_place',
		'mix_promotion',
		// Penguasaan pemasaran
		'market_share',
		// Cakupan pemasaran
		'market_coverage',
		// Persaingan
		'market_competition',

		// Output
		'output_skor',
		'output_keputusan',
		'output_keputusan_detail',
		// Saran
		'saran_manajerial_score',
		'saran_manajerial',
		'saran_mesin_score',
		'saran_mesin',
		'saran_keuangan_score',
		'saran_keuangan',
		'saran_sdm_score',
		'saran_sdm',
		'saran_marketing_score',
		'saran_marketing',
	);
}
