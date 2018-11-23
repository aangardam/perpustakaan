@extends('layouts.index')

@section('content')
<form action="{{ action('Master\MemberController@update', ['id' => $member->id]) }}" method="post" enctype="multipart/form-data" >
	<div class="ibox">

		<div class="ibox-title">
			<h5>Tambah Anggota</h5>
		</div>
		<div class="ibox-content">
			{{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="id" value="{{ $member->id  }}" />
			{{-- <input type="hidden" name="expired" class="form-control" placeholder="Kategori Buku" required="" readonly="" value="{{ $expired }}"/> --}}
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
					<label for="name" class="col-md-2">Nomor Anggota
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-4">
						<input type="text" name="nomor" class="form-control" placeholder="Kategori Buku" required="" readonly="" value="{{ $member->nomor }}"/>
						@if ($errors->has('nomor'))
						<i class="text-danger">{{ $errors->first('nomor')  }}</i>
						@endif
					</div>

					<label for="name" class="col-md-2">Nama Anggota
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-4">
						<input type="text" name="name" class="form-control" placeholder="Nama Anggota Baru" required="" value="{{ $member->name }}"/>
						@if ($errors->has('name'))
						<i class="text-danger">{{ $errors->first('name')  }}</i>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-2">Email Anggota
					</label>
					<div class="col-md-4">
						<input type="text" name="email" class="form-control" placeholder="Email Anggota Baru" value="{{ $member->email }}"/>
						@if ($errors->has('email'))
						<i class="text-danger">{{ $errors->first('email')  }}</i>
						@endif
					</div>

					<label for="name" class="col-md-2">No Telp/HP
					</label>
					<div class="col-md-4">
						<input type="text" name="phone" class="form-control" placeholder="No Telp/HP" value="{{ $member->phone }}"/>
						@if ($errors->has('phone'))
						<i class="text-danger">{{ $errors->first('phone')  }}</i>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-2">Tempat Lahir
					</label>
					<div class="col-md-4">
						<input type="text" name="tmpt_lahir" class="form-control" placeholder="Tempat lahir Anggota Baru" value="{{ $member->tmpt_lahir }}"/>
						@if ($errors->has('tmpt_lahir'))
						<i class="text-danger">{{ $errors->first('tmpt_lahir')  }}</i>
						@endif
					</div>

					<label for="name" class="col-md-2">Tanggal Lahir
					</label>
					<div class="col-md-4" id="data_1">
						<input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{ $member->tgl_lahir }}"/>
						@if ($errors->has('tgl_lahir'))
						<i class="text-danger">{{ $errors->first('tgl_lahir')  }}</i>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-2">Alamat Anggota
					</label>
					<div class="col-md-4">
						<textarea name="address" id="address" class="form-control"> {{ $member->address}}</textarea>
						@if ($errors->has('address'))
						<i class="text-danger">{{ $errors->first('address')  }}</i>
						@endif
					</div>

					<label for="name" class="col-md-2">Foto
					</label>
					<div class="col-md-4">
						<input type="file" name="foto" class="form-control" placeholder="No Telp/HP" />
						@if ($errors->has('foto'))
						<i class="text-danger">{{ $errors->first('foto')  }}</i>
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
