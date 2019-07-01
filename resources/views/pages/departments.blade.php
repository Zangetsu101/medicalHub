@extends('layouts.app')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Clinical Department</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Department <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
      
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Departments</span>
                <h2 class="mb-4">Clinic Departments</h2>
            </div>
        </div>
        <div class="ftco-departments">
            <div class="row">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach($departments as $department)

                            @if($department->dept_id == 1)
                                <a class="nav-link ftco-animate active" id="v-pills-{{$department->dept_id}}-tab" data-toggle="pill" href="#v-pills-{{$department->dept_id}}" role="tab" aria-controls="v-pills-{{$department->dept_id}}" aria-selected="true">{{$department->name}}</a>
                            @else
                                <a class="nav-link ftco-animate" id="v-pills-{{$department->dept_id}}-tab" data-toggle="pill" href="#v-pills-{{$department->dept_id}}" role="tab" aria-controls="v-pills-{{$department->dept_id}}" aria-selected="false">{{$department->name}}</a>
                            @endif

                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
              
                    <div class="tab-content p-4 p-md-5 ftco-animate" id="v-pills-tabContent">

                        @foreach($departments as $department)

                            @if($department->dept_id == 1)
                                <div class="tab-pane py-2 fade show active" id="v-pills-{{$department->dept_id}}" role="tabpanel" aria-labelledby="day-{{$department->dept_id}}-tab">
                            @else
                                <div class="tab-pane py-2 fade" id="v-pills-{{$department->dept_id}}" role="tabpanel" aria-labelledby="day-{{$department->dept_id}}-tab">
                            @endif
                                    <div class="row departments">
                                        @foreach($department->specialities as $speciality)
                                            @foreach($speciality->doctors as $doctor)
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="staff">
                                                        <div class="text pt-3 text-center">
                                                            <h3><a href="doctors/{{$doctor->doc_id}}">{{$doctor->name}}</a></h3>
                                                            <span class="position mb-2">{{$doctor->spec->spec_name}}</span>
                                                            <span class="position mb-2">{{$doctor->hospital->name}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  @endsection