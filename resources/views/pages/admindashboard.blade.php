@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <div class="card-header bg-primary text-white">{{ __('Admin Details:') }}</div>
                    <div class="card-body">
                        Admin Id: {{$admin->id}}  <br>
                        Admin Name: {{$admin->name}} <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection