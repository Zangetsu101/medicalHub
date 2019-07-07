<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function doctorLogin()
    {
        return view('pages.doctorLogin');
    }

    public function patientLogin()
    {
        return view('pages.patientLogin');
    }

    public function department()
    {
        return view('pages.departments');
    }
}
