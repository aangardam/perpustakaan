@extends('layouts.index')
<style>

</style>
@section('content')
<div class="animated fadeInRightBig">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Master Buku </h5>
                    <div class="ibox-tools">
                        <a href="{{ url('Master/Buku/create') }}" class="btn btn-primary btn-label">
                            <b><i class="fa fa-plus"></i></b>
                            Tambah Buku
                        </a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
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
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="table-buku" class="table table-condensed table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Penerbit</th>
                                    <th>Stok </th>
                                    <th> Harga Buku</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($buku as $item => $value)
                                <tr class="gradeX">
                                    <td>{{ $item+1 }}</td>
                                    <td>{{ $value->kode }}</td>
                                    <td>
                                        <a href="{{ url('Master/Buku/'.$value->id.'/edit') }}"> {{ $value->name }} </a>
                                    </td>
                                    <td>{{ $value->pengarang }}</td>
                                    <td>{{ $value->kategori->name }}</td>
                                    <td>{{ $value->penerbit->name }}</td>
                                    <td align="right">{{ number_format($value->stok) }}</td>
                                     <td align="right">{{ number_format($value->price) }}</td>
                                    <td>
                                        <form id="delete-{{$value->id}}"
                                            action="{{ action('Master\BukuController@destroy', ['id' => $value->id]) }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>

                                        <a class="btn btn-sm btn-danger" onclick="remove({{$value->id}})"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-left">
                            <form id="target" action="{{ url('/Master/Buku/Import') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <input type="file" id="file" name="file" style="visibility: hidden;" />
                            </form>
                            <a href="#" onclick="document.getElementById('file').click(); return false;" /><button class="btn btn-primary btn-label" style="padding: 0px 5px 0px 5px;color:"><b><i class="fa fa-upload"></i></b> Import Data</button> </a>
                            <a href="{{ asset('contoh_data/bukus.csv') }}" style="padding: 0px 5px 0px 5px">
                                <button class="btn btn-success btn-label" style="padding: 0px 5px 0px 5px;color:"><b><i class="fa fa-download"></i></b> Contoh Data</button>
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
