<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Master\Buku;
use App\Models\Master\Member;
use App\Models\Master\Denda;
use App\Models\Log;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Keuangan;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $js = 'transaksi.js';
    public function index()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman transaksi";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $data = Transaksi::all();
        $denda = Denda::all()->first();
        // return $denda;
        return view('transaksi.index')->with([
            'title' => 'Transaksi',
            'js' => $this->js,
            'data' => $data,
            'denda' => $denda
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman tambah transaksi";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        // return "create";
        $denda = Denda::all()->first();
        $date = date('Y-m-d');

        //tgl kembali
        $tgl_kembali = date('Y-m-d', strtotime('+'.$denda->day.'day', strtotime($date)));

        // kode peminjam
        $date = date('Ymd');
        $month = date('m');
        $year = date('Y');
        $kode = DB::table('transaksis')
                        ->where('status','Pinjam')
                        ->whereYear('created_at', '=', $year)
                        ->whereMonth('created_at', '=', $month)
                        ->count();
        $no = $kode + 1;
        if ($kode == 0) {
            $nomor = "001/pinjam/".$month.'/'.$year;
        }elseif($kode < 10 ){
            $nomor = "00".$no.'/pinjam/'.$month.'/'.$year;
        }elseif($kode < 100 ){
            $nomor = "0".$no.'/pinjam/'.$month.'/'.$year;
        }else{
            $nomor = $no.'/pinjam/'.$month.'/'.$year;
        }

        $buku = Buku::all()->where('deleted_at','==','')->where('stok','>',0);
        $anggota = Member::all()->where('status','Active');
        return view('transaksi.create')->with([
            'title' => 'Tambah Transaksi',
            'js' => $this->js,
            'buku' => $buku,
            'anggota' => $anggota,
            'nomor' => $nomor,
            'tgl_kembali' => $tgl_kembali
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " menambah transaksi ";
        $Log['ip'] = url()->current();
        Log::create($Log);

        $data = $request->all();
        $data = Transaksi::create($data);
        if ($data) {
            $buku = Buku::all()->where('id',$request->input('idbuku'))->first();
            Buku::where('id',$request->input('idbuku'))->update(array(
                'stok' => $buku->stok - 1
            ));
        }
        return redirect('Transaksi/create')->with('success','Data Berhasil di simpan');
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

    public function kembali($id)
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " merubah status buku " ;
        $Log['ip'] = url()->current();
        Log::create($Log);
        // kode Kembali
        // return $id;
        $pecah = explode('-', $id);
        $id = $pecah[0];
        $bayar = $pecah[1];
        if ($bayar != 0) {
            $denda = Denda::all()->first();
            $keuangan['price'] = $bayar;
            $keuangan['note'] = 'Denda keterlambatan';
            $keuangan['iddenda'] = $denda->id;

            $simpan = Keuangan::create($keuangan);
        }
        $date = date('Ymd');
        $month = date('m');
        $year = date('Y');
        $kode = DB::table('transaksis')
                        ->where('status','Kembali')
                        ->whereYear('created_at', '=', $year)
                        ->whereMonth('created_at', '=', $month)
                        ->count();
        $no = $kode + 1;
        if ($kode == 0) {
            $nomor = "001/kembali/".$month.'/'.$year;
        }elseif($kode < 10 ){
            $nomor = "00".$no.'/kembali/'.$month.'/'.$year;
        }elseif($kode < 100 ){
            $nomor = "0".$no.'/kembali/'.$month.'/'.$year;
        }else{
            $nomor = $no.'/kembali/'.$month.'/'.$year;
        }
        // end
        $data = Transaksi::find($id);
        $buku = Buku::where('id',$data->idbuku)->first();
        Buku::where('id',$buku->id)->update(array(
            'stok' => $buku->stok + 1
        ));
        Transaksi::where('id',$id)->update(array(
            'status' => 'Kembali',
            'kodekembali'=>$nomor,
            'denda'=>0
        ));

        return redirect('Transaksi')->with('sucsess','Buku telah berhasil dikembalikan');
    }

    public function hilang($id)
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " menambahkan buku ke daftar buku hilang " ;
        $Log['ip'] = url()->current();
        Log::create($Log);

        // kode Kembali
        $pecah = explode('-', $id);
        $id = $pecah[0];
        $idbuku = $pecah[1];

        $date = date('Ymd');
        $month = date('m');
        $year = date('Y');
        $kode = DB::table('transaksis')
                        ->where('status','Hilang')
                        ->whereYear('created_at', '=', $year)
                        ->whereMonth('created_at', '=', $month)
                        ->count();
        $no = $kode - 1;
        if ($kode == 0) {
            $nomor = "001/hilang/".$month.'/'.$year;
        }elseif($kode < 10 ){
            $nomor = "00".$no.'/hilang/'.$month.'/'.$year;
        }elseif($kode < 100 ){
            $nomor = "0".$no.'/hilang/'.$month.'/'.$year;
        }else{
            $nomor = $no.'/hilang/'.$month.'/'.$year;
        }
        // end
        $data = Transaksi::find($id);
        $buku = Buku::where('id',$data->idbuku)->first();
        Buku::where('id',$buku->id)->update(array(
            'stok' => $buku->stok + 1
        ));
        Transaksi::where('id',$id)->update(array(
            'status' => 'Hilang',
            'kodekembali'=>$nomor,
            'denda'=>0
        ));

        $buku = Buku::all()->where('id',$idbuku);
        $denda = Denda::all()->first();

        $keuangan['price'] = $buku->price_new;
        $keuangan['note'] = 'Denda Buku Hilang';
        $keuangan['iddenda'] = $denda->id;

        $simpan = Keuangan::create($keuangan);

        return redirect('Transaksi')->with('sucsess','Buku telah berhasil dikembalikan');
    }
}
