<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use App\PrescribedMedicine;

class MedicineController extends Controller
{
    //
    public function Index() {
        $medicines=Medicine::all();
        return $medicines;
    }
    public function NewMedicine(Request $request) {
        $medicine=new Medicine;
        $medicine->name=$request->name;
        $medicine->save();
        return $medicine;
    }

    public function NewPrescribedMedicine(Request $request) {
        $medicine=new PrescribedMedicine;
        $medicine->prescription_id=$request->prescription_id;
        $medicine->medicine_id=$request->medicine_id;
        $medicine->duration=$request->duration;
        $medicine->dosage=$request->dosage;
        $medicine->save();
        return $medicine;
    }
}
