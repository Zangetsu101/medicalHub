@extends('layouts.app')

@section('content')

<div class="row">
    <div class="columns">
        <div class="vertical-menu">
            <a href="{{route('dashboard')}}" >Home</a>
            <a href="{{route('doctodayschedule')}}">Today Schedule</a>
            <a href="{{route('admittedpatients')}}" class="active">Admitted Patients</a>
            <a href="{{route('apptfortoday')}}">Upcoming Appointments</a>
            <a href="{{route('emergencyops')}}">Upcoming Emergency Operations</a>
        </div>
    </div>

    <div class="columns">
        <table id="works">
            <tr>
                <th>Patient Id</th>
                <th>Patient Name</th>
                <th>Room No.</th>
                <th>Critical Alert</th>
                <th>Comment</th>
            </tr>
            
            @foreach($admittedpatients as $ap)
                <tr>
                    <td>{{$ap->patient_id}}</td>
                    <td> {{$ap->patient->name}} </td>   
                    <td> {{$ap->room}} </td>   

                    @if($ap->criticalflag==1)
                        <td bgcolor="red">Emergency</td>
                    @else
                    <td></td>
                    @endif

                    <td> {{$ap->comments}} </td>  

                </tr>
            @endforeach

        </table>
    </div>

</div>



@endsection