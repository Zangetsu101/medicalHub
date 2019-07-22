@extends('layouts.app')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('../../images/bg_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<h1 class="mb-2 bread">Appointment</h1>
					<p class="breadcrumbs">
						<span class="mr-2"><a href="{{ route('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
						<span class="mr-2"><a href="{{ route('doctors.index') }}">Doctors <i class="ion-ios-arrow-forward"></i></a></span> 
						<span class="mr-2"><a href="{{ route('doctors.show',$doctor->doc_id) }}">{{$doctor->name}} <i class="ion-ios-arrow-forward"></i></a></span> 
						<span>Appointment <i class="ion-ios-arrow-forward"></i></span>
					</p>
				</div>
			</div>
		</div>
    </section>
		
	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form method="POST" action="{{route('appointment.store',$doctor->doc_id)}}">
						@csrf
						<div class="form-group row">
							<label for="date">{{ __('Date of Appointment') }}</label>
							<input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autocomplete="date">
						</div>
						<div class="form-group row mb-0">
							<button type="submit" class="btn btn-primary">
								{{ __('Submit') }}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection