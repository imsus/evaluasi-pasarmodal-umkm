<?php

class KuesionerNewTableSeeder extends Seeder {

    public function run()
    {
        DB::table('kuesioner_new')->delete();

        KuesionerNew::create(array(
        	'user' => 'umkm',

        	// Kontak Perusahaan
			'kontak_nama' => 'Saung Ayam',
			'kontak_gopublik' => 0,
			'kontak_alamat' => 'Jl. H.R Rasuna Said',
			'kontak_kota' => 'Kuningan, Jakarta Selatan',
			'kontak_telepon' => '021 1234 5678',
			'kontak_fax' => '021 1234 5678',
			'kontak_handphone' => '021 1234 5678',
			'kontak_website' => 'http://www.google.com',
			// Status Perusahaan
			'status_tahun' => '2000',
			'status_usaha' => 0,
			'status_pemodalan' => 0,
			'status_pj' => 'Mas Budi',
			'status_manajer' => 4,
			'status_karyawan' => 10,

			// Dokumen legalitas perusahaan
			'dokumen_akte' => 1,
			'dokumen_tahun' => '1999',
			'dokumen_npwp' => 0,
			'dokumen_siup' => 0,
			'dokumen_tdp' => 0,
			'dokumen_iui' => 0,
			'dokumen_situ' => 0,
			// Sistem manajemen
			'sm_punya' => 3,
			'sm_sertifikasi' => 4,
			'sm_so' => 2,
			'sm_jobdesc' => 2,
			'sm_sop' => 2,
			'sm_arsip' => 2,
			'sm_audit' => 2,
			'sm_tqc' => 2,
			'sm_satisfaction' => 2,
			// Kelengkapan Sarana dan Prasarana
			'sarana_luas_kantor' => 1,
			'sarana_kondisi_kantor' => 1,
			'sarana_nilai_kantor' => 2,
			'sarana_luas_gudang' => 1,
			'sarana_kondisi_gudang' => 1,
			'sarana_nilai_gudang' => 2,
			'sarana_jumlah_mobil' => 1,
			'sarana_nilai_mobil' => 2,
			'sarana_jumlah_angkutan' => 1,
			'sarana_nilai_angkutan' => 1,
			// Potensi Perluasan
			'potensi_perluasan' => 3,

			// Efisiensi dan efektivitas
			'efisiensi_standar' => 1,
			'efisiensi_jumlah' => 2,
			'efisiensi_kapasitas' => 3,
			'efisiensi_umur' => 3,
			'efisiensi_perawatan' => 3,
			'efisiensi_rendemen' => 3,
			'efisiensi_variasi' => 3,
			// Kebutuhan energi
			'energi_pln' => 3,
			'energi_genset' => 3,
			// Penggunaan energi alternatif selain PLN dan Genset
			'alternatif_energi' => 3,
			// Inovasi produk dan proses produksi
			'inovasi_produk' => 3,

			'rasio_kas' => 5000000,
			'rasio_piutang' => 5000000,
			'rasio_persediaan' => 5000000,
			'rasio_hutang_lancar' => 5000000,
			'rasio_hutang_pendek' => 5000000,
			'rasio_tanah' => 5000000,
			'rasio_bangunan' => 5000000,
			'rasio_mesin' => 5000000,
			'rasio_kendaraan' => 5000000,
			'rasio_inventaris' => 5000000,
			'rasio_hutang_panjang' => 5000000,
			'rasio_total_penjualan' => 5000000,
			'rasio_total_pengeluaran' => 5000000,
			'modal_awal' => 5000000,
			'modal_sendiri' => 5000000,
			'modal_luar' => 5000000,

			'modal_perimbangan' => 0.5,
			'laba_usaha' => 0,
			'rasio_likuiditas' => 1.5,
			'rasio_solvabilitas' => 2.67,
			'rasio_profitabilitas' => 0,

			'modal_awal_score' => 1,
			'modal_sendiri_score' => 1,
			'modal_luar_score' => 1,
			'modal_perimbangan_score' => 3,
			'laba_usaha_score' => 1,
			'rasio_likuiditas_score' => 5,
			'rasio_solvabilitas_score' => 5,
			'rasio_profitabilitas_score' => 1,
			'hubungan_pinjaman' => 3,
			'hubungan_frekuensi' => 3,
			'hubungan_internal' => 3,
			'hubungan_eksternal' => 3,

			// Pemenuhan tenaga kerja
			'tk_jumlah' => 3,
			'tk_kompetisi' => 3,
			// Produktivitas Kerja
			'produktif_jam' => 3,
			'produktif_shift' => 3,
			'produktif_upah' => 3,
			// Fasilitas untuk tenaga kerja
			'fasilitas_tk' => 3,

			// Strategi pemasaran
			'marketing_strategy' => 3,
			// Bauran pemasaran
			'mix_product' => 3,
			'mix_price' => 3,
			'mix_place' => 3,
			'mix_promotion' => 3,
			// Penguasaan pemasaran
			'market_share' => 3,
			// Cakupan pemasaran
			'market_coverage' => 3,
			// Persaingan
			'market_competition' => 3,

			// Output
			'output_skor' => null,
			'output_keputusan' => null,
			'output_keputusan_detail' => null,
			// Saran
			'saran_manajerial_score' => null,
			'saran_manajerial' => null,
			'saran_mesin_score' => null,
			'saran_mesin' => null,
			'saran_keuangan_score' => null,
			'saran_keuangan' => null,
			'saran_sdm_score' => null,
			'saran_sdm' => null,
			'saran_marketing_score' => null,
			'saran_marketing' => null,
    	));
    }

}
