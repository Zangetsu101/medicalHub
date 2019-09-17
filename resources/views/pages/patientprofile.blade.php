@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style> 
    .checked {
    color: orange;
    }
    </style>
@endsection

@section('routes')
    <span><a href="{{ route('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span>{{$patient->name}} <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')
{{-- Patient profile --}}
{{-- Includes previous prescriptions, own Ratings --}}
{{-- Weight graph and Blood Pressure graph and their tabular chart --}}
    <div class="container mt-3">
        <div class="row justify-content-center">
            <h2>Patient Name: {{$patient->name}}</h2>
        </div>
        <div class="row justify-content-center">
            <p>Gender: @if($patient->gender=='m')
                            Male
                        @else  
                            Female
                        @endif
            </p>
        </div>
        <div class="row justify-content-center">
            <p>Date of Birth: {{$patient->dob}}</p>
        </div>
        <div class="row justify-content-center">
            <p>
                @if($rating==0)
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                @endif

                @if($rating>0 && $rating<=1)
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                @endif

                @if($rating>1 && $rating<=2)
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                @endif

                @if($rating>2 && $rating<=3)
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span>
                @endif

                @if($rating>3 && $rating<=4)
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star "></span>
                @endif

                @if($rating>4 && $rating<=5)
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                @endif
            </p>
        </div>
        <div class="row justify-content-center">
            <a href="{{route('ratings')}}" class="btn btn-primary stretched-link">My Ratings</a>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card-box">
                    <div class="card-header bg-primary text-white">{{ __('Weight Graph') }}</div>
                    <div class="card-body">
                        <canvas class="my-4 w-100" id="weight"></canvas>
                        <a href="{{route('patient.weights',$patient->patient_id)}}" class="btn btn-primary stretched-link">Tabulate</a>
                    </div>
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">{{ __('Blood Pressure Graph') }}</div>
                        <div class="card-body">
                            <canvas class="my-4 w-100" id="bp"></canvas>
                            <a href="{{route('patient.bps',$patient->patient_id)}}" class="btn btn-primary stretched-link">Tabulate</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    <div class="card-header bg-primary text-white">{{ __('Prescriptions') }}</div>
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
                        <div>{{$prescriptions->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    @include('footer')
    <script src="{{asset('js/weightchart.js')}}"></script>
    <script src="{{asset('js/bpchart.js')}}"></script>
@endsection
