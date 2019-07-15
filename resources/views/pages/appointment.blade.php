@extends('layouts.app')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('../../images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Qualified Doctors</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span class="mr-2"><a href="{{route('dashboard')}}">Dashboard <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span>Appointment <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">Condition</div>
                        <div class="card-body">{{$appointment->condition}}</div>
                    </div>
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">Reports</div>
                        <div class="card-body">
                            <div class="list-group">
                            @foreach($reports as $report)
                                <a href="{{route('report.show',['appointment'=>$appointment->appt_id,
                                'report'=>$report->report_id])}}" class="list-group-item mb-2">
                                    <div class="row">{{$report->name}}</div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">Prescribed Medicines</div>
                        <div class="card-body">
                            <div class="list-group">
                            @foreach($prescriptions as $prescription)
                                <div class="list-group-item mb-2">
                                    <div class="row">
                                        <div class="col-md-6">{{$prescription->name}}</div>  
                                        <div class="col-md-6">{{$prescription->dosage}}</div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection