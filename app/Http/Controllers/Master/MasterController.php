<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;
use Auth;

class MasterController extends Controller
{
    public function index()
    {
        $Log['user'] = auth::user()->name;
        $Log['message'] = auth::user()->name . " Mengakses halaman Master";
        $Log['ip'] = url()->current();
        $save = Log::create($Log);

        $title = "Master";
        return view('master.index',compact('title'));
    }
}
