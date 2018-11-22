@extends('layouts.index')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="animated fadeInRightBig">
    {{-- <h3 class="font-bold">This is page content</h3>
    <div class="error-desc">
        You can create here any grid layout you want. And any variation layout you imagine:) Check out
        main dashboard and other site. It use many different layout.
        <br/><a href="index.html" class="btn btn-primary m-t">Dashboard</a>
    </div> --}}
    <h2> Selamat Datang {{ auth::user()->name }}</h2>
    Sistem Perpustakaan
</div>
@endsection
