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
            <a href="{{route('todayappts')}}" class="active">Today Appointments</a>
            <a href="{{route('emergencyops')}}">Upcoming Emergency Operations</a>
            <a href="{{route('previousappts')}}">Previous Patients</a>
        </div>
    </div>

    <div class="columns">
        <table id="works">
            <tr>
                <th>Date</th>
                <th>Appointment Id</th>
                <th>Patient Id</th>
                <th>Patient Name</th>
                <th>Rating</th>
            </tr>
            
            @foreach($appointments as $apt)
                <tr>
                    <td> {{$apt->date}} </td> 
                    <td> <a href="{{route('prescriptioncreate',$apt->appt_id)}}">{{$apt->appt_id}}</a> </td> 
                    <td> {{$apt->patient_id}} </td>    
                    <td> <a href="{{route('patient.show',$apt->patient_id)}}">{{$apt->patient->name}}</a> </td>  
                    <td> <div class="col-md-2"><a href="{{route('ratingform', $apt->appt_id)}}" type="button btn-primary py-2 px-3">Rate</a></div> </td>     
                </tr>

            @endforeach

             <div>{{$appointments->links()}}</div> 

        </table>
    </div>

</div>

@endsection