@extends('layouts.app')

@section('content')

<div class="row">

  <div class="column">
    <div class="vertical-menu">
      <a href="{{route('dashboard')}}" class="active">Home</a>
      <a href="{{route('doctodayschedule')}}">Today Schedule</a>
      <a href="{{route('admittedpatients')}}">Admitted Patients</a>
      <a href="{{route('apptfortoday')}}">Upcoming Appointments</a>
            <a href="{{route('emergencyops')}}">Upcoming Emergency Operations</a>
    </div>
  </div>

  <div class="column">
      

  </div>




</div>

@endsection

