<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

        @forelse ($doctor_data as $doctor)
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              @if ($doctor->photo=='avatar.png')
              <img src="{{url('avatar.png')}}" alt="">
              @else
              <img src="{{url('storage/doctor/' . $doctor->photo)}}" alt="">
              @endif
              
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$doctor->name}}</p>
              <span class="text-sm text-grey">{{$doctor->speciality}}</span>
            </div>
          </div>
        </div>
        @empty
            No Doctor Data Found
        @endforelse



      </div>
    </div>
  </div>