@extends('layouts.listbook')
<style>

</style>
@section('content')
<div class="animated fadeInRightBig">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> List Buku </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item => $value)
                                <tr class="gradeX">
                                    <td>{{ $item+1 }}</td>
                                    <td>{{ $value->kode }}</td>
                                    <td> {{ $value->name }} </td>
                                    <td>{{ $value->pengarang }}</td>
                                    <td>{{ $value->kategori->name }}</td>
                                    <td>{{ $value->penerbit->name }}</td>
                                    <td align="right">{{ number_format($value->stok) }}</td>
                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
