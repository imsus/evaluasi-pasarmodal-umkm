@extends('layouts.master')

@section('content')
<div class="container mt-5">
	<div class="row flex align-items-center mb-4">
		<div class="col-md-8"><h1 class="mb-0">Edit Kuesioner <strong>#{{ $questionnaire->id }}</strong></h1></div>
    <div class="col-md-4 hidden-print text-right">
      {{ Form::open(['url' => action('QuestionnaireController@delete', $questionnaire->id), 'method' => 'delete', 'onsubmit' => 'ask(' . $questionnaire->id . ')']) }}
        <div class="btn-group btn-group-justified">
          <a href="{{ route('questionnaire.show', $questionnaire->id) }}" class="btn btn-light flex align-items-center justify-content-center">
            <span class="fal fa-check"></span>
            <span class="ml-2">Detail</span>
          </a>
          <button type="submit" class="btn btn-light text-danger flex align-items-center justify-content-center">
            <span class="fal fa-trash"></span>
            <span class="ml-2">Hapus</span>
          </button>
        </div>
      {{ Form::close() }}
    </div>
	</div>
	{{ Form::open(['id' => 'form', 'url' => action('QuestionnaireController@update', $questionnaire->id), 'method' => 'PUT', 'role' => 'form', 'class' => 'mb-5']) }}
  <div class="row">
      <div class="col-md-9">
        @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <strong>Ada kesalahan input data.</strong> Silahkan scroll ke bawah untuk menemukan kesalahannya.
          </div>
        @endif
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
                  {{ Form::text('kontak_nama', old('kontak_nama', $questionnaire->kontak_nama), ['class' => $errors->first('kontak_nama') ? 'form-control w-75 is-invalid' : 'form-control w-75' ]) }}
                  <div class="invalid-feedback">{{ $errors->first('kontak_nama') }}</div>
                </div>
                <div class="form-group custom-control custom-checkbox">
                  {{ Form::checkbox('kontak_gopublik', 1, old('kontak_gopublik', $questionnaire->kontak_gopublik), ['id' => 'kontak_gopublik', 'class' => 'custom-control-input']) }}
                  {{ Form::label('kontak_gopublik', 'Centang Jika sudah Go Publik', ['class' => 'custom-control-label']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_alamat', '2. Alamat Kantor/Pabrik') }}
                  {{ Form::textarea('kontak_alamat', old('kontak_alamat', $questionnaire->kontak_alamat), ['class' => 'form-control', 'rows' => '5']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_kota', '3. Kota, Provinsi') }}
                  {{ Form::text('kontak_kota', old('kontak_kota', $questionnaire->kontak_kota), ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_telepon', '4. No. Telepon') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    {{ Form::input('tel', 'kontak_telepon', old('kontak_kota', $questionnaire->kontak_kota), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_fax', '5. No. Fax') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    {{ Form::input('tel', 'kontak_fax', old('kontak_fax', $questionnaire->kontak_fax), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_handphone', '6. No. Handphone') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    {{ Form::input('tel', 'kontak_handphone', old('kontak_handphone', $questionnaire->kontak_handphone), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('kontak_website', '7. Alamat Website') }}
                  {{ Form::url('kontak_website', old('kontak_website', $questionnaire->kontak_website), ['class' => 'form-control w-75']) }}
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
                  {{ Form::number('status_tahun', old('status_tahun', $questionnaire->status_tahun), ['class' => 'form-control w-25', 'min' => '1900', 'max' => '2100']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_usaha', '9. Status Badan Hukum/Usaha') }}
                  {{ Form::select('status_usaha', App\Questionnaire::$status_usaha_option, old('status_usaha', $questionnaire->status_usaha), ['class' => 'form-control w-75 custom-select custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_pemodalan', '10. Status Investasi/Pemodalan') }}
                  {{ Form::select('status_pemodalan', App\Questionnaire::$status_pemodalan_option, old('status_pemodalan', $questionnaire->status_pemodalan), ['class' => 'form-control w-75 custom-select custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_pj', '11. Ketua Pengurus/Penanggung Jawab') }}
                  {{ Form::text('status_pj', old('status_pj', $questionnaire->status_pj), ['class' => 'form-control w-50']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_manajer', '12. Jumlah Perwakilan Manajer') }}
                  {{ Form::number('status_manajer', old('status_manajer', $questionnaire->status_manajer), ['class' => 'form-control w-25', 'min' => 1]) }}
                </div>
                <div class="form-group">
                  {{ Form::label('status_karyawan', '13. Jumlah Karyawan') }}
                  {{ Form::number('status_karyawan', old('status_karyawan', $questionnaire->status_karyawan), ['class' => 'form-control w-25', 'min' => 1]) }}
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
                      {{ Form::radio('dokumen_akte', 1, old('dokumen_akte', $questionnaire->dokumen_akte) === 1, ['id' => 'dokumen_akte_ada', 'class' => 'custom-control-input']) }}
                      {{ Form::label('dokumen_akte_ada', 'Ada', ['class' => 'custom-control-label']) }}
                    </div>
                    <div class="form-group custom-control custom-radio d-inline-block mr-3">
                      {{ Form::radio('dokumen_akte', 0, old('dokumen_akte', $questionnaire->dokumen_akte) === 0, ['id' => 'dokumen_akte_tidak', 'class' => 'custom-control-input']) }}
                      {{ Form::label('dokumen_akte_tidak', 'Tidak Ada', ['class' => 'custom-control-label']) }}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  {{ Form::label('dokumen_tahun', '15. Tahun terbit surat') }}
                  {{ Form::number('dokumen_tahun', old('dokumen_tahun', $questionnaire->dokumen_tahun), ['class' => 'form-control w-25', 'min' => '1900', 'max' => '2100']) }}
                </div>
                <div>
                  {{ Form::label(null, '16. Apakah perusahaan ada / memiliki kelengkapan perijinanan perusahaan?') }}
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_npwp', 1, old('dokumen_npwp', $questionnaire->dokumen_npwp), ['id' => 'dokumen_npwp', 'class' => 'custom-control-input']) }}
                    {{ Form::label('dokumen_npwp', 'NPWP', ['class' => 'custom-control-label']) }}
                  </div>
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_siup', 1, old('dokumen_siup', $questionnaire->dokumen_siup), ['id' => 'dokumen_siup', 'class' => 'custom-control-input']) }}
                    {{ Form::label('dokumen_siup', 'SIUP', ['class' => 'custom-control-label']) }}
                  </div>
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_tdp', 1, old('dokumen_tdp', $questionnaire->dokumen_tdp), ['id' => 'dokumen_tdp', 'class' => 'custom-control-input']) }}
                    {{ Form::label('dokumen_tdp', 'TDP', ['class' => 'custom-control-label']) }}
                  </div>
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_iui', 1, old('dokumen_iui', $questionnaire->dokumen_iui), ['id' => 'dokumen_iui', 'class' => 'custom-control-input']) }}
                    {{ Form::label('dokumen_iui', 'IUI/TDI', ['class' => 'custom-control-label']) }}
                  </div>
                  <div class="form-group custom-control custom-checkbox d-inline-block mr-3">
                    {{ Form::checkbox('dokumen_situ', 1, old('dokumen_situ', $questionnaire->dokumen_situ), ['id' => 'dokumen_situ', 'class' => 'custom-control-input']) }}
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
                  {{ Form::select('sm_punya', App\Questionnaire::$sm_punya_option, old('sm_punya', $questionnaire->sm_punya), ['class' => 'form-control w-75 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_sertifikasi', '18. Apakah Sistem Manajemen Mutu perusahaan  anda mendapat sertifikasi?') }}
                  {{ Form::select('sm_sertifikasi', App\Questionnaire::$sm_sertifikasi_option, old('sm_sertifikasi', $questionnaire->sm_sertifikasi), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_so', '19. Apakah Koperasi/perusahaan anda memiliki struktur organisasi?') }}
                  {{ Form::select('sm_so', App\Questionnaire::$sm_so_option, old('sm_so', $questionnaire->sm_so), ['class' => 'form-control w-75 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_jobdesc', '20. *Jika Ya, apakah disertai dengan uraian tugas dan fungsi untuk seluruh bagian?') }}
                  {{ Form::select('sm_jobdesc', App\Questionnaire::$sm_jobdesc_option, old('sm_jobdesc', $questionnaire->sm_jobdesc), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_sop', '21. Apakah Koperasi/perusahaan anda memiliki SOP?') }}
                  {{ Form::select('sm_sop', App\Questionnaire::$sm_sop_option, old('sm_sop', $questionnaire->sm_sop), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_arsip', '22. Apakah Koperasi/perusahaan anda memiliki sistem pengarsipan?') }}
                  {{ Form::select('sm_arsip', App\Questionnaire::$sm_arsip_option, old('sm_arsip', $questionnaire->sm_arsip), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_audit', '23. Apakah Koperasi/perusahaan anda melakukan internal audit secara berkala?') }}
                  {{ Form::select('sm_audit', App\Questionnaire::$sm_audit_option, old('sm_audit', $questionnaire->sm_audit), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_tqc', '24. Apakah perusahaan melakukan total quality control dari bahan baku sampai ke produk?') }}
                  {{ Form::select('sm_tqc', App\Questionnaire::$sm_tqc_option, old('sm_tqc', $questionnaire->sm_tqc), ['class' => 'form-control w-75 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sm_satisfaction', '25. Apakah perusahaan anda memperhatikan kepuasan pelanggan?') }}
                  {{ Form::select('sm_satisfaction', App\Questionnaire::$sm_satisfaction_option, old('sm_satisfaction', $questionnaire->sm_satisfaction), ['class' => 'form-control custom-select']) }}
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
                  {{ Form::select('sarana_luas_kantor', App\Questionnaire::$sarana_luas_kantor_option, old('sarana_luas_kantor', $questionnaire->sarana_luas_kantor), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_kondisi_kantor', '27. Bagaimana kondisi bangunan tempat kerja dan kantor?') }}
                  {{ Form::select('sarana_kondisi_kantor', App\Questionnaire::$sarana_kondisi_kantor_option, old('sarana_kondisi_kantor', $questionnaire->sarana_kondisi_kantor), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_nilai_kantor', '28. Berapa perkiraan nilai bangunan tempat kerja dan kantor?') }}
                  {{ Form::select('sarana_nilai_kantor', App\Questionnaire::$sarana_nilai_kantor_option, old('sarana_nilai_kantor', $questionnaire->sarana_nilai_kantor), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_luas_gudang', '29. Berapa luas bangunan gudang? ') }}
                  {{ Form::select('sarana_luas_gudang', App\Questionnaire::$sarana_luas_gudang_option, old('sarana_luas_gudang', $questionnaire->sarana_luas_gudang), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_kondisi_gudang', '30. Bagaimana kondisi bangunan gudang?') }}
                  {{ Form::select('sarana_kondisi_gudang', App\Questionnaire::$sarana_kondisi_gudang_option, old('sarana_kondisi_gudang', $questionnaire->sarana_kondisi_gudang), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_nilai_gudang', '31. Berapa perkiraan nilai bangunan gudang?') }}
                  {{ Form::select('sarana_nilai_gudang', App\Questionnaire::$sarana_nilai_gudang_option, old('sarana_nilai_gudang', $questionnaire->sarana_nilai_gudang), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_jumlah_mobil', '32. Berapa jumlah mobil pribadi/perusahaan yang dimiliki oleh Koperasi/perusahaan?') }}
                  {{ Form::select('sarana_jumlah_mobil', App\Questionnaire::$sarana_jumlah_mobil_option, old('sarana_jumlah_mobil', $questionnaire->sarana_jumlah_mobil), ['class' => 'form-control w-25 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_nilai_mobil', '33. Berapa nilai perolehan/pasar mobil pribadi/perusahaan dan yang dimiliki oleh Koperasi/perusahaan?') }}
                  {{ Form::select('sarana_nilai_mobil', App\Questionnaire::$sarana_nilai_mobil_option, old('sarana_nilai_mobil', $questionnaire->sarana_nilai_mobil), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_jumlah_angkutan', '34. Berapa jumlah mobil angkutan yang dimiliki oleh perusahaan anda?') }}
                  {{ Form::select('sarana_jumlah_angkutan', App\Questionnaire::$sarana_jumlah_angkutan_option, old('sarana_jumlah_angkutan', $questionnaire->sarana_jumlah_angkutan), ['class' => 'form-control w-25 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sarana_nilai_angkutan', '35. Berapa nilai perolehan/pasar mobil angkutan yang dimiliki oleh perusahaan anda?') }}
                  {{ Form::select('sarana_nilai_angkutan', App\Questionnaire::$sarana_nilai_angkutan_option, old('sarana_nilai_angkutan', $questionnaire->sarana_nilai_angkutan), ['class' => 'form-control w-50 custom-select']) }}
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
                  {{ Form::select('potensi_perluasan', App\Questionnaire::$potensi_perluasan_option, old('potensi_perluasan', $questionnaire->potensi_perluasan), ['class' => 'form-control custom-select']) }}
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
                  {{ Form::select('efisiensi_standar', App\Questionnaire::$efisiensi_standar_option, old('efisiensi_standar', $questionnaire->efisiensi_standar), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_jumlah', '38. Apakah jumlah mesin yang ada sudah mencukupi  dengan volume produk yang akan dihasilkan?') }}
                  {{ Form::select('efisiensi_jumlah', App\Questionnaire::$efisiensi_jumlah_option, old('efisiensi_jumlah', $questionnaire->efisiensi_jumlah), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_kapasitas', '39. Apakah setiap mesin di Koperasi/perusahaan anda sudah bekerja secara maksimal (sesuai jam kerja)?') }}
                  {{ Form::select('efisiensi_kapasitas', App\Questionnaire::$efisiensi_kapasitas_option, old('efisiensi_kapasitas', $questionnaire->efisiensi_kapasitas), ['class' => 'form-control w-25 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_umur', '40. Berapa usia mayoritasmesin yang digunakan di Koperasi/perusahaan anda?') }}
                  {{ Form::select('efisiensi_umur', App\Questionnaire::$efisiensi_umur_option, old('efisiensi_umur', $questionnaire->efisiensi_umur), ['class' => 'form-control w-25 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_perawatan', '41. Apakah dilakukan perawatan mesin-mesin produksi di Koperasi/perusahaan anda?') }}
                  {{ Form::select('efisiensi_perawatan', App\Questionnaire::$efisiensi_perawatan_option, old('efisiensi_perawatan', $questionnaire->efisiensi_perawatan), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_rendemen', '42. Berapa nilai efisiensi produksi (rendemen) dari usaha yang dilakukan?') }}
                  {{ Form::select('efisiensi_rendemen', App\Questionnaire::$efisiensi_rendemen_option, old('efisiensi_rendemen', $questionnaire->efisiensi_rendemen), ['class' => 'form-control w-25 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('efisiensi_variasi', '43. Berapa jenis produk yang dihasilkan oleh Koperasi/perusahaan?') }}
                  {{ Form::select('efisiensi_variasi', App\Questionnaire::$efisiensi_variasi_option, old('efisiensi_variasi', $questionnaire->efisiensi_variasi), ['class' => 'form-control w-25 custom-select']) }}
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
                  {{ Form::select('energi_pln', App\Questionnaire::$energi_pln_option, old('energi_pln', $questionnaire->energi_pln), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('energi_genset', '45. Berapa kapasitas listrik yang dipakai di Koperasi/perusahaan anda?') }}
                  {{ Form::select('energi_genset', App\Questionnaire::$energi_genset_option, old('energi_genset', $questionnaire->energi_genset), ['class' => 'form-control w-50 custom-select']) }}
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
                  {{ Form::select('alternatif_energi', App\Questionnaire::$alternatif_energi_option, old('alternatif_energi', $questionnaire->alternatif_energi), ['class' => 'form-control w-50 custom-select']) }}
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
                  {{ Form::select('inovasi_produk', App\Questionnaire::$inovasi_produk_option, old('inovasi_produk', $questionnaire->inovasi_produk), ['class' => 'form-control w-75 custom-select']) }}
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
                <h4 class="h5">Operasional</h4>
                <div class="form-group">
                  {{ Form::label('rasio_kas', '48. Kas') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_kas', old('rasio_kas', $questionnaire->rasio_kas), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_piutang', '49. Piutang') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_piutang', old('rasio_piutang', $questionnaire->rasio_piutang), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_persediaan', '50. Persediaan') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_persediaan', old('rasio_persediaan', $questionnaire->rasio_persediaan), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_hutang_lancar', '51. Hutang Lancar') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_hutang_lancar', old('rasio_hutang_lancar', $questionnaire->rasio_hutang_lancar), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_hutang_pendek', '52. Hutang Jangka Pendek') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_hutang_pendek', old('rasio_hutang_pendek', $questionnaire->rasio_hutang_pendek), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Likuiditas dan Rasio Solvabilitas</small>
                </div>
                <h4 class="h5 mt-5">Aset</h4>
                <div class="form-group">
                  {{ Form::label('rasio_tanah', '53. Tanah') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_tanah', old('rasio_tanah', $questionnaire->rasio_tanah), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_bangunan', '54. Bangunan') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_bangunan', old('rasio_bangunan', $questionnaire->rasio_bangunan), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_mesin', '55. Mesin') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_mesin', old('rasio_mesin', $questionnaire->rasio_mesin), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_kendaraan', '56. Kendaraan') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_kendaraan', old('rasio_kendaraan', $questionnaire->rasio_kendaraan), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_inventaris', '57. Inventaris Lainnya') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_inventaris', old('rasio_inventaris', $questionnaire->rasio_inventaris), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_hutang_panjang', '58. Hutang Jangka Panjang') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_hutang_panjang', old('rasio_hutang_panjang', $questionnaire->rasio_hutang_panjang), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Rasio Solvabilitas</small>
                </div>
                <h4 class="h5 mt-5">Pendapatan</h4>
                <div class="form-group">
                  {{ Form::label('rasio_total_penjualan', '59. Total Penjualan') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_total_penjualan', old('rasio_total_penjualan', $questionnaire->rasio_total_penjualan), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Laba Usaha dan Rasio Profitabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('rasio_total_pengeluaran', '60. Total Pengeluaran') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('rasio_total_pengeluaran', old('rasio_total_pengeluaran', $questionnaire->rasio_total_pengeluaran), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Laba Usaha dan Rasio Profitabilitas</small>
                </div>
                <h4 class="h5 mt-5">Modal</h4>
                <div class="form-group">
                  {{ Form::label('modal_awal', '61. Modal Awal') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('modal_awal', old('rasio_modal_awal', $questionnaire->rasio_modal_awal), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Perimbangan Modal</small>
                </div>
                <div class="form-group">
                  {{ Form::label('modal_sendiri', '62. Modal Sendiri') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('modal_sendiri', old('rasio_modal_sendiri', $questionnaire->rasio_modal_sendiri), ['class' => 'form-control']) }}
                  </div>
                  <small class="form-text text-muted">Mempengaruhi nilai Perimbangan Modal dan Rasio Profitabilitas</small>
                </div>
                <div class="form-group">
                  {{ Form::label('modal_luar', '63. Modal Luar') }}
                  <div class="input-group w-50">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                    </div>
                    {{ Form::text('modal_luar', old('rasio_modal_luar', $questionnaire->rasio_modal_luar), ['class' => 'form-control']) }}
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
                  {{ Form::select('hubungan_pinjaman', App\Questionnaire::$hubungan_pinjaman_option, old('hubungan_pinjaman', $questionnaire->hubungan_pinjaman), ['class' => 'form-control custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('hubungan_frekuensi', '65. Seberapa banyak/kali anda berhubungan untuk mengajukan pinjaman ke perbankan selama 3 tahun terakhir?') }}
                  {{ Form::select('hubungan_frekuensi', App\Questionnaire::$hubungan_frekuensi_option, old('hubungan_frekuensi', $questionnaire->hubungan_frekuensi), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('hubungan_internal', '66. Kendala internal apakah yang dihadapi perusahaan dalam berhubungan dengan peminjaman/kredit dari perbankan?') }}
                  {{ Form::select('hubungan_internal', App\Questionnaire::$hubungan_internal_option, old('hubungan_internal', $questionnaire->hubungan_internal), ['class' => 'form-control custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('hubungan_eksternal', '67. Kendala eksternal apakah yang dihadapi perusahaan jika berhadapan dengan lembaga keuangan (bank dan non bank)?') }}
                  {{ Form::select('hubungan_eksternal', App\Questionnaire::$hubungan_eksternal_option, old('hubungan_eksternal', $questionnaire->hubungan_eksternal), ['class' => 'form-control w-50 custom-select']) }}
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
                  {{ Form::select('tk_jumlah', App\Questionnaire::$tk_jumlah_option, old('tk_jumlah', $questionnaire->tk_jumlah), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('tk_kompetisi', '69. Bagaimanakah kompetensi tenaga kerja di koperasi/perusahaan anda saat ini?') }}
                  {{ Form::select('tk_kompetisi', App\Questionnaire::$tk_kompetisi_option, old('tk_kompetisi', $questionnaire->tk_kompetisi), ['class' => 'form-control w-75 custom-select']) }}
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
                  {{ Form::select('produktif_jam', App\Questionnaire::$produktif_jam_option, old('produktif_jam', $questionnaire->produktif_jam), ['class' => 'form-control w-25 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('produktif_shift', '71. Bagaimanakah shift (giliran kerja) diperusahaan anda saat ini?') }}
                  {{ Form::select('produktif_shift', App\Questionnaire::$produktif_shift_option, old('produktif_shift', $questionnaire->produktif_shift), ['class' => 'form-control w-25 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('produktif_upah', '72. Berapa standar upah tenaga kerja?') }}
                  {{ Form::select('produktif_upah', App\Questionnaire::$produktif_upah_option, old('produktif_upah', $questionnaire->produktif_upah), ['class' => 'form-control w-50 custom-select']) }}
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
                  {{ Form::select('fasilitas_tk', App\Questionnaire::$fasilitas_tk_option, old('fasilitas_tk', $questionnaire->fasilitas_tk), ['class' => 'form-control w-75 custom-select']) }}
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
                  {{ Form::select('marketing_strategy', App\Questionnaire::$marketing_strategy_option, old('marketing_strategy', $questionnaire->marketing_strategy), ['class' => 'form-control custom-select']) }}
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
                  {{ Form::select('mix_product', App\Questionnaire::$mix_product_option, old('mix_product', $questionnaire->mix_product), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('mix_price', '76. Bagaimanakah penerapan harga di Koperasi/perusahaan anda?') }}
                  {{ Form::select('mix_price', App\Questionnaire::$mix_price_option, old('mix_price', $questionnaire->mix_price), ['class' => 'form-control w-50 custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('mix_place', '77. Bagaimanakah saluran distribusi produk Koperasi/perusahaan anda?') }}
                  {{ Form::select('mix_place', App\Questionnaire::$mix_place_option, old('mix_place', $questionnaire->mix_place), ['class' => 'form-control custom-select']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('mix_promotion', '78. Bagaimanakah keadaan profitabilitas usaha Koperasi/perusahaan anda?') }}
                  {{ Form::select('mix_promotion', App\Questionnaire::$mix_promotion_option, old('mix_promotion', $questionnaire->mix_promotion), ['class' => 'form-control w-50 custom-select']) }}
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
                  {{ Form::select('market_share', App\Questionnaire::$market_share_option, old('market_share', $questionnaire->market_share), ['class' => 'form-control w-25 custom-select']) }}
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
                  {{ Form::select('market_coverage', App\Questionnaire::$market_coverage_option, old('market_coverage', $questionnaire->market_coverage), ['class' => 'form-control w-75 custom-select']) }}
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
                  {{ Form::select('market_competition', App\Questionnaire::$market_competition_option, old('market_competition', $questionnaire->market_competition), ['class' => 'form-control w-75 custom-select']) }}
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
            <span class="ml-2">Update</span>
          </button>
        </div>
      </div>
    </div>
	{{ Form::close() }}
</div>
@stop

@push('js')
  <script>
    function ask(id) {
      event.preventDefault();
      if (confirm(`Apakah kamu yakin akan menghapus kuesioner dengan id ${id} ?`) === true) {
        document.getElementById('form').submit();
      }
    }
  </script>
@endpush
