@extends('layouts.app')

@section('routes')
						<span class="mr-2"><a href="{{ route('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
						<span class="mr-2"><a href="{{ route('doctors.index') }}">Doctors <i class="ion-ios-arrow-forward"></i></a></span> 
						<span class="mr-2"><a href="{{ route('doctors.show',$doctor->doc_id) }}">{{$doctor->name}} <i class="ion-ios-arrow-forward"></i></a></span> 
						<span>Appointment <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')
		
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