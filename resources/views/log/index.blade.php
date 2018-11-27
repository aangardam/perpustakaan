@extends('layouts.index')

@section('content')

{{--table--}}
<div class="row">
    <div class="col-md-12">
        <div class="ibox" id="ibox-reporting">
            <div class="ibox-title ui-sortable-handle">
                <h5>{{ $title }}</h5>
                <div class="ibox-tools">
                   <!--  <a href="{{ url('Transaksi/create') }}" class="btn btn-primary btn-label">
                        <b><i class="fa fa-plus"></i></b>
                        Tambah Transaki
                    </a> -->
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
                        <table id="table-log" class="table table-condensed table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Tanggal </th>
                                    <th> User </th>
                                    <th> URL </th>
                                    <th> Pesan </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item => $key)
                                <tr>
                                    <td> {{ $item+1 }} </td>
                                    <td> {{ $key->created_at }} </td>
                                    <td> {{ $key->user }} </td>
                                    <td> {{ $key->ip }} </td>
                                    <td> {{ $key->message }} </td>
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
{{--/table--}}


@endsection
