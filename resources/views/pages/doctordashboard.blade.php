@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <h2 class="subtitle">Welcome <i class="em em-dizzy"></i></h2>   --}}

            <div class="card-box">
                <div class="info">
                Doctor Id: {{$doctor->doc_id}}  <br>
                Name: {{$doctor->name}} <br>
                Designation: {{$doctor->designation}} <br>
                Office: {{$doctor->room_no}},{{$doctor->hospital->name}} <br>
                Spec: {{$doctor->spec->spec_name}}
                </div>
            
                <div class="patientmenu">
                <button class="btn btn-primary">View My Appoinments</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
