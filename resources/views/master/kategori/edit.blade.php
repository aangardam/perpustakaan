@extends('layouts.index')

@section('content')
<form action="{{ action('Master\KategoriController@update', ['id' => $kategori->id]) }}" method="post">
	<div class="ibox">
		<div class="ibox-title">
			<h5>Edit Kategori Buku</h5>
		</div>
		<div class="ibox-content">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			@if (session('success'))
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ session('success') }}
			</div>
			@endif
			<input type="hidden" name="id" value="{{ $kategori->id  }}" />

			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3"> Name  <small class="text-danger">*</small></label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" placeholder="Kategori Buku"
						value="{{ $kategori->name }}" required="" />
					</div>
				</div>
			</div>
		</div> 
		<div class="ibox-footer text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="{{ url('Master/Kategori') }}" class="btn btn-default">Batal</a>
		</div>
	</div>
</form>
@endsection
