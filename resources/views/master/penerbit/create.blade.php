@extends('layouts.index')

@section('content')
<form action="{{ action('Master\PenerbitController@store')}}" method="post">
	<div class="ibox">

		<div class="ibox-title">
			<h5>Tambah Penerbit Buku</h5>
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
					<label for="name" class="col-md-3">Nama Penerbit
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" placeholder="Penerbit Buku"
						required="" />
						@if ($errors->has('name'))
						<i class="text-danger">{{ $errors->first('name')  }}</i>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">No Telp Penerbit
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="text" name="phone" class="form-control" placeholder="No Telp. Penerbit Buku"
						required="" />
						@if ($errors->has('phone'))
						<i class="text-danger">{{ $errors->first('phone')  }}</i>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">E-Mail
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="text" name="email" class="form-control" placeholder="Email Penerbit Buku"
						required="" />
						@if ($errors->has('email'))
						<i class="text-danger">{{ $errors->first('email')  }}</i>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">Alamat
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						{{-- <input type="text" name="address" class="form-control" placeholder="Alamat Penerbit Buku"
						required="" /> --}}
						<textarea name="address" class="form-control" placeholder="Alamat Penerbit Buku"></textarea>
						@if ($errors->has('address'))
						<i class="text-danger">{{ $errors->first('address')  }}</i>
						@endif
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">Kota
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="text" name="city" class="form-control" placeholder="Kota Penerbit Buku"
						required="" />
						@if ($errors->has('city'))
						<i class="text-danger">{{ $errors->first('city')  }}</i>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="ibox-footer text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="{{ url('Master/Penerbit') }}" class="btn btn-default">Batal</a>
		</div>

	</div>
</form>
@endsection
