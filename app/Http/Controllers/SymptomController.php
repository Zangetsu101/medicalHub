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

    public function NewSymptom(Request $request) {
        $symptom=new Symptom;
        $symptom->name=$request->name;
        $symptom->save();
        return $symptom;
    }

    public function PrescriptionSymptom(Request $request) {
        $pressymp=new PrescriptionSymptom;
        $pressymp->prescription_id=$request->prescription_id;
        $pressymp->symptom_id=$request->symptom_id;
        $pressymp->save();
        return $pressymp;
    }
}
