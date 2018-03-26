@extends('layouts.master')

@section('content')
@php
  function progressClass($progress)
  {
      if ($progress <= 33) {
          return 'bg-danger';
      } elseif ($progress <= 67) {
          return 'bg-warning';
      } elseif ($progress <= 100) {
          return 'bg-success';
      }
  }

  function labelClass($score)
  {
      if ($score <= 1) {
          return 'badge-danger';
      } elseif ($score <= 3) {
          return 'badge-warning';
      } elseif ($score <= 5) {
          return 'badge-success';
      }
  }
@endphp

<div class="container mt-5">
	<div class="row flex align-items-center mb-4">
		<div class="col-md-8"><h1 class="mb-0">Detail Kuesioner <strong>#{{ $questionnaire->id }}</strong></h1></div>
		<div class="col-md-4 hidden-print text-right">
			<div class="btn-group btn-group-justified">
        <a href="{{ route('questionnaire.index') }}" class="btn btn-light flex align-items-center justify-content-center">
          <span class="fal fa-home"></span>
          <span class="ml-2">Kembali</span>
        </a>
        <a href="{{ route('questionnaire.edit', $questionnaire->id) }}" class="btn btn-light flex align-items-center justify-content-center">
          <span class="fal fa-pen"></span>
          <span class="ml-2">Edit</span>
        </a>
        <a href="{{ route('questionnaire.print', $questionnaire->id) }}" class="btn btn-light flex align-items-center justify-content-center">
          <span class="fal fa-print"></span>
          <span class="ml-2">Print</span>
        </a>
			</div>
		</div>
  </div>
  <div class="row">
    <div class="col-md-9">
      <section class="mb-5">
        <h2 class="h3 mb-3" id="skor">Skor</h2>
        <div class="row" data-masonry='{ "itemSelector": ".masonry-item", "columnWidth": ".masonry-sizer", "fitwidth": true }'>
          <div class="masonry-sizer col-md-6 hidden"></div>
          <div class="masonry-item col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Skor Total</div>
                <div class="card-subtitle h6 text-muted mb-2">
                  <div class="progress mb-1">
                    <div class="progress-bar {{ progressClass($questionnaire->output_skor_percent) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->output_skor * 100 / 2902) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $questionnaire->output_skor_percent }}%;"></div>
                  </div>
                  <div class="text-center">{{ $questionnaire->output_skor }}/{{ config('custom.total_output') }} ({{ $questionnaire->output_skor_percent }}%)</div>
                </div>
                <p class="card-text">{{ $questionnaire->output_keputusan }}</p>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Aspek Manajerial</div>
                <div class="card-subtitle h6 text-muted mb-2">
                  <div class="progress mb-1">
                    <div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score_percent) }}" role="progressbar" aria-valuenow="{{ $questionnaire->saran_manajerial_score_percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $questionnaire->saran_manajerial_score_percent }}%;"></div>
                  </div>
                  <div class="text-center">{{ $questionnaire->saran_manajerial_score }}/{{ config('custom.total_manajerial') }} ({{ $questionnaire->saran_manajerial_score_percent }}%)</div>
                </div>
                <p class="card-text">{{ $questionnaire->saran_manajerial }}</p>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Aspek Mesin &amp; Produksi</div>
                <div class="card-subtitle h6 text-muted mb-2">
                  <div class="progress mb-1">
                    <div class="progress-bar {{ progressClass($questionnaire->saran_mesin_score_percent) }}" role="progressbar" aria-valuenow="{{ $questionnaire->saran_mesin_score_percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $questionnaire->saran_mesin_score_percent }}%;"></div>
                  </div>
                <div class="text-center">{{ $questionnaire->saran_mesin_score }}/{{ config('custom.total_mesin') }} ({{ $questionnaire->saran_mesin_score_percent }}%)</div>
                </div>
                <p class="card-text">{{ $questionnaire->saran_mesin }}</p>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Aspek Keuangan</div>
                <div class="card-subtitle h6 text-muted mb-2">
                  <div class="progress mb-1">
                    <div class="progress-bar {{ progressClass($questionnaire->saran_keuangan_score_percent) }}" role="progressbar" aria-valuenow="{{ $questionnaire->saran_keuangan_score_percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $questionnaire->saran_keuangan_score_percent }}%;"></div>
                  </div>
                  <div class="text-center">{{ $questionnaire->saran_keuangan_score }}/{{ config('custom.total_keuangan') }} ({{ $questionnaire->saran_keuangan_score_percent }}%)</div>
                </div>
                <p class="card-text">{{ $questionnaire->saran_keuangan }}</p>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Aspek SDM</div>
                <div class="card-subtitle h6 text-muted mb-2">
                  <div class="progress mb-1">
                    <div class="progress-bar {{ progressClass($questionnaire->saran_sdm_score_percent) }}" role="progressbar" aria-valuenow="{{ $questionnaire->saran_sdm_score_percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $questionnaire->saran_sdm_score_percent }}%;"></div>
                  </div>
                  <div class="text-center">{{ $questionnaire->saran_sdm_score }}/{{ config('custom.total_sdm') }} ({{ $questionnaire->saran_sdm_score_percent }}%)</div>
                </div>
                <p class="card-text">{{ $questionnaire->saran_sdm }}</p>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Aspek Marketing</div>
                <div class="card-subtitle h6 text-muted mb-2">
                  <div class="progress mb-1">
                    <div class="progress-bar {{ progressClass($questionnaire->saran_marketing_score_percent) }}" role="progressbar" aria-valuenow="{{ $questionnaire->saran_marketing_score_percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $questionnaire->saran_marketing_score_percent }}%;"></div>
                  </div>
                  <div class="text-center">{{ $questionnaire->saran_marketing_score }}/{{ config('custom.total_marketing') }} ({{ $questionnaire->saran_marketing_score_percent }}%)</div>
                </div>
                <p class="card-text">{{ $questionnaire->saran_marketing }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="mb-5">
        <h2 class="h3 mb-3" id="data-umum">Data Umum</h2>
        <div class="row" data-masonry='{ "itemSelector": ".masonry-item", "columnWidth": ".masonry-sizer", "fitwidth": true }'>
          <div class="masonry-sizer col-md-6 hidden"></div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Kontak Perusahaan</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Nama UKM</dt><dd>{{ $questionnaire->kontak_nama }} @if ( $questionnaire->kontak_gopublik ) <span class="align-text-bottom badge badge-success">Sudah Go Publik</span> @else <span class="align-text-bottom badge badge-danger">Belum Go Publik</span> @endif</dd>
                    <dt>Alamat Kantor/Pabrik</dt><dd>{{ $questionnaire->kontak_alamat ?? 'Tidak Diisi' }}</dd>
                    <dt>Kota, Provinsi</dt><dd>{{ $questionnaire->kontak_kota ?? 'Tidak Diisi' }}</dd>
                    <dt>No. Telepon</dt><dd>{{ $questionnaire->kontak_telepon ?? 'Tidak Diisi' }}</dd>
                    <dt>No. Fax</dt><dd>{{ $questionnaire->kontak_fax ?? 'Tidak Diisi' }}</dd>
                    <dt>No. Handphone</dt><dd>{{ $questionnaire->kontak_handphone ?? 'Tidak Diisi' }}</dd>
                    <dt>Alamat Website</dt>
                    <dd>
                      @if ($questionnaire->kontak_website)
                        <a href="{{ $questionnaire->kontak_website }}" target="_blank">{{ $questionnaire->kontak_website }}</a>
                      @else
                        <span>Tidak Diisi</span>
                      @endif
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Status Perusahaan</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Tahun Berdiri</dt><dd>{{ $questionnaire->status_tahun ?? 'Tidak Diisi' }}</dd>
                    <dt>Status Usaha</dt><dd>{{ App\Questionnaire::$status_usaha_option[$questionnaire->status_usaha] ?? 'Tidak Diisi' }}</dd>
                    <dt>Status Pemodalan</dt><dd>{{ App\Questionnaire::$status_pemodalan_option[$questionnaire->status_pemodalan] ?? 'Tidak Diisi' }}</dd>
                    <dt>Penanggung Jawab</dt><dd>{{ $questionnaire->status_pj ?? 'Tidak Diisi' }}</dd>
                    <dt>Jumlah Manajer</dt><dd>{{ $questionnaire->status_manajer ?? 'Tidak Diisi' }}</dd>
                    <dt>Jumlah Karyawan</dt><dd>{{ $questionnaire->status_karyawan ?? 'Tidak Diisi' }}</dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="mb-5">
        <h2 class="h3 mb-3" id="aspek-manajerial">Aspek Manajerial</h2>
        <div class="row" data-masonry='{ "itemSelector": ".masonry-item", "columnWidth": ".masonry-sizer", "fitwidth": true }'>
          <div class="masonry-sizer col-md-6 hidden"></div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Dokumen Legalitas Perusahaan</div>
                <div class="card-text">
                  <dl class="dl-horizontal">
                    <dt>Akte Pendirian</dt><dd>{{ App\Questionnaire::$dokumen_akte_option[$questionnaire->dokumen_akte] }}</dd>
                    <dt>Tahun Terbit Surat</dt><dd>{{ $questionnaire->dokumen_tahun ?? 'Tidak Diisi' }}</dd>
                    <dt>NPWP</dt><dd>@if ($questionnaire->dokumen_npwp) Ada @else Tidak Ada @endif</dd>
                    <dt>SIUP</dt><dd>@if ($questionnaire->dokumen_siup) Ada @else Tidak Ada @endif</dd>
                    <dt>TDP</dt><dd>@if ($questionnaire->dokumen_tdp) Ada @else Tidak Ada @endif</dd>
                    <dt>IUI</dt><dd>@if ($questionnaire->dokumen_iui) Ada @else Tidak Ada @endif</dd>
                    <dt>SITU</dt><dd>@if ($questionnaire->dokumen_situ) Ada @else Tidak Ada @endif</dd>
                    <dt>Skor</dt><dd><span class="badge {{ labelClass(array_sum([$questionnaire->dokumen_npwp, $questionnaire->dokumen_siup, $questionnaire->dokumen_tdp, $questionnaire->dokumen_iui, $questionnaire->dokumen_situ])) }}">{{ array_sum([$questionnaire->dokumen_npwp, $questionnaire->dokumen_siup, $questionnaire->dokumen_tdp, $questionnaire->dokumen_iui, $questionnaire->dokumen_situ]) }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Sistem Manajemen</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Punya Sistem Manajemen</dt><dd>{{ App\Questionnaire::$sm_punya_option[$questionnaire->sm_punya] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sm_punya) }}">{{ $questionnaire->sm_punya }}</span></dd>
                    <dt>Sistem Manajemen Tersertifikasi</dt><dd>{{ App\Questionnaire::$sm_sertifikasi_option[$questionnaire->sm_sertifikasi] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sm_sertifikasi) }}">{{ $questionnaire->sm_sertifikasi }}</span></dd>
                    <dt>Punya Struktur Organisasi</dt><dd>{{ App\Questionnaire::$sm_so_option[$questionnaire->sm_so] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sm_so) }}">{{ $questionnaire->sm_so }}</span></dd>
                    <dt>Job Description Jelas</dt><dd>{{ App\Questionnaire::$sm_jobdesc_option[$questionnaire->sm_jobdesc] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sm_jobdesc) }}">{{ $questionnaire->sm_jobdesc }}</span></dd>
                    <dt>Punya SOP</dt><dd>{{ App\Questionnaire::$sm_sop_option[$questionnaire->sm_sop] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sm_sop) }}">{{ $questionnaire->sm_sop }}</span></dd>
                    <dt>Punya Sistem Pengarsipan</dt><dd>{{ App\Questionnaire::$sm_arsip_option[$questionnaire->sm_arsip] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sm_arsip) }}">{{ $questionnaire->sm_arsip }}</span></dd>
                    <dt>Melakukan Internal Audit Berkala</dt><dd>{{ App\Questionnaire::$sm_audit_option[$questionnaire->sm_audit] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sm_audit) }}">{{ $questionnaire->sm_audit }}</span></dd>
                    <dt>Menerapkan Total Quality Control</dt><dd>{{ App\Questionnaire::$sm_tqc_option[$questionnaire->sm_tqc] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sm_tqc) }}">{{ $questionnaire->sm_tqc }}</span></dd>
                    <dt>Memerhatikan Kepuasan Pelanggan</dt><dd>{{ App\Questionnaire::$sm_satisfaction_option[$questionnaire->sm_satisfaction] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sm_satisfaction) }}">{{ $questionnaire->sm_satisfaction }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Kelengkapan Sarana dan Prasarana</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Luas Bangunan Kantor</dt><dd>{{ App\Questionnaire::$sarana_luas_kantor_option[$questionnaire->sarana_luas_kantor] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_luas_kantor) }}">{{ $questionnaire->sarana_luas_kantor }}</span></dd>
                    <dt>Kondisi Bangunan Kantor</dt><dd>{{ App\Questionnaire::$sarana_kondisi_kantor_option[$questionnaire->sarana_kondisi_kantor] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_kondisi_kantor) }}">{{ $questionnaire->sarana_kondisi_kantor }}</span></dd>
                    <dt>Perkiraan Nilai Kantor</dt><dd>{{ App\Questionnaire::$sarana_nilai_kantor_option[$questionnaire->sarana_nilai_kantor] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_nilai_kantor) }}">{{ $questionnaire->sarana_nilai_kantor }}</span></dd>
                    <dt>Luas Bangunan Gudang</dt><dd>{{ App\Questionnaire::$sarana_luas_gudang_option[$questionnaire->sarana_luas_gudang] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_luas_gudang) }}">{{ $questionnaire->sarana_luas_gudang }}</span></dd>
                    <dt>Kondisi Bangunan Gudang</dt><dd>{{ App\Questionnaire::$sarana_kondisi_gudang_option[$questionnaire->sarana_kondisi_gudang] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_kondisi_gudang) }}">{{ $questionnaire->sarana_kondisi_gudang }}</span></dd>
                    <dt>Perkiraan Nilai Gudang</dt><dd>{{ App\Questionnaire::$sarana_nilai_gudang_option[$questionnaire->sarana_nilai_gudang] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_nilai_gudang) }}">{{ $questionnaire->sarana_nilai_gudang }}</span></dd>
                    <dt>Jumlah Mobil Pribadi/Perusahaan</dt><dd>{{ App\Questionnaire::$sarana_jumlah_mobil_option[$questionnaire->sarana_jumlah_mobil] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_jumlah_mobil) }}">{{ $questionnaire->sarana_jumlah_mobil }}</span></dd>
                    <dt>Nilai Pasar Mobil Pribadi/Perusahaan</dt><dd>{{ App\Questionnaire::$sarana_nilai_mobil_option[$questionnaire->sarana_nilai_mobil] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_nilai_mobil) }}">{{ $questionnaire->sarana_nilai_mobil }}</span></dd>
                    <dt>Jumlah Mobil Angkutan/Pickup</dt><dd>{{ App\Questionnaire::$sarana_jumlah_angkutan_option[$questionnaire->sarana_jumlah_angkutan] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_jumlah_angkutan) }}">{{ $questionnaire->sarana_jumlah_angkutan }}</span></dd>
                    <dt>Nilai Pasar Mobil Angkutan/Pickup</dt><dd>{{ App\Questionnaire::$sarana_nilai_angkutan_option[$questionnaire->sarana_nilai_angkutan] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->sarana_nilai_angkutan) }}">{{ $questionnaire->sarana_nilai_angkutan }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Potensi Perluasan</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Rencana Perluasan</dt><dd>{{ App\Questionnaire::$potensi_perluasan_option[$questionnaire->potensi_perluasan] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->potensi_perluasan) }}">{{ $questionnaire->potensi_perluasan }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="mb-5">
        <h2 class="h3 mb-3" id="aspek-produksi">Aspek Mesin dan Produksi</h2>
        <div class="row" data-masonry='{ "itemSelector": ".masonry-item", "columnWidth": ".masonry-sizer", "fitwidth": true }'>
          <div class="masonry-sizer col-md-6 hidden"></div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Efisiensi dan Efektivitas</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Memenuhi Standar</dt><dd>{{ App\Questionnaire::$efisiensi_standar_option[$questionnaire->efisiensi_standar] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->efisiensi_standar) }}">{{ $questionnaire->efisiensi_standar }}</span></dd>
                    <dt>Efisiensi Jumlah Mesin</dt><dd>{{ App\Questionnaire::$efisiensi_jumlah_option[$questionnaire->efisiensi_jumlah] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->efisiensi_jumlah) }}">{{ $questionnaire->efisiensi_jumlah }}</span></dd>
                    <dt>Kapasitas Mesin</dt><dd>{{ App\Questionnaire::$efisiensi_kapasitas_option[$questionnaire->efisiensi_kapasitas] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->efisiensi_kapasitas) }}">{{ $questionnaire->efisiensi_kapasitas }}</span></dd>
                    <dt>Usia Mesin</dt><dd>{{ App\Questionnaire::$efisiensi_umur_option[$questionnaire->efisiensi_umur] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->efisiensi_umur) }}">{{ $questionnaire->efisiensi_umur }}</span></dd>
                    <dt>Perawatan Mesin</dt><dd>{{ App\Questionnaire::$efisiensi_perawatan_option[$questionnaire->efisiensi_perawatan] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->efisiensi_perawatan) }}">{{ $questionnaire->efisiensi_perawatan }}</span></dd>
                    <dt>Nilai Efisiensi Produksi</dt><dd>{{ App\Questionnaire::$efisiensi_rendemen_option[$questionnaire->efisiensi_rendemen] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->efisiensi_rendemen) }}">{{ $questionnaire->efisiensi_rendemen }}</span></dd>
                    <dt>Varian Produk</dt><dd>{{ App\Questionnaire::$efisiensi_variasi_option[$questionnaire->efisiensi_variasi] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->efisiensi_variasi) }}">{{ $questionnaire->efisiensi_variasi }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Kebutuhan Energi</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Kapasitas Penggunaan Listrik PLN</dt><dd>{{ App\Questionnaire::$energi_pln_option[$questionnaire->energi_pln] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->energi_pln) }}">{{ $questionnaire->energi_pln }}</span></dd>
                    <dt>Kapasitas Penggunaan Listrik Genset</dt><dd>{{ App\Questionnaire::$energi_genset_option[$questionnaire->energi_genset] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->energi_genset) }}">{{ $questionnaire->energi_genset }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Penggunaan Energi Alternatif</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Penggunaan Energi Alternatif</dt><dd>{{ App\Questionnaire::$alternatif_energi_option[$questionnaire->alternatif_energi] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->alternatif_energi) }}">{{ $questionnaire->alternatif_energi }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Inovasi Produk dan Proses Produksi</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Inovasi Produk</dt><dd>{{ App\Questionnaire::$inovasi_produk_option[$questionnaire->inovasi_produk] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->inovasi_produk) }}">{{ $questionnaire->inovasi_produk }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="mb-5">
        <h2 class="h3 mb-3" id="aspek-keuangan">Aspek Keuangan</h2>
        <div class="row" data-masonry='{ "itemSelector": ".masonry-item", "columnWidth": ".masonry-sizer", "fitwidth": true }'>
          <div class="masonry-sizer col-md-6 hidden"></div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Analisa Aspek Rasio Keuangan</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Laba Usaha</dt><dd>{{ $questionnaire->laba_usaha }} <span class="badge align-text-bottom {{ labelClass($questionnaire->laba_usaha_score) }}">{{ $questionnaire->laba_usaha_score }}</span></dd>
                    <dt>Modal Awal</dt><dd>{{ $questionnaire->modal_awal ?? 'Tidak Diisi' }} <span class="badge align-text-bottom {{ labelClass($questionnaire->modal_awal_score) }}">{{ $questionnaire->modal_awal_score }}</span></dd>
                    <dt>Modal Sendiri</dt><dd>{{ $questionnaire->modal_sendiri ?? 'Tidak Diisi' }} <span class="badge align-text-bottom {{ labelClass($questionnaire->modal_sendiri_score) }}">{{ $questionnaire->modal_sendiri_score }}</span></dd>
                    <dt>Modal Luar</dt><dd>{{ $questionnaire->modal_luar ?? 'Tidak Diisi' }} <span class="badge align-text-bottom {{ labelClass($questionnaire->modal_luar_score) }}">{{ $questionnaire->modal_luar_score }}</span></dd>
                    <dt>Modal Perimbangan</dt><dd>{{ $questionnaire->modal_perimbangan }} <span class="badge align-text-bottom {{ labelClass($questionnaire->modal_perimbangan_score) }}">{{ $questionnaire->modal_perimbangan_score }}</span></dd>
                    <dt>Rasio Likuiditas</dt><dd>{{ $questionnaire->rasio_likuiditas }} <span class="badge align-text-bottom {{ labelClass($questionnaire->rasio_likuiditas_score) }}">{{ $questionnaire->rasio_likuiditas_score }}</span></dd>
                    <dt>Rasio Solvabilitas</dt><dd>{{ $questionnaire->rasio_solvabilitas }} <span class="badge align-text-bottom {{ labelClass($questionnaire->rasio_solvabilitas_score) }}">{{ $questionnaire->rasio_solvabilitas_score }}</span></dd>
                    <dt>Rasio Profitabilitas</dt><dd>{{ $questionnaire->rasio_profitabilitas ?? 0 }} <span class="badge align-text-bottom {{ labelClass($questionnaire->rasio_profitabilitas_score) }}">{{ $questionnaire->rasio_profitabilitas_score }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Hubungan Dengan Perbankan</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Hubungan Usaha dan Perbankan</dt><dd>{{ App\Questionnaire::$hubungan_pinjaman_option[$questionnaire->hubungan_pinjaman] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->hubungan_pinjaman) }}">{{ $questionnaire->hubungan_pinjaman }}</span></dd>
                    <dt>Jumlah pinjaman dalam 3 tahun terakhir</dt><dd>{{ App\Questionnaire::$hubungan_frekuensi_option[$questionnaire->hubungan_frekuensi] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->hubungan_frekuensi) }}">{{ $questionnaire->hubungan_frekuensi }}</span></dd>
                    <dt>Kendala Internal</dt><dd>{{ App\Questionnaire::$hubungan_internal_option[$questionnaire->hubungan_internal] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->hubungan_internal) }}">{{ $questionnaire->hubungan_internal }}</span></dd>
                    <dt>Kendala Eksternal</dt><dd>{{ App\Questionnaire::$hubungan_eksternal_option[$questionnaire->hubungan_eksternal] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->hubungan_eksternal) }}">{{ $questionnaire->hubungan_eksternal }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="mb-5">
        <h2 class="h3 mb-3" id="aspek-sdm">Aspek SDM</h2>
        <div class="row" data-masonry='{ "itemSelector": ".masonry-item", "columnWidth": ".masonry-sizer", "fitwidth": true }'>
          <div class="masonry-sizer col-md-6 hidden"></div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Pemenuhan Tenaga Kerja</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Jumlah Tenaga Kerja</dt><dd>{{ App\Questionnaire::$tk_jumlah_option[$questionnaire->tk_jumlah] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->tk_jumlah) }}">{{ $questionnaire->tk_jumlah }}</span></dd>
                    <dt>Kompetensi Tenaga Kerja</dt><dd>{{ App\Questionnaire::$tk_kompetisi_option[$questionnaire->tk_kompetisi] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->tk_kompetisi) }}">{{ $questionnaire->tk_kompetisi }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Produktivitas Kerja</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Lama Jam Kerja</dt><dd>{{ App\Questionnaire::$produktif_jam_option[$questionnaire->produktif_jam] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->produktif_jam) }}">{{ $questionnaire->produktif_jam }}</span></dd>
                    <dt>Jumlah Shift</dt><dd>{{ App\Questionnaire::$produktif_shift_option[$questionnaire->produktif_shift] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->produktif_shift) }}">{{ $questionnaire->produktif_shift }}</span></dd>
                    <dt>Standar Upah Tenaga Kerja</dt><dd>{{ App\Questionnaire::$produktif_upah_option[$questionnaire->produktif_upah] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->produktif_upah) }}">{{ $questionnaire->produktif_upah }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Fasilitas untuk Tenaga Kerja</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Fasilitas Tenaga Kerja</dt><dd>{{ App\Questionnaire::$fasilitas_tk_option[$questionnaire->fasilitas_tk] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->fasilitas_tk) }}">{{ $questionnaire->fasilitas_tk }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="mb-5">
        <h2 class="h3 mb-3" id="aspek-marketing">Aspek Pemasaran</h2>
        <div class="row" data-masonry='{ "itemSelector": ".masonry-item", "columnWidth": ".masonry-sizer", "fitwidth": true }'>
          <div class="masonry-sizer col-md-6 hidden"></div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Strategi Pemasaran</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Strategi Pemasaran</dt><dd>{{ App\Questionnaire::$marketing_strategy_option[$questionnaire->marketing_strategy] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->marketing_strategy) }}">{{ $questionnaire->marketing_strategy }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Bauran Pemasaran</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Jumlah Varian Produk</dt><dd>{{ App\Questionnaire::$mix_product_option[$questionnaire->mix_product] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->mix_product) }}">{{ $questionnaire->mix_product }}</span></dd>
                    <dt>Penerapan Harga</dt><dd>{{ App\Questionnaire::$mix_price_option[$questionnaire->mix_price] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->mix_price) }}">{{ $questionnaire->mix_price }}</span></dd>
                    <dt>Saluran Distribusi</dt><dd>{{ App\Questionnaire::$mix_place_option[$questionnaire->mix_place] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->mix_place) }}">{{ $questionnaire->mix_place }}</span></dd>
                    <dt>Penerapan Promosi</dt><dd>{{ App\Questionnaire::$mix_promotion_option[$questionnaire->mix_promotion] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->mix_promotion) }}">{{ $questionnaire->mix_promotion }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Penguasaan Pasar</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Keadaan Market Share</dt><dd>{{ App\Questionnaire::$market_share_option[$questionnaire->market_share] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->market_share) }}">{{ $questionnaire->market_share }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Cakupan Pasar</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Luas Cakupan Pasar</dt><dd>{{ App\Questionnaire::$market_coverage_option[$questionnaire->market_coverage] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->market_coverage) }}">{{ $questionnaire->market_coverage }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
					<div class="masonry-item col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title h5 mb-3">Persaingan</div>
                <div class="card-text">
                  <dl class="mb-0">
                    <dt>Persaingan Produk</dt><dd>{{ App\Questionnaire::$market_competition_option[$questionnaire->market_competition] }} <span class="badge align-text-bottom {{ labelClass($questionnaire->market_competition) }}">{{ $questionnaire->market_competition }}</span></dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="col-md-3">
      <div class="list-group sticky-top" style="top: 30px">
        <div class="spy">
          <a href="#skor" class="list-group-item list-group-item-action">Skor</a>
          <a href="#data-umum" class="list-group-item list-group-item-action">Data Umum</a>
          <a href="#aspek-manajerial" class="list-group-item list-group-item-action">Aspek Manajerial</a>
          <a href="#aspek-produksi" class="list-group-item list-group-item-action">Aspek Mesin dan Produksi</a>
          <a href="#aspek-keuangan" class="list-group-item list-group-item-action">Aspek Keuangan</a>
          <a href="#aspek-sdm" class="list-group-item list-group-item-action">Aspek SDM</a>
          <a href="#aspek-pemasaran" class="list-group-item list-group-item-action">Aspek Pemasaran</a>
        </div>
      </div>
    </div>
  </div>
	{{--
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek SDM <small>{{ $questionnaire->saran_sdm_score }}/30</small></h3></div>
				<div class="panel-body">
					<h4>Pemenuhan Tenaga Kerja</h4>
					<dl class="dl-horizontal">
						<dt>Jumlah Tenaga Kerja</dt><dd>{{ App\Questionnaire::$tk_jumlah_option[$questionnaire->tk_jumlah] }} &ensp; <span class="label {{ labelClass($questionnaire->tk_jumlah) }}">{{ $questionnaire->tk_jumlah }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Kompetensi Tenaga Kerja">Kompetensi Tenaga Kerja</dt><dd>{{ App\Questionnaire::$tk_kompetisi_option[$questionnaire->tk_kompetisi] }} &ensp; <span class="label {{ labelClass($questionnaire->tk_kompetisi) }}">{{ $questionnaire->tk_kompetisi }}</span></dd>
					</dl>
					<h4>Produktivitas Kerja</h4>
					<dl class="dl-horizontal">
						<dt>Lama Jam Kerja</dt><dd>{{ App\Questionnaire::$produktif_jam_option[$questionnaire->produktif_jam] }} &ensp; <span class="label {{ labelClass($questionnaire->produktif_jam) }}">{{ $questionnaire->produktif_jam }}</span></dd>
						<dt>Jumlah Shift</dt><dd>{{ App\Questionnaire::$produktif_shift_option[$questionnaire->produktif_shift] }} &ensp; <span class="label {{ labelClass($questionnaire->produktif_shift) }}">{{ $questionnaire->produktif_shift }}</span></dd>
						<dt data-toggle="tooltip" data-placement="bottom" title="Standar Upah Tenaga Kerja">Standar Upah Tenaga Kerja</dt><dd>{{ App\Questionnaire::$produktif_upah_option[$questionnaire->produktif_upah] }} &ensp; <span class="label {{ labelClass($questionnaire->produktif_upah) }}">{{ $questionnaire->produktif_upah }}</span></dd>
					</dl>
					<h4>Fasilitas untuk Tenaga Kerja</h4>
					<dl class="dl-horizontal">
						<dt>Fasilitas Tenaga Kerja</dt><dd>{{ App\Questionnaire::$fasilitas_tk_option[$questionnaire->fasilitas_tk] }} &ensp; <span class="label {{ labelClass($questionnaire->fasilitas_tk) }}">{{ $questionnaire->fasilitas_tk }}</span></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Aspek Pemasaran <small>{{ $questionnaire->saran_marketing_score }}/40</small></h3></div>
				<div class="panel-body">
					
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Hasil Analisa Kuesioner <small>{{ $questionnaire->output_skor }}/290</small></h3></div>
				<div class="panel-body">
					<h4>Skor Total &mdash; {{ $questionnaire->output_skor }}/290 <small>{{ round($questionnaire->output_skor / 290 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->output_skor / 290 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->output_skor / 290 * 100, 0) . '%' }};">
							{{ round($questionnaire->output_skor / 290 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Keputusan</h5>
					<blockquote>
						<p>{{ $questionnaire->output_keputusan }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek Manajerial &mdash; {{ $questionnaire->saran_manajerial_score }}/105 <small>{{ round($questionnaire->saran_manajerial_score / 105 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_manajerial_score / 105 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_manajerial_score / 105 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_manajerial_score / 105 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_manajerial }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek Mesin dan Produksi &mdash; {{ $questionnaire->saran_mesin_score }}/55 <small>{{ round($questionnaire->saran_mesin_score / 55 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_mesin_score / 55 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_mesin_score / 55 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_mesin_score / 55 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_mesin }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek Keuangan &mdash; {{ $questionnaire->saran_keuangan_score }}/60 <small>{{ round($questionnaire->saran_keuangan_score / 60 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_keuangan_score / 60 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_keuangan_score / 60 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_keuangan_score / 60 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_keuangan }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek SDM &mdash; {{ $questionnaire->saran_sdm_score }}/30 <small>{{ round($questionnaire->saran_sdm_score / 30 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_sdm_score / 30 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_sdm_score / 30 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_sdm_score / 30 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_sdm }}</p>
					</blockquote>
					<br>
					<h4>Skor Aspek Pemasaran &mdash; {{ $questionnaire->saran_marketing_score }}/40 <small>{{ round($questionnaire->saran_marketing_score / 40 * 100, 2) . '%' }}</small></h4>
					<div class="progress">
						<div class="progress-bar {{ progressClass($questionnaire->saran_manajerial_score / 105) }}" role="progressbar" aria-valuenow="{{ round($questionnaire->saran_marketing_score / 40 * 100, 0) . '%' }}" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ round($questionnaire->saran_marketing_score / 40 * 100, 0) . '%' }};">
							{{ round($questionnaire->saran_marketing_score / 40 * 100, 0) . '%' }}
						</div>
					</div>
					<h5>Saran</h5>
					<blockquote>
						<p>{{ $questionnaire->saran_marketing }}</p>
					</blockquote>
				</div>
			</div>
		</div>
	</div>  --}}
</div>
@stop

@push('js')
	<script>
		$(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
@endpush
