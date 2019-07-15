@extends('layouts.app')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">Hospitals</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span>Hospitals<i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

  <section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($hospitals as $hospital)
                    <div class="col-md-6">
                        <div class="staff">
                            <div class="text pt-3 text-center">
                                <h3>{{$hospital->name}} </h3>
                                <span class="position mb-2">{{$hospital->address}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection