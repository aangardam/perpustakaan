@extends('layouts.index')

@section('content')
<form action="{{ action('Master\DendaController@update', ['id' => $denda->id]) }}" method="post">
	<div class="ibox">
		<div class="ibox-title">
			<h5>Edit denda</h5>
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
			<input type="hidden" name="id" value="{{ $denda->id  }}" />

			<div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3"> Biaya  <small class="text-danger">*</small></label>
					<div class="col-md-9">
						<input type="text" name="price" class="form-control" placeholder="Besarnya biaya denda"
						value="{{ $denda->price }}" required="" />
					</div>
				</div>
			</div>
		</div> 
		<div class="ibox-footer text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="{{ url('Master/Denda') }}" class="btn btn-default">Batal</a>
		</div>
	</div>
</form>
@endsection
