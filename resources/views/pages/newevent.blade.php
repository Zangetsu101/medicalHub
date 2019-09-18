@extends('layouts.app')

@section('content')
{{-- Form for doctor to add new event --}}
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('neweventsubmit')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="date">{{ __('Event Date:') }}</label>
                                <input id="date" class="date form-control" type="text" name="date" value="{{ old('date') }}" required autocomplete="date">
                            </div>

                            <div class="form-group row">
                                <label for="name"> Event Name: </label>
                                <input type="name" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group row">
                                <label for="place"> Place: </label>
                                <input type="place" class="form-control" id="place" name="place">
                            </div>

                            <div class="form-group row">
                                <label for="time"> Time </label>
                                <input type="time" class="form-control" id="time" name="time">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                            
                        </form>
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
		});  
	</script>
@endsection