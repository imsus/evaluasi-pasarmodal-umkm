<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Kuesioner extends Eloquent {
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	protected $fillable = array(
		'nama',
		'go',
		'status1',
		'tahun',
		'status2',
		'alamat',
		'kota',
		'telp',
		'fax',
		'hp',
		'web',
		'pj',
		'manager',
		'karyawan',
		'surat',
		'tsurat',
		'npwp',
		'siup',
		'iui',
		'situ',
		'sistem',
		'sertifikasi',
		'struktur',
		'mutu',
		'tugas',
		'modala',
		'modals',
		'modall',
		'pmodal',
		'laba',
		'plaba',
		'bank',
		'kas',
		'ar',
		'inv',
		'ca',
		'std',
		'ld',
		'bd',
		'me',
		'vc',
		'oa',
		'ltd',
		'sales',
		'expense',
		'liq',
		'sol',
		'prf',
		'kepakh',
		'kepkeu',
		'kepman',
		'saran'
	);

}
