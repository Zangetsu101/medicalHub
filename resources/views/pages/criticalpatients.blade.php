@extends('layouts.app')

@section('content')

<div class="row">
    <div class="columns">
        <div class="vertical-menu">
            <a href="{{route('dashboard')}}" >Home</a>
            <a href="{{route('doctodayschedule')}}">Today Schedule</a>
            <a href="{{route('criticalpatients')}}" class="active">Critical Patients</a>
            <a href="{{route('apptfortoday')}}">Appointments For Today</a>
            <a href="{{route('emergencyops')}}">Emergency Operations</a>
        </div>
    </div>


    <div class="columns">
        <table id="works">
            <tr>
                <th>Patient Id</th>
                <th>Patient Name</th>
                <th>Room</th>
                <th>Comment</th>
            </tr>
            
            @foreach($criticalpatients as $cp)
                <tr>
                    <td>{{$cp->patient_id}}</td>
                    <td> {{$cp->patient->name}} </td>    
                    <td> {{$cp->room_no}} </td>      
                    <td> {{$cp->comment}} </td>  

                </tr>


            @endforeach

        </table>
    </div>

</div>



@endsection