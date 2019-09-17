<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Speciality;

//Tabs in home/layout are routed in this controller
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

    public function hospitals()
    {
        $hospitals=Hospital::all();
        return view('pages.hospitals')->with('hospitals', $hospitals);
    }
}
