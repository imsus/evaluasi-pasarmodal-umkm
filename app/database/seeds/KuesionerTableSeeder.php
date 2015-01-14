<?php

class KuesionerTableSeeder extends Seeder {

    public function run()
    {
        DB::table('kuesioners')->delete();

        Kuesioner::create(array(
        	'user' => 'umkm',
	        // Data Umum
	        'nama' => 'Saung Ayam',
	        'go' => 0,
	        'status1' => 'PT',
	        'tahun' => '2000',
	        'status2' => 'PMDN',
	        'alamat' => 'Jl. H.R Rasuna Said',
	        'kota' => 'Kuningan, Jakarta Selatan',
	        'telp' => '021 1234',
	        'fax' => '021 1234',
	        'hp' => '021 1234',
	        'web' => 'http://google.com',
	        'pj' => 'Mas Budi',
	        'manager' => 4,
	        'karyawan' => 10,
	        // Aspek Managerial
	        'surat' => 1,
	        'tsurat' => 1999,
	        'npwp' => 0,
	        'siup' => 0,
	        'iui' => 0,
	        'situ' => 0,
	        'sistem' => 3,
	        'sertifikasi' => 4,
	        'struktur' => 2,
	        'mutu' => 2,
	        'tugas' => 3,
	        'modala' => 50000,
	        'modals' => 50000,
	        'modall' => 50000,
	        'pmodal' => 3,
	        'laba' => 1,
	        'plaba' => 1,
	        'bank' => 1,
	        // Aspek Keuangan
	        'kas' => 50000,
	        'ar' => 50000,
	        'inv' => 50000,
	        'ca' => 50000,
	        'std' => 50000,
	        'ld' => 50000,
	        'bd' => 50000,
	        'me' => 50000,
	        'vc' => 50000,
	        'oa' => 50000,
	        'ltd' => 50000,
	        'sales' => 50000,
	        'expense' => 50000,
	        //Output
	        'liq' => 1.5,
	        'sol' => 4,
	        'prf' => 0,
	        'kepakh' => 'Emiten dan Invest (Go Publik)',
	        'kepkeu' => '',
	        'kepman' => '',
	        'saran' => 'Anda harus menambah kas,piutang,atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik'
    	));
    }

}
