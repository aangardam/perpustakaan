@extends('layouts.index')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="widget-head-color-box navy-bg p-lg text-center">
            <div class="m-b-md">
                <h2 class="font-bold no-margins">
                    {{ $member->name }}
                </h2>
            </div>
            {{-- <img src="{{ asset('images/jasamarga-logo-400.png') }}" width="150" class="img-circle m-b-md"
            alt="profile"> --}}
            @if ($member->foto == '')
            <img src="{{ asset('img/image.png') }}" width="150" class="img-circle m-b-md" alt="profile">
            @else
            <img src="{{ asset($member->foto) }}" width="150" class="img-circle m-b-md" alt="profile">
            @endif

        </div>
        <div class="widget-text-box">
            <center>
                <h4 class="media-heading">{{ $member->name }}</h4><p>{{ $member->email }} </p>
            </center>

            {{-- <div class="text-right">
                <a class="btn btn-danger btn-label btn-block" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form-profile').submit();">
                <b>
                    <i class="fa fa-power-off"></i>
                </b> Logout
            </a>
            <form id="logout-form-profile" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div> --}}
    </div>
</div>
<div class="col-lg-8">
    <div class="ibox">
        <div class="ibox-title">
            <h5>Detail Anggota</h5>
        </div>
        <div class="ibox-content">
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-md-3 ">Nama </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ $member->name }}"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-md-3 ">No Telp/HP </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ $member->phone }}"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-md-3 ">Tempat Lahir </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ $member->tmpt_lahir }}"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-md-3 ">Tanggal Lahir </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ $member->tgl_lahir }}"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-md-3 ">Alamat </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ $member->address }}"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-md-3 ">Expired </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ $member->expired }}"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-md-3 ">Status </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ $member->status }}"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="pull-right">
                        <a href="{{ url('Master/Anggota/Print/'.$member->id) }}" class="btn btn-sm btn-success"> 
                            <i class="glyphicon glyphicon-print"></i> EXPORT PDF
                        </a>
                        &nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection