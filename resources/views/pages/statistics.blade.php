@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h2 class="text-center">No of Appointments This Month</h2>
        <table class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="text-center" scope="col">Doc_ID</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Hospital Name </th>
                    <th class="text-center" scope="col">Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doc)
                    <tr>
                        <td class="text-center">{{$doc->doc_id}}</td>
                        <td class="text-center">{{$doc->name}}</td>
                        <td class="text-center">{{$doc->hospital->name}}</td>
                        <td class="text-center">{{$doc->count}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection