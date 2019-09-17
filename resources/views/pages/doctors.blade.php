@extends('layouts.app')


@section('routes')
    <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span>Doctors <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')   
{{-- Showing all doctors' short detail together in doctors tab --}}
{{-- Includes filtering of doctors using keywords of Name, Hospital, Speciality --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>Search Criteria</h1>
                    <form method="POST" action="{{ route('doctors.filter') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group row">
                        <label for="hospital">Hospital:</label>
                        <select class="form-control" id="hospital" name="hospital">
                            <option disabled selected> Select a hospital </option>
                            @foreach($hospitals as $hospital)
                            <option value="{{$hospital->hospital_id}}">{{$hospital->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="speciality">Speciality:</label>
                        <select class="form-control" id="speciality" name="speciality">
                            <option disabled selected> Select a speciality </option>
                            @foreach($specialities as $speciality)
                            <option value="{{$speciality->spec_id}}">{{$speciality->spec_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Search') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @foreach($doctors as $doctor)
                            <div class="col-md-6">
                                <div class="staff">
                                    <div class="text pt-3 text-center">
                                        <h3><a href="doctors/{{$doctor->doc_id}}">{{$doctor->name}}</a></h3>
                                        <span class="position mb-2">{{$doctor->spec->spec_name}}</span>
                                        <span class="position mb-2">{{$doctor->hospital->name}}</span>
                                        <span class="position mb-2">Fee:{{$doctor->fee}}</span>
                                        @foreach($doctor->schedule as $schedule)
                                            <span class="position mb-2">{{$schedule->day}} {{$schedule->start_time}}-{{$schedule->end_time}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- /container -->
    </section>
    

@endsection