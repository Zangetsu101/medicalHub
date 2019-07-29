@extends('layouts.app')

@section('routes')
    <span><a href="{{ route('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span><a href="{{ route('patient.show',$patient->patient_id) }}">{{$patient->name}}<i class="ion-ios-arrow-forward"></i></a></span> 
    <span>Weight<i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')

   <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">
                            <div class="row">
                                <div class="col-md-6">Date</div>
                                <div class="col-md-6">Weight</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach($prescriptions as $prescription)
                                    <div class="list-group-item mb-1">
                                        <div class="row">
                                            <div class="col-md-6">{{$prescription->appointment->date}}</div>
                                            <div class="col-md-6">{{$prescription->weight}}</div>
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