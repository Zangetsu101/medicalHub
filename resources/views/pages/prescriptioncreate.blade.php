@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/prescriptioncreate.css')}}">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection



@section('content')

<div class="row justify-content-center">
<h1>Patient Prescription</h1>
</div>


<div class="container" class="d-flex justify-content-center">

    <form method="POST" action="{{route('prescription.create')}}">
        @csrf
        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="fname">Name: <b>{{$patients->name}}</b> </label> <br>
            </div>

            <div class="form-group col-md-4">
                <label for="gender">Gender: <b>{{$patients->gender}}</b> </label>
            </div>

            <div class="form-group col-md-4">
                <label for="gender">Appointment Id: <b>{{$appointments->appt_id}}</b> </label>
                <input type="hidden" name="appt_id" value="{{$appointments->appt_id}}">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-4 ">
            <label for="weight">Weight(kg)</label>
            <input type="text" class="form-control" id="weight" name="weight">
            </div>

            <div class="form-group col-md-4">
            <label for="bphigh">Blood Pressure(High)</label>
            <input type="text" class="form-control" id="bphigh" name="bphigh">
            </div>


            <div class="form-group col-md-4">
            <label for="bplow">Blood Pressure Low</label>
            <input type="text" class="form-control" id="bplow" name="bplow">
            </div>
        </div>

        <div class="form-row">
            <label for="complain"> Patient Complains </label>
            <textarea class="form-control" id="complain" name="complain" rows="3"></textarea>
        </div>

        <br>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection
