@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Doctor Registration') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('doctor.create') }}">
                        @csrf
                        {{-- For Name --}}
                        <div class="form-group row"> 
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- For Email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- for mobile --}}
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Speciality --}}
                        <div class="form-group row">
                            <label for="spec" class="col-md-4 col-form-label text-md-right">{{ __('Speciality') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="spec" name="spec">
                                    <option disabled selected> Select a speciality </option>
                                    @foreach($specialities as $spec)
                                        <option value="{{$spec->spec_id}}">{{$spec->spec_Name}}</option>
                                    @endforeach
                                </select>
                                @error('spec')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Hospital --}}
                        <div class="form-group row">
                            <label for="hospital" class="col-md-4 col-form-label text-md-right">{{ __('Hospital') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="hospital" name="hospital">
                                    <option disabled selected> Select a hospital </option>
                                    @foreach($hospitals as $hospital)
                                        <option value="{{$hospital->hospital_id}}">{{$hospital->name}}</option>
                                    @endforeach
                                </select>
                                @error('hospital')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Designation --}}
                        <div class="form-group row">
                            <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                            <div class="col-md-6">
                                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" autofocus>

                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Start time
                        <div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('Start time') }}</label>

                            <div class="col-md-6">
                                    <input id="start" type="time" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}" required autocomplete="start" autofocus>

                                @error('start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        End time
                        <div class="form-group row">
                            <label for="endt" class="col-md-4 col-form-label text-md-right">{{ __('End time') }}</label>

                            <div class="col-md-6">
                                <input id="endt" type="time" class="form-control @error('endt') is-invalid @enderror" name="endt" value="{{ old('endt') }}" required autocomplete="endt" autofocus>

                                @error('endt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- room number --}}
                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('Room no.') }}</label>

                            <div class="col-md-6">
                                <input id="room" type="text" class="form-control @error('room') is-invalid @enderror" name="room" value="{{ old('room') }}" required autocomplete="room" autofocus>

                                @error('room')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{--fee--}}
                        <div class="form-group row">
                            <label for="fee" class="col-md-4 col-form-label text-md-right">{{ __('Fee') }}</label>

                            <div class="col-md-6">
                                <input id="fee" type="number" class="form-control @error('fee') is-invalid @enderror" name="fee" value="{{ old('fee') }}" required autocomplete="fee" autofocus>

                                @error('fee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- submit button --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Doctor') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection