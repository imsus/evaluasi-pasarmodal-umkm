<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionnaire extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $casts = [
        'kontak_gopublik' => 'boolean',
        'dokumen_npwp' => 'boolean',
        'dokumen_siup' => 'boolean',
        'dokumen_tdp' => 'boolean',
        'dokumen_iui' => 'boolean',
        'dokumen_situ' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(App\User::class);
    }

    public function getModalPerimbanganAttribute()
    {
        if ($this->attributes['modal_sendiri'] + $this->attributes['modal_luar'] === 0) {
            return 0;
        }

        return round($this->attributes['modal_luar'] / ($this->attributes['modal_sendiri'] + $this->attributes['modal_luar']), 2);
    }

    public function getLabaUsahaAttribute()
    {
        return ($this->attributes['rasio_total_penjualan'] - $this->attributes['rasio_total_pengeluaran']);
    }

    public function getRasioLikuiditasAttribute()
    {
        if ($this->attributes['rasio_hutang_lancar'] + $this->attributes['rasio_hutang_pendek'] === 0) {
            return 0;
        }

        return round(($this->attributes['rasio_kas'] + $this->attributes['rasio_piutang'] + $this->attributes['rasio_persediaan']) / ($this->attributes['rasio_hutang_lancar'] + $this->attributes['rasio_hutang_pendek']), 2);
    }

    public function getRasioSolvabilitasAttribute()
    {
        if ($this->attributes['rasio_hutang_lancar'] + $this->attributes['rasio_hutang_pendek'] + $this->attributes['rasio_hutang_panjang'] === 0) {
            return 0;
        }

        return round(($this->attributes['rasio_kas'] + $this->attributes['rasio_piutang'] + $this->attributes['rasio_persediaan'] + $this->attributes['rasio_tanah'] + $this->attributes['rasio_bangunan'] + $this->attributes['rasio_mesin'] + $this->attributes['rasio_kendaraan'] + $this->attributes['rasio_inventaris']) / ($this->attributes['rasio_hutang_lancar'] + $this->attributes['rasio_hutang_pendek'] + $this->attributes['rasio_hutang_panjang']), 2);
    }

    public function getRasioProfitabilitas()
    {
        return round(($this->attributes['laba_usaha']) / ($this->attributes['modal_sendiri'] + $this->attributes['modal_luar']), 2);
    }

    public function getModalAwalScoreAttribute()
    {
        if ($this->modal_awal <= 10000000) {
            return 1;
        } elseif ($this->modal_awal <= 20000000) {
            return 2;
        } elseif ($this->modal_awal <= 50000000) {
            return 3;
        } elseif ($this->modal_awal <= 100000000) {
            return 4;
        } elseif ($this->modal_awal > 100000000) {
            return 5;
        }
    }

    public function getModalSendiriScoreAttribute($value)
    {   
        if ($this->modal_sendiri <= 10000000) {
            return 1;
        } elseif ($this->modal_sendiri <= 20000000) {
            return 2;
        } elseif ($this->modal_sendiri <= 50000000) {
            return 3;
        } elseif ($this->modal_sendiri <= 100000000) {
            return 4;
        } elseif ($this->modal_sendiri > 100000000) {
            return 5;
        }
    }

    public function getModalLuarScoreAttribute()
    {   
        if ($this->modal_luar <= 10000000) {
            return 1;
        } elseif ($this->modal_luar <= 20000000) {
            return 2;
        } elseif ($this->modal_luar <= 50000000) {
            return 3;
        } elseif ($this->modal_luar <= 100000000) {
            return 4;
        } elseif ($this->modal_luar > 100000000) {
            return 5;
        }
    }

    public function getModalPerimbanganScore()
    {
        if ($this->modal_perimbangan == 1) {
            return 1;
        } elseif ($this->modal_perimbangan >= 0.75) {
            return 2;
        } elseif ($this->modal_perimbangan >= 0.5) {
            return 3;
        } elseif ($this->modal_perimbangan >= 0.25) {
            return 4;
        } elseif ($this->modal_perimbangan >= 0) {
            return 5;
        }
    }

    public function getLabaUsahaScoreAttribute()
    {
        if ($this->laba_usaha <= 10000000) {
            return 1;
        } elseif ($this->laba_usaha <= 20000000) {
            return 2;
        } elseif ($this->laba_usaha <= 50000000) {
            return 3;
        } elseif ($this->laba_usaha <= 100000000) {
            return 4;
        } elseif ($this->laba_usaha > 100000000) {
            return 5;
        }
    }

    public function getRasioLikuiditasScoreAttribute()
    {
        if ($this->rasio_likuiditas < 0.5 || $this->rasio_likuiditas > 2) {
            return 1;
        } elseif ($this->rasio_likuiditas >= 0.5 && $this->rasio_likuiditas < 0.75) {
            return 2;
        } elseif ($this->rasio_likuiditas >= 0.75 && $this->rasio_likuiditas < 1) {
            return 3;
        } elseif ($this->rasio_likuiditas >= 1 && $this->rasio_likuiditas < 1.5) {
            return 4;
        } elseif ($this->rasio_likuiditas >= 1.5 && $this->rasio_likuiditas < 2) {
            return 5;
        }
    }

    public function getRasioSolvabilitasScoreAttribute()
    {
        if ($this->rasio_solvabilitas < 0.5) {
            return 1;
        } elseif ($this->rasio_solvabilitas >= 0.5 && $this->rasio_solvabilitas < 1) {
            return 2;
        } elseif ($this->rasio_solvabilitas >= 1 && $this->rasio_solvabilitas < 1.5) {
            return 3;
        } elseif ($this->rasio_solvabilitas >= 1.5 && $this->rasio_solvabilitas < 2) {
            return 4;
        } elseif ($this->rasio_solvabilitas > 2) {
            return 5;
        }
    }

    public function getRasioProfitabilitiasScoreAttribute()
    {
        if ($this->rasio_profitabilitas < 0.05) {
            return 1;
        } elseif ($this->rasio_profitabilitas >= 0.05 && $this->rasio_profitabilitas < 0.1) {
            return 2;
        } elseif ($this->rasio_profitabilitas >= 0.1 && $this->rasio_profitabilitas < 0.15) {
            return 3;
        } elseif ($this->rasio_profitabilitas >= 0.15 && $this->rasio_profitabilitas < 0.25) {
            return 4;
        } elseif ($this->rasio_profitabilitas >= 0.25) {
            return 5;
        }
    }

    public function getOutputSkorAttribute()
    {
        return array_sum([
            $this->saran_manajerial_score,
            $this->saran_mesin_score,
            $this->saran_keuangan_score,
            $this->saran_sdm_score,
            $this->saran_marketing_score,
        ]);
    }

    public function getOutputSkorPercentAttribute()
    {
        return round($this->getOutputSkorAttribute() * 100 / config('custom.total_output'));
    }

    public function getOutputKeputusanAttribute()
    {
        if ($this->attributes['kontak_gopublik']) {
            return 'Anda sudah Go Publik';
        } else {
            if (($this->saran_manajerial_score / 290) <= 1) {
                return 'Emiten dan Invest (Go Publik)';
            } elseif (($this->saran_manajerial_score / 290) <= 0.67) {
                return 'Invest';
            } elseif (($this->saran_manajerial_score / 290) <= 0.33) {
                return 'Tidak Go Publik dan Invest';
            }
        }
    }

    public function getSaranManajerialScoreAttribute()
    {
        return array_sum([
            $this->attributes['dokumen_npwp'],
            $this->attributes['dokumen_siup'],
            $this->attributes['dokumen_tdp'],
            $this->attributes['dokumen_iui'],
            $this->attributes['dokumen_situ'],
            $this->attributes['sm_punya'],
            $this->attributes['sm_sertifikasi'],
            $this->attributes['sm_so'],
            $this->attributes['sm_jobdesc'],
            $this->attributes['sm_sop'],
            $this->attributes['sm_arsip'],
            $this->attributes['sm_audit'],
            $this->attributes['sm_tqc'],
            $this->attributes['sm_satisfaction'],
            $this->attributes['sarana_luas_kantor'],
            $this->attributes['sarana_kondisi_kantor'],
            $this->attributes['sarana_nilai_kantor'],
            $this->attributes['sarana_luas_gudang'],
            $this->attributes['sarana_kondisi_gudang'],
            $this->attributes['sarana_nilai_gudang'],
            $this->attributes['sarana_jumlah_mobil'],
            $this->attributes['sarana_nilai_mobil'],
            $this->attributes['sarana_jumlah_angkutan'],
            $this->attributes['sarana_nilai_angkutan'],
            $this->attributes['potensi_perluasan'],
        ]);
    }

    public function getSaranManajerialScorePercentAttribute()
    {
        return round($this->getSaranManajerialScoreAttribute() * 100 / config('custom.total_manajerial'));
    }

    public function getSaranManajerialAttribute()
    {
        $manajerial_dokumen = array_sum([
            $this->attributes['dokumen_npwp'],
            $this->attributes['dokumen_siup'],
            $this->attributes['dokumen_tdp'],
            $this->attributes['dokumen_iui'],
            $this->attributes['dokumen_situ'],
        ]);

        $manajerial_sistem = array_sum([
            $this->attributes['sm_punya'],
            $this->attributes['sm_sertifikasi'],
            $this->attributes['sm_so'],
            $this->attributes['sm_jobdesc'],
            $this->attributes['sm_sop'],
            $this->attributes['sm_arsip'],
            $this->attributes['sm_audit'],
            $this->attributes['sm_tqc'],
            $this->attributes['sm_satisfaction'],
        ]);

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

        return $manajerial_dokumen_msg . ' ' . $manajerial_sistem_msg;
    }

    public function getSaranMesinScoreAttribute()
    {
        return array_sum([
            $this->attributes['efisiensi_standar'],
            $this->attributes['efisiensi_jumlah'],
            $this->attributes['efisiensi_kapasitas'],
            $this->attributes['efisiensi_umur'],
            $this->attributes['efisiensi_perawatan'],
            $this->attributes['efisiensi_rendemen'],
            $this->attributes['efisiensi_variasi'],
            $this->attributes['energi_pln'],
            $this->attributes['energi_genset'],
            $this->attributes['alternatif_energi'],
            $this->attributes['inovasi_produk'],
        ]);
    }

    public function getSaranMesinScorePercentAttribute()
    {
        return round($this->getSaranMesinScoreAttribute() * 100 / config('custom.total_mesin'));
    }

    public function getSaranMesinAttribute()
    {
        $mesin_efisiensi = array_sum([
            $this->attributes['efisiensi_standar'],
            $this->attributes['efisiensi_jumlah'],
            $this->attributes['efisiensi_kapasitas'],
            $this->attributes['efisiensi_umur'],
            $this->attributes['efisiensi_perawatan'],
            $this->attributes['efisiensi_rendemen'],
            $this->attributes['efisiensi_variasi'],
        ]);

        $mesin_inovasi = $this->attributes['inovasi_produk'];

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

        return $mesin_efisiensi_msg . ' ' . $mesin_inovasi_msg;
    }

    public function getSaranKeuanganScoreAttribute()
    {
        return array_sum([
            $this->laba_usaha_score,
            $this->modal_awal_score,
            $this->modal_sendiri_score,
            $this->modal_luar_score,
            $this->modal_perimbangan_score,
            $this->rasio_likuiditas_score,
            $this->rasio_solvabilitas_score,
            $this->rasio_profitabilitas_score,
        ]);
    }

    public function getSaranKeuanganScorePercentAttribute()
    {
        return round($this->getSaranKeuanganScoreAttribute() * 100 / config('custom.total_keuangan'));
    }

    public function getSaranKeuanganAttribute() {
        if ($this->rasio_likuiditas >= 2 and $this->rasio_solvabilitas >= 2 and $this->rasio_profitabilitas >= 1.5) {
            return 'Tetap Pertahankan Likuiditas, Solvabilitas dan Profitabilitas perusahaan Anda';
        } elseif ($this->rasio_likuiditas >= 2 and $this->rasio_solvabilitas >= 2 and $this->rasio_profitabilitas < 1.5) {
            return 'Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik';
        } elseif ($this->rasio_likuiditas >= 2 and $this->rasio_solvabilitas < 2 and $this->rasio_profitabilitas >= 1.5) {
            return 'Anda harus menambah kas, piutang, persediaan barang, tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik';
        } elseif ($this->rasio_likuiditas >= 2 and $this->rasio_solvabilitas < 2 and $this->rasio_profitabilitas < 1.5) {
            return 'Anda harus menambah kas, piutang, persediaan barang, tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik';
        } elseif ($this->rasio_likuiditas < 2 and $this->rasio_solvabilitas >= 2 and $this->rasio_profitabilitas >= 1.5) {
            return 'Anda harus menambah kas, piutang, persediaan barang, tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik';
        } elseif ($this->rasio_likuiditas < 2 and $this->rasio_solvabilitas >= 2 and $this->rasio_profitabilitas < 1.5) {
            return 'Anda harus menambah kas, piutang, atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik';
        } elseif ($this->rasio_likuiditas < 2 and $this->rasio_solvabilitas < 2 and $this->rasio_profitabilitas >= 1.5) {
            return 'Anda harus menambah kas, piutang, atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik';
        } elseif ($this->rasio_likuiditas < 2 and $this->rasio_solvabilitas < 2 and $this->rasio_profitabilitas < 1.5) {
            return 'Anda harus menambah kas, piutang, atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah, bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik';
        }
    }

    public function getSaranSdmScoreAttribute()
    {
        return array_sum([
            $this->attributes['tk_jumlah'],
            $this->attributes['tk_kompetisi'],
            $this->attributes['produktif_jam'],
            $this->attributes['produktif_shift'],
            $this->attributes['produktif_upah'],
            $this->attributes['fasilitas_tk'],
        ]);
    }

    public function getSaranSdmScorePercentAttribute()
    {
        return round($this->getSaranSdmScoreAttribute() * 100 / config('custom.total_sdm'));
    }

    public function getSaranSdmAttribute()
    {
        $sdm_tk = array_sum([
            $this->attributes['tk_jumlah'],
            $this->attributes['tk_kompetisi'],
        ]);

        $sdm_produktivitas = array_sum([
            $this->attributes['produktif_jam'],
            $this->attributes['produktif_shift'],
            $this->attributes['produktif_upah'],
        ]);

        $sdm_fasilitas = $this->attributes['fasilitas_tk'];

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

        return $sdm_tk_msg . ' ' . $sdm_produktivitas_msg . ' ' . $sdm_fasilitas_msg;
    }

    public function getSaranMarketingScoreAttribute()
    {
        return array_sum([
            $this->attributes['marketing_strategy'],
            $this->attributes['mix_product'],
            $this->attributes['mix_price'],
            $this->attributes['mix_place'],
            $this->attributes['mix_promotion'],
            $this->attributes['market_share'],
            $this->attributes['market_coverage'],
            $this->attributes['market_competition'],
        ]);
    }

    public function getSaranMarketingScorePercentAttribute()
    {
        return round($this->getSaranMarketingScoreAttribute() * 100 / config('custom.total_marketing'));
    }

    public function getSaranMarketingAttribute() {
        $marketing_strat = $this->attributes['marketing_strategy'];

        $marketing_mix = array_sum([
            $this->attributes['mix_product'],
            $this->attributes['mix_price'],
            $this->attributes['mix_place'],
            $this->attributes['mix_promotion'],
        ]);

        $marketing_share = $this->attributes['market_share'];

        $marketing_coverage = $this->attributes['market_coverage'];

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

        return $marketing_strat_msg . ' ' . $marketing_mix_msg . ' ' . $marketing_share_msg . ' ' . $marketing_coverage_msg;
    }

    protected $fillable = [
        // Kontak Perusahaan
        'kontak_nama', 'kontak_gopublik', 'kontak_alamat', 'kontak_kota',
        'kontak_telepon', 'kontak_fax', 'kontak_handphone', 'kontak_website',

        // Status Perusahaan
        'status_tahun', 'status_usaha', 'status_pemodalan', 'status_pj',
        'status_manajer', 'status_karyawan',

        // Dokumen legalitas perusahaan
        'dokumen_akte', 'dokumen_tahun', 'dokumen_npwp', 'dokumen_siup',
        'dokumen_tdp', 'dokumen_iui', 'dokumen_situ',

        // Sistem manajemen
        'sm_punya', 'sm_sertifikasi', 'sm_so', 'sm_jobdesc', 'sm_sop', 'sm_arsip',
        'sm_audit', 'sm_tqc', 'sm_satisfaction',

        // Kelengkapan Sarana dan Prasarana
        'sarana_luas_kantor', 'sarana_kondisi_kantor', 'sarana_nilai_kantor',
        'sarana_luas_gudang', 'sarana_kondisi_gudang', 'sarana_nilai_gudang',
        'sarana_jumlah_mobil', 'sarana_nilai_mobil', 'sarana_jumlah_angkutan',
        'sarana_nilai_angkutan',

        // Potensi Perluasan
        'potensi_perluasan',

        // Efisiensi dan efektivitas
        'efisiensi_standar', 'efisiensi_jumlah', 'efisiensi_kapasitas',
        'efisiensi_umur', 'efisiensi_perawatan', 'efisiensi_rendemen',
        'efisiensi_variasi',

        // Kebutuhan energi
        'energi_pln', 'energi_genset',

        // Penggunaan energi alternatif selain PLN dan Genset
        'alternatif_energi',

        // Inovasi produk dan proses produksi
        'inovasi_produk', 'rasio_kas', 'rasio_piutang', 'rasio_persediaan',
        'rasio_hutang_lancar', 'rasio_hutang_pendek', 'rasio_tanah', 'rasio_bangunan',
        'rasio_mesin', 'rasio_kendaraan', 'rasio_inventaris', 'rasio_hutang_panjang',
        'rasio_total_penjualan', 'rasio_total_pengeluaran', 'modal_awal',
        'modal_sendiri', 'modal_luar', 'modal_perimbangan', 'laba_usaha',
        'rasio_likuiditas', 'rasio_solvabilitas', 'rasio_profitabilitas',
        'modal_awal_score', 'modal_sendiri_score', 'modal_luar_score',
        'modal_perimbangan_score', 'laba_usaha_score', 'rasio_likuiditas_score',
        'rasio_solvabilitas_score', 'rasio_profitabilitas_score',
        'hubungan_pinjaman', 'hubungan_frekuensi', 'hubungan_internal',
        'hubungan_eksternal',

        // Pemenuhan tenaga kerja
        'tk_jumlah', 'tk_kompetisi',

        // Produktivitas Kerja
        'produktif_jam', 'produktif_shift', 'produktif_upah',

        // Fasilitas untuk tenaga kerja
        'fasilitas_tk',

        // Strategi pemasaran
        'marketing_strategy',

        // Bauran pemasaran
        'mix_product', 'mix_price', 'mix_place', 'mix_promotion',

        // Penguasaan pemasaran
        'market_share',

        // Cakupan pemasaran
        'market_coverage',

        // Persaingan
        'market_competition',

        // Output
        'output_skor', 'output_keputusan', 'output_keputusan_detail',

        // Saran
        'saran_manajerial_score', 'saran_manajerial', 'saran_mesin_score',
        'saran_mesin', 'saran_keuangan_score', 'saran_keuangan', 'saran_sdm_score',
        'saran_sdm', 'saran_marketing_score', 'saran_marketing',
    ];

    public static $status_usaha_option = [
        'PT (Perseroan Terbatas)', 'Koperasi', 'Firma',
        'CV (Commanditaire Venootschaap', 'Persero', 'UD (Usaha Dagang)', 'Lainnya',
    ];

    public static $status_pemodalan_option = [
        'PMDN (Penanaman Modal Dalam Negeri)', 'JO (Joint Operation)',
        'JV (Joint Venture)', 'JMA (Joint Merger Acquisition)',
    ];

    public static $dokumen_akte_option = [
        'Tidak Ada', 'Ada',
    ];

    public static $sm_punya_option = [
        1 => 'Tidak memiliki',
        2 => 'Tidak memiliki, sedang merancang',
        3 => 'Memiliki, Tidak menerapkan',
        4 => 'Memiliki, dijalankan sebagian',
        5 => 'Memiliki, dijalankan semuanya',
    ];

    public static $sm_sertifikasi_option = [
        1 => 'Tidak',
        2 => 'Sedang mengajukan',
        3 => 'Memiliki tidak valid',
        4 => 'Memiliki suspended',
        5 => 'Memiliki valid',
    ];

    public static $sm_so_option = [
        1 => 'Tidak memiliki',
        2 => 'Tidak memiliki, sedang merancang',
        3 => 'Memiliki, tidak berfungsi',
        4 => 'Memiliki, berfungsi sebagian',
        5 => 'Memiliki, berfungsi seluruhnya',
    ];

    public static $sm_jobdesc_option = [
        1 => 'Tidak ada',
        2 => 'Tidak lengkap',
        3 => 'Kurang lengkap',
        4 => 'Lengkap',
        5 => 'Lengkap sekali',
    ];

    public static $sm_sop_option = [
        1 => 'Tidak',
        2 => 'Sedang dibuat',
        3 => 'Ya tidak dijalankan',
        4 => 'Ya dijalankan sebagian',
        5 => 'Ya dijalankan seluruhnya',
    ];

    public static $sm_arsip_option = [
        1 => 'Tidak',
        2 => 'Sedang dibuat',
        3 => 'Ya tidak dijalankan',
        4 => 'Ya dijalankan sebagian',
        5 => 'Ya dijalankan seluruhnya',
    ];

    public static $sm_audit_option = [
        1 => 'Tidak',
        2 => 'Ya pernah melakukan',
        3 => 'Ya tidak berkala',
        4 => 'Ya tidak terjadwal',
        5 => 'Ya terjadwal',
    ];

    public static $sm_tqc_option = [
        1 => 'Tidak',
        2 => 'Ya melakukan pada bagian produk akhir',
        3 => 'Ya melakukan hanya di input dan produk',
        4 => 'Ya melakukan dari proses sampai ke produk',
        5 => 'Ya melakukan dari input, proses dan produk',
    ];

    public static $sm_satisfaction_option = [
        1 => 'Tidak',
        2 => 'Kurang memperhatikan keluhan,tidak tersedia sarana pengaduan',
        3 => 'Memperhatikan (ada sarana pengaduan) tapi tidak ada tindak lanjut',
        4 => 'Memperhatikan dan memberi kompensasi',
        5 => 'Sangat memperhatikan dan memberikan garansi 100%',
    ];

    public static $sarana_luas_kantor_option = [
        1 => '&lt; 100m2',
        2 => '100 - 200m2',
        3 => '200 - 500m2',
        4 => '500 - 1000m2',
        5 => '&gt; 1000m2',
    ];

    public static $sarana_kondisi_kantor_option = [
        1 => 'Sederhana',
        2 => 'Sederhana dari papan',
        3 => 'Setengah permanen',
        4 => 'Permanen',
        5 => 'Mewah',
    ];

    public static $sarana_nilai_kantor_option = [
        1 => '&lt; Rp10 juta',
        2 => 'Rp10 - Rp100 juta',
        3 => 'Rp100 - Rp250 juta',
        4 => 'Rp250 - Rp500 juta',
        5 => '&gt; Rp500 juta',
    ];

    public static $sarana_luas_gudang_option = [
        1 => '&lt; 50m2',
        2 => '50 - 100m2',
        3 => '100 - 200m2',
        4 => '200 - 500m2',
        5 => '&gt; 500m2',
    ];

    public static $sarana_kondisi_gudang_option = [
        1 => 'Sederhana',
        2 => 'Sederhana dari papan',
        3 => 'Setengah permanen',
        4 => 'Permanen',
        5 => 'Mewah',
    ];

    public static $sarana_nilai_gudang_option = [
        1 => '&lt; Rp10 juta',
        2 => 'Rp10 - Rp100 juta',
        3 => 'Rp100 - Rp250 juta',
        4 => 'Rp250 - Rp500 juta',
        5 => '&gt; Rp500 juta',
    ];

    public static $sarana_jumlah_mobil_option = [
        1 => 'Tidak Punya',
        2 => 'Punya 1',
        3 => 'Punya 1 – 2',
        4 => 'Punya 2 – 4',
        5 => 'Diatas 4',
    ];

    public static $sarana_nilai_mobil_option = [
        1 => 'Rp0',
        2 => '&lt; Rp100 juta',
        3 => 'Rp100 – Rp300 juta',
        4 => 'Rp300 – Rp500 juta',
        5 => '&gt; Rp500 juta',
    ];

    public static $sarana_jumlah_angkutan_option = [
        1 => 'Tidak Punya',
        2 => 'Punya 1',
        3 => 'Punya 1 – 2',
        4 => 'Punya 2 – 4',
        5 => 'Diatas 4',
    ];

    public static $sarana_nilai_angkutan_option = [
        1 => 'Rp0',
        2 => '&lt; Rp100 juta',
        3 => 'Rp100 – Rp300 juta',
        4 => 'Rp300 – Rp500 juta',
        5 => '&gt;500 juta',
    ];

    public static $potensi_perluasan_option = [
        1 => 'Tidak',
        2 => 'Jangka pendek menambah kapasitas < 10%',
        3 => 'Jangka menengah menambah kapasitas 10 – 20%',
        4 => 'Jangka menengah menambah kapasitas 20 – 50%',
        5 => 'Jangka panjang menambah > 50%',
    ];

    public static $efisiensi_standar_option = [
        1 => 'Tidak memenuhi standar',
        2 => '&lt; 50% memenuhi standar',
        3 => '50% memenuhi standar',
        4 => '&gt; 50% memenuhi standar',
        5 => 'Memenuhi standar',
    ];

    public static $efisiensi_jumlah_option = [
        1 => 'Sangat kurang',
        2 => 'Kurang',
        3 => '80% cukup',
        4 => 'Cukup',
        5 => 'Lebih dari cukup',
    ];

    public static $efisiensi_kapasitas_option = [
        1 => '10%',
        2 => '10 - 25%',
        3 => '25 - 50%',
        4 => '50 - 75%',
        5 => '75 - 100%',
    ];

    public static $efisiensi_umur_option = [
        1 => '&gt; 10 tahun',
        2 => '5 - 10 tahun',
        3 => '3 - 5 tahun',
        4 => '1 - 3 tahun',
        5 => '0 - 1 tahun',
    ];

    public static $efisiensi_perawatan_option = [
        1 => 'Tidak Pernah',
        2 => 'Jarang',
        3 => 'Kadang-kadang',
        4 => 'Sering',
        5 => 'Terjadwal',
    ];

    public static $efisiensi_rendemen_option = [
        1 => '&lt; 30%',
        2 => '32 - 40%',
        3 => '40 - 55%',
        4 => '55 - 70%',
        5 => '&gt; 80%',
    ];

    public static $efisiensi_variasi_option = [
        1 => '1 jenis',
        2 => '2 jenis',
        3 => '3 jenis',
        4 => '4 jenis',
        5 => '&gt; 5 jenis',
    ];

    public static $energi_pln_option = [
        1 => '&lt; 2.200 watt',
        2 => '2.200 - 4.400 watt',
        3 => '10.600 - 23.000 watt',
        4 => '24.000 - 53.000 watt',
        5 => '&gt; 53.000 watt',
    ];

    public static $energi_genset_option = [
        1 => '&lt; 2.200 watt',
        2 => '2.200 - 4.400 watt',
        3 => '10.600 - 23.000 watt',
        4 => '24.000 - 53.000 watt',
        5 => '&gt; 53.000 watt',
    ];

    public static $alternatif_energi_option = [
        1 => 'Gas',
        2 => 'Batu bara',
        3 => 'Sebetan kayu',
        4 => 'Kulit kayu',
        5 => 'Serbuk gergaji',
    ];

    public static $inovasi_produk_option = [
        1 => 'Tidak ada',
        2 => 'Sudah ada perencanaan inovasi',
        3 => 'Ada pada proses prod.',
        4 => 'Desain baru',
        5 => 'Proses dan desain baru',
    ];

    public static $hubungan_pinjaman_option = [
        1 => 'Tidak pernah',
        2 => 'Berhubungan, mengajukan pinjaman tapi tidak mendapat respon',
        3 => 'Berhubungan, mengajukan pinjaman dan dijanjikan memperoleh pinjaman',
        4 => 'Berhubungan, mengajukan pinjaman dan memperoleh pinjaman namun jumlah tidak sesuai dengan pengajuan /kebutuhan',
        5 => 'Berhubungan, mengajukan pinjaman dan memperoleh pinjaman, jumlah sesuai dengan pengajuan /kebutuhan',
    ];

    public static $hubungan_frekuensi_option = [
        1 => 'Tidak pernah',
        2 => '1 - 3 kali',
        3 => '3 - 6 kali',
        4 => '6 - 10 kali',
        5 => '&gt; 10 Kali',
    ];

    public static $hubungan_internal_option = [
        2 => 'Agunan, Penulisan Proposal, Persyaratan Administratif, dan legalitas usaha',
        3 => 'Agunan, Penulisan Proposal, Persyaratan Administratif',
        4 => 'Agunan dan Penulisan Proposal',
        5 => 'Agunan',
    ];

    public static $hubungan_eksternal_option = [
        1 => 'Banyak Sekali',
        2 => 'Banyak',
        3 => 'Sedikit',
        4 => 'Sangat sedikit',
        5 => 'Tidak ada',
    ];

    public static $tk_jumlah_option = [
        1 => '&lt; 5 orang',
        2 => '5 - 10 orang',
        3 => '10 - 20 orang',
        4 => '20 - 50 orang',
        5 => '&gt; 50 orang',
    ];

    public static $tk_kompetisi_option = [
        1 => '&lt; 10% memenuhi kompetensi',
        2 => '10% - 15% memenuhi kompetensi',
        3 => '15% - 25% memenuhi kompetensi',
        4 => '25% - 40% memenuhi kompetensi',
        5 => '&gt; 40% memenuhi kompetensi',
    ];

    public static $produktif_jam_option = [
        1 => '&lt; 20 jam',
        2 => '20 - 25 jam',
        3 => '25 - 30 jam',
        4 => '30 - 35 jam',
        5 => '&gt; 35 jam',
    ];

    public static $produktif_shift_option = [
        1 => '&lt; 1 shift',
        2 => '1 shift',
        3 => '2 shift',
        4 => '3 shift',
        5 => '&gt; 3 shift',
    ];

    public static $produktif_upah_option = [
        1 => '&lt; 50% dari UMK/UMP',
        2 => '50% - 99% dari UMK/UMP',
        3 => 'Sama dengan UMK/UMP',
        4 => '10% diatas UMK/UMP',
        5 => '&gt; 10% diatas UMK/UMP',
    ];

    public static $fasilitas_tk_option = [
        1 => 'Tidak ada fasilitas',
        2 => 'Hanya sebagian kecil untuk top manajemen',
        3 => 'Hanya untuk top manajemen',
        4 => 'Untuk top dan middle manajemen',
        5 => 'Untuk top, middle dan low manajemen',
    ];

    public static $marketing_strategy_option = [
        1 => 'Tidak ada',
        2 => 'Diferensiasi berdasarkan cakupan pasar (domestic dan ekspor)',
        3 => 'Diferensiasi dan biaya rendah untuk pasar domestic',
        4 => 'Diferensiasi dan biaya rendah untuk pasar ekspor',
        5 => 'Diferensiasi dan biaya rendah untuk pasar domestic dan ekspor',
    ];

    public static $mix_product_option = [
        1 => 'Jenis dan Tipe Produk tunggal',
        2 => '2 – 3 Produk',
        3 => '4 – 5 Produk',
        4 => '6 – 7 Produk',
        5 => '&gt; 7 Produk',
    ];

    public static $mix_price_option = [
        1 => '&gt; 10% Lebih tinggi dari pesaing',
        2 => '&lt; 10% Lebih tinggi dari pesaing',
        3 => 'Sama dengan harga pesaing',
        4 => '&lt; 10% lebih rendah dari pesaing',
        5 => '&gt; 10% lebih rendah dari pesaing',
    ];

    public static $mix_place_option = [
        1 => 'Produsen - distributor – pengecer - subpengecer - konsumen',
        2 => 'Produsen - distributor - pengecer - konsumen',
        3 => 'Produsen - distributor',
        4 => 'Produsen - pengecer',
        5 => 'Produsen - konsumen',
    ];

    public static $mix_promotion_option = [
        1 => 'tidak ada biaya promosi',
        2 => 'biaya promosi < Rp5 juta',
        3 => 'Rp5 - Rp20 juta',
        4 => 'Rp20 - Rp50 juta',
        5 => '&gt; Rp50 juta',
    ];

    public static $market_share_option = [
        1 => '&lt; 5%',
        2 => '5 - 10%',
        3 => '11 - 20%',
        4 => '21 - 25%',
        5 => '&gt; 26%',
    ];

    public static $market_coverage_option = [
        1 => 'Seluruhnya pasar lokal',
        2 => '&gt; 50% pasar lokal, sisanya nasional',
        3 => 'Seluruhnya pasar nasional domestic',
        4 => '&lt; 50% ekspor',
        5 => '&gt; 50% ekspor',
    ];

    public static $market_competition_option = [
        1 => 'Tidak ada persaingan',
        2 => 'Persaingan ketat di tingkat lokal',
        3 => 'Persaingan ketat di tingkat regional',
        4 => 'Persaingan ketat di tingkat nasional',
        5 => 'Persaingan ketat di tingkat ekspor',
    ];
}
