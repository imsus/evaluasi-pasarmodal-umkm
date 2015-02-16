@extends('base.base')

@section('content')
<style>
	#kuesioner>table>tbody>tr>td { vertical-align: middle }
	.table-hover>tbody>tr .option{ visibility: hidden;}
	.table-hover>tbody>tr:hover .option{ visibility: visible}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10"><h1 class="page-header">Kuesioner</h1></div>
		<div class="col-md-2"><a href="/kuesioner-new/new" class="btn btn-success btn-block" style="margin: 55px 0px 0px 0px"><span class="glyphicon glyphicon-plus"></span> Buat Kuesioner</a></div>
	</div>
  @if (count($kuesioners) == 0)
  <div class="none">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1>Data masih kosong...</h1>
        <p class="lead">silahkan buat data kuesioner</p>
      </div>
    </div>
  </div>
  @else
	<div id="kuesioner" class="table-responsive">
		<table class="table table-hover">
			<thead>
				<th>ID</th>
				<th>Nama Perusahaan</th>
				<th>Dibuat</th>
				<th>Edit Terakhir</th>
				<th></th>
			</thead>
	 		@foreach($kuesioners as $kuesioner)
	        <tr>
	        	<td>{{ $kuesioner->id }}</td>
	        	<td>{{ $kuesioner->kontak_nama }}</td>
	        	<td>{{ $kuesioner->created_at }}</td>
	        	<td>{{ $kuesioner->updated_at }}</td>
				<td>
					<div class="btn-group btn-group-sm option pull-right">
						<a href="/kuesioner-new/detail/{{ $kuesioner->id }}" class="btn btn-default btn-success"><span class="glyphicon glyphicon-check"></span> Detail</a>
						<a href="/kuesioner-new/edit/{{ $kuesioner->id }}" class="btn btn-default btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>
						<a href="/kuesioner-new/delete/{{ $kuesioner->id }}" class="btn btn-default btn-danger" type="button" onclick="return window.confirm('Data akan dihapus secara permanen.\nApakah Anda Yakin?')"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
					</div></td>
	        	</tr>
	    	@endforeach
		</table>
	</div>
  @endif
</div>
@stop
