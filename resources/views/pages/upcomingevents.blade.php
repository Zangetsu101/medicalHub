@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/doctodayschedule.css')}}">
@endsection

@section('content')
{{-- Showing upcoming events to doctor --}}
<div class="container mt-3">

    <div class="d-flex justify-content-center">
        <p class="button-custom order-lg-last mr-2"><a href="{{ route('newevent') }}" class="btn btn-secondary py-2 px-3">Add New Event</a></p>
    </div>

    <div class="row">
        <div class="columns">
            <div class="vertical-menu">
                <a href="{{route('upcomingevents')}}" class="active">Upcoming Events</a>
                <a href="{{route('todayappts')}}">Today Appointments</a>
                <a href="{{route('admittedpatients')}}">Admitted Patients</a>
                
                <a href="{{route('emergencyops')}}">Upcoming Emergency Operations</a>
                <a href="{{route('previousappts')}}">Previous Patients</a>
                <a href="{{route('ratings')}}">My Ratings</a>
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
</div>

@endsection