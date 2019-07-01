@extends('layouts.app')

@section('content')

<!-- Add icon library -->
<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('css/docprofile.css')}}">


<div class="card">
  <h1>{{ $doctor->name }}</h1>
  <p class="title"> {{ $doctor->spec->spec_name }} <br>
   {{$doctor->designation}} <br>
   {{ $doctor->hospital->name }}, <br>
   {{ $doctor->hospital->address }} <br>
   </p>
    
   <h2> Contact Details </h2>
   <p> Mobile Phone: {{$doctor->mobile}} <br>
       Email: {{$doctor->address}} 
   </p>

   <h2> Patient Consult Time </h2>
   <p>
         Everyday  <br>
         Time : {{$doctor->start_time}} to {{ $doctor->end_time }} <br>
         Room No: {{ $doctor->room_no }} <br>
         {{$doctor->hospital->name}}
   </p>

</div>

@endsection


