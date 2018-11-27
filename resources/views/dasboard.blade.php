@extends('layouts.index')

@section('content')


<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Total</span>
                    <h5>Total Buku</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $buku }}</h1>
                    {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                    <small>Total buku</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Dipinjam</span>
                    <h5>Total Buku</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $trans['buku_pinjam'] }}</h1>
                    {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                    <small>Total buku yang dipinjam</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Hilang</span>
                    <h5>Total Buku</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> {{ $trans['buku_hilang'] }}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>Total buku hilang</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Total</span>
                    <h5>Total Anggota</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $member['all'] }}</h1>
                    {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                    <small>Total anggota</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Active</span>
                    <h5>Total Anggota</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $member['active'] }}</h1>
                    {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                    <small>Total anggota active</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">In Active</span>
                    <h5>Total Anggota</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> {{ $member['expired'] }}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>Total anggota yang tidak active</small>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
