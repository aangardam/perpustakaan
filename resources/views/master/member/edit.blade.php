@extends('layouts.index')

@section('content')
<form action="{{ action('Master\MemberController@store')}}" method="post">
	<div class="ibox">

		<div class="ibox-title">
			<h5>Tambah Anggota</h5>
		</div>
		<div class="ibox-content">
			{{ csrf_field() }}
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
					<label for="name" class="col-md-3">Nama Kategori
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" placeholder="Kategori Buku"
						required="" />
						@if ($errors->has('name'))
						<i class="text-danger">{{ $errors->first('name')  }}</i>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="ibox-footer text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="{{ route('Master/Anggota') }}" class="btn btn-default">Batal</a>
		</div>

	</div>
</form>
@endsection
