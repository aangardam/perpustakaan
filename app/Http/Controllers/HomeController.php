<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Member;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        // $data = Member::where('created_at', '>=', date('Y-m-d').' 00:00:00')->update(array(
        //     'status' => 'expired'
        // ));
        // $data = Member::where('created_at', '>=', date('Y-m-d').' 00:00:00');
        // return $data;
        $title= "Home";
        return view('home',compact('title'));
    }
    
}
