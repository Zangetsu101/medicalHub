@extends('layouts.app')

@section('content')

<div class="row">
    <div class="columns">
        <div class="vertical-menu">
            <a href="{{route('doctodayschedule')}}" class="active">Today Schedule</a>
            <a href="{{route('admittedpatients')}}">Admitted Patients</a>
            <a href="{{route('apptfortoday')}}">Upcoming Appointments</a>
            <a href="{{route('emergencyops')}}">Upcoming Emergency Operations</a>
        </div>
    </div>

    <div class="columns">
        <table id="works">
            <tr>
                <th>Time</th>
                <th>Work Schedule</th>
            </tr>
            <tr>
                <td>8:00</td>
                <td>Meet Patients</td>
            </tr>
        </table>
    </div>

</div>










@endsection