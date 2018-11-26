@extends('layouts.index')

@section('content')
<form action="{{ action('TransaksiController@store')}}" method="post">
	<div class="ibox">

		<div class="ibox-title">
			<h5>Tambah Transaksi</h5>
		</div>
		<div class="ibox-content">
			{{ csrf_field() }}
			<input type="hidden" name="kodepinjam" value="{{ $nomor }}">
			<input type="hidden" name="tgl" value="{{ $tgl_kembali }}">
			<input type="hidden" name="status" value="Pinjam">
			@if (session('success'))
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ session('success') }}
			</div>
			@endif
			@if (session('error'))
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ session('error') }}
			</div>
			@endif
			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-2">ID Anggota
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-10">
						<select id="idmember" name="idmember" class="form-control">
							<option value=""> Pilih Anggota </option>
							@foreach($anggota as $key=>$value)
								<option value="{{ $value->id }}"> {{ $value->nomor}} - {{ $value->name}} </option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-2">Buku
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-10">
						<select id="idbuku" name="idbuku" class="form-control">
							<option value=""> Pilih Buku </option>
							@foreach($buku as $key=>$value)
								<option value="{{ $value->id }}"> {{ $value->kode}} - {{ $value->name}} </option>
							@endforeach
						</select>
						
					</div>
				</div>
			</div>
		</div>
		<div class="ibox-footer text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="{{ url('Transaksi') }}" class="btn btn-default">Batal</a>
		</div>

	</div>
</form>
@endsection
