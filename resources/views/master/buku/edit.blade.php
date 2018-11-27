@extends('layouts.index')

@section('content')
<form action="{{ action('Master\BukuController@update', ['id' => $buku->id]) }}" method="post">
	<div class="ibox">

		<div class="ibox-title">
			<h5>Tambah Buku</h5>
		</div>
		<div class="ibox-content">
			{{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="id" value="{{ $buku->id  }}" />
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
					<label for="name" class="col-md-3">Kode Buku
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="text" name="kode" class="form-control" placeholder="Kode Buku"
						required="" value="{{ $buku->kode }}"/>
						@if ($errors->has('kode'))
						<i class="text-danger">{{ $errors->first('kode')  }}</i>
						@endif
					</div>
				</div>
            </div>
            <div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">Judul Buku
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="text" name="name" class="form-control" placeholder="Judul Buku"
						required="" value="{{ $buku->name }}"/>
						@if ($errors->has('name'))
						<i class="text-danger">{{ $errors->first('name')  }}</i>
						@endif
					</div>
				</div>
            </div>
            <div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">Kategori Buku
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<select name="idkategori" id="idkategori" class="form-control idkategori" required>
                            <option value="" selected="" disabled> - Pilih Kategori - </option>
                            @foreach ($kategori as $item)
                                {{-- <option value="{{ $item->id }}"> {{ $item->name }} </option>     --}}
                                @if($buku->idkategori == $item->id)
                                    <option value="{{ $item->id }}" selected=""> {{ $item->name}} </option>
                                @else
                                    <option value="{{ $item->id }}" > {{ $item->name}} </option>
                                @endif
                            @endforeach
                        </select>
						@if ($errors->has('pengarang'))
						<i class="text-danger">{{ $errors->first('pengarang')  }}</i>
						@endif
					</div>
				</div>
            </div>

            <div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">Pengarang Buku
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="text" name="pengarang" class="form-control" placeholder="Pengarang Buku"
						required="" value="{{ $buku->pengarang }}"/>
						@if ($errors->has('pengarang'))
						<i class="text-danger">{{ $errors->first('pengarang')  }}</i>
						@endif
					</div>
				</div>
            </div>
            <div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">Penerbit Buku
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<select name="idpenerbit" id="idpenerbit" class="form-control idpenerbit" required>
                            <option value="" selected="" disabled> - Pilih Penerbit - </option>
                            @foreach ($penerbit as $item)
                                {{-- <option value="{{ $item->id }}"> {{ $item->name }} </option>     --}}
                                @if($buku->idpenerbit == $item->id)
                                <option value="{{ $item->id }}" selected=""> {{ $item->name}} </option>
                            @else
                                <option value="{{ $item->id }}" > {{ $item->name}} </option>
                            @endif
                            @endforeach
                        </select>
						@if ($errors->has('penerbit'))
						<i class="text-danger">{{ $errors->first('penerbit')  }}</i>
						@endif
					</div>
				</div>
            </div>
            <div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">Stok Buku
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="number" name="stok" class="form-control" placeholder="stok Buku"
						required="" value="{{ $buku->stok }}"/>
						@if ($errors->has('stok'))
						<i class="text-danger">{{ $errors->first('stok')  }}</i>
						@endif
					</div>
				</div>
            </div>
            <div class="form-group">
				<div class="row">
					<label for="name" class="col-md-3">Price Buku
						<small class="text-danger">*</small>
					</label>
					<div class="col-md-9">
						<input type="number" name="price" class="form-control" placeholder="price Buku"
						required="" value="{{ $buku->price }}"/>
						@if ($errors->has('price'))
						<i class="text-danger">{{ $errors->first('price')  }}</i>
						@endif
					</div>
				</div>
            </div>
			
		</div>
		<div class="ibox-footer text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="{{ url('Master/Buku') }}" class="btn btn-default">Batal</a>
		</div>

	</div>
</form>
@endsection
