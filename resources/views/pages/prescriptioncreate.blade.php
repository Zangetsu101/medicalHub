@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/prescriptioncreate.css')}}">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection



@section('content')

<div id="app">
    <prescription-form 
        name="{{$patient->name}}"
        gender="{{$patient->gender}}"
        appt_id="{{$appointment->appt_id}}"
        patient-route="{{route('patient.show',$patient->patient_id)}}"
        submit-route="{{route('todayappts')}}"
        avail-medicinesurl="{{route('avail_medicines.index')}}"
        symptomsurl="{{route('symptoms.index')}}"
        testsurl="{{route('tests.index')}}"
        prescription-post="{{route('prescription.create')}}"
        presmedicine-post="{{route('presmedicine.create')}}"
        pressymp-post="{{route('pressymp.create')}}"
        prestest-post="{{route('prestest.create')}}">
    </prescription-form>
</div>


@endsection

@section('script')
<script src="{{asset('js/app.js')}}"></script>
@endsection
