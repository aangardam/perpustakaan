<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Kategori;
use Excel;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Log;
use Auth;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // private $js = 'master/denda.js';
    private $js = 'master/kategori.js';
    public function index()
    {
        // dd(url()->current());
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman kategori";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);
        $kategori = Kategori::all();
        return view('master.kategori.index')->with([
            'title' => 'Kategori',
            'kategori' => $kategori,
            'js' => $this->js
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
        $Log['message'] = auth::user()->name . " Mengakses halaman tambah kategori";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        return view('master.kategori.create')->with([
            'title' => 'Tambah Kategori Buku'
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
        $Log['message'] = auth::user()->name . " menambah kategori " . $request->input('name');
        $Log['ip'] = url()->current();
        Log::create($Log);

        $data = $request->all();
        Kategori::create($data);
        return redirect('Master/Kategori/create')->with('success','Barhasil tambah data');
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
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman edit kategori";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $data = Kategori::find($id);
        return view('master.kategori.edit')->with([
            'title' => 'Edit Kategori',
            'kategori' => $data
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
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " mengubah kategori " . $request->input('name');
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        Kategori::where('id',$id)->update(array(
            'name' => $request->input('name')
        ));
        return redirect('Master/Kategori/'.$id.'/edit' )->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $Log['user'] = auth::user()->name;
        // $Log['message'] = auth::user()->name . " menghapus kategori " . $id;
        // $Log['ip'] = url()->current();
        // $save = Log::create($Log);

        $data = Kategori::find($id);
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " menghapus kategori " . $data->name;
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        Kategori::find($id)->delete();
        return redirect('Master/Kategori')->with('success','Data berhasil dihapus');
    }

    public function Import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return redirect('Master/Kategori')->with('error', 'Gagal Import File, File Harus Berbentuk .csv')
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
                            'name' => $value->kategori
                        ];

                        // return $insert;
                    }
                }
                if(!empty($insert)){
                    // Kategori::create($insert);
                    $Log['user'] = auth::user()->name;
                    $Log['message'] = auth::user()->name . " export data kategori";
                    $Log['ip'] = url()->current();
                    $save = Log::create($Log);

                    DB::table('kategoris')->insert($insert);
                    return redirect('Master/Kategori')->with('success', 'File berhasil di Import');
                }else{
                    return redirect('Master/Kategori')->with('error', 'Gagal Import File, Isi File Tidak sesuai');
                }
        }else{
            return redirect('Master/Kategori')->with('error', 'Gagal Import File, File Tidak Terbaca');
        }
    }
}
