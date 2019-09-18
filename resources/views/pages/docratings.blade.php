@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/doctodayschedule.css')}}">
@endsection

@section('content')
{{-- Showing own ratings to doctor --}}
<div class="container mt-3">
    <div class="row">
        <div class="columns">
            <div class="vertical-menu">
                <a href="{{route('upcomingevents')}}">Upcoming Events</a>
                <a href="{{route('todayappts')}}">Today Appointments</a>
                <a href="{{route('admittedpatients')}}">Admitted Patients</a>    
                <a href="{{route('emergencyops')}}">Upcoming Emergency Operations</a>
                <a href="{{route('previousappts')}}">Previous Patients</a>
                <a href="{{route('ratings')}}" class="active">My Ratings</a>
            </div>
        </div>

        <div class="columns">
            <table id="works">
                <tr>
                    <th>Rating Value</th>
                    <th>Comment</th>
                </tr>

                @foreach ($ratings as $rating)
                <tr>
                    <td> {{$rating->rating_value}} </td>
                    <td> {{$rating->comment}} </td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection