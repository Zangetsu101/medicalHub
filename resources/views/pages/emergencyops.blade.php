@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/doctodayschedule.css')}}">
@endsection

@section('content')

<div class="row">
    <div class="columns">
        <div class="vertical-menu">
            <a href="{{route('upcomingevents')}}">Upcoming Events</a>
            <a href="{{route('admittedpatients')}}" >Admitted Patients</a>
            <a href="{{route('todayappts')}}">Today Appointments</a>
            <a href="{{route('emergencyops')}}"class="active">Upcoming Emergency Operations</a>
            <a href="{{route('previousappts')}}">Previous Patients</a>
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
