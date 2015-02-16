@extends('base.base')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9"><h1 class="page-header">Edit Kuesioner <strong>#{{ $kuesioner->id }}</strong></h1></div>
		<div class="col-md-3">
			<div class="btn-group btn-group-justified page-navigation" style="margin: 55px 0px 0px 0px">
				<div class="btn-group"><a href="/kuesioner-new" type="button" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Balik</a></div>
				<div class="btn-group"><a href="/kuesioner-new/detail/{{ $kuesioner->id }}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Detil</a></div>
				<div class="btn-group"><a href="/kuesioner-new/delete/{{ $kuesioner->id }}" type="button" class="btn btn-danger" onclick="return window.confirm('Data akan dihapus secara permanen.\nApakah Anda Yakin?')"><span class="glyphicon glyphicon-trash"></span></a></div>
			</div>
		</div>
	</div>
	{{ Form::open(array('url' => 'kuesioner-new/edit/' . $kuesioner->id, 'role' => 'form', 'method' => 'put' )) }}
	<div class="row">
		<div class="col-md-4">
			<h2 class="page-header">Data Umum</h2>
			<h3>Kontak perusahaan</h3>
			<div class="form-group">
				{{ Form::label('kontak_nama', '1. Nama Koperasi/Perusahaan UKM') }}
				{{ Form::text('kontak_nama', $kuesioner->kontak_nama, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::checkbox('kontak_gopublik', 'kontak_gopublik', $kuesioner->kontak_gopublik, array('id' => 'kontak_gopublik')) }}
				{{ Form::label('kontak_gopublik', 'Centang Jika sudah Go Publik') }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_alamat', '2. Alamat Kantor/Pabrik') }}
				{{ Form::textarea('kontak_alamat', $kuesioner->kontak_alamat, array('class' => 'form-control', 'rows' => '5')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_kota', '3. Kota, Provinsi') }}
				{{ Form::text('kontak_kota', $kuesioner->kontak_kota, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_telepon', '4. No. Telepon') }}
				{{ Form::input('tel', 'kontak_telepon', $kuesioner->kontak_telepon, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_fax', '5. No. Fax') }}
				{{ Form::input('tel', 'kontak_fax', $kuesioner->kontak_fax, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_handphone', '6. No. Handphone') }}
				{{ Form::input('tel', 'kontak_handphone', $kuesioner->kontak_handphone, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('kontak_website', '7. Alamat Website') }}
				{{ Form::url('kontak_website', $kuesioner->kontak_website, array('class' => 'form-control')) }}
			</div>
			<h3>Status Perusahaan</h3>
			<div class="form-group">
				{{ Form::label('status_tahun', '8. Tahun Berdiri') }}
				{{ Form::number('status_tahun', $kuesioner->status_tahun, array('class' => 'form-control', 'min' => '1900', 'max' => '2100')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_usaha', '9. Status Badan Hukum/Usaha') }}
				{{ Form::select('status_usaha', KuesionerNew::$status_usaha_option, $kuesioner->status_usaha, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_pemodalan', '10. Status Investasi/Pemodalan') }}
				{{ Form::select('status_pemodalan', KuesionerNew::$status_pemodalan_option, $kuesioner->status_pemodalan, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_pj', '11. Ketua Pengurus/Penanggung Jawab') }}
				{{ Form::text('status_pj', $kuesioner->status_pj, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_manajer', '12. Jumlah Perwakilan Manajer') }}
				{{ Form::number('status_manajer', $kuesioner->status_manajer, array('class' => 'form-control', 'min' => '0')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status_karyawan', '13. Jumlah Karyawan') }}
				{{ Form::number('status_karyawan', $kuesioner->status_karyawan, array('class' => 'form-control', 'min' => '0')) }}
			</div>
		</div>
		<div class="col-md-4">
			<h2 class="page-header">Aspek Manajerial</h2>
			<h3>Dokumen legalitas perusahaan</h3>
			<div class="form-group">
				{{ Form::label('dokumen_akte', '14. Apakah perusahaan anda memiliki Akte Pendirian?') }}
				{{ Form::select('dokumen_akte', KuesionerNew::$dokumen_akte_option, $kuesioner->dokumen_akte, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('dokumen_tahun', '15. Tahun terbit surat') }}
				{{ Form::number('dokumen_tahun', $kuesioner->dokumen_tahun, array('class' => 'form-control', 'min' => '1900', 'max' => '2100')) }}
			</div>
			<div class="form-group">
				{{ Form::label(null, '16. Apakah perusahaan ada / memiliki kelengkapan perijinanan perusahaan?') }}
				{{ Form::checkbox('dokumen_npwp', 1, $kuesioner->dokumen_npwp, array('id' => 'dokumen_npwp')) }}
				{{ Form::label('dokumen_npwp', 'NPWP') }}
				{{ Form::checkbox('dokumen_siup', 1, $kuesioner->dokumen_siup, array('id' => 'dokumen_siup')) }}
				{{ Form::label('dokumen_siup', 'SIUP') }}
				{{ Form::checkbox('dokumen_tdp', 1, $kuesioner->dokumen_tdp, array('id' => 'dokumen_tdp')) }}
				{{ Form::label('dokumen_tdp', 'TDP') }}
				{{ Form::checkbox('dokumen_iui', 1, $kuesioner->dokumen_iui, array('id' => 'dokumen_iui')) }}
				{{ Form::label('dokumen_iui', 'IUI/TDI') }}
				{{ Form::checkbox('dokumen_situ', 1, $kuesioner->dokumen_situ, array('id' => 'dokumen_situ')) }}
				{{ Form::label('dokumen_situ', 'SITU') }}
			</div>
			<h3>Sistem Manajemen</h3>
			<div class="form-group">
				{{ Form::label('sm_punya', '17. Apakah perusahaan anda memiliki dan menerapkan Sistem Manajemen?') }}
				{{ Form::select('sm_punya', KuesionerNew::$sm_punya_option, $kuesioner->sm_punya, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_sertifikasi', '18. Apakah Sistem Manajemen Mutu perusahaan anda mendapat sertifikasi?') }}
				{{ Form::select('sm_sertifikasi', KuesionerNew::$sm_sertifikasi_option, $kuesioner->sm_sertifikasi, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_so', '19. Apakah Koperasi/perusahaan anda memiliki struktur organisasi?') }}
				{{ Form::select('sm_so', KuesionerNew::$sm_so_option, $kuesioner->sm_so, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_jobdesc', '20. *Jika Ya, apakah disertai dengan uraian tugas dan fungsi untuk seluruh bagian?') }}
				{{ Form::select('sm_jobdesc', KuesionerNew::$sm_jobdesc_option, $kuesioner->sm_jobdesc, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_sop', '21. Apakah Koperasi/perusahaan anda memiliki SOP?') }}
				{{ Form::select('sm_sop', KuesionerNew::$sm_sop_option, $kuesioner->sm_sop, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_arsip', '22. Apakah Koperasi/perusahaan anda memiliki sistem pengarsipan?') }}
				{{ Form::select('sm_arsip', KuesionerNew::$sm_arsip_option, $kuesioner->sm_arsip, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_audit', '23. Apakah Koperasi/perusahaan anda melakukan internal audit secara berkala?') }}
				{{ Form::select('sm_audit', KuesionerNew::$sm_audit_option, $kuesioner->sm_audit, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_tqc', '24. Apakah perusahaan melakukan total quality control dari bahan baku sampai ke produk?') }}
				{{ Form::select('sm_tqc', KuesionerNew::$sm_tqc_option, $kuesioner->sm_tqc, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sm_satisfaction', '25. Apakah perusahaan anda memperhatikan kepuasan pelanggan?') }}
				{{ Form::select('sm_satisfaction', KuesionerNew::$sm_satisfaction_option, $kuesioner->sm_satisfaction, array('class' => 'form-control')) }}
			</div>
			<h3>Kelengkapan sarana dan prasarana</h3>
			<div class="form-group">
				{{ Form::label('sarana_luas_kantor', '26. Berapakah luas bangunan tempat kerja dan kantor?') }}
				{{ Form::select('sarana_luas_kantor', KuesionerNew::$sarana_luas_kantor_option, $kuesioner->sarana_luas_kantor, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_kondisi_kantor', '27. Bagaimana kondisi bangunan tempat kerja dan kantor?') }}
				{{ Form::select('sarana_kondisi_kantor', KuesionerNew::$sarana_kondisi_kantor_option, $kuesioner->sarana_kondisi_kantor, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_nilai_kantor', '28. Berapa perkiraan nilai bangunan tempat kerja dan kantor?') }}
				{{ Form::select('sarana_nilai_kantor', KuesionerNew::$sarana_nilai_kantor_option, $kuesioner->sarana_nilai_kantor, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_luas_gudang', '29. Berapa luas bangunan gudang? ') }}
				{{ Form::select('sarana_luas_gudang', KuesionerNew::$sarana_luas_gudang_option, $kuesioner->sarana_luas_gudang, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_kondisi_gudang', '30. Bagaimana kondisi bangunan gudang?') }}
				{{ Form::select('sarana_kondisi_gudang', KuesionerNew::$sarana_kondisi_gudang_option, $kuesioner->sarana_kondisi_gudang, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_nilai_gudang', '31. Berapa perkiraan nilai bangunan gudang?') }}
				{{ Form::select('sarana_nilai_gudang', KuesionerNew::$sarana_nilai_gudang_option, $kuesioner->sarana_nilai_gudang, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_jumlah_mobil', '32. Berapa jumlah mobil pribadi/perusahaan yang dimiliki oleh Koperasi/perusahaan?') }}
				{{ Form::select('sarana_jumlah_mobil', KuesionerNew::$sarana_jumlah_mobil_option, $kuesioner->sarana_jumlah_mobil, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_nilai_mobil', '33. Berapa nilai perolehan/pasar mobil pribadi/perusahaan dan yang dimiliki oleh Koperasi/perusahaan?') }}
				{{ Form::select('sarana_nilai_mobil', KuesionerNew::$sarana_nilai_mobil_option, $kuesioner->sarana_nilai_mobil, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_jumlah_angkutan', '34. Berapa jumlah mobil angkutan yang dimiliki oleh perusahaan anda?') }}
				{{ Form::select('sarana_jumlah_angkutan', KuesionerNew::$sarana_jumlah_angkutan_option, $kuesioner->sarana_jumlah_angkutan, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('sarana_nilai_angkutan', '35. Berapa nilai perolehan/pasar mobil angkutan yang dimiliki oleh perusahaan anda?') }}
				{{ Form::select('sarana_nilai_angkutan', KuesionerNew::$sarana_nilai_angkutan_option, $kuesioner->sarana_nilai_angkutan, array('class' => 'form-control')) }}
			</div>
			<h3>Potensi Perluasan</h3>
			<div class="form-group">
				{{ Form::label('potensi_perluasan', '36. Apakah perusahaan mempunyai rencana perluasan terhadap kegiatan produksi, gedung dan sarana serta fasilitas produksi?') }}
				{{ Form::select('potensi_perluasan', KuesionerNew::$potensi_perluasan_option, $kuesioner->potensi_perluasan, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="col-md-4">
			<h2 class="page-header">Aspek Mesin dan Produksi</h2>
			<h3>Efisiensi dan efektivitas</h3>
			<div class="form-group">
				{{ Form::label('efisiensi_standar', '37. Apakan jenis-jenis mesin yang digunakan oleh perusahaan anda sudah memenuhi standar minimal dari produk yang akan dibuat?') }}
				{{ Form::select('efisiensi_standar', KuesionerNew::$efisiensi_standar_option, $kuesioner->efisiensi_standar, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_jumlah', '38. Apakah jumlah mesin yang ada sudah mencukupi  dengan volume produk yang akan dihasilkan?') }}
				{{ Form::select('efisiensi_jumlah', KuesionerNew::$efisiensi_jumlah_option, $kuesioner->efisiensi_jumlah, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_kapasitas', '39. Apakah setiap mesin di Koperasi/perusahaan anda sudah bekerja secara maksimal (sesuai jam kerja)?') }}
				{{ Form::select('efisiensi_kapasitas', KuesionerNew::$efisiensi_kapasitas_option, $kuesioner->efisiensi_kapasitas, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_umur', '40. Berapa usia mayoritasmesin yang digunakan di Koperasi/perusahaan anda?') }}
				{{ Form::select('efisiensi_umur', KuesionerNew::$efisiensi_umur_option, $kuesioner->efisiensi_umur, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_perawatan', '41. Apakah dilakukan perawatan mesin-mesin produksi di Koperasi/perusahaan anda?') }}
				{{ Form::select('efisiensi_perawatan', KuesionerNew::$efisiensi_perawatan_option, $kuesioner->efisiensi_perawatan, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_rendemen', '42. Berapa nilai efisiensi produksi (rendemen) dari usaha yang dilakukan?') }}
				{{ Form::select('efisiensi_rendemen', KuesionerNew::$efisiensi_rendemen_option, $kuesioner->efisiensi_rendemen, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('efisiensi_variasi', '43. Berapa jenis produk yang dihasilkan oleh Koperasi/perusahaan?') }}
				{{ Form::select('efisiensi_variasi', KuesionerNew::$efisiensi_variasi_option, $kuesioner->efisiensi_variasi, array('class' => 'form-control')) }}
			</div>
			<h3>Kebutuhan energi</h3>
			<div class="form-group">
				{{ Form::label('energi_pln', '44. Berapa kapasitas listrik PLN yang dipakai di Koperasi/perushaan anda?') }}
				{{ Form::select('energi_pln', KuesionerNew::$energi_pln_option, $kuesioner->energi_pln, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('energi_genset', '45. Berapa kapasitas listrik Genset yang dipakai di Koperasi/perushaan anda?') }}
				{{ Form::select('energi_genset', KuesionerNew::$energi_genset_option, $kuesioner->energi_genset, array('class' => 'form-control')) }}
			</div>
			<h3>Penggunaan energi alternatif selain PLN dan Genset</h3>
			<div class="form-group">
				{{ Form::label('alternatif_energi', '46. Selain penggunaan listrik PLN dan genset, apakah koperasi/perusahaan anda menggunakan energi alternative dalam proses produksi?') }}
				{{ Form::select('alternatif_energi', KuesionerNew::$alternatif_energi_option, $kuesioner->alternatif_energi_option, array('class' => 'form-control')) }}
			</div>
			<h3>Inovasi produk dan proses produksi</h3>
			<div class="form-group">
				{{ Form::label('inovasi_produk', '47. Adakah inovasi baru yang dilakukan oleh Koperasi/perusahaan anda dalam meningkatkan nilai jual dan kualitas produk?') }}
				{{ Form::select('inovasi_produk', KuesionerNew::$inovasi_produk_option, $kuesioner->inovasi_produk_option, array('class' => 'form-control')) }}
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="col-md-4">
			<h2 class="page-header">Aspek Keuangan</h2>
			<h3>Analisa aspek rasio keuangan</h3>
			<div class="form-group">
				{{ Form::label('rasio_kas', '48. Kas') }}
				{{ Form::text('rasio_kas', $kuesioner->rasio_kas, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Likuiditas dan Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_piutang', '49. Piutang') }}
				{{ Form::text('rasio_piutang', $kuesioner->rasio_piutang, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Likuiditas dan Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_persediaan', '50. Persediaan') }}
				{{ Form::text('rasio_persediaan', $kuesioner->rasio_persediaan, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Likuiditas dan Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_hutang_lancar', '51. Hutang Lancar') }}
				{{ Form::text('rasio_hutang_lancar', $kuesioner->rasio_hutang_lancar, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Likuiditas dan Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_hutang_pendek', '52. Hutang Jangka Pendek') }}
				{{ Form::text('rasio_hutang_pendek', $kuesioner->rasio_hutang_pendek, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Likuiditas dan Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_tanah', '53. Tanah') }}
				{{ Form::text('rasio_tanah', $kuesioner->rasio_tanah, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_bangunan', '54. Bangunan') }}
				{{ Form::text('rasio_bangunan', $kuesioner->rasio_bangunan, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_mesin', '55. Mesin') }}
				{{ Form::text('rasio_mesin', $kuesioner->rasio_mesin, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_kendaraan', '56. Kendaraan') }}
				{{ Form::text('rasio_kendaraan', $kuesioner->rasio_kendaraan, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_inventaris', '57. Inventaris Lainnya') }}
				{{ Form::text('rasio_inventaris', $kuesioner->rasio_inventaris, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_hutang_panjang', '58. Hutang Jangka Panjang') }}
				{{ Form::text('rasio_hutang_panjang', $kuesioner->rasio_hutang_panjang, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Rasio Solvabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_total_penjualan', '59. Total Penjualan') }}
				{{ Form::text('rasio_total_penjualan', $kuesioner->rasio_total_penjualan, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Laba Usaha dan Rasio Profitabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('rasio_total_pengeluaran', '60. Total Pengeluaran') }}
				{{ Form::text('rasio_total_pengeluaran', $kuesioner->rasio_total_pengeluaran, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Laba Usaha dan Rasio Profitabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('modal_awal', '61. Modal Awal') }}
				{{ Form::text('modal_awal', $kuesioner->modal_awal, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('modal_sendiri', '62. Modal Sendiri') }}
				{{ Form::text('modal_sendiri', $kuesioner->modal_sendiri, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Perimbangan Modal dan Rasio Profitabilitas</p>
			</div>
			<div class="form-group">
				{{ Form::label('modal_luar', '63. Modal Luar') }}
				{{ Form::text('modal_luar', $kuesioner->modal_luar, array('class' => 'form-control')) }}
				<p class="help-block">Mempengaruhi nilai<br>Perimbangan Modal dan Rasio Profitabilitas</p>
			</div>
			<h3>Hubungan dengan Perbankan</h3>
			<div class="form-group">
				{{ Form::label('hubungan_pinjaman', '64. Bagaimanakah selama ini hubungan usaha anda dengan perbankan?') }}
				{{ Form::select('hubungan_pinjaman', KuesionerNew::$hubungan_pinjaman_option, $kuesioner->hubungan_pinjaman, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('hubungan_frekuensi', '65. Seberapa banyak/kali anda berhubungan untuk mengajukan pinjaman ke perbankan selama 3 tahun terakhir?') }}
				{{ Form::select('hubungan_frekuensi', KuesionerNew::$hubungan_frekuensi_option, $kuesioner->hubungan_frekuensi, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('hubungan_internal', '66. Kendala internal apakah yang dihadapi perusahaan dalam berhubungan dengan peminjaman/kredit dari perbankan?') }}
				{{ Form::select('hubungan_internal', KuesionerNew::$hubungan_internal_option, $kuesioner->hubungan_internal, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('hubungan_eksternal', '67. Kendala eksternal apakah yang dihadapi perusahaan jika berhadapan dengan lembaga keuangan (bank dan non bank)?') }}
				{{ Form::select('hubungan_eksternal', KuesionerNew::$hubungan_eksternal_option, $kuesioner->hubungan_eksternal, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="col-md-4">
			<h2 class="page-header">Aspek SDM</h2>
			<h3>Pemenuhan Tenaga Kerja</h3>
			<div class="form-group">
				{{ Form::label('tk_jumlah', '68. Berapakah jumlah tenaga kerja di Koperasi/perusahaan anda pada saat ini?') }}
				{{ Form::select('tk_jumlah', KuesionerNew::$tk_jumlah_option, $kuesioner->tk_jumlah, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('tk_kompetisi', '69. Bagaimanakah kompetensi tenaga kerja di koperasi/perusahaan anda saat ini?') }}
				{{ Form::select('tk_kompetisi', KuesionerNew::$tk_kompetisi_option, $kuesioner->tk_kompetisi, array('class' => 'form-control')) }}
			</div>
			<h3>Produktivitas Kerja</h3>
			<div class="form-group">
				{{ Form::label('produktif_jam', '70. Berapa lama jam kerja tenaga kerja di perusaahan anda saat ini?') }}
				{{ Form::select('produktif_jam', KuesionerNew::$produktif_jam_option, $kuesioner->produktif_jam, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('produktif_shift', '71. Bagaimanakah shift (giliran kerja) diperusahaan anda saat ini?') }}
				{{ Form::select('produktif_shift', KuesionerNew::$produktif_shift_option, $kuesioner->produktif_shift, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('produktif_upah', '72. Berapa standar upah tenaga kerja?') }}
				{{ Form::select('produktif_upah', KuesionerNew::$produktif_upah_option, $kuesioner->produktif_upah, array('class' => 'form-control')) }}
			</div>
			<h3>Fasilitas untuk Tenaga Kerja</h3>
			<div class="form-group">
				{{ Form::label('fasilitas_tk', '73. Bagaimanakah fasilitas yang diberikan koperasi/perusahaan kepada pegawai?') }}
				{{ Form::select('fasilitas_tk', KuesionerNew::$fasilitas_tk_option, $kuesioner->fasilitas_tk_option, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="col-md-4">
			<h2 class="page-header">Aspek Pemasaran</h2>
			<h3>Strategi Pemasaran</h3>
			<div class="form-group">
				{{ Form::label('marketing_strategy', '74. Strategi apakah yang diterapkan /diberlakukan Koperasi/perusahaan saat ini?') }}
				{{ Form::select('marketing_strategy', KuesionerNew::$marketing_strategy_option, $kuesioner->marketing_strategy_option, array('class' => 'form-control')) }}
			</div>
			<h3>Bauran Pemasaran</h3>
			<div class="form-group">
				{{ Form::label('mix_product', '75. Berapa macam/jenis dan tipe produk yang dibuat dan dipasarkan di Koperasi/perusahaan anda?') }}
				{{ Form::select('mix_product', KuesionerNew::$mix_product_option, $kuesioner->mix_product, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('mix_price', '76. Bagaimanakah penerapan harga di Koperasi/perusahaan anda?') }}
				{{ Form::select('mix_price', KuesionerNew::$mix_price_option, $kuesioner->mix_price, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('mix_place', '77. Bagaimanakah saluran distribusi produk Koperasi/perusahaan anda?') }}
				{{ Form::select('mix_place', KuesionerNew::$mix_place_option, $kuesioner->mix_place, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('mix_promotion', '78. Bagaimana penerapan promosi di koperasi/perusahaan Anda?') }}
				{{ Form::select('mix_promotion', KuesionerNew::$mix_promotion_option, $kuesioner->mix_promotion, array('class' => 'form-control')) }}
			</div>
			<h3>Penguasaan Pasar</h3>
			<div class="form-group">
				{{ Form::label('market_share', '79. Bagaimanakah keadaan market share perusahaan anda saat ini?') }}
				{{ Form::select('market_share', KuesionerNew::$market_share_option, $kuesioner->market_share, array('class' => 'form-control')) }}
			</div>
			<h3>Cakupan Pasar</h3>
			<div class="form-group">
				{{ Form::label('market_coverage', '80. Bagaimanakah cakupan pasar Koperasi/perusahaan anda saat ini?') }}
				{{ Form::select('market_coverage', KuesionerNew::$market_coverage_option, $kuesioner->market_coverage, array('class' => 'form-control')) }}
			</div>
			<h3>Persaingan</h3>
			<div class="form-group">
				{{ Form::label('market_competition', '81. Bagaimanakah keadaan persaingan produk yang dihasilkan Koperasi/perusahaan anda saat ini?') }}
				{{ Form::select('market_competition', KuesionerNew::$market_competition_option, $kuesioner->market_competition, array('class' => 'form-control')) }}
			</div>
		</div>

		<div class="clearfix"></div>

		<br><br><br>

		<input class="btn btn-default btn-lg btn-block" type="submit" value="Submit">

	</div>
	{{ Form::close() }}
</div>
@stop

@section('script')
	@parent
	<script>
	function deleteConfirmation() {
		return confirm('ANDA AKAN MENGHAPUS DATA INI SECARA PERMANEN, APAKAH ANDA YAKIN?');
	};
	</script>
@stop
