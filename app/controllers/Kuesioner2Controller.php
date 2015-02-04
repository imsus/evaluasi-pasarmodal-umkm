<?php

class kuesioner2Controller extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		//
		$dokumen_akte = array(
				'Ada',
				'Tidak Ada',
			);

		$sm_punya_option = array(
				'Tidak memiliki',
				'Tidak memiliki, sedang merancang',
				'Memiliki, Tidak menerapkan',
				'Memiliki, dijalankan sebagian',
				'Memiliki, dijalankan semuanya',
			);

		$sm_sertifikasi_option = array(
				'Tidak',
				'Sedang mengajukan',
				'Memiliki tidak valid',
				'Memiliki suspended',
				'Memiliki valid',
			);

		$sm_so_option = array(
				'Tidak memiliki',
				'Tidak memiliki, sedang merancang',
				'Memiliki, tidak berfungsi',
				'Memiliki, berfungsi sebagian',
				'Memiliki, berfungsi seluruhnya',
			);

		$sm_jobdesc_option = array(
				'Tidak ada',
				'Tidak lengkap',
				'Kurang lengkap',
				'Lengkap',
				'Lengkap sekali',
			);

		$sm_sop_option = array(
				'Tidak',
				'Sedang dibuat',
				'Ya tidak dijalankan',
				'Ya dijalankan sebagian',
				'Ya dijalankan seluruhnya',
			);

		$sm_arsip_option = array(
				'Tidak',
				'Sedang dibuat',
				'Ya tidak dijalankan',
				'Ya dijalankan sebagian',
				'Ya dijalankan seluruhnya',
			);

		$sm_audit_option = array(
				'Tidak',
				'Ya pernah melakukan',
				'Ya tidak berkala',
				'Ya tidak terjadwal',
				'Ya terjadwal',
			);

		$sm_tqc_option = array(
				'Tidak',
				'Ya melakukan pada bagian produk akhir',
				'Ya melakukan hanya di input dan produk',
				'Ya melakukan dari proses sampai ke produk',
				'Ya melakukan dari input, proses dan produk',
			);

		$sm_satisfaction_option = array(
				'Tidak',
				'Kurang memperhatikan keluhan,tidak tersedia sarana pengaduan',
				'Memperhatikan (ada sarana pengaduan) tapi tidak ada tindak lanjut',
				'Memperhatikan dan memberi kompensasi',
				'Sangat memperhatikan dan memberikan garansi 100%',
			);

		$sarana_luas_kantor_option = array(
				'<100m2',
				'100-200',
				'200-500',
				'500-1000',
				'>1000',
			);

		$sarana_kondisi_kantor_option = array(
				'Sederhana',
				'Sederhana dari papan',
				'Setengah permanen',
				'Permanen',
				'Mewah',
			);

		$sarana_nilai_kantor_option = array(
				'<10juta',
				'10-100juta',
				'100-250juta',
				'250-500juta',
				'>500juta',
			);

		$sarana_luas_gudang_option = array(
				'<50 m2',
				'50-100',
				'100-200',
				'200-500',
				'>500',
			);

		$sarana_kondisi_gudang_option = array(
				'Sederhana',
				'Sederhana dari papan',
				'Setengah permanen',
				'Permanen',
				'Mewah',
			);

		$sarana_nilai_gudang_option = array(
				'<10 juta',
				'10-100 juta',
				'100-250 juta',
				'250-500 juta',
				'>500 juta',
			);

		$sarana_jumlah_mobil_option = array(
				'Tidak Punya',
				'Punya 1',
				'Punya 1 – 2',
				'Punya 2 – 4',
				'Diatas 4',
			);

		$sarana_nilai_mobil_option = array(
				'Rp.0',
				'<100 juta',
				'100 juta – 300 juta',
				'300 – 500 juta',
				'>500 juta',
			);

		$sarana_jumlah_angkutan_option = array(
				'Tidak Punya',
				'Punya 1',
				'Punya 1 – 2',
				'Punya 2 – 4',
				'Diatas 4',
			);

		$sarana_nilai_angkutan_option = array(
				'Rp.0',
				'<100 juta',
				'100 juta – 300 juta',
				'300 – 500 juta',
				'>500 juta',
			);

		$potensi_perluasan_option = array(
				'Tidak',
				'Jangka pendek menambah kapasitas <10%',
				'Jangka menengah menambah kapasitas 10 – 20%',
				'Jangka menengah menambah kapasitas 20 – 50%',
				'Jangka panjang menambah >50%',
			);

		$efisiensi_standar_option = array(
				'Tidak',
				'<50%',
				'50% memenuhi standar',
				'>50%',
				'Ya',
			);

		$efisiensi_jumlah_option = array(
				'Sangat kurang',
				'Kurang',
				'80% cukup',
				'Cukup',
				'Lebih dari cukup',
			);

		$efisiensi_kapasitas_option = array(
				'10%',
				'10-25%',
				'25-50%',
				'50-75%',
				'75-100%',
			);

		$efisiensi_umur_option = array(
				'>10',
				'5-10',
				'3-5',
				'1-3',
				'0-1',
			);

		$efisiensi_perawatan_option = array(
				'Tidak Pernah',
				'Jarang',
				'Kadang-kadang',
				'Sering',
				'Terjadwal',
			);

		$efisiensi_rendemen_option = array(
				'<30%'
				'32-40'
				'40-55'
				'55-70'
				'> 80% '
			);

		$efisiensi_variasi_option = array(
				'1 jenis',
				'2 jenis',
				'3 jenis',
				'4 jenis',
				'> 5 jenis',
			);

		$energi_pln_option = array(
				'<2200 watt',
				'2200-4400',
				'10600-23.000',
				'24.000-53.000',
				'>53.000',
			);

		$energi_genset_option = array(
				'<2200 watt',
				'2200-4400',
				'10600-23.000',
				'24.000-53.000',
				'>53.000',
			);

		$alternatif_energi_option = array(
				'Gas',
				'Batu bara',
				'Sebetan kayu',
				'Kulit kayu',
				'Serbuk gergaji',
			);

		$inovasi_produk_option = array(
				'Tidak ada='
				'Sudah ada perencanaan inovasi'
				'Ada pada proses prod.'
				'Desain baru'
				'Proses dan desain baru'
			);

		$hubungan_pinjaman_option = array(
				'Tidak pernah',
				'Berhubungan, mengajukan pinjaman tapi tidak mendapat respon',
				'Berhubungan, mengajukan pinjaman dan dijanjikan memperoleh pinjaman',
				'Berhubungan, mengajukan pinjaman dan memperoleh pinjaman namun jumlah tidak sesuai dengan pengajuan /kebutuhan',
				'Berhubungan, mengajukan pinjaman dan memperoleh pinjaman, jumlah sesuai dengan pengajuan /kebutuhan',
			);

		$hubungan_frekuensi_option = array(
				'Tidak pernah',
				'1-3 kali',
				'3-6 kali',
				'6-10 kali',
				'>10 Kali',
			);

		$hubungan_internal_option = array(
				'Agunan, Penulisan Proposal, Persyaratan Administratif, dan legalitas usaha',
				'Agunan, Penulisan Proposal, Persyaratan Administratif',
				'Agunan dan Penulisan Proposal',
				'Agunan',
			);

		$hubungan_eksternal_option = array(
				'Banyak Sekali',
				'Banyak',
				'Sedikit',
				'Sangat sedikit',
				'Tidak ada',
			);

		$tk_jumlah_option = array(
				'<5 orang',
				'5-10',
				'10-20',
				'20-50',
				'>50',
			);

		$tk_kompetisi_option = array(
				'<10% memenuhi kompetensi',
				'10%-15%',
				'15%-25%',
				'25%-40%',
				'>40%',
			);

		$produktif_jam_option = array(
				'<20 jam',
				'20-25',
				'25-30',
				'30-35',
				'>35',
			);

		$produktif_shift_option = array(
				'<1',
				'1',
				'2',
				'3',
				'>3',
			);

		$produktif_upah_option = array(
				'<50% dari UMK/UMP',
				'50%-99% dari UMK/UMP',
				'Sama dengan UMK/UMP',
				'10% diatas UMK/UMP',
				'> 10% diatas UMK/UMP',
			);

		$fasilitas_tk_option = array(
				'Tidak ada fasilitas',
				'Hanya sebagian kecil untuk top manajemen',
				'Hanya untuk top manajemen',
				'Untuk top dan middle manajemen',
				'Untuk top, middle dan low manajemen',
			);

		$marketing_strategy_option = array(
				'Tidak ada',
				'Diferensiasi berdasarkan cakupan pasar (domestic dan ekspor)',
				'Diferensiasi dan biaya rendah untuk pasar domestic',
				'Diferensiasi dan biaya rendah untuk pasar ekspor',
				'Diferensiasi dan biaya rendah untuk pasar domestic dan ekspor',
			);

		$mix_product_option = array(
				'Jenis dan Tipe Produk tunggal',
				'2 – 3 Produk',
				'4 – 5 Produk',
				'6 – 7 Produk',
				'> 7',
			);

		$mix_price_option = array(
				'>10% Lebih tinggi dari pesaing',
				'<10% Lebih tinggi dari pesaing',
				'Sama dengan harga pesaing',
				'<10% lebih rendah dari pesaing',
				'>10% lebih rendah dari pesaing',
			);

		$mix_place_option = array(
				'Produsen - distributor – pengecer - subpengecer - konsumen',
				'Produsen - distributor - pengecer - konsumen',
				'Produsen - distributor',
				'Produsen - pengecer',
				'Produsen - konsumen',
			);

		$mix_promotion_option = array(
				'tidak ada biaya promosi',
				'biaya promosi <5 juta',
				'5-20 juta',
				'20-50 juta',
				'>50 juta',
			);

		$market_share_option = array(
				'<5%',
				'5-10%',
				'11-20%',
				'21-25%',
				'>26%',
			);

		$market_coverage_option = array(
				'Seluruhnya pasar local',
				'>50% pasar local, sisanya nasional',
				'Seluruhnya pasar nasional domestic',
				'<50% ekspor',
				'>50% ekspor',
			);

		$market_competition_option = array(
				'Tidak ada persaingan',
				'Persaingan ketat di tingkat local',
				'Persaingan ketat di tingkat regional',
				'Persaingan ketat di tingkat nasional',
				'Persaingan ketat di tingkat ekspor',
			);

		$this->beforeFilter('auth', array('kuesioner' => 'login'));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
