<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKuesioner2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('kuesioners2', function($table)
	    {
	    	// Essential
	    	$table->bigIncrements('id');
	        $table->timestamps();
	        $table->softDeletes();
	        $table->string('user');

	        // Kontak Perusahaan
			$table->string('kontak_nama');
			$table->boolean('kontak_gopublik')->default(0);
			$table->string('kontak_alamat')->nullable();
			$table->string('kontak_kota')->nullable();
			$table->string('kontak_telepon')->nullable();
			$table->string('kontak_fax')->nullable();
			$table->string('kontak_handphone')->nullable();
			$table->string('kontak_website')->nullable();
			// Status Perusahaan
			$table->string('status_tahun')->nullable();
			$table->string('status_usaha')->nullable();
			$table->string('status_pemodalan')->nullable();
			$table->string('status_pj')->nullable();
			$table->tinyInteger('status_manajer')->nullable();
			$table->smallInteger('status_karyawan')->nullable();

			// Dokumen legalitas perusahaan
			$table->string('dokumen_akte');
			$table->string('dokumen_tahun');
			$table->boolean('dokumen_npwp')->default(0);
			$table->boolean('dokumen_siup')->default(0);
			$table->boolean('dokumen_tdp')->default(0);
			$table->boolean('dokumen_iui')->default(0);
			$table->boolean('dokumen_situ')->default(0);
			// Sistem manajemen
			$table->tinyInteger('sm_punya');
			$table->tinyInteger('sm_sertifikasi');
			$table->tinyInteger('sm_so');
			$table->tinyInteger('sm_jobdesc');
			$table->tinyInteger('sm_sop');
			$table->tinyInteger('sm_arsip');
			$table->tinyInteger('sm_audit');
			$table->tinyInteger('sm_tqc');
			$table->tinyInteger('sm_satisfaction');
			// Kelengkapan Sarana dan Prasarana
			$table->tinyInteger('sarana_luas_kantor');
			$table->tinyInteger('sarana_kondisi_kantor');
			$table->tinyInteger('sarana_nilai_kantor');
			$table->tinyInteger('sarana_luas_gudang');
			$table->tinyInteger('sarana_kondisi_gudang');
			$table->tinyInteger('sarana_nilai_gudang');
			$table->tinyInteger('sarana_jumlah_mobil');
			$table->tinyInteger('sarana_nilai_mobil');
			$table->tinyInteger('sarana_jumlah_angkutan');
			$table->tinyInteger('sarana_nilai_angkutan');
			// Potensi Perluasan
			$table->tinyInteger('potensi_perluasan');

			// Efisiensi dan efektivitas
			$table->tinyInteger('efisiensi_standar');
			$table->tinyInteger('efisiensi_jumlah');
			$table->tinyInteger('efisiensi_kapasitas');
			$table->tinyInteger('efisiensi_umur');
			$table->tinyInteger('efisiensi_perawatan');
			$table->tinyInteger('efisiensi_rendemen');
			$table->tinyInteger('efisiensi_variasi');
			// Kebutuhan energi
			$table->tinyInteger('energi_pln');
			$table->tinyInteger('energi_genset');
			// Penggunaan energi alternatif selain PLN dan Genset
			$table->tinyInteger('alternatif_energi');
			// Inovasi produk dan proses produksi
			$table->tinyInteger('inovasi_produk');

			// Nilai Modal
			$table->bigInteger('modal_awal');
			$table->bigInteger('modal_sendiri');
			$table->bigInteger('modal_luar');
			$table->tinyInteger('modal_perimbangan');
			// Laba Usaha
			$table->bigInteger('laba_usaha');
			// Hubungan dengan perbankan
			$table->tinyInteger('hubungan_pinjaman');
			$table->tinyInteger('hubungan_frekuensi');
			$table->tinyInteger('hubungan_internal');
			$table->tinyInteger('hubungan_eksternal');
			// Analisa aspek rasio keuangan
			$table->bigInteger('rasio_kas');
			$table->bigInteger('rasio_piutang');
			$table->bigInteger('rasio_persediaan');
			$table->bigInteger('rasio_hutang_lancar');
			$table->bigInteger('rasio_hutang_pendek');
			$table->bigInteger('rasio_tanah');
			$table->bigInteger('rasio_bangunan');
			$table->bigInteger('rasio_mesin');
			$table->bigInteger('rasio_kendaraan');
			$table->bigInteger('rasio_inventaris');
			$table->bigInteger('rasio_hutang_panjang');
			$table->bigInteger('rasio_total_aset');
			$table->bigInteger('rasio_total_hutang');
			$table->bigInteger('rasio_total_modal');
			$table->bigInteger('rasio_total_penjualan');
			$table->bigInteger('rasio_total_pengeluaran');
			$table->float('rasio_likuiditas');
			$table->float('rasio_solvabilitas');
			$table->float('rasio_profitabilitas');

			// Pemenuhan tenaga kerja
			$table->tinyInteger('tk_jumlah');
			$table->tinyInteger('tk_kompetisi');
			// Produktivitas Kerja
			$table->tinyInteger('produktif_jam');
			$table->tinyInteger('produktif_shift');
			$table->tinyInteger('produktif_upah');
			// Fasilitas untuk tenaga kerja
			$table->tinyInteger('fasilitas_tk');

			// Strategi pemasaran
			$table->tinyInteger('marketing_strategy');
			// Bauran pemasaran
			$table->tinyInteger('mix_product');
			$table->tinyInteger('mix_price');
			$table->tinyInteger('mix_place');
			$table->tinyInteger('mix_promotion');
			// Penguasaan pemasaran
			$table->tinyInteger('market_share');
			// Cakupan pemasaran
			$table->tinyInteger('market_coverage');
			// Persaingan
			$table->tinyInteger('market_competition');

			// Output
			$table->string('output_skor')->nullable();
			$table->string('output_keputusan')->nullable();
			$table->string('output_keputusan_detail')->nullable();
			// Saran
			$table->string('saran_manajerial_score')->nullable();
			$table->string('saran_manajerial')->nullable();
			$table->string('saran_mesin_score')->nullable();
			$table->string('saran_mesin')->nullable();
			$table->string('saran_keuangan_score')->nullable();
			$table->string('saran_keuangan')->nullable();
			$table->string('saran_sdm_score')->nullable();
			$table->string('saran_sdm')->nullable();
			$table->string('saran_marketing_score')->nullable();
			$table->string('saran_marketing')->nullable();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('kuesioners2');
	}

}
