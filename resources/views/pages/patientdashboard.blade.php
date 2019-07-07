@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">{{ __('Patient Details:') }}</div>
                        <div class="card-body">
                            Patient Id: {{$patient->patient_id}}  <br>
                            Patient Name: {{$patient->name}} <br>
                            Gender: @if($patient->gender=='m')
                                        Male
                                    @else  
                                        Female
                                    @endif
                                    <br>
                            Date of Birth: {{$patient->dob}} 
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">{{ __('Upcoming Appointments:') }}</div>
                        <div class="card-body">
                            @foreach($appointments as $appointment)
                                <div class="row">
                                    <div class="col-md-4">
                                        {{$appointment->date}}
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('doctors.show',$appointment->doctor->doc_id)}}">{{$appointment->doctor->name}}</a>
                                    </div>
                                    <div class="col-md-4">
                                        {{$appointment->doctor->start_time}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
