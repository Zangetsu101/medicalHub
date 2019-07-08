<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

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
        $user=auth()->user();
        $patient=Patient::find($user->foreign_id);
        return view('home')->with('patient',$patient);
    }
}
