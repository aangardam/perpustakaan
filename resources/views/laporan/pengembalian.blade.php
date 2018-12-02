@extends('layouts.index')

@section('content')

{{--table--}}
<div class="row">
    <div class="col-md-12">
        <div class="ibox" id="ibox-reporting">
            <div class="ibox-title ui-sortable-handle">
                <h5>{{ $title }}</h5>
                <div class="ibox-tools">
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
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th> No. Anggota </th>
                                    <th>Anggota </th>
                                    <th> Buku </th>
                                    <th> Status </th>
                                    <th> Denda </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $tanggal = date('Y-m-d');
                                ?>
                                @foreach ($data as $item => $key)
                                <tr>
                                    <td>{{ $item+1 }} </td>
                                    <td>{{ $key->kodekembali }} </td>
                                    <td> {{ $key->created_at }} </td>
                                     <td> {{ $key->member->nomor }} </td>
                                    <td> {{ $key->member->name }} </td>
                                    <td> {{ $key->buku->name }} </td>
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
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    {{-- <div class="ibox-footer no-overflow">
                        <div class="pull-right">
                            <button class="btn btn-primary" id="export-excel2"><i class="fa fa-file-excel-o"></i> Export
                                Excel
                            </button> 
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--/table--}}


@endsection
