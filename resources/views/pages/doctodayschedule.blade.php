@extends('layouts.app')

@section('content')

<div class="row">
    <div class="columns">
        <div class="vertical-menu">
            <a href="{{route('dashboard')}}" >Home</a>
            <a href="{{route('doctodayschedule')}}" class="active">Today Schedule</a>
            <a href="{{route('criticalpatients')}}">Critical Patients</a>
            <a href="{{route('apptfortoday')}}">Appointments For Today</a>
            <a href="{{route('emergencyops')}}">Emergency Operations</a>
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