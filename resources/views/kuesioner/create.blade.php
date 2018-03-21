@extends('layouts.master')

@section('content')
<div class="container mt-5">
	<div class="row flex align-items-center mb-4">
		<div class="col-md-10"><h1 class="mb-0">Buat Kuesioner</h1></div>
    <div class="col-md-2 hidden-print text-right">
      <a href="{{ route('questionnaire.index') }}" class="btn btn-outline-danger btn-block flex align-items-center justify-content-center">
        <span class="fal fa-ban"></span>
        <span class="ml-2">Batal</span>
      </a>
    </div>
	</div>
	{{ Form::open(['url' => action('QuestionnaireController@store'), 'role' => 'form', 'class' => 'mb-5']) }}
    <div class="row">
      <div class="col-md-9">
        <div class="card mb-5" id="data-umum">
          <div class="card-header">
            <h2 class="h5 mb-0">Data Umum</h2>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Kontak Perusahaan</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('kontak_nama', '1. Nama Koperasi/Perusahaan UKM') }}
                  {{ Form::text('kontak_nama', null, ['class' => 'form-control w-75']) }}
                </div>
                <div class="form-group custom-control custom-checkbox">
                  {{ Form::checkbox('kontak_gopublik', 'kontak_gopublik', null, array('id' => 'kontak_gopublik', 'class' => 'custom-control-input')) }}
                  {{ Form::label('kontak_gopublik', 'Centang Jika sudah Go Publik', ['class' => 'custom-control-label']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_alamat', '2. Alamat Kantor/Pabrik') }}
                  {{ Form::textarea('kontak_alamat', null, array('class' => 'form-control', 'rows' => '5')) }}
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_kota', '3. Kota, Provinsi') }}
                  {{ Form::text('kontak_kota', null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_telepon', '4. No. Telepon') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    {{ Form::input('tel', 'kontak_telepon', null, ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_fax', '5. No. Fax') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    {{ Form::input('tel', 'kontak_fax', null, ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_handphone', '6. No. Handphone') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    {{ Form::input('tel', 'kontak_handphone', null, ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_website', '7. Alamat Website') }}
                  {{ Form::url('kontak_website', null, ['class' => 'form-control w-75']) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Status Perusahaan</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('status_tahun', '8. Tahun Berdiri') }}
                  {{ Form::number('status_tahun', null, ['class' => 'form-control w-25', 'min' => '1900', 'max' => '2100']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_usaha', '9. Status Badan Hukum/Usaha') }}
                  {{ Form::select('status_usaha', App\Questionnaire::$status_usaha_option, null, ['class' => 'form-control w-75']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_pemodalan', '10. Status Investasi/Pemodalan') }}
                  {{ Form::select('status_pemodalan', App\Questionnaire::$status_pemodalan_option, null, ['class' => 'form-control w-75']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_pj', '11. Ketua Pengurus/Penanggung Jawab') }}
                  {{ Form::text('status_pj', null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_manajer', '12. Jumlah Perwakilan Manajer') }}
                  {{ Form::number('status_manajer', null, ['class' => 'form-control w-25', 'min' => 1]) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_karyawan', '13. Jumlah Karyawan') }}
                  {{ Form::number('status_karyawan', null, ['class' => 'form-control w-25', 'min' => 1]) }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-5" id="aspek-manajerial">
          <div class="card-header">
            <h2 class="h5 mb-0">Aspek Manajerial</h2>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Dokumen Legalitas Perusahaan</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('null', '14. Apakah perusahaan anda memiliki Akte Pendirian?') }}
                  <div>
                    <div class="form-group custom-control custom-radio d-inline-block mr-3">
                      {{ Form::radio('dokumen_akte', 1, null, ['id' => 'dokumen_akte_ada', 'class' => 'custom-control-input']) }}
                      {{ Form::label('dokumen_akte_ada', 'Ada', ['class' => 'custom-control-label']) }}
                    </div>
                    <div class="form-group custom-control custom-radio d-inline-block mr-3">
                      {{ Form::radio('dokumen_akte', 0, null, ['id' => 'dokumen_akte_tidak', 'class' => 'custom-control-input']) }}
                      {{ Form::label('dokumen_akte_tidak', 'Tidak Ada', ['class' => 'custom-control-label']) }}
                    </div>
                  </div>
                  {{--  {{ Form::select('dokumen_akte', App\Questionnaire::$dokumen_akte_option, null, ['class' => 'form-control w-25']) }}  --}}
                </div>
                <div class="form-group">
                  {{ Form::label('dokumen_tahun', '15. Tahun terbit surat') }}
                  {{ Form::number('dokumen_tahun', null, ['class' => 'form-control w-25', 'min' => '1900', 'max' => '2100']) }}
                </div>
                <div>
                  {{ Form::label(null, '16. Apakah perusahaan ada / memiliki kelengkapan perijinanan perusahaan?') }}
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_npwp', 1, null, ['id' => 'dokumen_npwp', 'class' => 'custom-control-input']) }}
                    {{ Form::label('dokumen_npwp', 'NPWP', ['class' => 'custom-control-label']) }}
                  </div>
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_siup', 1, null, ['id' => 'dokumen_siup', 'class' => 'custom-control-input']) }}
                    {{ Form::label('dokumen_siup', 'SIUP', ['class' => 'custom-control-label']) }}
                  </div>
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_tdp', 1, null, ['id' => 'dokumen_tdp', 'class' => 'custom-control-input']) }}
                    {{ Form::label('dokumen_tdp', 'TDP', ['class' => 'custom-control-label']) }}
                  </div>
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_iui', 1, null, ['id' => 'dokumen_iui', 'class' => 'custom-control-input']) }}
                    {{ Form::label('dokumen_iui', 'IUI/TDI', ['class' => 'custom-control-label']) }}
                  </div>
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_situ', 1, null, ['id' => 'dokumen_situ', 'class' => 'custom-control-input']) }}
                    {{ Form::label('dokumen_situ', 'SITU', ['class' => 'custom-control-label']) }}
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Sistem Manajemen</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('sm_punya', '17. Apakah perusahaan anda memiliki dan menerapkan Sistem Manajemen?') }}
                  {{ Form::select('sm_punya', App\Questionnaire::$sm_punya_option, null, ['class' => 'form-control w-75']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_sertifikasi', '18. Apakah Sistem Manajemen Mutu perusahaan  anda mendapat sertifikasi?') }}
                  {{ Form::select('sm_sertifikasi', App\Questionnaire::$sm_sertifikasi_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_so', '19. Apakah Koperasi/perusahaan anda memiliki struktur organisasi?') }}
                  {{ Form::select('sm_so', App\Questionnaire::$sm_so_option, null, ['class' => 'form-control w-75']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_jobdesc', '20. *Jika Ya, apakah disertai dengan uraian tugas dan fungsi untuk seluruh bagian?') }}
                  {{ Form::select('sm_jobdesc', App\Questionnaire::$sm_jobdesc_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_sop', '21. Apakah Koperasi/perusahaan anda memiliki SOP?') }}
                  {{ Form::select('sm_sop', App\Questionnaire::$sm_sop_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_arsip', '22. Apakah Koperasi/perusahaan anda memiliki sistem pengarsipan?') }}
                  {{ Form::select('sm_arsip', App\Questionnaire::$sm_arsip_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_audit', '23. Apakah Koperasi/perusahaan anda melakukan internal audit secara berkala?') }}
                  {{ Form::select('sm_audit', App\Questionnaire::$sm_audit_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_tqc', '24. Apakah perusahaan melakukan total quality control dari bahan baku sampai ke produk?') }}
                  {{ Form::select('sm_tqc', App\Questionnaire::$sm_tqc_option, null, ['class' => 'form-control w-75']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_satisfaction', '25. Apakah perusahaan anda memperhatikan kepuasan pelanggan?') }}
                  {{ Form::select('sm_satisfaction', App\Questionnaire::$sm_satisfaction_option, null, ['class' => 'form-control']) }}
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Kelengkapan Sarana dan Prasarana</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('sarana_luas_kantor', '26. Berapakah luas bangunan tempat kerja dan kantor?') }}
                  {{ Form::select('sarana_luas_kantor', App\Questionnaire::$sarana_luas_kantor_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_kondisi_kantor', '27. Bagaimana kondisi bangunan tempat kerja dan kantor?') }}
                  {{ Form::select('sarana_kondisi_kantor', App\Questionnaire::$sarana_kondisi_kantor_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_nilai_kantor', '28. Berapa perkiraan nilai bangunan tempat kerja dan kantor?') }}
                  {{ Form::select('sarana_nilai_kantor', App\Questionnaire::$sarana_nilai_kantor_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_luas_gudang', '29. Berapa luas bangunan gudang? ') }}
                  {{ Form::select('sarana_luas_gudang', App\Questionnaire::$sarana_luas_gudang_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_kondisi_gudang', '30. Bagaimana kondisi bangunan gudang?') }}
                  {{ Form::select('sarana_kondisi_gudang', App\Questionnaire::$sarana_kondisi_gudang_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_nilai_gudang', '31. Berapa perkiraan nilai bangunan gudang?') }}
                  {{ Form::select('sarana_nilai_gudang', App\Questionnaire::$sarana_nilai_gudang_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_jumlah_mobil', '32. Berapa jumlah mobil pribadi/perusahaan yang dimiliki oleh Koperasi/perusahaan?') }}
                  {{ Form::select('sarana_jumlah_mobil', App\Questionnaire::$sarana_jumlah_mobil_option, null, ['class' => 'form-control w-25']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_nilai_mobil', '33. Berapa nilai perolehan/pasar mobil pribadi/perusahaan dan yang dimiliki oleh Koperasi/perusahaan?') }}
                  {{ Form::select('sarana_nilai_mobil', App\Questionnaire::$sarana_nilai_mobil_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_jumlah_angkutan', '34. Berapa jumlah mobil angkutan yang dimiliki oleh perusahaan anda?') }}
                  {{ Form::select('sarana_jumlah_angkutan', App\Questionnaire::$sarana_jumlah_angkutan_option, null, ['class' => 'form-control w-25']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_nilai_angkutan', '35. Berapa nilai perolehan/pasar mobil angkutan yang dimiliki oleh perusahaan anda?') }}
                  {{ Form::select('sarana_nilai_angkutan', App\Questionnaire::$sarana_nilai_angkutan_option, null, ['class' => 'form-control w-50']) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Potensi Perluasan</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('potensi_perluasan', '36. Apakah perusahaan mempunyai rencana perluasan terhadap kegiatan produksi, gedung dan sarana serta fasilitas produksi?') }}
                  {{ Form::select('potensi_perluasan', App\Questionnaire::$potensi_perluasan_option, null, ['class' => 'form-control']) }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-5" id="aspek-produksi">
          <div class="card-header">
            <h2 class="h5 mb-0">Aspek Mesin dan Produksi</h2>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Efisiensi dan Efektivitas</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('efisiensi_standar', '37. Apakan jenis-jenis mesin yang digunakan oleh perusahaan anda sudah memenuhi standar minimal dari produk yang akan dibuat?') }}
                  {{ Form::select('efisiensi_standar', App\Questionnaire::$efisiensi_standar_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_jumlah', '38. Apakah jumlah mesin yang ada sudah mencukupi  dengan volume produk yang akan dihasilkan?') }}
                  {{ Form::select('efisiensi_jumlah', App\Questionnaire::$efisiensi_jumlah_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_kapasitas', '39. Apakah setiap mesin di Koperasi/perusahaan anda sudah bekerja secara maksimal (sesuai jam kerja)?') }}
                  {{ Form::select('efisiensi_kapasitas', App\Questionnaire::$efisiensi_kapasitas_option, null, ['class' => 'form-control w-25']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_umur', '40. Berapa usia mayoritasmesin yang digunakan di Koperasi/perusahaan anda?') }}
                  {{ Form::select('efisiensi_umur', App\Questionnaire::$efisiensi_umur_option, null, ['class' => 'form-control w-25']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_perawatan', '41. Apakah dilakukan perawatan mesin-mesin produksi di Koperasi/perusahaan anda?') }}
                  {{ Form::select('efisiensi_perawatan', App\Questionnaire::$efisiensi_perawatan_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_rendemen', '42. Berapa nilai efisiensi produksi (rendemen) dari usaha yang dilakukan?') }}
                  {{ Form::select('efisiensi_rendemen', App\Questionnaire::$efisiensi_rendemen_option, null, ['class' => 'form-control w-25']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_variasi', '43. Berapa jenis produk yang dihasilkan oleh Koperasi/perusahaan?') }}
                  {{ Form::select('efisiensi_variasi', App\Questionnaire::$efisiensi_variasi_option, null, ['class' => 'form-control w-25']) }}
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Kebutuhan energi</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('energi_pln', '44. Berapa kapasitas listrik yang dipakai di Koperasi/perusahaan anda?') }}
                  {{ Form::select('energi_pln', App\Questionnaire::$energi_pln_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('energi_genset', '45. Berapa kapasitas listrik yang dipakai di Koperasi/perusahaan anda?') }}
                  {{ Form::select('energi_genset', App\Questionnaire::$energi_genset_option, null, ['class' => 'form-control w-50']) }}
                </div>  
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Penggunaan energi alternatif selain PLN dan Genset</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('alternatif_energi', '46. Selain penggunaan listrik PLN dan genset, apakah koperasi/perusahaan anda menggunakan energi alternative dalam proses produksi?') }}
                  {{ Form::select('alternatif_energi', App\Questionnaire::$alternatif_energi_option, null, ['class' => 'form-control w-50']) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Inovasi produk dan proses produksi</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('inovasi_produk', '47. Adakah inovasi baru yang dilakukan oleh Koperasi/perusahaan anda dalam meningkatkan nilai jual dan kualitas produk?') }}
                  {{ Form::select('inovasi_produk', App\Questionnaire::$inovasi_produk_option, null, ['class' => 'form-control w-75']) }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-5" id="aspek-keuangan">
          <div class="card-header">
            <h2 class="h5 mb-0">Aspek Keuangan</h2>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Analisa Aspek Rasio Keuangan</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('rasio_kas', '48. Kas') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_kas', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_piutang', '49. Piutang') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_piutang', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_persediaan', '50. Persediaan') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_persediaan', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_hutang_lancar', '51. Hutang Lancar') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_hutang_lancar', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_hutang_pendek', '52. Hutang Jangka Pendek') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_hutang_pendek', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_tanah', '53. Tanah') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_tanah', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_bangunan', '54. Bangunan') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_bangunan', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_mesin', '55. Mesin') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_mesin', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_kendaraan', '56. Kendaraan') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_kendaraan', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_inventaris', '57. Inventaris Lainnya') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_inventaris', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_hutang_panjang', '58. Hutang Jangka Panjang') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_hutang_panjang', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_total_penjualan', '59. Total Penjualan') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_total_penjualan', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Laba Usaha dan Rasio Profitabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_total_pengeluaran', '60. Total Pengeluaran') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_total_pengeluaran', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Laba Usaha dan Rasio Profitabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('modal_awal', '61. Modal Awal') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('modal_awal', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Perimbangan Modal</small>
                </div>
                <div class="form-group">
                  {{ Form::label('modal_sendiri', '62. Modal Sendiri') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('modal_sendiri', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Perimbangan Modal dan Rasio Profitabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('modal_luar', '63. Modal Luar') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('modal_luar', null, ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Perimbangan Modal dan Rasio Profitabilitas</small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Hubungan Dengan Perbankan</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('hubungan_pinjaman', '64. Bagaimanakah selama ini hubungan usaha anda dengan perbankan?') }}
                  {{ Form::select('hubungan_pinjaman', App\Questionnaire::$hubungan_pinjaman_option, null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('hubungan_frekuensi', '65. Seberapa banyak/kali anda berhubungan untuk mengajukan pinjaman ke perbankan selama 3 tahun terakhir?') }}
                  {{ Form::select('hubungan_frekuensi', App\Questionnaire::$hubungan_frekuensi_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('hubungan_internal', '66. Kendala internal apakah yang dihadapi perusahaan dalam berhubungan dengan peminjaman/kredit dari perbankan?') }}
                  {{ Form::select('hubungan_internal', App\Questionnaire::$hubungan_internal_option, null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('hubungan_eksternal', '67. Kendala eksternal apakah yang dihadapi perusahaan jika berhadapan dengan lembaga keuangan (bank dan non bank)?') }}
                  {{ Form::select('hubungan_eksternal', App\Questionnaire::$hubungan_eksternal_option, null, ['class' => 'form-control w-50']) }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-5" id="aspek-sdm">
          <div class="card-header">
            <h2 class="h5 mb-0">Aspek SDM</h2>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Pemenuhan Tenaga Kerja</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('tk_jumlah', '68. Berapakah jumlah tenaga kerja di Koperasi/perusahaan anda pada saat ini?') }}
                  {{ Form::select('tk_jumlah', App\Questionnaire::$tk_jumlah_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('tk_kompetisi', '69. Bagaimanakah kompetensi tenaga kerja di koperasi/perusahaan anda saat ini?') }}
                  {{ Form::select('tk_kompetisi', App\Questionnaire::$tk_kompetisi_option, null, ['class' => 'form-control w-75']) }}
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Produktivitas Kerja</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('produktif_jam', '70. Berapa lama jam kerja tenaga kerja di perusaahan anda saat ini?') }}
                  {{ Form::select('produktif_jam', App\Questionnaire::$produktif_jam_option, null, ['class' => 'form-control w-25']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('produktif_shift', '71. Bagaimanakah shift (giliran kerja) diperusahaan anda saat ini?') }}
                  {{ Form::select('produktif_shift', App\Questionnaire::$produktif_shift_option, null, ['class' => 'form-control w-25']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('produktif_upah', '72. Berapa standar upah tenaga kerja?') }}
                  {{ Form::select('produktif_upah', App\Questionnaire::$produktif_upah_option, null, ['class' => 'form-control w-50']) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Fasilitas Untuk Tenaga Kerja</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('fasilitas_tk', '73. Bagaimanakah fasilitas yang diberikan koperasi/perusahaan kepada pegawai?') }}
                  {{ Form::select('fasilitas_tk', App\Questionnaire::$fasilitas_tk_option, null, ['class' => 'form-control w-75']) }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-5" id="aspek-pemasaran">
          <div class="card-header">
            <h2 class="h5 mb-0">Aspek Pemasaran</h2>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Strategi Pemasaran</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('marketing_strategy', '74. Strategi apakah yang diterapkan /diberlakukan Koperasi/perusahaan saat ini?') }}
                  {{ Form::select('marketing_strategy', App\Questionnaire::$marketing_strategy_option, null, ['class' => 'form-control']) }}
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Bauran Pemasaran</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('mix_product', '75. Berapa macam/jenis dan tipe produk yang dibuat dan dipasarkan di Koperasi/perusahaan anda?') }}
                  {{ Form::select('mix_product', App\Questionnaire::$mix_product_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('mix_price', '76. Bagaimanakah penerapan harga di Koperasi/perusahaan anda?') }}
                  {{ Form::select('mix_price', App\Questionnaire::$mix_price_option, null, ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('mix_place', '77. Bagaimanakah saluran distribusi produk Koperasi/perusahaan anda?') }}
                  {{ Form::select('mix_place', App\Questionnaire::$mix_place_option, null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('mix_promotion', '78. Bagaimanakah keadaan profitabilitas usaha Koperasi/perusahaan anda?') }}
                  {{ Form::select('mix_promotion', App\Questionnaire::$mix_promotion_option, null, ['class' => 'form-control w-50']) }}
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Penguasaan Pasar</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('market_share', '79. Bagaimanakah keadaan market share perusahaan anda saat ini?') }}
                  {{ Form::select('market_share', App\Questionnaire::$market_share_option, null, ['class' => 'form-control w-25']) }}
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Cakupan Pasar</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('market_coverage', '80. Bagaimanakah cakupan pasar Koperasi/perusahaan anda saat ini?') }}
                  {{ Form::select('market_coverage', App\Questionnaire::$market_coverage_option, null, ['class' => 'form-control w-75']) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h3 class="mb-0 h4">Persaingan</h3>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  {{ Form::label('market_competition', '81. Bagaimanakah keadaan persaingan produk yang dihasilkan Koperasi/perusahaan anda saat ini?') }}
                  {{ Form::select('market_competition', App\Questionnaire::$market_competition_option, null, ['class' => 'form-control w-75']) }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="list-group sticky-top" style="top: 30px">
          <div class="spy">
            <a href="#data-umum" class="list-group-item list-group-item-action">Data Umum</a>
            <a href="#aspek-manajerial" class="list-group-item list-group-item-action">Aspek Manajerial</a>
            <a href="#aspek-produksi" class="list-group-item list-group-item-action">Aspek Mesin dan Produksi</a>
            <a href="#aspek-keuangan" class="list-group-item list-group-item-action">Aspek Keuangan</a>
            <a href="#aspek-sdm" class="list-group-item list-group-item-action">Aspek SDM</a>
            <a href="#aspek-pemasaran" class="list-group-item list-group-item-action">Aspek Pemasaran</a>
          </div>
          <button class="btn btn-success btn-block btn-lg mt-4">
            <i class="fal fa-edit"></i>
            <span class="ml-2">Kirim</span>
          </button>
        </div>
      </div>
    </div>
	{{ Form::close() }}
</div>
@stop
