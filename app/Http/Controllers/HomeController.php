<?php

namespace App\Http\Controllers;

use App\Models\UserSell;
use Illuminate\Http\Request;

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
        $data['sub_head']=false;
        $data['sells']=UserSell::with('user','detail.product')->orderBy('id','desc')->get();
        return view('dashboard_new')->with($data);
    }
}
