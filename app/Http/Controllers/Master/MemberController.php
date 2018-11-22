<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Member;
use Illuminate\Support\Facades\DB;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $js = 'master/member.js';
    public function index()
    {
        $member = Member::all();
        return view('Master.member.index')->with([
            'title' => 'Anggota',
            'member' => $member,
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
        // expired
        $tgl1 = date('Y-m-d');
        $expired = date('Y-m-d', strtotime('+1 year', strtotime($tgl1)));

        // no_anggota
        $date = date('Ymd');
        $month = date('m');
        $year = date('Y');
        $member = DB::table('members')
                        ->whereYear('created_at', '=', $year)
                        ->whereMonth('created_at', '=', $month)
                        ->count();
        $no = $member + 1;
        if ($member == 0) {
            $nomor = $date."001";
        }elseif($member < 10 ){
            $nomor = $date."00".$no;
        }elseif($member < 100 ){
            $nomor = $date."0".$no;
        }else{
            $nomor = $date.$no;
        }
        // $member = Member::cout();
        // return $nomor;
        return view('Master.member.create')->with([
            'nomor' => $nomor,
            'expired' => $expired,
            'title' => 'Tambah Anggota',
            'js' => $this->js
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
        if($request->file('foto')){
            $ext = $request->file('foto')->getClientOriginalExtension();
            $foto = "staff_".$request->input('name').'_'.date("YmdHis").strtolower('.'.$ext);
            $dest = "foto/member/";
            $request->file('foto')->move($dest,$foto);
            $data['foto'] = $dest.$foto;
        }
        $data = Member::create($data);
        return redirect('Master/Anggota/create')->with('success','Data berhasil ditambah');
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
        $member = Member::find($id);
        return view('Master.member.edit')->with([
            'title' => 'Edit Member',
            'js' => $this->js,
            'member' => $member
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
        // $tgl1 = date('Y-m-d');
        // $expired = date('Y-m-d', strtotime('+1 year', strtotime($tgl1)));
        if($request->has('foto')){
            $ext = $request->file('foto')->getClientOriginalExtension();
            $foto = "staff_".$request->input('name').'_'.date("YmdHis").strtolower('.'.$ext);
            $dest = "fotos/staff/";
            $request->file('foto')->move($dest,$foto);
            $name_foto = $dest.$foto;

            Member::where('id',$id)->update(array(
                'name' => $request->name,
                'foto' => $name_foto,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'tgl_lahir' => $request->tgl_lahir,
                'tmpt_lahir' => $request->tmpt_lahir
                
                
            ));
        }else{
            Member::where('id',$id)->update(array(
                'name' => $request->name,
                'nomor' => $request->nomor,
                'foto' => $name_foto,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'tgl_lahir' => $request->tgl_lahir,
                'tmpt_lahir' => $request->tmpt_lahir
                
            ));
        }
        return redirect('Master/Anggota/'.$id.'/edit')->with('success', 'Data berhasil di ubah');
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
