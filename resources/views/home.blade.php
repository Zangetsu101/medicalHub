@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <h2 class="subtitle">Welcome <i class="em em-dizzy"></i></h2>   --}}

            <div class="card-box">
                <div class="info">
                Patient Id: 12  <br>
                Patient Name: Tameem <br>
                Gender: Male  <br>
                Patient Age: 20 
                </div>
            
                <div class="patientmenu">
                <button class="cta">View My Appoinments</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
