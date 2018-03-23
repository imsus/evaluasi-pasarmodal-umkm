@extends('layouts.master')

@section('content')
<div class="container mt-5">
	<div class="row flex align-items-center mb-4">
		<div class="col-md-10"><h1 class="mb-0">Daftar Kuesioner</h1></div>
    <div class="col-md-2">
      <a href="{{ route('questionnaire.create') }}" class="btn btn-success btn-block d-flex align-items-center justify-content-center">
        <span class="fal fa-plus"></span>
        <span class="ml-2">Buat Kuesioner</span>
      </a>
    </div>
	</div>
  @if (count($questionnaires) == 0)
    <div class="none">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body my-5 d-flex flex-column align-items-center justify-content-center">
              <div class="display-1 text-center mb-2">🤔</di>
              <h2>Data masih kosong</h2>
              <p class="lead mb-0">Silahkan buat data kuesioner</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  @else
    <div id="questionnaire" class="table-responsive">
      <table class="table table-hover">
        <thead>
          <th>ID</th>
          <th>Nama Perusahaan</th>
          <th>Dibuat</th>
          <th>Edit Terakhir</th>
          <th></th>
        </thead>
        @foreach($questionnaires as $questionnaire)
            <tr>
              <td>{{ $questionnaire->id }}</td>
              <td>{{ $questionnaire->kontak_nama }}</td>
              <td>{{ $questionnaire->created_at->format('d M Y') }}</td>
              <td>{{ $questionnaire->updated_at->diffForHumans() }}</td>
              <td class="text-right">
                {{ Form::open(['id' => 'form-' . $questionnaire->id, 'url' => action('QuestionnaireController@delete', $questionnaire->id), 'method' => 'delete', 'onsubmit' => 'ask(' . $questionnaire->id . ')']) }}
                  <div class="btn-group btn-group-sm option">
                    <a href="{{ route('questionnaire.show', $questionnaire->id) }}" class="btn btn-light text-success d-flex align-items-center justify-content-center">
                      <span class="fal fa-check"></span>
                      <span class="ml-2">Detail</span>
                    </a>
                    <a href="{{ route('questionnaire.edit', $questionnaire->id) }}" class="btn btn-light d-flex align-items-center justify-content-center">
                      <span class="fal fa-edit"></span>
                      <span class="ml-2">Edit</span>
                    </a>
                    <a href="{{ route('questionnaire.print', $questionnaire->id) }}" class="btn btn-light d-flex align-items-center justify-content-center">
                      <span class="fal fa-print"></span>
                      <span class="ml-2">Print</span>
                    </a>
                    <button type="submit" class="btn btn-light text-danger flex align-items-center justify-content-center">
                      <span class="fal fa-trash"></span>
                      <span class="ml-2">Hapus</span>
                    </button>
                  </div>
                {{ Form::close() }}
              </td>
            </tr>
          @endforeach
      </table>
    </div>
  @endif
</div>
@stop

@section('modal')
  
@endsection

@push('css')
  <style>
    #questionnaire>table>tbody>tr>td { vertical-align: middle;}
    .table-hover>tbody>tr .option{ visibility: hidden;}
    .table-hover>tbody>tr:hover .option{ visibility: visible;}
  </style>
@endpush

@push('js')
  <script>
    function ask(id) {
      event.preventDefault();
      if (confirm(`Apakah kamu yakin akan menghapus kuesioner dengan id ${id} ?`) === true) {
        document.getElementById(`form-${id}`).submit();
      }
    }
  </script>
@endpush
