@extends('layouts.app')

@section('content')
    <div class="container mt-3">
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
                            <th class="text-center" scope="col">Rating</th>
                        </tr>
                    </thead>

                <tbody>
                    @foreach($doctors as $doc)
                        <tr>
                            <td class="text-center">{{$doc->doc_id}}</td>
                            <td class="text-center">{{$doc->name}}</td>
                            <td class="text-center">{{$doc->hospital->name}}</td>
                            <td class="text-center">{{$doc->rating}}</td>
                        </tr>
                    @endforeach
                </tbody>
                
                </table>

            </div>


        </div>
    </div>
@endsection