@extends('layouts.index')

@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="ibox">
			<div class="ibox-content product-box">
				<div class="product-desc">
					<small class="text-muted"> Master </small>
                    <a href="{{ url('Master/Buku') }}" class="product-name">Buku</a>
					<div class="small m-t-xs text-right">
						<i class="fa fa-book fa-3x "></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="ibox">
			<div class="ibox-content product-box">
				<div class="product-desc">
					<small class="text-muted"> Master </small>
                    <a href="{{ url('Master/Denda') }}" class="product-name">Denda</a>
					<div class="small m-t-xs text-right">
						<i class="fa fa-money fa-3x "></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="ibox">
			<div class="ibox-content product-box">
				<div class="product-desc">
					<small class="text-muted"> Master </small>
                    <a href="{{ url('Master/Kategori')}}" class="product-name">Kategori</a>
					<div class="small m-t-xs text-right">
						<i class="fa fa-flag fa-3x "></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-content product-box">
                    <div class="product-desc">
                        <small class="text-muted"> Master </small>
                        <a href="{{ url('Master/Anggota') }}" class="product-name">Member</a>
                        <div class="small m-t-xs text-right">
                            <i class="fa fa-users fa-3x "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-content product-box">
                    <div class="product-desc">
                        <small class="text-muted"> Master </small>
                        <a href="{{ url('Master/Penerbit')}}" class="product-name">Penerbit</a>
                        <div class="small m-t-xs text-right">
                            <i class="fa fa-file-text-o fa-3x "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-content product-box">
                    <div class="product-desc">
                        <small class="text-muted"> Master </small>
                        <a href="" class="product-name">Pengarang</a>
                        <div class="small m-t-xs text-right">
                            <i class="fa fa-user fa-3x "></i>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
