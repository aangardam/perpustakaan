@extends('layouts.index')

@section('content')

{{--filter--}}
{{-- <form id="filter" name="filter" novalidate>
    <div class="row">
        <div class="col-md-12">
            <div class="ibox" id="ibox-advanced-filter">
                <div class="ibox-title ui-sortable-handle">
                    <h5><i class="fa fa-filter"></i> Advanced Filter</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link ui-sortable">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shift">
                                    Tanggal
                                </label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info" id="shortcut-time-filter">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                    <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                    placeholder="Tanggal Mulai" value="{{ date('d/m/Y') }}"/>
                                    <span class="input-group-addon">s/d</span>
                                    <input type="text" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                                    placeholder="Tanggal Akhir" value="{{ date('d/m/Y') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gerbang">
                                    Status 
                                </label>
                                <select name="status" id="status" class="form-control" style="width: 100% !important;">
                                    <option value="">-- Status Buku --</option>
                                    <option> Dipinjam </option>
                                    <option> Dikembalikan </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <br />
                                <button type="button" class="btn btn-primary btn-block btn-sm" id="button-filter">
                                    <i class="fa fa-table"></i> Submit
                                </button>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <button type="button" class="btn btn-success btn-block btn-sm" id="refresh-table">
                                <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form> --}}
{{--/advance filter--}}

{{--table--}}
<div class="row">
    <div class="col-md-12">
        <div class="ibox" id="ibox-reporting">
            <div class="ibox-title ui-sortable-handle">
                <h5>Transaksi</h5>
                <div class="ibox-tools">
                    <a href="{{ url('Transaksi/create') }}" class="btn btn-primary btn-label">
                        <b><i class="fa fa-plus"></i></b>
                        Tambah Transaki
                    </a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="ibox-content" style="">
                    <div class="sk-spinner sk-spinner-double-bounce">
                        <div class="sk-double-bounce1"></div>
                        <div class="sk-double-bounce2"></div>
                    </div>
                    <div id="table-container" class="margin-md table-responsive">
                        <table id="table-transaksi" class="table table-condensed table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th>Tanggal</th>
                                    <th> No. Anggota </th>
                                    <th>Anggota </th>
                                    <th> Buku </th>
                                    <th> Tgl Kembali </th>
                                    <th> Status </th>
                                    <th> Denda </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $tanggal = date('Y-m-d');
                                ?>
                                @foreach ($data as $item => $key)
                                <tr>
                                    <td>{{ $item+1 }} </td>
                                    <td> {{ $key->created_at }} </td>
                                     <td> {{ $key->member->nomor }} </td>
                                    <td> {{ $key->member->name }} </td>
                                    <td> {{ $key->buku->name }} </td>
                                    <td> {{ $key->tgl }} </td>
                                    <td> {{ $key->status }} </td>
                                    @if($key->tgl <= $tanggal  )
                                        <?php
                                          $datetime1 = new DateTime($tanggal);
                                          $datetime2 = new DateTime($key->tgl);
                                          $difference = $datetime1->diff($datetime2);
                                          $denda = $difference->days * $denda->price;
                                        ?>
                                        <td align="right">Rp. {{ number_format($denda) }} </td>
                                    @else
                                        <td align="right"> {{ $key->denda }} </td>
                                    @endif

                                    <td>
                                        @if($key->status == 'Pinjam')
                                        <a href="{{ url('transaksi/kembali/'.$key->id) }}" class="btn btn-sm btn-success"> 
                                            <i class="fa fa-recycle"></i> Kembali
                                        </a> 
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="ibox-footer no-overflow">
                        <div class="pull-right">
                            <button class="btn btn-primary" id="export-excel2"><i class="fa fa-file-excel-o"></i> Export
                                Excel
                            </button> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
{{--/table--}}


@endsection
