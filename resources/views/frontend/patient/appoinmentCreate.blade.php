@extends('frontend.layout.app')
@section('main-content')
<br><br>
<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
      @include('validate.validate')

      <form class="main-form" action="{{route('patient.appoinment.create')}}" method="POST">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input name="name" @if (Auth::guard('patient')->check())
            value="{{Auth::guard('patient')->user()->name}}"
            @endif type="text" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input @if (Auth::guard('patient')->check())
            value="{{Auth::guard('patient')->user()->email}}"
            @endif name="email" type="text" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input  name="date" type="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="doctor" class="custom-select">
              <option value="general">--select doctor--</option>
             
              @forelse ($doctor_data as $doctor)
              <option   value="{{$doctor->name}}">{{$doctor->name}} --speciality-- {{$doctor->speciality}}</option>
              @empty
              <option >No data found</option>
              @endforelse
              
              
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input name="cell" @if (Auth::guard('patient')->check())
            value="{{Auth::guard('patient')->user()->cell}}"
            @endif type="text" class="form-control" placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div>
@endsection