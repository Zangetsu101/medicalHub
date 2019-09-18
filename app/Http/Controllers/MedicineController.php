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

    /*Adding new medicine to medicines table 
    when doctor doesn't choose any from existing medicines from table */
    public function NewMedicine(Request $request) {
        $medicine=new Medicine;
        $medicine->name=$request->name;
        $medicine->save();
        return $medicine;
    }

    //Adding medicines to pres_medicines table when doctor is writing a prescription
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
