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
		$kuesioner->output_keputusan = null;
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
		$kuesioner->saran_manajerial = null;

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
		$kuesioner->saran_mesin = null;

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
		$kuesioner->saran_sdm = null;

		$kuesioner->saran_marketing_score =
			$kuesioner->marketing_strategy
			+ $kuesioner->mix_product
			+ $kuesioner->mix_price
			+ $kuesioner->mix_place
			+ $kuesioner->mix_promotion
			+ $kuesioner->market_share
			+ $kuesioner->market_coverage
			+ $kuesioner->market_competition;
		$kuesioner->saran_marketing = null;

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
		$kuesioner->output_keputusan = null;
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
		$kuesioner->saran_manajerial = null;

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
		$kuesioner->saran_mesin = null;

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
		$kuesioner->saran_sdm = null;

		$kuesioner->saran_marketing_score =
			$kuesioner->marketing_strategy
			+ $kuesioner->mix_product
			+ $kuesioner->mix_price
			+ $kuesioner->mix_place
			+ $kuesioner->mix_promotion
			+ $kuesioner->market_share
			+ $kuesioner->market_coverage
			+ $kuesioner->market_competition;
		$kuesioner->saran_marketing = null;

		$kuesioner->save();
		return View::make('kuesioner-new.edit')->with('kuesioner', $kuesioner);
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
