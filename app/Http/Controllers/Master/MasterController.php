<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
    public function index()
    {
        $title = "Master";
        return view('master.index',compact('title'));
    }
}
