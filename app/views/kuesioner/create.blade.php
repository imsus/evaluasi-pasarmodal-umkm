@extends('base.base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10"><h1 class="page-header">Kuesioner Baru</h1></div>
		<div class="col-md-2"><a href="/kuesioner" class="btn btn-danger btn-block" style="margin: 55px 0px 0px 0px"><span class="glyphicon glyphicon-remove"></span> Batal</a></div>
	</div>
	{{ Form::open(array('url' => 'kuesioner/new', 'role' => 'form' )) }}
	<div class="row">
		<div class="col-md-4">
			<h2 class="page-header">Data Umum</h2>
			<h3>Kontak perusahaan</h3>
			<div class="form-group">
				{{ Form::label('kontak_nama', '1. Nama Koperasi/Perusahaan UKM') }}
				{{ Form::text('kontak_nama', null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::checkbox('kontak_gopublik', 'kontak_gopublik', null, array('id' => 'kontak_gopublik')) }}
				{{ Form::label('kontak_gopublik', 'Centang Jika sudah Go Publik') }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_alamat', '2. Alamat Kantor/Pabrik') }}
				{{ Form::textarea('kontak_alamat', null, array('class' => 'form-control', 'rows' => '5')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_kota', '3. Kota, Provinsi') }}
				{{ Form::text('kontak_kota', null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_telepon', '4. No. Telepon') }}
				{{ Form::text('kontak_telepon', null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_fax', '5. No. Fax') }}
				{{ Form::text('kontak_fax', null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_handphone', '6. No. Handphone') }}
				{{ Form::text('kontak_handphone', null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_website', '7. Alamat Website') }}
				{{ Form::url('kontak_website', null, array('class' => 'form-control')) }}
			</div>
			<h3>Status Perusahaan</h3>
			<div class="form-group">
				{{ Form::label('status_tahun', '8. Tahun Berdiri') }}
				{{ Form::number('status_tahun', null, array('class' => 'form-control', 'min' => '1900', 'max' => '2100')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_usaha', '9. Status Badan Hukum/Usaha') }}
				{{ Form::select('status_usaha', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_pemodalan', '10. Status Investasi/Pemodalan') }}
				{{ Form::select('status_pemodalan', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_pj', '11. Ketua Pengurus/Penanggung Jawab') }}
				{{ Form::text('status_pj', null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_manajer', '12. Jumlah Perwakilan Manajer') }}
				{{ Form::number('status_manajer', null, array('class' => 'form-control', 'min' => '1900', 'max' => '2100')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_karyawan', '13. Jumlah Karyawan') }}
				{{ Form::number('status_karyawan', null, array('class' => 'form-control', 'min' => '1900', 'max' => '2100')) }}
			</div>
		</div>
		<div class="col-md-4">
			<h2 class="page-header">Aspek Manajerial</h2>
			<h3>Dokumen legalitas perusahaan</h3>
			<div class="form-group">
				{{ Form::label('dokumen_akte', '14. Apakah perusahaan anda memiliki Akte Pendirian?') }}
				{{ Form::select('dokumen_akte', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('dokumen_tahun', '15. Tahun terbit surat') }}
				{{ Form::number('dokumen_tahun', null, array('class' => 'form-control', 'min' => '1900', 'max' => '2100')) }}
			</div>
			<div class="form-group">
				{{ Form::label(null, '16. Apakah perusahaan ada / memiliki kelengkapan perijinanan perusahaan?') }}
				{{ Form::checkbox('dokumen_npwp', 'dokumen_npwp', null, array('id' => 'dokumen_npwp')) }}
				{{ Form::label('dokumen_npwp', 'NPWP') }}
				{{ Form::checkbox('dokumen_siup', 'dokumen_siup', null, array('id' => 'dokumen_siup')) }}
				{{ Form::label('dokumen_siup', 'SIUP') }}
				{{ Form::checkbox('dokumen_tdp', 'dokumen_tdp', null, array('id' => 'dokumen_tdp')) }}
				{{ Form::label('dokumen_tdp', 'TDP') }}
				{{ Form::checkbox('dokumen_iui', 'dokumen_iui', null, array('id' => 'dokumen_iui')) }}
				{{ Form::label('dokumen_iui', 'IUI/TDI') }}
				{{ Form::checkbox('dokumen_situ', 'dokumen_situ', null, array('id' => 'dokumen_situ')) }}
				{{ Form::label('dokumen_situ', 'SITU') }}
			</div>
			<h3>Sistem Manajemen</h3>
			<div class="form-group">
				{{ Form::label('sm_punya', '17. Apakah perusahaan anda memiliki dan menerapkan Sistem Manajemen?') }}
				{{ Form::select('sm_punya', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_sertifikasi', '18. Apakah Sistem Manajemen Mutu perusahaan  anda mendapat sertifikasi?') }}
				{{ Form::select('sm_sertifikasi', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_so', '19. Apakah Koperasi/perusahaan anda memiliki struktur organisasi?') }}
				{{ Form::select('sm_so', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_jobdesc', '20. *Jika Ya, apakah disertai dengan uraian tugas dan fungsi untuk seluruh bagian?') }}
				{{ Form::select('sm_jobdesc', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_sop', '21. Apakah Koperasi/perusahaan anda memiliki SOP?') }}
				{{ Form::select('sm_sop', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_arsip', '22. Apakah Koperasi/perusahaan anda memiliki sistem pengarsipan?') }}
				{{ Form::select('sm_arsip', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_audit', '23. Apakah Koperasi/perusahaan anda melakukan internal audit secara berkala?') }}
				{{ Form::select('sm_audit', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_tqc', '24. Apakah perusahaan melakukan total quality control dari bahan baku sampai ke produk?') }}
				{{ Form::select('sm_tqc', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_satisfaction', '25. Apakah perusahaan anda memperhatikan kepuasan pelanggan?') }}
				{{ Form::select('sm_satisfaction', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Kelengkapan sarana dan prasarana</h3>
			<div class="form-group">
				{{ Form::label('sarana_luas_kantor', '26. Berapakah luas bangunan tempat kerja dan kantor?') }}
				{{ Form::select('sarana_luas_kantor', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_kondisi_kantor', '27. Bagaimana kondisi bangunan tempat kerja dan kantor?') }}
				{{ Form::select('sarana_kondisi_kantor', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_nilai_kantor', '28. Berapa perkiraan nilai bangunan tempat kerja dan kantor?') }}
				{{ Form::select('sarana_nilai_kantor', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_luas_gudang', '29. Berapa luas bangunan gudang? ') }}
				{{ Form::select('sarana_luas_gudang', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_kondisi_gudang', '30. Bagaimana kondisi bangunan gudang?') }}
				{{ Form::select('sarana_kondisi_gudang', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_nilai_gudang', '31. Berapa perkiraan nilai bangunan gudang?') }}
				{{ Form::select('sarana_nilai_gudang', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_jumlah_mobil', '32. Berapa jumlah mobil pribadi/perusahaan yang dimiliki oleh Koperasi/perusahaan?') }}
				{{ Form::select('sarana_jumlah_mobil', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_nilai_mobil', '33. Berapa nilai perolehan/pasar mobil pribadi/perusahaan dan yang dimiliki oleh Koperasi/perusahaan?') }}
				{{ Form::select('sarana_nilai_mobil', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_jumlah_angkutan', '34. Berapa jumlah mobil angkutan yang dimiliki oleh perusahaan anda?') }}
				{{ Form::select('sarana_jumlah_angkutan', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_nilai_angkutan', '35. Berapa nilai perolehan/pasar mobil angkutan yang dimiliki oleh perusahaan anda?') }}
				{{ Form::select('sarana_nilai_angkutan', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Potensi Perluasan</h3>
			<div class="form-group">
				{{ Form::label('potensi_perluasan', '36. Apakah perusahaan mempunyai rencana perluasan terhadap kegiatan produksi, gedung dan sarana serta fasilitas produksi?') }}
				{{ Form::select('potensi_perluasan', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="col-md-4">
			<h2 class="page-header">Aspek Mesin dan Produksi</h2>
			<h3>Efisiensi dan efektivitas</h3>
			<div class="form-group">
				{{ Form::label('efisiensi_standar', '37. Apakan jenis-jenis mesin yang digunakan oleh perusahaan anda sudah memenuhi standar minimal dari produk yang akan dibuat?') }}
				{{ Form::select('efisiensi_standar', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_jumlah', '38. Apakah jumlah mesin yang ada sudah mencukupi  dengan volume produk yang akan dihasilkan?') }}
				{{ Form::select('efisiensi_jumlah', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_kapasitas', '39. Apakah setiap mesin di Koperasi/perusahaan anda sudah bekerja secara maksimal (sesuai jam kerja)?') }}
				{{ Form::select('efisiensi_kapasitas', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_umur', '40. Berapa usia mayoritasmesin yang digunakan di Koperasi/perusahaan anda?') }}
				{{ Form::select('efisiensi_umur', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_perawatan', '41. Apakah dilakukan perawatan mesin-mesin produksi di Koperasi/perusahaan anda?') }}
				{{ Form::select('efisiensi_perawatan', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_rendemen', '42. Berapa nilai efisiensi produksi (rendemen) dari usaha yang dilakukan?') }}
				{{ Form::select('efisiensi_rendemen', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_variasi', '43. Berapa jenis produk yang dihasilkan oleh Koperasi/perusahaan?') }}
				{{ Form::select('efisiensi_variasi', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Kebutuhan energi</h3>
			<div class="form-group">
				{{ Form::label('energi_pln', '44. Berapa kapasitas listrik yang dipakai di Koperasi/perushaan anda?') }}
				{{ Form::select('energi_pln', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('energi_genset', '45. Berapa kapasitas listrik yang dipakai di Koperasi/perushaan anda?') }}
				{{ Form::select('energi_genset', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Penggunaan energi alternatif selain PLN dan Genset</h3>
			<div class="form-group">
				{{ Form::label('alternatif_energi', '46. Selain penggunaan listrik PLN dan genset, apakah koperasi/perusahaan anda menggunakan energi alternative dalam proses produksi?') }}
				{{ Form::select('alternatif_energi', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Inovasi produk dan proses produksi</h3>
			<div class="form-group">
				{{ Form::label('inovasi_produk', '47. Adakah inovasi baru yang dilakukan oleh Koperasi/perusahaan anda dalam meningkatkan nilai jual dan kualitas produk?') }}
				{{ Form::select('inovasi_produk', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="col-md-4">
			<h2 class="page-header">Aspek Keuangan</h2>
			<h3>Nilai Modal</h3>
			<div class="form-group">
				{{ Form::label('modal_awal', '48. Berapa besar Modal Awal perusahaan/usaha Anda?') }}
				{{ Form::select('modal_awal', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('modal_sendiri', '49. Berapa besar Modal Sendiri saat ini di perusahaan/usaha Anda?') }}
				{{ Form::select('modal_sendiri', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('modal_luar', '50. Berapa besar Modal Luar (pinjaman saat ini) di perusahaan/usaha Anda?') }}
				{{ Form::select('modal_luar', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('modal_perimbangan', '51. Bagaimana perimbangan antara modal luar dan modal sendiri?') }}
				{{ Form::select('modal_perimbangan', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Laba Usaha</h3>
			<div class="form-group">
				{{ Form::label('laba_usaha', '52. Berapakah besar laba usaha tahunan dari Koperasi/perusahaan anda?') }}
				{{ Form::select('laba_usaha', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Hubungan dengan Perbankan</h3>
			<div class="form-group">
				{{ Form::label('hubungan_pinjaman', '53. Bagaimanakah selama ini hubungan usaha anda dengan perbankan?') }}
				{{ Form::select('hubungan_pinjaman', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('hubungan_frekuensi', '54. Seberapa banyak/kali anda berhubungan untuk mengajukan pinjaman ke perbankan selama 3 tahun terakhir?') }}
				{{ Form::select('hubungan_frekuensi', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('hubungan_internal', '55. Kendala internal apakah yang dihadapi perusahaan dalam berhubungan dengan peminjaman/kredit dari perbankan?') }}
				{{ Form::select('hubungan_internal', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('hubungan_eksternal', '56. Kendala eksternal apakah yang dihadapi perusahaan jika berhadapan dengan lembaga keuangan (bank dan non bank)?') }}
				{{ Form::select('hubungan_eksternal', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Analisa aspek rasio keuangan</h3>
			<div class="form-group">
				{{ Form::label('rasio_likuiditas', '57. Bagaimanakan keadaan likuiditas Koperasi/perusahaan untuk tiga tahun terakhir?') }}
				{{ Form::select('rasio_likuiditas', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('rasio_solvabilitas', '58. Bagaimanakah keadaan solvabilitas Koperasi/perusahaan anda?') }}
				{{ Form::select('rasio_solvabilitas', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('rasio_profitabilitas', '59. Bagaimanakah keadaan profitabilitas usaha Koperasi/perusahaan anda?') }}
				{{ Form::select('rasio_profitabilitas', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="col-md-4">
			<h2 class="page-header">Aspek SDM</h2>
			<h3>Pemenuhan Tenaga Kerja</h3>
			<div class="form-group">
				{{ Form::label('tk_jumlah', '60. Berapakah jumlah tenaga kerja di Koperasi/perusahaan anda pada saat ini?') }}
				{{ Form::select('tk_jumlah', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('tk_kompetisi', '61. Bagaimanakah kompetensi tenaga kerja di koperasi/perusahaan anda saat ini?') }}
				{{ Form::select('tk_kompetisi', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('tk_gender', '62. Bagaimanakah komposisi tenaga kerja pada perusahaan anda dilihat dari jenis kelamin?') }}
				{{ Form::select('tk_gender', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Produktifitas Kerja</h3>
			<div class="form-group">
				{{ Form::label('produktif_jam', '63. Berapa lama jam kerja tenaga kerja di perusaahan anda saat ini?') }}
				{{ Form::select('produktif_jam', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('produktif_shift', '64. Bagaimanakah shift (giliran kerja) diperusahaan anda saat ini?') }}
				{{ Form::select('produktif_shift', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('produktif_upah', '65. Berapa standar upah tenaga kerja?') }}
				{{ Form::select('produktif_upah', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Fasilitas untuk Tenaga Kerja</h3>
			<div class="form-group">
				{{ Form::label('fasilitas_tk', '66. Bagaimanakah fasilitas yang diberikan koperasi/perusahaan kepada pegawai?') }}
				{{ Form::select('fasilitas_tk', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="col-md-4">
			<h2 class="page-header">Aspek Pemasaran</h2>
			<h3>Strategi Pemasaran</h3>
			<div class="form-group">
				{{ Form::label('marketing_strategy', '67. Strategi apakah yang diterapkan /diberlakukan Koperasi/perusahaan saat ini?') }}
				{{ Form::select('marketing_strategy', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Bauran Pemasaran</h3>
			<div class="form-group">
				{{ Form::label('mix_product', '68. Berapa macam/jenis dan tipe produk yang dibuat dan dipasarkan di Koperasi/perusahaan anda?') }}
				{{ Form::select('mix_product', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('mix_price', '69. Bagaimanakah penerapan harga di Koperasi/perusahaan anda?') }}
				{{ Form::select('mix_price', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('mix_place', '70. Bagaimanakah saluran distribusi produk Koperasi/perusahaan anda?') }}
				{{ Form::select('mix_place', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('mix_promotion', '71. Bagaimanakah keadaan profitabilitas usaha Koperasi/perusahaan anda?') }}
				{{ Form::select('mix_promotion', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Penguasaan Pasar</h3>
			<div class="form-group">
				{{ Form::label('market_share', '72. Bagaimanakah keadaan market share perusahaan anda saat ini?') }}
				{{ Form::select('market_share', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Cakupan Pasar</h3>
			<div class="form-group">
				{{ Form::label('market_coverage', '73. Bagaimanakah cakupan pasar Koperasi/perusahaan anda saat ini?') }}
				{{ Form::select('market_coverage', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
			<h3>Persaingan</h3>
			<div class="form-group">
				{{ Form::label('market_competition', '74. Bagaimanakah keadaan persaingan produk yang dihasilkan Koperasi/perusahaan anda saat ini?') }}
				{{ Form::select('market_competition', array('makan', 'minum'), null, array('class' => 'form-control')) }}
			</div>
		</div>

		<div class="clearfix"></div>

	</div>
	{{ Form::close() }}
</div>
@stop
