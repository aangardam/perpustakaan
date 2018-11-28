<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Member;
use Illuminate\Support\Facades\DB;
use App\Models\Log;
use App\Models\Master\Buku;
use App\Models\Transaksi;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $js = 'log/log.js';
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman home";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $date = date('Y-m-d');
        $data = Member::where('expired' , '<=', $date)->update(array(
            'status' => 'expired'
        ));
        
        $title= "Home";
        return view('home',compact('title'));
    }

    public function log()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman log activity";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $data = Log::all();
        return view('log.index')->with([
            'title' => 'Log Activity',
            'data' => $data,
            'js' => $this->js
        ]);
    }

    public function dasboard()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman dasboard";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        // $buku['total'] = Buku::all()->count();
        $buku = DB::table('bukus')
                    ->sum('stok');
        
        $trans['buku_hilang'] = Transaksi::where('status','Hilang')->count();
        $trans['buku_pinjam'] = Transaksi::where('status','Pinjam')->count();

        $member['all'] = Member::all()->count();
        $member['active'] = Member::where('status','active')->count();
        $member['expired'] = Member::where('status','expired')->count();
        // return  $member['all'];
        return view('dasboard')->with([
            'title' => 'Dasboard',
            'buku' => $buku,
            'trans' => $trans,
            'member' => $member
        ]);
    }
    
}
