@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <h2 class="subtitle">Welcome <i class="em em-dizzy"></i></h2>   --}}

            <div class="card-box">
                <div id="myDIV" class="header text-white" >
                <h2>My Personal Info</h2>
                </div>

                <div class="info">
                Doctor Id: {{$doctor->doc_id}}  <br>
                Name: {{$doctor->name}} <br>
                Designation: {{$doctor->designation}} <br>
                Office: {{$doctor->room_no}},{{$doctor->hospital->name}} <br>
                Speciality: {{$doctor->spec->spec_name}}
                </div>
            
                
                <div id="myDIV" class="header">
                <h2>Your Total Upcoming Appointments: {{count($appointments)}}</h2>
                <h2>UpComing Appointments</h2>
                </div>

                @foreach($appointments as $apt)
                  <ul id="myUL">
                    <li> Appt Id:{{$apt->appt_id}} ||  Appt Date:{{$apt->date}}  ||   Patient Id:{{$apt->patient_id}}</li>  
                  </ul>  
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection
