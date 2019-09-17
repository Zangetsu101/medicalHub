<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Symptom;
use App\PrescriptionSymptom;

class SymptomController extends Controller
{
    //
    public function Index() {
        $symptoms=Symptom::all();
        return $symptoms;
    }

    /*Adding new symptom to symptom table 
    when doctor doesn't choose any from existing symptoms from table */
    public function NewSymptom(Request $request) {
        $symptom=new Symptom;
        $symptom->name=$request->name;
        $symptom->save();
        return $symptom;
    }

    //Adding symptom to pressymp table when doctor is writing a prescription
    public function PrescriptionSymptom(Request $request) {
        $pressymp=new PrescriptionSymptom;
        $pressymp->prescription_id=$request->prescription_id;
        $pressymp->symptom_id=$request->symptom_id;
        $pressymp->save();
        return $pressymp;
    }
}
