<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionnaire extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

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
