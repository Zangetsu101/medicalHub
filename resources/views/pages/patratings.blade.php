@extends('layouts.app')

@section('content')
{{-- Showing own ratings to patient --}}
<section class="ftco-section">
    <div class="container">
        <table class="table table-striped">
            <thead class="bg-primary text-white">
                    <tr>
                        <th>Rating Value</th>
                        <th>Comment</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($ratings as $rating)
                    <tr>
                        <td> {{$rating->rating_value}} </td>
                        <td> {{$rating->comment}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>        
</section>
@endsection