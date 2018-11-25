<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Member;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Log;
use Auth;

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
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman member";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

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
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman tambah member";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);
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
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " menambah data member " . $request->input('name');
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $data = $request->all();
        $pecah = explode('-', $request->tgl_lahir );
        $tgl = $pecah[0];
        $bln = $pecah[1];
        $thn = $pecah[2];
        $data['tgl_lahir'] = $thn.'-'.$bln.'-'.$tgl;
        if($request->file('foto')){
            $ext = $request->file('foto')->getClientOriginalExtension();
            $foto = "member_".$request->input('name').'_'.date("YmdHis").strtolower('.'.$ext);
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
        $data = Member::find($id);

        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " melihat detail member " . $data->name ;
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        // $data = Member::find($id);
        return view('master.member.detail')->with([
            'title' => 'Detail Anggota',
            'member' => $data
        ]);
        
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
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " mengubah data member " . $request->input('name') ;
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        // $tgl1 = date('Y-m-d');
        // $expired = date('Y-m-d', strtotime('+1 year', strtotime($tgl1)));
        if($request->has('foto')){
            $ext = $request->file('foto')->getClientOriginalExtension();
            $foto = "member_".$request->input('name').'_'.date("YmdHis").strtolower('.'.$ext);
            $dest = "foto/member/";
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

    public function active($id)
    {
        $data = Member::find($id);
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " meng-activkan member " . $data->name ;
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $tgl1 = date('Y-m-d');
        $expired = date('Y-m-d', strtotime('+1 year', strtotime($tgl1)));

        Member::where('id',$id)->update(array(
            'status' => 'Active',
            'expired' => $expired
        ));
        return redirect('Master/Anggota')->with('success','Anggota berhasil di activkan');
    }

    public function print($id)
    {
        $member = Member::find($id);

        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " export pdf data " . $member->name ;
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        
       // return $member;
       $pdf = PDF::loadView('master.member.pdf', compact('member'));
       // $pdf->save(storage_path().'_filename.pdf');
       return $pdf->download('kartu_anggota.pdf');
    }
}
