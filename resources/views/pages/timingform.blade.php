@extends('layouts.app')

@section('content')
{{-- From for admin to add doctor timing --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Timing for {{$doctor->name}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('doctiming.create', ['doctor'=>$doctor->doc_id])}}">
                        @csrf

                        <div class="form-group row">
                            <label for="suns" class="col-md-4 col-form-label text-md-right">{{ __('Sunday Start') }}</label>

                            <div class="col-md-6">
                                    <input id="suns" type="time" class="form-control @error('suns') is-invalid @enderror" name="suns">

                                @error('suns')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sune" class="col-md-4 col-form-label text-md-right">{{ __('Sunday End') }}</label>

                            <div class="col-md-6">
                                    <input id="sune" type="time" class="form-control @error('sune') is-invalid @enderror" name="sune">

                                @error('sune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mons" class="col-md-4 col-form-label text-md-right">{{ __('Monday Start') }}</label>

                            <div class="col-md-6">
                                    <input id="mons" type="time" class="form-control @error('mons') is-invalid @enderror" name="mons">

                                @error('mons')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mone" class="col-md-4 col-form-label text-md-right">{{ __('Monday End') }}</label>

                            <div class="col-md-6">
                                    <input id="mone" type="time" class="form-control @error('mone') is-invalid @enderror" name="mone">

                                @error('mone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tues" class="col-md-4 col-form-label text-md-right">{{ __('Tuesday Start') }}</label>

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
                            <label for="tuee" class="col-md-4 col-form-label text-md-right">{{ __('Tuesday End') }}</label>

                            <div class="col-md-6">
                                    <input id="tuee" type="time" class="form-control @error('tuee') is-invalid @enderror" name="tuee">

                                @error('tuee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="weds" class="col-md-4 col-form-label text-md-right">{{ __('Wednesday Start') }}</label>

                            <div class="col-md-6">
                                <input id="weds" type="time" class="form-control @error('weds') is-invalid @enderror" name="weds">

                                @error('weds')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="wede" class="col-md-4 col-form-label text-md-right">{{ __('Wednesday End') }}</label>

                            <div class="col-md-6">
                                <input id="wede" type="time" class="form-control @error('wede') is-invalid @enderror" name="wede">

                                @error('wede')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thurs" class="col-md-4 col-form-label text-md-right">{{ __('Thursday Start') }}</label>

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
                            <label for="thure" class="col-md-4 col-form-label text-md-right">{{ __('Thursday End') }}</label>

                            <div class="col-md-6">
                                    <input id="thure" type="time" class="form-control @error('thure') is-invalid @enderror" name="thure">

                                @error('thure')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fris" class="col-md-4 col-form-label text-md-right">{{ __('Friday Start') }}</label>

                            <div class="col-md-6">
                                <input id="fris" type="time" class="form-control @error('fris') is-invalid @enderror" name="fris">

                                @error('fris')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="frie" class="col-md-4 col-form-label text-md-right">{{ __('Friday End') }}</label>

                            <div class="col-md-6">
                                    <input id="frie" type="time" class="form-control @error('frie') is-invalid @enderror" name="frie">

                                @error('frie')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sats" class="col-md-4 col-form-label text-md-right">{{ __('Saturday Start') }}</label>

                            <div class="col-md-6">
                                    <input id="sats" type="time" class="form-control @error('sats') is-invalid @enderror" name="sats">

                                @error('sats')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sate" class="col-md-4 col-form-label text-md-right">{{ __('Saturday End') }}</label>

                            <div class="col-md-6">
                                    <input id="sate" type="time" class="form-control @error('sate') is-invalid @enderror" name="sate">

                                @error('sate')
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