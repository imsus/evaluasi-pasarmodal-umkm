<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>PDF</title>
</head>
<body>
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
    </div>
    <div class="row">
      <div class="col-md-12">
        <section class="mb-5">
          <h2 class="h3 mb-3" id="skor">Skor</h2>
          <div class="row">
            <div class="masonry-sizer col-md-12 hidden"></div>
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
            <div class="masonry-item col-md-12 mb-4">
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
            <div class="masonry-item col-md-12 mb-4">
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
            <div class="masonry-item col-md-12 mb-4">
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
            <div class="masonry-item col-md-12 mb-4">
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
            <div class="masonry-item col-md-12 mb-4">
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
      </div>
    </div>
  </div>  
</body>
</html>
