<?php

class KuesionerNewController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		//
		$this->beforeFilter('auth', array('kuesioner' => 'login'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
		$kuesioners = KuesionerNew::all();
		return View::make('kuesioner-new.index')->with('kuesioners', $kuesioners);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNew()
	{
		//
		return View::make('kuesioner-new.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postNew()
	{

		$kuesioner = new KuesionerNew;

		$kuesioner->fill(Input::all());

		$kuesioner->user = Auth::user()->username;

		$kuesioner->modal_perimbangan = round($kuesioner->modal_luar / ($kuesioner->modal_sendiri + $kuesioner->modal_luar), 2);
		$kuesioner->laba_usaha = ($kuesioner->total_penjualan - $kuesioner->total_pengeluaran);
		$kuesioner->rasio_likuiditas = round(($kuesioner->rasio_kas + $kuesioner->rasio_piutang + $kuesioner->rasio_persediaan) / ($kuesioner->rasio_hutang_lancar + $kuesioner->rasio_hutang_pendek), 2);
		$kuesioner->rasio_solvabilitas = round(($kuesioner->rasio_kas + $kuesioner->rasio_piutang + $kuesioner->rasio_persediaan + $kuesioner->rasio_tanah + $kuesioner->rasio_bangunan + $kuesioner->rasio_mesin + $kuesioner->rasio_kendaraan + $kuesioner->rasio_inventaris) / ($kuesioner->rasio_hutang_lancar + $kuesioner->rasio_hutang_pendek + $kuesioner->rasio_hutang_panjang), 2);
		$kuesioner->rasio_profitabilitas = round(($kuesioner->laba_usaha) / ($kuesioner->modal_sendiri + $kuesioner->modal_luar), 2);

		if ($kuesioner->modal_awal <= 10000000) { $kuesioner->modal_awal_score = 1; }
		elseif ($kuesioner->modal_awal <= 20000000) { $kuesioner->modal_awal_score = 2; }
		elseif ($kuesioner->modal_awal <= 50000000) { $kuesioner->modal_awal_score = 3; }
		elseif ($kuesioner->modal_awal <= 100000000) { $kuesioner->modal_awal_score = 4; }
		elseif ($kuesioner->modal_awal > 100000000) { $kuesioner->modal_awal_score = 5; }

		if ($kuesioner->modal_sendiri <= 10000000) { $kuesioner->modal_sendiri_score = 1; }
		elseif ($kuesioner->modal_sendiri <= 20000000) { $kuesioner->modal_sendiri_score = 2; }
		elseif ($kuesioner->modal_sendiri <= 50000000) { $kuesioner->modal_sendiri_score = 3; }
		elseif ($kuesioner->modal_sendiri <= 100000000) { $kuesioner->modal_sendiri_score = 4; }
		elseif ($kuesioner->modal_sendiri > 100000000) { $kuesioner->modal_sendiri_score = 5; }

		if ($kuesioner->modal_luar <= 10000000) { $kuesioner->modal_luar_score = 1; }
		elseif ($kuesioner->modal_luar <= 20000000) { $kuesioner->modal_luar_score = 2; }
		elseif ($kuesioner->modal_luar <= 50000000) { $kuesioner->modal_luar_score = 3; }
		elseif ($kuesioner->modal_luar <= 100000000) { $kuesioner->modal_luar_score = 4; }
		elseif ($kuesioner->modal_luar > 100000000) { $kuesioner->modal_luar_score = 5; }

		if ($kuesioner->modal_perimbangan == 1) { $kuesioner->modal_perimbangan_score = 1; }
		elseif ($kuesioner->modal_perimbangan >= 0.75) { $kuesioner->modal_perimbangan_score = 2; }
		elseif ($kuesioner->modal_perimbangan >= 0.5) { $kuesioner->modal_perimbangan_score = 3; }
		elseif ($kuesioner->modal_perimbangan >= 0.25) { $kuesioner->modal_perimbangan_score = 4; }
		elseif ($kuesioner->modal_perimbangan >= 0) { $kuesioner->modal_perimbangan_score = 5; }

		if ($kuesioner->laba_usaha <= 10000000) { $kuesioner->laba_usaha_score = 1; }
		elseif ($kuesioner->laba_usaha <= 20000000) { $kuesioner->laba_usaha_score = 2; }
		elseif ($kuesioner->laba_usaha <= 50000000) { $kuesioner->laba_usaha_score = 3; }
		elseif ($kuesioner->laba_usaha <= 100000000) { $kuesioner->laba_usaha_score = 4; }
		elseif ($kuesioner->laba_usaha > 100000000) { $kuesioner->laba_usaha_score = 5; }

		if ($kuesioner->rasio_likuiditas < 0.5 || $kuesioner->rasio_likuiditas > 2) { $kuesioner->rasio_likuiditas_score = 1; }
		elseif ($kuesioner->rasio_likuiditas >= 0.5 && $kuesioner->rasio_likuiditas < 0.75) { $kuesioner->rasio_likuiditas_score = 2; }
		elseif ($kuesioner->rasio_likuiditas >= 0.75 && $kuesioner->rasio_likuiditas < 1) { $kuesioner->rasio_likuiditas_score = 3; }
		elseif ($kuesioner->rasio_likuiditas >= 1 && $kuesioner->rasio_likuiditas < 1.5) { $kuesioner->rasio_likuiditas_score = 4; }
		elseif ($kuesioner->rasio_likuiditas >= 1.5 && $kuesioner->rasio_likuiditas < 2) { $kuesioner->rasio_likuiditas_score = 5; }

		if ($kuesioner->rasio_solvabilitas < 0.5) { $kuesioner->rasio_solvabilitas_score = 1; }
		elseif ($kuesioner->rasio_solvabilitas >= 0.5 && $kuesioner->rasio_solvabilitas < 1) { $kuesioner->rasio_solvabilitas_score = 2; }
		elseif ($kuesioner->rasio_solvabilitas >= 1 && $kuesioner->rasio_solvabilitas < 1.5) { $kuesioner->rasio_solvabilitas_score = 3; }
		elseif ($kuesioner->rasio_solvabilitas >= 1.5 && $kuesioner->rasio_solvabilitas < 2) { $kuesioner->rasio_solvabilitas_score = 4; }
		elseif ($kuesioner->rasio_solvabilitas > 2) { $kuesioner->rasio_solvabilitas_score = 5; }

		if ($kuesioner->rasio_profitabilitas < 0.05) { $kuesioner->rasio_profitabilitas_score = 1; }
		elseif ($kuesioner->rasio_profitabilitas >= 0.05 && $kuesioner->rasio_profitabilitas < 0.1) { $kuesioner->rasio_profitabilitas_score = 2; }
		elseif ($kuesioner->rasio_profitabilitas >= 0.1 && $kuesioner->rasio_profitabilitas < 0.15) { $kuesioner->rasio_profitabilitas_score = 3; }
		elseif ($kuesioner->rasio_profitabilitas >= 0.15 && $kuesioner->rasio_profitabilitas < 0.25) { $kuesioner->rasio_profitabilitas_score = 4; }
		elseif ($kuesioner->rasio_profitabilitas >= 0.25) { $kuesioner->rasio_profitabilitas_score = 5; }

		// Output
		$kuesioner->output_skor =
			$kuesioner->saran_manajerial_score
			+ $kuesioner->saran_mesin_score
			+ $kuesioner->saran_keuangan_score
			+ $kuesioner->saran_sdm_score
			+ $kuesioner->saran_marketing_score;

		if ($kuesioner->kontak_gopublik)
			{ $kuesioner->output_keputusan = 'Anda sudah Go Publik'; }
		else {
			if (($kuesioner->saran_manajerial_score / 290) <= 1)
				{ $kuesioner->output_keputusan = 'Emiten dan Invest (Go Publik)'; }
			elseif (($kuesioner->saran_manajerial_score / 290) <= 0.67)
				{ $kuesioner->output_keputusan = 'Invest'; }
			elseif (($kuesioner->saran_manajerial_score / 290) <= 0.33)
				{ $kuesioner->output_keputusan = 'Tidak Go Publik dan Invest'; }
		}

		$kuesioner->output_keputusan_detail = null;
		// Saran
		$kuesioner->saran_manajerial_score =
			array_sum(array($kuesioner->dokumen_npwp, $kuesioner->dokumen_siup, $kuesioner->dokumen_tdp, $kuesioner->dokumen_iui, $kuesioner->dokumen_situ))
			+ $kuesioner->sm_punya
			+ $kuesioner->sm_sertifikasi
			+ $kuesioner->sm_so
			+ $kuesioner->sm_jobdesc
			+ $kuesioner->sm_sop
			+ $kuesioner->sm_arsip
			+ $kuesioner->sm_audit
			+ $kuesioner->sm_tqc
			+ $kuesioner->sm_satisfaction
			+ $kuesioner->sarana_luas_kantor
			+ $kuesioner->sarana_kondisi_kantor
			+ $kuesioner->sarana_nilai_kantor
			+ $kuesioner->sarana_luas_gudang
			+ $kuesioner->sarana_kondisi_gudang
			+ $kuesioner->sarana_nilai_gudang
			+ $kuesioner->sarana_jumlah_mobil
			+ $kuesioner->sarana_nilai_mobil
			+ $kuesioner->sarana_jumlah_angkutan
			+ $kuesioner->sarana_nilai_angkutan
			+ $kuesioner->potensi_perluasan;

			$manajerial_dokumen = array_sum(array($kuesioner->dokumen_npwp, $kuesioner->dokumen_siup, $kuesioner->dokumen_tdp, $kuesioner->dokumen_iui, $kuesioner->dokumen_situ));
			$manajerial_sistem = $kuesioner->sm_punya + $kuesioner->sm_sertifikasi + $kuesioner->sm_so + $kuesioner->sm_jobdesc + $kuesioner->sm_sop + $kuesioner->sm_arsip + $kuesioner->sm_audit + $kuesioner->sm_tqc + $kuesioner->sm_satisfaction;

			if (($manajerial_dokumen / 5) < 0.5)
				{ $manajerial_dokumen_msg = 'Lengkapi dokumen legalitas perusahaan Anda agar mendapatkan poin lebih tinggi.'; }
			else
				{ $manajerial_dokumen_msg = 'Pertahankan kelengkapan dokumen legalitas perusahaan Anda.'; }

			if (($manajerial_sistem / 45) < 0.5)
				{ $manajerial_sistem_msg = 'Perbaiki Sistem Manajemen perusahaan Anda agar pengelolaan perusahaan Anda menjadi lebih teratur.'; }
			else
				{ $manajerial_sistem_msg = 'Pertahankan Sistem Manajemen di perusahaan Anda.'; }

			$kuesioner->saran_manajerial = $manajerial_dokumen_msg . ' ' . $manajerial_sistem_msg;

		$kuesioner->saran_mesin_score =
			$kuesioner->efisiensi_standar
			+ $kuesioner->efisiensi_jumlah
			+ $kuesioner->efisiensi_kapasitas
			+ $kuesioner->efisiensi_umur
			+ $kuesioner->efisiensi_perawatan
			+ $kuesioner->efisiensi_rendemen
			+ $kuesioner->efisiensi_variasi
			+ $kuesioner->energi_pln
			+ $kuesioner->energi_genset
			+ $kuesioner->alternatif_energi
			+ $kuesioner->inovasi_produk;

		$mesin_efisiensi = $kuesioner->efisiensi_standar + $kuesioner->efisiensi_jumlah + $kuesioner->efisiensi_kapasitas + $kuesioner->efisiensi_umur + $kuesioner->efisiensi_perawatan + $kuesioner->efisiensi_rendemen + $kuesioner->efisiensi_variasi;
		$mesin_inovasi = $kuesioner->inovasi_produk;

		if (($mesin_efisiensi / 35) < 0.5)
			{ $mesin_efisiensi_msg = 'Tingkatkan efisiensi Produksi Anda agar produktivitas perusahaan Anda meningkat secara menyeluruh.'; }
		else
			{ $mesin_efisiensi_msg = 'Pertahankan efisiensi produksi dan mesin di perusahaan Anda.'; }

		if (($mesin_inovasi / 5) < 0.5)
			{ $mesin_inovasi_msg = 'Tingkatkan inovasi produk dan proses produksi dalam perusahaan Anda'; }
		else
			{ $mesin_inovasi_msg = 'Pertahankan inovasi produk dan proses produksi.'; }

		$kuesioner->saran_mesin = $mesin_efisiensi_msg . ' ' . $mesin_inovasi_msg;

		$kuesioner->saran_keuangan_score =
			$kuesioner->laba_usaha_score
			+ $kuesioner->modal_awal_score
			+ $kuesioner->modal_sendiri_score
			+ $kuesioner->modal_luar_score
			+ $kuesioner->modal_perimbangan_score
			+ $kuesioner->rasio_likuiditas_score
			+ $kuesioner->rasio_solvabilitas_score
			+ $kuesioner->rasio_profitabilitas_score;
		$kuesioner->saran_keuangan = null;

		$kuesioner->saran_sdm_score =
			$kuesioner->tk_jumlah
			+ $kuesioner->tk_kompetisi
			+ $kuesioner->produktif_jam
			+ $kuesioner->produktif_shift
			+ $kuesioner->produktif_upah
			+ $kuesioner->fasilitas_tk;

		$sdm_tk = $kuesioner->tk_jumlah + $kuesioner->tk_kompetisi;
		$sdm_produktivitas = $kuesioner->produktif_jam + $kuesioner->produktif_shift + $kuesioner->produktif_upah;
		$sdm_fasilitas = $kuesioner->fasilitas_tk;

		if (($sdm_tk / 10) < 0.5)
			{ $sdm_tk_msg = 'Tingkatkan jumlah tenaga kerja dan kompetensi mereka di dalam perusahaan Anda agar perusahaan dapat tumbuh lebih besar.'; }
		else
			{ $sdm_tk_msg = 'Pertahankan jumlah tenaga kerja Anda dan selalu tingkatkan kompetensi mereka.'; }

		if (($sdm_produktivitas / 15) < 0.5)
			{ $sdm_produktivitas_msg = 'Tingkatkan produktivitas dengan meningkatkan lama jam kerja, jumlah shift, dan standar upah karyawan.'; }
		else
			{ $sdm_produktivitas_msg = 'Pertahankan produktivitas karyawan, dan selalu ikuti standar upah karyawan.'; }

		if (($sdm_fasilitas / 5) < 0.5)
			{ $sdm_fasilitas_msg = 'Tambahkan fasilitas kepada karyawan, terutama fasilitas dasar.'; }
		else
			{ $sdm_fasilitas_msg = 'Pertahankan fasilitas-fasilitas yang diberikan dari perusahaan.'; }

		$kuesioner->saran_sdm = $sdm_tk . ' ' . $sdm_produktivitas . ' ' . $sdm_fasilitas;

		$kuesioner->saran_marketing_score =
			$kuesioner->marketing_strategy
			+ $kuesioner->mix_product
			+ $kuesioner->mix_price
			+ $kuesioner->mix_place
			+ $kuesioner->mix_promotion
			+ $kuesioner->market_share
			+ $kuesioner->market_coverage
			+ $kuesioner->market_competition;

		$marketing_strat = $kuesioner->marketing_strategy;
		$marketing_mix = $kuesioner->mix_product + $kuesioner->mix_price + $kuesioner->mix_place + $kuesioner->mix_promotion;
		$marketing_share = $kuesioner->market_share;
		$marketing_coverage = $kuesioner->market_coverage;

		if (($marketing_strat / 5) < 0.5)
			{ $marketing_strat_msg = 'Formulasikan strategi pemasaran Anda. Agar perusahaan lebih fokus.'; }
		else
			{ $marketing_strat_msg = 'Pertahankan strategi pemasaran di perusahaan Anda.'; }

		if (($marketing_mix / 20) < 0.5)
			{ $marketing_mix_msg = 'Bauran pemasaran Anda perlu lebih ditingkatkan lagi.'; }
		else
			{ $marketing_mix_msg = 'Pertahankan konsep bauran pemasaran perusahaan Anda.'; }

		if (($marketing_share / 5) < 0.5)
			{ $marketing_share_msg = 'Perluas lebih banyak lagi penguasaan pasar Anda.'; }
		else
			{ $marketing_share_msg = 'Pertahankan penguasaan pasar untuk produk Anda.'; }

		if (($marketing_coverage / 5) < 0.5)
			{ $marketing_coverage_msg = 'Tingkatkan cakupan pasar Anda. Lebih baik lagi jika dapat menembus pasar internasional.'; }
		else
			{ $marketing_coverage_msg = 'Pertahankan cakupan pasar Anda agar dapat mencapai pasar internasional lebih banyak.'; }

		$kuesioner->saran_marketing = $marketing_strat . ' ' . $marketing_mix . ' ' . $marketing_share . ' ' . $marketing_share;

		$kuesioner->save();

		return Redirect::to('kuesioner-new');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDetail($id)
	{
		//

		$kuesioner = KuesionerNew::find($id);

		function progressClass($progress) {
			if ($progress <= .33) {
				return 'progress-bar-danger';
			} elseif ($progress <= .67) {
				return 'progress-bar-warning';
			} elseif ($progress <= 1) {
				return 'progress-bar-success';
			}
		}

		function labelClass($score) {
			if ($score <= 1) {
				return 'label-danger';
			} elseif ($score <= 3) {
				return 'label-warning';
			} elseif ($score <= 5) {
				return 'label-success';
			}
		}

		return View::make('kuesioner-new.detail')->with('kuesioner', $kuesioner);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		//
		$kuesioner = KuesionerNew::find($id);
		return View::make('kuesioner-new.edit')->with('kuesioner', $kuesioner);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putEdit($id)
	{
		//
		$kuesioner = KuesionerNew::find($id);

		$kuesioner->fill(Input::all());

		$kuesioner->user = Auth::user()->username;

		$kuesioner->modal_perimbangan = round(($kuesioner->modal_luar / ($kuesioner->modal_sendiri + $kuesioner->modal_luar)), 2);
		$kuesioner->laba_usaha = ($kuesioner->total_penjualan - $kuesioner->total_pengeluaran);
		$kuesioner->rasio_likuiditas = round(($kuesioner->rasio_kas + $kuesioner->rasio_piutang + $kuesioner->rasio_persediaan) / ($kuesioner->rasio_hutang_lancar + $kuesioner->rasio_hutang_pendek), 2);
		$kuesioner->rasio_solvabilitas = round(($kuesioner->rasio_kas + $kuesioner->rasio_piutang + $kuesioner->rasio_persediaan + $kuesioner->rasio_tanah + $kuesioner->rasio_bangunan + $kuesioner->rasio_mesin + $kuesioner->rasio_kendaraan + $kuesioner->rasio_inventaris) / ($kuesioner->rasio_hutang_lancar + $kuesioner->rasio_hutang_pendek + $kuesioner->rasio_hutang_panjang), 2);
		$kuesioner->rasio_profitabilitas = round(($kuesioner->laba_usaha) / ($kuesioner->modal_sendiri + $kuesioner->modal_luar), 2);

		if ($kuesioner->modal_awal <= 10000000) { $kuesioner->modal_awal_score = 1; }
		elseif ($kuesioner->modal_awal <= 20000000) { $kuesioner->modal_awal_score = 2; }
		elseif ($kuesioner->modal_awal <= 50000000) { $kuesioner->modal_awal_score = 3; }
		elseif ($kuesioner->modal_awal <= 100000000) { $kuesioner->modal_awal_score = 4; }
		elseif ($kuesioner->modal_awal > 100000000) { $kuesioner->modal_awal_score = 5; }

		if ($kuesioner->modal_sendiri <= 10000000) { $kuesioner->modal_sendiri_score = 1; }
		elseif ($kuesioner->modal_sendiri <= 20000000) { $kuesioner->modal_sendiri_score = 2; }
		elseif ($kuesioner->modal_sendiri <= 50000000) { $kuesioner->modal_sendiri_score = 3; }
		elseif ($kuesioner->modal_sendiri <= 100000000) { $kuesioner->modal_sendiri_score = 4; }
		elseif ($kuesioner->modal_sendiri > 100000000) { $kuesioner->modal_sendiri_score = 5; }

		if ($kuesioner->modal_luar <= 10000000) { $kuesioner->modal_luar_score = 1; }
		elseif ($kuesioner->modal_luar <= 20000000) { $kuesioner->modal_luar_score = 2; }
		elseif ($kuesioner->modal_luar <= 50000000) { $kuesioner->modal_luar_score = 3; }
		elseif ($kuesioner->modal_luar <= 100000000) { $kuesioner->modal_luar_score = 4; }
		elseif ($kuesioner->modal_luar > 100000000) { $kuesioner->modal_luar_score = 5; }

		if ($kuesioner->modal_perimbangan == 1) { $kuesioner->modal_perimbangan_score = 1; }
		elseif ($kuesioner->modal_perimbangan >= 0.75) { $kuesioner->modal_perimbangan_score = 2; }
		elseif ($kuesioner->modal_perimbangan >= 0.5) { $kuesioner->modal_perimbangan_score = 3; }
		elseif ($kuesioner->modal_perimbangan >= 0.25) { $kuesioner->modal_perimbangan_score = 4; }
		elseif ($kuesioner->modal_perimbangan >= 0) { $kuesioner->modal_perimbangan_score = 5; }

		if ($kuesioner->laba_usaha <= 10000000) { $kuesioner->laba_usaha_score = 1; }
		elseif ($kuesioner->laba_usaha <= 20000000) { $kuesioner->laba_usaha_score = 2; }
		elseif ($kuesioner->laba_usaha <= 50000000) { $kuesioner->laba_usaha_score = 3; }
		elseif ($kuesioner->laba_usaha <= 100000000) { $kuesioner->laba_usaha_score = 4; }
		elseif ($kuesioner->laba_usaha > 100000000) { $kuesioner->laba_usaha_score = 5; }

		if ($kuesioner->rasio_likuiditas < 0.5 || $kuesioner->rasio_likuiditas > 2) { $kuesioner->rasio_likuiditas_score = 1; }
		elseif ($kuesioner->rasio_likuiditas >= 0.5 && $kuesioner->rasio_likuiditas < 0.75) { $kuesioner->rasio_likuiditas_score = 2; }
		elseif ($kuesioner->rasio_likuiditas >= 0.75 && $kuesioner->rasio_likuiditas < 1) { $kuesioner->rasio_likuiditas_score = 3; }
		elseif ($kuesioner->rasio_likuiditas >= 1 && $kuesioner->rasio_likuiditas < 1.5) { $kuesioner->rasio_likuiditas_score = 4; }
		elseif ($kuesioner->rasio_likuiditas >= 1.5 && $kuesioner->rasio_likuiditas < 2) { $kuesioner->rasio_likuiditas_score = 5; }

		if ($kuesioner->rasio_solvabilitas < 0.5) { $kuesioner->rasio_solvabilitas_score = 1; }
		elseif ($kuesioner->rasio_solvabilitas >= 0.5 && $kuesioner->rasio_solvabilitas < 1) { $kuesioner->rasio_solvabilitas_score = 2; }
		elseif ($kuesioner->rasio_solvabilitas >= 1 && $kuesioner->rasio_solvabilitas < 1.5) { $kuesioner->rasio_solvabilitas_score = 3; }
		elseif ($kuesioner->rasio_solvabilitas >= 1.5 && $kuesioner->rasio_solvabilitas < 2) { $kuesioner->rasio_solvabilitas_score = 4; }
		elseif ($kuesioner->rasio_solvabilitas > 2) { $kuesioner->rasio_solvabilitas_score = 5; }

		if ($kuesioner->rasio_profitabilitas < 0.05) { $kuesioner->rasio_profitabilitas_score = 1; }
		elseif ($kuesioner->rasio_profitabilitas >= 0.05 && $kuesioner->rasio_profitabilitas < 0.1) { $kuesioner->rasio_profitabilitas_score = 2; }
		elseif ($kuesioner->rasio_profitabilitas >= 0.1 && $kuesioner->rasio_profitabilitas < 0.15) { $kuesioner->rasio_profitabilitas_score = 3; }
		elseif ($kuesioner->rasio_profitabilitas >= 0.15 && $kuesioner->rasio_profitabilitas < 0.25) { $kuesioner->rasio_profitabilitas_score = 4; }
		elseif ($kuesioner->rasio_profitabilitas >= 0.25) { $kuesioner->rasio_profitabilitas_score = 5; }

		// Output
		$kuesioner->output_skor =
			$kuesioner->saran_manajerial_score
			+ $kuesioner->saran_mesin_score
			+ $kuesioner->saran_keuangan_score
			+ $kuesioner->saran_sdm_score
			+ $kuesioner->saran_marketing_score;

		if ($kuesioner->kontak_gopublik)
			{ $kuesioner->output_keputusan = 'Anda sudah Go Publik'; }
		else {
			if (($kuesioner->output_skor / 290) <= 0.33)
				{ $kuesioner->output_keputusan = 'Emiten dan Invest (Go Publik)'; }
			elseif (($kuesioner->output_skor / 290) <= 0.67)
				{ $kuesioner->output_keputusan = 'Invest'; }
			elseif (($kuesioner->output_skor / 290) <= 1)
				{ $kuesioner->output_keputusan = 'Tidak Go Publik dan Invest'; }
		}

		$kuesioner->output_keputusan_detail = null;
		// Saran
		$kuesioner->saran_manajerial_score =
			array_sum(array($kuesioner->dokumen_npwp, $kuesioner->dokumen_siup, $kuesioner->dokumen_tdp, $kuesioner->dokumen_iui, $kuesioner->dokumen_situ))
			+ $kuesioner->sm_punya
			+ $kuesioner->sm_sertifikasi
			+ $kuesioner->sm_so
			+ $kuesioner->sm_jobdesc
			+ $kuesioner->sm_sop
			+ $kuesioner->sm_arsip
			+ $kuesioner->sm_audit
			+ $kuesioner->sm_tqc
			+ $kuesioner->sm_satisfaction
			+ $kuesioner->sarana_luas_kantor
			+ $kuesioner->sarana_kondisi_kantor
			+ $kuesioner->sarana_nilai_kantor
			+ $kuesioner->sarana_luas_gudang
			+ $kuesioner->sarana_kondisi_gudang
			+ $kuesioner->sarana_nilai_gudang
			+ $kuesioner->sarana_jumlah_mobil
			+ $kuesioner->sarana_nilai_mobil
			+ $kuesioner->sarana_jumlah_angkutan
			+ $kuesioner->sarana_nilai_angkutan
			+ $kuesioner->potensi_perluasan;

			$manajerial_dokumen = array_sum(array($kuesioner->dokumen_npwp, $kuesioner->dokumen_siup, $kuesioner->dokumen_tdp, $kuesioner->dokumen_iui, $kuesioner->dokumen_situ));
			$manajerial_sistem = $kuesioner->sm_punya + $kuesioner->sm_sertifikasi + $kuesioner->sm_so + $kuesioner->sm_jobdesc + $kuesioner->sm_sop + $kuesioner->sm_arsip + $kuesioner->sm_audit + $kuesioner->sm_tqc + $kuesioner->sm_satisfaction;

			if (($manajerial_dokumen / 5) < 0.5)
				{ $manajerial_dokumen_msg = 'Lengkapi dokumen legalitas perusahaan Anda agar mendapatkan poin lebih tinggi.'; }
			else
				{ $manajerial_dokumen_msg = 'Pertahankan kelengkapan dokumen legalitas perusahaan Anda.'; }

			if (($manajerial_sistem / 45) < 0.5)
				{ $manajerial_sistem_msg = 'Perbaiki Sistem Manajemen perusahaan Anda agar pengelolaan perusahaan Anda menjadi lebih teratur.'; }
			else
				{ $manajerial_sistem_msg = 'Pertahankan Sistem Manajemen di perusahaan Anda.'; }

			$kuesioner->saran_manajerial = $manajerial_dokumen_msg . ' ' . $manajerial_sistem_msg;

		$kuesioner->saran_mesin_score =
			$kuesioner->efisiensi_standar
			+ $kuesioner->efisiensi_jumlah
			+ $kuesioner->efisiensi_kapasitas
			+ $kuesioner->efisiensi_umur
			+ $kuesioner->efisiensi_perawatan
			+ $kuesioner->efisiensi_rendemen
			+ $kuesioner->efisiensi_variasi
			+ $kuesioner->energi_pln
			+ $kuesioner->energi_genset
			+ $kuesioner->alternatif_energi
			+ $kuesioner->inovasi_produk;

		$mesin_efisiensi = $kuesioner->efisiensi_standar + $kuesioner->efisiensi_jumlah + $kuesioner->efisiensi_kapasitas + $kuesioner->efisiensi_umur + $kuesioner->efisiensi_perawatan + $kuesioner->efisiensi_rendemen + $kuesioner->efisiensi_variasi;
		$mesin_inovasi = $kuesioner->inovasi_produk;

		if (($mesin_efisiensi / 35) < 0.5)
			{ $mesin_efisiensi_msg = 'Tingkatkan efisiensi Produksi Anda agar produktivitas perusahaan Anda meningkat secara menyeluruh.'; }
		else
			{ $mesin_efisiensi_msg = 'Pertahankan efisiensi produksi dan mesin di perusahaan Anda.'; }

		if (($mesin_inovasi / 5) < 0.5)
			{ $mesin_inovasi_msg = 'Tingkatkan inovasi produk dan proses produksi dalam perusahaan Anda'; }
		else
			{ $mesin_inovasi_msg = 'Pertahankan inovasi produk dan proses produksi.'; }

		$kuesioner->saran_mesin = $mesin_efisiensi_msg . ' ' . $mesin_inovasi_msg;

		$kuesioner->saran_keuangan_score =
			$kuesioner->laba_usaha_score
			+ $kuesioner->modal_awal_score
			+ $kuesioner->modal_sendiri_score
			+ $kuesioner->modal_luar_score
			+ $kuesioner->modal_perimbangan_score
			+ $kuesioner->rasio_likuiditas_score
			+ $kuesioner->rasio_solvabilitas_score
			+ $kuesioner->rasio_profitabilitas_score;

		if ($kuesioner->rasio_likuiditas >= 2 and $kuesioner->rasio_solvabilitas >= 2 and $kuesioner->rasio_profitabilitas >= 1.5) { $kuesioner->saran_keuangan = 'Tetap Pertahankan Likuiditas, Solvabilitas dan Profitabilitas perusahaan Anda'; }
		elseif ($kuesioner->rasio_likuiditas >= 2 and $kuesioner->rasio_solvabilitas >= 2 and $kuesioner->rasio_profitabilitas < 1.5) { $kuesioner->saran_keuangan = 'Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik'; }
		elseif ($kuesioner->rasio_likuiditas >= 2 and $kuesioner->rasio_solvabilitas < 2 and $kuesioner->rasio_profitabilitas >= 1.5) { $kuesioner->saran_keuangan = 'Anda harus menambah kas, piutang, persediaan barang, tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($kuesioner->rasio_likuiditas >= 2 and $kuesioner->rasio_solvabilitas < 2 and $kuesioner->rasio_profitabilitas < 1.5) { $kuesioner->saran_keuangan = 'Anda harus menambah kas, piutang, persediaan barang, tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($kuesioner->rasio_likuiditas < 2 and $kuesioner->rasio_solvabilitas >= 2 and $kuesioner->rasio_profitabilitas >= 1.5) { $kuesioner->saran_keuangan = 'Anda harus menambah kas, piutang, persediaan barang, tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($kuesioner->rasio_likuiditas < 2 and $kuesioner->rasio_solvabilitas >= 2 and $kuesioner->rasio_profitabilitas < 1.5) { $kuesioner->saran_keuangan = 'Anda harus menambah kas, piutang, atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik'; }
		elseif ($kuesioner->rasio_likuiditas < 2 and $kuesioner->rasio_solvabilitas < 2 and $kuesioner->rasio_profitabilitas >= 1.5) { $kuesioner->saran_keuangan = 'Anda harus menambah kas, piutang, atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($kuesioner->rasio_likuiditas < 2 and $kuesioner->rasio_solvabilitas < 2 and $kuesioner->rasio_profitabilitas < 1.5) { $kuesioner->saran_keuangan = 'Anda harus menambah kas, piutang, atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik'; }

		$kuesioner->saran_sdm_score =
			$kuesioner->tk_jumlah
			+ $kuesioner->tk_kompetisi
			+ $kuesioner->produktif_jam
			+ $kuesioner->produktif_shift
			+ $kuesioner->produktif_upah
			+ $kuesioner->fasilitas_tk;

		$sdm_tk = $kuesioner->tk_jumlah + $kuesioner->tk_kompetisi;
		$sdm_produktivitas = $kuesioner->produktif_jam + $kuesioner->produktif_shift + $kuesioner->produktif_upah;
		$sdm_fasilitas = $kuesioner->fasilitas_tk;

		if (($sdm_tk / 10) < 0.5)
			{ $sdm_tk_msg = 'Tingkatkan jumlah tenaga kerja dan kompetensi mereka di dalam perusahaan Anda agar perusahaan dapat tumbuh lebih besar.'; }
		else
			{ $sdm_tk_msg = 'Pertahankan jumlah tenaga kerja Anda dan selalu tingkatkan kompetensi mereka.'; }

		if (($sdm_produktivitas / 15) < 0.5)
			{ $sdm_produktivitas_msg = 'Tingkatkan produktivitas dengan meningkatkan lama jam kerja, jumlah shift, dan standar upah karyawan.'; }
		else
			{ $sdm_produktivitas_msg = 'Pertahankan produktivitas karyawan, dan selalu ikuti standar upah karyawan.'; }

		if (($sdm_fasilitas / 5) < 0.5)
			{ $sdm_fasilitas_msg = 'Tambahkan fasilitas kepada karyawan, terutama fasilitas dasar.'; }
		else
			{ $sdm_fasilitas_msg = 'Pertahankan fasilitas-fasilitas yang diberikan dari perusahaan.'; }

		$kuesioner->saran_sdm = $sdm_tk_msg . ' ' . $sdm_produktivitas_msg . ' ' . $sdm_fasilitas_msg;

		$kuesioner->saran_marketing_score =
			$kuesioner->marketing_strategy
			+ $kuesioner->mix_product
			+ $kuesioner->mix_price
			+ $kuesioner->mix_place
			+ $kuesioner->mix_promotion
			+ $kuesioner->market_share
			+ $kuesioner->market_coverage
			+ $kuesioner->market_competition;

		$marketing_strat = $kuesioner->marketing_strategy;
		$marketing_mix = $kuesioner->mix_product + $kuesioner->mix_price + $kuesioner->mix_place + $kuesioner->mix_promotion;
		$marketing_share = $kuesioner->market_share;
		$marketing_coverage = $kuesioner->market_coverage;

		if (($marketing_strat / 5) < 0.5)
			{ $marketing_strat_msg = 'Formulasikan strategi pemasaran Anda. Agar perusahaan lebih fokus.'; }
		else
			{ $marketing_strat_msg = 'Pertahankan strategi pemasaran di perusahaan Anda.'; }

		if (($marketing_mix / 20) < 0.5)
			{ $marketing_mix_msg = 'Bauran pemasaran Anda perlu lebih ditingkatkan lagi.'; }
		else
			{ $marketing_mix_msg = 'Pertahankan konsep bauran pemasaran perusahaan Anda.'; }

		if (($marketing_share / 5) < 0.5)
			{ $marketing_share_msg = 'Perluas lebih banyak lagi penguasaan pasar Anda.'; }
		else
			{ $marketing_share_msg = 'Pertahankan penguasaan pasar untuk produk Anda.'; }

		if (($marketing_coverage / 5) < 0.5)
			{ $marketing_coverage_msg = 'Tingkatkan cakupan pasar Anda. Lebih baik lagi jika dapat menembus pasar internasional.'; }
		else
			{ $marketing_coverage_msg = 'Pertahankan cakupan pasar Anda agar dapat mencapai pasar internasional lebih banyak.'; }

		$kuesioner->saran_marketing = $marketing_strat_msg . ' ' . $marketing_mix_msg . ' ' . $marketing_share_msg . ' ' . $marketing_share_msg;

		$kuesioner->save();
		return Redirect::to('kuesioner-new/detail/' . $kuesioner->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
		//
		$kuesioner = KuesionerNew::find($id);
		$kuesioner->delete();
		return Redirect::to('kuesioner-new');
	}


}
