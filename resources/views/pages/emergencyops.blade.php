@extends('layouts.app')

@section('content')

<div class="row">
    <div class="columns">
        <div class="vertical-menu">
            <a href="{{route('doctodayschedule')}}">Today Schedule</a>
            <a href="{{route('admittedpatients')}}" >Admitted Patients</a>
            <a href="{{route('apptfortoday')}}">Upcoming Appointments</a>
            <a href="{{route('emergencyops')}}">Upcoming Emergency Operations</a>
        </div>
    </div>


    <div class="columns">
        <table id="works">
            <tr>
                <th>Patient Id</th>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            
            @foreach($emops as $ep)
                <tr>
                    <td>{{$ep->patient_id}}</td>
                    <td> {{$ep->patient->name}} </td>    
                    <td> {{$ep->date}} </td>      
                    <td> {{$ep->time}} </td>  

                </tr>

            @endforeach

        </table>
    </div>

</div>



@endsection
