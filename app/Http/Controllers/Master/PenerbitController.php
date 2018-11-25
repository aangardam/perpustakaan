<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Penerbit;
use Excel;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Log;
use Auth;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $js = 'master/penerbit.js';
    public function index()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman penerbit";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $penerbit = Penerbit::all();
        return view('master.penerbit.index')->with([
            'title' => 'Penerbit',
            'penerbit' => $penerbit,
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
        $Log['message'] = auth::user()->name . " Mengakses halaman tambah penerbit";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        return view('master.penerbit.create')->with([
            'title' => 'Tambah Penerbit Buku'
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
        $Log['message'] = auth::user()->name . " menambah data penerbit " . $request->input('name');
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $data = $request->all();
        Penerbit::create($data);
        return redirect('/Master/Penerbit/create')->with('success','Data berhasil ditambah');
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
        $Log['message'] = auth::user()->name . " Mengakses halaman edit penerbit";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $penerbit = Penerbit::find($id);
        return view('master.penerbit.edit')->with([
            'title' => 'Edit Penerbit Buku',
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
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " mengubah data penerbit " . $request->input('name');
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        Penerbit::where('id',$id)->update(array(
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'city' => $request->input('city')
        ));
        return redirect('/Master/Penerbit/'.$id.'/edit')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penerbit::find($id);
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " menghapus data penerbit " . $data->name;
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        Penerbit::find($id)->delete();
        return redirect('/Master/Penerbit')->with('success','Data berhasil dihapus');
    }

    public function Import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return redirect('Master/Penerbit')->with('error', 'Gagal Import File, File Harus Berbentuk .csv')
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
                            'name' => $value->nama,
                            'address' => $value->alamat,
                            'phone' => $value->telepon,
                            'email' => $value->email,
                            'city' => $value->kota
                        ];

                        // return $insert;
                    }
                }
                if(!empty($insert)){
                    // Kategori::create($insert);
                    $data = Buku::find($id);
                    $Log['user'] = auth::user()->name;
                    $Log['message'] = auth::user()->name . " export data penerbit ";
                    $Log['ip'] = url()->current();
                    $save = Log::create($Log);

                    DB::table('penerbits')->insert($insert);
                    return redirect('Master/Penerbit')->with('success', 'File berhasil di Import');
                }else{
                    return redirect('Master/Penerbit')->with('error', 'Gagal Import File, Isi File Tidak sesuai');
                }
        }else{
            return redirect('Master/Penerbit')->with('error', 'Gagal Import File, File Tidak Terbaca');
        }
    }
}
