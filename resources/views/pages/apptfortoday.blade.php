@extends('layouts.app')

@section('content')

<div class="row">
    <div class="columns">
        <div class="vertical-menu">
            <a href="{{route('doctodayschedule')}}" >Today Schedule</a>
            <a href="{{route('admittedpatients')}}">Admitted Patients</a>
            <a href="{{route('apptfortoday')}}">Upcoming Appointments</a>
            <a href="{{route('emergencyops')}}">Upcoming Emergency Operations</a>
        </div>
    </div>

    <div class="columns">
        <table id="works">
            <tr>
                <th>Appointment Id</th>
                <th>Patient Id</th>
                <th>Patient Name</th>
                <th>Serial No</th>
            </tr>
            
            @foreach($appointments as $apt)
                <tr>
                    <td>{{$apt->appt_id}}</td>
                    <td> {{$apt->patient_id}} </td>    
                    <td> {{$apt->patient->name}} </td>      
                    <td> {{$apt->serial_no}} </td>  

                </tr>

            @endforeach

        </table>
    </div>

</div>

@endsection