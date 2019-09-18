@extends('layouts.app')

@section('content')
{{-- Showing own ratings to patient --}}
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <div class="card-header bg-primary text-white">{{ __('Ratings:') }}</div>
                    <div class="card-body">
                        <div class="list-group"> 
                            <div class="columns">
                                <table id="works">
                                    <tr>
                                        <th>Rating Value</th>
                                        <th>Comment</th>
                                    </tr>
                    
                                    @foreach ($ratings as $rating)
                                    <tr>
                                        <td> {{$rating->rating_value}} </td>
                                        <td> {{$rating->comment}} </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</section>
@endsection