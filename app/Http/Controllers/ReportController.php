<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class ReportController extends Controller
{
    //
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $report=Report::find($id);
        return view('pages.report')->with('report',$report);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
