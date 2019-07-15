@extends('layouts.app')

@section('content')

<div class="vertical-menu">
  <a href="{{route('dashboard')}}" class="active">Home</a>
  <a href="{{route('doctodayschedule')}}">Today Schedule</a>
  <a href="{{route('criticalpatients')}}">Critical Patients</a>
  <a href="{{route('apptfortoday')}}">Appointments For Today</a>  
  <a href="{{route('emergencyops')}}">Emergency Operations</a>
</div>

@endsection

