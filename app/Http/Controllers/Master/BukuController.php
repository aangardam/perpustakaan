<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Buku;
use App\Models\Master\Kategori;
use App\Models\Master\Penerbit;
use Excel;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $js = 'master/buku.js';

    public function index()
    {
        $buku = Buku::all();
        return view('Master.buku.index')->with([
            'title' => 'Buku',
            'js' => $this->js,
            'buku' =>$buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('Master.buku.create')->with([
            'title' => 'Tambah Buku',
            'js' => $this->js,
            'kategori' => $kategori,
            'penerbit' => $penerbit
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
        $data = $request->all();
        Buku::create($data);
        return redirect('Master/Buku/create')->with('success','Data Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Buku::find($id);
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('Master.buku.edit')->with([
            'title' => 'Edit Buku',
            'js' => $this->js,
            'buku' => $data,
            'kategori' => $kategori,
            'penerbit' => $penerbit
        ]);
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
        Buku::where('id',$id)->update(array(
            'kode' => $request->input('kode'),
            'name' => $request->input('name'),
            'idkategori' => $request->input('idkategori'),
            'pengarang' => $request->input('pengarang'),
            'idpenerbit' => $request->input('idpenerbit'),
            'stok' => $request->input('stok')
        ));
        return redirect('Master/Buku/'.$id.'/edit')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Buku::find($id)->delete();
        return redirect('Master/Buku')->with('success','Data berhasil dihapus');
    }

    public function Import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return redirect('Master/Buku')->with('error', 'Gagal Import File, File Harus Berbentuk .csv')
                ->withErrors($validator)
                ->withInput();
        }

        if(Input::hasFile('file')){
            $path = Input::file('file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
                // return $data;
                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'kode' => $value->kode,
                            'name' => $value->judul,
                            'idkategori' => $value->kategori,
                            'idpenerbit' => $value->penerbit,
                            'pengarang' => $value->pengarang,
                            'stok' => $value->stok
                        ];

                        // return $insert;
                    }
                }
                if(!empty($insert)){
                    // Kategori::create($insert);
                    DB::table('bukus')->insert($insert);
                    return redirect('Master/Buku')->with('success', 'File berhasil di Import');
                }else{
                    return redirect('Master/Buku')->with('error', 'Gagal Import File, Isi File Tidak sesuai');
                }
        }else{
            return redirect('Master/Buku')->with('error', 'Gagal Import File, File Tidak Terbaca');
        }
    }
}
