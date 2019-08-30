@extends('layouts.app')

@section('routes')
    <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span>Hospitals<i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')

  <section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($hospitals as $hospital)
                    <div class="col-md-6">
                        <div class="staff">
                            <div class="text pt-3 text-center">
                                <h3><a href="hospitals/{{$hospital->hospital_id}}">{{$hospital->name}} </h3>
                                <span class="position mb-2">{{$hospital->address}}</span>
                                <span class="position mb-2">{{$hospital->mobile}}</span>
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