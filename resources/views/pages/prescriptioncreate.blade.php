@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/prescriptioncreate.css')}}">
@endsection



@section('content')

<div class="row justify-content-center">
<h3>Patient Prescription</h3>
</div>


<div>
  
  <div class="row">
        <div class="col-md-3">
            <h4>Patient Details</h4>
            <form class="inputform">
                <label for="fname">Name: <b>{{$patients->name}}</b> </label>
                <h4>  </h4>

                <label for="gender">Gender: <b>{{$patients->gender}}</b> </label>
                
            </form>
        </div>   

        <div class="col-md-3">
            <form class="inputform">
                <label for="weight">Weight</label>
                <input type="text" id="weight" name="weight" placeholder="weight">

                <label for="bplow">Blood Pressure Low</label>
                <input type="text" id="bplow" name="bplow" placeholder="blood pressure low">

                <label for="bphigh">Blood Pressure High</label>
                <input type="text" id="bphigh" name="bphigh" placeholder="blood pressure high">

                <label for="con">Conditions</label>
                <input type="conditionsubmission" id="conditions" name="conditions" placeholder="conditions">
            </form>
        </div>   

        <div class="col-md-3">
            <form class="inputform">
                <label for="med1">Medicine 1</label>
                <input type="text" id="med1" name="med1" placeholder="Medicine 1">
                
                <label for="med2">Medicine 2</label>
                <input type="text" id="med2" name="med2" placeholder="Medicine 2">

                <label for="med3">Medicine 3</label>
                <input type="text" id="med3" name="med3" placeholder="Medicine 3">

            </form>
        </div> 

        <div class="col-md-3">
            <form class="inputform">
                <label for="duration1"> duration </label>
                <select id="duration1" name="duration1">
                    <option value="1">1 day</option>
                    <option value="2">2 days</option>
                    <option value="3">3 days</option>
                    <option value="4">4 days</option>
                    <option value="5">5 days</option>
                    <option value="6">6 days</option>    
                </select>

                <label for="duration2"> duration </label>
                <select id="duration2" name="duration2">
                    <option value="1">1 day</option>
                    <option value="2">2 days</option>
                    <option value="3">3 days</option>
                    <option value="4">4 days</option>
                    <option value="5">5 days</option>
                    <option value="6">6 days</option>    
                </select>

                <label for="duration3"> duration </label>
                <select id="duration3" name="duration3">
                    <option value="1">1 day</option>
                    <option value="2">2 days</option>
                    <option value="3">3 days</option>
                    <option value="4">4 days</option>
                    <option value="5">5 days</option>
                    <option value="6">6 days</option>    
                </select>

                
            </form>

            <input type="submit" value="Submit">
        </div> 


    </div>


</div>




@endsection