<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $questionnaires = Questionnaire::all();
        return view('kuesioner.index', compact('questionnaires'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('kuesioner.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $questionnaire = new Questionnaire;
        $questionnaire->fill($request->all());
        $questionnaire->user = auth()->user()->username;
        $questionnaire->modal_perimbangan = round($questionnaire->modal_luar / ($questionnaire->modal_sendiri + $questionnaire->modal_luar), 2);
        $questionnaire->laba_usaha = ($questionnaire->total_penjualan - $questionnaire->total_pengeluaran);
        $questionnaire->rasio_likuiditas = round(($questionnaire->rasio_kas + $questionnaire->rasio_piutang + $questionnaire->rasio_persediaan) / ($questionnaire->rasio_hutang_lancar + $questionnaire->rasio_hutang_pendek), 2);
        $questionnaire->rasio_solvabilitas = round(($questionnaire->rasio_kas + $questionnaire->rasio_piutang + $questionnaire->rasio_persediaan + $questionnaire->rasio_tanah + $questionnaire->rasio_bangunan + $questionnaire->rasio_mesin + $questionnaire->rasio_kendaraan + $questionnaire->rasio_inventaris) / ($questionnaire->rasio_hutang_lancar + $questionnaire->rasio_hutang_pendek + $questionnaire->rasio_hutang_panjang), 2);
        $questionnaire->rasio_profitabilitas = round(($questionnaire->laba_usaha) / ($questionnaire->modal_sendiri + $questionnaire->modal_luar), 2);
        if ($questionnaire->modal_awal <= 10000000) {
            $questionnaire->modal_awal_score = 1;
        } elseif ($questionnaire->modal_awal <= 20000000) {
            $questionnaire->modal_awal_score = 2;
        } elseif ($questionnaire->modal_awal <= 50000000) {
            $questionnaire->modal_awal_score = 3;
        } elseif ($questionnaire->modal_awal <= 100000000) {
            $questionnaire->modal_awal_score = 4;
        } elseif ($questionnaire->modal_awal > 100000000) {
            $questionnaire->modal_awal_score = 5;
        }
        if ($questionnaire->modal_sendiri <= 10000000) {
            $questionnaire->modal_sendiri_score = 1;
        } elseif ($questionnaire->modal_sendiri <= 20000000) {
            $questionnaire->modal_sendiri_score = 2;
        } elseif ($questionnaire->modal_sendiri <= 50000000) {
            $questionnaire->modal_sendiri_score = 3;
        } elseif ($questionnaire->modal_sendiri <= 100000000) {
            $questionnaire->modal_sendiri_score = 4;
        } elseif ($questionnaire->modal_sendiri > 100000000) {
            $questionnaire->modal_sendiri_score = 5;
        }
        if ($questionnaire->modal_luar <= 10000000) {
            $questionnaire->modal_luar_score = 1;
        } elseif ($questionnaire->modal_luar <= 20000000) {
            $questionnaire->modal_luar_score = 2;
        } elseif ($questionnaire->modal_luar <= 50000000) {
            $questionnaire->modal_luar_score = 3;
        } elseif ($questionnaire->modal_luar <= 100000000) {
            $questionnaire->modal_luar_score = 4;
        } elseif ($questionnaire->modal_luar > 100000000) {
            $questionnaire->modal_luar_score = 5;
        }
        if ($questionnaire->modal_perimbangan == 1) {
            $questionnaire->modal_perimbangan_score = 1;
        } elseif ($questionnaire->modal_perimbangan >= 0.75) {
            $questionnaire->modal_perimbangan_score = 2;
        } elseif ($questionnaire->modal_perimbangan >= 0.5) {
            $questionnaire->modal_perimbangan_score = 3;
        } elseif ($questionnaire->modal_perimbangan >= 0.25) {
            $questionnaire->modal_perimbangan_score = 4;
        } elseif ($questionnaire->modal_perimbangan >= 0) {
            $questionnaire->modal_perimbangan_score = 5;
        }
        if ($questionnaire->laba_usaha <= 10000000) {
            $questionnaire->laba_usaha_score = 1;
        } elseif ($questionnaire->laba_usaha <= 20000000) {
            $questionnaire->laba_usaha_score = 2;
        } elseif ($questionnaire->laba_usaha <= 50000000) {
            $questionnaire->laba_usaha_score = 3;
        } elseif ($questionnaire->laba_usaha <= 100000000) {
            $questionnaire->laba_usaha_score = 4;
        } elseif ($questionnaire->laba_usaha > 100000000) {
            $questionnaire->laba_usaha_score = 5;
        }
        if ($questionnaire->rasio_likuiditas < 0.5 || $questionnaire->rasio_likuiditas > 2) {
            $questionnaire->rasio_likuiditas_score = 1;
        } elseif ($questionnaire->rasio_likuiditas >= 0.5 && $questionnaire->rasio_likuiditas < 0.75) {
            $questionnaire->rasio_likuiditas_score = 2;
        } elseif ($questionnaire->rasio_likuiditas >= 0.75 && $questionnaire->rasio_likuiditas < 1) {
            $questionnaire->rasio_likuiditas_score = 3;
        } elseif ($questionnaire->rasio_likuiditas >= 1 && $questionnaire->rasio_likuiditas < 1.5) {
            $questionnaire->rasio_likuiditas_score = 4;
        } elseif ($questionnaire->rasio_likuiditas >= 1.5 && $questionnaire->rasio_likuiditas < 2) {
            $questionnaire->rasio_likuiditas_score = 5;
        }
        if ($questionnaire->rasio_solvabilitas < 0.5) {
            $questionnaire->rasio_solvabilitas_score = 1;
        } elseif ($questionnaire->rasio_solvabilitas >= 0.5 && $questionnaire->rasio_solvabilitas < 1) {
            $questionnaire->rasio_solvabilitas_score = 2;
        } elseif ($questionnaire->rasio_solvabilitas >= 1 && $questionnaire->rasio_solvabilitas < 1.5) {
            $questionnaire->rasio_solvabilitas_score = 3;
        } elseif ($questionnaire->rasio_solvabilitas >= 1.5 && $questionnaire->rasio_solvabilitas < 2) {
            $questionnaire->rasio_solvabilitas_score = 4;
        } elseif ($questionnaire->rasio_solvabilitas > 2) {
            $questionnaire->rasio_solvabilitas_score = 5;
        }
        if ($questionnaire->rasio_profitabilitas < 0.05) {
            $questionnaire->rasio_profitabilitas_score = 1;
        } elseif ($questionnaire->rasio_profitabilitas >= 0.05 && $questionnaire->rasio_profitabilitas < 0.1) {
            $questionnaire->rasio_profitabilitas_score = 2;
        } elseif ($questionnaire->rasio_profitabilitas >= 0.1 && $questionnaire->rasio_profitabilitas < 0.15) {
            $questionnaire->rasio_profitabilitas_score = 3;
        } elseif ($questionnaire->rasio_profitabilitas >= 0.15 && $questionnaire->rasio_profitabilitas < 0.25) {
            $questionnaire->rasio_profitabilitas_score = 4;
        } elseif ($questionnaire->rasio_profitabilitas >= 0.25) {
            $questionnaire->rasio_profitabilitas_score = 5;
        }
        // Output
        $questionnaire->output_skor =
            $questionnaire->saran_manajerial_score
            + $questionnaire->saran_mesin_score
            + $questionnaire->saran_keuangan_score
            + $questionnaire->saran_sdm_score
            + $questionnaire->saran_marketing_score;
        if ($questionnaire->kontak_gopublik) {
            $questionnaire->output_keputusan = 'Anda sudah Go Publik';
        } else {
            if (($questionnaire->saran_manajerial_score / 290) <= 1) {
                $questionnaire->output_keputusan = 'Emiten dan Invest (Go Publik)';
            } elseif (($questionnaire->saran_manajerial_score / 290) <= 0.67) {
                $questionnaire->output_keputusan = 'Invest';
            } elseif (($questionnaire->saran_manajerial_score / 290) <= 0.33) {
                $questionnaire->output_keputusan = 'Tidak Go Publik dan Invest';
            }
        }
        $questionnaire->output_keputusan_detail = null;
        // Saran
        $questionnaire->saran_manajerial_score =
            array_sum(array($questionnaire->dokumen_npwp, $questionnaire->dokumen_siup, $questionnaire->dokumen_tdp, $questionnaire->dokumen_iui, $questionnaire->dokumen_situ))
            + $questionnaire->sm_punya
            + $questionnaire->sm_sertifikasi
            + $questionnaire->sm_so
            + $questionnaire->sm_jobdesc
            + $questionnaire->sm_sop
            + $questionnaire->sm_arsip
            + $questionnaire->sm_audit
            + $questionnaire->sm_tqc
            + $questionnaire->sm_satisfaction
            + $questionnaire->sarana_luas_kantor
            + $questionnaire->sarana_kondisi_kantor
            + $questionnaire->sarana_nilai_kantor
            + $questionnaire->sarana_luas_gudang
            + $questionnaire->sarana_kondisi_gudang
            + $questionnaire->sarana_nilai_gudang
            + $questionnaire->sarana_jumlah_mobil
            + $questionnaire->sarana_nilai_mobil
            + $questionnaire->sarana_jumlah_angkutan
            + $questionnaire->sarana_nilai_angkutan
            + $questionnaire->potensi_perluasan;
        $manajerial_dokumen = array_sum(array($questionnaire->dokumen_npwp, $questionnaire->dokumen_siup, $questionnaire->dokumen_tdp, $questionnaire->dokumen_iui, $questionnaire->dokumen_situ));
        $manajerial_sistem = $questionnaire->sm_punya + $questionnaire->sm_sertifikasi + $questionnaire->sm_so + $questionnaire->sm_jobdesc + $questionnaire->sm_sop + $questionnaire->sm_arsip + $questionnaire->sm_audit + $questionnaire->sm_tqc + $questionnaire->sm_satisfaction;
        if (($manajerial_dokumen / 5) < 0.5) {
            $manajerial_dokumen_msg = 'Lengkapi dokumen legalitas perusahaan Anda agar mendapatkan poin lebih tinggi.';
        } else {
            $manajerial_dokumen_msg = 'Pertahankan kelengkapan dokumen legalitas perusahaan Anda.';
        }
        if (($manajerial_sistem / 45) < 0.5) {
            $manajerial_sistem_msg = 'Perbaiki Sistem Manajemen perusahaan Anda agar pengelolaan perusahaan Anda menjadi lebih teratur.';
        } else {
            $manajerial_sistem_msg = 'Pertahankan Sistem Manajemen di perusahaan Anda.';
        }
        $questionnaire->saran_manajerial = $manajerial_dokumen_msg . ' ' . $manajerial_sistem_msg;
        $questionnaire->saran_mesin_score =
            $questionnaire->efisiensi_standar
            + $questionnaire->efisiensi_jumlah
            + $questionnaire->efisiensi_kapasitas
            + $questionnaire->efisiensi_umur
            + $questionnaire->efisiensi_perawatan
            + $questionnaire->efisiensi_rendemen
            + $questionnaire->efisiensi_variasi
            + $questionnaire->energi_pln
            + $questionnaire->energi_genset
            + $questionnaire->alternatif_energi
            + $questionnaire->inovasi_produk;
        $mesin_efisiensi = $questionnaire->efisiensi_standar + $questionnaire->efisiensi_jumlah + $questionnaire->efisiensi_kapasitas + $questionnaire->efisiensi_umur + $questionnaire->efisiensi_perawatan + $questionnaire->efisiensi_rendemen + $questionnaire->efisiensi_variasi;
        $mesin_inovasi = $questionnaire->inovasi_produk;
        if (($mesin_efisiensi / 35) < 0.5) {
            $mesin_efisiensi_msg = 'Tingkatkan efisiensi Produksi Anda agar produktivitas perusahaan Anda meningkat secara menyeluruh.';
        } else {
            $mesin_efisiensi_msg = 'Pertahankan efisiensi produksi dan mesin di perusahaan Anda.';
        }
        if (($mesin_inovasi / 5) < 0.5) {
            $mesin_inovasi_msg = 'Tingkatkan inovasi produk dan proses produksi dalam perusahaan Anda';
        } else {
            $mesin_inovasi_msg = 'Pertahankan inovasi produk dan proses produksi.';
        }
        $questionnaire->saran_mesin = $mesin_efisiensi_msg . ' ' . $mesin_inovasi_msg;
        $questionnaire->saran_keuangan_score =
            $questionnaire->laba_usaha_score
            + $questionnaire->modal_awal_score
            + $questionnaire->modal_sendiri_score
            + $questionnaire->modal_luar_score
            + $questionnaire->modal_perimbangan_score
            + $questionnaire->rasio_likuiditas_score
            + $questionnaire->rasio_solvabilitas_score
            + $questionnaire->rasio_profitabilitas_score;
        $questionnaire->saran_keuangan = null;
        $questionnaire->saran_sdm_score =
            $questionnaire->tk_jumlah
            + $questionnaire->tk_kompetisi
            + $questionnaire->produktif_jam
            + $questionnaire->produktif_shift
            + $questionnaire->produktif_upah
            + $questionnaire->fasilitas_tk;
        $sdm_tk = $questionnaire->tk_jumlah + $questionnaire->tk_kompetisi;
        $sdm_produktivitas = $questionnaire->produktif_jam + $questionnaire->produktif_shift + $questionnaire->produktif_upah;
        $sdm_fasilitas = $questionnaire->fasilitas_tk;
        if (($sdm_tk / 10) < 0.5) {
            $sdm_tk_msg = 'Tingkatkan jumlah tenaga kerja dan kompetensi mereka di dalam perusahaan Anda agar perusahaan dapat tumbuh lebih besar.';
        } else {
            $sdm_tk_msg = 'Pertahankan jumlah tenaga kerja Anda dan selalu tingkatkan kompetensi mereka.';
        }
        if (($sdm_produktivitas / 15) < 0.5) {
            $sdm_produktivitas_msg = 'Tingkatkan produktivitas dengan meningkatkan lama jam kerja, jumlah shift, dan standar upah karyawan.';
        } else {
            $sdm_produktivitas_msg = 'Pertahankan produktivitas karyawan, dan selalu ikuti standar upah karyawan.';
        }
        if (($sdm_fasilitas / 5) < 0.5) {
            $sdm_fasilitas_msg = 'Tambahkan fasilitas kepada karyawan, terutama fasilitas dasar.';
        } else {
            $sdm_fasilitas_msg = 'Pertahankan fasilitas-fasilitas yang diberikan dari perusahaan.';
        }
        $questionnaire->saran_sdm = $sdm_tk . ' ' . $sdm_produktivitas . ' ' . $sdm_fasilitas;
        $questionnaire->saran_marketing_score =
            $questionnaire->marketing_strategy
            + $questionnaire->mix_product
            + $questionnaire->mix_price
            + $questionnaire->mix_place
            + $questionnaire->mix_promotion
            + $questionnaire->market_share
            + $questionnaire->market_coverage
            + $questionnaire->market_competition;
        $marketing_strat = $questionnaire->marketing_strategy;
        $marketing_mix = $questionnaire->mix_product + $questionnaire->mix_price + $questionnaire->mix_place + $questionnaire->mix_promotion;
        $marketing_share = $questionnaire->market_share;
        $marketing_coverage = $questionnaire->market_coverage;
        if (($marketing_strat / 5) < 0.5) {
            $marketing_strat_msg = 'Formulasikan strategi pemasaran Anda. Agar perusahaan lebih fokus.';
        } else {
            $marketing_strat_msg = 'Pertahankan strategi pemasaran di perusahaan Anda.';
        }
        if (($marketing_mix / 20) < 0.5) {
            $marketing_mix_msg = 'Bauran pemasaran Anda perlu lebih ditingkatkan lagi.';
        } else {
            $marketing_mix_msg = 'Pertahankan konsep bauran pemasaran perusahaan Anda.';
        }
        if (($marketing_share / 5) < 0.5) {
            $marketing_share_msg = 'Perluas lebih banyak lagi penguasaan pasar Anda.';
        } else {
            $marketing_share_msg = 'Pertahankan penguasaan pasar untuk produk Anda.';
        }
        if (($marketing_coverage / 5) < 0.5) {
            $marketing_coverage_msg = 'Tingkatkan cakupan pasar Anda. Lebih baik lagi jika dapat menembus pasar internasional.';
        } else {
            $marketing_coverage_msg = 'Pertahankan cakupan pasar Anda agar dapat mencapai pasar internasional lebih banyak.';
        }
        $questionnaire->saran_marketing = $marketing_strat . ' ' . $marketing_mix . ' ' . $marketing_share . ' ' . $marketing_share;
        $questionnaire->save();
        return redirect()->route('questionnaire.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $questionnaire = Questionnaire::find($id);
        return view('kuesioner.show', compact(['questionnaire']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::find($id);
        return view('kuesioner.edit', compact(['questionnaire']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
        $questionnaire = Questionnaire::find($id);
        $questionnaire->fill($request->all());
        $questionnaire->user = auth()->user()->username;
        $questionnaire->modal_perimbangan = round(($questionnaire->modal_luar / ($questionnaire->modal_sendiri + $questionnaire->modal_luar)), 2);
        $questionnaire->laba_usaha = ($questionnaire->total_penjualan - $questionnaire->total_pengeluaran);
        $questionnaire->rasio_likuiditas = round(($questionnaire->rasio_kas + $questionnaire->rasio_piutang + $questionnaire->rasio_persediaan) / ($questionnaire->rasio_hutang_lancar + $questionnaire->rasio_hutang_pendek), 2);
        $questionnaire->rasio_solvabilitas = round(($questionnaire->rasio_kas + $questionnaire->rasio_piutang + $questionnaire->rasio_persediaan + $questionnaire->rasio_tanah + $questionnaire->rasio_bangunan + $questionnaire->rasio_mesin + $questionnaire->rasio_kendaraan + $questionnaire->rasio_inventaris) / ($questionnaire->rasio_hutang_lancar + $questionnaire->rasio_hutang_pendek + $questionnaire->rasio_hutang_panjang), 2);
        $questionnaire->rasio_profitabilitas = round(($questionnaire->laba_usaha) / ($questionnaire->modal_sendiri + $questionnaire->modal_luar), 2);
        if ($questionnaire->modal_awal <= 10000000) {
            $questionnaire->modal_awal_score = 1;
        } elseif ($questionnaire->modal_awal <= 20000000) {
            $questionnaire->modal_awal_score = 2;
        } elseif ($questionnaire->modal_awal <= 50000000) {
            $questionnaire->modal_awal_score = 3;
        } elseif ($questionnaire->modal_awal <= 100000000) {
            $questionnaire->modal_awal_score = 4;
        } elseif ($questionnaire->modal_awal > 100000000) {
            $questionnaire->modal_awal_score = 5;
        }
        if ($questionnaire->modal_sendiri <= 10000000) {
            $questionnaire->modal_sendiri_score = 1;
        } elseif ($questionnaire->modal_sendiri <= 20000000) {
            $questionnaire->modal_sendiri_score = 2;
        } elseif ($questionnaire->modal_sendiri <= 50000000) {
            $questionnaire->modal_sendiri_score = 3;
        } elseif ($questionnaire->modal_sendiri <= 100000000) {
            $questionnaire->modal_sendiri_score = 4;
        } elseif ($questionnaire->modal_sendiri > 100000000) {
            $questionnaire->modal_sendiri_score = 5;
        }
        if ($questionnaire->modal_luar <= 10000000) {
            $questionnaire->modal_luar_score = 1;
        } elseif ($questionnaire->modal_luar <= 20000000) {
            $questionnaire->modal_luar_score = 2;
        } elseif ($questionnaire->modal_luar <= 50000000) {
            $questionnaire->modal_luar_score = 3;
        } elseif ($questionnaire->modal_luar <= 100000000) {
            $questionnaire->modal_luar_score = 4;
        } elseif ($questionnaire->modal_luar > 100000000) {
            $questionnaire->modal_luar_score = 5;
        }
        if ($questionnaire->modal_perimbangan == 1) {
            $questionnaire->modal_perimbangan_score = 1;
        } elseif ($questionnaire->modal_perimbangan >= 0.75) {
            $questionnaire->modal_perimbangan_score = 2;
        } elseif ($questionnaire->modal_perimbangan >= 0.5) {
            $questionnaire->modal_perimbangan_score = 3;
        } elseif ($questionnaire->modal_perimbangan >= 0.25) {
            $questionnaire->modal_perimbangan_score = 4;
        } elseif ($questionnaire->modal_perimbangan >= 0) {
            $questionnaire->modal_perimbangan_score = 5;
        }
        if ($questionnaire->laba_usaha <= 10000000) {
            $questionnaire->laba_usaha_score = 1;
        } elseif ($questionnaire->laba_usaha <= 20000000) {
            $questionnaire->laba_usaha_score = 2;
        } elseif ($questionnaire->laba_usaha <= 50000000) {
            $questionnaire->laba_usaha_score = 3;
        } elseif ($questionnaire->laba_usaha <= 100000000) {
            $questionnaire->laba_usaha_score = 4;
        } elseif ($questionnaire->laba_usaha > 100000000) {
            $questionnaire->laba_usaha_score = 5;
        }
        if ($questionnaire->rasio_likuiditas < 0.5 || $questionnaire->rasio_likuiditas > 2) {
            $questionnaire->rasio_likuiditas_score = 1;
        } elseif ($questionnaire->rasio_likuiditas >= 0.5 && $questionnaire->rasio_likuiditas < 0.75) {
            $questionnaire->rasio_likuiditas_score = 2;
        } elseif ($questionnaire->rasio_likuiditas >= 0.75 && $questionnaire->rasio_likuiditas < 1) {
            $questionnaire->rasio_likuiditas_score = 3;
        } elseif ($questionnaire->rasio_likuiditas >= 1 && $questionnaire->rasio_likuiditas < 1.5) {
            $questionnaire->rasio_likuiditas_score = 4;
        } elseif ($questionnaire->rasio_likuiditas >= 1.5 && $questionnaire->rasio_likuiditas < 2) {
            $questionnaire->rasio_likuiditas_score = 5;
        }
        if ($questionnaire->rasio_solvabilitas < 0.5) {
            $questionnaire->rasio_solvabilitas_score = 1;
        } elseif ($questionnaire->rasio_solvabilitas >= 0.5 && $questionnaire->rasio_solvabilitas < 1) {
            $questionnaire->rasio_solvabilitas_score = 2;
        } elseif ($questionnaire->rasio_solvabilitas >= 1 && $questionnaire->rasio_solvabilitas < 1.5) {
            $questionnaire->rasio_solvabilitas_score = 3;
        } elseif ($questionnaire->rasio_solvabilitas >= 1.5 && $questionnaire->rasio_solvabilitas < 2) {
            $questionnaire->rasio_solvabilitas_score = 4;
        } elseif ($questionnaire->rasio_solvabilitas > 2) {
            $questionnaire->rasio_solvabilitas_score = 5;
        }
        if ($questionnaire->rasio_profitabilitas < 0.05) {
            $questionnaire->rasio_profitabilitas_score = 1;
        } elseif ($questionnaire->rasio_profitabilitas >= 0.05 && $questionnaire->rasio_profitabilitas < 0.1) {
            $questionnaire->rasio_profitabilitas_score = 2;
        } elseif ($questionnaire->rasio_profitabilitas >= 0.1 && $questionnaire->rasio_profitabilitas < 0.15) {
            $questionnaire->rasio_profitabilitas_score = 3;
        } elseif ($questionnaire->rasio_profitabilitas >= 0.15 && $questionnaire->rasio_profitabilitas < 0.25) {
            $questionnaire->rasio_profitabilitas_score = 4;
        } elseif ($questionnaire->rasio_profitabilitas >= 0.25) {
            $questionnaire->rasio_profitabilitas_score = 5;
        }
        // Output
        $questionnaire->output_skor =
            $questionnaire->saran_manajerial_score
            + $questionnaire->saran_mesin_score
            + $questionnaire->saran_keuangan_score
            + $questionnaire->saran_sdm_score
            + $questionnaire->saran_marketing_score;
        if ($questionnaire->kontak_gopublik) {
            $questionnaire->output_keputusan = 'Anda sudah Go Publik';
        } else {
            if (($questionnaire->output_skor / 290) <= 0.33) {
                $questionnaire->output_keputusan = 'Emiten dan Invest (Go Publik)';
            } elseif (($questionnaire->output_skor / 290) <= 0.67) {
                $questionnaire->output_keputusan = 'Invest';
            } elseif (($questionnaire->output_skor / 290) <= 1) {
                $questionnaire->output_keputusan = 'Tidak Go Publik dan Invest';
            }
        }
        $questionnaire->output_keputusan_detail = null;
        // Saran
        $questionnaire->saran_manajerial_score =
            array_sum(array($questionnaire->dokumen_npwp, $questionnaire->dokumen_siup, $questionnaire->dokumen_tdp, $questionnaire->dokumen_iui, $questionnaire->dokumen_situ))
            + $questionnaire->sm_punya
            + $questionnaire->sm_sertifikasi
            + $questionnaire->sm_so
            + $questionnaire->sm_jobdesc
            + $questionnaire->sm_sop
            + $questionnaire->sm_arsip
            + $questionnaire->sm_audit
            + $questionnaire->sm_tqc
            + $questionnaire->sm_satisfaction
            + $questionnaire->sarana_luas_kantor
            + $questionnaire->sarana_kondisi_kantor
            + $questionnaire->sarana_nilai_kantor
            + $questionnaire->sarana_luas_gudang
            + $questionnaire->sarana_kondisi_gudang
            + $questionnaire->sarana_nilai_gudang
            + $questionnaire->sarana_jumlah_mobil
            + $questionnaire->sarana_nilai_mobil
            + $questionnaire->sarana_jumlah_angkutan
            + $questionnaire->sarana_nilai_angkutan
            + $questionnaire->potensi_perluasan;
        $manajerial_dokumen = array_sum(array($questionnaire->dokumen_npwp, $questionnaire->dokumen_siup, $questionnaire->dokumen_tdp, $questionnaire->dokumen_iui, $questionnaire->dokumen_situ));
        $manajerial_sistem = $questionnaire->sm_punya + $questionnaire->sm_sertifikasi + $questionnaire->sm_so + $questionnaire->sm_jobdesc + $questionnaire->sm_sop + $questionnaire->sm_arsip + $questionnaire->sm_audit + $questionnaire->sm_tqc + $questionnaire->sm_satisfaction;
        if (($manajerial_dokumen / 5) < 0.5) {
            $manajerial_dokumen_msg = 'Lengkapi dokumen legalitas perusahaan Anda agar mendapatkan poin lebih tinggi.';
        } else {
            $manajerial_dokumen_msg = 'Pertahankan kelengkapan dokumen legalitas perusahaan Anda.';
        }
        if (($manajerial_sistem / 45) < 0.5) {
            $manajerial_sistem_msg = 'Perbaiki Sistem Manajemen perusahaan Anda agar pengelolaan perusahaan Anda menjadi lebih teratur.';
        } else {
            $manajerial_sistem_msg = 'Pertahankan Sistem Manajemen di perusahaan Anda.';
        }
        $questionnaire->saran_manajerial = $manajerial_dokumen_msg . ' ' . $manajerial_sistem_msg;
        $questionnaire->saran_mesin_score =
            $questionnaire->efisiensi_standar
            + $questionnaire->efisiensi_jumlah
            + $questionnaire->efisiensi_kapasitas
            + $questionnaire->efisiensi_umur
            + $questionnaire->efisiensi_perawatan
            + $questionnaire->efisiensi_rendemen
            + $questionnaire->efisiensi_variasi
            + $questionnaire->energi_pln
            + $questionnaire->energi_genset
            + $questionnaire->alternatif_energi
            + $questionnaire->inovasi_produk;
        $mesin_efisiensi = $questionnaire->efisiensi_standar + $questionnaire->efisiensi_jumlah + $questionnaire->efisiensi_kapasitas + $questionnaire->efisiensi_umur + $questionnaire->efisiensi_perawatan + $questionnaire->efisiensi_rendemen + $questionnaire->efisiensi_variasi;
        $mesin_inovasi = $questionnaire->inovasi_produk;
        if (($mesin_efisiensi / 35) < 0.5) {
            $mesin_efisiensi_msg = 'Tingkatkan efisiensi Produksi Anda agar produktivitas perusahaan Anda meningkat secara menyeluruh.';
        } else {
            $mesin_efisiensi_msg = 'Pertahankan efisiensi produksi dan mesin di perusahaan Anda.';
        }
        if (($mesin_inovasi / 5) < 0.5) {
            $mesin_inovasi_msg = 'Tingkatkan inovasi produk dan proses produksi dalam perusahaan Anda';
        } else {
            $mesin_inovasi_msg = 'Pertahankan inovasi produk dan proses produksi.';
        }
        $questionnaire->saran_mesin = $mesin_efisiensi_msg . ' ' . $mesin_inovasi_msg;
        $questionnaire->saran_keuangan_score =
            $questionnaire->laba_usaha_score
            + $questionnaire->modal_awal_score
            + $questionnaire->modal_sendiri_score
            + $questionnaire->modal_luar_score
            + $questionnaire->modal_perimbangan_score
            + $questionnaire->rasio_likuiditas_score
            + $questionnaire->rasio_solvabilitas_score
            + $questionnaire->rasio_profitabilitas_score;
        if ($questionnaire->rasio_likuiditas >= 2 and $questionnaire->rasio_solvabilitas >= 2 and $questionnaire->rasio_profitabilitas >= 1.5) {
            $questionnaire->saran_keuangan = 'Tetap Pertahankan Likuiditas, Solvabilitas dan Profitabilitas perusahaan Anda';
        } elseif ($questionnaire->rasio_likuiditas >= 2 and $questionnaire->rasio_solvabilitas >= 2 and $questionnaire->rasio_profitabilitas < 1.5) {
            $questionnaire->saran_keuangan = 'Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik';
        } elseif ($questionnaire->rasio_likuiditas >= 2 and $questionnaire->rasio_solvabilitas < 2 and $questionnaire->rasio_profitabilitas >= 1.5) {
            $questionnaire->saran_keuangan = 'Anda harus menambah kas, piutang, persediaan barang, tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik';
        } elseif ($questionnaire->rasio_likuiditas >= 2 and $questionnaire->rasio_solvabilitas < 2 and $questionnaire->rasio_profitabilitas < 1.5) {
            $questionnaire->saran_keuangan = 'Anda harus menambah kas, piutang, persediaan barang, tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik';
        } elseif ($questionnaire->rasio_likuiditas < 2 and $questionnaire->rasio_solvabilitas >= 2 and $questionnaire->rasio_profitabilitas >= 1.5) {
            $questionnaire->saran_keuangan = 'Anda harus menambah kas, piutang, persediaan barang, tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik';
        } elseif ($questionnaire->rasio_likuiditas < 2 and $questionnaire->rasio_solvabilitas >= 2 and $questionnaire->rasio_profitabilitas < 1.5) {
            $questionnaire->saran_keuangan = 'Anda harus menambah kas, piutang, atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik';
        } elseif ($questionnaire->rasio_likuiditas < 2 and $questionnaire->rasio_solvabilitas < 2 and $questionnaire->rasio_profitabilitas >= 1.5) {
            $questionnaire->saran_keuangan = 'Anda harus menambah kas, piutang, atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik';
        } elseif ($questionnaire->rasio_likuiditas < 2 and $questionnaire->rasio_solvabilitas < 2 and $questionnaire->rasio_profitabilitas < 1.5) {
            $questionnaire->saran_keuangan = 'Anda harus menambah kas, piutang, atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik';
        }
        $questionnaire->saran_sdm_score =
            $questionnaire->tk_jumlah
            + $questionnaire->tk_kompetisi
            + $questionnaire->produktif_jam
            + $questionnaire->produktif_shift
            + $questionnaire->produktif_upah
            + $questionnaire->fasilitas_tk;
        $sdm_tk = $questionnaire->tk_jumlah + $questionnaire->tk_kompetisi;
        $sdm_produktivitas = $questionnaire->produktif_jam + $questionnaire->produktif_shift + $questionnaire->produktif_upah;
        $sdm_fasilitas = $questionnaire->fasilitas_tk;
        if (($sdm_tk / 10) < 0.5) {
            $sdm_tk_msg = 'Tingkatkan jumlah tenaga kerja dan kompetensi mereka di dalam perusahaan Anda agar perusahaan dapat tumbuh lebih besar.';
        } else {
            $sdm_tk_msg = 'Pertahankan jumlah tenaga kerja Anda dan selalu tingkatkan kompetensi mereka.';
        }
        if (($sdm_produktivitas / 15) < 0.5) {
            $sdm_produktivitas_msg = 'Tingkatkan produktivitas dengan meningkatkan lama jam kerja, jumlah shift, dan standar upah karyawan.';
        } else {
            $sdm_produktivitas_msg = 'Pertahankan produktivitas karyawan, dan selalu ikuti standar upah karyawan.';
        }
        if (($sdm_fasilitas / 5) < 0.5) {
            $sdm_fasilitas_msg = 'Tambahkan fasilitas kepada karyawan, terutama fasilitas dasar.';
        } else {
            $sdm_fasilitas_msg = 'Pertahankan fasilitas-fasilitas yang diberikan dari perusahaan.';
        }
        $questionnaire->saran_sdm = $sdm_tk_msg . ' ' . $sdm_produktivitas_msg . ' ' . $sdm_fasilitas_msg;
        $questionnaire->saran_marketing_score =
            $questionnaire->marketing_strategy
            + $questionnaire->mix_product
            + $questionnaire->mix_price
            + $questionnaire->mix_place
            + $questionnaire->mix_promotion
            + $questionnaire->market_share
            + $questionnaire->market_coverage
            + $questionnaire->market_competition;
        $marketing_strat = $questionnaire->marketing_strategy;
        $marketing_mix = $questionnaire->mix_product + $questionnaire->mix_price + $questionnaire->mix_place + $questionnaire->mix_promotion;
        $marketing_share = $questionnaire->market_share;
        $marketing_coverage = $questionnaire->market_coverage;
        if (($marketing_strat / 5) < 0.5) {
            $marketing_strat_msg = 'Formulasikan strategi pemasaran Anda. Agar perusahaan lebih fokus.';
        } else {
            $marketing_strat_msg = 'Pertahankan strategi pemasaran di perusahaan Anda.';
        }
        if (($marketing_mix / 20) < 0.5) {
            $marketing_mix_msg = 'Bauran pemasaran Anda perlu lebih ditingkatkan lagi.';
        } else {
            $marketing_mix_msg = 'Pertahankan konsep bauran pemasaran perusahaan Anda.';
        }
        if (($marketing_share / 5) < 0.5) {
            $marketing_share_msg = 'Perluas lebih banyak lagi penguasaan pasar Anda.';
        } else {
            $marketing_share_msg = 'Pertahankan penguasaan pasar untuk produk Anda.';
        }
        if (($marketing_coverage / 5) < 0.5) {
            $marketing_coverage_msg = 'Tingkatkan cakupan pasar Anda. Lebih baik lagi jika dapat menembus pasar internasional.';
        } else {
            $marketing_coverage_msg = 'Pertahankan cakupan pasar Anda agar dapat mencapai pasar internasional lebih banyak.';
        }
        $questionnaire->saran_marketing = $marketing_strat_msg . ' ' . $marketing_mix_msg . ' ' . $marketing_share_msg . ' ' . $marketing_coverage_msg;
        $questionnaire->save();
        return Redirect::to('kuesioner/detail/' . $questionnaire->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        //
        $questionnaire = Questionnaire::find($id);
        $questionnaire->delete();
        return Redirect::to('kuesioner');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function print($id)
    {
        //
        $questionnaire = Questionnaire::find($id);
        $pdf = PDF::loadView('pdf.single', array('kuesioner' => $questionnaire));
        return $pdf->stream();
    }
}
