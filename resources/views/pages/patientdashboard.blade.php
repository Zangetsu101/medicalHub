@extends('layouts.app')

@section('routes')
    <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span>Dashboard <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')
{{-- Patient dashboard --}}
{{-- Includes previous and future appointments and --}}
{{-- Weight graph and Blood Pressure graph --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('success') }}
    </div>
    @elseif (session('failure'))
    <div class="alert alert-warning alert-dismissible text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('failure') }}
    </div>
    @endif
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">{{ __('Previous Appointments:') }}</div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach($prescriptions as $prescription)
                                    <div class="list-group-item mb-2">
                                        <div class="row">
                                            <div class="col-md-5"><a href="{{route('prescription.show',$prescription->prescription_id)}}">{{$prescription->appointment->date}}</a></div>
                                            <div class="col-md-5">{{$prescription->appointment->doctor->name}}</div>
                                            <div class="col-md-2"><a href="{{route('ratingform', $prescription->appt_id)}}" type="button btn-primary py-2 px-3">Rate</a></div>
                                        </div>
                                    </div>   
                                @endforeach
                            </div>
                       </div>
                    </div>
                    {{-- <div class="card-box">
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
                    </div> --}}
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">{{ __('Upcoming Appointments:') }}</div>
                        <div class="card-body">
                            <div class="list-group">
                            @foreach($appointments as $appointment)
                                <div class="list-group-item mb-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            {{$appointment->date}}
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('doctors.show',$appointment->doctor->doc_id)}}">{{$appointment->doctor->name}}</a>
                                        </div>
                                        <div class="col-md-2">
                                            {{$appointment->startTime()}}
                                        </div>
                                        <div class="col-md-1">
                                            <a onclick="return confirm('Are you sure?')" 
                                               href="{{route('appointment.destroy',$appointment->appt_id)}}" 
                                               class="btn btn-danger btn-sm text-white">X</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card-box">
                    <div class="card-header bg-primary text-white">{{ __('Your Weight at a Glance') }}</div>
                    <canvas class="my-4 w-100" id="weight" width="900" height="380"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="card-box">
                    <div class="card-header bg-primary text-white">{{ __('Your Blood Pressure at a Glance') }}</div>
                    <canvas class="my-4 w-100" id="bp" width="900" height="380"></canvas>
                </div>
            </div>
        </div>

        
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    @include('footer')
    <script src="{{asset('js/weightchart.js')}}"></script>
    <script src="{{asset('js/bpchart.js')}}"></script>
@endsection
