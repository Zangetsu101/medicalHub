@extends('layouts.app')

@section('content')
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Qualified Doctors</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Doctor <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
			<section class="ftco-section">
				<div class="container">
					<div class="row">
          @foreach($doctors as $doctor)
						<div class="col-md-6 col-lg-3">
							<div class="staff">
								<div class="text pt-3 text-center">
									<h3><a href="doctors/{{$doctor->doc_id}}">{{$doctor->name}}</a></h3>
									<span class="position mb-2">{{$doctor->spec->spec_name}}</span>
                  <span class="position mb-2">{{$doctor->hospital->name}}</span>
									</div>
								</div>
							</div>
            @endforeach
						</div>
					</div>
			</section>

@endsection