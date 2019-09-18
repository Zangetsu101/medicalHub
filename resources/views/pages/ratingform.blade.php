@extends('layouts.app')

@section('routes')
    <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span>Dashboard <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')
{{-- Form to add Rating of a user --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Rating') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('ratingsubmission', $appointment->appt_id)}}">
                            @csrf
                            <div class="form-row">
                                <label for="of"> Of {{$ofusername}} </label>
                                <input type="hidden" id="ofuser" name="ofuser" value="{{$ofuser}}">
                            </div>
                            <div class="form-row">
                                <label for="by"> By {{$byusername}} </label>
                                <input type="hidden" id="byuser" name="byuser" value="{{$byuser}}">
                            </div>

                            <label for="rating"> Rating </label>
                            <div class="form-row">
                                <select required class="form-control" id="rating" name="rating">
                                    <option value="">--Please choose a rating--</option>
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <label for="comment"> Comment </label>
                                <textarea class="form-control" input type="text" id="comment" name="comment" rows="4"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Rate</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection