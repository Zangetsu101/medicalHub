@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style> 
    .checked {
    color: orange;
    }
    </style>
@endsection

{{-- Admin dashboard contains buttons to register doctor and hospital --}}
{{-- It also contains doctor list with their details and ratings--}}
@section('content')
    <div class="container mt-3 mb-3">
        <div class="d-flex flex-column">
                
            <div class="d-flex justify-content-center">
                <p class="button-custom order-lg-last mr-2"><a href="{{ route('docreg') }}" class="btn btn-secondary py-2 px-3">Register Doctor</a></p>
                <br>
                <p class="button-custom order-lg-last mb-0"><a href="{{ route('hosreg') }}" class="btn btn-secondary py-2 px-3">Register Hospital</a></p>
            </div>
            
            <div class="flex-fill">
                <h1 class="text-center">Doctor List</h1>
                <table class="table table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-center" scope="col">Doc_ID</th>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Hospital Name </th>
                        </tr>
                    </thead>

                <tbody>
                    @foreach($doctors as $doc)
                        <tr>
                            <td class="text-center">{{$doc->doc_id}}</td>
                            <td class="text-center">{{$doc->name}}</td>
                            <td class="text-center">{{$doc->hospital->name}}</td>
                            <td class="text-center">{{$doc->rating}}</td>
                            <td class="text-center">        
                                @if($doc->rating==0)
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                @endif

                                @if($doc->rating>0 && $doc->rating<=1)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                @endif

                                @if($doc->rating>1 && $doc->rating<=2)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                @endif

                                @if($doc->rating>2 && $doc->rating<=3)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                @endif

                                @if($doc->rating>3 && $doc->rating<=4)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star "></span>
                                @endif

                                @if($doc->rating>4 && $doc->rating<=5)
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>

            </div>


        </div>
    </div>
@endsection