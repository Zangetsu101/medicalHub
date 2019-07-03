@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <h2 class="subtitle">Welcome <i class="em em-dizzy"></i></h2>   --}}

            <div class="card-box">
                <div class="info">
                Patient Id: {{$patient->patient_id}}  <br>
                Patient Name: {{$patient->name}} <br>
                Gender: @if($patient->gender=='m')
                            Male
                        @else  
                            Female
                        @endif
                        <br>
                Date of Birth: {{$patient->dob}} 
                </div>
            
                <div class="patientmenu">
                <button class="btn btn-primary">View My Appoinments</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
