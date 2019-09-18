@extends('layouts.app')

@section('content')
{{-- Doctor Edit section with previous details --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Doctor Edit Details Form') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('docupdate', $doctor->doc_id)  }}">
                        @csrf
                        {{-- For Name --}}
                        <div class="form-group row"> 
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $doctor->name }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $doctor->email }}" required autocomplete="email">

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
                                <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $doctor->mobile }}" required autocomplete="mobile">

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
                                    
                                    @foreach($specialities as $spec)
                                        <option value="{{$spec->spec_id}}" {{$doctor->spec_id==$spec->spec_id?'selected':''}}>{{$spec->spec_Name}}</option>
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
                                    @foreach($hospitals as $hospital)
                                        <option value="{{$hospital->hospital_id}}" {{$doctor->hospital_id==$hospital->hospital_id?'selected':''}}>{{$hospital->name}}</option>
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
                                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $doctor->designation }}" required autocomplete="designation" autofocus>

                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- room number --}}
                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('Room no.') }}</label>

                            <div class="col-md-6">
                                <input id="room" type="text" class="form-control @error('room') is-invalid @enderror" name="room" value="{{ $doctor->room_no }}" required autocomplete="room" autofocus>

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
                                <input id="fee" type="number" class="form-control @error('fee') is-invalid @enderror" name="fee" value="{{ $doctor->fee }}" required autocomplete="fee" autofocus>

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
                                    {{ __('Edit Doctor Profile') }}
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