@extends('layouts.app')

@section('routes')
                        <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span class="mr-2"><a href="{{route('dashboard')}}">Dashboard <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span class="mr-2"><a href="{{route('prescription.show',$test->prescription_id)}}">Prescription <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span>Report <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6"><img src="{{asset($test->location)}}"></div>
            </div>
        </div>
    </section>

@endsection