@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/prescriptioncreate.css')}}">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection



@section('content')


<div class="container" class="d-flex justify-content-center">

    <form method="POST" action="{{route('prescription.create')}}">
        @csrf

        <div class="row justify-content-center">
            <h1>Patient Prescription</h1>
        </div>

        <br>

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
            <textarea class="form-control" id="complain" name="complain" rows="6"></textarea>
        </div>

        <br>

        <div class="row justify-content-center">
            <h1>Medicines & Tests</h1>
        </div>

        <br>

        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m1">Medicine 1</label>
                <input type="text" class="form-control" id="m1" name="m1">
            </div>

            <div class="form-group col-md-2">
                <label for="d1">Duration(days)</label>
                <input type="text" class="form-control" id="d1" name="d1">
            </div>


            <div class="form-group col-md-2">
                <label for="dos1">Dosage</label>
                <input type="text" class="form-control" id="dos1" name="dos1">
            </div>


            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test1">Test 1</label>
                <input type="text" class="form-control" id="test1" name="test1">
            </div>


        </div>

        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m2">Medicine 2</label>
                <input type="text" class="form-control" id="m2" name="m2">
            </div>

            <div class="form-group col-md-2">
                <label for="d2">Duration(days)</label>
                <input type="text" class="form-control" id="d2" name="d2">
            </div>


            <div class="form-group col-md-2">
                <label for="dos2">Dosage</label>
                <input type="text" class="form-control" id="dos2" name="dos2">
            </div>

            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test2">Test 2</label>
                <input type="text" class="form-control" id="test2" name="test2">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m3">Medicine 3</label>
                <input type="text" class="form-control" id="m3" name="m3">
            </div>

            <div class="form-group col-md-2">
                <label for="d3">Duration(days)</label>
                <input type="text" class="form-control" id="d3" name="d3">
            </div>


            <div class="form-group col-md-2">
                <label for="dos3">Dosage</label>
                <input type="text" class="form-control" id="dos3" name="dos3">
            </div>

            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test3">Test 3</label>
                <input type="text" class="form-control" id="test3" name="test3">
            </div>


        </div>

        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m4">Medicine 4</label>
                <input type="text" class="form-control" id="m4" name="m4">
            </div>

            <div class="form-group col-md-2">
                <label for="d4">Duration(days)</label>
                <input type="text" class="form-control" id="d4" name="d4">
            </div>


            <div class="form-group col-md-2">
                <label for="dos4">Dosage</label>
                <input type="text" class="form-control" id="dos4" name="dos4">
            </div>

            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test4">Test 4</label>
                <input type="text" class="form-control" id="test4" name="test4">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m5">Medicine 5</label>
                <input type="text" class="form-control" id="m5" name="m5">
            </div>

            <div class="form-group col-md-2">
                <label for="d5">Duration(days)</label>
                <input type="text" class="form-control" id="d5" name="d5">
            </div>


            <div class="form-group col-md-2">
                <label for="dos5">Dosage</label>
                <input type="text" class="form-control" id="dos5" name="dos5">
            </div>

            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test5">Test 5</label>
                <input type="text" class="form-control" id="test5" name="test5">
            </div>


        </div>

        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m6">Medicine 6</label>
                <input type="text" class="form-control" id="m6" name="m6">
            </div>

            <div class="form-group col-md-2">
                <label for="d6">Duration(days)</label>
                <input type="text" class="form-control" id="d6" name="d6">
            </div>


            <div class="form-group col-md-2">
                <label for="dos6">Dosage</label>
                <input type="text" class="form-control" id="dos6" name="dos6">
            </div>

            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test6">Test 6</label>
                <input type="text" class="form-control" id="test6" name="test6">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m7">Medicine 7</label>
                <input type="text" class="form-control" id="m7" name="m7">
            </div>

            <div class="form-group col-md-2">
                <label for="d7">Duration(days)</label>
                <input type="text" class="form-control" id="d7" name="d7">
            </div>


            <div class="form-group col-md-2">
                <label for="dos7">Dosage</label>
                <input type="text" class="form-control" id="dos7" name="dos7">
            </div>

            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test7">Test 7</label>
                <input type="text" class="form-control" id="test7" name="test7">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m8">Medicine 8</label>
                <input type="text" class="form-control" id="m8" name="m8">
            </div>

            <div class="form-group col-md-2">
                <label for="d8">Duration(days)</label>
                <input type="text" class="form-control" id="d8" name="d8">
            </div>


            <div class="form-group col-md-2">
                <label for="dos8">Dosage</label>
                <input type="text" class="form-control" id="dos8" name="dos8">
            </div>

            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test8">Test 8</label>
                <input type="text" class="form-control" id="test8" name="test8">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m9">Medicine 9</label>
                <input type="text" class="form-control" id="m9" name="m9">
            </div>

            <div class="form-group col-md-2">
                <label for="d9">Duration(days)</label>
                <input type="text" class="form-control" id="d9" name="d9">
            </div>


            <div class="form-group col-md-2">
                <label for="dos9">Dosage</label>
                <input type="text" class="form-control" id="dos9" name="dos9">
            </div>

            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test9">Test 9</label>
                <input type="text" class="form-control" id="test9" name="test9">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-2 ">
                <label for="m10">Medicine 10</label>
                <input type="text" class="form-control" id="m10" name="m10">
            </div>

            <div class="form-group col-md-2">
                <label for="d10">Duration(days)</label>
                <input type="text" class="form-control" id="d10" name="d10">
            </div>


            <div class="form-group col-md-2">
                <label for="dos10">Dosage</label>
                <input type="text" class="form-control" id="dos10" name="dos10">
            </div>

            <div class="form-group col-md-1">
            </div>

            <div class="form-group col-md-5">
                <label for="test10">Test 10</label>
                <input type="text" class="form-control" id="test10" name="test10">
            </div>    

        </div>


        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>

@endsection
