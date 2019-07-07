@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <h2 class="subtitle">Welcome <i class="em em-dizzy"></i></h2>   --}}

            <div class="card-box">
                <div class="info">
<<<<<<< HEAD:resources/views/home.blade.php
                Patient Id: {{$patient->patient_id}}  <br>
                Patient Name: {{$patient->name}} <br>
                Gender: @if($patient->gender=='m')
                            Male
                        @else  
                            Female
                        @endif
                        <br>
                Date of Birth: {{$patient->dob}} 
=======
                Doctor Id: {{$doctor->doc_id}}  <br>
                Name: {{$doctor->name}} <br>
                Designation: {{$doctor->designation}} <br>
                Office: {{$doctor->room_no}},{{$doctor->hospital->name}} <br>
                Spec: {{$doctor->spec->spec_name}}
>>>>>>> 262d8072d13c080ffb3c2faee7700877b52ef18a:resources/views/pages/doctordashboard.blade.php
                </div>
            
                <div class="patientmenu">
                <button class="btn btn-primary">View My Appoinments</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
