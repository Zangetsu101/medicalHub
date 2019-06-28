@extends('layouts.app')

@section('content')    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Doctor Login</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Doctor Login <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
	<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 py-5 pr-md-5">
                    <div class="heading-section heading-section-white ftco-animate mb-5">
                        <span class="subheading">Login</span>
                        <h2 class="mb-4">Doctor Login</h2>
                    </div>
                    <form action="#" class="appointment-form ftco-animate">
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Doctor ID">
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-secondary py-3 px-4">
                            </div>
                        </div>
                    </form>
    			</div>
            </div>
    	</div>
    </section>

@endsection