<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Log;
use App\Models\Absensi;
use Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $js = [
        'peminjaman' => 'laporan/peminjaman.js',
        'pengembalian' => 'laporan/pengembalian.js',
        'hilang' => 'laporan/hilang.js',
    ];

    public function Peminjaman()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " mengakses halaman Laporan Peminjaman " ;
        $Log['ip'] = url()->current();
        Log::create($Log);

        $data = Transaksi::all()->where('status','Pinjam');
        
        return view('laporan.peminjaman')->with([
            'title' => 'Laporan Buku yang dipinjam',
            'js' => $this->js['peminjaman'],
            'data' => $data
        ]);
    }

    public function Pengembalian()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " mengakses halaman Laporan Pengembalian " ;
        $Log['ip'] = url()->current();
        Log::create($Log);

        $data = Transaksi::all()->where('status','Kembali');
        return view('laporan.pengembalian')->with([
            'title' => 'Laporan Buku yang sudah dikembalikan',
            'js' => $this->js['pengembalian'],
            'data' => $data
        ]);
    }

    public function Hilang()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " mengakses halaman Laporan buku hilang " ;
        $Log['ip'] = url()->current();
        Log::create($Log);

        $data = Transaksi::all()->where('status','Hilang');
        return view('laporan.hilang')->with([
            'title' => 'Laporan Buku yang hilang',
            'js' => $this->js['hilang'],
            'data' => $data
        ]);
    }

    public function Pengunjung()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " mengakses halaman Laporan pengunjung " ;
        $Log['ip'] = url()->current();
        Log::create($Log);

        $data = Absensi::all();
        return view('laporan.pengunjung')->with([
            'title' => 'Laporan Pengunjung Perpus',
            'js' => $this->js['hilang'],
            'data' => $data
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
