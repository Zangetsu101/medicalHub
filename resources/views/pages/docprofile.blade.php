@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/docprofile.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style> 
    .checked {
    color: orange;
    }
    </style>
@endsection

@section('routes')
    <span class="mr-2"><a href="{{ route('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span class="mr-2"><a href="{{ route('doctors.index') }}">Doctors <i class="ion-ios-arrow-forward"></i></a></span> 
    <span>{{$doctor->name}} <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset($doctor->image_url)}}">
                    <h1>{{ $doctor->name }}</h1>
                    <p class="title"> 
                        {{ $doctor->spec->spec_name }} <br>
                        {{$doctor->designation}} <br>
                        {{ $doctor->hospital->name }}, <br>
                        {{ $doctor->hospital->address }} <br>
                        Fee:{{ $doctor->fee }}
                    </p>
                </div>    
            </div>

            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                     
                    <h2> Contact Details </h2>
                    <p> Mobile Phone: {{$doctor->mobile}} <br>
                        Email: {{$doctor->email}} 
                    </p>

                    <h2> Patient Consult Time </h2>
                    <p> @foreach($doctor->schedule as $schedule)
                        {{$schedule->day}} : {{$schedule->start_time}} to {{ $schedule->end_time }} <br>
                        @endforeach
                            Room No: {{ $doctor->room_no }} <br>
                            {{$doctor->hospital->name}}
                    </p>
                    <p>
                        Rating: 
                        @for($i=0;$i<5;$i++)
                            @if($rating>$i)
                                <span class="fa fa-star checked"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif
                        @endfor
                    </p>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <form method="POST" action="{{route('appointment.store',$doctor->doc_id)}}">
                        @csrf
                        <div class="form-group row">
                            <label for="date">{{ __('Date of Appointment:') }}</label>
                            <input id="date" class="date form-control" type="text" name="date" value="{{ old('date') }}" required autocomplete="date">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Take Appointment') }}
                        </button>
                    </form>
                    @guest
                
                    @else
                        @if($user->type==3)
                            <p class="button-custom order-lg-last mt-2"><a href="{{ route('docedit', $doctor->doc_id) }}" class="btn btn-secondary py-2 px-3">Edit Profile</a></p>
                        @endif
                    @endguest
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
   	@include('footer')
	<script type="text/javascript">
		$('.date').datepicker({  
			format:'yyyy-mm-dd',
			startDate:new Date(),
			daysOfWeekDisabled:window.disabledDays
		});  
	</script>
@endsection