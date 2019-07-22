@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/doctodayschedule.css')}}">
@endsection

@section('content')

<div class="row">
    <div class="columns">
        <div class="vertical-menu">
            <a href="{{route('upcomingevents')}}" class="active">Upcoming Events</a>
            <a href="{{route('admittedpatients')}}">Admitted Patients</a>
            <a href="{{route('upcomingappts')}}">Upcoming Appointments</a>
            <a href="{{route('emergencyops')}}">Upcoming Emergency Operations</a>
        </div>
    </div>

    <div class="columns">
        <table id="works">
            <tr>
                <th>Event Name</th>
                <th>Place</th>
                <th>Time</th>
                <th>Date</th>
            </tr>

            @foreach ($event as $ev)
            <tr>
                <td> {{$ev->eventname}} </td>
                <td> {{$ev->place}} </td>
                <td> {{$ev->time}} </td>
                <td> {{$ev->date}} </td>
            </tr>
            @endforeach

        </table>
    </div>

</div>










@endsection