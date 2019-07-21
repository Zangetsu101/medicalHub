@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Timing for {{$doctor->name}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('doctiming.create', ['doctor'=>$doctor->doc_id])}}">
                        @csrf

                        <div class="form-group row">
                            <label for="sun" class="col-md-4 col-form-label text-md-right">{{ __('Sunday') }}</label>

                            <div class="col-md-6">
                                    <input id="sun" type="time" class="form-control @error('sun') is-invalid @enderror" name="sun">

                                @error('sun')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mon" class="col-md-4 col-form-label text-md-right">{{ __('Monday') }}</label>

                            <div class="col-md-6">
                                    <input id="mon" type="time" class="form-control @error('mon') is-invalid @enderror" name="mon">

                                @error('mon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tues" class="col-md-4 col-form-label text-md-right">{{ __('Tuesday') }}</label>

                            <div class="col-md-6">
                                    <input id="tues" type="time" class="form-control @error('tues') is-invalid @enderror" name="tues">

                                @error('tues')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="wed" class="col-md-4 col-form-label text-md-right">{{ __('Saturday') }}</label>

                            <div class="col-md-6">
                                    <input id="wed" type="time" class="form-control @error('wed') is-invalid @enderror" name="wed">

                                @error('wed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thurs" class="col-md-4 col-form-label text-md-right">{{ __('Thursday') }}</label>

                            <div class="col-md-6">
                                    <input id="thurs" type="time" class="form-control @error('thurs') is-invalid @enderror" name="thurs">

                                @error('thurs')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fri" class="col-md-4 col-form-label text-md-right">{{ __('Friday') }}</label>

                            <div class="col-md-6">
                                    <input id="fri" type="time" class="form-control @error('fri') is-invalid @enderror" name="fri">

                                @error('fri')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sat" class="col-md-4 col-form-label text-md-right">{{ __('Saturday') }}</label>

                            <div class="col-md-6">
                                    <input id="sat" type="time" class="form-control @error('sat') is-invalid @enderror" name="sat">

                                @error('sat')
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
                                    {{ __('Confirm Timing') }}
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