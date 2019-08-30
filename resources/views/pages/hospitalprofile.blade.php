@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/docprofile.css')}}">
@endsection

@section('routes')
    <span class="mr-2"><a href="{{ route('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span class="mr-2"><a href="{{ route('hospitals.index') }}">Hospitals <i class="ion-ios-arrow-forward"></i></a></span> 
    <span>{{$hospital->name}} <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')
<section class="ftco-section">
    <div class="card">
        
        <h1>{{ $hospital->name }}</h1>
            
        <h2> Contact Details </h2>
        <p> Address: {{$hospital->address}} <br>
            Phone: {{$hospital->mobile}} 
        </p>

        <p> License Number: {{$hospital->license_no}}
        </p>
        
        @guest
            
        @else
            @if($user->type==3)
                <p class="button-custom order-lg-last"><a href="{{ route('hosedit', $hospital->hospital_id) }}" class="btn btn-secondary py-2 px-3">Edit Details</a></p>
            @endif
        @endguest
    </div>
</section>
@endsection