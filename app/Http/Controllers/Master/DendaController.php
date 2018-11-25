<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Denda;
use App\Models\Log;
use Auth;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $js = 'master/denda.js';

    public function index()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman denda";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $denda = Denda::all();
        return view('master.denda.index')->with([
            'title' => 'Denda',
            'js' => $this->js,
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
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman edit denda";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $denda = Denda::find($id);
        return view('master.denda.edit')->with([
            'title' => 'Edit Denda',
            'denda' => $denda
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
        $Log['message'] = auth::user()->name . " mengubah data denda";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        Denda::where('id',$id)->update(array(
            'price' => $request->input('price'),
            'day' => $request->input('day')
        ));
        return redirect('/Master/Denda/'.$id.'/edit')->with('success','Data Berhasil diubah');
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
