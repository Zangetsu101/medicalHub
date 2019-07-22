@extends('layouts.app')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Dashboard</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span>Dashboard <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
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
                                <a href="{{route('prescription.show',$prescription->prescription_id)}}" class="list-group-item mb-2">
                                    <div class="row">
                                        <div class="col-md-6">{{$prescription->appointment->date}}</div>  
                                        <div class="col-md-6">{{$prescription->appointment->doctor->name}}</div>
                                    </div>
                                </a>
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
                                        <div class="col-md-3">
                                            {{$appointment->doctor->start_time}}
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
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        @include('footer')
        <script src="{{asset('js/weightchart.js')}}"></script>
        <script src="{{asset('js/bpchart.js')}}"></script>
    @endsection
@endsection
