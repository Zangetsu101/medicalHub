@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/doctodayschedule.css')}}">
@endsection

@section('content')

<div class="row">
    <div class="columns">
        <div class="vertical-menu">
            <a href="{{route('upcomingevents')}}" >Upcoming Events</a>
            <a href="{{route('admittedpatients')}}">Admitted Patients</a>
            <a href="{{route('upcomingappts')}}" class="active">Upcoming Appointments</a>
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
                <th>Date</th>
            </tr>
            
            @foreach($appointments as $apt)
                <tr>
                    <td> <a href="{{route('prescriptioncreate',$apt->patient_id)}}">{{$apt->appt_id}}</a> </td>
                    <td> {{$apt->patient_id}} </td>    
                    <td> {{$apt->patient->name}} </td>      
                    <td> {{$apt->serial_no}} </td>  
                    <td> {{$apt->date}} </td>
                </tr>

            @endforeach

        </table>
    </div>

</div>

@endsection