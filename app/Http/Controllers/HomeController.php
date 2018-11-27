<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Member;
use Illuminate\Support\Facades\DB;
use App\Models\Log;
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
        $date = date('Y-m-d');
        $data = Member::where('expired' , '<=', $date)->update(array(
            'status' => 'expired'
        ));
        // $data = Member::where('created_at', '>=', date('Y-m-d').' 00:00:00');
        // return $data;
        $title= "Home";
        return view('home',compact('title'));
    }

    public function log()
    {
        $data = Log::all();
        return view('log.index')->with([
            'title' => 'Log Activity',
            'data' => $data,
            'js' => $this->js
        ]);
    }
    
}
