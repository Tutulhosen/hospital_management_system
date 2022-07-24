@extends('frontend.layout.app')
@section('main-content')
<br><br>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 offset-md-2">
      
        <!-- Account Content -->
        <div class="account-content">
          <div class="row align-items-center justify-content-center">
            
            <div class="col-md-12 col-lg-6 login-right">
              <div class="login-header">
                <h3>Doctor Register </h3>
                <a href="{{route('patient.reg')}}">Not a Doctor?</a>
              </div>
              <br>
              @include('validate.validate')
              <!-- Register Form -->
              <form action="{{route('register.doctor')}}" method="POST">
                @csrf
                <div class="form-group form-focus">
                  <label class="focus-label">Name</label>
                  <input name="name" type="text" value="{{old('name')}}" class="form-control floating">
                </div>
                <div class="form-group form-focus">
                  <label class="focus-label">Your Email</label>
                  <input name="email" type="text" value="{{old('email')}}" class="form-control floating">
                </div>
                <div class="form-group form-focus">
                  <label class="focus-label">Your Mobile</label>
                  <input name="cell" type="text" value="{{old('cell')}}" class="form-control floating">
                </div>
                <div class="form-group form-focus">
                  <label class="focus-label">Create Password</label>
                  <input name="password" type="password" class="form-control floating">
                </div>
                <div class="form-group form-focus">
                  
                  <label class="focus-label">Speciality</label>
                  <select class="form-control" name="speciality" id="">
                    <option value="">--select--</option>
                    @forelse ($speciality_data as $speciality)
                    <option value="{{$speciality->name}}">{{$speciality->name}}</option>
                    @empty
                    <option value="">No Data Found</option>
                    @endforelse
                    
                </select>
                </div>
                <div class="form-group form-focus">
                  
                  <label class="focus-label">Room No</label>
                  <select class="form-control" name="room" id="">
                    <option value="">--select--</option>
                    @forelse ($room_data as $room)
                    <option value="{{$room->name}}">{{$room->name}}</option>
                    @empty
                    <option value="">No Data Found</option>
                    @endforelse
                    
                </select>
                </div>
                
                <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                
               
              </form>
              <!-- /Register Form -->
              
            </div>
          </div>
        </div>
        <!-- /Account Content -->
          
      </div>
    </div>

  </div>

</div>	
<br><br>
@endsection