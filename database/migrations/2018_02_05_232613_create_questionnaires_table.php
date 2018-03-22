<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
	    	// Essential
	    	$table->bigIncrements('id');
	        $table->timestamps();
	        $table->softDeletes();
	        $table->string('user_id');
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
			$table->string('dokumen_tahun')->nullable();
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
			// Analisa aspek rasio keuangan
			$table->bigInteger('rasio_kas')->nullable();
			$table->bigInteger('rasio_piutang')->nullable();
			$table->bigInteger('rasio_persediaan')->nullable();
			$table->bigInteger('rasio_hutang_lancar')->nullable();
			$table->bigInteger('rasio_hutang_pendek')->nullable();
			$table->bigInteger('rasio_tanah')->nullable();
			$table->bigInteger('rasio_bangunan')->nullable();
			$table->bigInteger('rasio_mesin')->nullable();
			$table->bigInteger('rasio_kendaraan')->nullable();
			$table->bigInteger('rasio_inventaris')->nullable();
			$table->bigInteger('rasio_hutang_panjang')->nullable();
			$table->bigInteger('rasio_total_penjualan')->nullable();
			$table->bigInteger('rasio_total_pengeluaran')->nullable();
			$table->bigInteger('modal_awal')->nullable();
			$table->bigInteger('modal_sendiri')->nullable();
			$table->bigInteger('modal_luar')->nullable();
			// $table->float('modal_perimbangan')->nullable(); // Calculated
			// $table->bigInteger('laba_usaha')->nullable(); // Calculated
			// $table->float('rasio_likuiditas')->nullable(); // Calculated
			// $table->float('rasio_solvabilitas')->nullable(); // Calculated
			// $table->float('rasio_profitabilitas')->nullable(); // Calculated
			// $table->tinyInteger('modal_awal_score')->nullable(); // Calculated
			// $table->tinyInteger('modal_sendiri_score')->nullable(); // Calculated
			// $table->tinyInteger('modal_luar_score')->nullable(); // Calculated
			// $table->tinyInteger('modal_perimbangan_score')->nullable(); // Calculated
			// $table->tinyInteger('laba_usaha_score')->nullable(); // Calculated
			// $table->tinyInteger('rasio_likuiditas_score')->nullable(); // Calculated
			// $table->tinyInteger('rasio_solvabilitas_score')->nullable(); // Calculated
            // $table->tinyInteger('rasio_profitabilitas_score')->nullable(); // Calculated
            // Hubungan dengan Perbankan
			$table->tinyInteger('hubungan_pinjaman');
			$table->tinyInteger('hubungan_frekuensi');
			$table->tinyInteger('hubungan_internal');
			$table->tinyInteger('hubungan_eksternal');
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
			// $table->string('output_skor')->nullable(); // Calculated
			// $table->string('output_keputusan')->nullable(); // Calculated
			// $table->string('output_keputusan_detail')->nullable(); // Calculated
			// Saran
			// $table->string('saran_manajerial_score')->nullable(); // Calculated
			// $table->string('saran_manajerial')->nullable(); // Calculated
			// $table->string('saran_mesin_score')->nullable(); // Calculated
			// $table->string('saran_mesin')->nullable(); // Calculated
			// $table->string('saran_keuangan_score')->nullable(); // Calculated
			// $table->string('saran_keuangan')->nullable(); // Calculated
			// $table->string('saran_sdm_score')->nullable(); // Calculated
			// $table->string('saran_sdm')->nullable(); // Calculated
			// $table->string('saran_marketing_score')->nullable(); // Calculated
			// $table->string('saran_marketing')->nullable(); // Calculated
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaires');
    }
}
