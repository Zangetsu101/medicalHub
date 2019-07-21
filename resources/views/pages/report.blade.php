@extends('layouts.app')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('../../images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Report</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span class="mr-2"><a href="{{route('dashboard')}}">Dashboard <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span class="mr-2"><a href="{{route('prescription.show',$report->prescription_id)}}">Prescription <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span>Report <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6"><img src="{{asset($report->location)}}"></div>
            </div>
        </div>
    </section>
@endsection