<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        if(Auth::user()->role == "admin"){
            return redirect('pulau');
        }
        if (Auth::user()->role == "pegawai") {
            return redirect('user');
         }
        if (Auth::user()->role == "divisi-sdm") {
            return redirect('divisisdm');
        }
    }
}
